<?php
// daftar_ekskul.php
session_start();
include '../../../Config/db.php'; // sesuaikan path jika perlu

// ---------- pastikan login ----------
if (!isset($_SESSION['user'])) {
    header("Location: ../Auth/Sign_In.php");
    exit;
}

// ---------- ambil user id ----------
$nama_user = $_SESSION['user'];
$uStmt = mysqli_prepare($koneksi, "SELECT id, kelas FROM users WHERE nama_lengkap = ? LIMIT 1");
mysqli_stmt_bind_param($uStmt, "s", $nama_user);
mysqli_stmt_execute($uStmt);
$resU = mysqli_stmt_get_result($uStmt);
if (!$resU || mysqli_num_rows($resU) === 0) {
    die("Session user invalid.");
}
$userRow = mysqli_fetch_assoc($resU);
$user_id = (int)$userRow['id'];
$kelas_user = $userRow['kelas'] ?? 'SISWA';
mysqli_stmt_close($uStmt);

// ---------- AJAX backend handler (register / cancel) ----------
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajax']) && $_POST['ajax'] === '1') {
    header('Content-Type: application/json; charset=utf-8');

    $action = $_POST['action'] ?? '';
    $ekskul_id = isset($_POST['ekskul_id']) ? intval($_POST['ekskul_id']) : 0;
    $uid = $user_id;

    if ($ekskul_id <= 0) {
        echo json_encode(['status'=>'error','message'=>'ID ekskul tidak valid.']);
        exit;
    }

    if ($action === 'register') {
        // cek apakah sudah terdaftar
        $c = mysqli_prepare($koneksi, "SELECT id FROM extracurricular_registrations WHERE user_id = ? AND extracurricular_id = ?");
        mysqli_stmt_bind_param($c, "ii", $uid, $ekskul_id);
        mysqli_stmt_execute($c);
        mysqli_stmt_store_result($c);
        if (mysqli_stmt_num_rows($c) > 0) {
            mysqli_stmt_close($c);
            echo json_encode(['status'=>'exists','message'=>'Kamu sudah terdaftar di ekskul ini.']);
            exit;
        }
        mysqli_stmt_close($c);

        // insert
        $i = mysqli_prepare($koneksi, "INSERT INTO extracurricular_registrations (user_id, extracurricular_id, status, registration_date) VALUES (?, ?, 'approved', NOW())");
        mysqli_stmt_bind_param($i, "ii", $uid, $ekskul_id);
        $ok = mysqli_stmt_execute($i);
        if ($ok) {
            echo json_encode(['status'=>'ok','message'=>'Pendaftaran berhasil.']);
        } else {
            echo json_encode(['status'=>'error','message'=>'Gagal mendaftar: '.mysqli_error($koneksi)]);
        }
        mysqli_stmt_close($i);
        exit;
    }

    if ($action === 'cancel') {
        // cek
        $c = mysqli_prepare($koneksi, "SELECT id FROM extracurricular_registrations WHERE user_id = ? AND extracurricular_id = ?");
        mysqli_stmt_bind_param($c, "ii", $uid, $ekskul_id);
        mysqli_stmt_execute($c);
        mysqli_stmt_store_result($c);
        if (mysqli_stmt_num_rows($c) === 0) {
            mysqli_stmt_close($c);
            echo json_encode(['status'=>'notfound','message'=>'Pendaftaran tidak ditemukan.']);
            exit;
        }
        mysqli_stmt_close($c);

        // hapus
        $d = mysqli_prepare($koneksi, "DELETE FROM extracurricular_registrations WHERE user_id = ? AND extracurricular_id = ? LIMIT 1");
        mysqli_stmt_bind_param($d, "ii", $uid, $ekskul_id);
        $ok = mysqli_stmt_execute($d);
        if ($ok) {
            echo json_encode(['status'=>'ok','message'=>'Pendaftaran dibatalkan.']);
        } else {
            echo json_encode(['status'=>'error','message'=>'Gagal batalkan pendaftaran.']);
        }
        mysqli_stmt_close($d);
        exit;
    }

    echo json_encode(['status'=>'error','message'=>'Aksi tidak dikenal.']);
    exit;
}

// ---------- Ambil data untuk frontend: semua kategori & semua ekskul & pendaftaran user ----------
$categories = [];
$catQ = mysqli_query($koneksi, "SELECT DISTINCT category FROM extracurriculars ORDER BY category ASC");
while ($r = mysqli_fetch_assoc($catQ)) $categories[] = $r['category'];

$allEkskul = [];
$exQ = mysqli_query($koneksi, "SELECT * FROM extracurriculars ORDER BY category, name");
while ($r = mysqli_fetch_assoc($exQ)) $allEkskul[] = $r;

// ambil daftar ekskul yang sudah didaftar user
$regIds = [];
$regQ = mysqli_prepare($koneksi, "SELECT extracurricular_id FROM extracurricular_registrations WHERE user_id = ?");
mysqli_stmt_bind_param($regQ, "i", $user_id);
mysqli_stmt_execute($regQ);
$regRes = mysqli_stmt_get_result($regQ);
while ($rr = mysqli_fetch_assoc($regRes)) $regIds[] = (int)$rr['extracurricular_id'];
mysqli_stmt_close($regQ);

// sanitization helper for inline JS
function js_json($data) {
    return json_encode($data, JSON_HEX_APOS|JSON_HEX_QUOT);
}
?>
<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Daftar Ekskul — GoEkskul</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
<style>
:root{
    --white:#FFFFFF;
    --dark:#333333;
    --soft:#F4F3FF;
    --accent:#1AA0D9;
    --muted:#A3A3A3;
    --card-bg: rgba(255,255,255,0.85);
}
*{box-sizing:border-box}
body{
    margin:0;
    font-family:"Poppins",sans-serif;
    background:linear-gradient(180deg,var(--soft), #FBFDFF 60%);
    color:var(--dark);
    -webkit-font-smoothing:antialiased;
}

/* animated school-style background with subtle shapes */
.bg-shapes{
    position:fixed;
    inset:0;
    z-index:-2;
    overflow:hidden;
}
.shape {
    position:absolute;
    border-radius:50%;  
    filter:blur(40px);
    opacity:0.18;
    animation: float 12s ease-in-out infinite alternate;
}
.shape.s1{ width:420px; height:420px; background:var(--accent); left:-120px; top:-80px; transform:rotate(12deg); }
.shape.s2{ width:300px; height:300px; background:var(--muted); right:-100px; top:40px; animation-duration:18s; }
.shape.s3{ width:600px; height:600px; background:#FFFFFF; left:40%; top:60%; opacity:0.12; animation-duration:20s; }

@keyframes float { from { transform:translateY(0) } to { transform:translateY(-40px) } }

/* layout */
.container { max-width:1100px; margin:30px auto; padding:28px; }
.header {
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:12px;
    margin-bottom:22px;
}
.brand {
    display:flex;
    gap:12px;
    align-items:center;
}
.logo {
    width:62px; height:62px; border-radius:12px;
    background:linear-gradient(135deg,var(--accent), #63D3E6);
    display:flex; align-items:center; justify-content:center;
    color:var(--white); font-weight:700; font-size:20px;
    box-shadow: 0 10px 30px rgba(26,160,217,0.18);
}
.h1 {
    font-size:20px; font-weight:700; color:var(--dark);
}
.user {
    text-align:right; font-size:13px; color:var(--muted);
}

/* categories */
.cat-wrap {
    display:flex; gap:10px; flex-wrap:wrap; margin-bottom:20px;
}
.cat-btn {
    padding:10px 16px;
    border-radius:10px;
    background:var(--card-bg);
    border:1px solid rgba(0,0,0,0.05);
    cursor:pointer;
    color:var(--dark);
    font-weight:600;
    transition: all .22s ease;
}
.cat-btn:hover { transform:translateY(-4px); box-shadow:0 10px 30px rgba(17,24,39,0.06); }
.cat-btn.active { background:var(--accent); color:var(--white); box-shadow:0 10px 30px rgba(26,160,217,0.12); }

/* main layout: left = list, right = detail */
.main {
    display:grid;
    grid-template-columns: 1fr 420px;
    gap:20px;
}

/* list column */
.list {
    display:flex; flex-direction:column; gap:12px;
}
.card {
    background:var(--card-bg);
    border-radius:14px; padding:14px;
    display:flex; gap:14px; align-items:center;
    box-shadow:0 10px 30px rgba(17,24,39,0.04);
    transition: transform .18s ease, box-shadow .18s ease;
    cursor:pointer;
    border:1px solid rgba(0,0,0,0.03);
}
.card:hover { transform:translateY(-6px); box-shadow:0 20px 50px rgba(17,24,39,0.08); }
.card-thumb { width:120px; height:80px; border-radius:10px; object-fit:cover; background:#eee; flex-shrink:0; }
.card-body { flex:1; }
.card-body h3{ margin:0 0 6px 0; font-size:16px; color:var(--dark); }
.meta { font-size:13px; color:var(--muted); display:flex; gap:12px; }

/* right column detail */
.detail {
    position:sticky; top:24px;
    background:var(--card-bg); padding:18px; border-radius:12px;
    box-shadow:0 12px 40px rgba(17,24,39,0.06);
    min-height:200px;
}
.detail h2{ margin-top:0; font-size:20px; color:var(--dark); }
.detail img { width:100%; height:180px; object-fit:cover; border-radius:10px; margin-bottom:12px; }
.detail p { margin:6px 0; color:var(--dark); font-size:14px; }
.instructor { display:flex; gap:12px; align-items:center; margin-top:10px; }
.instructor img { width:48px; height:48px; border-radius:50%; object-fit:cover; }

/* action buttons */
.btn {
    display:inline-block; padding:10px 14px; border-radius:10px; font-weight:700; cursor:pointer; border:none;
}
.btn-primary { background:var(--accent); color:var(--white); box-shadow:0 8px 20px rgba(26,160,217,0.14); }
.btn-ghost { background:transparent; color:var(--dark); border:1px solid rgba(0,0,0,0.06); }

/* small */
@media(max-width:980px){
    .main { grid-template-columns: 1fr; }
    .detail { position:static; }
}

.logo img {
    height: 80px;
    width: 80px;
}

.btn-back {
  position:absolute;
  background: none;
  border: none;
  margin-left: 80px;
  margin-top: 40px;
  font-size: 40px; /* ikon besar */
  cursor: pointer;
  color: #444;
}

</style>
</head>
<body>
<button class="btn-back" onclick="history.back()">&#8592;</button>
<div class="bg-shapes">
    <div class="shape s1"></div>
    <div class="shape s2"></div>
    <div class="shape s3"></div>
</div>

<div class="container">
    <div class="header">
        <div class="brand">
            <div class="logo">
                <img src="/Images/Ikon GoEkskul.png">
            </div>
            <div>
                <div class="h1">GoEkskul — Daftar Ekskul</div>
                <div style="font-size:13px; color:var(--muted) margin: left 20px;">Pilih kategori → pilih ekskul → daftar</div>
            </div>
        </div>
        <div class="user">
            <div style="font-weight:700;"><?php echo htmlspecialchars($nama_user); ?></div>
            <div style="color:var(--muted)"><?php echo htmlspecialchars($kelas_user); ?></div>
        </div>
    </div>

    <div class="cat-wrap" id="catWrap">
        <button class="cat-btn active" data-cat="__ALL__" onclick="selectCategory('__ALL__')">Semua Kategori</button>
        <?php foreach ($categories as $cat): ?>
            <button class="cat-btn" data-cat="<?php echo htmlspecialchars($cat, ENT_QUOTES); ?>" onclick="selectCategory('<?php echo htmlspecialchars(addslashes($cat), ENT_QUOTES); ?>')">
                <?php echo htmlspecialchars($cat); ?>
            </button>
        <?php endforeach; ?>
    </div>

    <div class="main">
        <div class="list" id="listColumn">
            <!-- cards will be injected here -->
        </div>

        <aside class="detail" id="detailColumn">
            <h2>Detail Ekskul</h2>
            <p style="color:var(--muted)">Pilih ekskul untuk melihat detail lengkap. Di sini kamu bisa mendaftar atau membatalkan pendaftaran.</p>
        </aside>
    </div>
</div>

<script>
// pass data from PHP to JS
const allEkskul = <?php echo js_json($allEkskul); ?>;
const registeredIds = <?php echo js_json($regIds); ?>;
const userId = <?php echo (int)$user_id; ?>;

let currentCategory = '__ALL__';
let currentSelectedId = null;

// initialize: show all
document.addEventListener('DOMContentLoaded', () => {
    renderList();
});

// category selection
function selectCategory(cat) {
    currentCategory = cat;
    // active styles
    document.querySelectorAll('.cat-btn').forEach(b => {
        if (b.dataset.cat === cat) b.classList.add('active'); else b.classList.remove('active');
    });
    renderList();
    // clear detail
    clearDetail();
}

// render list based on currentCategory
function renderList() {
    const list = document.getElementById('listColumn');
    list.innerHTML = '';

    const filtered = currentCategory === '__ALL__' ? allEkskul : allEkskul.filter(e => e.category === currentCategory);

    if (filtered.length === 0) {
        list.innerHTML = '<div style="padding:20px; color:var(--muted)">Tidak ada ekskul pada kategori ini.</div>';
        return;
    }

    // group by category when showing ALL
    if (currentCategory === '__ALL__') {
        const groups = {};
        filtered.forEach(e => {
            groups[e.category] = groups[e.category] || [];
            groups[e.category].push(e);
        });
        for (const cat of Object.keys(groups)) {
            const header = document.createElement('div');
            header.style.margin = '12px 0 6px';
            header.style.fontWeight = '700';
            header.style.color = '#1AA0D9';
            header.textContent = cat + ' (' + groups[cat].length + ')';
            list.appendChild(header);

            groups[cat].forEach(e => list.appendChild(createCard(e)));
        }
    } else {
        filtered.forEach(e => list.appendChild(createCard(e)));
    }
}

// create card element
function createCard(e) {
    const card = document.createElement('div');
    card.className = 'card';
    card.onclick = () => showDetail(e.id);

    const img = document.createElement('img');
    img.className = 'card-thumb';
    img.src = e.activity_photo || '';
    img.alt = e.name;
    img.onerror = () => img.style.background = '#f0f0f0';

    const body = document.createElement('div');
    body.className = 'card-body';
    const h3 = document.createElement('h3');
    h3.textContent = e.name;
    const meta = document.createElement('div');
    meta.className = 'meta';
    meta.innerHTML = '<span><strong>Hari:</strong> ' + (e.day||'-') + '</span><span><strong>Waktu:</strong> ' + (e.time||'-') + '</span>';

    body.appendChild(h3);
    body.appendChild(meta);

    // right small column: status
    const statusWrap = document.createElement('div');
    statusWrap.style.minWidth = '120px';
    statusWrap.style.textAlign = 'right';

    const isReg = registeredIds.includes(Number(e.id));
    const btn = document.createElement('button');
    btn.className = isReg ? 'btn btn-ghost' : 'btn btn-primary';
    btn.textContent = isReg ? 'Terdaftar' : 'Daftar';
    btn.onclick = (ev) => { ev.stopPropagation(); openQuickModal(e); };

    statusWrap.appendChild(btn);

    card.appendChild(img);
    card.appendChild(body);
    card.appendChild(statusWrap);
    return card;
}

// show detail in right column
function showDetail(id) {
    const eks = allEkskul.find(x => Number(x.id) === Number(id));
    if (!eks) return;
    currentSelectedId = Number(id);

    const detail = document.getElementById('detailColumn');
    detail.innerHTML = '';

    const title = document.createElement('h2');
    title.textContent = eks.name;

    const img = document.createElement('img');
    img.src = eks.activity_photo || '';
    img.alt = eks.name;
    img.onerror = () => img.style.background = '#f0f0f0';

    const pCat = document.createElement('p'); pCat.innerHTML = '<strong>Kategori:</strong> ' + (eks.category || '-');
    const pDay = document.createElement('p'); pDay.innerHTML = '<strong>Hari:</strong> ' + (eks.day || '-');
    const pTime = document.createElement('p'); pTime.innerHTML = '<strong>Waktu:</strong> ' + (eks.time || '-');
    const pLoc = document.createElement('p'); pLoc.innerHTML = '<strong>Lokasi:</strong> ' + (eks.location || '-');

    const instrWrap = document.createElement('div');
    instrWrap.className = 'instructor';
    const instrImg = document.createElement('img');
    instrImg.src = eks.instructor_photo || '';
    instrImg.alt = eks.instructor_name || '';
    instrImg.onerror = () => instrImg.style.background = '#f0f0f0';
    const instrText = document.createElement('div');
    instrText.innerHTML = '<div style="font-weight:700">' + (eks.instructor_name || '-') + '</div><div style="font-size:13px;color:var(--muted)">Pembina</div>';
    instrWrap.appendChild(instrImg);
    instrWrap.appendChild(instrText);

    // action area
    const actionArea = document.createElement('div');
    actionArea.style.marginTop = '12px';
    actionArea.style.display = 'flex';
    actionArea.style.gap = '8px';
    actionArea.style.justifyContent = 'flex-end';
    const isReg = registeredIds.includes(Number(id));

    const btnPrimary = document.createElement('button');
    btnPrimary.className = isReg ? 'btn btn-ghost' : 'btn btn-primary';
    btnPrimary.textContent = isReg ? 'Terdaftar' : 'Daftar';
    btnPrimary.onclick = () => {
        if (isReg) {
            if (!confirm('Kamu sudah terdaftar. Ingin batalkan pendaftaran?')) return;
            cancelRegistration(id);
        } else {
            if (!confirm('Daftar ekskul "'+eks.name+'"?')) return;
            registerEkskul(id);
        }
    };

    const btnCancel = document.createElement('button');
    btnCancel.className = 'btn btn-ghost';
    btnCancel.textContent = 'Tutup';
    btnCancel.onclick = () => { /* clear */ clearDetail(); };

    actionArea.appendChild(btnCancel);
    actionArea.appendChild(btnPrimary);

    detail.appendChild(title);
    detail.appendChild(img);
    detail.appendChild(pCat);
    detail.appendChild(pDay);
    detail.appendChild(pTime);
    detail.appendChild(pLoc);
    detail.appendChild(instrWrap);
    detail.appendChild(actionArea);
    detail.scrollIntoView({behavior:'smooth'});
}

function clearDetail(){
    const d = document.getElementById('detailColumn');
    d.innerHTML = '<h2>Detail Ekskul</h2><p style="color:var(--muted)">Pilih ekskul untuk melihat detail lengkap. Di sini kamu bisa mendaftar atau membatalkan pendaftaran.</p>';
    currentSelectedId = null;
}

// quick modal via confirm-like prompt but nicer: we'll use confirm for simplicity
function openQuickModal(eks) {
    // if already registered -> ask cancel
    const isReg = registeredIds.includes(Number(eks.id));
    if (isReg) {
        if (!confirm('Kamu sudah terdaftar di "'+eks.name+'". Batalkan pendaftaran?')) return;
        cancelRegistration(eks.id);
    } else {
        if (!confirm('Daftar ekskul "'+eks.name+'"?')) return;
        registerEkskul(eks.id);
    }
}

// AJAX register
function registerEkskul(id) {
    const form = new URLSearchParams({
        ajax: '1',
        action: 'register',
        ekskul_id: id
    });
    fetch(window.location.href, {
        method: 'POST',
        headers: {'Content-Type':'application/x-www-form-urlencoded'},
        body: form
    })
    .then(r => r.json())
    .then(j => {
        alert(j.message);
        if (j.status === 'ok') {
            registeredIds.push(Number(id));
            renderList();
            if (currentSelectedId == Number(id)) showDetail(id);
        }
    })
    .catch(err => { console.error(err); alert('Terjadi kesalahan jaringan.'); });
}

// AJAX cancel
function cancelRegistration(id) {
    const form = new URLSearchParams({
        ajax: '1',
        action: 'cancel',
        ekskul_id: id
    });
    fetch(window.location.href, {
        method: 'POST',
        headers: {'Content-Type':'application/x-www-form-urlencoded'},
        body: form
    })
    .then(r => r.json())
    .then(j => {
        alert(j.message);
        if (j.status === 'ok') {
            const idx = registeredIds.indexOf(Number(id));
            if (idx !== -1) registeredIds.splice(idx,1);
            renderList();
            if (currentSelectedId == Number(id)) showDetail(id);
        }
    })
    .catch(err => { console.error(err); alert('Terjadi kesalahan jaringan.'); });
}
</script>
</body>
</html>

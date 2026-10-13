import os

BASE = "/Users/as-saifi/Downloads/hallobun-static"

# Shared navbar (from root)
def nav_root():
    return """<nav class="nb">
  <a class="nb-brand" href="index.html"><img src="images/logo.png" alt="Hallobun"><span>Hallobun</span></a>
  <ul class="nb-nav" id="navLinks">
    <li><a href="index.html" class="active">Beranda</a></li>
    <li><a href="pages/konsultasi.html">Konsultasi</a></li>
    <li><a href="pages/kunjungan.html">Kunjungan</a></li>
    <li><a href="pages/narsum.html">Narsum</a></li>
    <li><a href="pages/sarana.html">Sarana</a></li>
  </ul>
  <div class="nb-act" id="navActions">
    <a href="pages/login.html" class="b-out">Masuk</a>
    <a href="pages/register.html" class="b-grn">Daftar</a>
  </div>
  <button class="hbg" onclick="toggleNav()" aria-label="Menu"><span></span><span></span><span></span></button>
</nav>"""

def nav_pages(active=""):
    links = [
        ("../index.html","Beranda"),
        ("konsultasi.html","Konsultasi"),
        ("kunjungan.html","Kunjungan"),
        ("narsum.html","Narsum"),
        ("sarana.html","Sarana"),
    ]
    li = ""
    for href, label in links:
        cls = ' class="active"' if href == active or (active and label.lower() in active.lower()) else ""
        li += f'<li><a href="{href}"{cls}>{label}</a></li>\n'
    return f"""<nav class="nb">
  <a class="nb-brand" href="../index.html"><img src="../images/logo.png" alt="Hallobun"><span>Hallobun</span></a>
  <ul class="nb-nav" id="navLinks">{li}</ul>
  <div class="nb-act" id="navActions">
    <a href="login.html" class="b-out">Masuk</a>
    <a href="register.html" class="b-grn">Daftar</a>
  </div>
  <button class="hbg" onclick="toggleNav()" aria-label="Menu"><span></span><span></span><span></span></button>
</nav>"""

def nav_admin():
    return """<nav class="nb">
  <a class="nb-brand" href="../../index.html"><img src="../../images/logo.png" alt="Hallobun"><span>Hallobun Admin</span></a>
  <ul class="nb-nav" id="navLinks">
    <li><a href="../../index.html">Beranda</a></li>
    <li><a href="dashboard.html" class="active">Panel Admin</a></li>
  </ul>
  <div class="nb-act" id="navActions">
    <a href="../login.html" class="b-out">Keluar</a>
  </div>
  <button class="hbg" onclick="toggleNav()" aria-label="Menu"><span></span><span></span><span></span></button>
</nav>"""

def footer_root():
    return """<footer class="ft">
  <div class="ft-in">
    <div class="ft-g">
      <div class="ft-brand">
        <img class="ft-logo" src="images/logo.png" alt="Hallobun">
        <p>Platform tele-agronomi &amp; layanan kebun terpercaya. Konsultasi bersama praktisi agronom bersertifikasi Indonesia.</p>
      </div>
      <div class="ft-col"><h4>Layanan</h4><ul>
        <li><a href="pages/konsultasi.html">Konsultasi Online</a></li>
        <li><a href="pages/kunjungan.html">Kunjungan Lahan</a></li>
        <li><a href="pages/narsum.html">Undang Narsum</a></li>
        <li><a href="pages/sarana.html">Sarana Tani</a></li>
      </ul></div>
      <div class="ft-col"><h4>Akun</h4><ul>
        <li><a href="pages/login.html">Masuk</a></li>
        <li><a href="pages/register.html">Daftar</a></li>
        <li><a href="pages/dashboard.html">Dashboard</a></li>
        <li><a href="pages/admin/dashboard.html">Panel Admin</a></li>
      </ul></div>
      <div class="ft-col"><h4>Kontak</h4><ul>
        <li><a href="https://wa.me/6281234567890">WhatsApp CS</a></li>
        <li><a href="mailto:info@hallobun.com">info@hallobun.com</a></li>
        <li><a href="#">Instagram</a></li>
        <li><a href="#">YouTube</a></li>
      </ul></div>
    </div>
    <div class="ft-bot">
      <span>&copy; 2026 Hallobun Indonesia</span>
      <span>Seluruh hak dilindungi</span>
    </div>
  </div>
</footer>
<div class="wa"><a href="https://wa.me/6281234567890" target="_blank">
  <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
  WhatsApp CS
</a></div>
<script src="js/app.js"></script>"""

def footer_pages():
    return footer_root().replace('src="images/', 'src="../images/').replace('href="pages/', 'href="').replace('src="js/', 'src="../js/')

def footer_admin():
    return footer_pages().replace('src="../images/', 'src="../../images/').replace('src="../js/', 'src="../../js/').replace('href="../index.html"', 'href="../../index.html"')

def head(title, css_path, description="Hallobun - Platform Agronomi Indonesia"):
    return f"""<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="description" content="{description}">
<title>{title} — Hallobun</title>
<link rel="stylesheet" href="{css_path}css/style.css">
</head>
<body>"""

def write(path, content):
    os.makedirs(os.path.dirname(path), exist_ok=True)
    with open(path, "w", encoding="utf-8") as f:
        f.write(content)
    print(f"  OK  {path.replace(BASE+'/', '')}")

# ══════════════════════════════════════
# GLOBAL CSS
# ══════════════════════════════════════
CSS = """@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');
:root{--g:#16A34A;--gd:#15803D;--gx:#14532D;--gl:#F0FDF4;--g100:#BBF7D0;--s50:#F9FAFB;--s100:#F3F4F6;--s200:#E5E7EB;--s400:#9CA3AF;--s500:#6B7280;--s600:#4B5563;--s700:#374151;--s800:#1F2937;--s900:#111827;--r:10px;--shd:0 4px 16px rgba(0,0,0,.08);--shl:0 8px 32px rgba(0,0,0,.10)}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}html{scroll-behavior:smooth}
body{font-family:'Inter',-apple-system,BlinkMacSystemFont,sans-serif;color:var(--s800);background:#fff;line-height:1.6;font-size:15px;-webkit-font-smoothing:antialiased}
a{text-decoration:none;color:inherit}img{max-width:100%;display:block}button,input,select,textarea{font-family:inherit}
.nb{position:sticky;top:0;z-index:100;background:rgba(255,255,255,.95);backdrop-filter:blur(12px);border-bottom:1px solid var(--s200);padding:0 24px;height:64px;display:flex;align-items:center;justify-content:space-between}
.nb-brand{display:flex;align-items:center;gap:10px;font-weight:800;font-size:18px;color:var(--gx)}.nb-brand img{height:36px;width:auto}
.nb-nav{display:flex;align-items:center;gap:4px;list-style:none}.nb-nav a{padding:7px 12px;border-radius:8px;font-size:14px;font-weight:500;color:var(--s600);transition:all .18s}.nb-nav a:hover,.nb-nav a.active{background:var(--gl);color:var(--g)}
.nb-act{display:flex;align-items:center;gap:8px}
.b-out{padding:7px 16px;border:1.5px solid var(--s200);border-radius:8px;font-size:13px;font-weight:600;color:var(--s700);background:#fff;cursor:pointer;transition:all .18s;display:inline-flex;align-items:center}.b-out:hover{border-color:var(--g);color:var(--g)}
.b-grn{padding:7px 18px;border:none;border-radius:8px;font-size:13px;font-weight:700;color:#fff;background:var(--g);cursor:pointer;transition:all .18s;display:inline-flex;align-items:center}.b-grn:hover{background:var(--gd)}
.hbg{display:none;flex-direction:column;gap:5px;cursor:pointer;padding:4px;background:none;border:none}.hbg span{width:22px;height:2px;background:var(--s700);border-radius:2px;display:block}
.btn{display:inline-flex;align-items:center;justify-content:center;gap:7px;padding:11px 24px;border-radius:var(--r);font-size:14px;font-weight:700;border:none;cursor:pointer;transition:all .18s}
.btn-g{background:var(--g);color:#fff}.btn-g:hover{background:var(--gd);transform:translateY(-1px);box-shadow:0 4px 14px rgba(22,163,74,.3)}
.btn-w{background:#fff;color:var(--g);border:1.5px solid var(--g100)}.btn-w:hover{background:var(--gl)}
.btn-o{background:transparent;color:var(--s700);border:1.5px solid var(--s200)}.btn-o:hover{border-color:var(--g);color:var(--g)}
.btn-sm{padding:8px 16px;font-size:13px}.btn-lg{padding:14px 32px;font-size:15px}
.btn-red{background:#EF4444;color:#fff;border:none}.btn-red:hover{background:#DC2626}
.bdg{display:inline-flex;align-items:center;gap:5px;padding:4px 11px;border-radius:9999px;font-size:12px;font-weight:700}
.bdg-g{background:var(--gl);color:var(--g);border:1px solid var(--g100)}.bdg-b{background:#EFF6FF;color:#1D4ED8;border:1px solid #BFDBFE}.bdg-s{background:var(--s100);color:var(--s600);border:1px solid var(--s200)}
.dot{width:7px;height:7px;border-radius:50%;background:var(--g);animation:pulse 1.5s infinite;display:inline-block}@keyframes pulse{0%,100%{opacity:1}50%{opacity:.4}}
.card{background:#fff;border:1px solid var(--s200);border-radius:14px;overflow:hidden;transition:all .22s}.card:hover{box-shadow:var(--shd);transform:translateY(-2px)}.card-b{padding:20px}
.sec{padding:64px 24px}.sec-sm{padding:40px 24px}
.con{max-width:1200px;margin:0 auto}
.sec-ttl{font-size:28px;font-weight:800;color:var(--s900);margin-bottom:8px}.sec-sub{font-size:15px;color:var(--s500);max-width:560px}.sec-hd{text-align:center;margin-bottom:40px}
.grid{display:grid;gap:24px}.g2{grid-template-columns:repeat(2,1fr)}.g3{grid-template-columns:repeat(3,1fr)}.g4{grid-template-columns:repeat(4,1fr)}
.fg{margin-bottom:18px}.fl{display:block;font-size:13px;font-weight:600;color:var(--s700);margin-bottom:6px}
.fc{width:100%;padding:10px 14px;border:1.5px solid var(--s200);border-radius:9px;font-size:14px;color:var(--s800);background:#fff;transition:border-color .18s;outline:none}
.fc:focus{border-color:var(--g);box-shadow:0 0 0 3px rgba(22,163,74,.12)}
.tw{overflow-x:auto;border-radius:12px;border:1px solid var(--s200)}
table{width:100%;border-collapse:collapse;font-size:14px}thead th{background:var(--s50);color:var(--s500);font-weight:700;font-size:11px;text-transform:uppercase;letter-spacing:.6px;padding:12px 16px;text-align:left;border-bottom:1px solid var(--s200)}
tbody td{padding:13px 16px;border-bottom:1px solid var(--s100);vertical-align:middle;color:var(--s700)}tbody tr:last-child td{border-bottom:none}tbody tr:hover td{background:var(--s50)}
.alert{padding:12px 16px;border-radius:9px;font-size:14px;margin-bottom:16px}
.al-ok{background:var(--gl);color:var(--gd);border:1px solid var(--g100)}.al-er{background:#FEE2E2;color:#991B1B;border:1px solid #FECACA}.al-in{background:#EFF6FF;color:#1D4ED8;border:1px solid #BFDBFE}.al-wa{background:#FFFBEB;color:#92400E;border:1px solid #FDE68A}
.sts{display:inline-block;padding:3px 10px;border-radius:9999px;font-size:11.5px;font-weight:700}.sts-p{background:#FFFBEB;color:#92400E}.sts-c{background:var(--gl);color:var(--gd)}.sts-d{background:#EFF6FF;color:#1D4ED8}.sts-x{background:#FEE2E2;color:#991B1B}
.adm-lay{display:flex;min-height:100vh}
.sb{width:240px;background:var(--s900);color:#fff;flex-shrink:0;display:flex;flex-direction:column;position:sticky;top:0;height:100vh;overflow-y:auto}
.sb-hd{padding:20px;border-bottom:1px solid rgba(255,255,255,.08);display:flex;align-items:center;gap:10px}.sb-hd .bt{font-weight:800;font-size:15px}.sb-hd .bs{font-size:10px;color:rgba(255,255,255,.4)}
.sb-nav{padding:12px 8px;flex:1}.sb-nav a{display:flex;align-items:center;gap:10px;padding:10px 14px;border-radius:8px;color:rgba(255,255,255,.65);font-size:13.5px;font-weight:500;margin-bottom:2px;transition:all .15s}
.sb-nav a:hover{background:rgba(255,255,255,.06);color:#fff}.sb-nav a.active{background:rgba(22,163,74,.2);color:#4ADE80}
.sb-lbl{padding:12px 14px 4px;font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:1px;color:rgba(255,255,255,.3)}
.adm-main{flex:1;background:var(--s50);min-height:100vh}
.adm-top{background:#fff;padding:0 28px;height:60px;display:flex;align-items:center;justify-content:space-between;border-bottom:1px solid var(--s200);position:sticky;top:0;z-index:10}.adm-top h2{font-size:16px;font-weight:700;color:var(--s800)}
.adm-body{padding:28px}
.stat{background:#fff;border:1px solid var(--s200);border-radius:12px;padding:22px}.sv{font-size:30px;font-weight:900;color:var(--s900)}.sl{font-size:11.5px;color:var(--s400);font-weight:600;text-transform:uppercase;letter-spacing:.5px;margin-top:3px}
.ft{background:var(--s900);color:rgba(255,255,255,.65);padding:52px 24px 24px}.ft-in{max-width:1200px;margin:0 auto}
.ft-g{display:grid;grid-template-columns:2fr 1fr 1fr 1fr;gap:36px;margin-bottom:40px}
.ft-brand p{font-size:13px;line-height:1.7;margin-top:10px}.ft-col h4{color:#fff;font-size:13px;font-weight:700;margin-bottom:14px}
.ft-col ul{list-style:none}.ft-col ul li{margin-bottom:9px}.ft-col ul li a{font-size:13px;color:rgba(255,255,255,.55);transition:color .15s}.ft-col ul li a:hover{color:#4ADE80}
.ft-bot{border-top:1px solid rgba(255,255,255,.08);padding-top:22px;display:flex;justify-content:space-between;align-items:center;font-size:12px}
.ft-logo{height:32px;filter:brightness(0) invert(1)}
.hero{background:#fff;padding:52px 24px 60px;border-bottom:1px solid var(--s100)}
.hero-in{max-width:1200px;margin:0 auto;display:grid;grid-template-columns:1fr 1fr;gap:52px;align-items:center}
.hero-tag{display:inline-flex;align-items:center;gap:7px;background:var(--gl);border:1px solid var(--g100);padding:5px 14px;border-radius:9999px;font-size:12px;font-weight:700;color:var(--g);margin-bottom:18px}
.hero h1{font-size:44px;font-weight:900;line-height:1.12;color:var(--s900);margin-bottom:16px}.hero h1 span{color:var(--g)}
.hero-lead{font-size:15px;color:var(--s500);line-height:1.7;max-width:480px}
.hero-search{margin-top:24px;background:#fff;border:1.5px solid var(--s200);border-radius:14px;padding:5px;display:flex;align-items:center;gap:8px;transition:all .18s}.hero-search:focus-within{border-color:var(--g);box-shadow:0 0 0 4px rgba(22,163,74,.08)}.hero-search input{flex:1;border:none;outline:none;font-size:14px;padding:8px 12px;background:transparent;color:var(--s800)}
.hero-chips{display:flex;flex-wrap:wrap;gap:6px;margin-top:14px;align-items:center}.hero-chips .lbl{font-size:12px;color:var(--s400);font-weight:500}
.chip{font-size:12px;padding:4px 12px;border-radius:9999px;background:var(--s50);border:1px solid var(--s200);color:var(--s600);cursor:pointer;transition:all .15s}.chip:hover{background:var(--gl);color:var(--g);border-color:var(--g100)}
.hero-trust{display:flex;flex-wrap:wrap;gap:18px;margin-top:22px;font-size:13px;color:var(--s500)}.trust-it{display:flex;align-items:center;gap:6px}.chk{color:var(--g);font-weight:700}
.slider{position:relative;border-radius:18px;overflow:hidden;box-shadow:var(--shl)}
.s-track{display:flex;transition:transform .55s cubic-bezier(.4,0,.2,1)}.s-slide{flex-shrink:0;width:100%}.s-slide img{width:100%;height:360px;object-fit:cover}
.s-dots{position:absolute;bottom:14px;left:50%;transform:translateX(-50%);display:flex;gap:6px}
.s-dot{width:8px;height:8px;border-radius:50%;border:none;background:rgba(255,255,255,.5);cursor:pointer;transition:all .25s;padding:0}.s-dot.active{background:#fff;width:22px;border-radius:9999px}
.s-btn{position:absolute;top:50%;transform:translateY(-50%);background:rgba(255,255,255,.88);border:none;width:36px;height:36px;border-radius:50%;cursor:pointer;font-size:16px;display:flex;align-items:center;justify-content:center;transition:all .2s}.s-btn:hover{background:#fff;box-shadow:var(--shd)}.s-btn.prev{left:12px}.s-btn.next{right:12px}
.pk-card{background:#fff;border:1px solid var(--s200);border-radius:14px;overflow:hidden;transition:all .22s}.pk-card:hover{box-shadow:var(--shd);transform:translateY(-3px)}.pk-card img{width:100%;height:180px;object-fit:cover}.pk-b{padding:16px 18px}
.pk-name{font-weight:800;font-size:15px;color:var(--s900);margin-bottom:3px}.pk-spec{font-size:12px;color:var(--s500);margin-bottom:10px}
.pk-ft{display:flex;justify-content:space-between;align-items:center;padding-top:10px;border-top:1px solid var(--s100)}
.price{font-size:15px;font-weight:800;color:var(--g)}.price span{font-size:11px;font-weight:500;color:var(--s400)}.rating{display:flex;align-items:center;gap:3px;font-size:12px;color:var(--s500)}.star{color:#F59E0B}
.wa{position:fixed;bottom:24px;right:24px;z-index:999}.wa a{display:flex;align-items:center;gap:10px;background:#25D366;color:#fff;padding:12px 20px;border-radius:9999px;font-size:14px;font-weight:700;box-shadow:0 4px 20px rgba(37,211,102,.4);transition:all .2s}.wa a:hover{transform:scale(1.04)}
.ph{background:linear-gradient(135deg,var(--gx),var(--g));color:#fff;padding:44px 24px;text-align:center}.ph h1{font-size:32px;font-weight:800;margin-bottom:8px}.ph p{font-size:15px;opacity:.85;max-width:560px;margin:0 auto}
.ph-lt{background:var(--s50);color:var(--s900);border-bottom:1px solid var(--s200)}.ph-lt h1{color:var(--s900)}.ph-lt p{opacity:1;color:var(--s500)}
.mo{position:fixed;inset:0;background:rgba(0,0,0,.45);z-index:200;display:none;align-items:center;justify-content:center;padding:20px}.mo.open{display:flex}
.mo-box{background:#fff;border-radius:18px;width:100%;max-width:520px;padding:32px;position:relative;max-height:90vh;overflow-y:auto}
.mo-close{position:absolute;top:16px;right:16px;background:var(--s100);border:none;width:32px;height:32px;border-radius:50%;cursor:pointer;font-size:18px;display:flex;align-items:center;justify-content:center}
.tc{text-align:center}.tg{color:var(--g)}.tm{color:var(--s400)}.tsm{font-size:13px}.txs{font-size:11px}.fw7{font-weight:700}.fw8{font-weight:800}
.mt2{margin-top:8px}.mt4{margin-top:16px}.mt6{margin-top:24px}.mt8{margin-top:32px}.mb2{margin-bottom:8px}.mb4{margin-bottom:16px}.mb6{margin-bottom:24px}
.df{display:flex}.ac{align-items:center}.jc{justify-content:center}.jsb{justify-content:space-between}.g2x{gap:8px}.g3x{gap:12px}.g4x{gap:16px}.w100{width:100%}
hr.div{border:none;border-top:1px solid var(--s200);margin:24px 0}
@media(max-width:960px){.nb-nav,.nb-act{display:none}.hbg{display:flex}.nb-nav.open{display:flex;flex-direction:column;position:fixed;top:64px;left:0;right:0;background:#fff;padding:12px;border-bottom:1px solid var(--s200);z-index:99;box-shadow:var(--shd)}.nb-act.open{display:flex;justify-content:center;gap:8px;padding:12px}.hero-in{grid-template-columns:1fr;gap:28px}.hero h1{font-size:30px}.g3,.g4{grid-template-columns:repeat(2,1fr)}.ft-g{grid-template-columns:1fr 1fr}}
@media(max-width:600px){.g2,.g3,.g4{grid-template-columns:1fr}.sec{padding:40px 16px}.hero{padding:32px 16px 40px}.hero h1{font-size:26px}.ft-g{grid-template-columns:1fr}.sec-ttl{font-size:22px}.adm-lay{flex-direction:column}.sb{width:100%;height:auto;position:relative}.adm-top{padding:0 16px}.adm-body{padding:16px}}"""

with open(f"{BASE}/css/style.css", "w") as f:
    f.write(CSS)
print("OK css/style.css")

JS = """function toggleNav(){
  document.getElementById("navLinks").classList.toggle("open");
  document.getElementById("navActions").classList.toggle("open");
}
function initSlider(id){
  var wrap=document.getElementById(id);if(!wrap)return;
  var track=wrap.querySelector(".s-track");
  var slides=wrap.querySelectorAll(".s-slide");
  var dots=wrap.querySelectorAll(".s-dot");
  var cur=0,timer;
  function go(n){cur=(n+slides.length)%slides.length;track.style.transform="translateX(-"+cur*100+"%)";dots.forEach(function(d,i){d.classList.toggle("active",i===cur);})}
  function next(){go(cur+1)}function prev(){go(cur-1)}
  function auto(){timer=setInterval(next,4200)}
  dots.forEach(function(d,i){d.addEventListener("click",function(){clearInterval(timer);go(i);auto();});});
  var nb=wrap.querySelector(".s-btn.next");var pb=wrap.querySelector(".s-btn.prev");
  if(nb)nb.addEventListener("click",function(){clearInterval(timer);next();auto();});
  if(pb)pb.addEventListener("click",function(){clearInterval(timer);prev();auto();});
  wrap.addEventListener("mouseenter",function(){clearInterval(timer);});
  wrap.addEventListener("mouseleave",auto);
  go(0);auto();
}
function openModal(id){document.getElementById(id).classList.add("open")}
function closeModal(id){document.getElementById(id).classList.remove("open")}
function toast(msg,type){
  var t=document.createElement("div");
  t.style.cssText="position:fixed;top:80px;right:20px;z-index:9999;background:"+(type==="ok"?"#16A34A":"#EF4444")+";color:#fff;padding:12px 20px;border-radius:10px;font-size:14px;font-weight:600;box-shadow:0 4px 20px rgba(0,0,0,.15);animation:fadein .25s";
  t.textContent=msg;document.body.appendChild(t);setTimeout(function(){t.remove();},3000);
}"""
with open(f"{BASE}/js/app.js", "w") as f:
    f.write(JS)
print("OK js/app.js")

WA_SVG = '<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>'

def wa_btn(pfx):
    return f'<div class="wa"><a href="https://wa.me/6281234567890" target="_blank">{WA_SVG} WhatsApp CS</a></div>'

def ft(logo_pfx, js_pfx, page_pfx):
    return f"""<footer class="ft"><div class="ft-in">
  <div class="ft-g">
    <div class="ft-brand"><img class="ft-logo" src="{logo_pfx}images/logo.png" alt="Hallobun">
      <p>Platform tele-agronomi &amp; layanan kebun terpercaya. Konsultasi bersama praktisi agronom bersertifikasi Indonesia.</p></div>
    <div class="ft-col"><h4>Layanan</h4><ul>
      <li><a href="{page_pfx}konsultasi.html">Konsultasi Online</a></li>
      <li><a href="{page_pfx}kunjungan.html">Kunjungan Lahan</a></li>
      <li><a href="{page_pfx}narsum.html">Undang Narsum</a></li>
      <li><a href="{page_pfx}sarana.html">Sarana Tani</a></li>
    </ul></div>
    <div class="ft-col"><h4>Akun</h4><ul>
      <li><a href="{page_pfx}login.html">Masuk</a></li>
      <li><a href="{page_pfx}register.html">Daftar</a></li>
      <li><a href="{page_pfx}dashboard.html">Dashboard</a></li>
      <li><a href="{page_pfx}admin/dashboard.html">Panel Admin</a></li>
    </ul></div>
    <div class="ft-col"><h4>Kontak</h4><ul>
      <li><a href="https://wa.me/6281234567890">WhatsApp CS</a></li>
      <li><a href="mailto:info@hallobun.com">info@hallobun.com</a></li>
      <li><a href="#">Instagram</a></li><li><a href="#">YouTube</a></li>
    </ul></div>
  </div>
  <div class="ft-bot"><span>&copy; 2026 Hallobun Indonesia</span><span>Seluruh hak dilindungi</span></div>
</div></footer>
{wa_btn(logo_pfx)}
<script src="{js_pfx}js/app.js"></script>"""

# ══════════════════════════════════════
# INDEX.HTML
# ══════════════════════════════════════
slides = [
    ("halobun_real_practitioner.jpg","Praktisi agronom bersertifikasi Indonesia"),
    ("halobun_real_hydroponics.jpg","Solusi pertanian hidroponik modern"),
    ("halobun_real_pest_control.jpg","Pengendalian hama tanaman"),
    ("halobun_real_livestock.jpg","Peternakan terpadu"),
    ("halobun_real_training.jpg","Pelatihan teknis petani"),
]
slide_html = "".join(f'<div class="s-slide"><img src="images/{s[0]}" alt="{s[1]}"></div>' for s in slides)
dot_html = "".join(f'<button class="s-dot{"  active" if i==0 else ""}" aria-label="Slide {i+1}"></button>' for i,s in enumerate(slides))

praktisi = [
    ("Dr. Budi Santoso, M.Si","Penyakit &amp; Hama Tanaman","4.9","150.000","halobun_real_practitioner.jpg"),
    ("Ir. Siti Rahayu, M.P","Padi &amp; Palawija","4.8","120.000","halobun_praktisi_hero.jpg"),
    ("Prof. Ahmad Fauzi, Ph.D","Agronomi &amp; Kesuburan Tanah","5.0","200.000","halobun_real_practitioner_2.jpg"),
]
pk_html = ""
for p in praktisi:
    pk_html += f"""<div class="pk-card">
  <img src="images/{p[4]}" alt="{p[0]}">
  <div class="pk-b">
    <div class="pk-name">{p[0]}</div>
    <div class="pk-spec">&#127807; {p[1]}</div>
    <div class="pk-ft">
      <div class="price">Rp {p[2]}<span>/sesi</span></div>
      <div class="rating"><span class="star">&#11088;</span> {p[3]}</div>
    </div>
    <a href="pages/konsultasi.html" class="btn btn-g w100 mt4" style="justify-content:center">Booking Konsultasi</a>
  </div>
</div>"""

services = [
    ("&#128187;","Konsultasi Online","Sesi video call real-time dengan agronom ahli. Konsultasi hama, penyakit, nutrisi, dan teknik berkebun.","pages/konsultasi.html","Mulai Konsultasi"),
    ("&#127968;","Kunjungan Lahan","Tim agronom datang langsung ke kebun Anda untuk inspeksi fisik, audit tanah, dan rekomendasi.","pages/kunjungan.html","Jadwalkan Kunjungan"),
    ("&#127891;","Undang Narasumber","Hadirkan pakar agronomi untuk workshop, bimtek poktan, webinar, atau seminar komunitas berkebun.","pages/narsum.html","Undang Narsum"),
    ("&#127807;","Sarana Tani","Bibit bersertifikat, pupuk organik, pestisida nabati, dan alat berkebun berkualitas.","pages/sarana.html","Lihat Produk"),
]
svc_html = ""
for s in services:
    svc_html += f"""<div class="card"><div class="card-b">
  <div style="font-size:36px;margin-bottom:12px">{s[0]}</div>
  <div style="font-weight:800;font-size:16px;margin-bottom:8px;color:var(--s900)">{s[1]}</div>
  <p style="font-size:13.5px;color:var(--s500);line-height:1.6;margin-bottom:16px">{s[2]}</p>
  <a href="{s[3]}" class="btn btn-g btn-sm">{s[4]}</a>
</div></div>"""

index_html = f"""<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="description" content="Platform tele-agronomi dan bimbingan berkebun terpercaya. Konsultasi agronom via video call, kunjungan lahan, narsum, dan sarana tani.">
<title>Solusi Perawatan Kebun &amp; Pertanian &#8212; Hallobun</title>
<link rel="stylesheet" href="css/style.css">
</head><body>
{nav_root()}
<section class="hero">
  <div class="hero-in">
    <div>
      <div class="hero-tag"><span class="dot"></span> Tele-Agronomi &amp; Layanan Kebun #1 Indonesia</div>
      <h1>Perawatan Kebun &amp; Tanaman<br><span>Bersama Praktisi Ahli</span></h1>
      <p class="hero-lead">Konsultasi langsung via video call, inspeksi lahan fisik, hingga penyediaan bibit dan nutrisi organik terpercaya.</p>
      <div class="hero-search">
        <svg width="16" height="16" fill="none" stroke="#9CA3AF" stroke-width="2.2" viewBox="0 0 24 24" style="flex-shrink:0;margin-left:8px"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        <input type="text" placeholder="Cari praktisi, tanaman, atau kendala hama...">
        <a href="pages/konsultasi.html" class="btn btn-g btn-sm">Cari Solusi</a>
      </div>
      <div class="hero-chips">
        <span class="lbl">Populer:</span>
        <a href="pages/konsultasi.html" class="chip">&#128027; Kutu Putih</a>
        <a href="pages/konsultasi.html" class="chip">&#127810; Daun Kuning</a>
        <a href="pages/sarana.html" class="chip">&#127807; Pupuk Organik</a>
        <a href="pages/konsultasi.html" class="chip">&#129388; Hidroponik</a>
      </div>
      <div class="hero-trust">
        <div class="trust-it"><span class="chk">&#10003;</span> Respon Cepat</div>
        <div class="trust-it"><span class="chk">&#10003;</span> Praktisi Bersertifikasi</div>
        <div class="trust-it"><span class="chk">&#10003;</span> Tarif Terjangkau</div>
      </div>
    </div>
    <div class="slider" id="heroSlider">
      <div class="s-track">{slide_html}</div>
      <button class="s-btn prev">&#8592;</button>
      <button class="s-btn next">&#8594;</button>
      <div class="s-dots">{dot_html}</div>
    </div>
  </div>
</section>

<section class="sec-sm" style="background:var(--s50);border-bottom:1px solid var(--s200)">
  <div class="con"><div class="grid g4" style="text-align:center">
    <div><div style="font-size:28px;font-weight:900;color:var(--g)">500+</div><div class="tsm" style="color:var(--s500)">Petani Terbantu</div></div>
    <div><div style="font-size:28px;font-weight:900;color:var(--g)">6</div><div class="tsm" style="color:var(--s500)">Praktisi Ahli</div></div>
    <div><div style="font-size:28px;font-weight:900;color:var(--g)">4.9&#9733;</div><div class="tsm" style="color:var(--s500)">Rating Rata-rata</div></div>
    <div><div style="font-size:28px;font-weight:900;color:var(--g)">24/7</div><div class="tsm" style="color:var(--s500)">Dukungan WhatsApp</div></div>
  </div></div>
</section>

<section class="sec"><div class="con">
  <div class="sec-hd"><div class="sec-ttl">Layanan Kami</div>
    <p class="sec-sub">Solusi lengkap untuk kebutuhan kebun dan pertanian dari konsultasi hingga pengadaan sarana tani.</p></div>
  <div class="grid g4">{svc_html}</div>
</div></section>

<section class="sec" style="background:var(--s50)"><div class="con">
  <div class="sec-hd"><div class="sec-ttl">Praktisi Unggulan</div>
    <p class="sec-sub">Konsultasi langsung dengan pakar agronom bersertifikasi nasional.</p></div>
  <div class="grid g3">{pk_html}</div>
  <div class="tc mt8"><a href="pages/konsultasi.html" class="btn btn-g btn-lg">Lihat Semua Praktisi</a></div>
</div></section>

<section class="sec"><div class="con">
  <div class="sec-hd"><div class="sec-ttl">Cara Kerja</div><p class="sec-sub">Mulai konsultasi dalam 3 langkah mudah.</p></div>
  <div class="grid g3">
    <div style="text-align:center;padding:24px"><div style="width:56px;height:56px;background:var(--gl);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;font-size:24px">&#128269;</div><div style="font-weight:800;font-size:16px;margin-bottom:8px">1. Pilih Praktisi</div><p class="tsm" style="color:var(--s500)">Jelajahi profil praktisi ahli sesuai kebutuhan tanaman atau permasalahan kebun Anda.</p></div>
    <div style="text-align:center;padding:24px"><div style="width:56px;height:56px;background:var(--gl);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;font-size:24px">&#128197;</div><div style="font-weight:800;font-size:16px;margin-bottom:8px">2. Booking &amp; Bayar</div><p class="tsm" style="color:var(--s500)">Tentukan jadwal sesi dan selesaikan pembayaran aman via QRIS atau Transfer Bank.</p></div>
    <div style="text-align:center;padding:24px"><div style="width:56px;height:56px;background:var(--gl);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;font-size:24px">&#128172;</div><div style="font-weight:800;font-size:16px;margin-bottom:8px">3. Konsultasi Video Call</div><p class="tsm" style="color:var(--s500)">Tautan video call dikirim otomatis ke WhatsApp. Mulai sesi langsung dengan praktisi ahli.</p></div>
  </div>
</div></section>

<section class="sec-sm" style="background:linear-gradient(135deg,var(--gx),var(--g));color:#fff"><div class="con tc">
  <div style="font-size:28px;font-weight:800;margin-bottom:10px">Siap Merawat Kebun Anda?</div>
  <p style="opacity:.85;margin-bottom:24px;font-size:15px">Bergabung bersama 500+ petani dan pecinta tanaman yang sudah merasakan manfaat Hallobun.</p>
  <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap">
    <a href="pages/register.html" class="btn btn-w btn-lg">Daftar Sekarang</a>
    <a href="pages/konsultasi.html" class="btn btn-lg" style="background:rgba(255,255,255,.15);color:#fff;border:1.5px solid rgba(255,255,255,.4)">Lihat Praktisi</a>
  </div>
</div></section>

{ft("", "js/app.js", "pages/")}
<script>initSlider("heroSlider")</script>
</body></html>"""

write(f"{BASE}/index.html", index_html)

# ══════════════════════════════════════
# KONSULTASI.HTML
# ══════════════════════════════════════
pk_list = [
    ("Dr. Budi Santoso, M.Si","Penyakit &amp; Hama Tanaman","8 tahun","4.9","150.000","halobun_real_practitioner.jpg","Senin-Jumat, 08.00-17.00"),
    ("Ir. Siti Rahayu, M.P","Padi &amp; Palawija","6 tahun","4.8","120.000","halobun_praktisi_hero.jpg","Senin-Sabtu, 09.00-16.00"),
    ("Prof. Ahmad Fauzi, Ph.D","Agronomi &amp; Kesuburan Tanah","15 tahun","5.0","200.000","halobun_real_practitioner_2.jpg","Selasa-Kamis, 10.00-15.00"),
    ("Dr. Dewi Lestari, M.Si","Hortikultura &amp; Florikultura","10 tahun","4.7","130.000","halobun_hero_halodoc.jpg","Senin-Jumat, 08.00-17.00"),
    ("Ir. Rudi Hartono, M.P","Perkebunan &amp; Tanaman Industri","12 tahun","4.9","175.000","halobun_real_sarana.jpg","Senin-Jumat, 09.00-16.00"),
    ("Dr. Nina Kusuma, M.Si","Pertanian Organik &amp; Agroekologi","7 tahun","4.8","160.000","dashboard_praktisi_banner.jpg","Rabu-Sabtu, 09.00-15.00"),
]
pk_cards = ""
for p in pk_list:
    pk_cards += f"""<div class="pk-card">
  <img src="../images/{p[5]}" alt="{p[0]}">
  <div class="pk-b">
    <div class="pk-name">{p[0]}</div>
    <div class="pk-spec">&#127807; {p[1]} &bull; {p[2]} pengalaman</div>
    <div style="font-size:12px;color:var(--s500);margin-bottom:10px">&#128336; {p[6]}</div>
    <div class="pk-ft">
      <div class="price">Rp {p[4]}<span>/sesi</span></div>
      <div class="rating"><span class="star">&#11088;</span> {p[3]}</div>
    </div>
    <button onclick="openModal('bookModal')" class="btn btn-g w100 mt4" style="justify-content:center">Booking Konsultasi</button>
  </div>
</div>"""

konsultasi_html = f"""<!DOCTYPE html>
<html lang="id"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Konsultasi Agronom Online &#8212; Hallobun</title>
<link rel="stylesheet" href="../css/style.css">
</head><body>
{nav_pages("konsultasi.html")}
<div class="ph"><div class="con"><h1>&#128187; Konsultasi Agronom Online</h1><p>Pilih praktisi ahli dan booking sesi video call. Konsultasi hama, penyakit, nutrisi, dan teknik berkebun langsung dengan pakar.</p></div></div>
<section class="sec"><div class="con">
  <div style="display:flex;gap:12px;margin-bottom:28px;flex-wrap:wrap;align-items:center">
    <input type="text" class="fc" placeholder="&#128269; Cari praktisi atau spesialisasi..." style="max-width:360px">
    <select class="fc" style="max-width:200px">
      <option>Semua Spesialisasi</option>
      <option>Hama &amp; Penyakit</option>
      <option>Padi &amp; Palawija</option>
      <option>Hortikultura</option>
      <option>Perkebunan</option>
      <option>Pertanian Organik</option>
    </select>
    <select class="fc" style="max-width:180px">
      <option>Semua Harga</option>
      <option>Di bawah Rp 150.000</option>
      <option>Rp 150.000 - 200.000</option>
      <option>Di atas Rp 200.000</option>
    </select>
  </div>
  <div class="grid g3">{pk_cards}</div>
</div></section>

<div class="mo" id="bookModal">
  <div class="mo-box">
    <button class="mo-close" onclick="closeModal('bookModal')">&#215;</button>
    <div style="font-weight:800;font-size:20px;margin-bottom:4px">Booking Konsultasi</div>
    <p class="tsm" style="color:var(--s500);margin-bottom:20px">Isi data berikut untuk memesan sesi konsultasi video call.</p>
    <div class="fg"><label class="fl">Nama Lengkap</label><input type="text" class="fc" placeholder="Nama Anda"></div>
    <div class="fg"><label class="fl">WhatsApp Aktif</label><input type="tel" class="fc" placeholder="08xx-xxxx-xxxx"></div>
    <div class="fg"><label class="fl">Tanggal Sesi</label><input type="date" class="fc"></div>
    <div class="fg"><label class="fl">Waktu Sesi</label><select class="fc"><option>08.00 WIB</option><option>09.00 WIB</option><option>10.00 WIB</option><option>14.00 WIB</option><option>15.00 WIB</option></select></div>
    <div class="fg"><label class="fl">Deskripsi Masalah</label><textarea class="fc" rows="3" placeholder="Ceritakan kendala tanaman Anda..."></textarea></div>
    <div class="alert al-in">&#128139; Link video call Jitsi Meet akan dikirim otomatis ke WhatsApp Anda setelah pembayaran selesai.</div>
    <button onclick="toast('Booking berhasil! Kami akan menghubungi Anda via WhatsApp.','ok');closeModal('bookModal')" class="btn btn-g w100">Konfirmasi Booking &amp; Bayar</button>
  </div>
</div>

{ft("../", "../js/app.js", "")}
</body></html>"""
write(f"{BASE}/pages/konsultasi.html", konsultasi_html)

# ══════════════════════════════════════
# KUNJUNGAN.HTML
# ══════════════════════════════════════
kunjungan_html = f"""<!DOCTYPE html>
<html lang="id"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Kunjungan Lahan &#8212; Hallobun</title>
<link rel="stylesheet" href="../css/style.css">
</head><body>
{nav_pages("kunjungan.html")}
<div class="ph"><div class="con"><h1>&#127968; Kunjungan Lahan</h1><p>Tim agronom kami datang langsung ke lokasi kebun Anda untuk inspeksi fisik, audit tanah, dan rekomendasi penanganan komprehensif.</p></div></div>
<section class="sec"><div class="con">
  <div class="grid g2" style="gap:40px;align-items:start">
    <div>
      <div class="sec-ttl mb4">Pesan Kunjungan Lahan</div>
      <p class="tsm" style="color:var(--s500);margin-bottom:24px">Isi formulir berikut. Tim kami akan menghubungi Anda dalam 1x24 jam untuk konfirmasi jadwal dan estimasi biaya.</p>
      <div class="fg"><label class="fl">Nama Lengkap *</label><input type="text" class="fc" placeholder="Nama pemilik kebun"></div>
      <div class="fg"><label class="fl">WhatsApp Aktif *</label><input type="tel" class="fc" placeholder="08xx-xxxx-xxxx"></div>
      <div class="fg"><label class="fl">Email</label><input type="email" class="fc" placeholder="email@contoh.com"></div>
      <div class="fg"><label class="fl">Alamat Lengkap Lokasi Kebun *</label><textarea class="fc" rows="2" placeholder="Jalan, Desa/Kelurahan, Kecamatan, Kabupaten, Provinsi"></textarea></div>
      <div class="grid g2" style="gap:12px">
        <div class="fg"><label class="fl">Luas Lahan (Ha)</label><input type="number" class="fc" placeholder="Contoh: 0.5"></div>
        <div class="fg"><label class="fl">Jenis Tanaman Utama</label><input type="text" class="fc" placeholder="Contoh: Cabai, Padi"></div>
      </div>
      <div class="fg"><label class="fl">Jenis Layanan Kunjungan</label>
        <select class="fc">
          <option>Inspeksi Hama &amp; Penyakit</option>
          <option>Audit Kesuburan Tanah</option>
          <option>Konsultasi Sistem Tanam</option>
          <option>Evaluasi Sistem Irigasi</option>
          <option>Kunjungan Komprehensif (Semua Aspek)</option>
        </select>
      </div>
      <div class="fg"><label class="fl">Tanggal Kunjungan Diinginkan</label><input type="date" class="fc"></div>
      <div class="fg"><label class="fl">Deskripsi Kendala / Tujuan Kunjungan</label><textarea class="fc" rows="3" placeholder="Jelaskan permasalahan atau tujuan kunjungan lahan Anda..."></textarea></div>
      <div class="alert al-in">&#128204; Tim kami melayani wilayah Jawa, Bali, dan Sumatera. Untuk luar pulau, hubungi WhatsApp CS terlebih dahulu.</div>
      <button onclick="toast('Permintaan kunjungan berhasil! Tim kami akan menghubungi Anda.','ok')" class="btn btn-g btn-lg w100">Kirim Permintaan Kunjungan</button>
    </div>
    <div>
      <img src="../images/halobun_real_hydroponics.jpg" alt="Kunjungan Lahan" style="border-radius:16px;width:100%;margin-bottom:20px">
      <div class="card"><div class="card-b">
        <div style="font-weight:800;font-size:16px;margin-bottom:12px">&#128204; Cakupan Layanan Kunjungan</div>
        <ul style="list-style:none;font-size:14px;color:var(--s600);line-height:2">
          <li>&#10003; Identifikasi visual hama &amp; penyakit tanaman</li>
          <li>&#10003; Pengambilan sampel tanah untuk uji laboratorium</li>
          <li>&#10003; Penilaian sistem irigasi dan drainase</li>
          <li>&#10003; Rekomendasi tertulis pasca kunjungan</li>
          <li>&#10003; Konsultasi lanjutan 30 hari via WhatsApp</li>
        </ul>
        <hr class="div">
        <div style="font-size:13px;color:var(--s500)">&#128197; Proses booking 1-3 hari kerja &bull; &#128664; Tim datang ke lokasi Anda</div>
      </div></div>
      <div class="card" style="margin-top:16px"><div class="card-b">
        <div style="font-weight:800;font-size:14px;margin-bottom:8px">&#128181; Estimasi Biaya</div>
        <div style="font-size:13px;color:var(--s600);line-height:1.8">
          <div style="display:flex;justify-content:space-between"><span>Kunjungan Standar (&lt;1 Ha)</span><span class="tg fw7">Rp 350.000</span></div>
          <div style="display:flex;justify-content:space-between"><span>Kunjungan Lanjutan (1-5 Ha)</span><span class="tg fw7">Rp 600.000</span></div>
          <div style="display:flex;justify-content:space-between"><span>Kunjungan Komprehensif (&gt;5 Ha)</span><span class="tg fw7">Hubungi CS</span></div>
          <div style="font-size:11px;color:var(--s400);margin-top:8px">*Biaya transportasi di luar Jawa Tengah dikenakan tambahan</div>
        </div>
      </div></div>
    </div>
  </div>
</div></section>
{ft("../", "../js/app.js", "")}
</body></html>"""
write(f"{BASE}/pages/kunjungan.html", kunjungan_html)

# ══════════════════════════════════════
# NARSUM.HTML
# ══════════════════════════════════════
narsum_html = f"""<!DOCTYPE html>
<html lang="id"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Undang Narasumber &#8212; Hallobun</title>
<link rel="stylesheet" href="../css/style.css">
</head><body>
{nav_pages("narsum.html")}
<div class="ph"><div class="con"><h1>&#127891; Undang Narasumber</h1><p>Hadirkan pakar agronomi bersertifikasi untuk workshop, bimtek poktan, webinar, atau seminar komunitas berkebun Anda.</p></div></div>
<section class="sec"><div class="con">
  <div class="grid g2" style="gap:40px;align-items:start">
    <div>
      <div class="sec-ttl mb4">Form Permintaan Narasumber</div>
      <p class="tsm" style="color:var(--s500);margin-bottom:24px">Isi form berikut dan tim Hallobun akan menghubungi Anda dalam 1 hari kerja dengan penawaran narasumber yang sesuai.</p>
      <div class="fg"><label class="fl">Nama Penyelenggara / Organisasi *</label><input type="text" class="fc" placeholder="Nama lembaga/poktan/institusi Anda"></div>
      <div class="fg"><label class="fl">Nama Pic &amp; WhatsApp *</label><input type="text" class="fc" placeholder="Nama Anda - 08xx-xxxx-xxxx"></div>
      <div class="fg"><label class="fl">Email</label><input type="email" class="fc" placeholder="email@contoh.com"></div>
      <div class="fg"><label class="fl">Jenis Kegiatan *</label>
        <select class="fc">
          <option>Workshop / Pelatihan Praktis</option>
          <option>Bimbingan Teknis (Bimtek) Poktan</option>
          <option>Webinar Online</option>
          <option>Seminar / Konferensi</option>
          <option>Kuliah Tamu / Guest Lecture</option>
          <option>Lainnya</option>
        </select>
      </div>
      <div class="fg"><label class="fl">Topik / Materi yang Diinginkan *</label><input type="text" class="fc" placeholder="Contoh: Pengendalian Hama Terpadu (PHT) pada Cabai"></div>
      <div class="grid g2" style="gap:12px">
        <div class="fg"><label class="fl">Tanggal Kegiatan</label><input type="date" class="fc"></div>
        <div class="fg"><label class="fl">Durasi</label><select class="fc"><option>1 jam</option><option>2 jam</option><option>Half-day (4 jam)</option><option>Full-day (8 jam)</option></select></div>
      </div>
      <div class="fg"><label class="fl">Lokasi Kegiatan</label><input type="text" class="fc" placeholder="Online (Zoom/Meet) atau offline (kota, tempat)"></div>
      <div class="fg"><label class="fl">Estimasi Jumlah Peserta</label><input type="number" class="fc" placeholder="Contoh: 50"></div>
      <div class="fg"><label class="fl">Anggaran yang Tersedia (opsional)</label><input type="text" class="fc" placeholder="Contoh: Rp 1.500.000"></div>
      <div class="fg"><label class="fl">Keterangan Tambahan</label><textarea class="fc" rows="3" placeholder="Informasi tambahan mengenai kegiatan Anda..."></textarea></div>
      <button onclick="toast('Permintaan narasumber berhasil dikirim! Tim kami akan segera menghubungi Anda.','ok')" class="btn btn-g btn-lg w100">Kirim Permintaan Narasumber</button>
    </div>
    <div>
      <img src="../images/halobun_real_training.jpg" alt="Narasumber" style="border-radius:16px;width:100%;margin-bottom:20px">
      <div class="card"><div class="card-b">
        <div style="font-weight:800;font-size:15px;margin-bottom:12px">Topik Narasumber Populer</div>
        <div style="display:flex;flex-wrap:wrap;gap:8px">
          <span class="bdg bdg-g">Pengendalian Hama Terpadu</span>
          <span class="bdg bdg-g">Pertanian Organik Bersertifikat</span>
          <span class="bdg bdg-g">Sistem Hidroponik Modern</span>
          <span class="bdg bdg-g">Manajemen Nutrisi Tanaman</span>
          <span class="bdg bdg-g">Budidaya Padi SRI</span>
          <span class="bdg bdg-g">Agribisnis &amp; Pemasaran Hasil Tani</span>
          <span class="bdg bdg-g">Urban Farming</span>
          <span class="bdg bdg-g">Pupuk &amp; Pengomposan</span>
        </div>
      </div></div>
      <div class="card" style="margin-top:16px"><div class="card-b">
        <div style="font-weight:800;font-size:14px;margin-bottom:8px">&#128181; Tarif Narasumber</div>
        <div style="font-size:13px;color:var(--s600);line-height:1.9">
          <div style="display:flex;justify-content:space-between"><span>Webinar Online (1-2 jam)</span><span class="tg fw7">Rp 1.000.000</span></div>
          <div style="display:flex;justify-content:space-between"><span>Workshop Offline (half-day)</span><span class="tg fw7">Rp 2.500.000</span></div>
          <div style="display:flex;justify-content:space-between"><span>Bimtek Full-day</span><span class="tg fw7">Rp 4.000.000</span></div>
          <div style="display:flex;justify-content:space-between"><span>Seminar / Konferensi</span><span class="tg fw7">Nego</span></div>
          <div style="font-size:11px;color:var(--s400);margin-top:8px">*Biaya transportasi dan akomodasi di luar tarif</div>
        </div>
      </div></div>
    </div>
  </div>
</div></section>
{ft("../", "../js/app.js", "")}
</body></html>"""
write(f"{BASE}/pages/narsum.html", narsum_html)

# ══════════════════════════════════════
# SARANA.HTML
# ══════════════════════════════════════
products = [
    ("Bibit Cabai Merah TW Super","Varietas unggulan, tahan virus, produktivitas tinggi","halobun_real_sarana.jpg","45.000","Bibit","Tersedia"),
    ("Pupuk NPK Organik 25Kg","Formulasi khusus sayuran dan buah. Memperkuat akar.","halobun_real_hydroponics.jpg","185.000","Pupuk","Tersedia"),
    ("Pestisida Nabati Neem Oil","Pengendali hama organik dari biji nimba. Aman lingkungan.","halobun_real_pest_control.jpg","75.000","Pestisida","Tersedia"),
    ("Kit Nutrisi Hidroponik AB","Larutan nutrisi lengkap untuk sistem NFT dan DFT.","halobun_real_soil_test.jpg","125.000","Nutrisi","Tersedia"),
    ("Bibit Tomat Cherry Premium","Cocok untuk pot dan greenhouse, produktif sepanjang tahun.","halobun_real_practitioner.jpg","35.000","Bibit","Habis"),
    ("Soil Test Kit Digital","Uji pH, NPK, dan kelembaban tanah secara instan.","halobun_hero_halodoc.jpg","350.000","Alat","Tersedia"),
]
prod_cards = ""
for p in products:
    stk_cls = "sts-c" if p[5]=="Tersedia" else "sts-x"
    prod_cards += f"""<div class="card"><div class="card-b">
  <img src="../images/{p[2]}" alt="{p[0]}" style="width:100%;height:180px;object-fit:cover;border-radius:10px;margin-bottom:14px">
  <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:6px">
    <span class="bdg bdg-g" style="font-size:11px">{p[4]}</span>
    <span class="sts {stk_cls}">{p[5]}</span>
  </div>
  <div style="font-weight:800;font-size:15px;margin-bottom:6px;color:var(--s900)">{p[0]}</div>
  <p style="font-size:13px;color:var(--s500);margin-bottom:14px;line-height:1.5">{p[1]}</p>
  <div style="display:flex;justify-content:space-between;align-items:center">
    <div style="font-size:17px;font-weight:800;color:var(--g)">Rp {p[3]}</div>
    <a href="https://wa.me/6281234567890?text=Halo, saya ingin memesan {p[0]}" target="_blank" class="btn btn-g btn-sm">Pesan via WA</a>
  </div>
</div></div>"""

sarana_html = f"""<!DOCTYPE html>
<html lang="id"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Sarana Tani &#8212; Hallobun</title>
<link rel="stylesheet" href="../css/style.css">
</head><body>
{nav_pages("sarana.html")}
<div class="ph"><div class="con"><h1>&#127807; Sarana Tani</h1><p>Bibit bersertifikat, pupuk organik, pestisida nabati, dan alat berkebun berkualitas. Pesan mudah via WhatsApp.</p></div></div>
<section class="sec"><div class="con">
  <div style="display:flex;gap:12px;margin-bottom:28px;flex-wrap:wrap;align-items:center">
    <input type="text" class="fc" placeholder="&#128269; Cari produk..." style="max-width:320px">
    <select class="fc" style="max-width:180px">
      <option>Semua Kategori</option>
      <option>Bibit</option>
      <option>Pupuk</option>
      <option>Pestisida</option>
      <option>Nutrisi</option>
      <option>Alat</option>
    </select>
    <select class="fc" style="max-width:160px">
      <option>Semua Harga</option>
      <option>Di bawah Rp 100.000</option>
      <option>Rp 100.000 - 300.000</option>
      <option>Di atas Rp 300.000</option>
    </select>
  </div>
  <div class="grid g3">{prod_cards}</div>
  <div class="alert al-in" style="margin-top:24px">&#128518; Pemesanan dilayani via WhatsApp CS. Pengiriman ke seluruh Indonesia. Min. order &amp; ongkir sesuai kesepakatan.</div>
</div></section>
{ft("../", "../js/app.js", "")}
</body></html>"""
write(f"{BASE}/pages/sarana.html", sarana_html)

# ══════════════════════════════════════
# LOGIN.HTML
# ══════════════════════════════════════
login_html = f"""<!DOCTYPE html>
<html lang="id"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Masuk &#8212; Hallobun</title>
<link rel="stylesheet" href="../css/style.css">
</head><body style="background:var(--s50)">
{nav_pages()}
<div style="min-height:calc(100vh - 64px);display:flex;align-items:center;justify-content:center;padding:32px 16px">
  <div style="width:100%;max-width:420px">
    <div style="text-align:center;margin-bottom:28px">
      <img src="../images/logo.png" alt="Hallobun" style="height:44px;margin:0 auto 12px">
      <div style="font-size:22px;font-weight:800;color:var(--s900)">Masuk ke Hallobun</div>
      <p class="tsm" style="color:var(--s500)">Akses dashboard dan layanan Anda</p>
    </div>
    <div style="background:#fff;border:1px solid var(--s200);border-radius:16px;padding:28px">
      <div class="fg"><label class="fl">Email</label><input type="email" class="fc" placeholder="email@contoh.com"></div>
      <div class="fg"><label class="fl">Password</label><input type="password" class="fc" placeholder="Masukkan password"></div>
      <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px">
        <label style="display:flex;align-items:center;gap:6px;font-size:13px;cursor:pointer"><input type="checkbox"> Ingat saya</label>
        <a href="#" style="font-size:13px;color:var(--g)">Lupa password?</a>
      </div>
      <button onclick="window.location.href='dashboard.html'" class="btn btn-g w100">Masuk</button>
      <div style="text-align:center;margin-top:16px;font-size:13px;color:var(--s500)">Belum punya akun? <a href="register.html" style="color:var(--g);font-weight:700">Daftar gratis</a></div>
      <hr class="div">
      <div style="text-align:center;font-size:12px;color:var(--s400);margin-bottom:10px">Atau masuk sebagai</div>
      <a href="admin/dashboard.html" class="btn btn-o w100 btn-sm">&#128274; Panel Admin</a>
    </div>
  </div>
</div>
{ft("../", "../js/app.js", "")}
</body></html>"""
write(f"{BASE}/pages/login.html", login_html)

# ══════════════════════════════════════
# REGISTER.HTML
# ══════════════════════════════════════
register_html = f"""<!DOCTYPE html>
<html lang="id"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Daftar &#8212; Hallobun</title>
<link rel="stylesheet" href="../css/style.css">
</head><body style="background:var(--s50)">
{nav_pages()}
<div style="min-height:calc(100vh - 64px);display:flex;align-items:center;justify-content:center;padding:32px 16px">
  <div style="width:100%;max-width:480px">
    <div style="text-align:center;margin-bottom:28px">
      <img src="../images/logo.png" alt="Hallobun" style="height:44px;margin:0 auto 12px">
      <div style="font-size:22px;font-weight:800;color:var(--s900)">Buat Akun Hallobun</div>
      <p class="tsm" style="color:var(--s500)">Gratis selamanya. Bergabung dengan 500+ petani Indonesia.</p>
    </div>
    <div style="background:#fff;border:1px solid var(--s200);border-radius:16px;padding:28px">
      <div class="grid g2" style="gap:12px">
        <div class="fg"><label class="fl">Nama Depan</label><input type="text" class="fc" placeholder="Budi"></div>
        <div class="fg"><label class="fl">Nama Belakang</label><input type="text" class="fc" placeholder="Santoso"></div>
      </div>
      <div class="fg"><label class="fl">Email *</label><input type="email" class="fc" placeholder="email@contoh.com"></div>
      <div class="fg"><label class="fl">WhatsApp *</label><input type="tel" class="fc" placeholder="08xx-xxxx-xxxx"></div>
      <div class="fg"><label class="fl">Password *</label><input type="password" class="fc" placeholder="Min. 8 karakter"></div>
      <div class="fg"><label class="fl">Konfirmasi Password *</label><input type="password" class="fc" placeholder="Ulangi password"></div>
      <div class="fg"><label class="fl">Saya mendaftar sebagai</label>
        <select class="fc"><option>Petani / Pecinta Tanaman</option><option>Pemilik Kebun / Lahan</option><option>Pelaku Usaha Pertanian</option><option>Pelajar / Mahasiswa</option></select>
      </div>
      <div style="margin-bottom:20px;font-size:13px;color:var(--s500)"><label style="display:flex;align-items:flex-start;gap:8px;cursor:pointer"><input type="checkbox" style="margin-top:3px"> Saya menyetujui <a href="#" style="color:var(--g)">Syarat &amp; Ketentuan</a> dan <a href="#" style="color:var(--g)">Kebijakan Privasi</a> Hallobun.</label></div>
      <button onclick="window.location.href='dashboard.html'" class="btn btn-g w100">Buat Akun Sekarang</button>
      <div style="text-align:center;margin-top:16px;font-size:13px;color:var(--s500)">Sudah punya akun? <a href="login.html" style="color:var(--g);font-weight:700">Masuk</a></div>
    </div>
  </div>
</div>
{ft("../", "../js/app.js", "")}
</body></html>"""
write(f"{BASE}/pages/register.html", register_html)

# ══════════════════════════════════════
# DASHBOARD.HTML (USER)
# ══════════════════════════════════════
dashboard_html = f"""<!DOCTYPE html>
<html lang="id"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Dashboard &#8212; Hallobun</title>
<link rel="stylesheet" href="../css/style.css">
</head><body>
{nav_pages()}
<div style="background:linear-gradient(135deg,var(--gx),var(--g));color:#fff;padding:32px 24px">
  <div class="con" style="display:flex;align-items:center;gap:20px">
    <div style="width:56px;height:56px;background:rgba(255,255,255,.2);border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:24px">&#128100;</div>
    <div><div style="font-size:20px;font-weight:800">Halo, Budi Santoso &#128075;</div><p style="opacity:.8;font-size:14px">Petani / Pecinta Tanaman &bull; Member sejak Oktober 2026</p></div>
    <div style="margin-left:auto;display:flex;gap:8px">
      <a href="konsultasi.html" class="btn btn-w btn-sm">+ Booking Baru</a>
    </div>
  </div>
</div>
<section class="sec"><div class="con">
  <div class="grid g4 mb6">
    <div class="stat"><div class="sv">3</div><div class="sl">Total Booking</div></div>
    <div class="stat"><div class="sv tg">1</div><div class="sl">Sesi Aktif</div></div>
    <div class="stat"><div class="sv">Rp 420K</div><div class="sl">Total Bayar</div></div>
    <div class="stat"><div class="sv">4.9&#9733;</div><div class="sl">Avg Rating</div></div>
  </div>

  <div class="alert al-in mb6">&#128172; Sesi Konsultasi <strong>Dr. Budi Santoso</strong> hari ini pukul <strong>14.00 WIB</strong>. <a href="#" style="color:#1D4ED8;font-weight:700">Buka Link Jitsi &rarr;</a></div>

  <div style="font-weight:800;font-size:17px;margin-bottom:16px">Riwayat Booking</div>
  <div class="tw"><table>
    <thead><tr><th>#</th><th>Praktisi</th><th>Layanan</th><th>Tanggal &amp; Waktu</th><th>Status</th><th>Bayar</th><th>Aksi</th></tr></thead>
    <tbody>
      <tr>
        <td><span class="tsm tm">#BK-0003</span></td>
        <td><div style="font-weight:600">Dr. Budi Santoso</div><div class="txs tm">Hama &amp; Penyakit</div></td>
        <td>Konsultasi Online</td>
        <td>1 Okt 2026, 14.00</td>
        <td><span class="sts sts-c">Confirmed</span></td>
        <td>Rp 150.000</td>
        <td><a href="#" class="btn btn-g btn-sm">Buka Jitsi</a></td>
      </tr>
      <tr>
        <td><span class="tsm tm">#BK-0002</span></td>
        <td><div style="font-weight:600">Ir. Siti Rahayu</div><div class="txs tm">Padi &amp; Palawija</div></td>
        <td>Konsultasi Online</td>
        <td>20 Sep 2026, 10.00</td>
        <td><span class="sts sts-d">Selesai</span></td>
        <td>Rp 120.000</td>
        <td><a href="#" class="btn btn-o btn-sm">Nilai Sesi</a></td>
      </tr>
      <tr>
        <td><span class="tsm tm">#BK-0001</span></td>
        <td><div style="font-weight:600">Prof. Ahmad Fauzi</div><div class="txs tm">Agronomi</div></td>
        <td>Kunjungan Lahan</td>
        <td>10 Sep 2026, 09.00</td>
        <td><span class="sts sts-d">Selesai</span></td>
        <td>Rp 350.000</td>
        <td><a href="#" class="btn btn-o btn-sm">Lihat Laporan</a></td>
      </tr>
    </tbody>
  </table></div>

  <div style="font-weight:800;font-size:17px;margin:32px 0 16px">Rekomendasi untuk Anda</div>
  <div class="grid g3">
    <div class="card"><div class="card-b"><div style="font-size:28px;margin-bottom:8px">&#128027;</div><div style="font-weight:700;margin-bottom:6px">Hama Kutu Putih</div><p class="tsm" style="color:var(--s500)">Solusi cepat pengendalian kutu putih pada tanaman cabai dan tomat.</p><a href="konsultasi.html" class="btn btn-g btn-sm mt4">Konsultasi Sekarang</a></div></div>
    <div class="card"><div class="card-b"><div style="font-size:28px;margin-bottom:8px">&#127807;</div><div style="font-weight:700;margin-bottom:6px">Pupuk Organik</div><p class="tsm" style="color:var(--s500)">Tingkatkan kesuburan tanah dengan pupuk organik kompos terfermentasi.</p><a href="sarana.html" class="btn btn-g btn-sm mt4">Lihat Produk</a></div></div>
    <div class="card"><div class="card-b"><div style="font-size:28px;margin-bottom:8px">&#129388;</div><div style="font-weight:700;margin-bottom:6px">Sistem Hidroponik</div><p class="tsm" style="color:var(--s500)">Mulai berkebun hidroponik di rumah dengan panduan dari praktisi ahli.</p><a href="konsultasi.html" class="btn btn-g btn-sm mt4">Mulai Belajar</a></div></div>
  </div>
</div></section>
{ft("../", "../js/app.js", "")}
</body></html>"""
write(f"{BASE}/pages/dashboard.html", dashboard_html)

# ══════════════════════════════════════
# ADMIN SIDEBAR
# ══════════════════════════════════════
def admin_sidebar(active="dashboard"):
    links = [
        ("dashboard.html","&#128200; Dashboard",False),
        ("","",True),  # label
        ("konsultasi.html","&#128187; Konsultasi",False),
        ("kunjungan.html","&#127968; Kunjungan",False),
        ("narsum.html","&#127891; Narsum",False),
        ("sarana.html","&#127807; Sarana",False),
        ("","",True),
        ("users.html","&#128100; Pengguna",False),
        ("praktisi.html","&#127807; Praktisi",False),
        ("payments.html","&#128179; Pembayaran",False),
    ]
    nav_html = ""
    for href, label, is_label in links:
        if is_label:
            nav_html += f'<div class="sb-lbl">Manajemen</div>'
        else:
            cls = ' class="active"' if href == active else ""
            nav_html += f'<a href="{href}"{cls}>{label}</a>\n'
    return f"""<div class="sb">
  <div class="sb-hd">
    <img src="../../images/logo.png" alt="Hallobun" style="height:28px;filter:brightness(0) invert(1)">
    <div><div class="bt">Hallobun</div><div class="bs">Panel Admin</div></div>
  </div>
  <div class="sb-nav">{nav_html}</div>
  <div style="padding:16px;border-top:1px solid rgba(255,255,255,.08)">
    <a href="../login.html" style="display:flex;align-items:center;gap:8px;color:rgba(255,255,255,.5);font-size:13px">&#128682; Keluar</a>
  </div>
</div>"""

def admin_topbar(title):
    return f"""<div class="adm-top">
  <h2>{title}</h2>
  <div style="display:flex;align-items:center;gap:12px">
    <span style="font-size:13px;color:var(--s500)">&#128100; Admin Hallobun</span>
    <a href="../login.html" class="btn btn-o btn-sm">Keluar</a>
  </div>
</div>"""

# ══════════════════════════════════════
# ADMIN DASHBOARD
# ══════════════════════════════════════
admin_dash = f"""<!DOCTYPE html>
<html lang="id"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Admin Dashboard &#8212; Hallobun</title>
<link rel="stylesheet" href="../../css/style.css">
</head><body>
<div class="adm-lay">
{admin_sidebar("dashboard.html")}
<div class="adm-main">
{admin_topbar("&#128200; Dashboard Admin")}
<div class="adm-body">
  <div class="grid g4 mb6">
    <div class="stat"><div style="color:var(--g);font-size:24px;margin-bottom:4px">&#128187;</div><div class="sv">47</div><div class="sl">Konsultasi Bulan Ini</div></div>
    <div class="stat"><div style="color:#1D4ED8;font-size:24px;margin-bottom:4px">&#127968;</div><div class="sv">12</div><div class="sl">Kunjungan Lahan</div></div>
    <div class="stat"><div style="color:#7C3AED;font-size:24px;margin-bottom:4px">&#127891;</div><div class="sv">8</div><div class="sl">Permintaan Narsum</div></div>
    <div class="stat"><div style="color:#F59E0B;font-size:24px;margin-bottom:4px">&#128179;</div><div class="sv">Rp 18.4jt</div><div class="sl">Pendapatan Bulan Ini</div></div>
  </div>
  <div class="grid g2 mb6">
    <div class="stat"><div style="font-weight:700;margin-bottom:12px">&#128202; Status Booking Aktif</div>
      <div style="display:flex;gap:12px;font-size:14px">
        <div style="flex:1;text-align:center;background:var(--gl);border-radius:10px;padding:12px"><div style="font-size:22px;font-weight:800;color:var(--g)">15</div><div style="font-size:11px;color:var(--s500)">Pending</div></div>
        <div style="flex:1;text-align:center;background:#EFF6FF;border-radius:10px;padding:12px"><div style="font-size:22px;font-weight:800;color:#1D4ED8">23</div><div style="font-size:11px;color:var(--s500)">Confirmed</div></div>
        <div style="flex:1;text-align:center;background:var(--s100);border-radius:10px;padding:12px"><div style="font-size:22px;font-weight:800;color:var(--s600)">9</div><div style="font-size:11px;color:var(--s500)">Selesai</div></div>
      </div>
    </div>
    <div class="stat"><div style="font-weight:700;margin-bottom:12px">&#128100; Pengguna Terdaftar</div>
      <div style="font-size:13px;color:var(--s600);line-height:2">
        <div style="display:flex;justify-content:space-between"><span>Total Pengguna</span><span class="fw7">524</span></div>
        <div style="display:flex;justify-content:space-between"><span>Baru Bulan Ini</span><span class="fw7 tg">+38</span></div>
        <div style="display:flex;justify-content:space-between"><span>Praktisi Aktif</span><span class="fw7">6</span></div>
        <div style="display:flex;justify-content:space-between"><span>Admin</span><span class="fw7">2</span></div>
      </div>
    </div>
  </div>

  <div class="stat"><div style="font-weight:700;margin-bottom:16px">&#128336; Booking Terbaru</div>
    <div class="tw"><table>
      <thead><tr><th>#ID</th><th>Pengguna</th><th>Layanan</th><th>Praktisi</th><th>Tanggal</th><th>Bayar</th><th>Status</th><th>Aksi</th></tr></thead>
      <tbody>
        <tr><td class="txs tm">#BK-0052</td><td>Ahmad Fauzi</td><td>Konsultasi</td><td>Dr. Budi S.</td><td>1 Okt, 14.00</td><td>Rp 150k</td><td><span class="sts sts-c">Confirmed</span></td><td><a href="#" class="btn btn-g btn-sm">Detail</a></td></tr>
        <tr><td class="txs tm">#BK-0051</td><td>Siti Aminah</td><td>Kunjungan</td><td>Ir. Rudi H.</td><td>2 Okt, 09.00</td><td>Rp 600k</td><td><span class="sts sts-p">Pending</span></td><td><a href="#" class="btn btn-g btn-sm">Detail</a></td></tr>
        <tr><td class="txs tm">#BK-0050</td><td>Budi Santoso</td><td>Narsum</td><td>Prof. Ahmad F.</td><td>5 Okt, TBD</td><td>Rp 2.5jt</td><td><span class="sts sts-p">Pending</span></td><td><a href="#" class="btn btn-g btn-sm">Detail</a></td></tr>
        <tr><td class="txs tm">#BK-0049</td><td>Dewi Lestari</td><td>Konsultasi</td><td>Dr. Nina K.</td><td>30 Sep, 10.00</td><td>Rp 160k</td><td><span class="sts sts-d">Selesai</span></td><td><a href="#" class="btn btn-o btn-sm">Lihat</a></td></tr>
      </tbody>
    </table></div>
    <div style="margin-top:12px"><a href="konsultasi.html" class="btn btn-o btn-sm">Lihat Semua Booking &rarr;</a></div>
  </div>
</div></div></div>
<script src="../../js/app.js"></script>
</body></html>"""
write(f"{BASE}/pages/admin/dashboard.html", admin_dash)

# ══════════════════════════════════════
# ADMIN KONSULTASI
# ══════════════════════════════════════
admin_konsultasi = f"""<!DOCTYPE html>
<html lang="id"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Admin Konsultasi &#8212; Hallobun</title>
<link rel="stylesheet" href="../../css/style.css">
</head><body>
<div class="adm-lay">
{admin_sidebar("konsultasi.html")}
<div class="adm-main">
{admin_topbar("&#128187; Manajemen Konsultasi")}
<div class="adm-body">
  <div style="display:flex;gap:12px;margin-bottom:20px;flex-wrap:wrap">
    <input type="text" class="fc" placeholder="&#128269; Cari pengguna atau praktisi..." style="max-width:300px">
    <select class="fc" style="max-width:160px"><option>Semua Status</option><option>Pending</option><option>Confirmed</option><option>Selesai</option><option>Dibatalkan</option></select>
    <input type="date" class="fc" style="max-width:160px">
    <button class="btn btn-g btn-sm">Filter</button>
    <button class="btn btn-o btn-sm" style="margin-left:auto">&#128196; Ekspor CSV</button>
  </div>
  <div class="tw"><table>
    <thead><tr><th>#ID</th><th>Pengguna</th><th>Praktisi</th><th>Topik</th><th>Tanggal</th><th>Metode Bayar</th><th>Nominal</th><th>Status</th><th>Aksi</th></tr></thead>
    <tbody>
      <tr><td class="txs tm">#BK-0052</td><td><div class="fw7">Ahmad Fauzi</div><div class="txs tm">ahmad@mail.com</div></td><td>Dr. Budi Santoso</td><td>Kutu putih pada cabai</td><td>1 Okt 2026<br>14.00 WIB</td><td>QRIS</td><td>Rp 150.000</td><td><span class="sts sts-c">Confirmed</span></td><td style="display:flex;gap:4px"><a href="#" class="btn btn-g btn-sm">Detail</a></td></tr>
      <tr><td class="txs tm">#BK-0051</td><td><div class="fw7">Siti Aminah</div><div class="txs tm">siti@mail.com</div></td><td>Ir. Siti Rahayu</td><td>Daun padi menguning</td><td>30 Sep 2026<br>10.00 WIB</td><td>BCA VA</td><td>Rp 120.000</td><td><span class="sts sts-d">Selesai</span></td><td><a href="#" class="btn btn-o btn-sm">Lihat</a></td></tr>
      <tr><td class="txs tm">#BK-0050</td><td><div class="fw7">Budi Santoso</div><div class="txs tm">budi@mail.com</div></td><td>Prof. Ahmad Fauzi</td><td>Nutrisi tanaman tomat</td><td>2 Okt 2026<br>09.00 WIB</td><td>BNI VA</td><td>Rp 200.000</td><td><span class="sts sts-p">Pending</span></td><td style="display:flex;gap:4px;flex-wrap:wrap"><a href="#" class="btn btn-g btn-sm">Konfirmasi</a><a href="#" class="btn btn-red btn-sm">Batal</a></td></tr>
    </tbody>
  </table></div>
</div></div></div>
<script src="../../js/app.js"></script>
</body></html>"""
write(f"{BASE}/pages/admin/konsultasi.html", admin_konsultasi)

# ══════════════════════════════════════
# ADMIN USERS
# ══════════════════════════════════════
admin_users = f"""<!DOCTYPE html>
<html lang="id"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Admin Pengguna &#8212; Hallobun</title>
<link rel="stylesheet" href="../../css/style.css">
</head><body>
<div class="adm-lay">
{admin_sidebar("users.html")}
<div class="adm-main">
{admin_topbar("&#128100; Manajemen Pengguna")}
<div class="adm-body">
  <div style="display:flex;gap:12px;margin-bottom:20px;flex-wrap:wrap;align-items:center">
    <input type="text" class="fc" placeholder="&#128269; Cari pengguna..." style="max-width:300px">
    <select class="fc" style="max-width:150px"><option>Semua Role</option><option>User</option><option>Praktisi</option><option>Admin</option></select>
    <button class="btn btn-g btn-sm" style="margin-left:auto">+ Tambah Pengguna</button>
  </div>
  <div class="tw"><table>
    <thead><tr><th>#</th><th>Nama</th><th>Email</th><th>WhatsApp</th><th>Role</th><th>Bergabung</th><th>Status</th><th>Aksi</th></tr></thead>
    <tbody>
      <tr><td>1</td><td class="fw7">Ahmad Fauzi</td><td>ahmad@mail.com</td><td>0812-3456-7890</td><td><span class="bdg bdg-s">User</span></td><td>1 Okt 2026</td><td><span class="sts sts-c">Aktif</span></td><td style="display:flex;gap:4px"><a href="#" class="btn btn-o btn-sm">Edit</a></td></tr>
      <tr><td>2</td><td class="fw7">Dr. Budi Santoso</td><td>budi.dok@mail.com</td><td>0813-5678-9012</td><td><span class="bdg bdg-g">Praktisi</span></td><td>15 Sep 2026</td><td><span class="sts sts-c">Aktif</span></td><td style="display:flex;gap:4px"><a href="#" class="btn btn-o btn-sm">Edit</a></td></tr>
      <tr><td>3</td><td class="fw7">Admin Hallobun</td><td>admin@hallobun.com</td><td>0811-2222-3333</td><td><span class="bdg bdg-b">Admin</span></td><td>1 Sep 2026</td><td><span class="sts sts-c">Aktif</span></td><td style="display:flex;gap:4px"><a href="#" class="btn btn-o btn-sm">Edit</a></td></tr>
      <tr><td>4</td><td class="fw7">Siti Aminah</td><td>siti@mail.com</td><td>0814-9876-5432</td><td><span class="bdg bdg-s">User</span></td><td>20 Sep 2026</td><td><span class="sts sts-c">Aktif</span></td><td style="display:flex;gap:4px"><a href="#" class="btn btn-o btn-sm">Edit</a><a href="#" class="btn btn-red btn-sm">Nonaktif</a></td></tr>
    </tbody>
  </table></div>
</div></div></div>
<script src="../../js/app.js"></script>
</body></html>"""
write(f"{BASE}/pages/admin/users.html", admin_users)

# ══════════════════════════════════════
# ADMIN PAYMENTS
# ══════════════════════════════════════
admin_payments = f"""<!DOCTYPE html>
<html lang="id"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Admin Pembayaran &#8212; Hallobun</title>
<link rel="stylesheet" href="../../css/style.css">
</head><body>
<div class="adm-lay">
{admin_sidebar("payments.html")}
<div class="adm-main">
{admin_topbar("&#128179; Manajemen Pembayaran")}
<div class="adm-body">
  <div class="grid g4 mb6">
    <div class="stat"><div class="sv tg">Rp 18.4jt</div><div class="sl">Pendapatan Bulan Ini</div></div>
    <div class="stat"><div class="sv">47</div><div class="sl">Transaksi Sukses</div></div>
    <div class="stat"><div class="sv" style="color:#F59E0B">5</div><div class="sl">Menunggu Konfirmasi</div></div>
    <div class="stat"><div class="sv" style="color:#EF4444">2</div><div class="sl">Gagal / Dibatalkan</div></div>
  </div>
  <div style="display:flex;gap:12px;margin-bottom:20px;flex-wrap:wrap">
    <input type="text" class="fc" placeholder="&#128269; Cari transaksi / user..." style="max-width:280px">
    <select class="fc" style="max-width:160px"><option>Semua Metode</option><option>QRIS</option><option>BCA VA</option><option>BNI VA</option><option>BRI VA</option><option>Mandiri VA</option></select>
    <select class="fc" style="max-width:150px"><option>Semua Status</option><option>Sukses</option><option>Pending</option><option>Gagal</option></select>
  </div>
  <div class="tw"><table>
    <thead><tr><th>Order ID</th><th>Pengguna</th><th>Layanan</th><th>Metode</th><th>Nominal</th><th>Waktu</th><th>Status</th></tr></thead>
    <tbody>
      <tr><td class="txs tm">MID-2026-0052</td><td>Ahmad Fauzi</td><td>Konsultasi #BK-0052</td><td><span class="bdg bdg-g">QRIS</span></td><td class="fw7">Rp 150.000</td><td>1 Okt 2026, 13.45</td><td><span class="sts sts-c">Sukses</span></td></tr>
      <tr><td class="txs tm">MID-2026-0051</td><td>Siti Aminah</td><td>Kunjungan #KJ-0015</td><td><span class="bdg bdg-b">BCA VA</span></td><td class="fw7">Rp 600.000</td><td>30 Sep 2026, 10.12</td><td><span class="sts sts-c">Sukses</span></td></tr>
      <tr><td class="txs tm">MID-2026-0050</td><td>Budi Santoso</td><td>Narsum #NS-0008</td><td><span class="bdg bdg-b">BNI VA</span></td><td class="fw7">Rp 2.500.000</td><td>29 Sep 2026, 15.30</td><td><span class="sts sts-p">Pending</span></td></tr>
      <tr><td class="txs tm">MID-2026-0049</td><td>Dewi Lestari</td><td>Konsultasi #BK-0049</td><td><span class="bdg bdg-g">QRIS</span></td><td class="fw7">Rp 160.000</td><td>28 Sep 2026, 09.00</td><td><span class="sts sts-c">Sukses</span></td></tr>
      <tr><td class="txs tm">MID-2026-0048</td><td>Rudi Hartono</td><td>Konsultasi #BK-0048</td><td><span class="bdg" style="background:#FEE2E2;color:#991B1B;border-color:#FECACA">Mandiri VA</span></td><td class="fw7">Rp 175.000</td><td>27 Sep 2026, 11.00</td><td><span class="sts sts-x">Gagal</span></td></tr>
    </tbody>
  </table></div>
</div></div></div>
<script src="../../js/app.js"></script>
</body></html>"""
write(f"{BASE}/pages/admin/payments.html", admin_payments)

# ══════════════════════════════════════
# ADMIN PRAKTISI
# ══════════════════════════════════════
admin_praktisi = f"""<!DOCTYPE html>
<html lang="id"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Admin Praktisi &#8212; Hallobun</title>
<link rel="stylesheet" href="../../css/style.css">
</head><body>
<div class="adm-lay">
{admin_sidebar("praktisi.html")}
<div class="adm-main">
{admin_topbar("&#127807; Manajemen Praktisi")}
<div class="adm-body">
  <div style="display:flex;justify-content:flex-end;margin-bottom:20px">
    <button onclick="openModal('addPraktisi')" class="btn btn-g btn-sm">+ Tambah Praktisi</button>
  </div>
  <div class="grid g3">
    <div class="stat" style="text-align:center">
      <img src="../../images/halobun_real_practitioner.jpg" style="width:80px;height:80px;border-radius:50%;object-fit:cover;margin:0 auto 12px">
      <div class="fw8" style="font-size:15px">Dr. Budi Santoso, M.Si</div>
      <div class="tsm tm mb2">Penyakit &amp; Hama Tanaman</div>
      <div style="margin-bottom:12px"><span class="sts sts-c">Aktif</span></div>
      <div style="font-size:13px;color:var(--s600);margin-bottom:12px">
        <div>Tarif: <strong class="tg">Rp 150.000/sesi</strong></div>
        <div>Rating: <strong>4.9 &#9733;</strong> (47 sesi)</div>
      </div>
      <div style="display:flex;gap:8px;justify-content:center"><a href="#" class="btn btn-o btn-sm">Edit</a><a href="#" class="btn btn-red btn-sm">Nonaktif</a></div>
    </div>
    <div class="stat" style="text-align:center">
      <img src="../../images/halobun_praktisi_hero.jpg" style="width:80px;height:80px;border-radius:50%;object-fit:cover;margin:0 auto 12px">
      <div class="fw8" style="font-size:15px">Ir. Siti Rahayu, M.P</div>
      <div class="tsm tm mb2">Padi &amp; Palawija</div>
      <div style="margin-bottom:12px"><span class="sts sts-c">Aktif</span></div>
      <div style="font-size:13px;color:var(--s600);margin-bottom:12px">
        <div>Tarif: <strong class="tg">Rp 120.000/sesi</strong></div>
        <div>Rating: <strong>4.8 &#9733;</strong> (32 sesi)</div>
      </div>
      <div style="display:flex;gap:8px;justify-content:center"><a href="#" class="btn btn-o btn-sm">Edit</a><a href="#" class="btn btn-red btn-sm">Nonaktif</a></div>
    </div>
    <div class="stat" style="text-align:center">
      <img src="../../images/halobun_real_practitioner_2.jpg" style="width:80px;height:80px;border-radius:50%;object-fit:cover;margin:0 auto 12px">
      <div class="fw8" style="font-size:15px">Prof. Ahmad Fauzi, Ph.D</div>
      <div class="tsm tm mb2">Agronomi &amp; Kesuburan Tanah</div>
      <div style="margin-bottom:12px"><span class="sts sts-c">Aktif</span></div>
      <div style="font-size:13px;color:var(--s600);margin-bottom:12px">
        <div>Tarif: <strong class="tg">Rp 200.000/sesi</strong></div>
        <div>Rating: <strong>5.0 &#9733;</strong> (58 sesi)</div>
      </div>
      <div style="display:flex;gap:8px;justify-content:center"><a href="#" class="btn btn-o btn-sm">Edit</a><a href="#" class="btn btn-red btn-sm">Nonaktif</a></div>
    </div>
  </div>
  <div class="mo" id="addPraktisi">
    <div class="mo-box">
      <button class="mo-close" onclick="closeModal('addPraktisi')">&#215;</button>
      <div class="fw8" style="font-size:18px;margin-bottom:16px">Tambah Praktisi Baru</div>
      <div class="fg"><label class="fl">Nama Lengkap + Gelar</label><input type="text" class="fc" placeholder="Dr. Nama, M.Si"></div>
      <div class="fg"><label class="fl">Email</label><input type="email" class="fc"></div>
      <div class="fg"><label class="fl">WhatsApp</label><input type="tel" class="fc"></div>
      <div class="fg"><label class="fl">Spesialisasi</label><input type="text" class="fc" placeholder="Contoh: Hama &amp; Penyakit Tanaman"></div>
      <div class="fg"><label class="fl">Tarif per Sesi (Rp)</label><input type="number" class="fc" placeholder="150000"></div>
      <div class="fg"><label class="fl">Pengalaman (tahun)</label><input type="number" class="fc" placeholder="8"></div>
      <div class="fg"><label class="fl">Jadwal Tersedia</label><input type="text" class="fc" placeholder="Senin-Jumat, 08.00-17.00"></div>
      <button onclick="toast('Praktisi berhasil ditambahkan!','ok');closeModal('addPraktisi')" class="btn btn-g w100">Simpan Praktisi</button>
    </div>
  </div>
</div></div></div>
<script src="../../js/app.js"></script>
</body></html>"""
write(f"{BASE}/pages/admin/praktisi.html", admin_praktisi)

# ══════════════════════════════════════
# ADMIN SARANA
# ══════════════════════════════════════
admin_sarana = f"""<!DOCTYPE html>
<html lang="id"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Admin Sarana &#8212; Hallobun</title>
<link rel="stylesheet" href="../../css/style.css">
</head><body>
<div class="adm-lay">
{admin_sidebar("sarana.html")}
<div class="adm-main">
{admin_topbar("&#127807; Manajemen Sarana Tani")}
<div class="adm-body">
  <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px">
    <input type="text" class="fc" placeholder="&#128269; Cari produk..." style="max-width:280px">
    <button onclick="openModal('addProduk')" class="btn btn-g btn-sm">+ Tambah Produk</button>
  </div>
  <div class="tw"><table>
    <thead><tr><th>Produk</th><th>Kategori</th><th>Harga</th><th>Stok</th><th>Status</th><th>Aksi</th></tr></thead>
    <tbody>
      <tr><td><div class="fw7">Bibit Cabai Merah TW Super</div><div class="txs tm">Varietas unggulan, tahan virus</div></td><td>Bibit</td><td>Rp 45.000</td><td>150 pcs</td><td><span class="sts sts-c">Tersedia</span></td><td style="display:flex;gap:4px"><a href="#" class="btn btn-o btn-sm">Edit</a><a href="#" class="btn btn-red btn-sm">Hapus</a></td></tr>
      <tr><td><div class="fw7">Pupuk NPK Organik 25Kg</div><div class="txs tm">Formulasi khusus sayuran</div></td><td>Pupuk</td><td>Rp 185.000</td><td>80 bag</td><td><span class="sts sts-c">Tersedia</span></td><td style="display:flex;gap:4px"><a href="#" class="btn btn-o btn-sm">Edit</a><a href="#" class="btn btn-red btn-sm">Hapus</a></td></tr>
      <tr><td><div class="fw7">Pestisida Nabati Neem Oil</div><div class="txs tm">Pengendali hama organik</div></td><td>Pestisida</td><td>Rp 75.000</td><td>0 btl</td><td><span class="sts sts-x">Habis</span></td><td style="display:flex;gap:4px"><a href="#" class="btn btn-o btn-sm">Edit</a><a href="#" class="btn btn-red btn-sm">Hapus</a></td></tr>
      <tr><td><div class="fw7">Soil Test Kit Digital</div><div class="txs tm">Uji pH, NPK, dan kelembaban</div></td><td>Alat</td><td>Rp 350.000</td><td>12 unit</td><td><span class="sts sts-c">Tersedia</span></td><td style="display:flex;gap:4px"><a href="#" class="btn btn-o btn-sm">Edit</a><a href="#" class="btn btn-red btn-sm">Hapus</a></td></tr>
    </tbody>
  </table></div>
  <div class="mo" id="addProduk">
    <div class="mo-box">
      <button class="mo-close" onclick="closeModal('addProduk')">&#215;</button>
      <div class="fw8" style="font-size:18px;margin-bottom:16px">Tambah Produk Baru</div>
      <div class="fg"><label class="fl">Nama Produk</label><input type="text" class="fc"></div>
      <div class="fg"><label class="fl">Kategori</label><select class="fc"><option>Bibit</option><option>Pupuk</option><option>Pestisida</option><option>Nutrisi</option><option>Alat</option></select></div>
      <div class="fg"><label class="fl">Harga (Rp)</label><input type="number" class="fc"></div>
      <div class="fg"><label class="fl">Stok</label><input type="number" class="fc"></div>
      <div class="fg"><label class="fl">Deskripsi</label><textarea class="fc" rows="3"></textarea></div>
      <button onclick="toast('Produk berhasil ditambahkan!','ok');closeModal('addProduk')" class="btn btn-g w100">Simpan Produk</button>
    </div>
  </div>
</div></div></div>
<script src="../../js/app.js"></script>
</body></html>"""
write(f"{BASE}/pages/admin/sarana.html", admin_sarana)

# ══════════════════════════════════════
# ADMIN KUNJUNGAN
# ══════════════════════════════════════
admin_kunjungan = f"""<!DOCTYPE html>
<html lang="id"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Admin Kunjungan &#8212; Hallobun</title>
<link rel="stylesheet" href="../../css/style.css">
</head><body>
<div class="adm-lay">
{admin_sidebar("kunjungan.html")}
<div class="adm-main">
{admin_topbar("&#127968; Manajemen Kunjungan Lahan")}
<div class="adm-body">
  <div style="display:flex;gap:12px;margin-bottom:20px;flex-wrap:wrap">
    <input type="text" class="fc" placeholder="&#128269; Cari pengguna atau lokasi..." style="max-width:300px">
    <select class="fc" style="max-width:160px"><option>Semua Status</option><option>Pending</option><option>Scheduled</option><option>Selesai</option></select>
    <button class="btn btn-g btn-sm">Filter</button>
  </div>
  <div class="tw"><table>
    <thead><tr><th>#ID</th><th>Pemohon</th><th>Lokasi</th><th>Jenis Kunjungan</th><th>Tanggal</th><th>Biaya</th><th>Status</th><th>Aksi</th></tr></thead>
    <tbody>
      <tr><td class="txs tm">#KJ-0015</td><td><div class="fw7">Siti Aminah</div><div class="txs tm">0814-9876-5432</div></td><td>Desa Cibodas, Bogor</td><td>Inspeksi Hama</td><td>5 Okt 2026</td><td>Rp 350.000</td><td><span class="sts sts-p">Pending</span></td><td><a href="#" class="btn btn-g btn-sm">Jadwalkan</a></td></tr>
      <tr><td class="txs tm">#KJ-0014</td><td><div class="fw7">Rudi Hartono</div><div class="txs tm">0815-1234-5678</div></td><td>Desa Pakis, Malang</td><td>Audit Tanah</td><td>3 Okt 2026</td><td>Rp 600.000</td><td><span class="sts sts-c">Scheduled</span></td><td><a href="#" class="btn btn-o btn-sm">Detail</a></td></tr>
      <tr><td class="txs tm">#KJ-0013</td><td><div class="fw7">Ahmad Fauzi</div><div class="txs tm">0812-3456-7890</div></td><td>Desa Ciawi, Tasik</td><td>Komprehensif</td><td>25 Sep 2026</td><td>Rp 600.000</td><td><span class="sts sts-d">Selesai</span></td><td><a href="#" class="btn btn-o btn-sm">Laporan</a></td></tr>
    </tbody>
  </table></div>
</div></div></div>
<script src="../../js/app.js"></script>
</body></html>"""
write(f"{BASE}/pages/admin/kunjungan.html", admin_kunjungan)

# ══════════════════════════════════════
# ADMIN NARSUM
# ══════════════════════════════════════
admin_narsum = f"""<!DOCTYPE html>
<html lang="id"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Admin Narsum &#8212; Hallobun</title>
<link rel="stylesheet" href="../../css/style.css">
</head><body>
<div class="adm-lay">
{admin_sidebar("narsum.html")}
<div class="adm-main">
{admin_topbar("&#127891; Manajemen Narasumber")}
<div class="adm-body">
  <div style="display:flex;gap:12px;margin-bottom:20px;flex-wrap:wrap">
    <input type="text" class="fc" placeholder="&#128269; Cari penyelenggara atau topik..." style="max-width:320px">
    <select class="fc" style="max-width:160px"><option>Semua Status</option><option>Pending</option><option>Disetujui</option><option>Selesai</option></select>
  </div>
  <div class="tw"><table>
    <thead><tr><th>#ID</th><th>Penyelenggara</th><th>Jenis Kegiatan</th><th>Topik</th><th>Tanggal</th><th>Peserta</th><th>Tarif</th><th>Status</th><th>Aksi</th></tr></thead>
    <tbody>
      <tr><td class="txs tm">#NS-0008</td><td><div class="fw7">Poktan Maju Bersama</div><div class="txs tm">Budi - 0812-xxx</div></td><td>Bimtek Full-day</td><td>PHT pada Padi</td><td>10 Okt 2026</td><td>80 org</td><td>Rp 4.000.000</td><td><span class="sts sts-p">Pending</span></td><td><a href="#" class="btn btn-g btn-sm">Setujui</a></td></tr>
      <tr><td class="txs tm">#NS-0007</td><td><div class="fw7">Universitas Pertanian</div><div class="txs tm">Dr. Sari - 0813-xxx</div></td><td>Kuliah Tamu</td><td>Agribisnis Modern</td><td>5 Okt 2026</td><td>120 org</td><td>Rp 1.500.000</td><td><span class="sts sts-c">Disetujui</span></td><td><a href="#" class="btn btn-o btn-sm">Detail</a></td></tr>
      <tr><td class="txs tm">#NS-0006</td><td><div class="fw7">Dinas Pertanian Bogor</div><div class="txs tm">Ir. Hendra - 0819-xxx</div></td><td>Seminar</td><td>Pertanian Organik</td><td>20 Sep 2026</td><td>200 org</td><td>Rp 5.000.000</td><td><span class="sts sts-d">Selesai</span></td><td><a href="#" class="btn btn-o btn-sm">Laporan</a></td></tr>
    </tbody>
  </table></div>
</div></div></div>
<script src="../../js/app.js"></script>
</body></html>"""
write(f"{BASE}/pages/admin/narsum.html", admin_narsum)

print("\nAll pages generated successfully!")

# Summary
import os
total = 0
for root, dirs, files in os.walk(BASE):
    for f in files:
        if f.endswith(".html") or f.endswith(".css") or f.endswith(".js"):
            total += 1
print(f"Total files: {total}")
print(f"Location: {BASE}")

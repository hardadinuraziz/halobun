<?php
/**
 * Hallobun Static Site Generator
 * Generates all HTML pages (no framework, pure HTML/CSS/JS)
 */

$base = "/Users/as-saifi/Downloads/hallobun-static";

// ─── WRITE CSS ──────────────────────────────────────────────────────────
$css = <<<'CSS'
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');
:root{--g:#16A34A;--gd:#15803D;--gx:#14532D;--gl:#F0FDF4;--g100:#BBF7D0;--g200:#DCFCE7;--s50:#F9FAFB;--s100:#F3F4F6;--s200:#E5E7EB;--s400:#9CA3AF;--s500:#6B7280;--s600:#4B5563;--s700:#374151;--s800:#1F2937;--s900:#111827;--r:10px;--shd:0 4px 16px rgba(0,0,0,.08);--shl:0 8px 32px rgba(0,0,0,.10)}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
body{font-family:'Inter',-apple-system,BlinkMacSystemFont,sans-serif;color:var(--s800);background:#fff;line-height:1.6;font-size:15px;-webkit-font-smoothing:antialiased}
a{text-decoration:none;color:inherit}img{max-width:100%;display:block}button,input,select,textarea{font-family:inherit}

/* NAVBAR */
.nb{position:sticky;top:0;z-index:100;background:rgba(255,255,255,.95);backdrop-filter:blur(12px);border-bottom:1px solid var(--s200);padding:0 24px;height:64px;display:flex;align-items:center;justify-content:space-between}
.nb-brand{display:flex;align-items:center;gap:10px;font-weight:800;font-size:18px;color:var(--gx)}
.nb-brand img{height:36px;width:auto}
.nb-nav{display:flex;align-items:center;gap:4px;list-style:none}
.nb-nav a{padding:7px 12px;border-radius:8px;font-size:14px;font-weight:500;color:var(--s600);transition:all .18s}
.nb-nav a:hover,.nb-nav a.active{background:var(--gl);color:var(--g)}
.nb-act{display:flex;align-items:center;gap:8px}
.b-out{padding:7px 16px;border:1.5px solid var(--s200);border-radius:8px;font-size:13px;font-weight:600;color:var(--s700);background:#fff;cursor:pointer;transition:all .18s;display:inline-flex;align-items:center}
.b-out:hover{border-color:var(--g);color:var(--g)}
.b-grn{padding:7px 18px;border:none;border-radius:8px;font-size:13px;font-weight:700;color:#fff;background:var(--g);cursor:pointer;transition:all .18s;display:inline-flex;align-items:center}
.b-grn:hover{background:var(--gd)}
.hbg{display:none;flex-direction:column;gap:5px;cursor:pointer;padding:4px;background:none;border:none}
.hbg span{width:22px;height:2px;background:var(--s700);border-radius:2px;display:block;transition:all .2s}

/* BUTTONS */
.btn{display:inline-flex;align-items:center;justify-content:center;gap:7px;padding:11px 24px;border-radius:var(--r);font-size:14px;font-weight:700;border:none;cursor:pointer;transition:all .18s}
.btn-g{background:var(--g);color:#fff}.btn-g:hover{background:var(--gd);transform:translateY(-1px);box-shadow:0 4px 14px rgba(22,163,74,.3)}
.btn-w{background:#fff;color:var(--g);border:1.5px solid var(--g100)}.btn-w:hover{background:var(--gl)}
.btn-o{background:transparent;color:var(--s700);border:1.5px solid var(--s200)}.btn-o:hover{border-color:var(--g);color:var(--g)}
.btn-sm{padding:8px 16px;font-size:13px}.btn-lg{padding:14px 32px;font-size:15px}
.btn-red{background:#EF4444;color:#fff;border:none}.btn-red:hover{background:#DC2626}

/* BADGE */
.bdg{display:inline-flex;align-items:center;gap:5px;padding:4px 11px;border-radius:9999px;font-size:12px;font-weight:700}
.bdg-g{background:var(--gl);color:var(--g);border:1px solid var(--g100)}
.bdg-b{background:#EFF6FF;color:#1D4ED8;border:1px solid #BFDBFE}
.bdg-s{background:var(--s100);color:var(--s600);border:1px solid var(--s200)}
.dot{width:7px;height:7px;border-radius:50%;background:var(--g);animation:pulse 1.5s infinite;display:inline-block}
@keyframes pulse{0%,100%{opacity:1}50%{opacity:.4}}

/* CARD */
.card{background:#fff;border:1px solid var(--s200);border-radius:14px;overflow:hidden;transition:all .22s}
.card:hover{box-shadow:var(--shd);transform:translateY(-2px)}
.card-b{padding:20px}

/* LAYOUT */
.sec{padding:64px 24px}.sec-sm{padding:40px 24px}
.con{max-width:1200px;margin:0 auto}
.sec-ttl{font-size:28px;font-weight:800;color:var(--s900);margin-bottom:8px}
.sec-sub{font-size:15px;color:var(--s500);max-width:560px}
.sec-hd{text-align:center;margin-bottom:40px}
.grid{display:grid;gap:24px}
.g2{grid-template-columns:repeat(2,1fr)}
.g3{grid-template-columns:repeat(3,1fr)}
.g4{grid-template-columns:repeat(4,1fr)}

/* FORM */
.fg{margin-bottom:18px}
.fl{display:block;font-size:13px;font-weight:600;color:var(--s700);margin-bottom:6px}
.fc{width:100%;padding:10px 14px;border:1.5px solid var(--s200);border-radius:9px;font-size:14px;color:var(--s800);background:#fff;transition:border-color .18s;outline:none}
.fc:focus{border-color:var(--g);box-shadow:0 0 0 3px rgba(22,163,74,.12)}
select.fc{appearance:none;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%236B7280' stroke-width='2'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:right 12px center;padding-right:36px}

/* TABLE */
.tw{overflow-x:auto;border-radius:12px;border:1px solid var(--s200)}
table{width:100%;border-collapse:collapse;font-size:14px}
thead th{background:var(--s50);color:var(--s500);font-weight:700;font-size:11px;text-transform:uppercase;letter-spacing:.6px;padding:12px 16px;text-align:left;border-bottom:1px solid var(--s200)}
tbody td{padding:13px 16px;border-bottom:1px solid var(--s100);vertical-align:middle;color:var(--s700)}
tbody tr:last-child td{border-bottom:none}tbody tr:hover td{background:var(--s50)}

/* ALERT */
.alert{padding:12px 16px;border-radius:9px;font-size:14px;margin-bottom:16px}
.al-ok{background:var(--gl);color:var(--gd);border:1px solid var(--g100)}
.al-er{background:#FEE2E2;color:#991B1B;border:1px solid #FECACA}
.al-in{background:#EFF6FF;color:#1D4ED8;border:1px solid #BFDBFE}
.al-wa{background:#FFFBEB;color:#92400E;border:1px solid #FDE68A}

/* STATUS */
.sts{display:inline-block;padding:3px 10px;border-radius:9999px;font-size:11.5px;font-weight:700}
.sts-p{background:#FFFBEB;color:#92400E}.sts-c{background:var(--gl);color:var(--gd)}
.sts-d{background:#EFF6FF;color:#1D4ED8}.sts-x{background:#FEE2E2;color:#991B1B}

/* ADMIN */
.adm-lay{display:flex;min-height:100vh}
.sb{width:240px;background:var(--s900);color:#fff;flex-shrink:0;display:flex;flex-direction:column;position:sticky;top:0;height:100vh;overflow-y:auto}
.sb-hd{padding:20px;border-bottom:1px solid rgba(255,255,255,.08);display:flex;align-items:center;gap:10px}
.sb-hd .bt{font-weight:800;font-size:15px}.sb-hd .bs{font-size:10px;color:rgba(255,255,255,.4)}
.sb-nav{padding:12px 8px;flex:1}
.sb-nav a{display:flex;align-items:center;gap:10px;padding:10px 14px;border-radius:8px;color:rgba(255,255,255,.65);font-size:13.5px;font-weight:500;margin-bottom:2px;transition:all .15s}
.sb-nav a:hover{background:rgba(255,255,255,.06);color:#fff}
.sb-nav a.active{background:rgba(22,163,74,.2);color:#4ADE80}
.sb-lbl{padding:12px 14px 4px;font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:1px;color:rgba(255,255,255,.3)}
.adm-main{flex:1;background:var(--s50);min-height:100vh}
.adm-top{background:#fff;padding:0 28px;height:60px;display:flex;align-items:center;justify-content:space-between;border-bottom:1px solid var(--s200);position:sticky;top:0;z-index:10}
.adm-top h2{font-size:16px;font-weight:700;color:var(--s800)}
.adm-body{padding:28px}
.stat{background:#fff;border:1px solid var(--s200);border-radius:12px;padding:22px}
.sv{font-size:30px;font-weight:900;color:var(--s900)}.sl{font-size:11.5px;color:var(--s400);font-weight:600;text-transform:uppercase;letter-spacing:.5px;margin-top:3px}

/* FOOTER */
.ft{background:var(--s900);color:rgba(255,255,255,.65);padding:52px 24px 24px}
.ft-in{max-width:1200px;margin:0 auto}
.ft-g{display:grid;grid-template-columns:2fr 1fr 1fr 1fr;gap:36px;margin-bottom:40px}
.ft-brand p{font-size:13px;line-height:1.7;margin-top:10px}
.ft-col h4{color:#fff;font-size:13px;font-weight:700;margin-bottom:14px}
.ft-col ul{list-style:none}.ft-col ul li{margin-bottom:9px}
.ft-col ul li a{font-size:13px;color:rgba(255,255,255,.55);transition:color .15s}
.ft-col ul li a:hover{color:#4ADE80}
.ft-bot{border-top:1px solid rgba(255,255,255,.08);padding-top:22px;display:flex;justify-content:space-between;align-items:center;font-size:12px}
.ft-logo{height:32px;filter:brightness(0) invert(1)}

/* HERO */
.hero{background:#fff;padding:52px 24px 60px;border-bottom:1px solid var(--s100)}
.hero-in{max-width:1200px;margin:0 auto;display:grid;grid-template-columns:1fr 1fr;gap:52px;align-items:center}
.hero-tag{display:inline-flex;align-items:center;gap:7px;background:var(--gl);border:1px solid var(--g100);padding:5px 14px;border-radius:9999px;font-size:12px;font-weight:700;color:var(--g);margin-bottom:18px}
.hero h1{font-size:44px;font-weight:900;line-height:1.12;color:var(--s900);margin-bottom:16px}
.hero h1 span{color:var(--g)}
.hero-lead{font-size:15px;color:var(--s500);line-height:1.7;max-width:480px}
.hero-search{margin-top:24px;background:#fff;border:1.5px solid var(--s200);border-radius:14px;padding:5px;display:flex;align-items:center;gap:8px;transition:all .18s}
.hero-search:focus-within{border-color:var(--g);box-shadow:0 0 0 4px rgba(22,163,74,.08)}
.hero-search input{flex:1;border:none;outline:none;font-size:14px;padding:8px 12px;background:transparent;color:var(--s800)}
.hero-chips{display:flex;flex-wrap:wrap;gap:6px;margin-top:14px;align-items:center}
.hero-chips .lbl{font-size:12px;color:var(--s400);font-weight:500}
.chip{font-size:12px;padding:4px 12px;border-radius:9999px;background:var(--s50);border:1px solid var(--s200);color:var(--s600);cursor:pointer;transition:all .15s}
.chip:hover{background:var(--gl);color:var(--g);border-color:var(--g100)}
.hero-trust{display:flex;flex-wrap:wrap;gap:18px;margin-top:22px;font-size:13px;color:var(--s500)}
.trust-it{display:flex;align-items:center;gap:6px}
.chk{color:var(--g);font-weight:700}

/* SLIDER */
.slider{position:relative;border-radius:18px;overflow:hidden;box-shadow:var(--shl)}
.s-track{display:flex;transition:transform .55s cubic-bezier(.4,0,.2,1)}
.s-slide{flex-shrink:0;width:100%}
.s-slide img{width:100%;height:360px;object-fit:cover}
.s-dots{position:absolute;bottom:14px;left:50%;transform:translateX(-50%);display:flex;gap:6px}
.s-dot{width:8px;height:8px;border-radius:50%;border:none;background:rgba(255,255,255,.5);cursor:pointer;transition:all .25s;padding:0}
.s-dot.active{background:#fff;width:22px;border-radius:9999px}
.s-btn{position:absolute;top:50%;transform:translateY(-50%);background:rgba(255,255,255,.88);border:none;width:36px;height:36px;border-radius:50%;cursor:pointer;font-size:16px;display:flex;align-items:center;justify-content:center;transition:all .2s}
.s-btn:hover{background:#fff;box-shadow:var(--shd)}
.s-btn.prev{left:12px}.s-btn.next{right:12px}

/* PRAKTISI */
.pk-card{background:#fff;border:1px solid var(--s200);border-radius:14px;overflow:hidden;transition:all .22s}
.pk-card:hover{box-shadow:var(--shd);transform:translateY(-3px)}
.pk-card img{width:100%;height:180px;object-fit:cover}
.pk-b{padding:16px 18px}
.pk-name{font-weight:800;font-size:15px;color:var(--s900);margin-bottom:3px}
.pk-spec{font-size:12px;color:var(--s500);margin-bottom:10px}
.pk-ft{display:flex;justify-content:space-between;align-items:center;padding-top:10px;border-top:1px solid var(--s100)}
.price{font-size:15px;font-weight:800;color:var(--g)}.price span{font-size:11px;font-weight:500;color:var(--s400)}
.rating{display:flex;align-items:center;gap:3px;font-size:12px;color:var(--s500)}
.star{color:#F59E0B}

/* WA FLOAT */
.wa{position:fixed;bottom:24px;right:24px;z-index:999}
.wa a{display:flex;align-items:center;gap:10px;background:#25D366;color:#fff;padding:12px 20px;border-radius:9999px;font-size:14px;font-weight:700;box-shadow:0 4px 20px rgba(37,211,102,.4);transition:all .2s}
.wa a:hover{transform:scale(1.04);box-shadow:0 6px 28px rgba(37,211,102,.5)}

/* PAGE HEADER */
.ph{background:linear-gradient(135deg,var(--gx) 0%,var(--g) 100%);color:#fff;padding:44px 24px;text-align:center}
.ph h1{font-size:32px;font-weight:800;margin-bottom:8px}
.ph p{font-size:15px;opacity:.85;max-width:560px;margin:0 auto}
.ph-lt{background:var(--s50);color:var(--s900);border-bottom:1px solid var(--s200)}
.ph-lt h1{color:var(--s900)}

/* MODAL */
.mo{position:fixed;inset:0;background:rgba(0,0,0,.45);z-index:200;display:none;align-items:center;justify-content:center;padding:20px}
.mo.open{display:flex}
.mo-box{background:#fff;border-radius:18px;width:100%;max-width:520px;padding:32px;position:relative;max-height:90vh;overflow-y:auto}
.mo-close{position:absolute;top:16px;right:16px;background:var(--s100);border:none;width:32px;height:32px;border-radius:50%;cursor:pointer;font-size:18px;display:flex;align-items:center;justify-content:center}

/* UTILS */
.tc{text-align:center}.tg{color:var(--g)}.tm{color:var(--s400)}
.tsm{font-size:13px}.txs{font-size:11px}
.fw7{font-weight:700}.fw8{font-weight:800}
.mt2{margin-top:8px}.mt4{margin-top:16px}.mt6{margin-top:24px}.mt8{margin-top:32px}
.mb2{margin-bottom:8px}.mb4{margin-bottom:16px}.mb6{margin-bottom:24px}
.df{display:flex}.ac{align-items:center}.jc{justify-content:center}.jsb{justify-content:space-between}
.g2x{gap:8px}.g3x{gap:12px}.g4x{gap:16px}
.w100{width:100%}
hr.div{border:none;border-top:1px solid var(--s200);margin:24px 0}

/* RESPONSIVE */
@media(max-width:960px){
  .nb-nav,.nb-act{display:none}
  .hbg{display:flex}
  .nb-nav.open{display:flex;flex-direction:column;position:fixed;top:64px;left:0;right:0;background:#fff;padding:12px;border-bottom:1px solid var(--s200);z-index:99;box-shadow:var(--shd)}
  .nb-act.open{display:flex;justify-content:center;gap:8px;padding:12px}
  .hero-in{grid-template-columns:1fr;gap:28px}
  .hero h1{font-size:30px}
  .g3,.g4{grid-template-columns:repeat(2,1fr)}
  .ft-g{grid-template-columns:1fr 1fr}
}
@media(max-width:600px){
  .g2,.g3,.g4{grid-template-columns:1fr}
  .sec{padding:40px 16px}.hero{padding:32px 16px 40px}
  .hero h1{font-size:26px}.ft-g{grid-template-columns:1fr}
  .sec-ttl{font-size:22px}
  .adm-lay{flex-direction:column}
  .sb{width:100%;height:auto;position:relative}
  .adm-top{padding:0 16px}.adm-body{padding:16px}
}
CSS;
file_put_contents("$base/css/style.css", $css);
echo "✓ style.css\n";

// ─── JS HELPER ──────────────────────────────────────────────────────────
$js = <<<'JS'
// ── Navbar toggle
function toggleNav(){
  document.getElementById("navLinks").classList.toggle("open");
  document.getElementById("navActions").classList.toggle("open");
}

// ── Auto-slider
function initSlider(id){
  var wrap=document.getElementById(id);
  if(!wrap)return;
  var track=wrap.querySelector(".s-track");
  var slides=wrap.querySelectorAll(".s-slide");
  var dots=wrap.querySelectorAll(".s-dot");
  var cur=0,timer;
  function go(n){
    cur=(n+slides.length)%slides.length;
    track.style.transform="translateX(-"+cur*100+"%)";
    dots.forEach(function(d,i){d.classList.toggle("active",i===cur)});
  }
  function next(){go(cur+1)}function prev(){go(cur-1)}
  function auto(){timer=setInterval(next,4200)}
  dots.forEach(function(d,i){d.addEventListener("click",function(){clearInterval(timer);go(i);auto()})});
  var nb=wrap.querySelector(".s-btn.next");
  var pb=wrap.querySelector(".s-btn.prev");
  if(nb)nb.addEventListener("click",function(){clearInterval(timer);next();auto()});
  if(pb)pb.addEventListener("click",function(){clearInterval(timer);prev();auto()});
  wrap.addEventListener("mouseenter",function(){clearInterval(timer)});
  wrap.addEventListener("mouseleave",auto);
  go(0);auto();
}

// ── Modal helpers
function openModal(id){document.getElementById(id).classList.add("open")}
function closeModal(id){document.getElementById(id).classList.remove("open")}

// ── Format currency
function fmt(n){return"Rp "+n.toLocaleString("id-ID")}

// ── Toast notification
function toast(msg,type){
  var t=document.createElement("div");
  t.style.cssText="position:fixed;top:80px;right:20px;z-index:9999;background:"+(type==="ok"?"#16A34A":"#EF4444")+";color:#fff;padding:12px 20px;border-radius:10px;font-size:14px;font-weight:600;box-shadow:0 4px 20px rgba(0,0,0,.15);animation:fadein .25s";
  t.textContent=msg;
  document.body.appendChild(t);
  setTimeout(function(){t.remove()},3000);
}
JS;
file_put_contents("$base/js/app.js", $js);
echo "✓ app.js\n";

// ─── SHARED PARTIALS ────────────────────────────────────────────────────
function nav($pfx="",$active="") {
  $pages = [
    "index.html"  => "Beranda",
    "konsultasi.html" => "Konsultasi",
    "kunjungan.html"  => "Kunjungan",
    "narsum.html"     => "Narsum",
    "sarana.html"     => "Sarana",
  ];
  $li = "";
  foreach($pages as $file=>$label) {
    $href = ($file==="index.html") ? $pfx."../index.html" : $pfx.$file;
    if($file==="index.html" && $pfx==="") $href="index.html";
    $cls = ($active===$file) ? " active" : "";
    $li .= "<li><a href=\"$href\" class=\"$cls\">$label</a></li>\n";
  }
  $logo = $pfx."../images/logo.png";
  if($pfx==="") $logo="images/logo.png";
  $loginH  = ($pfx==="") ? "pages/login.html" : $pfx."login.html";
  $registerH = ($pfx==="") ? "pages/register.html" : $pfx."register.html";
  return <<<HTML
<nav class="nb">
  <a class="nb-brand" href="{$pfx}../index.html">
    <img src="$logo" alt="Hallobun"><span>Hallobun</span>
  </a>
  <ul class="nb-nav" id="navLinks">$li</ul>
  <div class="nb-act" id="navActions">
    <a href="$loginH" class="b-out">Masuk</a>
    <a href="$registerH" class="b-grn">Daftar</a>
  </div>
  <button class="hbg" onclick="toggleNav()" aria-label="Menu">
    <span></span><span></span><span></span>
  </button>
</nav>
HTML;
}

function navTop($pfx="",$active="") {
  $pages = [
    "../index.html"  => "Beranda",
    "konsultasi.html" => "Konsultasi",
    "kunjungan.html"  => "Kunjungan",
    "narsum.html"     => "Narsum",
    "sarana.html"     => "Sarana",
  ];
  $li = "";
  foreach($pages as $file=>$label) {
    $cls = (basename($file)===$active) ? " active" : "";
    $li .= "<li><a href=\"$file\" class=\"$cls\">$label</a></li>\n";
  }
  return <<<HTML
<nav class="nb">
  <a class="nb-brand" href="../index.html">
    <img src="{$pfx}../images/logo.png" alt="Hallobun"><span>Hallobun</span>
  </a>
  <ul class="nb-nav" id="navLinks">$li</ul>
  <div class="nb-act" id="navActions">
    <a href="login.html" class="b-out">Masuk</a>
    <a href="register.html" class="b-grn">Daftar</a>
  </div>
  <button class="hbg" onclick="toggleNav()" aria-label="Menu">
    <span></span><span></span><span></span>
  </button>
</nav>
HTML;
}

function navTopAdm() {
  return <<<HTML
<nav class="nb">
  <a class="nb-brand" href="../../index.html">
    <img src="../../images/logo.png" alt="Hallobun"><span>Hallobun</span>
  </a>
  <ul class="nb-nav" id="navLinks">
    <li><a href="../../index.html">Beranda</a></li>
    <li><a href="dashboard.html" class="active">Panel Admin</a></li>
  </ul>
  <div class="nb-act" id="navActions">
    <a href="../login.html" class="b-out">Keluar</a>
  </div>
  <button class="hbg" onclick="toggleNav()" aria-label="Menu">
    <span></span><span></span><span></span>
  </button>
</nav>
HTML;
}

function footer($pfx="../") {
  return <<<HTML
<footer class="ft">
  <div class="ft-in">
    <div class="ft-g">
      <div class="ft-brand">
        <img class="ft-logo" src="{$pfx}images/logo.png" alt="Hallobun">
        <p>Platform tele-agronomi &amp; layanan kebun terpercaya. Konsultasi bersama praktisi agronom bersertifikasi Indonesia.</p>
      </div>
      <div class="ft-col">
        <h4>Layanan</h4>
        <ul>
          <li><a href="{$pfx}pages/konsultasi.html">Konsultasi Online</a></li>
          <li><a href="{$pfx}pages/kunjungan.html">Kunjungan Lahan</a></li>
          <li><a href="{$pfx}pages/narsum.html">Undang Narsum</a></li>
          <li><a href="{$pfx}pages/sarana.html">Sarana Tani</a></li>
        </ul>
      </div>
      <div class="ft-col">
        <h4>Akun</h4>
        <ul>
          <li><a href="{$pfx}pages/login.html">Masuk</a></li>
          <li><a href="{$pfx}pages/register.html">Daftar</a></li>
          <li><a href="{$pfx}pages/dashboard.html">Dashboard</a></li>
          <li><a href="{$pfx}pages/admin/dashboard.html">Panel Admin</a></li>
        </ul>
      </div>
      <div class="ft-col">
        <h4>Kontak</h4>
        <ul>
          <li><a href="https://wa.me/6281234567890" target="_blank">WhatsApp CS</a></li>
          <li><a href="mailto:info@hallobun.com">info@hallobun.com</a></li>
          <li><a href="#">Instagram</a></li>
          <li><a href="#">YouTube</a></li>
        </ul>
      </div>
    </div>
    <div class="ft-bot">
      <span>&copy; 2026 Hallobun Indonesia &mdash; PT Hallobun Solusi Perkebunan Nusantara</span>
      <span>Seluruh hak dilindungi</span>
    </div>
  </div>
</footer>
<div class="wa">
  <a href="https://wa.me/6281234567890" target="_blank">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
    WhatsApp CS
  </a>
</div>
<script src="{$pfx}js/app.js"></script>
HTML;
}

function head($title,$pfx="../",$extra="") {
  return <<<HTML
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>$title — Hallobun</title>
<link rel="stylesheet" href="{$pfx}css/style.css">
$extra
</head>
<body>
HTML;
}

// ════════════════════════════════════════════════════════════════
// INDEX.HTML — BERANDA
// ════════════════════════════════════════════════════════════════
$slides = [
  ["halobun_real_practitioner.jpg","Praktisi agronom bersertifikasi Indonesia"],
  ["halobun_real_hydroponics.jpg","Solusi pertanian hidroponik modern"],
  ["halobun_real_pest_control.jpg","Pengendalian hama & penyakit tanaman"],
  ["halobun_real_livestock.jpg","Peternakan terpadu & manajemen ternak"],
  ["halobun_real_training.jpg","Pelatihan & bimbingan teknis petani"],
];
$slideHtml = "";
foreach($slides as $s) {
  $slideHtml .= "<div class=\"s-slide\"><img src=\"images/{$s[0]}\" alt=\"{$s[1]}\"></div>\n";
}
$dotHtml = "";
foreach($slides as $i=>$s) {
  $cls = $i===0?" active":"";
  $dotHtml .= "<button class=\"s-dot$cls\" aria-label=\"Slide ".($i+1)."\"></button>\n";
}

$praktisi = [
  ["Dr. Budi Santoso, M.Si","Penyakit & Hama Tanaman","4.9","150.000","halobun_real_practitioner.jpg"],
  ["Ir. Siti Rahayu, M.P","Padi & Palawija","4.8","120.000","halobun_praktisi_hero.jpg"],
  ["Prof. Ahmad Fauzi, Ph.D","Agronomi & Kesuburan Tanah","5.0","200.000","halobun_real_practitioner_2.jpg"],
];
$pkHtml = "";
foreach($praktisi as $p) {
  $pkHtml .= <<<HTML
<div class="pk-card">
  <img src="images/{$p[4]}" alt="{$p[0]}">
  <div class="pk-b">
    <div class="pk-name">{$p[0]}</div>
    <div class="pk-spec">🌿 {$p[1]}</div>
    <div class="pk-ft">
      <div class="price">Rp {$p[2]}<span>/sesi</span></div>
      <div class="rating"><span class="star">⭐</span> {$p[3]}</div>
    </div>
    <a href="pages/konsultasi.html" class="btn btn-g w100 mt4" style="justify-content:center">Booking Konsultasi</a>
  </div>
</div>
HTML;
}

$services = [
  ["💻","Konsultasi Online","Sesi video call real-time dengan agronom ahli via Jitsi Meet. Konsultasi hama, penyakit, nutrisi, dan teknik berkebun.","pages/konsultasi.html","Mulai Konsultasi"],
  ["🏡","Kunjungan Lahan","Tim agronom kami datang langsung ke kebun Anda untuk inspeksi fisik, audit tanah, dan rekomendasi penanganan.","pages/kunjungan.html","Jadwalkan Kunjungan"],
  ["🎓","Undang Narasumber","Hadirkan pakar agronomi bersertifikasi untuk workshop, bimtek poktan, webinar, atau seminar komunitas berkebun.","pages/narsum.html","Undang Narsum"],
  ["🌱","Toko Sarana Tani","Bibit bersertifikat, pupuk organik, pestisida nabati, dan alat berkebun berkualitas. Pesan langsung via WhatsApp.","pages/sarana.html","Lihat Produk"],
];
$svcHtml = "";
foreach($services as $s) {
  $svcHtml .= <<<HTML
<div class="card">
  <div class="card-b">
    <div style="font-size:36px;margin-bottom:12px">{$s[0]}</div>
    <div style="font-weight:800;font-size:16px;margin-bottom:8px;color:var(--s900)">{$s[1]}</div>
    <p style="font-size:13.5px;color:var(--s500);line-height:1.6;margin-bottom:16px">{$s[2]}</p>
    <a href="{$s[3]}" class="btn btn-g btn-sm">{$s[4]}</a>
  </div>
</div>
HTML;
}

$indexNav = <<<NAV
<nav class="nb">
  <a class="nb-brand" href="index.html">
    <img src="images/logo.png" alt="Hallobun"><span>Hallobun</span>
  </a>
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
  <button class="hbg" onclick="toggleNav()" aria-label="Menu">
    <span></span><span></span><span></span>
  </button>
</nav>
NAV;

$indexFoot = <<<FOOT
<footer class="ft">
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
        <li><a href="https://wa.me/6281234567890" target="_blank">WhatsApp CS</a></li>
        <li><a href="mailto:info@hallobun.com">info@hallobun.com</a></li>
        <li><a href="#">Instagram</a></li>
        <li><a href="#">YouTube</a></li>
      </ul></div>
    </div>
    <div class="ft-bot">
      <span>&copy; 2026 Hallobun Indonesia &mdash; PT Hallobun Solusi Perkebunan Nusantara</span>
      <span>Seluruh hak dilindungi</span>
    </div>
  </div>
</footer>
<div class="wa"><a href="https://wa.me/6281234567890" target="_blank">
  <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
  WhatsApp CS
</a></div>
<script src="js/app.js"></script>
<script>initSlider("heroSlider")</script>
FOOT;

$index = <<<HTML
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="description" content="Platform tele-agronomi dan bimbingan berkebun terpercaya. Konsultasi agronom via video call, kunjungan lahan, narsum, dan sarana tani.">
<title>Solusi Perawatan Kebun & Pertanian — Hallobun</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

$indexNav

<!-- HERO -->
<section class="hero">
  <div class="hero-in">
    <div>
      <div class="hero-tag"><span class="dot"></span> Tele-Agronomi &amp; Layanan Kebun #1 Indonesia</div>
      <h1>Perawatan Kebun &amp; Tanaman<br><span>Bersama Praktisi Ahli</span></h1>
      <p class="hero-lead">Konsultasi langsung via video call, pemesanan inspeksi lahan fisik, hingga penyediaan bibit dan nutrisi organik terpercaya.</p>
      <div class="hero-search">
        <svg width="16" height="16" fill="none" stroke="#9CA3AF" stroke-width="2.2" viewBox="0 0 24 24" style="flex-shrink:0;margin-left:8px"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        <input type="text" placeholder="Cari praktisi, tanaman, atau kendala hama...">
        <a href="pages/konsultasi.html" class="btn btn-g btn-sm">Cari Solusi</a>
      </div>
      <div class="hero-chips">
        <span class="lbl">Populer:</span>
        <span class="chip">🐛 Kutu Putih</span>
        <span class="chip">🍂 Daun Kuning</span>
        <span class="chip">🌱 Pupuk Organik</span>
        <span class="chip">🥬 Hidroponik</span>
      </div>
      <div class="hero-trust">
        <div class="trust-it"><span class="chk">✓</span> Respon Cepat</div>
        <div class="trust-it"><span class="chk">✓</span> Praktisi Bersertifikasi</div>
        <div class="trust-it"><span class="chk">✓</span> Tarif Terjangkau</div>
      </div>
    </div>
    <!-- SLIDER -->
    <div class="slider" id="heroSlider">
      <div class="s-track">$slideHtml</div>
      <button class="s-btn prev" aria-label="Prev">&#8592;</button>
      <button class="s-btn next" aria-label="Next">&#8594;</button>
      <div class="s-dots">$dotHtml</div>
    </div>
  </div>
</section>

<!-- STATS -->
<section class="sec-sm" style="background:var(--s50);border-bottom:1px solid var(--s200)">
  <div class="con">
    <div class="grid g4" style="text-align:center">
      <div><div style="font-size:28px;font-weight:900;color:var(--g)">500+</div><div class="tsm" style="color:var(--s500)">Petani Terbantu</div></div>
      <div><div style="font-size:28px;font-weight:900;color:var(--g)">6</div><div class="tsm" style="color:var(--s500)">Praktisi Ahli</div></div>
      <div><div style="font-size:28px;font-weight:900;color:var(--g)">4.9★</div><div class="tsm" style="color:var(--s500)">Rating Rata-rata</div></div>
      <div><div style="font-size:28px;font-weight:900;color:var(--g)">24/7</div><div class="tsm" style="color:var(--s500)">Dukungan WhatsApp</div></div>
    </div>
  </div>
</section>

<!-- LAYANAN -->
<section class="sec">
  <div class="con">
    <div class="sec-hd">
      <div class="sec-ttl">Layanan Kami</div>
      <p class="sec-sub">Solusi lengkap untuk kebutuhan kebun dan pertanian Anda dari konsultasi hingga pengadaan sarana tani.</p>
    </div>
    <div class="grid g4">$svcHtml</div>
  </div>
</section>

<!-- PRAKTISI UNGGULAN -->
<section class="sec" style="background:var(--s50)">
  <div class="con">
    <div class="sec-hd">
      <div class="sec-ttl">Praktisi Unggulan</div>
      <p class="sec-sub">Konsultasi langsung dengan pakar agronom bersertifikasi nasional.</p>
    </div>
    <div class="grid g3">$pkHtml</div>
    <div class="tc mt8">
      <a href="pages/konsultasi.html" class="btn btn-g btn-lg">Lihat Semua Praktisi</a>
    </div>
  </div>
</section>

<!-- CARA KERJA -->
<section class="sec">
  <div class="con">
    <div class="sec-hd">
      <div class="sec-ttl">Cara Kerja</div>
      <p class="sec-sub">Mulai konsultasi dalam 3 langkah mudah.</p>
    </div>
    <div class="grid g3">
      <div style="text-align:center;padding:24px">
        <div style="width:56px;height:56px;background:var(--gl);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;font-size:24px">🔍</div>
        <div style="font-weight:800;font-size:16px;margin-bottom:8px">1. Pilih Praktisi</div>
        <p class="tsm" style="color:var(--s500)">Jelajahi profil praktisi ahli sesuai kebutuhan tanaman atau permasalahan kebun Anda.</p>
      </div>
      <div style="text-align:center;padding:24px">
        <div style="width:56px;height:56px;background:var(--gl);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;font-size:24px">📅</div>
        <div style="font-weight:800;font-size:16px;margin-bottom:8px">2. Booking &amp; Bayar</div>
        <p class="tsm" style="color:var(--s500)">Tentukan jadwal sesi, selesaikan pembayaran aman via QRIS atau Transfer Bank (Midtrans).</p>
      </div>
      <div style="text-align:center;padding:24px">
        <div style="width:56px;height:56px;background:var(--gl);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;font-size:24px">💬</div>
        <div style="font-weight:800;font-size:16px;margin-bottom:8px">3. Konsultasi Video Call</div>
        <p class="tsm" style="color:var(--s500)">Tautan ruang video call dikirim otomatis ke WhatsApp. Mulai sesi konsultasi langsung dengan praktisi ahli.</p>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="sec-sm" style="background:linear-gradient(135deg,var(--gx),var(--g));color:#fff">
  <div class="con tc">
    <div style="font-size:28px;font-weight:800;margin-bottom:10px">Siap Merawat Kebun Anda?</div>
    <p style="opacity:.85;margin-bottom:24px;font-size:15px">Bergabung bersama 500+ petani dan pecinta tanaman yang sudah merasakan manfaat Hallobun.</p>
    <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap">
      <a href="pages/register.html" class="btn btn-w btn-lg">Daftar Sekarang</a>
      <a href="pages/konsultasi.html" class="btn btn-lg" style="background:rgba(255,255,255,.15);color:#fff;border:1.5px solid rgba(255,255,255,.4)">Lihat Praktisi</a>
    </div>
  </div>
</section>

$indexFoot
</body>
</html>
HTML;
file_put_contents("$base/index.html", $index);
echo "✓ index.html\n";

echo "All base files written. Continuing with inner pages...\n";
'

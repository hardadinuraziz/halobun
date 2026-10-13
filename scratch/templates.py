# Templates and Common UI Components for Hallobun Static Site

WA_SVG = '<svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>'

def head(title, pfx="", desc="Platform tele-agronomi dan bimbingan berkebun terpercaya Indonesia."):
    return f"""<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="description" content="{desc}">
<title>{title} — Hallobun</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{pfx}css/style.css">
</head><body>"""

def nav(pfx="", active=""):
    links = [
        ("","Beranda"),
        ("pages/konsultasi.html","Konsultasi"),
        ("pages/kunjungan.html","Kunjungan"),
        ("pages/narsum.html","Narsum"),
        ("pages/layanan.html","Layanan"),
        ("pages/sarana.html","Sarana")
    ]
    li = ""
    for href, label in links:
        target = pfx + href if href else pfx + "index.html"
        cls = ' class="active"' if (active and active.lower() in label.lower()) or (not active and href=="") else ""
        li += f'<li><a href="{target}"{cls}>{label}</a></li>'
    return f"""<nav class="nb">
  <a class="nb-brand" href="{pfx}index.html"><img src="{pfx}images/logo.png" alt="Hallobun"><span>Hallobun</span></a>
  <ul class="nb-nav" id="navLinks">{li}</ul>
  <div class="nb-act" id="navActions">
    <a href="{pfx}pages/login.html" class="b-out">Masuk</a>
    <a href="{pfx}pages/register.html" class="b-grn">Daftar</a>
  </div>
  <button class="hbg" onclick="toggleNav()" aria-label="Menu"><span></span><span></span><span></span></button>
</nav>"""

def footer(pfx=""):
    return f"""<footer class="ft"><div class="ft-in">
  <div class="ft-g">
    <div class="ft-brand"><img class="ft-logo" src="{pfx}images/logo.png" alt="Hallobun">
      <p>Platform tele-agronomi & layanan kebun terpercaya. Konsultasi bersama praktisi agronom bersertifikasi Indonesia.</p>
      <div style="display:flex;gap:12px;margin-top:16px">
        <a href="https://wa.me/6281234567890" style="color:rgba(255,255,255,.5)" title="WhatsApp">{WA_SVG}</a>
      </div>
    </div>
    <div class="ft-col"><h4>Layanan</h4><ul>
      <li><a href="{pfx}pages/konsultasi.html">Konsultasi Online</a></li>
      <li><a href="{pfx}pages/kunjungan.html">Kunjungan Lahan</a></li>
      <li><a href="{pfx}pages/narsum.html">Undang Narsum</a></li>
      <li><a href="{pfx}pages/layanan.html">Semua Layanan</a></li>
      <li><a href="{pfx}pages/sarana.html">Sarana Tani</a></li>
    </ul></div>
    <div class="ft-col"><h4>Akun</h4><ul>
      <li><a href="{pfx}pages/login.html">Masuk</a></li>
      <li><a href="{pfx}pages/register.html">Daftar</a></li>
      <li><a href="{pfx}pages/dashboard.html">Dashboard</a></li>
      <li><a href="{pfx}pages/riwayat.html">Riwayat Booking</a></li>
      <li><a href="{pfx}pages/admin/dashboard.html">Panel Admin</a></li>
    </ul></div>
    <div class="ft-col"><h4>Kontak</h4><ul>
      <li><a href="https://wa.me/6281234567890">WhatsApp CS</a></li>
      <li><a href="mailto:info@hallobun.com">info@hallobun.com</a></li>
      <li><a href="#">Instagram @hallobun</a></li>
      <li><a href="#">YouTube Hallobun</a></li>
    </ul></div>
  </div>
  <div class="ft-bot"><span>&copy; 2026 Hallobun Indonesia. Seluruh hak dilindungi.</span><span style="display:flex;gap:16px"><a href="#">Privasi</a><a href="#">S&K</a></span></div>
</div></footer>
<div class="wa"><a href="https://wa.me/6281234567890" target="_blank">{WA_SVG} WhatsApp CS</a></div>
<script src="{pfx}js/app.js"></script>"""

def adm_sidebar(active=""):
    menu = [
        ("dashboard.html","📊","Dashboard",False),
        ("","","Pemesanan",True),
        ("konsultasi.html","💬","Konsultasi",False),
        ("kunjungan.html","🚜","Kunjungan",False),
        ("narsum.html","🎤","Narsum",False),
        ("","","Katalog",True),
        ("sarana.html","🌿","Sarana",False),
        ("","","Pengguna",True),
        ("users.html","👥","Semua User",False),
        ("praktisi.html","🌾","Praktisi",False),
        ("","","Keuangan",True),
        ("payments.html","💳","Pembayaran",False),
    ]
    nav_html = ""
    for href, icon, label, is_lbl in menu:
        if is_lbl:
            nav_html += f'<div class="sb-lbl">{label}</div>'
        else:
            cls = ' class="active"' if href == active else ""
            nav_html += f'<a href="{href}"{cls}>{icon} {label}</a>'
    return f"""<div class="sb">
  <div class="sb-hd">
    <img src="../../images/logo.png" alt="Hallobun" style="height:28px;filter:brightness(0) invert(1);flex-shrink:0">
    <div><div class="bt">Hallobun</div><div class="bs">Panel Admin</div></div>
  </div>
  <div class="sb-nav">{nav_html}</div>
  <div style="padding:14px;border-top:1px solid rgba(255,255,255,.08)">
    <a href="../login.html" style="display:flex;align-items:center;gap:8px;color:rgba(255,255,255,.45);font-size:13px">🚪 Keluar</a>
  </div>
</div>"""

def adm_top(title, extra=""):
    return f"""<div class="adm-top">
  <h2>{title}</h2>
  <div style="display:flex;align-items:center;gap:12px">
    {extra}
    <span style="font-size:13px;color:var(--s500)">👤 Admin Hallobun</span>
    <a href="../login.html" class="btn btn-o btn-sm">Keluar</a>
  </div>
</div>"""

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>المنافذ — نظام إدارة الشبكات</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}"><style>
/* Override port colors: yellow=unconnected, green=connected, red=error, grey=idle */
.port.up          { border-color:#ffd600; color:#ffd600; background:rgba(255,214,0,0.12); }
.port.active-port { border-color:#00e676; color:#00e676; background:rgba(0,230,118,0.12); animation:pulse-port 2s infinite; }
.port.down        { border-color:#ff1744; color:#ff1744; background:rgba(255,23,68,0.12); }
.port.idle        { border-color:#78909c; color:#78909c; background:rgba(120,144,156,0.07); cursor:pointer; }
.port.idle:hover  { border-color:var(--cyan); }

/* Idle port modal */
.idle-modal {
  position:fixed; inset:0; background:rgba(0,0,0,0.7);
  display:none; align-items:center; justify-content:center;
  z-index:500; backdrop-filter:blur(4px);
}
.idle-modal.open { display:flex; }
.idle-box {
  background:linear-gradient(145deg,var(--blue-mid),var(--blue-deep));
  border:1px solid var(--card-border); border-radius:20px;
  padding:28px; width:380px; max-width:95vw; animation:fadeIn 0.2s ease;
}
.idle-box h3 { color:var(--cyan); font-size:16px; margin-bottom:16px; }
.field-group { margin-bottom:12px; }
.field-group label { display:block; font-size:12px; color:var(--text-muted); font-weight:700; margin-bottom:5px; }
.field-group input {
  width:100%; padding:9px 12px; border-radius:9px;
  border:1px solid var(--card-border); background:rgba(255,255,255,0.05);
  color:var(--text); font-family:Cairo,sans-serif; font-size:13px; outline:none; box-sizing:border-box;
}
.field-group input:focus { border-color:var(--cyan); }
</style>
</head>
<body>
<div class="app">
 @include('sidebar')

  <main class="main">
    <div class="page-header">
      <div>
        <div class="page-title">المنافذ</div>
        <div class="page-subtitle">مراقبة حالة منافذ السويتشات</div>
      </div>
      <div class="header-actions">
        <div style="display:flex;gap:10px;align-items:center;flex-wrap:wrap;font-size:12px;">
          <span style="display:flex;align-items:center;gap:5px;"><span style="width:11px;height:11px;border-radius:3px;background:rgba(0,230,118,0.3);border:2px solid #00e676;display:inline-block;"></span>متصل</span>
          <span style="display:flex;align-items:center;gap:5px;"><span style="width:11px;height:11px;border-radius:3px;background:rgba(255,214,0,0.2);border:2px solid #ffd600;display:inline-block;"></span>غير متصل</span>
          <span style="display:flex;align-items:center;gap:5px;"><span style="width:11px;height:11px;border-radius:3px;background:rgba(255,23,68,0.2);border:2px solid #ff1744;display:inline-block;"></span>خطأ</span>
          <span style="display:flex;align-items:center;gap:5px;"><span style="width:11px;height:11px;border-radius:3px;border:2px solid #78909c;display:inline-block;"></span>خامل</span>
        </div>
      </div>
    </div>

    <!-- SW-01 -->
    <div class="card">
      <div class="card-header">
        <div>
          <div class="card-title">SW-01 — المبنى الرئيسي</div>
          <div style="font-size:12px;color:var(--text-muted);margin-top:2px;">Cisco Catalyst 2960 • 192.168.1.254 • 24 منفذ</div>
        </div>
        <span class="badge badge-green"><div class="dot"></div>متصل</span>
      </div>
      <div class="port-grid">
        <div class="port active-port">1<div class="tooltip">Fa0/1 • 192.168.1.10 • Server-Main</div></div>
        <div class="port active-port">2<div class="tooltip">Fa0/2 • 192.168.1.11 • PC-Admin</div></div>
        <div class="port active-port">3<div class="tooltip">Fa0/3 • 192.168.1.12</div></div>
        <div class="port active-port">4<div class="tooltip">Fa0/4 • 192.168.1.13</div></div>
        <div class="port active-port">5<div class="tooltip">Fa0/5 • 192.168.1.14</div></div>
        <div class="port idle" onclick="openIdleModal('Fa0/6')">6<div class="tooltip">خامل — اضغط لإضافة تفاصيل</div></div>
        <div class="port active-port">7<div class="tooltip">Fa0/7 • Staff-Laptop-07</div></div>
        <div class="port active-port">8<div class="tooltip">Fa0/8 • 192.168.1.18</div></div>
        <div class="port down">9<div class="tooltip">Fa0/9 • خطأ في الكيبل</div></div>
        <div class="port active-port">10<div class="tooltip">Fa0/10 • 192.168.1.20</div></div>
        <div class="port active-port">11<div class="tooltip">Fa0/11 • 192.168.1.21</div></div>
        <div class="port active-port">12<div class="tooltip">Fa0/12 • WiFi-AP-Lib</div></div>
        <div class="port idle" onclick="openIdleModal('Fa0/13')">13<div class="tooltip">خامل — اضغط لإضافة تفاصيل</div></div>
        <div class="port idle" onclick="openIdleModal('Fa0/14')">14<div class="tooltip">خامل — اضغط لإضافة تفاصيل</div></div>
        <div class="port active-port">15<div class="tooltip">Fa0/15 • 192.168.1.30</div></div>
        <div class="port active-port">16<div class="tooltip">Fa0/16 • 192.168.1.31</div></div>
        <div class="port active-port">17<div class="tooltip">Fa0/17 • 192.168.1.32</div></div>
        <div class="port idle" onclick="openIdleModal('Fa0/18')">18<div class="tooltip">خامل — اضغط لإضافة تفاصيل</div></div>
        <div class="port active-port">19<div class="tooltip">Fa0/19 • 192.168.1.40</div></div>
        <div class="port active-port">20<div class="tooltip">Fa0/20 • Printer-Admin</div></div>
        <div class="port up">21<div class="tooltip">Fa0/21 • 192.168.1.50 • غير متصل</div></div>
        <div class="port active-port">22<div class="tooltip">Fa0/22 • 192.168.1.51</div></div>
        <div class="port down">23<div class="tooltip">Fa0/23 • فحص الكيبل</div></div>
        <div class="port active-port">24<div class="tooltip">Fa0/24 • Uplink</div></div>
      </div>
    </div>

    <!-- SW-02 -->
    <div class="card">
      <div class="card-header">
        <div>
          <div class="card-title">SW-02 — المختبرات</div>
          <div style="font-size:12px;color:var(--text-muted);margin-top:2px;">Cisco Catalyst 2960 • 192.168.2.254 • 24 منفذ</div>
        </div>
        <span class="badge badge-orange"><div class="dot"></div>تحذير - حمل عالي</span>
      </div>
      <div class="port-grid">
        <div class="port active-port">1<div class="tooltip">Lab-PC-01</div></div>
        <div class="port active-port">2<div class="tooltip">Lab-PC-02</div></div>
        <div class="port active-port">3<div class="tooltip">Lab-PC-03</div></div>
        <div class="port active-port">4<div class="tooltip">Lab-PC-04</div></div>
        <div class="port active-port">5<div class="tooltip">Lab-PC-05</div></div>
        <div class="port active-port">6<div class="tooltip">Lab-PC-06</div></div>
        <div class="port active-port">7<div class="tooltip">Lab-PC-07</div></div>
        <div class="port active-port">8<div class="tooltip">Lab-PC-08</div></div>
        <div class="port active-port">9<div class="tooltip">Lab-PC-09</div></div>
        <div class="port active-port">10<div class="tooltip">Lab-PC-10</div></div>
        <div class="port active-port">11<div class="tooltip">Lab-PC-11</div></div>
        <div class="port active-port">12<div class="tooltip">Lab-PC-12</div></div>
        <div class="port active-port">13<div class="tooltip">Lab-PC-13</div></div>
        <div class="port active-port">14<div class="tooltip">Lab-PC-14</div></div>
        <div class="port active-port">15<div class="tooltip">Lab-PC-15</div></div>
        <div class="port idle" onclick="openIdleModal('Fa0/16')">16<div class="tooltip">خامل — اضغط لإضافة تفاصيل</div></div>
        <div class="port active-port">17<div class="tooltip">Lab-PC-17</div></div>
        <div class="port active-port">18<div class="tooltip">Lab-PC-18</div></div>
        <div class="port down">19<div class="tooltip">خطأ في الاتصال</div></div>
        <div class="port active-port">20<div class="tooltip">Lab-PC-20</div></div>
        <div class="port active-port">21<div class="tooltip">Lab-PC-21</div></div>
        <div class="port active-port">22<div class="tooltip">Lab-PC-22</div></div>
        <div class="port active-port">23<div class="tooltip">Lab-PC-23</div></div>
        <div class="port active-port">24<div class="tooltip">Lab-PC-24</div></div>
      </div>
    </div>

    <!-- Details table — no speed column -->
    <div class="card">
      <div class="card-header">
        <div class="card-title">تفاصيل المنافذ النشطة</div>
      </div>
      <table>
        <thead>
          <tr>
            <th>المنفذ</th>
            <th>عنوان IP</th>
            <th>عنوان MAC</th>
            <th>الحالة</th>
            <th>الجهاز</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="font-family:monospace;color:var(--cyan)">SW-01 Fa0/2</td>
            <td style="font-family:monospace">192.168.1.11</td>
            <td style="font-family:monospace;font-size:12px;color:var(--text-muted)">B4:2E:99:AA:11:22</td>
            <td><span class="badge badge-green">متصل</span></td>
            <td>PC-Admin</td>
          </tr>
          <tr>
            <td style="font-family:monospace;color:var(--cyan)">SW-02 Fa0/24</td>
            <td style="font-family:monospace">192.168.2.24</td>
            <td style="font-family:monospace;font-size:12px;color:var(--text-muted)">A4:C3:F0:11:22:33</td>
            <td><span class="badge badge-green">متصل</span></td>
            <td>Lab-PC-24</td>
          </tr>
          <tr>
            <td style="font-family:monospace;color:var(--red)">SW-01 Fa0/9</td>
            <td style="font-family:monospace;color:var(--text-muted)">—</td>
            <td style="font-family:monospace;font-size:12px;color:var(--text-muted)">—</td>
            <td><span class="badge badge-red">معطل</span></td>
            <td style="color:var(--red)">فحص الكيبل</td>
          </tr>
          <tr>
            <td style="font-family:monospace;color:var(--cyan)">SW-01 Fa0/12</td>
            <td style="font-family:monospace">192.168.3.50</td>
            <td style="font-family:monospace;font-size:12px;color:var(--text-muted)">CC:01:E5:A4:B3:11</td>
            <td><span class="badge badge-green">متصل</span></td>
            <td>WiFi-AP-LibFloor2</td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>
</div>

<!-- IDLE PORT MODAL -->
<div class="idle-modal" id="idleModal">
  <div class="idle-box">
    <h3>تفاصيل المنفذ الخامل — <span id="idlePortName"></span></h3>
    <div class="field-group"><label>نوع المنفذ</label><input id="idlePortType" placeholder="مثال: Fa / Gi / Te"></div>
    <div class="field-group"><label>عنوان IP</label><input id="idlePortIp" placeholder="مثال: 192.168.1.X"></div>
    <div class="field-group"><label>MAC Address</label><input id="idlePortMac" placeholder="مثال: AA:BB:CC:DD:EE:FF"></div>
    <div class="field-group"><label>اسم أو نوع الجهاز</label><input id="idlePortDevice" placeholder="مثال: PC-Lab-10"></div>
    <div class="modal-nav" style="display:flex;gap:10px;justify-content:flex-end;margin-top:16px;">
      <button class="btn btn-outline" onclick="closeIdleModal()">إلغاء</button>
      <button class="btn btn-primary" onclick="saveIdlePort()">حفظ</button>
    </div>
  </div>
</div>

<script>
let currentIdlePort = "";
function openIdleModal(portName) {
  currentIdlePort = portName;
  document.getElementById("idlePortName").textContent = portName;
  ["idlePortType","idlePortIp","idlePortMac","idlePortDevice"].forEach(id => document.getElementById(id).value = "");
  document.getElementById("idleModal").classList.add("open");
}
function closeIdleModal() { document.getElementById("idleModal").classList.remove("open"); }
function saveIdlePort() {
  const t = document.getElementById("idlePortType").value;
  const ip = document.getElementById("idlePortIp").value;
  const mac = document.getElementById("idlePortMac").value;
  const dev = document.getElementById("idlePortDevice").value;
  if (!t && !ip && !mac && !dev) { closeIdleModal(); return; }
  alert(`تم حفظ تفاصيل المنفذ ${currentIdlePort} بنجاح ✓`);
  closeIdleModal();
}
</script>

<!-- ===== MOBILE TOPBAR ===== -->
<header class="mobile-topbar">
  <div class="mobile-topbar-logo">
    <div class="mobile-logo-icon">
      <svg viewBox="0 0 24 24" fill="white" width="18" height="18"><path d="M17 8C8 10 5.9 16.17 3.82 20.82L5.71 22l1-2.3A4.49 4.49 0 0 0 8 20c4 0 4-2 8-2s4 2 8 2v-2c-4 0-4-2-8-2a9.23 9.23 0 0 0-1.06.06C15.06 12.44 18.12 9.62 22 8.93V7C19.87 7.17 18.02 7.44 17 8zM5 14v-4H3v4c0 2.21 1.79 4 4 4h2v-2H7c-1.1 0-2-.9-2-2zm6-8V2h-2v4H7l5 5 5-5h-4-2z"/></svg>
    </div>
    <span class="mobile-topbar-title">نظام إدارة الشبكات</span>
  </div>
  <button class="mobile-menu-btn" onclick="openDrawer()">
    <span></span><span></span><span></span>
  </button>
</header>

<div class="mobile-overlay" id="mobileOverlay" onclick="closeDrawer()"></div>

<nav class="mobile-drawer" id="mobileDrawer">
  <div class="mobile-drawer-header">
    <h2>القائمة</h2>
    <button class="mobile-close-btn" onclick="closeDrawer()">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>
    </button>
  </div>

  <div class="mobile-drawer-nav">
    <a class="nav-item" href="{{ route('dashboard') }}">
      <svg class="nav-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/></svg>
      لوحة التحكم
    </a>

    <a class="nav-item" href="{{ route('networks') }}">
      <svg class="nav-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M15 9H9v6h6V9zm-2 4h-2v-2h2v2zm8-2V9h-2V7c0-1.1-.9-2-2-2h-2V3h-2v2h-2V3H9v2H7c-1.1 0-2 .9-2 2v2H3v2h2v2H3v2h2v2c0 1.1.9 2 2 2h2v2h2v-2h2v2h2v-2h2c1.1 0 2-.9 2-2v-2h2v-2h-2v-2h2zm-4 6H7V7h10v10z"/></svg>
      الشبكات
    </a>

    <a class="nav-item" href="{{ route('devices') }}">
      <svg class="nav-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M20 18c1.1 0 1.99-.9 1.99-2L22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2H0v2h24v-2h-4zm-16-2V6h16v10H4z"/></svg>
      الأجهزة
    </a>

    <a class="nav-item active" href="{{ route('ports') }}">
      <svg class="nav-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M7 5H5v2h2V5zm0 4H5v2h2V9zm0 4H5v2h2v-2zm8-8H9v2h6V5zm0 4H9v2h6V9zm0 4H9v2h6v-2zm4-8h-2v2h2V5zm0 4h-2v2h2V9zm0 4h-2v2h2v-2z"/></svg>
      المنافذ
    </a>

    <a class="nav-item" href="{{ route('active-devices') }}">
      <svg class="nav-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M3.5 18.49l6-6.01 4 4L22 6.92l-1.41-1.41-7.09 7.97-4-4L2 16.99z"/></svg>
      الأجهزة النشطة
    </a>

    <a class="nav-item" href="{{ route('wifi') }}">
      <svg class="nav-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M1 9l2 2c4.97-4.97 13.03-4.97 18 0l2-2C16.93 2.93 7.08 2.93 1 9zm8 8l3 3 3-3c-1.65-1.66-4.34-1.66-6 0zm-4-4l2 2c2.76-2.76 7.24-2.76 10 0l2-2C15.14 9.14 8.87 9.14 5 13z"/></svg>
      شبكات الواي فاي
    </a>

    <a class="nav-item" href="{{ route('users.index') }}">
      <svg class="nav-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
      إدارة المستخدمين
    </a>

    <a class="nav-item" href="{{ route('team') }}">
      <svg class="nav-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
      فريق العمل
    </a>

    <a class="nav-item" href="{{ route('profile') }}" style="border-top:1px solid rgba(33,150,243,0.2);padding-top:9px;margin-top:6px;">
      <svg class="nav-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
      الملف الشخصي
    </a>
  </div>

  <div class="mobile-drawer-footer">
    <div class="live-indicator"><div class="live-dot"></div>مباشر الآن</div>
    <div style="margin-top:6px;">نظام إدارة الشبكات v1.0</div>
    <div style="color:rgba(120,144,156,0.5)">مشروع التخرج 2026</div>
  </div>
</nav>

<script>
  function openDrawer() {
    document.getElementById('mobileDrawer').classList.add('open');
    document.getElementById('mobileOverlay').classList.add('open');
  }
  function closeDrawer() {
    document.getElementById('mobileDrawer').classList.remove('open');
    document.getElementById('mobileOverlay').classList.remove('open');
  }
</script>
</body>
</html>



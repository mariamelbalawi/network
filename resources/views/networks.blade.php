<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>الشبكات — نظام إدارة الشبكات</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<style>
  table.networks-table {
    width: 100%;
    border-collapse: collapse;
    overflow: hidden;
    border-radius: 18px;
  }

  table.networks-table thead th {
    text-align: right;
    padding: 18px 20px;
    font-size: 14px;
    color: var(--text-muted);
    border-bottom: 1px solid rgba(33, 150, 243, 0.18);
    background: rgba(8, 28, 58, 0.35);
    white-space: nowrap;
  }

  table.networks-table tbody td {
    padding: 16px 20px;
    border-bottom: 1px solid rgba(33, 150, 243, 0.12);
    vertical-align: middle;
    font-size: 15px;
  }

  table.networks-table tbody tr {
    transition: 0.25s ease;
  }

  table.networks-table tbody tr:hover {
    background: rgba(33, 150, 243, 0.06);
  }

  table.networks-table tbody tr:last-child td {
    border-bottom: none;
  }

  .network-name-cell {
    display: flex;
    align-items: center;
    gap: 10px;
    font-weight: 700;
    color: var(--text-light);
  }

  .network-icon {
    font-size: 18px;
    line-height: 1;
  }

  .devices-count {
    font-weight: 700;
    color: #dbeafe;
  }

  .ip-cell {
    font-family: monospace;
    color: var(--cyan);
    font-size: 14px;
    letter-spacing: 0.3px;
  }

  @media (max-width: 768px) {
    table.networks-table thead th,
    table.networks-table tbody td {
      padding: 14px 12px;
      font-size: 13px;
    }

    .network-name-cell {
      gap: 6px;
      font-size: 13px;
    }

    .ip-cell {
      font-size: 12px;
    }
  }
</style>
</head>
<body>
<div class="app">

 @include('sidebar')

  <main class="main">
    <div class="page-header">
      <div>
        <div class="page-title" data-i18n="net-page-title">الشبكات</div>
        <div class="page-subtitle" data-i18n="net-page-sub">إدارة ومراقبة جميع شبكات الكلية</div>
      </div>
      <div class="header-actions">
        <div class="search-box">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="var(--text-muted)"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
          <input type="text" data-i18n-placeholder="search-network" placeholder="ابحث عن شبكة...">
        </div>
        <button class="btn btn-primary"><span data-i18n="btn-add-network">+ إضافة شبكة</span></button>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <div class="card-title" data-i18n="card-topology">طبولوجيا الشبكة</div>
        <span class="badge badge-green"><div class="dot"></div><span data-i18n="badge-connected-of">8 / 12 متصل</span></span>
      </div>
      <div class="network-visual">
        <div class="net-node">
          <div class="net-icon online">🌍<div class="net-status-dot" style="background:var(--green)"></div></div>
          <div class="net-label" data-i18n="internet">الإنترنت</div>
          <div class="net-sublabel">1 Gbps</div>
        </div>
        <div class="net-line"></div>
        <div class="net-node">
          <div class="net-icon online">🔀<div class="net-status-dot" style="background:var(--green)"></div></div>
          <div class="net-label" data-i18n="main-router">Router الرئيسي</div>
          <div class="net-sublabel">192.168.0.1</div>
        </div>
        <div class="net-line"></div>
        <div style="display:flex; flex-direction:column; gap:12px;">
          <div class="net-node" style="flex-direction:row; gap:8px;">
            <div class="net-icon online" style="width:44px;height:44px;font-size:18px">🏛️<div class="net-status-dot" style="background:var(--green)"></div></div>
            <div><div class="net-label" data-i18n="main-building">المبنى الرئيسي</div><div class="net-sublabel">192.168.1.0/24</div></div>
          </div>
          <div class="net-node" style="flex-direction:row; gap:8px;">
            <div class="net-icon warning" style="width:44px;height:44px;font-size:18px">🔬<div class="net-status-dot" style="background:var(--orange)"></div></div>
            <div><div class="net-label" data-i18n="labs">المختبرات</div><div class="net-sublabel">192.168.2.0/24</div></div>
          </div>
          <div class="net-node" style="flex-direction:row; gap:8px;">
            <div class="net-icon offline" style="width:44px;height:44px;font-size:18px">🏠<div class="net-status-dot" style="background:var(--red)"></div></div>
            <div><div class="net-label" data-i18n="dormitory">السكن الجامعي</div><div class="net-sublabel">192.168.4.0/24</div></div>
          </div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <div class="card-title" data-i18n="card-all-networks">جميع الشبكات</div>
        <span style="font-size:13px; color:var(--text-muted)" data-i18n="total-networks">12 شبكة</span>
      </div>

      <table class="networks-table">
        <thead>
          <tr>
            <th data-i18n="th-net-name">اسم الشبكة</th>
            <th data-i18n="th-ip-range">نطاق IP</th>
            <th data-i18n="th-status">الحالة</th>
            <th data-i18n="th-devices-count">الأجهزة</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <div class="network-name-cell">
                <span class="network-icon">🏛️</span>
                <span data-i18n="main-building">المبنى الرئيسي</span>
              </div>
            </td>
            <td class="ip-cell">192.168.1.0/24</td>
            <td><span class="badge badge-green"><div class="dot"></div><span data-i18n="status-connected">متصل</span></span></td>
            <td class="devices-count">87 / 120</td>
          </tr>

          <tr>
            <td>
              <div class="network-name-cell">
                <span class="network-icon">🔬</span>
                <span data-i18n="labs">المختبرات</span>
              </div>
            </td>
            <td class="ip-cell">192.168.2.0/24</td>
            <td><span class="badge badge-orange"><div class="dot"></div><span data-i18n="status-warning">تحذير</span></span></td>
            <td class="devices-count">64 / 80</td>
          </tr>

          <tr>
            <td>
              <div class="network-name-cell">
                <span class="network-icon">📚</span>
                <span data-i18n="library">المكتبة</span>
              </div>
            </td>
            <td class="ip-cell">192.168.3.0/24</td>
            <td><span class="badge badge-green"><div class="dot"></div><span data-i18n="status-connected">متصل</span></span></td>
            <td class="devices-count">32 / 60</td>
          </tr>

          <tr>
            <td>
              <div class="network-name-cell">
                <span class="network-icon">🏠</span>
                <span data-i18n="net-dorm-row">السكن الجامعي</span>
              </div>
            </td>
            <td class="ip-cell">192.168.4.0/24</td>
            <td><span class="badge badge-red"><div class="dot"></div><span data-i18n="status-disconn">انقطاع</span></span></td>
            <td class="devices-count">0 / 200</td>
          </tr>

          <tr>
            <td>
              <div class="network-name-cell">
                <span class="network-icon">👩‍🏫</span>
                <span data-i18n="staff-net">شبكة الأساتذة</span>
              </div>
            </td>
            <td class="ip-cell">192.168.5.0/24</td>
            <td><span class="badge badge-green"><div class="dot"></div><span data-i18n="status-connected">متصل</span></span></td>
            <td class="devices-count">28 / 50</td>
          </tr>

          <tr>
            <td>
              <div class="network-name-cell">
                <span class="network-icon">📡</span>
                <span data-i18n="public-wifi">الواي فاي العام</span>
              </div>
            </td>
            <td class="ip-cell">192.168.6.0/24</td>
            <td><span class="badge badge-green"><div class="dot"></div><span data-i18n="status-connected">متصل</span></span></td>
            <td class="devices-count">136 / 250</td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>
</div>

<script src="{{ asset('lang.js') }}"></script>

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

<!-- ===== MOBILE DRAWER ===== -->
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

    <a class="nav-item active" href="{{ route('networks') }}">
      <svg class="nav-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M15 9H9v6h6V9zm-2 4h-2v-2h2v2zm8-2V9h-2V7c0-1.1-.9-2-2-2h-2V3h-2v2h-2V3H9v2H7c-1.1 0-2 .9-2 2v2H3v2h2v2H3v2h2v2c0 1.1.9 2 2 2h2v2h2v-2h2v2h2v-2h2c1.1 0 2-.9 2-2v-2h2v-2h-2v-2h2zm-4 6H7V7h10v10z"/></svg>
      الشبكات
    </a>

    <a class="nav-item" href="{{ route('devices') }}">
      <svg class="nav-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M20 18c1.1 0 1.99-.9 1.99-2L22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2H0v2h24v-2h-4zm-16-2V6h16v10H4z"/></svg>
      الأجهزة
    </a>

    <a class="nav-item" href="{{ route('ports') }}">
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
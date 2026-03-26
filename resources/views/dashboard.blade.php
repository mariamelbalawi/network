<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>لوحة التحكم — نظام إدارة الشبكات</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="app">

 @include('sidebar')

  <main class="main">
    <div class="page-header">
      <div>
        <div class="page-title" data-i18n="dash-title">لوحة التحكم</div>
        <div class="page-subtitle" data-i18n="dash-subtitle">مراقبة شاملة لجميع شبكات الكلية • آخر تحديث: منذ 30 ثانية</div>
      </div>
      <div class="header-actions">
        <div class="live-indicator"><div class="live-dot"></div><span data-i18n="live-label">مباشر</span></div>

        <button class="btn btn-outline" type="button">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
            <path d="M17.65 6.35C16.2 4.9 14.21 4 12 4c-4.42 0-7.99 3.58-7.99 8s3.57 8 7.99 8c3.73 0 6.84-2.55 7.73-6h-2.08c-.82 2.33-3.04 4-5.65 4-3.31 0-6-2.69-6-6s2.69-6 6-6c1.66 0 3.14.69 4.22 1.78L13 11h7V4l-2.35 2.35z"/>
          </svg>
          <span data-i18n="btn-refresh">تحديث</span>
        </button>

        <button class="btn btn-primary" type="button">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="white">
            <path d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z"/>
          </svg>
          <span data-i18n="btn-export">تصدير التقرير</span>
        </button>
      </div>
    </div>

    <div class="stats-grid">
      <div class="stat-card" style="--accent-color:var(--cyan)">
        <div class="stat-icon" style="background:rgba(0,229,255,0.1)">🌐</div>
        <div class="stat-label" data-i18n="stat-networks">إجمالي الشبكات</div>
        <div class="stat-value glow-cyan">12</div>
        <div class="stat-change" style="color:var(--green)">
          <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><path d="M7 14l5-5 5 5z"/></svg>
          <span data-i18n="stat-net-sub">8 متصلة • 4 في الاستعداد</span>
        </div>
      </div>

      <div class="stat-card" style="--accent-color:var(--green)">
        <div class="stat-icon" style="background:rgba(0,230,118,0.1)">🖥️</div>
        <div class="stat-label" data-i18n="stat-devices">الأجهزة النشطة</div>
        <div class="stat-value glow-green">347</div>
        <div class="stat-change" style="color:var(--green)">
          <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><path d="M7 14l5-5 5 5z"/></svg>
          <span data-i18n="stat-dev-sub">من أصل 412 جهاز</span>
        </div>
      </div>

      <div class="stat-card" style="--accent-color:var(--orange)">
        <div class="stat-icon" style="background:rgba(255,145,0,0.1)">⚠️</div>
        <div class="stat-label" data-i18n="stat-alerts">تنبيهات نشطة</div>
        <div class="stat-value glow-orange">7</div>
        <div class="stat-change" style="color:var(--orange)">
          <span data-i18n="stat-alert-sub">3 حرجة • 4 تحذيرية</span>
        </div>
      </div>

      <div class="stat-card" style="--accent-color:var(--blue-accent)">
        <div class="stat-icon" style="background:rgba(33,150,243,0.1)">🎫</div>
        <div class="stat-label" data-i18n="stat-tickets">تذاكر معلقة</div>
        <div class="stat-value" style="color:var(--blue-light)">14</div>
        <div class="stat-change" style="color:var(--text-muted)">
          <span data-i18n="stat-tick-sub">تنتظر الموافقة</span>
        </div>
      </div>
    </div>

    <div class="two-cols">
      <div class="card">
        <div class="card-header">
          <div class="card-title" data-i18n="card-net-status">حالة الشبكات الرئيسية</div>
          <span class="badge badge-green"><div class="dot"></div><span data-i18n="badge-connected">8 متصلة</span></span>
        </div>

        <div style="padding:16px 24px; display:flex; flex-direction:column; gap:14px;">
          <div style="display:flex; align-items:center; gap:16px;">
            <div style="width:36px; text-align:center; font-size:20px">🏛️</div>
            <div style="flex:1">
              <div style="display:flex; justify-content:space-between; margin-bottom:6px;">
                <span style="font-size:14px; font-weight:600" data-i18n="net-main-bldg">شبكة المبنى الرئيسي</span>
                <span class="badge badge-green" style="font-size:11px"><div class="dot"></div><span data-i18n="status-connected">متصل</span></span>
              </div>
              <div class="progress-bar">
                <div class="progress-fill" style="width:78%; background:linear-gradient(90deg,var(--green),#69f0ae)"></div>
              </div>
              <div style="display:flex; justify-content:space-between; margin-top:4px; font-size:11px; color:var(--text-muted)">
                <span>192.168.1.0/24</span>
                <span>78% <span data-i18n="usage-label">استخدام</span></span>
              </div>
            </div>
          </div>

          <div style="display:flex; align-items:center; gap:16px;">
            <div style="width:36px; text-align:center; font-size:20px">🔬</div>
            <div style="flex:1">
              <div style="display:flex; justify-content:space-between; margin-bottom:6px;">
                <span style="font-size:14px; font-weight:600" data-i18n="net-labs">شبكة المختبرات</span>
                <span class="badge badge-orange" style="font-size:11px"><div class="dot"></div><span data-i18n="status-warning">تحذير</span></span>
              </div>
              <div class="progress-bar">
                <div class="progress-fill" style="width:92%; background:linear-gradient(90deg,var(--orange),#ffcc02)"></div>
              </div>
              <div style="display:flex; justify-content:space-between; margin-top:4px; font-size:11px; color:var(--text-muted)">
                <span>192.168.2.0/24</span>
                <span>92% <span data-i18n="usage-label">استخدام</span></span>
              </div>
            </div>
          </div>

          <div style="display:flex; align-items:center; gap:16px;">
            <div style="width:36px; text-align:center; font-size:20px">📚</div>
            <div style="flex:1">
              <div style="display:flex; justify-content:space-between; margin-bottom:6px;">
                <span style="font-size:14px; font-weight:600" data-i18n="net-library">شبكة المكتبة</span>
                <span class="badge badge-green" style="font-size:11px"><div class="dot"></div><span data-i18n="status-connected">متصل</span></span>
              </div>
              <div class="progress-bar">
                <div class="progress-fill" style="width:45%; background:linear-gradient(90deg,var(--blue-accent),var(--cyan))"></div>
              </div>
              <div style="display:flex; justify-content:space-between; margin-top:4px; font-size:11px; color:var(--text-muted)">
                <span>192.168.3.0/24</span>
                <span>45% <span data-i18n="usage-label">استخدام</span></span>
              </div>
            </div>
          </div>

          <div style="display:flex; align-items:center; gap:16px;">
            <div style="width:36px; text-align:center; font-size:20px">🏠</div>
            <div style="flex:1">
              <div style="display:flex; justify-content:space-between; margin-bottom:6px;">
                <span style="font-size:14px; font-weight:600" data-i18n="net-dorm">شبكة السكن الجامعي</span>
                <span class="badge badge-red" style="font-size:11px"><div class="dot"></div><span data-i18n="status-down">انقطاع</span></span>
              </div>
              <div class="progress-bar">
                <div class="progress-fill" style="width:0%"></div>
              </div>
              <div style="display:flex; justify-content:space-between; margin-top:4px; font-size:11px; color:var(--text-muted)">
                <span>192.168.4.0/24</span>
                <span data-i18n="unavailable">غير متاح</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <div class="card-title" data-i18n="card-alerts">آخر التنبيهات</div>
          <span class="badge badge-red"><div class="dot"></div><span data-i18n="badge-critical">3 حرجة</span></span>
        </div>

        <div class="alert-item">
          <div class="alert-icon" style="background:rgba(255,23,68,0.15); color:var(--red)">🔴</div>
          <div class="alert-content">
            <div class="alert-title" data-i18n="alert1-title">انقطاع الاتصال - السكن الجامعي</div>
            <div class="alert-desc" data-i18n="alert1-desc">192.168.4.1 - لم يستجب منذ 23 دقيقة</div>
          </div>
          <div class="alert-time" data-i18n="time-23m">منذ 23 د</div>
        </div>

        <div class="alert-item">
          <div class="alert-icon" style="background:rgba(255,145,0,0.15); color:var(--orange)">🟠</div>
          <div class="alert-content">
            <div class="alert-title" data-i18n="alert2-title">تحميل عالي - شبكة المختبرات</div>
            <div class="alert-desc" data-i18n="alert2-desc">استخدام النطاق الترددي وصل 92%</div>
          </div>
          <div class="alert-time" data-i18n="time-8m">منذ 8 د</div>
        </div>

        <div class="alert-item">
          <div class="alert-icon" style="background:rgba(255,23,68,0.15); color:var(--red)">🔴</div>
          <div class="alert-content">
            <div class="alert-title" data-i18n="alert3-title">فشل المصادقة المتكرر</div>
            <div class="alert-desc" data-i18n="alert3-desc">192.168.2.45 - 47 محاولة فاشلة</div>
          </div>
          <div class="alert-time" data-i18n="time-15m">منذ 15 د</div>
        </div>

        <div class="alert-item">
          <div class="alert-icon" style="background:rgba(0,229,255,0.15); color:var(--cyan)">🔵</div>
          <div class="alert-content">
            <div class="alert-title" data-i18n="alert4-title">جهاز جديد متصل</div>
            <div class="alert-desc" data-i18n="alert4-desc">MAC: A4:C3:F0:11:22:33 - شبكة الأساتذة</div>
          </div>
          <div class="alert-time" data-i18n="time-2m">منذ 2 د</div>
        </div>

        <div class="alert-item">
          <div class="alert-icon" style="background:rgba(0,230,118,0.15); color:var(--green)">🟢</div>
          <div class="alert-content">
            <div class="alert-title" data-i18n="alert5-title">استعادة الاتصال - الطابق الثالث</div>
            <div class="alert-desc" data-i18n="alert5-desc">SW-03 عاد للعمل بعد إعادة التشغيل</div>
          </div>
          <div class="alert-time" data-i18n="time-41m">منذ 41 د</div>
        </div>
      </div>
    </div>

    
  </main>
</div>

<script>
  setTimeout(() => {
    document.querySelectorAll('.progress-fill').forEach(el => {
      const w = el.style.width;
      el.style.width = '0%';
      setTimeout(() => el.style.width = w, 100);
    });
  }, 200);
</script>

<header class="mobile-topbar">
  <div class="mobile-topbar-logo">
    <div class="mobile-logo-icon">
      <svg viewBox="0 0 24 24" fill="white" width="18" height="18">
        <path d="M17 8C8 10 5.9 16.17 3.82 20.82L5.71 22l1-2.3A4.49 4.49 0 0 0 8 20c4 0 4-2 8-2s4 2 8 2v-2c-4 0-4-2-8-2a9.23 9.23 0 0 0-1.06.06C15.06 12.44 18.12 9.62 22 8.93V7C19.87 7.17 18.02 7.44 17 8zM5 14v-4H3v4c0 2.21 1.79 4 4 4h2v-2H7c-1.1 0-2-.9-2-2zm6-8V2h-2v4H7l5 5 5-5h-4z"/>
      </svg>
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
      <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
        <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
      </svg>
    </button>
  </div>

  <div class="mobile-drawer-nav">
    <a class="nav-item active" href="{{ route('dashboard') }}">
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



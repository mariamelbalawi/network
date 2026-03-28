<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>فريق العمل — نظام إدارة الشبكات</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<style>
*{
  box-sizing:border-box;
}

html,body{
  margin:0;
  padding:0;
  width:100%;
  min-height:100%;
  overflow-x:hidden;
}

body{
  background:linear-gradient(135deg,#081a33 0%,#0d2a4d 100%);
}

.app{
  min-height:100vh;
}

.main{
  margin-right:var(--sidebar-width,290px);
  width:calc(100% - var(--sidebar-width,290px));
  min-height:100vh;
  padding:24px;
  overflow-x:hidden;
}

.page-header{
  margin-bottom:18px;
}

.team-grid{
  display:grid;
  grid-template-columns:repeat(auto-fill,minmax(220px,1fr));
  gap:20px;
  margin-top:8px;
  width:100%;
  max-width:100%;
}

.team-card{
  width:100%;
  min-width:0;
  background:var(--card-bg);
  border:1px solid var(--card-border);
  border-radius:18px;
  padding:28px 20px;
  text-align:center;
  transition:all 0.3s;
}

.team-card:hover{
  transform:translateY(-4px);
  border-color:var(--cyan);
  box-shadow:0 8px 30px rgba(0,229,255,0.15);
}

.team-avatar{
  font-size:42px;
  width:70px;
  height:70px;
  background:rgba(33,150,243,0.1);
  border:2px solid var(--card-border);
  border-radius:50%;
  display:flex;
  align-items:center;
  justify-content:center;
  margin:0 auto 14px;
}

.team-name{
  font-size:15px;
  font-weight:700;
  color:var(--text);
  margin-bottom:6px;
  line-height:1.4;
  word-break:break-word;
}

.team-role{
  font-size:12px;
  font-weight:700;
  background:rgba(255,255,255,0.05);
  border-radius:20px;
  padding:4px 14px;
  display:inline-block;
  margin-bottom:14px;
}

.team-phone{
  display:flex;
  align-items:center;
  justify-content:center;
  gap:6px;
  font-size:13px;
  color:var(--text-muted);
  direction:ltr;
  flex-wrap:wrap;
}

.logo-icon,
.mobile-logo-icon{
  display:flex;
  align-items:center;
  justify-content:center;
}

.logo-icon img{
  width:64px;
  height:64px;
  object-fit:contain;
  display:block;
}

.mobile-logo-icon img{
  width:18px;
  height:18px;
  object-fit:contain;
  display:block;
}

@media (max-width:991px){
  .main{
    margin-right:var(--sidebar-width,250px);
    width:calc(100% - var(--sidebar-width,250px));
    padding:20px;
  }
}

@media (max-width:768px){
  .main{
    margin-right:var(--sidebar-width,220px);
    width:calc(100% - var(--sidebar-width,220px));
    padding:14px;
  }

  .team-grid{
    grid-template-columns:1fr;
  }

  .team-card{
    padding:22px 16px;
  }
}
.team-footer{
  width: 100%;
  margin-top: 50px;
  text-align: center;
  font-size: 15px;
  color: #bbbbbb;
  font-weight: 700;
  letter-spacing: 0.5px;
}

.team-footer::before{
  content: "";
  display: block;
  width: 70px;
  height: 2px;
  background: rgba(255,255,255,0.2);
  margin: 0 auto 12px;
}
</style>
</head>
<body>

<div class="app">
  @include('user.user-sidebar')

  <main class="main">
    <div class="page-header">
      <div>
        <div class="page-title">فريق العمل</div>
        <div class="page-subtitle">التيم المسؤول عن تطوير مشروع التخرج 2026</div>
      </div>
    </div>

    <div class="team-grid">

      <div class="team-card">
        <div class="team-avatar">☁️</div>
        <div class="team-name">Nourhan Ashraf Bayoumi</div>
        <div class="team-role" style="color:var(--cyan)">Cloud Computing</div>
        <div class="team-phone">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" style="flex-shrink:0">
            <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
          </svg>
          01069654062
        </div>
      </div>

      <div class="team-card">
        <div class="team-avatar">⚙️</div>
        <div class="team-name">Marwa Ismail Ismail</div>
        <div class="team-role" style="color:var(--orange)">Back End</div>
        <div class="team-phone">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" style="flex-shrink:0">
            <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
          </svg>
          01211064775
        </div>
      </div>

      <div class="team-card">
        <div class="team-avatar">🎨</div>
        <div class="team-name">Eman Ashraf Mohamed</div>
        <div class="team-role" style="color:var(--green)">Front End</div>
        <div class="team-phone">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" style="flex-shrink:0">
            <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
          </svg>
          01094353969
        </div>
      </div>

      <div class="team-card">
        <div class="team-avatar">🌐</div>
        <div class="team-name">Hussein Taha Hussein</div>
        <div class="team-role" style="color:var(--blue-light)">Network</div>
        <div class="team-phone">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" style="flex-shrink:0">
            <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
          </svg>
          01229345575
        </div>
      </div>

      <div class="team-card">
        <div class="team-avatar">🎨</div>
        <div class="team-name">Mariam Magdy Sayed</div>
        <div class="team-role" style="color:var(--green)">Front End</div>
        <div class="team-phone">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" style="flex-shrink:0">
            <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
          </svg>
          01205846848
        </div>
      </div>

      <div class="team-card">
        <div class="team-avatar">💻</div>
        <div class="team-name">Mariam Adel Sobhi</div>
        <div class="team-role" style="color:var(--orange)">Full Stack Developer</div>
        <div class="team-phone">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" style="flex-shrink:0">
            <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
          </svg>
          01002195184
        </div>
      </div>

      <div class="team-card">
        <div class="team-avatar">🌐</div>
        <div class="team-name">Menna Allah Abdelaziz</div>
        <div class="team-role" style="color:var(--blue-light)">Network</div>
        <div class="team-phone">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" style="flex-shrink:0">
            <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
          </svg>
          01035169030
        </div>
      </div>

    </div>
     <div class="team-footer">
    الفريق تحت إشراف د/ جمال موسى
</div>
  </main>
</div>

<header class="mobile-topbar">
  <div class="mobile-topbar-logo">
    <div class="mobile-logo-icon">
      <img src="{{ asset('images/logo.png') }}" alt="Logo">
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
    <a class="nav-item" href="/user-department">
      <svg class="nav-icon" viewBox="0 0 24 24" fill="currentColor">
        <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
      </svg>
      صفحة القسم
    </a>

    <a class="nav-item" href="/user-networks">
      <svg class="nav-icon" viewBox="0 0 24 24" fill="currentColor">
        <path d="M15 9H9v6h6V9zm-2 4h-2v-2h2v2zm8-2V9h-2V7c0-1.1-.9-2-2-2h-2V3h-2v2h-2V3H9v2H7c-1.1 0-2 .9-2 2v2H3v2h2v2H3v2h2v2c0 1.1.9 2 2 2h2v2h2v-2h2v2h2v-2h2c1.1 0 2-.9 2-2v-2h2v-2h-2v-2h2zm-4 6H7V7h10v10z"/>
      </svg>
      الشبكات والمنافذ
    </a>

    <a class="nav-item active" href="/user-team">
      <svg class="nav-icon" viewBox="0 0 24 24" fill="currentColor">
        <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
      </svg>
      فريق العمل
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


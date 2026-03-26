<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>إدارة المستخدمين — نظام إدارة الشبكات</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}"></head>
<body>
<div class="app">

 @include('sidebar')

  <main class="main">
    <div class="page-header">
      <div>
        <div class="page-title">إدارة المستخدمين</div>
        <div class="page-subtitle">إدارة حسابات وصلاحيات المستخدمين</div>
      </div>
      <div class="header-actions">
        <button class="btn btn-primary" onclick="openAddModal()">+ إضافة مستخدم</button>
      </div>
    </div>

  <div class="users-toolbar">
  <form method="GET" action="{{ route('users.index') }}">
    <input 
      class="search-input" 
      type="text" 
      name="search"
      placeholder="ابحث باسم المستخدم أو القسم..." 
      value="{{ request('search') }}"
    >
  </form>
</div>

    <div class="users-table-wrap">
      <table id="usersTable">
        <thead>
          <tr>
            <th onclick="sortTable(0)">اسم المستخدم ▲▼</th>
            <th onclick="sortTable(1)">الإيميل ▲▼</th>
            <th onclick="sortTable(3)">الدور ▲▼</th>
            <th onclick="sortTable(4)">القسم ▲▼</th>
            <th>إجراءات</th>
          </tr>
        </thead>
        <tbody id="usersBody">
  @forelse($users as $user)
    <tr>
      <td>{{ $user->name }}</td>
      <td style="font-size:13px;color:var(--text-muted)">{{ $user->email }}</td>
      <td>
  @if($user->role === 'admin')
    <span class="badge" style="background:rgba(244,67,54,0.15);color:#ff6b6b;border:1px solid rgba(244,67,54,0.3);font-size:11px">
      Admin
    </span>
  @else
    <span class="badge badge-green" style="font-size:11px">
      User
    </span>
  @endif
</td>
      <td>{{ $user->department->name ?? '-' }}</td>
      <td class="ticket-actions">

  @if($user->role !== 'admin')



    <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display:inline-block" onsubmit="return confirm('حذف المستخدم: {{ $user->name }} ؟')">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn-sm reject">حذف</button>
    </form>

  @else

    <span style="color:#999">غير مسموح</span>

  @endif

</td>
    </tr>
  @empty
    <tr>
      <td colspan="6" style="text-align:center;padding:30px;color:#8faecc;">
        لا يوجد مستخدمين
      </td>
    </tr>
  @endforelse
</tbody>
      </table>
    </div>
    <div class="empty-state" id="emptyMessage" style="display:none;">لا يوجد مستخدمين</div>

    <div class="modal-overlay" id="userModal">
      
  <div class="modal-box">
    <h2 id="modalTitle">إضافة مستخدم جديد</h2>

    <form method="POST" action="{{ route('users.store') }}">
      @csrf

      <label>اسم المستخدم</label>
      <input type="text" name="name" required>

      <label>الإيميل</label>
      <input type="email" name="email" required>

      <label>كلمة المرور</label>
      <input type="text" name="password" required>

      <label>القسم</label>
      <select name="department_id" required>
        <option value="">اختر القسم</option>
        @foreach ($departments as $department)
          <option value="{{ $department->id }}">{{ $department->name }}</option>
        @endforeach
      </select>
      <label>نوع المستخدم</label>
       <select name="role" required>
        <option value="user">User</option>
        <option value="admin">Admin</option>
     </select>
      

      <div class="modal-footer">
        <button type="button" class="btn btn-outline" onclick="closeModal()">إلغاء</button>
        <button type="submit" class="btn btn-primary">حفظ</button>
      </div>
    </form>
  </div>
</div>
  </main>
</div>

<script>
let editIdx = null;
let sortDir = Array(5).fill(true);
const tbody    = document.getElementById("usersBody");
const emptyMsg = document.getElementById("emptyMessage");
const modal    = document.getElementById("userModal");

function sortTable(col) {
  const keys = ["username","email","password","role","department"];
  users.sort((a,b) => {
    const x = a[keys[col]].toLowerCase(), y = b[keys[col]].toLowerCase();
    return sortDir[col] ? x.localeCompare(y) : y.localeCompare(x);
  });
  sortDir[col] = !sortDir[col];
  renderUsers();
}

function openAddModal() {
  document.getElementById("modalTitle").textContent = "إضافة مستخدم جديد";
  modal.classList.add("open");
}

function closeModal() { modal.classList.remove("open"); }
renderUsers();
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

    <a class="nav-item active" href="{{ route('users.index') }}">
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
<script>
document.querySelector('.search-input').addEventListener('input', function () {
    this.form.submit();
});
</script>

</body>
</html>
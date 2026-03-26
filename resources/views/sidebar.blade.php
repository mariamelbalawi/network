<aside class="sidebar">
    <div class="logo">
        <div class="logo-icon">
            <img src="{{ asset('images/logo.png') }}" style="width:45px;height:45px;object-fit:contain;">
        </div>
        <h1>نظام إدارة الشبكات</h1>
        <p>الجامعة التقنية</p>
    </div>

    <nav class="nav">

        <a class="nav-item" href="{{ route('dashboard') }}">لوحة التحكم</a>
        <a class="nav-item" href="{{ route('networks') }}">الشبكات</a>
        <a class="nav-item" href="{{ route('devices') }}">الأجهزة</a>
        <a class="nav-item" href="{{ route('ports') }}">المنافذ</a>
        <a class="nav-item" href="{{ route('active-devices') }}">الأجهزة النشطة</a>
        <a class="nav-item" href="{{ route('wifi') }}">شبكات الواي فاي</a>
        <a class="nav-item" href="{{ route('users.index') }}">إدارة المستخدمين</a>
        <a class="nav-item" href="{{ route('team') }}">فريق العمل</a>

        <a class="nav-item" href="{{ route('profile') }}" style="border-top:1px solid rgba(33,150,243,0.2);padding-top:10px;">
            الملف الشخصي
        </a>

    
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="nav-item" style="width:100%;border:none;background:none;text-align:right;cursor:pointer;color:#ff4d4d;">
                تسجيل الخروج
            </button>
        </form>

    </nav>

    <div class="sidebar-footer">
        <div class="live-indicator"><div class="live-dot"></div>مباشر الآن</div>
        <div style="margin-top:8px;">نظام إدارة الشبكات v1.0</div>
        <div style="color:rgba(120,144,156,0.6)">مشروع التخرج 2026</div>
    </div>
</aside>
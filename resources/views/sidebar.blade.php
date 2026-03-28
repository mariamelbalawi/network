<aside class="admin-fixed-sidebar">
    <div class="admin-fixed-sidebar__top">
        <div class="admin-fixed-sidebar__brand">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="admin-fixed-sidebar__logo">
            <div class="admin-fixed-sidebar__brand-text">
                <h1>نظام إدارة<br>الشبكات</h1>
                <p>كلية العلوم</p>
            </div>
        </div>

        <nav class="admin-fixed-sidebar__nav">
            <a class="admin-fixed-sidebar__nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <svg class="admin-fixed-sidebar__nav-icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                </svg>
                <span class="admin-fixed-sidebar__nav-text">لوحة التحكم</span>
            </a>

            <a class="admin-fixed-sidebar__nav-item {{ request()->routeIs('networks') ? 'active' : '' }}" href="{{ route('networks') }}">
                <svg class="admin-fixed-sidebar__nav-icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M4 6h16v12H4V6zm2 2v8h12V8H6zm2 2h8v2H8v-2z"/>
                </svg>
                <span class="admin-fixed-sidebar__nav-text">الشبكات</span>
            </a>

            <a class="admin-fixed-sidebar__nav-item {{ request()->routeIs('devices') ? 'active' : '' }}" href="{{ route('devices') }}">
                <svg class="admin-fixed-sidebar__nav-icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M4 5h16a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1h-6l2 3v1H8v-1l2-3H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1zm1 2v7h14V7H5z"/>
                </svg>
                <span class="admin-fixed-sidebar__nav-text">الأجهزة</span>
            </a>

            <a class="admin-fixed-sidebar__nav-item {{ request()->routeIs('ports') ? 'active' : '' }}" href="{{ route('ports') }}">
                <svg class="admin-fixed-sidebar__nav-icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M4 7h16v4H4V7zm0 6h16v4H4v-4zm2-4v2h2V9H6zm0 6v2h2v-2H6zm4-6v2h2V9h-2zm0 6v2h2v-2h-2z"/>
                </svg>
                <span class="admin-fixed-sidebar__nav-text">المنافذ</span>
            </a>

            <a class="admin-fixed-sidebar__nav-item {{ request()->routeIs('active-devices') ? 'active' : '' }}" href="{{ route('active-devices') }}">
                <svg class="admin-fixed-sidebar__nav-icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M12 3a9 9 0 1 0 9 9 9 9 0 0 0-9-9zm1 14.93V19h-2v-1.07A7.002 7.002 0 0 1 5.07 13H4v-2h1.07A7.002 7.002 0 0 1 11 5.07V4h2v1.07A7.002 7.002 0 0 1 18.93 11H20v2h-1.07A7.002 7.002 0 0 1 13 17.93zM12 7a5 5 0 1 0 5 5 5 5 0 0 0-5-5z"/>
                </svg>
                <span class="admin-fixed-sidebar__nav-text">الأجهزة النشطة</span>
            </a>

            <a class="admin-fixed-sidebar__nav-item {{ request()->routeIs('wifi') ? 'active' : '' }}" href="{{ route('wifi') }}">
                <svg class="admin-fixed-sidebar__nav-icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M12 18a2 2 0 1 0 2 2 2 2 0 0 0-2-2zm0-4a6 6 0 0 1 4.24 1.76l1.42-1.42a8 8 0 0 0-11.32 0l1.42 1.42A6 6 0 0 1 12 14zm0-4a10 10 0 0 1 7.07 2.93l1.41-1.41a12 12 0 0 0-16.96 0l1.41 1.41A10 10 0 0 1 12 10z"/>
                </svg>
                <span class="admin-fixed-sidebar__nav-text">شبكات الواي فاي</span>
            </a>

            <a class="admin-fixed-sidebar__nav-item {{ request()->routeIs('users.index') ? 'active' : '' }}" href="{{ route('users.index') }}">
                <svg class="admin-fixed-sidebar__nav-icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zM8 11c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45v2H24v-2c0-2.66-5.33-4-8-4z"/>
                </svg>
                <span class="admin-fixed-sidebar__nav-text">إدارة المستخدمين</span>
            </a>

            <a class="admin-fixed-sidebar__nav-item {{ request()->routeIs('admin.complaints.index') ? 'active' : '' }}" href="{{ route('admin.complaints.index') }}">
                <svg class="admin-fixed-sidebar__nav-icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M19 3H5a2 2 0 0 0-2 2v14l4-3h12a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2zm-2 9H7v-2h10zm0-3H7V7h10z"/>
                </svg>
                <span class="admin-fixed-sidebar__nav-text">الشكاوى</span>
            </a>

            <a class="admin-fixed-sidebar__nav-item {{ request()->routeIs('team') ? 'active' : '' }}" href="{{ route('team') }}">
                <svg class="admin-fixed-sidebar__nav-icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                </svg>
                <span class="admin-fixed-sidebar__nav-text">فريق العمل</span>
            </a>
        </nav>
    </div>

    <div class="admin-fixed-sidebar__bottom">
        <form method="POST" action="{{ route('logout') }}" class="admin-fixed-sidebar__logout-form">
            @csrf
            <button type="submit" class="admin-logout-btn">
                <svg class="admin-logout-btn__icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M16 13v-2H7V8l-5 4 5 4v-3h9zm3-10H9c-1.1 0-2 .9-2 2v4h2V5h10v14H9v-4H7v4c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"/>
                </svg>
                <span>تسجيل الخروج</span>
            </button>
        </form>

        <div class="admin-fixed-sidebar__footer">
            <div class="admin-fixed-sidebar__live">
                <span class="admin-fixed-sidebar__live-dot"></span>
                <span class="admin-fixed-sidebar__live-text">مباشر الآن</span>
            </div>
            <div class="admin-fixed-sidebar__footer-title">نظام إدارة الشبكات v1.0</div>
            <div class="admin-fixed-sidebar__footer-sub">مشروع التخرج 2026</div>
        </div>
    </div>
</aside>

<style>
@import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800;900&display=swap');

:root {
    --admin-sidebar-width: 270px;
    --admin-sidebar-bg-1: #04142d;
    --admin-sidebar-bg-2: #021028;
    --admin-sidebar-border: rgba(255, 255, 255, 0.06);
    --admin-sidebar-muted: #87a0c2;
    --admin-sidebar-link: #b6c6db;
    --admin-sidebar-link-hover: rgba(255, 255, 255, 0.05);
    --admin-sidebar-active-1: #4aa3ff;
    --admin-sidebar-active-2: #2d88ee;
    --admin-sidebar-active-shadow: rgba(35, 108, 190, 0.35);
    --admin-danger-1: rgba(255, 78, 78, 0.16);
    --admin-danger-2: rgba(255, 78, 78, 0.24);
    --admin-danger-text: #ff8a8a;
}

.admin-fixed-sidebar {
    position: fixed;
    top: 0;
    right: 0;
    width: 270px;
    height: 100vh;
    padding: 22px 12px 16px;
    box-sizing: border-box;
    background:
        radial-gradient(circle at top right, rgba(72, 143, 221, 0.10), transparent 30%),
        linear-gradient(180deg, var(--admin-sidebar-bg-1) 0%, var(--admin-sidebar-bg-2) 100%);
    border-left: 1px solid var(--admin-sidebar-border);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    overflow: hidden;
    z-index: 9999;
    direction: rtl;
    font-family: 'Cairo', sans-serif;
    box-shadow: -10px 0 30px rgba(0, 0, 0, 0.18);
}

.admin-fixed-sidebar *,
.admin-fixed-sidebar *::before,
.admin-fixed-sidebar *::after {
    box-sizing: border-box;
}

.admin-fixed-sidebar__top,
.admin-fixed-sidebar__bottom {
    width: 100%;
}

.admin-fixed-sidebar__brand {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 0 6px;
    margin-bottom: 22px;
}

.admin-fixed-sidebar__logo {
    width: 46px;
    height: 46px;
    object-fit: contain;
    flex-shrink: 0;
    filter: brightness(1.12) contrast(1.06) drop-shadow(0 3px 8px rgba(255, 255, 255, 0.08));
}

.admin-fixed-sidebar__brand-text {
    flex: 1;
    min-width: 0;
}

.admin-fixed-sidebar__brand-text h1 {
    margin: 0;
    color: #ffffff;
    font-size: 15px;
    line-height: 1.25;
    font-weight: 900;
    letter-spacing: 0.2px;
}

.admin-fixed-sidebar__brand-text p {
    margin: 2px 0 0;
    color: var(--admin-sidebar-muted);
    font-size: 11px;
    font-weight: 700;
}

.admin-fixed-sidebar__nav {
    display: flex;
    flex-direction: column;
    gap: 8px;
    width: 100%;
    max-height: calc(100vh - 210px);
    overflow-y: auto;
    padding-left: 3px;
}

.admin-fixed-sidebar__nav::-webkit-scrollbar {
    width: 6px;
}

.admin-fixed-sidebar__nav::-webkit-scrollbar-track {
    background: transparent;
}

.admin-fixed-sidebar__nav::-webkit-scrollbar-thumb {
    background: rgba(255, 255, 255, 0.10);
    border-radius: 50px;
}

.admin-fixed-sidebar__nav::-webkit-scrollbar-thumb:hover {
    background: rgba(255, 255, 255, 0.18);
}

.admin-fixed-sidebar__nav-item {
    position: relative;
    display: flex;
    align-items: center;
    gap: 11px;
    width: 100%;
    min-height: 50px;
    padding: 0 16px;
    border-radius: 16px;
    text-decoration: none;
    color: var(--admin-sidebar-link);
    font-size: 15px;
    font-weight: 800;
    transition: all 0.28s ease;
    border: 1px solid transparent;
    overflow: hidden;
}

.admin-fixed-sidebar__nav-item::before {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, rgba(255,255,255,0.03), rgba(255,255,255,0.00));
    opacity: 0;
    transition: opacity 0.28s ease;
}



.admin-fixed-sidebar__nav-item:hover::before {
    opacity: 1;
}

.admin-fixed-sidebar__nav-item.active {
    color: #ffffff;
    background: linear-gradient(270deg, var(--admin-sidebar-active-1) 0%, var(--admin-sidebar-active-2) 100%);
    box-shadow: 0 10px 24px var(--admin-sidebar-active-shadow);
    border-color: rgba(255, 255, 255, 0.08);
}

.admin-fixed-sidebar__nav-icon {
    width: 18px;
    height: 18px;
    flex-shrink: 0;
    opacity: 0.95;
}

.admin-fixed-sidebar__nav-text {
    line-height: 1;
    text-align: right;
    white-space: nowrap;
}

.admin-fixed-sidebar__logout-form {
    width: 100%;
    margin-top: 14px;
}

.admin-logout-btn {
    width: 100%;
    min-height: 46px;
    border: 1px solid rgba(255, 90, 90, 0.10);
    border-radius: 15px;
    background: linear-gradient(180deg, var(--admin-danger-1) 0%, rgba(61, 10, 25, 0.40) 100%);
    color: var(--admin-danger-text);
    font-family: 'Cairo', sans-serif;
    font-size: 14px;
    font-weight: 800;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    cursor: pointer;
    transition: all 0.28s ease;
    box-shadow: 0 8px 20px rgba(255, 56, 56, 0.08);
}

.admin-logout-btn:hover {
    background: linear-gradient(180deg, var(--admin-danger-2) 0%, rgba(75, 8, 25, 0.55) 100%);
    color: #ffffff;
    transform: translateY(-1px);
    box-shadow: 0 12px 26px rgba(255, 56, 56, 0.14);
}

.admin-logout-btn__icon {
    width: 17px;
    height: 17px;
    flex-shrink: 0;
}

.admin-fixed-sidebar__footer {
    width: 100%;
    margin-top: 14px;
    padding-top: 14px;
    border-top: 1px solid rgba(255, 255, 255, 0.06);
    text-align: center;
}

.admin-fixed-sidebar__live {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    margin-bottom: 8px;
}

.admin-fixed-sidebar__live-dot {
    width: 9px;
    height: 9px;
    border-radius: 50%;
    background: #1cff89;
    box-shadow: 0 0 14px rgba(28, 255, 137, 0.75);
    display: inline-block;
}

.admin-fixed-sidebar__live-text {
    color: #ffffff;
    font-size: 14px;
    font-weight: 900;
}

.admin-fixed-sidebar__footer-title {
    color: #ffffff;
    font-size: 13px;
    font-weight: 800;
    margin-bottom: 3px;
}

.admin-fixed-sidebar__footer-sub {
    color: #7f96b7;
    font-size: 11px;
    font-weight: 700;
}

@media (max-width: 991px) {
    :root {
        --admin-sidebar-width: 250px;
    }

    .admin-fixed-sidebar {
        padding: 18px 12px 14px;
    }

    .admin-fixed-sidebar__brand {
        margin-bottom: 18px;
    }

    .admin-fixed-sidebar__brand-text h1 {
        font-size: 14px;
    }

    .admin-fixed-sidebar__nav-item {
        min-height: 46px;
        font-size: 14px;
        padding: 0 14px;
    }
}

@media (max-width: 768px) {
    :root {
        --admin-sidebar-width: 220px;
    }

    .admin-fixed-sidebar {
        padding: 16px 10px 12px;
    }

    .admin-fixed-sidebar__brand {
        gap: 8px;
        margin-bottom: 14px;
    }

    .admin-fixed-sidebar__logo {
        width: 40px;
        height: 40px;
    }

    .admin-fixed-sidebar__brand-text h1 {
        font-size: 13px;
    }

    .admin-fixed-sidebar__brand-text p {
        font-size: 10px;
    }

    .admin-fixed-sidebar__nav {
        gap: 6px;
    }

    .admin-fixed-sidebar__nav-item {
        min-height: 42px;
        font-size: 13px;
        border-radius: 14px;
    }

    .admin-fixed-sidebar__nav-text {
        white-space: normal;
    }

    .admin-logout-btn {
        min-height: 42px;
        font-size: 13px;
    }

    .admin-fixed-sidebar__footer-title {
        font-size: 12px;
    }

    .admin-fixed-sidebar__footer-sub {
        font-size: 10px;
    }
}
</style>
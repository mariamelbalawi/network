<aside class="user-fixed-sidebar">
    <div class="user-fixed-sidebar__top">
        <div class="user-fixed-sidebar__brand">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="user-fixed-sidebar__logo">
            <div class="user-fixed-sidebar__brand-text">
                <h1>نظام إدارة<br>الشبكات</h1>
                <p>الجامعة التقنية</p>
            </div>
        </div>

        <nav class="user-fixed-sidebar__nav">
            <a class="user-fixed-sidebar__nav-item {{ request()->is('user-department') ? 'active' : '' }}" href="/user-department">
                <svg class="user-fixed-sidebar__nav-icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                </svg>
                <span class="user-fixed-sidebar__nav-text">صفحة القسم</span>
            </a>

            <a class="user-fixed-sidebar__nav-item {{ request()->is('user-networks') ? 'active' : '' }}" href="/user-networks">
                <svg class="user-fixed-sidebar__nav-icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M15 9H9v6h6V9zm-2 4h-2v-2h2v2zm8-2V9h-2V7c0-1.1-.9-2-2-2h-2V3h-2v2h-2V3H9v2H7c-1.1 0-2 .9-2 2v2H3v2h2v2H3v2h2v2c0 1.1.9 2 2 2h2v2h2v-2h2v2h2v-2h2c1.1 0 2-.9 2-2v-2h2v-2h-2v-2h2zm-4 6H7V7h10v10z"/>
                </svg>
                <span class="user-fixed-sidebar__nav-text">الشبكات والمنافذ</span>
            </a>

            <a class="user-fixed-sidebar__nav-item {{ request()->is('user-team') ? 'active' : '' }}" href="/user-team">
                <svg class="user-fixed-sidebar__nav-icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                </svg>
                <span class="user-fixed-sidebar__nav-text">فريق العمل</span>
            </a>
        </nav>
    </div>

    <div class="user-fixed-sidebar__bottom">
        <form method="POST" action="/logout" class="user-fixed-sidebar__logout-form">
            @csrf
            <button type="submit" class="logout-btn">
                <svg class="logout-btn__icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M16 13v-2H7V8l-5 4 5 4v-3h9zm3-10H9c-1.1 0-2 .9-2 2v4h2V5h10v14H9v-4H7v4c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"/>
                </svg>
                <span>تسجيل الخروج</span>
            </button>
        </form>

        <div class="user-fixed-sidebar__footer">
            <div class="user-fixed-sidebar__live">
                <span class="user-fixed-sidebar__live-dot"></span>
                <span class="user-fixed-sidebar__live-text">مباشر الآن</span>
            </div>
            <div class="user-fixed-sidebar__footer-title">نظام إدارة الشبكات v1.0</div>
            <div class="user-fixed-sidebar__footer-sub">مشروع التخرج 2026</div>
        </div>
    </div>

</aside>

<style>
@import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800;900&display=swap');

:root {
    --sidebar-width: 290px;
    --sidebar-bg-1: #04142d;
    --sidebar-bg-2: #021028;
    --sidebar-border: rgba(255, 255, 255, 0.06);
    --sidebar-muted: #87a0c2;
    --sidebar-link: #b6c6db;
    --sidebar-link-hover: rgba(255, 255, 255, 0.05);
    --sidebar-active-1: #3f9cff;
    --sidebar-active-2: #1f7fe3;
    --sidebar-active-shadow: rgba(35, 108, 190, 0.35);
    --danger-1: rgba(255, 78, 78, 0.16);
    --danger-2: rgba(255, 78, 78, 0.24);
    --danger-text: #ff8a8a;
}

.user-fixed-sidebar {
    position: fixed;
    top: 0;
    right: 0;
    width: var(--sidebar-width);
    height: 100vh;
    padding: 22px 14px 16px;
    background:
        radial-gradient(circle at top right, rgba(72, 143, 221, 0.10), transparent 30%),
        linear-gradient(180deg, var(--sidebar-bg-1) 0%, var(--sidebar-bg-2) 100%);
    border-left: 1px solid var(--sidebar-border);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    overflow: hidden;
    z-index: 9999;
    direction: rtl;
    font-family: 'Cairo', sans-serif;
    box-shadow: -10px 0 30px rgba(0, 0, 0, 0.18);
}

.user-fixed-sidebar *,
.user-fixed-sidebar *::before,
.user-fixed-sidebar *::after {
    box-sizing: border-box;
}

.user-fixed-sidebar__top,
.user-fixed-sidebar__bottom {
    width: 100%;
}

.user-fixed-sidebar__brand {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 0 6px;
    margin-bottom: 22px;
}

.user-fixed-sidebar__logo {
    width: 46px;
    height: 46px;
    object-fit: contain;
    flex-shrink: 0;
    filter: drop-shadow(0 3px 8px rgba(255, 255, 255, 0.08));
}

.user-fixed-sidebar__brand-text {
    flex: 1;
    min-width: 0;
}

.user-fixed-sidebar__brand-text h1 {
    margin: 0;
    color: #ffffff;
    font-size: 15px;
    line-height: 1.25;
    font-weight: 900;
    letter-spacing: 0.2px;
}

.user-fixed-sidebar__brand-text p {
    margin: 2px 0 0;
    color: var(--sidebar-muted);
    font-size: 11px;
    font-weight: 700;
}

.user-fixed-sidebar__nav {
    display: flex;
    flex-direction: column;
    gap: 8px;
    width: 100%;
}

.user-fixed-sidebar__nav-item {
    position: relative;
    display: flex;
    align-items: center;
    gap: 10px;
    width: 100%;
    min-height: 50px;
    padding: 0 16px;
    border-radius: 16px;
    text-decoration: none;
    color: var(--sidebar-link);
    font-size: 15px;
    font-weight: 800;
    transition: all 0.28s ease;
    border: 1px solid transparent;
    overflow: hidden;
}

.user-fixed-sidebar__nav-item::before {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, rgba(255,255,255,0.03), rgba(255,255,255,0.00));
    opacity: 0;
    transition: opacity 0.28s ease;
}

.user-fixed-sidebar__nav-item:hover {
    color: #ffffff;
    background: var(--sidebar-link-hover);
    border-color: rgba(255, 255, 255, 0.05);
    transform: translateX(-2px);
}

.user-fixed-sidebar__nav-item:hover::before {
    opacity: 1;
}

.user-fixed-sidebar__nav-item.active {
    color: #ffffff;
    background: linear-gradient(270deg, var(--sidebar-active-1) 0%, var(--sidebar-active-2) 100%);
    box-shadow: 0 10px 24px var(--sidebar-active-shadow);
    border-color: rgba(255, 255, 255, 0.08);
}

.user-fixed-sidebar__nav-icon {
    width: 18px;
    height: 18px;
    flex-shrink: 0;
    opacity: 0.95;
}

.user-fixed-sidebar__nav-text {
    line-height: 1;
    text-align: right;
    white-space: nowrap;
}

.user-fixed-sidebar__logout-form {
    width: 100%;
    margin-top: 14px;
}

.logout-btn {
    width: 100%;
    min-height: 46px;
    border: 1px solid rgba(255, 90, 90, 0.10);
    border-radius: 15px;
    background: linear-gradient(180deg, var(--danger-1) 0%, rgba(61, 10, 25, 0.40) 100%);
    color: var(--danger-text);
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

.logout-btn:hover {
    background: linear-gradient(180deg, var(--danger-2) 0%, rgba(75, 8, 25, 0.55) 100%);
    color: #ffffff;
    transform: translateY(-1px);
    box-shadow: 0 12px 26px rgba(255, 56, 56, 0.14);
}

.logout-btn__icon {
    width: 17px;
    height: 17px;
    flex-shrink: 0;
}

.user-fixed-sidebar__footer {
    width: 100%;
    margin-top: 14px;
    padding-top: 14px;
    border-top: 1px solid rgba(255, 255, 255, 0.06);
    text-align: center;
}

.user-fixed-sidebar__live {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    margin-bottom: 8px;
}

.user-fixed-sidebar__live-dot {
    width: 9px;
    height: 9px;
    border-radius: 50%;
    background: #1cff89;
    box-shadow: 0 0 14px rgba(28, 255, 137, 0.75);
    display: inline-block;
}

.user-fixed-sidebar__live-text {
    color: #ffffff;
    font-size: 14px;
    font-weight: 900;
}

.user-fixed-sidebar__footer-title {
    color: #ffffff;
    font-size: 13px;
    font-weight: 800;
    margin-bottom: 3px;
}

.user-fixed-sidebar__footer-sub {
    color: #7f96b7;
    font-size: 11px;
    font-weight: 700;
}

@media (max-width: 991px) {
    :root {
        --sidebar-width: 250px;
    }

    .user-fixed-sidebar {
        padding: 18px 12px 14px;
    }

    .user-fixed-sidebar__brand {
        margin-bottom: 18px;
    }

    .user-fixed-sidebar__brand-text h1 {
        font-size: 14px;
    }

    .user-fixed-sidebar__nav-item {
        min-height: 46px;
        font-size: 14px;
        padding: 0 14px;
    }
}

@media (max-width: 768px) {
    :root {
        --sidebar-width: 220px;
    }

    .user-fixed-sidebar {
        padding: 16px 10px 12px;
    }

    .user-fixed-sidebar__brand {
        gap: 8px;
        margin-bottom: 14px;
    }

    .user-fixed-sidebar__logo {
        width: 40px;
        height: 40px;
    }

    .user-fixed-sidebar__brand-text h1 {
        font-size: 13px;
    }

    .user-fixed-sidebar__brand-text p {
        font-size: 10px;
    }

    .user-fixed-sidebar__nav {
        gap: 6px;
    }

    .user-fixed-sidebar__nav-item {
        min-height: 42px;
        font-size: 13px;
        border-radius: 14px;
    }

    .user-fixed-sidebar__nav-text {
        white-space: normal;
    }

    .logout-btn {
        min-height: 42px;
        font-size: 13px;
    }

    .user-fixed-sidebar__footer-title {
        font-size: 12px;
    }

    .user-fixed-sidebar__footer-sub {
        font-size: 10px;
    }
}
</style>



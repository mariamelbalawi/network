<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول — نظام إدارة الشبكات</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="app">

    <aside class="sidebar">
        <div class="logo">
            <div class="logo-icon"><img src="{{ asset('images/logo.png') }}" alt="Logo" style="width:45px;height:45px;object-fit:contain;"></div>
            <h1>نظام إدارة الشبكات</h1>
            <p>الجامعة التقنية</p>
        </div>

        <nav class="nav">
            <div class="nav-item active">
                تسجيل الدخول
            </div>
        </nav>

        <div class="sidebar-footer">
            <div class="live-indicator"><div class="live-dot"></div>جاهز للعمل</div>
            <div style="margin-top:8px;">نظام إدارة الشبكات v1.0</div>
            <div style="color:rgba(120,144,156,0.6)">مشروع التخرج 2026</div>
        </div>
   
</aside>

    <main class="main" style="display:flex;align-items:center;justify-content:center;">
        <div class="card" style="width:100%;max-width:480px;">
            <div class="card-header">
                <div class="card-title">تسجيل الدخول</div>
            </div>

            <div style="padding:24px;">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div style="margin-bottom:16px;">
                        <label style="display:block;margin-bottom:8px;">البريد الإلكتروني</label>
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            style="width:100%;padding:12px;border-radius:12px;border:1px solid rgba(33,150,243,0.2);background:rgba(255,255,255,0.04);color:white;"
                        >
                        @error('email')
                            <div style="color:#ff6b6b;margin-top:6px;font-size:13px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div style="margin-bottom:16px;">
                        <label style="display:block;margin-bottom:8px;">كلمة المرور</label>
                        <input
                            type="password"
                            name="password"
                            required
                            style="width:100%;padding:12px;border-radius:12px;border:1px solid rgba(33,150,243,0.2);background:rgba(255,255,255,0.04);color:white;"
                        >
                        @error('password')
                            <div style="color:#ff6b6b;margin-top:6px;font-size:13px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;">
                        <label style="display:flex;align-items:center;gap:8px;">
                            <input type="checkbox" name="remember">
                            <span>تذكرني</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" style="color:#4fc3f7;text-decoration:none;">
                                نسيت كلمة المرور؟
                            </a>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary" style="width:100%;">
                        دخول
                    </button>
                </form>
            </div>
        </div>
    </main>

</div>
</body>
</html>



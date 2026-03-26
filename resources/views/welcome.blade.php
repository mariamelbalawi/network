<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مرحبًا — نظام إدارة الشبكات</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}"></head>
<body>
<div class="app">

    @include('sidebar')
    <main class="main">
        <div class="page-header">
            <div>
                <div class="page-title">مرحبًا بك</div>
                <div class="page-subtitle">نظام ذكي لإدارة ومراقبة الشبكات داخل الجامعة</div>
            </div>
        </div>

        <div class="stats-grid" style="margin-bottom:24px;">
            <div class="stat-card" style="padding:18px;">
                <div class="stat-label">عدد الشبكات</div>
                <div class="stat-value glow-cyan" style="font-size:28px;">12</div>
            </div>
            <div class="stat-card" style="padding:18px;">
                <div class="stat-label">الأجهزة النشطة</div>
                <div class="stat-value glow-green" style="font-size:28px;">347</div>
            </div>
            <div class="stat-card" style="padding:18px;">
                <div class="stat-label">المستخدمون</div>
                <div class="stat-value" style="font-size:28px;">48</div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="card-title">نبذة عن النظام</div>
            </div>
            <p style="line-height:1.9;color:var(--text-muted);margin:0;">
                هذا النظام يتيح متابعة الشبكات، الأجهزة، المنافذ، المستخدمين، وشبكات الواي فاي
                من خلال واجهة موحدة وسهلة الاستخدام.
            </p>
        </div>
    </main>

</div>
</body>
</html>



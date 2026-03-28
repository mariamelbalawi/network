<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة الشكاوى — نظام إدارة الشبكات</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
    .complaints-page .users-table-wrap{
        overflow-x: auto;
        width: 100%;
    }

    .complaints-page table{
        width: 100%;
        table-layout: fixed;
    }

    .complaints-page th,
    .complaints-page td{
        vertical-align: middle;
        text-align: center;
        word-break: break-word;
        padding: 14px 10px;
    }

    .complaints-page .col-title{ width: 16%; }
    .complaints-page .col-user{ width: 16%; }
    .complaints-page .col-type{ width: 10%; }
    .complaints-page .col-desc{ width: 16%; }
    .complaints-page .col-status{ width: 12%; }
    .complaints-page .col-file{ width: 10%; }
    .complaints-page .col-date{ width: 12%; }
    .complaints-page .col-actions{ width: 18%; }

    .complaints-page .user-box{
        display: flex;
        flex-direction: column;
        gap: 4px;
        align-items: center;
    }

    .complaints-page .user-box .name{
        font-weight: 700;
        color: #fff;
    }

    .complaints-page .user-box .email{
        font-size: 12px;
        color: var(--text-muted);
        line-height: 1.6;
        word-break: break-word;
    }

    .complaints-page .desc-text{
        color: var(--text-muted);
        line-height: 1.8;
        max-height: 52px;
        overflow: hidden;
    }

    .complaints-page .actions-box{
        display: flex;
        gap: 8px;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
    }

    .complaints-page .update-box{
        display: none;
        margin-top: 10px;
        padding: 12px;
        border-radius: 14px;
        background: rgba(15, 23, 42, 0.9);
        border: 1px solid rgba(148,163,184,0.16);
    }

    .complaints-page .update-box.open{
        display: block;
    }

    .complaints-page .update-form{
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .complaints-page .update-form select,
    .complaints-page .update-form textarea{
        width: 100%;
        background: #0f1b31;
        color: #fff;
        border: 1px solid rgba(148,163,184,0.18);
        border-radius: 10px;
        padding: 10px 12px;
        font-size: 13px;
        outline: none;
    }

    .complaints-page .update-form textarea{
        resize: none;
        min-height: 70px;
    }

    .complaints-page .update-save-btn{
        align-self: stretch;
        justify-content: center;
        padding: 10px 14px;
    }

    .complaints-page .update-actions{
        display: flex;
        gap: 8px;
        justify-content: center;
        flex-wrap: wrap;
    }
</style>
</head>
<body>
<div class="app">

    @include('sidebar')

    <main class="main complaints-page">
        <div class="page-header">
            <div>
                <div class="page-title">إدارة الشكاوى</div>
                <div class="page-subtitle">متابعة شكاوى المستخدمين وتحديث حالتها بواسطة الأدمن</div>
            </div>

            <div class="header-actions">
                <span class="badge" style="background: rgba(33,150,243,0.12); color: var(--blue-light); border:1px solid rgba(33,150,243,0.25);">
                    إجمالي الشكاوى: {{ $complaints->count() }}
                </span>
            </div>
        </div>

        @if(session('success'))
            <div class="card" style="margin-bottom:20px; border:1px solid rgba(0,230,118,0.25);">
                <div style="color:var(--green); font-weight:700;">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @if ($errors->any())
            <div class="card" style="margin-bottom:20px; border:1px solid rgba(255,82,82,0.25);">
                <div style="color:var(--red); font-weight:700; margin-bottom:10px;">
                    يوجد خطأ في البيانات المدخلة
                </div>
                <ul style="margin:0; padding-right:18px; color:#ffb3b3; line-height:1.9;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="stats-grid" style="margin-bottom:24px;">
            <div class="stat-card" style="--accent-color:var(--blue-accent);padding:18px;">
                <div class="stat-label">إجمالي الشكاوى</div>
                <div class="stat-value" style="font-size:28px; color:var(--blue-light);">
                    {{ $complaints->count() }}
                </div>
            </div>

            <div class="stat-card" style="--accent-color:var(--orange);padding:18px;">
                <div class="stat-label">جديدة</div>
                <div class="stat-value glow-orange" style="font-size:28px;">
                    {{ $complaints->where('status', 'new')->count() }}
                </div>
            </div>

            <div class="stat-card" style="--accent-color:#3b82f6;padding:18px;">
                <div class="stat-label">قيد التنفيذ</div>
                <div class="stat-value" style="font-size:28px; color:#60a5fa;">
                    {{ $complaints->where('status', 'in_progress')->count() }}
                </div>
            </div>

            <div class="stat-card" style="--accent-color:var(--green);padding:18px;">
                <div class="stat-label">تم الحل</div>
                <div class="stat-value glow-green" style="font-size:28px;">
                    {{ $complaints->where('status', 'done')->count() }}
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" style="display:flex; justify-content:space-between; align-items:center; gap:12px; flex-wrap:wrap;">
                <div class="card-title">قائمة الشكاوى</div>

                <div style="display:flex; gap:8px; flex-wrap:wrap;">
     <a href="{{ route('admin.complaints.index') }}" class="badge badge-orange">الكل</a>

    <a href="{{ route('admin.complaints.index', ['status' => 'new']) }}"
       class="badge badge-orange">
        جديدة
    </a>

    <a href="{{ route('admin.complaints.index', ['status' => 'in_progress']) }}"
       class="badge"
       style="background:rgba(59,130,246,0.15); color:#60a5fa;">
        قيد التنفيذ
    </a>

    <a href="{{ route('admin.complaints.index', ['status' => 'done']) }}"
       class="badge badge-green">
        تم الحل
    </a>
</div>
            </div>

            <div class="users-table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th class="col-title">عنوان الشكوى</th>
                            <th class="col-user">مقدم الشكوى</th>
                            <th class="col-type">النوع</th>
                            <th class="col-desc">الوصف</th>
                            <th class="col-status">الحالة الحالية</th>
                            <th class="col-file">المرفق</th>
                            <th class="col-date">تاريخ الإرسال</th>
                            <th class="col-actions">الإجراء</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($complaints as $complaint)
                            <tr>
                                <td style="font-weight:700; color:#fff; min-width:160px;">
                                    {{ $complaint->title }}
                                </td>

                                <td style="min-width:170px; color:#cbd5e1;">
                                    <div class="user-box">
                                        <div class="name">
                                            {{ $complaint->user->name ?? 'غير معروف' }}
                                        </div>

                                        @if(!empty($complaint->user->email))
                                            <div class="email">
                                                {{ $complaint->user->email }}
                                            </div>
                                        @endif
                                    </div>
                                </td>

                                <td style="color:var(--text-muted); min-width:120px;">
                                    {{ $complaint->type ?? '—' }}
                                </td>

                                <td style="max-width:260px;">
                                    <div class="desc-text">
                                        {{ \Illuminate\Support\Str::limit($complaint->description, 90) }}
                                    </div>
                                </td>

                                <td style="min-width:120px;">
                                    @if($complaint->status === 'done')
                                        <span class="badge badge-green" style="font-size:11px;">
                                            تم الحل
                                        </span>
                                    @elseif($complaint->status === 'in_progress')
                                        <span class="badge" style="font-size:11px; background:rgba(59,130,246,0.15); color:#60a5fa; border:1px solid rgba(96,165,250,0.25);">
                                            قيد التنفيذ
                                        </span>
                                    @else
                                        <span class="badge badge-orange" style="font-size:11px;">
                                            جديدة
                                        </span>
                                    @endif
                                </td>

                                <td style="min-width:120px;">
                                    @if($complaint->attachment)
                                        <a href="{{ asset('storage/' . $complaint->attachment) }}" target="_blank" class="btn-sm accept" style="text-decoration:none;">
                                            عرض الملف
                                        </a>
                                    @else
                                        <span style="color:var(--text-muted)">لا يوجد</span>
                                    @endif
                                </td>

                                <td style="color:var(--text-muted); font-size:13px; min-width:110px;">
                                    {{ $complaint->created_at ? $complaint->created_at->format('Y-m-d') : '-' }}
                                </td>

                                <td style="min-width:220px;">
                                    <div class="update-actions">
                                        <button type="button"
                                                class="btn-sm accept btn-toggle"
                                                onclick="toggleUpdate({{ $complaint->id }})">
                                            تحديث
                                        </button>

                                        <form action="{{ route('admin.complaints.destroy', $complaint->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('هل أنتي متأكدة من حذف الشكوى؟');"
                                              style="margin:0;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-sm reject" style="border:none; cursor:pointer;">
                                                حذف
                                            </button>
                                        </form>
                                    </div>

                                    <div id="updateBox-{{ $complaint->id }}" class="update-box">
                                        <form action="{{ route('admin.complaints.updateStatus', $complaint->id) }}" method="POST" class="update-form">
                                            @csrf
                                            @method('PUT')

                                            <select name="status">
                                                <option value="new" {{ $complaint->status == 'new' ? 'selected' : '' }}>جديدة</option>
                                                <option value="in_progress" {{ $complaint->status == 'in_progress' ? 'selected' : '' }}>قيد التنفيذ</option>
                                                <option value="done" {{ $complaint->status == 'done' ? 'selected' : '' }}>تم الحل</option>
                                            </select>

                                            <textarea name="admin_note" rows="3" placeholder="اكتبي ملاحظة أو رد للمستخدم...">{{ old('admin_note', $complaint->admin_note) }}</textarea>

                                            <button type="submit" class="btn btn-primary update-save-btn">
                                                حفظ
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" style="text-align:center; padding:30px; color:#8faecc;">
                                    لا توجد شكاوى حالياً
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>

<script src="{{ asset('lang.js') }}"></script>

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

<script>
    function openDrawer() {
        const drawer = document.getElementById('mobileDrawer');
        const overlay = document.getElementById('mobileOverlay');

        if (drawer) drawer.classList.add('open');
        if (overlay) overlay.classList.add('open');
    }

    function closeDrawer() {
        const drawer = document.getElementById('mobileDrawer');
        const overlay = document.getElementById('mobileOverlay');

        if (drawer) drawer.classList.remove('open');
        if (overlay) overlay.classList.remove('open');
    }
</script>

<script>
function toggleUpdate(id) {
    const box = document.getElementById('updateBox-' + id);
    if (box) {
        box.classList.toggle('open');
    }
}
.complaints-page .badge{
    text-decoration: none !important;
    display: inline-block;
}
</script>
</body>
</html>
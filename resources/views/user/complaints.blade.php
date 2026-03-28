<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الشكاوى</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root{
            --bg-1:#071629;
            --bg-2:#0a2340;
            --bg-3:#061425;
            --panel:#0c294b;
            --border:rgba(50,166,255,.18);
            --cyan:#20d7ff;
            --cyan-2:#43a6ff;
            --text:#eaf6ff;
            --muted:rgba(224,242,255,.58);
            --sidebar-w:290px;
            --danger:#ff6b81;
            --danger-dark:#ff4d67;
            --success:#18ef92;
            --warning:#ffc857;
            --card-shadow:0 10px 22px rgba(0,0,0,.14);
        }

        *{
            box-sizing:border-box;
        }

        body{
            margin:0;
            min-height:100vh;
            color:var(--text);
            background:
                radial-gradient(circle at top right, rgba(0,212,255,.08), transparent 20%),
                radial-gradient(circle at bottom left, rgba(0,119,255,.07), transparent 18%),
                linear-gradient(135deg, var(--bg-1) 0%, var(--bg-2) 45%, var(--bg-3) 100%);
            font-family:inherit;
            overflow-x:hidden;
        }

        .dots-bg{
            position:fixed;
            inset:0;
            background-image:radial-gradient(rgba(55,173,255,.16) 1px, transparent 1px);
            background-size:40px 40px;
            opacity:.28;
            pointer-events:none;
            z-index:0;
        }

        .page-wrap{
            position:relative;
            min-height:100vh;
            z-index:1;
        }

        .main{
            margin-right:var(--sidebar-w);
            width:calc(100% - var(--sidebar-w));
            min-height:100vh;
            padding:18px 18px 22px;
        }

        .main-inner{
            width:100%;
            max-width:100%;
        }

        .page-header{
            display:flex;
            align-items:center;
            justify-content:space-between;
            gap:16px;
            margin-bottom:14px;
        }

        .page-title-wrap{
            text-align:right;
        }

        .page-title{
            margin:0;
            font-size:30px;
            line-height:1.15;
            font-weight:900;
            color:#eef8ff;
        }

        .page-subtitle{
            margin:6px 0 0;
            color:rgba(225,243,255,.50);
            font-size:14px;
        }

        .header-actions{
            display:flex;
            align-items:center;
            gap:10px;
            flex-wrap:wrap;
        }

        .header-badge{
            color:#17f28d;
            font-size:14px;
            font-weight:800;
            display:inline-flex;
            align-items:center;
            gap:8px;
            padding:8px 12px;
            border-radius:999px;
            background:rgba(24,239,146,.08);
            border:1px solid rgba(24,239,146,.18);
        }

        .header-badge-dot{
            width:8px;
            height:8px;
            border-radius:50%;
            background:#18ef92;
            box-shadow:0 0 10px rgba(24,239,146,.85);
        }

        .hero-card,
        .form-card,
        .table-card{
            background:linear-gradient(180deg, rgba(12,41,75,.95), rgba(9,31,58,.95));
            border:1px solid var(--border);
            border-radius:18px;
            box-shadow:var(--card-shadow);
            padding:20px;
            margin-bottom:14px;
            position:relative;
            overflow:hidden;
        }

        .hero-card::before,
        .form-card::before,
        .table-card::before{
            content:"";
            position:absolute;
            inset:0;
            background-image:radial-gradient(rgba(55,173,255,.08) 1px, transparent 1px);
            background-size:38px 38px;
            opacity:.24;
            pointer-events:none;
        }

        .hero-content,
        .form-content,
        .table-content{
            position:relative;
            z-index:1;
        }

        .hero-text{
            display:flex;
            align-items:center;
            justify-content:space-between;
            gap:18px;
            flex-wrap:wrap;
        }

        .hero-text h2{
            margin:0 0 8px;
            font-size:22px;
            font-weight:900;
            color:#eef8ff;
        }

        .hero-text p{
            margin:0;
            color:var(--muted);
            font-size:14px;
            line-height:1.9;
            max-width:760px;
        }

        .hero-icon{
            width:62px;
            height:62px;
            border-radius:18px;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:28px;
            background:rgba(0,202,255,.14);
            color:var(--cyan);
            border:1px solid rgba(50,166,255,.24);
            flex-shrink:0;
        }

        .section-title{
            margin:0 0 16px;
            font-size:20px;
            font-weight:900;
            color:#eef8ff;
        }

        .form-grid{
            display:grid;
            grid-template-columns:repeat(2, minmax(0, 1fr));
            gap:16px;
        }

        .form-group{
            display:flex;
            flex-direction:column;
            gap:9px;
        }

        .form-group.full{
            grid-column:1 / -1;
        }

        .form-label{
            font-size:14px;
            font-weight:800;
            color:#dff4ff;
        }

        .form-control,
        .form-select,
        .form-textarea,
        .form-file{
            width:100%;
            border:1px solid rgba(57,169,255,.20);
            background:rgba(6,23,43,.72);
            color:#eef8ff;
            border-radius:12px;
            padding:13px 14px;
            font-size:14px;
            outline:none;
            transition:.2s ease;
        }

        .form-control::placeholder,
        .form-textarea::placeholder{
            color:rgba(224,242,255,.38);
        }

        .form-control:focus,
        .form-select:focus,
        .form-textarea:focus,
        .form-file:focus{
            border-color:rgba(32,215,255,.65);
            box-shadow:0 0 0 3px rgba(32,215,255,.10);
        }

        .form-textarea{
            min-height:135px;
            resize:vertical;
        }

        .form-hint{
            font-size:12px;
            color:var(--muted);
        }

        .form-actions{
            display:flex;
            justify-content:flex-start;
            gap:10px;
            flex-wrap:wrap;
            margin-top:8px;
        }

        .btn{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            gap:7px;
            text-decoration:none;
            border:none;
            cursor:pointer;
            border-radius:12px;
            padding:11px 18px;
            font-size:14px;
            font-weight:900;
            transition:.2s ease;
            white-space:nowrap;
        }

        .btn-primary{
            color:#041321;
            background:linear-gradient(135deg, var(--cyan) 0%, #7ae7ff 100%);
        }

        .btn-secondary{
            color:#eaf6ff;
            background:rgba(8,34,68,.68);
            border:1px solid rgba(57,169,255,.22);
        }

        .btn-danger{
            color:#fff;
            background:linear-gradient(135deg, var(--danger) 0%, var(--danger-dark) 100%);
        }

        .btn-sm{
            padding:8px 12px;
            font-size:12px;
            border-radius:10px;
        }

        .btn:hover{
            transform:translateY(-1px);
        }

        .alert-success,
        .alert-error{
            padding:13px 15px;
            border-radius:14px;
            margin-bottom:14px;
            font-size:14px;
            font-weight:700;
        }

        .alert-success{
            background:rgba(24,239,146,.12);
            color:#d9ffed;
            border:1px solid rgba(24,239,146,.28);
        }

        .alert-error{
            background:rgba(255,107,129,.12);
            color:#ffe6eb;
            border:1px solid rgba(255,107,129,.28);
        }

        .error-text{
            color:#ff9cab;
            font-size:12px;
            font-weight:700;
        }

        .table-head{
            display:flex;
            align-items:center;
            justify-content:space-between;
            gap:12px;
            flex-wrap:wrap;
            margin-bottom:14px;
        }

        .table-head-note{
            color:var(--muted);
            font-size:13px;
            font-weight:700;
        }
.table-wrap{
    overflow:hidden; 
    border-radius:18px; 
}

       .complaints-table{
    width:100%;
    border-collapse:separate;
    border-spacing:0;
}
/* أعلى الجدول */
.complaints-table thead tr th:first-child{
    border-top-right-radius:20px;
}

.complaints-table thead tr th:last-child{
    border-top-left-radius:20px;
}

/* أسفل الجدول */
.complaints-table tbody tr:last-child td:first-child{
    border-bottom-right-radius:20px;
}

.complaints-table tbody tr:last-child td:last-child{
    border-bottom-left-radius:20px;
}
        .complaints-table th,
        .complaints-table td{
            padding:12px 10px;
            text-align:right;
            border-bottom:1px solid rgba(57,169,255,.12);
            vertical-align:middle;
        }

        .complaints-table th{
            color:#d7f1ff;
            font-size:13px;
            font-weight:900;
            background:rgba(255,255,255,.02);
        }

        .complaints-table td{
            color:#e7f6ff;
            font-size:14px;
        }

        .title-cell{
            font-weight:900;
            color:#f3fbff;
            min-width:170px;
        }

        .type-text{
            color:#b7dcf4;
            font-size:13px;
            font-weight:700;
            min-width:120px;
        }

        .date-text{
            font-size:13px;
            color:#d8ebff;
            white-space:nowrap;
        }

        .update-box{
            display:flex;
            flex-direction:column;
            gap:6px;
            min-width:150px;
        }

        .update-main{
            font-size:13px;
            font-weight:800;
            color:#ecf8ff;
        }

        .update-sub{
            font-size:12px;
            color:rgba(224,242,255,.56);
        }

        .badge{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            gap:6px;
            padding:7px 11px;
            border-radius:999px;
            font-size:12px;
            font-weight:800;
            line-height:1;
        }

        .badge-new{
            background:rgba(32,215,255,.14);
            color:#7cecff;
            border:1px solid rgba(32,215,255,.22);
        }

        .badge-progress{
            background:rgba(255,200,87,.14);
            color:#ffe082;
            border:1px solid rgba(255,200,87,.22);
        }

        .badge-done{
            background:rgba(24,239,146,.14);
            color:#aaffcf;
            border:1px solid rgba(24,239,146,.22);
        }

        .status-wrap{
            min-width:150px;
        }

        .status-note{
            display:block;
            margin-top:6px;
            color:rgba(224,242,255,.46);
            font-size:11px;
            font-weight:700;
        }

        .actions-cell{
    display:flex;
    justify-content:center; /* مهم */
    align-items:center;
}
td:last-child,
th:last-child{
    text-align:center;
}
        .table-empty{
            text-align:center;
            color:var(--muted);
            padding:22px 0;
            font-size:14px;
        }

        @media (max-width: 992px){
            .main{
                margin-right:0;
                width:100%;
            }

            .page-header{
                flex-direction:column;
                align-items:stretch;
            }

            .form-grid{
                grid-template-columns:1fr;
            }
        }

        @media (max-width: 768px){
            .main{
                padding:14px;
            }

            .hero-card,
            .form-card,
            .table-card{
                padding:16px;
                border-radius:16px;
            }

            .page-title{
                font-size:26px;
            }

            .hero-text{
                flex-direction:column;
                align-items:flex-start;
            }

            .hero-text h2{
                font-size:20px;
            }
        }
    </style>
</head>
<body>
    <div class="dots-bg"></div>

    <div class="page-wrap">
        @include('user.user-sidebar')

        <main class="main">
            <div class="main-inner">

                <div class="page-header">
                    <div class="page-title-wrap">
                        <h1 class="page-title">الشكاوى</h1>
                        <p class="page-subtitle">إرسال ومتابعة الشكاوى الخاصة بالقسم وآخر تحديث من الإدارة</p>
                    </div>

                    <div class="header-actions">
                        
                        </span>
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert-error">
                        {{ session('error') }}
                    </div>
                @endif

                <section class="hero-card">
                    <div class="hero-content">
                        <div class="hero-text">
                            <div>
                                <h2>تقديم شكوى جديدة</h2>
                                <p>
                                    يمكنك من هنا إرسال شكوى أو ملاحظة تخص الأعطال أو الخدمات أو أي مشكلة داخل القسم،
                                    وبعد مراجعة الإدارة ستظهر لك حالة الشكوى وآخر تحديث تم عليها داخل السجل بالأسفل.
                                </p>
                            </div>
                            <div class="hero-icon">📩</div>
                        </div>
                    </div>
                </section>

                <section class="form-card">
                    <div class="form-content">
                        <h2 class="section-title">إرسال الشكوى</h2>

                        <form action="{{ route('user.complaints.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-grid">
                                <div class="form-group">
                                    <label class="form-label" for="title">عنوان الشكوى</label>
                                    <input
                                        type="text"
                                        id="title"
                                        name="title"
                                        class="form-control"
                                        value="{{ old('title') }}"
                                        placeholder="اكتب عنوان مختصر للشكوى">
                                    @error('title')
                                        <span class="error-text">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="type">نوع الشكوى</label>
                                    <select id="type" name="type" class="form-select">
                                        <option value="">اختر النوع</option>
                                        <option value="network" {{ old('type') == 'network' ? 'selected' : '' }}>مشكلة شبكة</option>
                                        <option value="device" {{ old('type') == 'device' ? 'selected' : '' }}>مشكلة جهاز</option>
                                        <option value="service" {{ old('type') == 'service' ? 'selected' : '' }}>مشكلة خدمة</option>
                                        <option value="other" {{ old('type') == 'other' ? 'selected' : '' }}>أخرى</option>
                                    </select>
                                    @error('type')
                                        <span class="error-text">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group full">
                                    <label class="form-label" for="description">تفاصيل الشكوى</label>
                                    <textarea
                                        id="description"
                                        name="description"
                                        class="form-textarea"
                                        placeholder="اكتب تفاصيل الشكوى بشكل واضح...">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="error-text">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group full">
                                    <label class="form-label" for="attachment">إرفاق ملف أو صورة</label>
                                    <input type="file" id="attachment" name="attachment" class="form-file">
                                    <span class="form-hint">اختياري - يمكنك رفع صورة أو PDF لتوضيح المشكلة</span>
                                    @error('attachment')
                                        <span class="error-text">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">إرسال الشكوى</button>
                                <button type="reset" class="btn btn-secondary">مسح البيانات</button>
                            </div>
                        </form>
                    </div>
                </section>

                <section class="table-card">
                    <div class="table-content">
                        <div class="table-head">
                            <h2 class="section-title" style="margin-bottom:0;">سجل الشكاوى</h2>
                            <span class="table-head-note">ستظهر هنا آخر حالة قامت الإدارة بتحديثها على الشكوى</span>
                        </div>

                        @if(isset($complaints) && $complaints->count())
                            <div class="table-wrap">
                                <table class="complaints-table">
                                    <thead>
                                        <tr>
                                            <th>العنوان</th>
                                            <th>النوع</th>
                                            <th>الحالة</th>
                                            <th>آخر تحديث من الإدارة</th>
                                            <th>تاريخ الإرسال</th>
                                            
                                            <th>الإجراءات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($complaints as $complaint)
                                            <tr>
                                                <td class="title-cell">{{ $complaint->title }}</td>

                                                <td class="type-text">
                                                    @switch($complaint->type)
                                                        @case('network')
                                                            مشكلة شبكة
                                                            @break
                                                        @case('device')
                                                            مشكلة جهاز
                                                            @break
                                                        @case('service')
                                                            مشكلة خدمة
                                                            @break
                                                        @case('other')
                                                            أخرى
                                                            @break
                                                        @default
                                                            -
                                                    @endswitch
                                                </td>

                                                <td class="status-wrap">
                                                    @if(($complaint->status ?? 'new') == 'new')
                                                        <span class="badge badge-new">🆕 جديدة</span>
                                                        <span class="status-note">بانتظار مراجعة الإدارة</span>
                                                    @elseif(($complaint->status ?? '') == 'in_progress')
                                                        <span class="badge badge-progress">⏳ قيد المراجعة</span>
                                                        <span class="status-note">الإدارة تعمل على الشكوى حالياً</span>
                                                    @elseif(($complaint->status ?? '') == 'done')
                                                        <span class="badge badge-done">✅ تم الحل</span>
                                                        <span class="status-note">تمت معالجة الشكوى بنجاح</span>
                                                    @else
                                                        <span class="badge badge-new">{{ $complaint->status }}</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    <div class="update-box">
                                                        @if(($complaint->status ?? 'new') == 'new')
                                                            <span class="update-main">لم يتم البدء بعد</span>
                                                            <span class="update-sub">
                                                                {{ $complaint->updated_at ? $complaint->updated_at->format('Y-m-d h:i A') : '-' }}
                                                            </span>
                                                        @elseif(($complaint->status ?? '') == 'in_progress')
                                                            <span class="update-main">تم تحويلها للمراجعة</span>
                                                            <span class="update-sub">
                                                                {{ $complaint->updated_at ? $complaint->updated_at->format('Y-m-d h:i A') : '-' }}
                                                            </span>
                                                        @elseif(($complaint->status ?? '') == 'done')
                                                            <span class="update-main">تم الانتهاء من الحل</span>
                                                            <span class="update-sub">
                                                                {{ $complaint->updated_at ? $complaint->updated_at->format('Y-m-d h:i A') : '-' }}
                                                            </span>
                                                        @else
                                                            <span class="update-main">تم تحديث الحالة</span>
                                                            <span class="update-sub">
                                                                {{ $complaint->updated_at ? $complaint->updated_at->format('Y-m-d h:i A') : '-' }}
                                                            </span>
                                                        @endif
                                                    </div>
                                                </td>

                                                <td class="date-text">
                                                    {{ $complaint->created_at ? $complaint->created_at->format('Y-m-d') : '-' }}
                                                </td>

                                                

                                                <td>
                                                    <div class="actions-cell">
                                                        <form action="{{ route('user.complaints.destroy', $complaint->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذه الشكوى؟');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="table-empty">لا توجد شكاوى مضافة حتى الآن.</div>
                        @endif
                    </div>
                </section>

            </div>
        </main>
    </div>
</body>
</html>
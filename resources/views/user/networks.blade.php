<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الشبكات والمنافذ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root{
            --bg-1:#071629;
            --bg-2:#0a2340;
            --bg-3:#061425;
            --border:rgba(50,166,255,.22);
            --cyan:#20d7ff;
            --text:#eaf6ff;
            --sidebar-w:290px;
        }

        *{
            box-sizing:border-box;
        }

        html, body{
            margin:0;
            padding:0;
            width:100%;
            min-height:100%;
            overflow-x:hidden;
        }

        body{
            color:var(--text);
            background:
                radial-gradient(circle at top right, rgba(0,212,255,.10), transparent 20%),
                radial-gradient(circle at bottom left, rgba(0,119,255,.08), transparent 18%),
                linear-gradient(135deg, var(--bg-1) 0%, var(--bg-2) 45%, var(--bg-3) 100%);
            font-family:inherit;
        }

        .dots-bg{
            position:fixed;
            inset:0;
            background-image:radial-gradient(rgba(55,173,255,.18) 1px, transparent 1px);
            background-size:40px 40px;
            opacity:.35;
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
            padding:24px 24px 28px;
            overflow-x:hidden;
        }

        .page-header{
            display:flex;
            align-items:flex-start;
            justify-content:space-between;
            gap:20px;
            margin-bottom:18px;
        }

        .page-title-wrap{
            text-align:right;
        }

        .page-title{
            margin:0;
            font-size:32px;
            line-height:1.15;
            font-weight:900;
            color:#eef8ff;
        }

        .page-subtitle{
            margin:8px 0 0;
            color:rgba(225,243,255,.50);
            font-size:15px;
        }

        .header-actions{
            display:flex;
            align-items:center;
            gap:12px;
            flex-wrap:wrap;
        }

        .header-btn{
            display:inline-flex;
            align-items:center;
            gap:8px;
            text-decoration:none;
            border-radius:14px;
            padding:12px 22px;
            font-size:15px;
            font-weight:900;
            transition:.2s ease;
            border:1px solid rgba(57,169,255,.22);
            color:#eaf6ff;
            background:rgba(8,34,68,.68);
        }

        .header-btn:hover{
            transform:translateY(-1px);
        }

        .header-live{
            color:#17f28d;
            font-size:15px;
            font-weight:900;
            display:inline-flex;
            align-items:center;
            gap:8px;
        }

        .hlive-dot{
            width:9px;
            height:9px;
            border-radius:50%;
            background:#18ef92;
            box-shadow:0 0 10px rgba(24,239,146,.85);
        }

        .networks-card{
            background:linear-gradient(180deg, rgba(12,41,75,.95), rgba(9,31,58,.95));
            border:1px solid var(--border);
            border-radius:22px;
            box-shadow:0 10px 24px rgba(0,0,0,.16);
            overflow:hidden;
            position:relative;
            width:100%;
            max-width:100%;
        }

        .networks-card::before,
        .network-item::before{
            content:"";
            position:absolute;
            inset:0;
            background-image:radial-gradient(rgba(55,173,255,.10) 1px, transparent 1px);
            background-size:38px 38px;
            opacity:.25;
            pointer-events:none;
        }

        .card-header{
            position:relative;
            z-index:1;
            padding:20px 22px;
            border-bottom:1px solid rgba(53,146,225,.20);
            display:flex;
            align-items:center;
            justify-content:space-between;
            gap:14px;
        }

        .card-title{
            margin:0;
            font-size:22px;
            font-weight:900;
            color:#eef8ff;
        }

        .card-count{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            min-width:90px;
            padding:8px 16px;
            border-radius:999px;
            font-size:13px;
            font-weight:900;
            background:rgba(32,215,255,.10);
            color:var(--cyan);
            border:1px solid rgba(32,215,255,.18);
            white-space:nowrap;
        }

        .network-list{
            position:relative;
            z-index:1;
            padding:22px;
            display:grid;
            gap:16px;
            width:100%;
            max-width:100%;
        }

        .network-item{
            position:relative;
            overflow:hidden;
            background:linear-gradient(180deg, rgba(13,45,84,.94), rgba(10,34,64,.94));
            border:1px solid rgba(50,166,255,.28);
            border-radius:18px;
            padding:20px;
            box-shadow:0 10px 24px rgba(0,0,0,.18);
            width:100%;
            max-width:100%;
        }

        .network-top{
            position:relative;
            z-index:1;
            display:flex;
            align-items:center;
            justify-content:space-between;
            gap:16px;
            margin-bottom:16px;
        }

        .network-title{
            margin:0;
            font-size:20px;
            font-weight:900;
            color:#eef8ff;
            word-break:break-word;
        }

        .network-status{
            display:inline-block;
            padding:8px 14px;
            border-radius:999px;
            font-size:12px;
            font-weight:900;
            white-space:nowrap;
        }

        .status-active{
            background:rgba(18,242,138,.10);
            color:#12f28a;
            border:1px solid rgba(18,242,138,.20);
        }

        .ports-grid{
            position:relative;
            z-index:1;
            display:grid;
            grid-template-columns:repeat(3, minmax(0,1fr));
            gap:14px;
            width:100%;
        }

        .port-box{
            background:rgba(6,25,48,.45);
            border:1px solid rgba(65,159,235,.16);
            border-radius:14px;
            padding:16px;
            min-width:0;
        }

        .port-name{
            font-size:16px;
            font-weight:800;
            color:#eaf6ff;
            margin-bottom:10px;
            word-break:break-word;
        }

        .port-status{
            display:inline-block;
            padding:6px 12px;
            border-radius:999px;
            font-size:12px;
            font-weight:900;
            background:rgba(18,242,138,.10);
            color:#12f28a;
            border:1px solid rgba(18,242,138,.20);
        }

        .empty-text{
            position:relative;
            z-index:1;
            margin:0;
            color:rgba(234,246,255,.75);
            font-size:15px;
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

            .ports-grid{
                grid-template-columns:1fr;
            }
        }

        @media (max-width: 768px){
            .main{
                padding:14px;
            }

            .page-title{
                font-size:28px;
            }

            .network-top{
                flex-direction:column;
                align-items:flex-start;
            }

            .card-header{
                flex-direction:column;
                align-items:flex-start;
            }

            .network-list{
                padding:16px;
            }
        }
    </style>
</head>
<body>
    <div class="dots-bg"></div>

    <div class="page-wrap">
        @include('user.user-sidebar')

        <main class="main">
            <div class="page-header">
                <div class="page-title-wrap">
                    <h1 class="page-title">شبكات {{ $department->name }}</h1>
                    <p class="page-subtitle">عرض الشبكات والمنافذ الخاصة بالقسم</p>
                </div>

                <div class="header-actions">
                    <a href="#" class="header-btn">تحديث</a>
                    <span class="header-live">
                        مباشر
                        <span class="hlive-dot"></span>
                    </span>
                </div>
            </div>

            <section class="networks-card">
                <div class="card-header">
                    <h2 class="card-title">الشبكات</h2>
                    <span class="card-count">{{ $networks->count() }} شبكة</span>
                </div>

                <div class="network-list">
                    @forelse($networks as $network)
                        <div class="network-item">
                            <div class="network-top">
                                <h3 class="network-title">{{ $network->name }}</h3>
                                <span class="network-status status-active">فعالة</span>
                            </div>

                            <div class="ports-grid">
                                @forelse($network->ports as $port)
                                    <div class="port-box">
                                        <div class="port-name">{{ $port->name }}</div>
                                        <span class="port-status">{{ $port->status }}</span>
                                    </div>
                                @empty
                                    <p class="empty-text">لا توجد منافذ لهذه الشبكة</p>
                                @endforelse
                            </div>
                        </div>
                    @empty
                        <p class="empty-text">لا توجد شبكات لهذا القسم</p>
                    @endforelse
                </div>
            </section>
        </main>
    </div>
</body>
</html>


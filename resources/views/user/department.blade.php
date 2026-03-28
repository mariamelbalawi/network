<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحة القسم</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root{
            --bg-1:#071629;
            --bg-2:#0a2340;
            --bg-3:#061425;
            --panel:#0c294b;
            --panel-2:#0a2340;
            --border:rgba(50,166,255,.22);
            --border-strong:rgba(55,173,255,.30);
            --cyan:#20d7ff;
            --cyan-2:#43a6ff;
            --text:#eaf6ff;
            --muted:rgba(224,242,255,.58);
            --sidebar-w:290px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            color: var(--text);
            background:
                radial-gradient(circle at top right, rgba(0,212,255,.10), transparent 20%),
                radial-gradient(circle at bottom left, rgba(0,119,255,.08), transparent 18%),
                linear-gradient(135deg, var(--bg-1) 0%, var(--bg-2) 45%, var(--bg-3) 100%);
            font-family: inherit;
            overflow-x: hidden;
        }

        .dots-bg{
            position: fixed;
            inset: 0;
            background-image: radial-gradient(rgba(55,173,255,.18) 1px, transparent 1px);
            background-size: 40px 40px;
            opacity: .35;
            pointer-events: none;
            z-index: 0;
        }

        .page-wrap{
            position: relative;
            min-height: 100vh;
            z-index: 1;
        }

        .main{
            margin-right: var(--sidebar-w);
            width: calc(100% - var(--sidebar-w));
            min-height: 100vh;
            padding: 24px 24px 28px;
        }

        .main-inner{
            width: 100%;
            max-width: 100%;
        }

        .page-header{
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 18px;
        }

        .page-title-wrap{
            text-align: right;
        }

        .page-title{
            margin: 0;
            font-size: 32px;
            line-height: 1.15;
            font-weight: 900;
            color: #eef8ff;
        }

        .page-subtitle{
            margin: 8px 0 0;
            color: rgba(225,243,255,.50);
            font-size: 15px;
        }

        .header-actions{
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .header-btn{
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            border-radius: 14px;
            padding: 12px 22px;
            font-size: 15px;
            font-weight: 900;
            transition: .2s ease;
            border: 1px solid rgba(57,169,255,.22);
        }

        .header-btn.secondary{
            color: #eaf6ff;
            background: rgba(8,34,68,.68);
        }

        .header-btn:hover{
            transform: translateY(-1px);
        }

        .header-live{
            color: #17f28d;
            font-size: 15px;
            font-weight: 900;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .header-live-dot{
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: #18ef92;
            box-shadow: 0 0 10px rgba(24,239,146,.85);
        }

        .hero-card{
            background: linear-gradient(180deg, rgba(12,41,75,.95), rgba(9,31,58,.95));
            border: 1px solid var(--border);
            border-radius: 22px;
            box-shadow: 0 10px 24px rgba(0,0,0,.16);
            padding: 24px;
            margin-bottom: 18px;
            position: relative;
            overflow: hidden;
        }

        .hero-card::before,
        .stat-card::before{
            content: "";
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(55,173,255,.10) 1px, transparent 1px);
            background-size: 38px 38px;
            opacity: .25;
            pointer-events: none;
        }

        .stats{
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
        }

        .stat-card{
            min-height: 126px;
            border-radius: 18px;
            background: linear-gradient(180deg, rgba(13,45,84,.94), rgba(10,34,64,.94));
            border: 1px solid rgba(50,166,255,.28);
            box-shadow: 0 10px 24px rgba(0,0,0,.18);
            padding: 22px;
            position: relative;
            overflow: hidden;
        }

        .stat-top{
            position: relative;
            z-index: 1;
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 14px;
        }

        .stat-icon{
            width: 46px;
            height: 46px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: 800;
            flex-shrink: 0;
            background: rgba(0,202,255,.14);
            color: #30d7ff;
        }

        .stat-label{
            color: rgba(219,240,255,.60);
            font-size: 15px;
            font-weight: 700;
        }

        .stat-number{
            font-size: 40px;
            font-weight: 900;
            margin-top: 14px;
            line-height: 1;
            color: var(--cyan);
        }

        @media (max-width: 992px){
            .main{
                margin-right: 0;
                width: 100%;
            }

            .page-header{
                flex-direction: column;
                align-items: stretch;
            }
        }

        @media (max-width: 768px){
            .stats{
                grid-template-columns: 1fr;
            }

            .main{
                padding: 14px;
            }

            .hero-card{
                padding: 18px;
            }

            .page-title{
                font-size: 28px;
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
                        <h1 class="page-title">{{ $department->name }}</h1>
                        <p class="page-subtitle">لوحة متابعة خاصة بالقسم</p>
                    </div>

                    <div class="header-actions">
                        
                        <span class="header-live">
                            مباشر
                            <span class="header-live-dot"></span>
                        </span>
                    </div>
                </div>

                <section class="hero-card">
                    <div class="stats">
                        <div class="stat-card">
                            <div class="stat-top">
                                <div>
                                    <div class="stat-label">عدد المنافذ</div>
                                    <div class="stat-number">28</div>
                                </div>
                                <div class="stat-icon">🔌</div>
                            </div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <div>
                                    <div class="stat-label">عدد الشبكات</div>
                                    <div class="stat-number">12</div>
                                </div>
                                <div class="stat-icon">🌐</div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </main>
    </div>
</body>
</html>


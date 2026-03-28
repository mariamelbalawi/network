<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>لوحة التحكم — نظام إدارة الشبكات</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<style>
  .dashboard-single{
    margin-top:20px;
  }

  .mini-table{
    width:100%;
    border-collapse:collapse;
  }

  .mini-table th,
  .mini-table td{
    padding:14px 12px;
    text-align:right;
    border-bottom:1px solid rgba(255,255,255,0.06);
    font-size:14px;
  }

  .mini-table th{
    color:var(--text-muted);
    font-weight:600;
  }

  .mini-table td{
    color:#fff;
  }

  .status-badge{
    display:inline-flex;
    align-items:center;
    gap:6px;
    padding:6px 12px;
    border-radius:999px;
    font-size:12px;
    font-weight:700;
    white-space:nowrap;
  }

  .status-open{
    background:rgba(255,145,0,0.12);
    color:var(--orange);
  }

  .status-review{
    background:rgba(0,229,255,0.12);
    color:var(--cyan);
  }

  .status-solved{
    background:rgba(0,230,118,0.12);
    color:var(--green);
  }

  .section-card{
    background:linear-gradient(180deg, rgba(8,33,69,0.96), rgba(6,27,58,0.96));
    border:1px solid rgba(33,150,243,0.22);
    border-radius:22px;
    overflow:hidden;
    box-shadow:0 10px 30px rgba(0,0,0,0.22);
  }

  .section-header{
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:18px 22px;
    border-bottom:1px solid rgba(255,255,255,0.06);
  }

  .section-title{
    font-size:20px;
    font-weight:800;
    color:#fff;
  }

  .section-body{
    padding:10px 18px 18px;
  }

  .empty-box{
    padding:22px;
    text-align:center;
    color:var(--text-muted);
  }
</style>
</head>
<body>
<div class="app">

  @include('sidebar')

  <main class="main">
    <div class="page-header">
      <div>
        <div class="page-title">لوحة التحكم</div>
        <div class="page-subtitle">
          أهم المؤشرات السريعة وآخر الشكاوى
        </div>
      </div>

      <div class="header-actions">
        <div class="live-indicator">
          <div class="live-dot"></div>
          <span>مباشر</span>
        </div>

        
      </div>
    </div>

    <div class="stats-grid">
      <div class="stat-card" style="--accent-color:var(--cyan)">
        <div class="stat-icon" style="background:rgba(0,229,255,0.1)">🌐</div>
        <div class="stat-label">الشبكات</div>
        <div class="stat-value glow-cyan">{{ $networksCount ?? 0 }}</div>
        <div class="stat-change" style="color:var(--text-muted)">
          إجمالي الشبكات المسجلة
        </div>
      </div>

      <div class="stat-card" style="--accent-color:var(--blue-accent)">
        <div class="stat-icon" style="background:rgba(33,150,243,0.1)">👥</div>
        <div class="stat-label">المستخدمون</div>
        <div class="stat-value" style="color:var(--blue-light)">{{ $usersCount ?? 0 }}</div>
        <div class="stat-change" style="color:var(--text-muted)">
          إجمالي المستخدمين
        </div>
      </div>

      <div class="stat-card" style="--accent-color:var(--red)">
        <div class="stat-icon" style="background:rgba(255,23,68,0.1)">📝</div>
        <div class="stat-label">الشكاوى المفتوحة</div>
        <div class="stat-value" style="color:#ff5c7c">{{ $openComplaintsCount ?? 0 }}</div>
        <div class="stat-change" style="color:var(--text-muted)">
          الشكاوى التي تحتاج متابعة
        </div>
      </div>

      <div class="stat-card" style="--accent-color:var(--orange)">
        <div class="stat-icon" style="background:rgba(255,145,0,0.1)">🔌</div>
        <div class="stat-label">المنافذ</div>
        <div class="stat-value glow-orange">{{ $portsCount ?? 0 }}</div>
        <div class="stat-change" style="color:var(--text-muted)">
          إجمالي المنافذ
        </div>
      </div>
    </div>

    <div class="dashboard-single">
      <div class="section-card">
        <div class="section-header">
          <div class="section-title">آخر الشكاوى</div>
          
        </div>

        <div class="section-body">
          @if(!empty($latestComplaints) && count($latestComplaints))
            <table class="mini-table">
              <thead>
                <tr>
                  <th>العنوان</th>
                  <th>المستخدم</th>
                  <th>الحالة</th>
                </tr>
              </thead>
              <tbody>
                @foreach($latestComplaints as $complaint)
                  @php
                    $status = $complaint->status ?? 'جديدة';
                    $statusClass = 'status-open';

                    if ($status === 'قيد المراجعة') $statusClass = 'status-review';
                    if ($status === 'تم الحل' || $status === 'done') $statusClass = 'status-solved';
                  @endphp

                  <tr>
                    <td>{{ $complaint->title ?? 'بدون عنوان' }}</td>
                    <td>{{ $complaint->user->name ?? 'غير معروف' }}</td>
                    <td>
                      <span class="status-badge {{ $statusClass }}">
                        {{ $status }}
                      </span>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          @else
            <div class="empty-box">لا توجد شكاوى لعرضها حاليًا</div>
          @endif
        </div>
      </div>
    </div>
  </main>
</div>
</body>
</html>
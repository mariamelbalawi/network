<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>الأجهزة النشطة — نظام إدارة الشبكات</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}"><style>
.step-indicator {
  display:flex; gap:8px; align-items:center; margin-bottom:20px; flex-wrap:wrap;
}
.step {
  display:flex; align-items:center; gap:6px; font-size:12px; color:var(--text-muted);
}
.step.active { color:var(--cyan); }
.step.done { color:var(--green); }
.step-num {
  width:24px; height:24px; border-radius:50%; border:2px solid currentColor;
  display:flex; align-items:center; justify-content:center; font-size:11px; font-weight:700; flex-shrink:0;
}
.step-arrow { color:var(--text-muted); font-size:14px; }
.type-grid {
  display:grid; grid-template-columns:repeat(3,1fr); gap:12px; margin:16px 0;
}
.type-btn {
  background:var(--card-bg); border:2px solid var(--card-border); border-radius:12px;
  padding:16px 8px; text-align:center; cursor:pointer; transition:all 0.2s;
  color:var(--text-muted); font-family:'Cairo',sans-serif; font-size:13px; font-weight:600;
}
.type-btn:hover, .type-btn.selected {
  border-color:var(--cyan); color:var(--cyan); background:rgba(0,229,255,0.08);
}
.type-btn .type-icon { font-size:28px; display:block; margin-bottom:6px; }
.dept-list { display:flex; flex-direction:column; gap:8px; max-height:280px; overflow-y:auto; }
.dept-item {
  padding:10px 14px; border-radius:10px; border:1px solid var(--card-border);
  cursor:pointer; transition:all 0.2s; font-size:14px; background:var(--card-bg);
}
.dept-item:hover, .dept-item.selected {
  border-color:var(--cyan); color:var(--cyan); background:rgba(0,229,255,0.08);
}
.modal-nav { display:flex; gap:10px; justify-content:flex-end; margin-top:20px; }
/* Detail popup */
.detail-popup {
  position:fixed; inset:0; background:rgba(0,0,0,0.7); z-index:500;
  display:none; align-items:center; justify-content:center; backdrop-filter:blur(4px);
}
.detail-popup.open { display:flex; }
.detail-box {
  background:linear-gradient(145deg,var(--blue-mid),var(--blue-deep));
  border:1px solid var(--card-border); border-radius:20px; padding:28px;
  width:340px; max-width:95vw; animation:fadeIn 0.2s ease;
}
.detail-box h3 { color:var(--cyan); font-size:17px; margin-bottom:16px; }
.detail-row { display:flex; justify-content:space-between; padding:8px 0; border-bottom:1px solid rgba(33,150,243,0.1); font-size:14px; }
.detail-row:last-child { border-bottom:none; }
.detail-label { color:var(--text-muted); }
.detail-val { color:var(--text); font-weight:600; }
</style>
</head>
<body>
<div class="app">

 @include('sidebar')

  <main class="main">
    <div class="page-header">
      <div>
        <div class="page-title">الأجهزة النشطة</div>
        <div class="page-subtitle">عرض الأجهزة المتصلة والنشطة حالياً</div>
      </div>
      <div class="header-actions">
        <button class="btn btn-primary" onclick="openAddModal()">+ إضافة جهاز</button>
      </div>
    </div>

    <div class="active-count" id="activeCount"><div class="live-dot"></div> عدد الأجهزة النشطة: 0</div>

    <div class="filter-box" id="adminFilter" style="display:none;">
      <label>فلترة حسب القسم:</label>
      <select id="departmentFilter">
        <option value="">كل الأقسام</option>
        <option>مكتب الأمن</option>
        <option>مكتب شؤون الطلاب</option>
        <option>مكتب شؤون الخريجين</option>
        <option>مكتب MIS</option>
        <option>قسم كيميا</option>
        <option>قسم فيزيا</option>
        <option>قسم حاسب</option>
        <option>قسم بايو</option>
        <option>مكتب العميد</option>
        <option>مكتب الوكيل لشؤون الطلاب</option>
        <option>مكتب الوكيل لشؤون الخريجين</option>
      </select>
    </div>

    <div class="loader" id="loader"></div>
    <div class="active-device-grid" id="cardsContainer"></div>
    <div class="empty-state" id="emptyMessage" style="display:none;">لا يوجد أجهزة نشطة حالياً</div>
  </main>
</div>

<!-- ===== ADD DEVICE MODAL (3 steps) ===== -->
<div class="detail-popup" id="addModal">
  <div class="detail-box" style="width:420px;">
    <div class="step-indicator">
      <div class="step active" id="s1"><div class="step-num">1</div> نوع الجهاز</div>
      <span class="step-arrow">›</span>
      <div class="step" id="s2"><div class="step-num">2</div> القسم</div>
      <span class="step-arrow">›</span>
      <div class="step" id="s3"><div class="step-num">3</div> التفاصيل</div>
    </div>

    <div id="step1">
      <div class="type-grid">
        <button class="type-btn" onclick="selectType('Switch','🔀')"><span class="type-icon">🔀</span>سويتش</button>
        <button class="type-btn" onclick="selectType('Router','📡')"><span class="type-icon">📡</span>راوتر</button>
        <button class="type-btn" onclick="selectType('Lab','🖥️')"><span class="type-icon">🖥️</span>لاب / كمبيوتر</button>
        <button class="type-btn" onclick="selectType('Printer','🖨️')"><span class="type-icon">🖨️</span>طابعة</button>
        <button class="type-btn" onclick="selectType('Laptop','💻')"><span class="type-icon">💻</span>لاب توب</button>
        <button class="type-btn" onclick="selectType('Other','📦')"><span class="type-icon">📦</span>أخر</button>
      </div>
      <div class="modal-nav">
        <button class="btn btn-outline" onclick="closeAddModal()">إلغاء</button>
        <button class="btn btn-primary" id="next1Btn" onclick="goStep(2)" disabled>التالي ›</button>
      </div>
    </div>

    <div id="step2" style="display:none;">
      <div class="dept-list" id="deptList"></div>
      <div class="modal-nav">
        <button class="btn btn-outline" onclick="goStep(1)">‹ السابق</button>
        <button class="btn btn-primary" id="next2Btn" onclick="goStep(3)" disabled>التالي ›</button>
      </div>
    </div>

    <div id="step3" style="display:none;">
      <label style="font-size:12px;color:var(--text-muted);font-weight:700;">اسم الجهاز</label>
      <input id="newName" type="text" style="width:100%;padding:10px;border-radius:10px;border:1px solid var(--card-border);background:rgba(255,255,255,0.05);color:var(--text);font-family:Cairo,sans-serif;font-size:14px;outline:none;box-sizing:border-box;margin:6px 0 12px;" placeholder="مثال: PC-Lab-05">

      <label style="font-size:12px;color:var(--text-muted);font-weight:700;">عنوان IP</label>
      <input id="newIp" type="text" style="width:100%;padding:10px;border-radius:10px;border:1px solid var(--card-border);background:rgba(255,255,255,0.05);color:var(--text);font-family:Cairo,sans-serif;font-size:14px;outline:none;box-sizing:border-box;margin:6px 0 12px;" placeholder="مثال: 192.168.1.50">

      <label style="font-size:12px;color:var(--text-muted);font-weight:700;">عدد البورتات المتصلة بالمنافذ</label>
      <input id="newPorts" type="number" min="1" style="width:100%;padding:10px;border-radius:10px;border:1px solid var(--card-border);background:rgba(255,255,255,0.05);color:var(--text);font-family:Cairo,sans-serif;font-size:14px;outline:none;box-sizing:border-box;margin:6px 0 12px;" placeholder="مثال: 4">

      <div class="modal-nav">
        <button class="btn btn-outline" onclick="goStep(2)">‹ السابق</button>
        <button class="btn btn-primary" onclick="saveDevice()">💾 حفظ</button>
      </div>
    </div>
  </div>
</div>

<!-- ===== DEVICE DETAIL POPUP ===== -->
<div class="detail-popup" id="detailPopup">
  <div class="detail-box">
    <h3 id="detailTitle">تفاصيل الجهاز</h3>
    <div id="detailContent"></div>
    <div style="margin-top:16px;text-align:center;">
      <button class="btn btn-outline" onclick="closeDetail()">إغلاق</button>
    </div>
  </div>
</div>

<script>
const DEPTS = ["مكتب الأمن","مكتب شؤون الطلاب","مكتب شؤون الخريجين","مكتب MIS",
  "قسم كيميا","قسم فيزيا","قسم حاسب","قسم بايو","مكتب العميد",
  "مكتب الوكيل لشؤون الطلاب","مكتب الوكيل لشؤون الخريجين"];

const ICONS = { PC:"💻", Laptop:"💻", Lab:"🖥️", Printer:"🖨️", Router:"📡", Switch:"🔀", Other:"📦" };

let devices = [
  {name:"PC-01", type:"Lab", ip:"192.168.1.10", status:"Active", department:"قسم حاسب"},
  {name:"Laptop-02", type:"Laptop", ip:"192.168.1.11", status:"Active", department:"قسم فيزيا"},
  {name:"Printer-Admin", type:"Printer", ip:"192.168.1.20", status:"Active", department:"مكتب العميد"},
  {name:"Router-01", type:"Router", ip:"192.168.1.1", status:"Active", department:"مكتب الأمن"},
  {name:"PC-03", type:"Lab", ip:"192.168.1.12", status:"Active", department:"مكتب MIS"}
];

const currentUser = { role:"Admin", department:"قسم حاسب" };
const container = document.getElementById("cardsContainer");
const filterBox = document.getElementById("adminFilter");
const deptFilter = document.getElementById("departmentFilter");
const emptyMsg = document.getElementById("emptyMessage");
const activeCount = document.getElementById("activeCount");
const loader = document.getElementById("loader");

if (currentUser.role === "Admin") filterBox.style.display = "flex";

function render() {
  container.innerHTML = "";
  emptyMsg.style.display = "none";
  loader.style.display = "block";

  setTimeout(() => {
    loader.style.display = "none";
    let list = devices.filter(d => d.status === "Active");

    if (currentUser.role === "User") {
      list = list.filter(d => d.department === currentUser.department);
    }

    if (currentUser.role === "Admin" && deptFilter.value) {
      list = list.filter(d => d.department === deptFilter.value);
    }

    activeCount.innerHTML = `<div class="live-dot"></div> عدد الأجهزة النشطة: ${list.length}`;

    if (!list.length) {
      emptyMsg.style.display = "block";
      return;
    }

    list.forEach((d) => {
      container.innerHTML += `
        <div class="active-device-card" onclick="showDetail(${devices.indexOf(d)})" style="cursor:pointer;">
          <span class="device-icon-big">${ICONS[d.type] || "📦"}</span>
          <div class="online-badge">● نشط</div>
          <div class="device-name">${d.name}</div>
          <div class="device-ip">${d.ip}</div>
          <div class="device-details">
            النوع: ${d.type}<br>
            القسم: ${d.department}
          </div>
        </div>`;
    });
  }, 400);
}

function showDetail(i) {
  const d = devices[i];
  document.getElementById("detailTitle").textContent = d.name;
  document.getElementById("detailContent").innerHTML = `
    <div class="detail-row"><span class="detail-label">النوع</span><span class="detail-val">${d.type}</span></div>
    <div class="detail-row"><span class="detail-label">عنوان IP</span><span class="detail-val" style="font-family:monospace">${d.ip}</span></div>
    <div class="detail-row"><span class="detail-label">القسم</span><span class="detail-val">${d.department}</span></div>
    <div class="detail-row"><span class="detail-label">الحالة</span><span class="detail-val" style="color:var(--green)">● نشط</span></div>
  `;
  document.getElementById("detailPopup").classList.add("open");
}

function closeDetail() {
  document.getElementById("detailPopup").classList.remove("open");
}

let newType = "", newTypeIcon = "", newDept = "";

function openAddModal() {
  newType = "";
  newDept = "";
  goStep(1);
  document.getElementById("addModal").classList.add("open");
  document.getElementById("next1Btn").disabled = true;
  document.getElementById("next2Btn").disabled = true;
  document.getElementById("newName").value = "";
  document.getElementById("newIp").value = "";
  document.getElementById("newPorts").value = "";

  document.querySelectorAll(".type-btn").forEach(b => b.classList.remove("selected"));

  const dl = document.getElementById("deptList");
  dl.innerHTML = "";

  DEPTS.forEach(dept => {
    const el = document.createElement("div");
    el.className = "dept-item";
    el.textContent = dept;
    el.onclick = () => {
      document.querySelectorAll(".dept-item").forEach(x => x.classList.remove("selected"));
      el.classList.add("selected");
      newDept = dept;
      document.getElementById("next2Btn").disabled = false;
    };
    dl.appendChild(el);
  });
}

function closeAddModal() {
  document.getElementById("addModal").classList.remove("open");
}

function selectType(t, icon) {
  newType = t;
  newTypeIcon = icon;
  document.querySelectorAll(".type-btn").forEach(b => b.classList.remove("selected"));
  event.currentTarget.classList.add("selected");
  document.getElementById("next1Btn").disabled = false;
}

function goStep(n) {
  [1,2,3].forEach(i => {
    document.getElementById("step" + i).style.display = i === n ? "block" : "none";
    const s = document.getElementById("s" + i);
    s.className = "step" + (i === n ? " active" : i < n ? " done" : "");
  });
}

function saveDevice() {
  const name = document.getElementById("newName").value.trim();
  const ip = document.getElementById("newIp").value.trim();

  if (!name || !ip || !newType || !newDept) {
    alert("يرجى ملء جميع الحقول");
    return;
  }

  devices.push({ name, type:newType, ip, status:"Active", department:newDept });
  closeAddModal();
  render();
}

deptFilter.addEventListener("change", render);
render();
</script>

<!-- ===== MOBILE TOPBAR ===== -->
<header class="mobile-topbar">
  <div class="mobile-topbar-logo">
    <div class="mobile-logo-icon">
      <svg viewBox="0 0 24 24" fill="white" width="18" height="18"><path d="M17 8C8 10 5.9 16.17 3.82 20.82L5.71 22l1-2.3A4.49 4.49 0 0 0 8 20c4 0 4-2 8-2s4 2 8 2v-2c-4 0-4-2-8-2a9.23 9.23 0 0 0-1.06.06C15.06 12.44 18.12 9.62 22 8.93V7C19.87 7.17 18.02 7.44 17 8zM5 14v-4H3v4c0 2.21 1.79 4 4 4h2v-2H7c-1.1 0-2-.9-2-2zm6-8V2h-2v4H7l5 5 5-5h-4-2z"/></svg>
    </div>
    <span class="mobile-topbar-title">نظام إدارة الشبكات</span>
  </div>

  <button class="mobile-menu-btn" onclick="openDrawer()">
    <span></span><span></span><span></span>
  </button>
</header>

<div class="mobile-overlay" id="mobileOverlay" onclick="closeDrawer()"></div>

<nav class="mobile-drawer" id="mobileDrawer">
  <div class="mobile-drawer-header">
    <h2>القائمة</h2>
    <button class="mobile-close-btn" onclick="closeDrawer()">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>
    </button>
  </div>

  <div class="mobile-drawer-nav">
    <a class="nav-item" href="{{ route('dashboard') }}">
      <svg class="nav-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/></svg>
      لوحة التحكم
    </a>

    <a class="nav-item" href="{{ route('networks') }}">
      <svg class="nav-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M15 9H9v6h6V9zm-2 4h-2v-2h2v2zm8-2V9h-2V7c0-1.1-.9-2-2-2h-2V3h-2v2h-2V3H9v2H7c-1.1 0-2 .9-2 2v2H3v2h2v2H3v2h2v2c0 1.1.9 2 2 2h2v2h2v-2h2v2h2v-2h2c1.1 0 2-.9 2-2v-2h2v-2h-2v-2h2zm-4 6H7V7h10v10z"/></svg>
      الشبكات
    </a>

    <a class="nav-item" href="{{ route('devices') }}">
      <svg class="nav-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M20 18c1.1 0 1.99-.9 1.99-2L22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2H0v2h24v-2h-4zm-16-2V6h16v10H4z"/></svg>
      الأجهزة
    </a>

    <a class="nav-item" href="{{ route('ports') }}">
      <svg class="nav-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M7 5H5v2h2V5zm0 4H5v2h2V9zm0 4H5v2h2v-2zm8-8H9v2h6V5zm0 4H9v2h6V9zm0 4H9v2h6v-2zm4-8h-2v2h2V5zm0 4h-2v2h2V9zm0 4h-2v2h2v-2z"/></svg>
      المنافذ
    </a>

    <a class="nav-item active" href="{{ route('active-devices') }}">
      <svg class="nav-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M3.5 18.49l6-6.01 4 4L22 6.92l-1.41-1.41-7.09 7.97-4-4L2 16.99z"/></svg>
      الأجهزة النشطة
    </a>

    <a class="nav-item" href="{{ route('wifi') }}">
      <svg class="nav-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M1 9l2 2c4.97-4.97 13.03-4.97 18 0l2-2C16.93 2.93 7.08 2.93 1 9zm8 8l3 3 3-3c-1.65-1.66-4.34-1.66-6 0zm-4-4l2 2c2.76-2.76 7.24-2.76 10 0l2-2C15.14 9.14 8.87 9.14 5 13z"/></svg>
      شبكات الواي فاي
    </a>

    <a class="nav-item" href="{{ route('users.index') }}">
      <svg class="nav-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
      إدارة المستخدمين
    </a>

    <a class="nav-item" href="{{ route('team') }}">
      <svg class="nav-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
      فريق العمل
    </a>

    <a class="nav-item" href="{{ route('profile') }}" style="border-top:1px solid rgba(33,150,243,0.2);padding-top:9px;margin-top:6px;">
      <svg class="nav-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
      الملف الشخصي
    </a>
  </div>

  <div class="mobile-drawer-footer">
    <div class="live-indicator"><div class="live-dot"></div>مباشر الآن</div>
    <div style="margin-top:6px;">نظام إدارة الشبكات v1.0</div>
    <div style="color:rgba(120,144,156,0.5)">مشروع التخرج 2026</div>
  </div>
</nav>

<script>
function openDrawer() {
  document.getElementById('mobileDrawer').classList.add('open');
  document.getElementById('mobileOverlay').classList.add('open');
}

function closeDrawer() {
  document.getElementById('mobileDrawer').classList.remove('open');
  document.getElementById('mobileOverlay').classList.remove('open');
}
</script>
</body>
</html>



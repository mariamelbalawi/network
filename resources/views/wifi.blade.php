<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>شبكات الواي فاي — نظام إدارة الشبكات</title>

<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<div class="app">

<!-- SIDEBAR -->

@include('sidebar')

<!-- MAIN -->

<main class="main">

<div class="page-header">

<div>

<div class="page-title">

شبكات الواي فاي

</div>

<div class="page-subtitle">

إدارة ومراقبة شبكات الواي فاي

</div>

</div>

<div class="header-actions">

<button class="btn btn-primary" onclick="openAddModal()">

+ إضافة شبكة

</button>

</div>

</div>

<div class="wifi-grid" id="wifiContainer"></div>

<div class="empty-state" id="emptyMessage" style="display:none">

لا توجد شبكات حالياً

</div>

<!-- MODAL -->

<div class="modal-overlay" id="wifiModal">

<div class="modal-box">

<h2 id="modalTitle">

إضافة شبكة واي فاي

</h2>

<label>

اسم الشبكة (SSID)

</label>

<input type="text" id="mSsid">

<label>

كلمة المرور

</label>

<input type="text" id="mPass">

<label>

القسم

</label>

<input type="text" id="mDept">

<label>

المكان

</label>

<input type="text" id="mLoc">

<label>

الحالة

</label>

<select id="mStatus">

<option value="Active">نشط</option>

<option value="Inactive">غير نشط</option>

</select>

<div class="modal-footer">

<button class="btn btn-outline" onclick="closeModal()">

إلغاء

</button>

<button class="btn btn-primary" onclick="saveWifi()">

حفظ

</button>

</div>

</div>

</div>

</main>

</div>

<script>

let wifiNetworks = [

{ssid:"Network-01",password:"12345678",department:"قسم حاسب",location:"الدور الأول",status:"Active"},

{ssid:"Network-02",password:"87654321",department:"قسم فيزيا",location:"الدور الثاني",status:"Inactive"},

{ssid:"Network-03",password:"abcd1234",department:"قسم بايو",location:"الدور الثالث",status:"Active"},

{ssid:"Network-04",password:"wifi2026",department:"مكتب العميد",location:"الدور الأرضي",status:"Active"},

{ssid:"Network-05",password:"admin1234",department:"مكتب الأمن",location:"الدور الأول",status:"Inactive"}

];

let editIdx=null;

const container=document.getElementById("wifiContainer");

const emptyMsg=document.getElementById("emptyMessage");

const modal=document.getElementById("wifiModal");

function render(){

container.innerHTML="";

emptyMsg.style.display="none";

if(!wifiNetworks.length){

emptyMsg.style.display="block";

return;

}

wifiNetworks.forEach((w,i)=>{

const isActive=w.status==="Active";

container.innerHTML+=`

<div class="wifi-card">

<div class="wifi-status ${isActive?"active":"inactive"}">

${isActive?"● نشط":"○ غير نشط"}

</div>

<div style="font-size:28px;margin-bottom:8px;margin-top:4px">

📶

</div>

<div class="ssid">

${w.ssid}

</div>

<div class="wifi-password">

<span style="color:var(--text-muted)">🔑</span>

<span>${w.password}</span>

</div>

<div class="wifi-info">

القسم: ${w.department}

<br>

المكان: ${w.location}

</div>

<div class="card-actions">

<button onclick="editWifi(${i})">

تعديل

</button>

<button class="del" onclick="deleteWifi(${i})">

حذف

</button>

</div>

</div>

`;

});

}

function openAddModal(){

editIdx=null;

document.getElementById("modalTitle").textContent="إضافة شبكة واي فاي";

["mSsid","mPass","mDept","mLoc"].forEach(id=>document.getElementById(id).value="");

document.getElementById("mStatus").value="Active";

modal.classList.add("open");

}

function editWifi(i){

editIdx=i;

const w=wifiNetworks[i];

document.getElementById("modalTitle").textContent="تعديل الشبكة";

document.getElementById("mSsid").value=w.ssid;

document.getElementById("mPass").value=w.password;

document.getElementById("mDept").value=w.department;

document.getElementById("mLoc").value=w.location;

document.getElementById("mStatus").value=w.status;

modal.classList.add("open");

}

function closeModal(){

modal.classList.remove("open");

}

function saveWifi(){

const obj={

ssid:document.getElementById("mSsid").value,

password:document.getElementById("mPass").value,

department:document.getElementById("mDept").value,

location:document.getElementById("mLoc").value,

status:document.getElementById("mStatus").value

};

if(!obj.ssid||!obj.password){

alert("يرجى ملء الحقول المطلوبة");

return;

}

if(editIdx!==null)

wifiNetworks[editIdx]=obj;

else

wifiNetworks.push(obj);

closeModal();

render();

}

function deleteWifi(i){

if(confirm("حذف الشبكة: "+wifiNetworks[i].ssid+" ؟")){

wifiNetworks.splice(i,1);

render();

}

}

render();

</script>

</body>

</html>



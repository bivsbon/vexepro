<html>
<head>
<title> Tìm chuyến </title>
<link rel="stylesheet" href="./Home.css"/>
<link rel="stylesheet" href="./Search.css"/>
</head>
<body>
<nav class="navbar">
<div class="logo">
<img src="../assets/images/logo.png" alt="logo"/>
VÉ XE PRO
</div>
<div class="navbar-left">
<?php
print("<div class='button'>Tôi</div>
<div class='button'>Mã giảm giá</div>
<div class='button'>Liên hệ</div>
");

print("<div class='button primary-button'>Đăng nhập</div>
<div class='button secondary-button'>Đăng ký</div>");
?>
</div>
</nav>
<main>
<div class="container">
<div class="title">Tìm chuyến</div>
<div class="wrapper">
<div class="search-filter">
<div style="font-size: 18px; border-bottom: 1px solid rgba(0,0,0,0.15);  margin-bottom: 12px;padding-bottom: 12px "> Bộ lọc </div>
<form>
<div class="form-item">
<label>Nơi đi</label>
<select class="form-input"></select>
</div>
<div class="form-item">
<label> Nơi đến</label>
<select class="form-input"/></select>
</div>
<div class="form-item">
<label>Ngày đi</label>
<select class="form-input"></select>
</div>
<div class="form-item">
<label>Giá thấp nhất</label>
<input class="form-input"/>
</div>
<div class="form-item">
<label>Giá cao nhất</label>
<input class="form-input"/>
</div>
<button class='button primary-button' style='width: 100%'>Tìm kiếm</button>
</form>
</div>
<div class="search-content">
<?php
for($i = 1; $i < 11; $i++){
print("
<div id='$i' class='search-item-wrapper'>
<div class='search-item'>
<div class='search-img-wrapper'>
<img class='search-img' src='https://static.vexere.com/production/images/1663578798814.jpeg?w=250&h=250'/>
</div>
<div class='search-item-content'>
<div class='search-title'>
<div class='agency-name'>An Phú Quý</div>
<div class='price'>380.000đ</div>
</div>
<div class='vehicle-type'>Limousine giường năm 40 chỗ</div>
<div class='search-desc'>
<div class='search-places'>
<div class='start'>
<div class='start-time'>11:20</div>
<div class='start-place'>Bến xe Nước Ngầm</div>
</div>
<div class='estimate'>8h</div>
<div class='end'>
<div class='end-time'>19:20</div>
<div class='end-place'>Xuân Hội</div>
</div>
</div>
<div>
<div class='remain'>Còn 10 chỗ trống</div>
<button style='margin-top: 12px' onclick='onShow($i)'>Chọn chuyến</button>
</div>
</div>
</div>
</div>
</div>
");
}
?>
<?php 
print("
<script type='text/javascript'>
let current_id = 0;
    function onShow(id, row, level, seat){
let form = document.createElement('div');
form.innerHTML = ` 
<form class='form-wrapper'>
<div style='display:flex; align-items: center;gap:8px'>
<div class='form-item'>
<input name='id' value='\${id}' style='visibility:hidden;display:none'/>
<label>Số hàng</label>
<select class='form-input' name='row'>
\${(function fun(){
var options = '';
for(let i = 1; i<=row; i++){
options += '<option value=\'i\'>i</option>';
}
return options;
})()}
</select>
</div>
<div class='form-item'>
<label>Số tầng</label>
<select class='form-input' name='level'>
\${(function fun(){
var options = '';
for(let i = 1; i<=level; i++){
options += '<option value=\'i\'>i</option>';
}
return options;
})()}
</select>
</div>
<div class='form-item'>
<label>Số ghế</label>
<select class='form-input' name='seat'>
\${(function fun(){
var options = '';
for(let i = 1; i<=seat; i++){
options += '<option value=\'i\'>i</option>';
}
return options;
})()}
</select>
</div>
</div>
<div style='display:flex;justify-content:end'>
<button type='submit' class='button'>Đặt vé</button>
</div>
</form>
`
let newElement = document.getElementById(String(id));
newElement.appendChild(form);
if(current_id !== 0){
let oldElement = document.getElementById(String(current_id));
oldElement.removeChild(oldElement.lastChild);
}
current_id = id;
}
</script>
")
?>
</div>
</div>
</div>
</main>
<footer>
    <div class="company-name">VeXePro</div>
    <div class="company-desc">Lorem ipsum dolor sit amet, qui minim labore adipisicing minim sint cillum sint consectetur cupidatat.</div>
</footer>
</body>
</html>

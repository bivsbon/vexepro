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
</form>
</div>
<div class="search-content">
<?php
    $arrData = [
["img" => "https://storage.googleapis.com/vex-config/cms-tool/destination/images/5/img_hero.png?v1" , "title" => "Sài Gòn - Nha Trang", "price" => "200.000"],
["img" => "https://storage.googleapis.com/vex-config/cms-tool/destination/images/5/img_hero.png?v1" , "title" => "Sài Gòn - Nha Trang", "price" => "200.000"],
["img" => "https://storage.googleapis.com/vex-config/cms-tool/destination/images/5/img_hero.png?v1" , "title" => "Sài Gòn - Nha Trang", "price" => "200.000"],
["img" => "https://storage.googleapis.com/vex-config/cms-tool/destination/images/5/img_hero.png?v1" , "title" => "Sài Gòn - Nha Trang", "price" => "200.000"],
["img" => "https://storage.googleapis.com/vex-config/cms-tool/destination/images/5/img_hero.png?v1" , "title" => "Sài Gòn - Nha Trang", "price" => "200.000"],
["img" => "https://storage.googleapis.com/vex-config/cms-tool/destination/images/5/img_hero.png?v1" , "title" => "Sài Gòn - Nha Trang", "price" => "200.000"],
["img" => "https://storage.googleapis.com/vex-config/cms-tool/destination/images/5/img_hero.png?v1" , "title" => "Sài Gòn - Nha Trang", "price" => "200.000"],
];
foreach($arrData as $key => $val){
print("<div class='search-item'>
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
<button style='margin-top: 12px'>Chọn chuyến</button>
</div>
</div>
</div>
</div>
");
}
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

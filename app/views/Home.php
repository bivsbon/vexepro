<html>
<head>
<title> Trang chủ </title>
<link rel="stylesheet" href="./Home.css"/>
</head>
<body>
<nav class="navbar">
<div class="logo">
<img src="../assets/images/logo.png" alt="logo"/>
VÉ XE PRO
</div>
<div class="navbar-left">
<div class="button primary-button">Đăng nhập</div>
<div class="button secondary-button">Đăng ký</div>
</div>
</nav>
<main>
<div class="hero">
<div class="search-bar">
<div class="search-input">
<div class="search-item">
<label>Nơi xuất phát</label>
<select name="source" class="search-input-item">
<?php
    $tinhthanh = [["label" => "Hà Tĩnh", "value" => "ha-tinh"],["label" => "Hà Nội", "value" => "ha-noi"]];
    foreach($tinhthanh as $key => $val){
        print("<option value={$val["value"]}>{$val["label"]}</option>");
    }
?>

</select>
</div>
<div class="search-item"> 
<label>Nơi đến</label>
<select name="destination" class="search-input-item">
<?php
    $tinhthanh = [["label" => "Hà Tĩnh", "value" => "ha-tinh"],["label" => "Hà Nội", "value" => "ha-noi"]];
    foreach($tinhthanh as $key => $val){
        print("<option value={$val["value"]}>{$val["label"]}</option>");
    }
?>
</select>
</div>
<div class="search-item"> 
<label>Ngày đi</label>
<input type="date" name="start_date" class="search-input-item"/>
</div>
</div>
<div class="search-button"> Tìm chuyến</div>

</div>
</div>
<div class="container">
<div class="show-title"> Tuyến đường phổ biến </div>
<div class="show-wrapper">
<?php
    $arrData = [
["img" => "https://storage.googleapis.com/vex-config/cms-tool/destination/images/5/img_hero.png?v1" , "title" => "Sài Gòn - Nha Trang", "price" => "200.000"],
["img" => "https://storage.googleapis.com/vex-config/cms-tool/destination/images/5/img_hero.png?v1" , "title" => "Sài Gòn - Nha Trang", "price" => "200.000"],
["img" => "https://storage.googleapis.com/vex-config/cms-tool/destination/images/5/img_hero.png?v1" , "title" => "Sài Gòn - Nha Trang", "price" => "200.000"],
["img" => "https://storage.googleapis.com/vex-config/cms-tool/destination/images/5/img_hero.png?v1" , "title" => "Sài Gòn - Nha Trang", "price" => "200.000"],
];
foreach($arrData as $key => $val){
print("<div class='show-item'>
    <div class='show-img'>
<img src={$val["img"]} alt='car'/>
</div>
    <div class='show-desc'>
<div class='show-item-title'>{$val["title"]}</div>
<div>Chỉ từ {$val["price"]}đ</div>
</div>
</div>
");
}
?>
</div>
</div>
<div class="container">
<div class="show-title"> Khuyến mãi </div>
<div class="show-wrapper">
<?php
    $arrData = [
["img" => "https://storage.googleapis.com/vex-config/cms-tool/destination/images/5/img_hero.png?v1" , "title" => "Sài Gòn - Nha Trang", "price" => "200.000"],
["img" => "https://storage.googleapis.com/vex-config/cms-tool/destination/images/5/img_hero.png?v1" , "title" => "Sài Gòn - Nha Trang", "price" => "200.000"],
["img" => "https://storage.googleapis.com/vex-config/cms-tool/destination/images/5/img_hero.png?v1" , "title" => "Sài Gòn - Nha Trang", "price" => "200.000"],
["img" => "https://storage.googleapis.com/vex-config/cms-tool/destination/images/5/img_hero.png?v1" , "title" => "Sài Gòn - Nha Trang", "price" => "200.000"],
];
foreach($arrData as $key => $val){
print("<div class='show-item'>
    <div class='show-img'>
<img src={$val["img"]} alt='car'/>
</div>
    <div class='show-desc'>
<div class='show-item-title'>{$val["title"]}</div>
<div>Chỉ từ {$val["price"]}đ</div>
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

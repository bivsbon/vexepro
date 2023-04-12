<html>
<head>
<title> Tôi </title>
<link rel="stylesheet" href="./Home.css"/>
<link rel="stylesheet" href="./Me.css"/>
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
<div class="container">
<div class="card">
<div class="row" id="row">
<div class="col-l border-r" id="tab-menu">
</div>
<div class="col-r" id="tab-content">
</div>
<?php
print("<script type='text/javascript'>
    const tabs = [
{
title: 'Thông tin cá nhân',
id: 1,
render: `
<div>
    <div>Trang cá nhân</div>
</div>
`
},
{
title: 'Quản lý vé',
id: 1,
render: `
<div>
    <div>Quản lý vé</div>
</div>
`
},
{
title: 'Mã giảm giá',
id: 1,
render: `
<div>
    <div>Mã giảm giá</div>
</div>
`
}
];
let menu = document.getElementById('tab-menu');
let content = document.getElementById('tab-content');
tabs.forEach(item => {

let element = document.createElement('div');
element.classList.add('tab-item');
element.classList.add('tab' + item.id);
element.setO
element.innerText = item.title;
menu.appendChild(element);
})
function onChangeTab(tabId){
    content.innerHTML = item.render;
}
</script>");

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


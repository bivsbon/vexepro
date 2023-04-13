<html>
<head>
<title> Quản lý xe </title>
<link rel="stylesheet" href="./Home.css"/>
<link rel="stylesheet" href="./Me.css"/>
<link rel="stylesheet" href="./TripMana.css"/>
</head>
<body>
<nav class="navbar">
<div class="logo">
<img src="../assets/images/logo.png" alt="logo"/>
VÉ XE PRO
</div>
<div class="navbar-left">
<div class="button">Tôi</div>
<div class="button">Mã giảm giá</div>
<div class="button">Liên hệ</div>
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
            title: 'Danh sách xe',
            id: 'tab-1',
            render: `
            <div>
<div style='margin-bottom: 8px'>
<label style='display: inline-block'>Tìm kiếm theo ID: </label>
<input class='form-item' name='trip_id' placeholder='Nhập ID để tìm kiếm'/>
</div>
<table>
<tr>
<th>Mã xe</th>
<th>Mã nhà xe</th>
<th>Mã loại</th>
</tr>
\${(function fun(){
let ct = '';
for(let i = 0; i<10;i++){
ct += `<tr>
<td>ID</td>
<td>Mã xe</td>
<td>Khởi hành</td>
</tr>`;
}
return ct;
})()}
</table>
            </div>
            `
        },
        {
            title: 'Thêm xe',
            id: 'tab-2',
            render: `
            <form>
                <div class='form-wrapper'>
                    <label>Chọn nhà xe</label>
                    <select class='form-item' name='agency'></select>
                </div>
                <div class='form-wrapper'>
                    <label>Chọn loại xe</label>
                    <select class='form-item' name='type'></select>
                </div>
<button class='button primary-button'>Thêm xe</button>
            </form>
            `
        },
        {
            title: 'Sửa thông tin xe',
            id: 'tab-3',
            render: `
            <form>
                <div class='form-wrapper'>
                    <label>Nhập id</label>
                    <input class='form-item' name='id'/>
                </div>
                <div class='form-wrapper'>
                    <label>Chọn nhà xe</label>
                    <select class='form-item' name='agency'></select>
                </div>
                <div class='form-wrapper'>
                    <label>Chọn loại xe</label>
                    <select class='form-item' name='type'></select>
                </div>
<button class='button primary-button'>Sửa chuyến</button>
            </form>
            `
        },
        {
            title: 'Xóa xe',
            id: 'tab-4',
            render: `
            <div>
            <form>
                <div class='form-wrapper'>
                    <label>Nhập id</label>
                    <input class='form-item' name='id'/>
                </div>
<button class='button primary-button'>Xóa xe</button>
            </form>
            `
        }
    ];
    let activeTab = tabs[0].id;
    let menu = document.getElementById('tab-menu');
    let content = document.getElementById('tab-content');
    content.innerHTML = tabs[0].render;
    tabs.forEach(item => {
        let element = document.createElement('div');
        element.classList.add('tab-item');
        element.id = item.id;
        element.onclick=function(){onChangeTab(item)};
        element.innerText = item.title;
        menu.appendChild(element);
    })
    document.getElementById(activeTab).classList.add('active');
    function onChangeTab(tab){
        content.innerHTML = tab.render;
        document.getElementById(activeTab).classList.remove('active');
        document.getElementById(tab.id).classList.add('active');
        activeTab = tab.id;
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

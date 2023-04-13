<html>
<head>
<title> Tôi </title>
<link rel="stylesheet" href="./Home.css"/>
<link rel="stylesheet" href="./Me.css"/>
<link rel="stylesheet" href="./TripMana.css"/>
</head>
<body>

<?php
require_once _DIR_ROOT.'/app/views/Navbar.php';
?>
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
            title: 'Danh sách khách hàng',
            id: 'tab-1',
            render: `
            <div>
<div style='margin-bottom: 8px'>
<label style='display: inline-block'>Tìm kiếm theo ID: </label>
<input class='form-item' name='trip_id' placeholder='Nhập ID để tìm kiếm'/>
</div>
<table>
<tr>
<th> ID</th>
<th> Tên đăng nhập</th>
<th> Tên</th>
<th> Tuổi</th>
<th> Số điện thoại</th>
<th> Email</th>
<th> Địa chỉ</th>
</tr>
\${(function fun(){
let ct = '';
for(let i = 0; i<10;i++){
ct += `<tr>
<td>ID</td>
<td>Mã xe</td>
<td>Khởi hành</td>
<td> Dự kiến</td>
<td> Giá</td>
<td> Dự kiến</td>
<td> Giá</td>
</tr>`;
}
return ct;
})()}
</table>
            </div>
            `
        },
        {
            title: 'Thêm người dùng',
            id: 'tab-2',
            render: `
            <form>
                <div class='form-wrapper'>
                    <label>Tên đăng nhập</label>
                    <input class='form-item' name='username' value=''/>
                </div>
                <div class='form-wrapper'>
                    <label> Mật khẩu</label>
                    <input type='password' class='form-item' name='password' value=''/>
                </div>
                <div class='form-wrapper'>
                    <label> Họ và tên</label>
                    <input class='form-item' name='name' value=' Giá chuyến'/>
                </div>
                <div class='form-wrapper'>
                    <label> Số điện thoại</label>
                    <input class='form-item' name='phone' value=' Giá chuyến'/>
                </div>
                <div class='form-wrapper'>
                    <label> Địa chỉ</label>
                    <input class='form-item' name='address' value=' Giá chuyến'/>
                </div>
                <div class='form-wrapper'>
                    <label> Tuổi</label>
                    <input class='form-item' name='age' type='number' value=' Giá chuyến'/>
                </div>
                <div class='form-wrapper'>
                    <label>Email</label>
                    <input class='form-item' name='email' type='email' value=' Giá chuyến'/>
                </div>
                <div class='form-wrapper'>
                    <label> Phân quyền</label>
                    <select class='form-item' name='role'>
<option value='admin'>Admin</option>
<option value='customer'>Customer</option>
</select>
                </div>
<button class='button primary-button'>Thêm người dùng</button>
            </form>
            `
        },
        {
            title: 'Xóa người dùng',
            id: 'tab-3',
            render: `
            <div>
            <form>
                <div class='form-wrapper'>
                    <label>Nhập id</label>
                    <input class='form-item' name='id'/>
                </div>
<button class='button primary-button'>Xóa người dùng</button>
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


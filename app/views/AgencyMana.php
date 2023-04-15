<html>
<head>
<title> Quản lý chuyến </title>
    <link rel="stylesheet" href="/vexepro/app/views/Home.css"/>
    <link rel="stylesheet" href="/vexepro/app/views/Me.css"/>
    <link rel="stylesheet" href="/vexepro/app/views/AgencyMana.css"/>
</head>
<body>
<?php
require_once _DIR_ROOT . '/app/views/AdminNavbar.php';
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
            title: 'Danh sách nhà xe',
            id: 'tab-1',
            render: `
            <div>
<div style='margin-bottom: 8px'>
<label style='display: inline-block'>Tìm kiếm theo ID: </label>
<input class='form-item' name='trip_id' placeholder='Nhập ID để tìm kiếm'/>
</div>
<table>
<tr>
<th>Mã nhà xe</th>
<th> Tên</th>
</tr>");

    foreach ($agencies as $agency) {
        print '<tr>
<td>'.$agency->id.'</td>
<td>'.$agency->name.'</td>
</tr>';
    }

    print("</table>
            </div>
            `
        },
        {
            title: 'Thêm nhà xe',
            id: 'tab-2',
            render: `
            <form action='/vexepro/agency/add'>
                <div class='form-wrapper'>
                    <label> Tên nhà xe</label>
                    <input class='form-item' name='name' value=' Tên nhà xe'/>
                </div>
<button class='button primary-button'>Thêm nhà xe</button>
            </form>
            `
        },
        {
            title: 'Sửa thông tin nhà xe',
            id: 'tab-3',
            render: `
            <form action='/vexepro/agency/update'>
                <div class='form-wrapper'>
                    <label>Nhập id</label>
                    <input class='form-item' name='id'/>
                </div>
                <div class='form-wrapper'>
                    <label> Tên nhà xe</label>
                    <input class='form-item' name='name' value=' Tên nhà xe'/>
                </div>
<button class='button primary-button'>Sửa thông tin</button>
            </form>
            `
        },
        {
            title: 'Xóa nhà xe',
            id: 'tab-4',
            render: `
            <div>
            <form action='/vexepro/agency/delete'>
                <div class='form-wrapper'>
                    <label>Nhập id</label>
                    <input class='form-item' name='id'/>
                </div>
<button class='button primary-button'>Xóa nhà xe</button>
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


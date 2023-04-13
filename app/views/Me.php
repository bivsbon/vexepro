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
    const tickets = [
        {
            id: '1',
            start_place: 'Giường bệnh',
            end_place: 'Nghĩa địa',
            price: '100.000',
            start_time: '10h:00m pm',
            est_time: '10h',
            owner: 'Le Viet Hoang',
            agency_name: 'Nha xe rong vang',
            vehicle_type: 'Xe mai tang',
            seat: 'Thương gia'
        },
        {
            id: '2',
            start_place: 'Giường bệnh',
            end_place: 'Nghĩa địa',
            price: '100.000',
            start_time: '10h:00m pm',
            est_time: '10h',
            owner: 'Le Viet Hoang',
            agency_name: 'Nha xe rong vang',
            vehicle_type: 'Xe mai tang',
            seat: 'Thương gia'
        },
    ]
    const tabs = [
        {
            title: 'Thông tin cá nhân',
            id: 'tab-1',
            render: `
            <div>
                <div class='form-wrapper'>
                    <label>Tên người dùng</label>
                    <input class='form-item' name='username' value='Tên người dùng'/>
                </div>
                <div class='form-wrapper'>
                    <label>Họ và tên</label>
                    <input class='form-item' name='fullname' value='Họ và tên'/>
                </div>
                <div class='form-wrapper'>
                    <label>Số điện thoại</label>
                    <input class='form-item' name='phone' value='Số điện thoại'/>
                </div>
                <div class='form-wrapper'>
                    <label>Địa chỉ</label>
                    <input class='form-item' name='address' value='Địa chỉ'/>
                </div>
            </div>
            `
        },
        {
            title: 'Quản lý vé',
            id: 'tab-2',
            render: `
            <div>
                <div>Quản lý vé</div>
                \${(function fun(){
                    let ct = '';
                    for(let i=0; i<tickets.length; i++){
                        ct += `<div class='ticket-item-wrapper'>
                                    <div class='ticket-id'>No.\${tickets[i].id}</div>    
                                    <div class='ticket-content'>
                                        <div class='ticket-content-l'>
                                            <div style='font-size:18px'><b>Người mua:</b><i> \${tickets[i].owner}</i></div>
                                            <div><b>Nhà xe:</b> \${tickets[i].agency_name}</div>
                                        </div>
                                        <div class='ticket-content-r'>Giá vé: \${tickets[i].price}đ</div>
                                        </div>    
                                    <div class='ticket-datetime'>
                                        <div class='ticket-datetime-l'>
                                            <div><b> Điểm đi:</b> \${tickets[i].start_place}</div>
                                            -
                                            <div><b> Điểm đến:</b> \${tickets[i].end_place}</div>
                                        </div>
                                        <div class='ticket-datetime-r'><b>Thời gian:</b> \${tickets[i].start_time}</div>
                                    </div>    
                               </div>` 
                    }
                    return ct;
                })()}
            </div>
            `
        },
        {
            title: 'Mã giảm giá',
            id: 'tab-3',
            render: `
            <div>
                <div>Mã giảm giá</div>
            </div>
            `
        },
{
title: 'Đăng xuất',
id:'tab-4',
render: `
<div>
<button class='button danger-button'>Đăng xuất</button>
</div>
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


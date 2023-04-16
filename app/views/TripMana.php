<html>
<head>
<title> Quản lý chuyến </title>
    <link rel="stylesheet" href="/vexepro/app/views/Home.css"/>
    <link rel="stylesheet" href="/vexepro/app/views/Me.css"/>
    <link rel="stylesheet" href="/vexepro/app/views/TripMana.css"/>
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
            title: 'Danh sách chuyến',
            id: 'tab-1',
            render: `
            <div>
<div style='margin-bottom: 8px'>
<label style='display: inline-block'>Tìm kiếm theo ID: </label>
<input class='form-item' name='trip_id' placeholder='Nhập ID để tìm kiếm'/>
</div>
<table>
<tr>
<th>ID</th>
<th>Mã xe</th>
<th>Nơi đi</th>
<th>Nơi đến</th>
<th>Thời gian khời hành</th>
<th>Thời gian dự kiến</th>
<th>Giá</th>
</tr>");

foreach ($trips as $trip) {
    print '<tr>
<td>'.$trip->id.'</td>
<td>'.$trip->vehicle_id.'</td>
<td>'.$trip->start_station.'</td>
<td>'.$trip->end_station.'</td>
<td>'.$trip->start_time.'</td>
<td>'.$trip->est_time.'</td>
<td>'.$trip->price.'</td>
</tr>';
}

print("</table>
            </div>
            `
        },
        {
            title: 'Thêm chuyến',
            id: 'tab-2',
            render: `
            <form action='/vexepro/trip/add'>
                <div class='form-wrapper'>
                    <label>Chọn điểm đi</label>
                    <select class='form-item' name='station_id_start'>");

                foreach ($stations as $station) {
                    print("<option value='$station->id'>$station->province - $station->name</option>");
                }

                print("</select>
                </div>
                <div class='form-wrapper'>
                    <label>Chọn điểm đến</label>
                    <select class='form-item' name='station_id_end'>");

                    foreach ($stations as $station) {
                        print("<option value='$station->id'>$station->province - $station->name</option>");
                    }
                print("</select>
                </div>
                <div class='form-wrapper'>
                    <label>Chọn xe</label>
                    <select class='form-item' name='vehicle_id'>");

                foreach ($vehicles as $vehicle) {
                    print("<option value='$vehicle->id'>$vehicle->id - $vehicle->plate_num - $vehicle->type</option>");
                }

                print("</select>
                </div>
                <div class='form-wrapper'>
                    <label>Thời gian khởi hành</label>
                    <input type='datetime-local' class='form-item' name='start_time'/>
                </div>
                <div class='form-wrapper'>
                    <label>Thời gian dự kiến</label>
                    <input type='time' class='form-item' name='est_time'/>
                </div>
                <div class='form-wrapper'>
                    <label>Giá</label>
                    <input class='form-item' name='price'/>
                </div>
<button class='button primary-button'>Thêm chuyến</button>
            </form>
            `
        },
        {
            title: 'Sửa chuyến',
            id: 'tab-3',
            render: `
            <form>
                <div class='form-wrapper'>
                    <label>Nhập id</label>
                    <input class='form-item' name='id'/>
                </div>
                <div class='form-wrapper'>
                    <label>Chọn điểm đi</label>
                    <select class='form-item' name='start'></select>
                </div>
                <div class='form-wrapper'>
                    <label>Chọn điểm đến</label>
                    <select class='form-item' name='end'></select>
                </div>
                <div class='form-wrapper'>
                    <label>Chọn xe</label>
                    <select class='form-item' name='vehicle'></select>
                </div>
                <div class='form-wrapper'>
                    <label>Chọn thời gian</label>
                    <input type='date' class='form-item' name='datetime'/>
                </div>
                <div class='form-wrapper'>
                    <label>Giá</label>
                    <input class='form-item' name='price' value=' Giá chuyến'/>
                </div>
<button class='button primary-button'>Sửa chuyến</button>
            </form>
            `
        },
        {
            title: 'Xóa chuyến',
            id: 'tab-4',
            render: `
            <div>
            <form action='/vexepro/trip/delete'>
                <div class='form-wrapper'>
                    <label>Nhập id</label>
                    <input class='form-item' name='id'/>
                </div>
<button class='button primary-button'>Xóa chuyến</button>
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


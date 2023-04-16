<html>

<head>
    <title> Quản lý xe </title>
    <link rel="stylesheet" href="/vexepro/app/views/Home.css" />
    <link rel="stylesheet" href="/vexepro/app/views/Me.css" />
    <link rel="stylesheet" href="/vexepro/app/views/TripMana.css" />
    <link rel="stylesheet" href="/vexepro/app/views/VehicleMana.css" />
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
                        if(array_key_exists('vehicleManage', $error)){
                            $err = $error["vehicleManage"];
                            print("<script type=\"text/javascript\">alert('$err')</script>");
                        }
                        if(array_key_exists('vehicleUpdate', $error)){
                            $err = $error["vehicleUpdate"];
                            print("<script type=\"text/javascript\">alert('$err')</script>");
                        }
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
                                                <th>Tên nhà xe</th>
                                                <th>Loại xe</th>
                                            </tr>
                                        </table>
                                    </div>
                                    `
                                },
                                {
                                    title: 'Thêm xe',
                                    id: 'tab-2',
                                    render: `
                                    <form action='/vexepro/vehicle/add'>
                                        <div class='form-wrapper'>
                                            <label>Chọn nhà xe</label>
                                            <select class='form-item' name='agency'>
                                            ");
                                            foreach($agencyMap as $id => $name){
                                                print("<option value=\'{$id}\'>{$name}</option>");
                                            }
                                            
                                            print("
                                            </select>
                                        </div>
                                        <div class='form-wrapper'>
                                            <label>Chọn loại xe</label>
                                            
                                            <select class='form-item' name='type'>
                                            ");
                                            foreach($vehicleTypes as $t){
                                                print("<option value='$t->id'>$t->type</option>");
                                            }
                                            print("
                                            </select>
                                        </div>
                                        <button class='button primary-button'>Thêm xe</button>
                                    </form>
                                    `
                                },
                                {
                                    title: 'Danh sách loại xe',
                                    id: 'tab-3',
                                    render: `
                                    <div>
                                        <div style='margin-bottom: 8px'>
                                            <label style='display: inline-block'>Tìm kiếm theo ID: </label>
                                            <input class='form-item' name='trip_id' placeholder='Nhập ID để tìm kiếm'/>
                                        </div>
                                        <table>
                                            <tr>
                                                <th>Mã loại</th>
                                                <th>Tên loại</th>
                                                <th>Số hàng</th>
                                                <th>Số tầng</th>
                                                <th>Số dãy</th>
                                            </tr>
                                            ");
                                            foreach($vehicleTypes as $t){
                                                print("
                                                <tr>
                                                <td>$t->id</td>
                                                <td>$t->type</td>
                                                <td>$t->row</td>
                                                <td>$t->level</td>
                                                <td>$t->line</td>
                                                </tr>
                                                ");
                                            }
                                            print("
                                        </table>
                                    </div>
                                    `
                                },
                                {
                                    title: 'Thêm loại xe',
                                    id: 'tab-4',
                                    render: `
                                    <form action='/vexepro/vehicletype/add'>
                                        <div class='form-wrapper'>
                                            <label>Nhập loại xe</label>
                                            <input class='form-item' name='type'></input>
                                        </div>
                                        <div class='form-wrapper'>
                                            <label>Số tầng</label>
                                            <input class='form-item' name='level'></input>
                                        </div>
                                        <div class='form-wrapper'>
                                            <label>Số hàng</label>
                                            <input class='form-item' name='row'></input>
                                        </div>
                                        <div class='form-wrapper'>
                                            <label>Số dãy</label>
                                            <input class='form-item' name='line'></input>
                                        </div>
                                        <button class='button primary-button'>Thêm xe</button>
                                    </form>
                                    `
                                },
                                {
                                    title: 'Sửa thông tin xe',
                                    id: 'tab-5',
                                    render: `
                                    <form action='/vexepro/vehicle/update'>
                                        <div class='form-wrapper'>
                                            <label>Nhập id</label>
                                            <input class='form-item' name='id'/>
                                        </div>
                                        <div class='form-wrapper'>
                                            <label>Chọn nhà xe</label>
                                            <select class='form-item' name='agency_id'>
                                            ");
                                            foreach($agencyMap as $id => $name){
                                                print("<option value=\'{$id}\'>{$name}</option>");
                                            }
                                            print("
                                            </select>
                                        </div>
                                        <div class='form-wrapper'>
                                            <label>Chọn loại xe</label>
                                            <select class='form-item' name='type_id'>
                                            ");
                                            foreach($vehicleTypes as $t){
                                                print("<option value='$t->id'>$t->type</option>");
                                            }
                                            print("
                                            </select>
                                        </div>
                                        <div class='form-wrapper'>
                                            <label>Biển số xe</label>
                                            <input class='form-item' name='plate_num'/>
                                        </div>
                                        <button class='button primary-button'>Sửa chuyến</button>
                                    </form>
                                    `
                                },
                                {
                                    title: 'Xóa xe',
                                    id: 'tab-6',
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
        <div class="company-desc">Lorem ipsum dolor sit amet, qui minim labore adipisicing minim sint cillum sint
            consectetur cupidatat.</div>
    </footer>
</body>

</html>
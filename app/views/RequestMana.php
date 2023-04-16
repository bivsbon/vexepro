<html>

<head>
    <title> Quản lý yêu cầu </title>
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
                        $request_status = ['pending' => 'Đang chờ', 'resolved' => 'Đã xử lý'];
                        print("<script type='text/javascript'>
                            const tabs = [
                                {
                                    title: 'Danh sách yêu cầu',
                                    id: 'tab-1',
                                    render: `
                                    <div>
                                    <form action='/vexepro/requests/manage' method='POST'>
                                    <div style='margin-bottom: 8px'>
                                        <label style='display: inline-block'>Tìm kiếm theo ID: </label>
                                        <input class='form-item' name='id' placeholder='Nhập ID để tìm kiếm'/>
                                    </div>
                                    <button class='button' type='submit'> Tìm kiếm </button>
                                </form>
                                        <table>
                                            <tr>
                                                <th>Mã yêu cầu</th>
                                                <th>Mã vé</th>
                                                <th>Tên người gửi</th>
                                                <th>Ngân hàng</th>
                                                <th>Số tài khoản</th>
                                                <th>Nội dung</th>
                                                <th>Trạng thái</th>
                                            </tr>
                                            ");
                                            foreach($requests as $request){
                                                printf("
                                                <tr>
                                                <td>%d</td>
                                                <td>%d</td>
                                                <td>%s</td>
                                                <td>%s</td>
                                                <td>%s</td>
                                                <td>%s</td>
                                                <td>%s</td>
                                                </tr>
                                                ", $request->id, 
                                                $request->ticket_id, 
                                                $request->name, 
                                                $request->bank_name, 
                                                $request->bank_number, 
                                                $request->content,
                                                $request->status,
                                            );  
                                            }
                                            print("
                                        </table>
                                    </div>
                                    `
                                },
                                {
                                    title: 'Cập nhật trạng thái',
                                    id: 'tab-5',
                                    render: `
                                    <form action='/vexepro/vehicle/update'>
                                        <div class='form-wrapper'>
                                            <label>Nhập id</label>
                                            <input class='form-item' name='id'/>
                                        </div>
                                        <div class='form-wrapper'>
                                            <label>Chọn trạng thái</label>
                                            <select class='form-item' name='status'>
                                            ");
                                            foreach($request_status as $key => $value){
                                                print("<option value=\'{$key}\'>{$value}</option>");
                                            }
                                            print("
                                            </select>
                                        </div>
                                        <button class='button primary-button'>Sửa chuyến</button>
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
</body>

</html>
<html>
    <head>
        <title> Tôi </title>
        <link rel="stylesheet" href="/vexepro/app/views/Home.css"/>
        <link rel="stylesheet" href="/vexepro/app/views/Me.css"/>
    </head>
    <body>
    <?php
    require_once _DIR_ROOT . '/app/views/CustomerNavbar.php';
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
            $script = "<script type='text/javascript'>
                const tickets = [";
            $ownerName = $_SESSION['userObj']->name;
            foreach ($tickets as $ticket) {
                $id = $ticket['id'];
                $script .= "
                    {
                        id: '{$ticket['id']}',
                        start_place: '{$ticket['start_station']}',
                        end_place: '{$ticket['end_station']}',
                        price: '{$ticket['price']}',
                        start_time: '{$ticket['start_time']}',
                        est_time: '{$ticket['est_time']}',
                        owner: '$ownerName',
                        agency_name: '{$ticket['agency_name']}',
                        vehicle_type: '{$ticket['vehicle_type']}',
                        seat: '{$ticket['seat']}'
                    },";
            }
            $username = $_SESSION['userObj']->username;
            $tel = $_SESSION['userObj']->tel;
            $addr = $_SESSION['userObj']->address;
            $email = $_SESSION['userObj']->email;
                    $script .= "
                ]
                const tabs = [
                    {
                        title: 'Thông tin cá nhân',
                        id: 'tab-1',
                        render: `
                        <div>
                            <div class='form-wrapper'>
                                <label>Tên người dùng</label>
                                <input class='form-item' name='username' value='$username'/>
                            </div>
                            <div class='form-wrapper'>
                                <label>Họ và tên</label>
                                <input class='form-item' name='fullname' value='$ownerName'/>
                            </div>
                            <div class='form-wrapper'>
                                <label>Số điện thoại</label>
                                <input class='form-item' name='phone' value='$tel'/>
                            </div>
                            <div class='form-wrapper'>
                                <label>Địa chỉ</label>
                                <input class='form-item' name='address' value='$addr'/>
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
                                                    <div class='ticket-content-r'>Giá vé: \${tickets[i].price/1000}.000đ</div>
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
                    title: 'Đăng xuất',
                    id:'tab-4',
                    render: `
                    <div>
                    <a class='button danger-button' href='/vexepro/user/logout'>Đăng xuất</a>
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
            </script>";
                    print($script);

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


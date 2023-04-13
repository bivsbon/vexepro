<html>
    <head>
        <title> Tìm chuyến </title>
        <link rel="stylesheet" href="/vexepro/app/views/Home.css"/>
        <link rel="stylesheet" href="/vexepro/app/views/Search.css"/>
    </head>
    <body>
        <?php
        require_once _DIR_ROOT.'/app/views/Navbar.php';
        ?>
        <main>
            <div class="container">
                <div class="title">Tìm chuyến</div>
                <div class="wrapper">
                    <div class="search-filter">
                        <div style="font-size: 18px; border-bottom: 1px solid rgba(0,0,0,0.15);  margin-bottom: 12px;padding-bottom: 12px "> Bộ lọc </div>
                        <form>
                            <div class="form-item">
                                <label>Nơi đi</label>
                                <select class="form-input"></select>
                            </div>
                            <div class="form-item">
                                <label> Nơi đến</label>
                                <select class="form-input"/></select>
                            </div>
                            <div class="form-item">
                                <label>Ngày đi</label>
                                <select class="form-input"></select>
                            </div>
                            <div class="form-item">
                                <label>Giá thấp nhất</label>
                                <input class="form-input"/>
                            </div>
                            <div class="form-item">
                                <label>Giá cao nhất</label>
                                <input class="form-input"/>
                            </div>
                        </form>
                    </div>
                    <div class="search-content">
                        <?php
                        foreach ($trips as $trip) {
                            try {
                                $start_time = DateTime::createFromFormat('H:i:s', $trip['start_time_specific']);
                                $est_time_interval = new DateInterval('PT'.$trip['est_hour'].'H'.$trip['est_minute'].'M');
                                print("
        <div id='{$trip['id']}' class='search-item-wrapper'>
            <div class='search-item'>
            <div class='search-img-wrapper'>
                <img class='search-img' src='https://static.vexere.com/production/images/1663578798814.jpeg?w=250&h=250'/>
            </div>
            <div class='search-item-content'>
            <div class='search-title'>
            <div class='agency-name'>{$trip['agency_name']}</div>
            <div class='price'>".($trip['price']/1000).".000đ</div>
            </div>
            <div class='vehicle-type'>{$trip['vehicle_type']}</div>
            <div class='search-desc'>
            <div class='search-places'>
            <div class='start'>
            <div class='start-time'>".$start_time->format('H:i')."</div>
            <div class='start-place'>{$trip['start_station']}</div>
            </div>
            <div class='estimate'>".date('H:i', strtotime($trip['est_time']))."</div>
            <div class='end'>
            <div class='end-time'>".$start_time->add($est_time_interval)->format('H:i')."</div>
            <div class='end-place'>{$trip['end_station']}</div>
            </div>
            </div>
            <div>
            <div class='remain'>Còn {$trip['remaining_slots']} chỗ trống</div>
            <button style='margin-top: 12px' onclick='onShow({$trip['id']}, {$trip['row']}, {$trip['level']}, {$trip['line']})'>Chọn chuyến</button>
            </div>
            </div>
            </div>
            </div>
        </div>
        ");
                            } catch (Exception $e) {
                                echo "Cannot convert datetime";
                            }

                        }
                        print("
        <script type='text/javascript'>
        let current_id = 0;
            function onShow(id, row, level, line){
        let form = document.createElement('div');
        form.innerHTML = ` 
        <form class='form-wrapper'>
        <div style='display:flex; align-items: center;gap:8px'>
        <div class='form-item'>
        <input name='id' value='\${id}' style='visibility:hidden;display:none'/>
        <label>Số hàng</label>
        <select class='form-input' name='row'>
        \${(function fun(){
        var options = '';
        for(let i = 0; i<row; i++){
        options += '<option value=\''+i+ '\'>' + String.fromCharCode(65+i) + '</option>';
        }
        return options;
        })()}
        </select>
        </div>
        <div class='form-item'>
        <label>Số tầng</label>
        <select class='form-input' name='level'>
        \${(function fun(){
        var options = '';
        for(let i = 1; i<=level; i++){
        options += '<option value=\''+i+'\'>'+ i +'</option>';
        }
        return options;
        })()}
        </select>
        </div>
        <div class='form-item'>
        <label>Số ghế</label>
        <select class='form-input' name='seat'>
        \${(function fun(){
        var options = '';
        for(let i = 1; i<=line; i++){
        options += '<option value=\''+i+'\'>'+ i + '</option>';
        }
        return options;
        })()}
        </select>
        </div>
        </div>
        <div style='display:flex;justify-content:end'>
        <button type='submit' class='button'>Đặt vé</button>
        </div>
        </form>
        `
        let newElement = document.getElementById(String(id));
        newElement.appendChild(form);
        if(current_id !== 0){
        let oldElement = document.getElementById(String(current_id));
        oldElement.removeChild(oldElement.lastChild);
        }
        current_id = id;
        }
        </script>
        ");
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
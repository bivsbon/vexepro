<html>
    <head>
        <title> Trang chủ </title>
        <link rel="stylesheet" href="/vexepro/app/views/Home.css"/>
    </head>
    <body>
        <?php
            require_once _DIR_ROOT . '/app/views/CustomerNavbar.php';
        ?>
        <main>
            <div class="hero">
                <form action="/vexepro/trip/search">
                    <div class="search-bar">
                        <div class="search-input">
                            <div class="search-item">
                                <label>Nơi xuất phát</label>
                                <select name="beginning" class="search-input-item">
                                    <?php
                                    foreach($provinces as $province){
                                        echo '<option value="'.$province.'">'.$province.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="search-item">
                                <label>Nơi đến</label>
                                <select name="destination" class="search-input-item">
                                    <?php
                                    foreach($provinces as $province){
                                        echo '<option value="'.$province.'">'.$province.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="search-item">
                                <label>Ngày đi</label>
                                <input type="date" name="start_date" class="search-input-item"/>
                            </div>
                        </div>
                        <button class="search-button" type="submit"> Tìm chuyến</button>
                    </div>
                </form>
            </div>
            <div class="container">
                <div class="show-title"> Tuyến đường phổ biến </div>
                <div class="show-wrapper">
                    <?php
                    $arrData = [
                        ["img" => "https://storage.googleapis.com/vex-config/cms-tool/destination/images/5/img_hero.png?v1" , "title" => "Sài Gòn - Nha Trang", "price" => "200.000"],
                        ["img" => "https://storage.googleapis.com/vex-config/cms-tool/destination/images/5/img_hero.png?v1" , "title" => "Sài Gòn - Nha Trang", "price" => "200.000"],
                        ["img" => "https://storage.googleapis.com/vex-config/cms-tool/destination/images/5/img_hero.png?v1" , "title" => "Sài Gòn - Nha Trang", "price" => "200.000"],
                        ["img" => "https://storage.googleapis.com/vex-config/cms-tool/destination/images/5/img_hero.png?v1" , "title" => "Sài Gòn - Nha Trang", "price" => "200.000"],
                    ];
                    foreach($arrData as $key => $val){
                        print("<div class='show-item'>
                          <div class='show-img'>
                          <img src={$val["img"]} alt='car'/>
                          </div>
                          <div class='show-desc'>
                          <div class='show-item-title'>{$val["title"]}</div>
                          <div>Chỉ từ {$val["price"]}đ</div>
                          </div>
                          </div>
                          ");
                    }
                    ?>
                </div>
            </div>
        </main>
    </body>
</html>
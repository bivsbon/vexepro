<html>
    <head>
        <title> Liên hệ </title>
        <link rel="stylesheet" href="/vexepro/app/views/Home.css"/>
        <link rel="stylesheet" href="/vexepro/app/views/Me.css"/>
    </head>
    <body>
    <?php
    require_once _DIR_ROOT . '/app/views/CustomerNavbar.php';
    ?>
        <main>
            <?php
                if($message){
                    printf("<script>alert(\"%s\")</script>", $message);
                }
                $message = ""
            ?>
            <div class="container" style="display: flex; justify-content: center">
                <div class="card">
                    <?php   
                        $complain_subjects = ["account" => "Tài khoản", "agency" => "Về nhà xe", "system" => "Trang Web"];
                        $complain_type = ["bug" => "Thông báo lỗi", "complain" => "Khiếu nại", "contribute" => "Đóng góp ý kiến"];
                    ?>
                    <div style="font-size: 24px; font-weight: bold">Nhập thông tin hỗ trợ</div>
                    <p>Thông tin bạn cung cấp sẽ giúp chúng tôi cải thiện sản phẩm ngày càng hoàn thiện hơn!</p>
                    <form class='form-wrapper' action='/vexepro/complain/add_c' method='POST'>
                    <input style="visibility: hidden; display: none" name='user_id' value='<?php echo $_SESSION['userObj']->id?>'/>

                        <div>
                            <label>Tiêu đề</label>
                            <select class='form-item' name='topic'>
                            <?php
                                foreach($complain_subjects as $key => $value){
                                    printf("<option id=\"%s\">%s</option>", $key, $value);
                                }
                            ?>
                            </select>
                        </div>
                        <div>
                            <label>Loại yêu cầu</label>
                            <select  class='form-item' name='type'>
                            <?php
                                foreach($complain_type as $key => $value){
                                    printf("<option id=\"%s\">%s</option>", $key, $value);
                                }
                            ?>
                            </select>
                        </div>
                        <div>
                            <label>Nội dung</label>
                            <textarea style='width: 100%' rows="5" name='content'></textarea>
                        </div>
                        <button type='submit' class='button primary-button' style='margin-top: 8px'>Gửi yêu cầu</button>
                    </form>
                </div>
            </div>
        </main>
    </body>
</html>


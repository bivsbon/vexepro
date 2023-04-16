<nav class="navbar">
    <a href="/vexepro" style="text-decoration: none; color: black" class="logo">
        <img src="/vexepro/app/assets/images/logo.png" alt="logo"/>
        VÉ XE PRO
    </a>
    <div class="navbar-left">
        <?php
        if (array_key_exists('adminObj', $_SESSION)) {

            print("<a class='button' href='/vexepro/manage/customer'>Người dùng</a>
                    <a class='button' href='/vexepro/manage/agency'>Nhà xe</a>
                    <a class='button' href='/vexepro/vehicle/manage'>Xe</a>
                    <a class='button' href='/vexepro/manage/ticket'>Vé</a>
                    <a class='button' href='/vexepro/manage/trip'>Chuyến</a>

                    <a class='button' href='/vexepro/user/logout'>Đăng xuất</a>
                    ");
        }
        else {
            print('<a class="button primary-button" href="/vexepro/app/views/Login.php">Đăng nhập</a>
                <a class="button secondary-button" href="/vexepro/app/views/Register.php">Đăng ký</a>');
        }
        ?>
    </div>
</nav>
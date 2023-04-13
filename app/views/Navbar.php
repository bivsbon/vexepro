<nav class="navbar">
    <a href="/vexepro" style="text-decoration: none; color: black" class="logo">
        <img src="/vexepro/app/assets/images/logo.png" alt="logo"/>
        VÉ XE PRO
    </a>
    <div class="navbar-left">
        <?php
        if (!array_key_exists('userObj', $_SESSION)) {
            print('<a class="button primary-button" href="/vexepro/app/views/Login.php">Đăng nhập</a>
                <a class="button secondary-button" href="/vexepro/app/views/Register.php">Đăng ký</a>');
        } else {
            print("<a class='button' href='/vexepro/home/me'>Tôi</a>
                    <div class='button'>Mã giảm giá</div>
                    <div class='button'>Liên hệ</div>
                    ");
        }
        ?>
    </div>
</nav>
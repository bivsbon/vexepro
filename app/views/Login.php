<html>
    <head>
        <title> Đăng nhập </title>
        <link rel="stylesheet" href="./Login.css"/>
    </head>
    <body>
        <div class="container">
            <div class="login-wrapper container">
                <div>
                    <div class="brand-name">Vé Xe Pro</div>
                    <img src="../assets/images/logo.png" alt="logo" class="logo"/>
                </div>

                <form action="/vexepro/user/userlogin" method="POST" class="form">
                    <label>Tên người dùng</label>
                    <input name="username" placeholder="Nhập tên người dùng" class="form-item"/>
                    <label>Mật khẩu</label>
                    <input name="password" placeholder="Nhập mật khẩu" type="password" class="form-item"/>
                    <button type="submit" class="primary-button">Đăng nhập</button>
                    <button class=""> Đăng ký </button>
                </form>
            </div>
        </div>
    </body>
</html>

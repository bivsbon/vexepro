<html>
    <head>
        <title> Đăng ký </title>
        <link rel="stylesheet" href="/vexepro/app/views/Login.css"/>
    </head>
    <body>
        <div class="container">
            <div class="login-wrapper">
                <div>
                    <div class="brand-name">Vé Xe Pro</div>
                    <img src="../assets/images/logo.png" alt="logo" class="logo"/>
                </div>
                <form action="/vexepro/user/signup" method="POST" class="form">
                    <label>Tên người dùng</label>
                    <input name="username" placeholder="Nhập tên người dùng" class="form-item"/>
                    <label> Họ và tên</label>
                    <input name="name" placeholder="Nhập họ và tên" class="form-item"/>
                    <label> Ngày sinh</label>
                    <input name="age" placeholder=" Ngày sinh" class="form-item"/>
                    <label> Địa chỉ</label>
                    <input name="address" placeholder=" Địa chỉ" class="form-item"/>
                    <label> Số điện thoại</label>
                    <input name="phone" placeholder=" Số điện thoại" class="form-item"/>
                    <label>Mật khẩu</label>
                    <input name="password" placeholder="Nhập mật khẩu" type="password" class="form-item"/>
                    <button class="primary-button button">Đăng ký</button>
                    <a role="button" style="border: 1px solid rgba(0,0,0,0.15); color: black; text-decoration: none; padding: 4px 8px; display:flex; align-items: center; justify-content: center; border-radius: 8px;" href="/vexepro/app/views/Login.php"> Đăng nhập </a>
                </form>
            </div>
        </div>
    </body>
</html>
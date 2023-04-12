<html>
<head>
<title> Đăng ký </title>
<link rel="stylesheet" href="./Login.css"/>
</head>
<body>
<div class="container">
<div class="login-wrapper container">
<div>
<div class="brand-name">Vé Xe Pro</div>
<img src="../assets/images/logo.png" alt="logo" class="logo"/>
</div>
<form action="/login" method="POST" class="form">
<label>Tên người dùng</label>
<input name="username" placeholder="Nhập tên người dùng" class="form-item"/>
<label> Họ và tên</label>
<input name="fullname" placeholder="Nhập họ và tên" class="form-item"/>
<label> Ngày sinh</label>
<input name="age" placeholder=" Ngày sinh" class="form-item"/>
<label> Địa chỉ</label>
<input name="address" placeholder=" Địa chỉ" class="form-item"/>
<label> Số điện thoại</label>
<input name="phone" placeholder=" Số điện thoại" class="form-item"/>
<label>Mật khẩu</label>
<input name="passoword" placeholder="Nhập mật khẩu" type="password" class="form-item"/>
<button class="primary-button">Đăng ký</button>
<button>Đăng nhập</button>
</div>
</form>
</div>
</body>
</html>

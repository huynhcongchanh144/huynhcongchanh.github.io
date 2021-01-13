<?php
	session_start();
	include('./Connect/connect.php');
	
	$_SESSION["url"] = $_SERVER['REQUEST_URI'];
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/login-admin.css">
  </head>
  <body>
    <div class="main">
      <form action="./php/xuly-login-admin.php" method="POST" class="form" id="form-1">
        <h3 class="heading">Welcome</h3>
        <h4 class="heading-4">PLEASE LOGIN TO ADMIN DASBOARD</h4>
    
        <div class="spacer"></div>

        <div class="form-group">
          <label for="username" class="form-label">Tên tài khoản</label>
          <input id="username" name="username" type="text" placeholder="Tài khoản tối thiểu 8 ký tự" class="form-control">
          <span class="form-message"></span>
        </div>
    
        <div class="form-group">
          <label for="password" class="form-label">Mật khẩu</label>
          <input id="password" name="password" type="password" placeholder="Mật khẩu tối thiểu 6 ký tự" class="form-control">
          <span class="form-message"></span>
        </div>

        <button class="form-submit">Đăng nhập</button>
      </form>
    
    </div>
    
    <script src="validation.js"></script>
    <script>
      Validator({
        form:'#form-1',
        errorSelector: '.form-message', 
        rules:[
          Validator.checkRuleUsername('#username', 8),
          Validator.minLength('#password', 6),
        ]
      })
    </script>
  </body>
</html>

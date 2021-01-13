<?php 
  include('./Connect/connect.php')
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/signup.css">
  </head>
  <body>
    <div class="interface-decoration">
      <div class="interface-decoration-1">
        <h1 class="heading-1">Tạo tài khoản</h1>
        <p class="paragraph">Tạo tài khoản để theo dõi đơn hàng, lưu
          danh <br> sách sản phẩm yêu thích, nhận
          nhiều ưu đãi hấp dẫn.</p>
        <img class="image" src="images/signup.PNG" alt="get">
      </div>
      <div class="main">
        <form action="./php/xuly-signup.php" method="POST" class="form" id="form-1">
          <h3 class="heading">Tạo tài khoản</h3>
      
          <div class="spacer"></div>
      
          <div class="form-group">
            <label for="fullname" class="form-label">Tên đầy đủ</label>
            <input id="fullname" name="fullname" type="text" placeholder="VD: Nguyễn Văn A" class="form-control">
            <span class="form-message"></span>
          </div>
  
          <div class="form-group">
            <label for="address" class="form-label">Địa chỉ</label>
            <input id="address" name="address" type="text" placeholder="VD: 227 Nguyễn Văn Cừ" class="form-control">
            <span class="form-message"></span>
          </div>
  
          <div class="form-group">
            <label for="birthday" class="form-label">Ngày sinh</label>
            <input id="birthday" name="birthday" type="date" class="form-control">
            <span class="form-message"></span>
          </div>
  
          <div class="form-group">
            <label for="username" class="form-label">Tên tài khoản</label>
            <input id="username" name="username" type="text" placeholder="VD: khtn2021" class="form-control">
            <span class="form-message"></span>
          </div>
      
          <div class="form-group">
            <label for="password" class="form-label">Mật khẩu</label>
            <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control">
            <span class="form-message"></span>
          </div>
      
          <div class="form-group">
            <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
            <input id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu" type="password" class="form-control">
            <span class="form-message"></span>
          </div>
  
          <button class="form-submit">Đăng ký</button>
        </form>
      
      </div>
    </div>
    
    <script src="validation.js"></script>
    <script>
      Validator({
        form:'#form-1',
        errorSelector: '.form-message', 
        rules:[
          Validator.checkRuleRequired('#fullname'),
          Validator.checkRuleEmail('#email'),
          Validator.checkRuleUsername('#username', 8),
          Validator.minLength('#password', 6),
          Validator.checkRuleRequired('#birthday'),
          Validator.checkRuleRequired('#address'),
          Validator.confirmedPassword('#password_confirmation',()=>{
            return document.querySelector('#form-1 #password').value;
          })
        ],
        onSubmit: (data)=>{
          console.log(data)
        }
      })
    </script>
  </body>
</html>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/login.css">
  </head>
  <body>
    <div class="interface-decoration">
      <div class="interface-decoration-1">
        <h1 class="heading-1">Đăng nhập</h1>
        <p class="paragraph">Đăng nhập để theo dõi đơn hàng, lưu
          danh <br> sách sản phẩm yêu thích, nhận
          nhiều ưu đãi hấp dẫn.</p>
        <img class="image" src="images/signup.PNG" alt="get">
      </div>
      <div class="main">
        <form action="" method="POST" class="form" id="form-1">
          <h3 class="heading">Đăng nhập</h3>
      
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

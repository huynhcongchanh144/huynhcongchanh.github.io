<?php
 
 // Nếu không phải là sự kiện đăng ký thì không xử lý
 if (!isset($_POST['username'])){
     die('');
 }
  
 //Nhúng file kết nối với database

       
 //Khai báo utf-8 để hiển thị được tiếng việt
 header('Content-Type: text/html; charset=UTF-8');
       
 //Lấy dữ liệu từ file dangky.php
 $username   =  addslashes($_POST['username']);
 $password   =  addslashes($_POST['password']);
 $fullname  =   addslashes($_POST['fullname']);
 $location  =   addslashes($_POST['address']);
 $birthday  =   date('Y-m-d', strtotime($_POST['birthday']));
 $con= mysqli_connect('localhost','root','18600332','ustora');
 mysqli_set_charset($con, 'UTF8');
       
 //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
 if (!$username || !$password || !$fullname || !$location || !$birthday)
 {
     echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
     exit;
 }

 if($username=='admin'){
     echo "Tên tài khoản không chứa từ 'admin' !";
     exit;
 }
       
     // Mã khóa mật khẩu
     $password = md5($password);
       
 //Kiểm tra tên đăng nhập này đã có người dùng chưa
 if (mysqli_num_rows(mysqli_query($con,"SELECT 'username' FROM user WHERE 'username'='$username'")) > 0){
     echo "Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
     exit;
 }
 
 $id=1;
 $permiss="user";
       
 //Lưu thông tin thành viên vào bảng
 @$addmember = mysqli_query($con,"
     INSERT INTO user (
         id,
         username,
         password,
         name,
         birthday,
         address,
         permission
     )
     VALUE (
         '{$id}',
         '{$username}',
         '{$password}',
         '{$fullname}',
         '{$birthday}',
         '{$location}',
         '{$permiss}'
     )
 ");
                       
 //Thông báo quá trình lưu
 if ($addmember)
     {echo "Quá trình đăng ký thành công. <a href='../index.php'>Về trang chủ</a>";
     $id=$id+1;}
 else
     echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='../login.php'>Thử lại</a>";
?>
<?php
        
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "myblog";
  
  if(isset($_POST['re_password']))
  {
  $user_name = $_POST['user_name'];
  $password = $_POST['password'];
  $new_pass=$_POST['new_pass'];
  $re_pass=$_POST['re_pass'];
  $chg_pwd=mysql_query("select * from users where id='1'");
  $chg_pwd1=mysql_fetch_array($chg_pwd);
  $data_pwd=$chg_pwd1['password'];
  if($data_pwd==$Password){
  if($new_pass==$re_pass){
    $update_pwd=mysql_query("update users set password='$new_pass' where id='1'");
    print "<script>alert('Update Sucessfully')</script>";
     header("Location: login.php");
     die;
  }
  else{
    print "<script>alert('Your new and Retype Password is not match'); window.location='localhost/myself/homepage.html'</script>";
  }

  }
  else
  {
  print "<script>alert('Your old password is wrong'); window.location='localhost/myself/homepage.html'</script>";
  }}
?>
z
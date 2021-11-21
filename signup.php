<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			print "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	
	    *{
  margin: 0;
  padding: 0;
  user-select:none;
}

body{
  background: #e9eaea;
  font-family:'Roboto', sans-serif;
}

.container{
  width: 450px;
  margin: 30px auto;
}

.signup {
  width: 50%;
  background: #fff;
  float: none;
  height: 60px;
  line-height: 60px;
  text-align: center;
  cursor: pointer;
  text-transform: uppercase;
}

.signup-form{
  background: #fff;
  padding: 40px;
  clear: both;
  width: 100%;
  box-sizing: border-box;
  height: 450px;
}

.input{
  width: 100%;
  padding: 20px;
  box-sizing: border-box;
  margin-bottom: 25px;
  border: 2px solid #e9eaea;
  color: #3e3e40;
  font-size: 14px;
  outline: none;
  transform: all 0.5s ease;
}

.input:focus{
  border: 2px solid #34b3a0;
}

span a{
  text-decoration: none;
  color: blueviolet;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  height: 60px;
  letter-spacing: 1px
  
}

button:hover {
  opacity: 0.8;
}

</style>

</head>
<body>

  <div class="container">

    <div class="signup">Sign Up</div>
<form  method="post">

    <div class="signup-form">
      <input type="text" placeholder="New Name " class="input" name= "user_name" required><br />
      <input type="password" placeholder="New Password" class="input" name="password" required><br />
       <button type="submit">Create account</button>
      <span><a href="login.php">Click to Log in</a></span>
    </div>
  </div>
    

</form>
</body>
</html>
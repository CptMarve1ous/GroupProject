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

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: homepage.html");
						die;
					}
				}
			}
			
			print "wrong username or password!";
		}else
		{
			print "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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

.login {
  width: 50%;
  background: #fff;
  float: right;
  height: 60px;
  line-height: 60px;
  text-align: center;
  cursor: pointer;
  text-transform: uppercase;
}

.login-form{
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

    <div class="login">Login</div>
<form  method="post">

    <div class="login-form">
      <input type="text" placeholder="User name " class="input" name= "user_name" required><br />
      <input type="password" placeholder="User Password" class="input" name="password" required><br />
       <button type="submit">Login</button>
       <span><a href="signup.php">Click to Signup</a></span>
    </div>
  </div>
    

</form>
</body>
</html>


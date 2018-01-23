<?php
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Registration Page</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body style="background-color:#bdc3c7">
		<div id="main-wrapper">
			<center>
				<h2>Registration Form</h2>
				<img src="images/avatar.png" class="avatar"/>
			</center>
			<form class="myform" action="register.php" method="post">
				<label><b>Username</b></label><br>
				<input name="username" type="text" class="inputvalues" placeholder="Type Your Username..." required/><br>
				<label><b>Email Id</b></label><br>
				<input name="email" type="email" class="inputvalues" placeholder="Type Your Email-id..." required/><br>
				<label><b>Linkedin</b></label><br>
				<input name="linkedin" type="linkedin" class="inputvalues" placeholder="Type Your linkedin_id..." required/><br>
				<label><b>Password</b></label><br>
				<input name="password" type="password" class="inputvalues" placeholder="Type Your Password..." required/><br>
				<label><b>Confirm Password</b></label><br>
				<input name="cpassword" type="password" class="inputvalues" placeholder="Retype Your Password..." required/><br>
				<input name="submit_btn" type="submit" id="signup_btn" value="Sign Up"/><br>
				<a href="index.php"><input type="button" id="back_btn" value="Back"/></a>	
			</form>
			<?php
				if(isset($_POST['submit_btn']))
				{
					//echo '<script type="text/javascript"> alert("signup button clicked") </script>';
					$username = $_POST['username'];
					$email = $_POST['email'];
					$linkedin = $_POST['linkedin'];
					$password = $_POST['password'];
					$cpassword = $_POST['cpassword'];
					if($password == $cpassword)
					{
						$query = "select * from user WHERE username ='$username' ";
						$query_run = mysqli_query($con,$query);
						if(mysqli_num_rows($query_run) > 0)
						{
							//there is already exist this username
							echo '<script type="text/javascript"> alert("User already exists... try another Username") </script>';
							
						}
						else
						{
							$query = "insert into user values('$username','$email','$linkedin','$password')";
							$query_run = mysqli_query($con,$query);
							if($query_run)
							{
								echo '<script type="text/javascript"> alert("User Registered... Go to login") </script>';
							}
							else
							{
								echo '<script type="text/javascript"> alert("error occurs!...") </script>';
							}
						}
					}
					else
					{
						echo '<script type="text/javascript"> alert("Password and Confirm Password does not match!...") </script>';
					}
				}
			?>
		</div>
	</body>
</html>

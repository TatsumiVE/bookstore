<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>RegistrationForm_v1 by Colorlib</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="login/style.css">
	</head>

	<body>

		<div class="wrapper" style="background-image: url('images/bg-registration-form-1.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="images/registration-form-1.jpg" alt="">
				</div>
				<form action="register.php" method="post">
					<h3>Registration Form</h3>
					<?php
					if( isset($_GET['login']) and $_GET['login'] == "failed"): ?>
  <div>Register Failed</div>
<?php endif; 
?>
				<div class="form-wrapper">
						<input type="text" placeholder="Username" class="form-control" name="name">
						<i class="zmdi zmdi-account"></i>
					</div>
					
					<div class="form-wrapper">
						<input type="text" placeholder="Email" class="form-control" name="email">
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Address" class="form-control" name="address">
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Phone Number" class="form-control" name="phone">
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-wrapper">
						<select name="choice" id="" class="form-control">
							<option value="" disabled selected>Gender</option>
							<option value="male">Male</option>
							<option value="femal">Female</option>
							<option value="other">Other</option>
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Password" class="form-control" name="password">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Confirm Password" class="form-control" name="confirm">
						<i class="zmdi zmdi-lock"></i>
					</div>
					
					<input type="submit" name="" class="but" value="Register" width=500px>
						<i class="zmdi zmdi-arrow-right"></i>
					
		
				</form>
			</div>
		</div>
		
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
<?php 
	session_start();
	$e_error="";
	$p_error="";
	if(isset($_SESSION['email_error'] )){ 
		$e_error=$_SESSION['email_error'];
		unset($_SESSION['email_error']);
	} 
	if(isset($_SESSION['password_error'])){
		$p_error=$_SESSION['password_error'];	
		unset($_SESSION['password_error']);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>ks Academy</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	<link rel="stylesheet" type="text/css" href="css/form.css">
	<link href="css/form.css?v=<?php echo time();?>" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="login">
			<div class="form">
				<form action="registration.php" method="post" class="form-cont" >
					<a href="index.php"><i class="fas fa-times"></i></a>
					<h2>Sign up</h2><br>
					<label>Name</label><br>
					<input type="text" name="name" required><br>
					<label> Email</label><br>
					<input type="email" name="username" required><br>
					<span><?php echo $e_error; ?></span><br>
					<label>Password</label><br>
					<input type="password" name="password" required><br>
					<label>Confirm Password</label><br>
					<input type="password" name="confirm_password" required><br>
					<p><?php echo $p_error; ?></p><br>
					<button type="submit">Sign up</button><br>
					<label class="account" ><a  href="login.php">Login</a></label>
				</form>
			</div>	
		</div>

	</div>
</body>
</html>

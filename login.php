<?php
	session_start(); 
	$error="";
	if(isset($_SESSION['error'])){
		$error=$_SESSION['error'];
		unset($_SESSION['error']);
	}	
?>

<!DOCTYPE html>
<html>
<head>
	<title>ks Academy</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	<link href="css/form.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="login" >
			<div class="form">
				<form action="validation.php" method="post" class="form-cont" >
					<a href="index.php"><i class="fas fa-times"></i></a>	
					<h2>Login</h2><br>
					<span style="margin-left: 120px;"><?php echo $error; ?></span><br>
					<label>Username or email</label><br>
					<input type="text" name="email" required><br>
					<label>Password</label><br>
					<input type="password" name="password" required><br>
					<input type="checkbox"name="remember">
					<label  style="font-size: 20px; ">  Remember me</label>
					<label class="pasward"><a href="password.php">Forgot Password</a></label>
					<button type="submit">Login</button><br>
					<label class="account" ><a  href="signup.php">Create Accont</a></label>
				</form>
			</div>	
		</div>

	</div>
</body>
</html>

<?php  
	session_start();

	include('connection.php');

	$error="";
	if(isset($_SESSION['error'])){
		$error=$_SESSION['error'];
		unset($_SESSION['error']);

	}
	if(isset($_GET['key'])){
		$user=base64_decode($_GET['key']);
	}
?>

<!DOCTYPE html>
<html>
<head >
	<title>KS Academy</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	<link href="css/password.css?v=<?php echo time();?>" rel="stylesheet" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="class" >
		<form class="form" method="post" enctype="multipart/form-data" action=""> 
			<a href="login.php"><i class="fas fa-times"></i></a>	
			<h2>Change Password</h2><br>
			<span><?php echo $error;  ?></span><br>		
			<label>Enter New Password</label><br>
			<input type="password" name="password"><br>
			<label>Confirm New Password</label><br>
			<input type="password" name="con_password"><br>
			<input type="submit" name="submit" value="Change Password"><br>
		</form>
	</div>
</body>
</html>

<?php 
	if(isset($_REQUEST['submit'])){
		
		$password=$_POST['password'];
		$con_password=$_POST['con_password'];


		if($password==$con_password){

			$error=0;

			$number    = preg_match('@[0-9]@', $password);
			$specialChars = preg_match('@[^\w]@', $password);
			if(strlen($password) < 8){
				$_SESSION['error']="Password should be at least 8 characters";
				$error=1;
			}
			else if(!$number || !$specialChars) {
            	$_SESSION['error']= 'Password must Contain at least 1 number and 1 special character.';
	            $error=1;
			}

			if($error==0){
				$pass=md5($password);

				$query="UPDATE register SET Password='$pass' WHERE Email='$user' ";
				mysqli_query($conn, $query);

				$_SESSION['username']=$user;
				$_SESSION['password']=$password;
				header('location:index.php');
			}
			else{
				header('location:change_password.php');
			}

		}
		else{
			$_SESSION['error']="Password do not match";
			header('location:change_password.php');
		}
		
	}
?>
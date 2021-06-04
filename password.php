<?php  
	
	include('connection.php');

?>

<!DOCTYPE html>
<html>
<head lang="en">
	<title>KS Academy</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	<link rel="stylesheet" type="text/css" href="css/upload_file.css">
	<link href="css/password.css?v=<?php echo time();?>" rel="stylesheet" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="class container-fluid" id="class">
		<form class="form" method="post" enctype="multipart/form-data" action=""> 
			<a href="login.php"><i class="fas fa-times"></i></a>	
			<h2>Forgot Password</h2><br>
			<label>Enter your email or username</label><br>
			<input type="email" name="email"><br>
			<input type="submit" name="submit" value="continue"><br>
		</form>
	</div>

	<div class="head " id="sent" style="display: none;">
			<h3>We have send you a link to the given email address. Please check your email</h3>
		</div>
	<div class="icon " id="icon" style="display: none;">
		<i class="far fa-envelope"></i>
	</div>
</body>
</html>

<?php 
	
	if(isset($_REQUEST['submit'])){

		
		$key=base64_encode($_POST['email']);

		$to=$_POST['email'];
		$subject="Change Password";
		$message="<a href='http://localhost/KS_Academy/change_password.php?key=".$key."'>click here to change password</a>";
		$headers="KS Academy";
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		mail($to, $subject, $message, $headers);
		echo "<script type='text/javascript'>
				var x=document.getElementById('class');
				x.style.display='none';
				var y=document.getElementById('sent');
				y.style.display='flex';
				var z=document.getElementById('icon');
				z.style.display='flex';
			</script>";
	}
?>
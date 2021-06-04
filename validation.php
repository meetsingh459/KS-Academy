<?php
	
	session_start();
	include('connection.php');

	$_SESSION['error']=NULL;
	
	$url="index.php";

	if (isset($_SESSION['url'])) {
		
		$url=$_SESSION['url'];
		unset($_SESSION['url']);
	}

	
	//variable declaration
	$email=mysqli_real_escape_string($conn, $_POST['email']);
	$password=mysqli_real_escape_string($conn, $_POST['password']);
	$password=md5($password);

	if($email='Ks_Academy@admin' AND $password='KS@12345'){

		if($_POST['remember']=='1' or $_POST['remember']=='on'){
			setcookie('username', $email, time()+3600*24*30);
			setcookie('password', $password, time()+3600*24*30);
		}

		else{
			$_SESSION['username']=$email;
			$_SESSION['password']=$password;
		}
		header('location:'.$url);
	}

	else{
		//user validation
		$query="SELECT * FROM register WHERE Email='$email' AND Password='$password' ";
		$result=mysqli_query($conn, $query);
		$num=mysqli_num_rows($result);

		if($num===1){
			if($_POST['remember']=='1' or $_POST['remember']=='on'){
				setcookie('username', $email, time()+3600*24*30);
				setcookie('password', $password, time()+3600*24*30);
			}

			else{
				$_SESSION['username']=$email;
				$_SESSION['password']=$password;
			}
			header('location:'.$url);
		}
		else{
			$_SESSION['error']="Invalid username and password";
			header('location:login.php');
		}
	}
	
?>
<?php

	//session and its variable declaration
	session_start();
	//database connection 

	include('connection.php');

	//registrtion variable
	$name=mysqli_real_escape_string($conn, $_POST['name']);
	$email=mysqli_real_escape_string($conn, $_POST['username']);
	$password=mysqli_real_escape_string($conn, $_POST['password']);
	$confirm_password=mysqli_real_escape_string($conn, $_POST['confirm_password']);

	//user validation

	$query="SELECT * FROM register WHERE Email='$email' LIMIT 1";
	$result=mysqli_query($conn, $query);
	$num=mysqli_num_rows($result);

	//form validation
	$error=0;
	if(!empty($num)){ $_SESSION['email_error']="Username already taken"; $error=1; }
	
	if($password!=$confirm_password){ 
		$_SESSION['password_error']="Enter password correctly"; 
		$error=1; 
	}
	else{
		$number    = preg_match('@[0-9]@', $password);
		$specialChars = preg_match('@[^\w]@', $password);
		if(strlen($password) < 8){
			$_SESSION['password_error']="Password should be at least 8 characters";
			$error=1;
		}
		else if(!$number || !$specialChars) {
            $_SESSION['password_error']= 'Password should include at least  one number and one special character.';
            $error=1;
		}
	}


	if($error===1 ){
		header('location:signup.php');
	}

	else{
		$pass=md5($password); //encrypted password
		$key=rand(10000,99999).base64_encode($email).rand(10000,99999); // Verification key
		$verified=0;
		// Email verofication code

		$to=$email;
		$subject="Email verification link";
		$message="<a href='http://localhost/KS_Academy/verify.php?key=$key'>click here to verify</a>";
		$headers="KS Academy";
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		$query="SELECT * FROM verified 	WHERE Username='$email'";
		$result=mysqli_query($conn, $query);
		$num=mysqli_num_rows($result);
		
		if(!empty($num)){
			
			$row=mysqli_fetch_array($result);
			$user=$row['Username'];
			$verify=$row['Verified'];
			
			if($verify==0){
				$query="UPDATE verified SET Link='$key' , Password='$pass' WHERE Username='$user' ";
				
				if(mail($to, $subject, $message, $headers)){
					
					mysqli_query($conn, $query);
					header('location: verification_page.php');	
				}
				else{
					echo " something went wrong";
				}
			}
			else{
				$_SESSION['email_error']="Username already taken";
				header('location:signup.php');
			}
		}
		else{
	
			$query="INSERT INTO verified(Name, Username, Password, Link, Verified) VALUES ('$name', '$email', '$pass', '$key', '$verified')";

			if(mail($to, $subject, $message, $headers)){
			
				mysqli_query($conn, $query);
				header('location: verification_page.php');
			}
			else{
				echo " something went wrong";
			}
		}
		
	}
?>

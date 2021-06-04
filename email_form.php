<?php  

	session_start();

	$url="index.php";
	if(isset($_SESSION['url'])){
		
		$url=$_SESSION['url'];
		unset($_SESSION['url']);
	}
	//condition to check if user submit the form or not
	if(isset($_POST['Send'])){

		//declaration of form variable
		$name=$_POST['name'];
		$email=$_POST['email'];
		$number=$_POST['number'];
		$msg=$_POST['msg'];

		//declaration of email variable
		$to='meetsingh459@gmail.com';
		$subject='KS Academy User feedback';
		$message="Name: ".$name."\n"."Contact Number: ".$number."\n"."Message: ".$msg;
		$header="From: ".$email;
		if(mail($to, $subject, $message, $header, $header)){
			$_SESSION['msg']=	"Message send succesfully";
		}	
		else{
			$_SESSION['msg']="Please try again";
		}
	}
	header('location:'.$url);
?>
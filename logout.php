<?php  
	session_start();

	$url="index.php";
	if(isset($_SESSION['url'])){
		$url=$_SESSION['url'];
		unset($_SESSION['url']);
	}

	setcookie('username', '', time()-3600);
	setcookie('password', '', time()-3600);
	session_unset();
	header('location:'.$url);
?>
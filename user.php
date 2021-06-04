<?php  
	session_start();

	include('connection.php');

	echo " <h2> Please Do Not Refreh This Page...... </h2>";

	$user=$_SESSION['username'];

	if( isset($_GET['id']) ){
		
		$encodedUserId = $_GET['id'];
		$Subject=substr($encodedUserId, 4, -5);
		//$Subject=base64_decode($sub);
		
		$query="SELECT * FROM notes WHERE Subject='$Subject'";
		$result=mysqli_query($conn, $query);
		$row=mysqli_fetch_array($result);
		
		$Subject = $row['Subject'];
		$Branch = $row['Branch'];
		$Year = $row['Year'];
		$Notes = $row['Notes'];

		$query="INSERT INTO my_notes (Subject, Branch, Year, User, Notes) VALUES ('$Subject', '$Branch', '$Year', '$user', '$Notes') ";
		mysqli_query($conn, $query);
		header('location:my_notes.php');
	}

	else{
		echo "Something Went wrong";
		//$sub=substr("ORDSYysr10098", 4, -5);
	}
?>
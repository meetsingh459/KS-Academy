<?php  
	
	include('connection.php');

	if( isset($_GET['key']) ){

		// Identify user ID and username
		$key= $_GET['key'];
		$user= base64_decode(substr($key, 5, -5));

		$query="SELECT * FROM register WHERE Email='$user' ";
		$result=mysqli_query($conn, $query);
		$num=mysqli_num_rows($result);

		if(!empty($num)){
			echo "<h3 style='margin-top:100px; text-align:center' > User Already register </h3>" ;
		}
		else{
			//Query to check user exist or not
			$query="SELECT * FROM verified WHERE Link='$key' AND Username='$user' ";
			$result=mysqli_query($conn, $query);
			$num=mysqli_num_rows($result);


			if(!empty($num)){

				$row=mysqli_fetch_array($result);

				$name=$row['Name'];
				$password=$row['Password'];

				//Query to register user  
				$query="INSERT INTO register (Name, Email, Password) VALUES ('$name', '$user', '$password')";
				mysqli_query($conn, $query);

				//Query to update user verification
				$verify=1;
				$query1="UPDATE verified SET Verified='$verify' WHERE Link='$key' ";
				mysqli_query($conn, $query1);			

				$_SESSION['username']=$user;
				header('location: index.php');
			}
			else{
				echo "<h3 style='margin-top:100px; text-align:center' > Something went wrong </h3>" ;
			}
		}		
	}
	else{
		echo "<h3 style='margin-top:100px; text-align:center' > Something went wrong </h3>" ;
	}	
?>
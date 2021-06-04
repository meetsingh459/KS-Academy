<?php 	
	
	include('connection.php');
  	include('sessions.php');
	session_start();

	// database connection
	include('connection.php');
	
	//condition to check of search bar
	if(isset($_POST['searchbar'])){
		
		//query  to found result
		$keyword=$_POST['searchbar'];
		$query="SELECT * FROM allnotes WHERE name LIKE '%$keyword' ";
		$result=mysqli_query($conn, $query);
		
		//check if result found or not
		if(mysqli_num_rows($result)===0){
			echo "Result not found";
		}

		else{
			$search="";
			//fetching data form found result
			while ($fetch=mysqli_fetch_assoc($result)) {
				$search=$fetch['name'];
				echo $search;
				echo "<br>";					
			}
		}
	}
?>
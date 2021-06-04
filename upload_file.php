<?php  
	include('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ks Academy</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	<link rel="stylesheet" type="text/css" href="css/upload_file.css">
	<link href="css/upload_file.css?v=<?php echo time();?>" rel="stylesheet" type="text/css" />
</head>
<body>
	<section class="file_upload-section">
			<div class="file_upload-block">
				<form class="upload_form"  method="post" enctype="multipart/form-data" action="" > 
					<p>Subject Name</p>
					<input type="text" name="subject" required>
					<p>Branch</p>
					<select name="branch" required>
						<option value="CSE">Computer Science</option>
						<option value="IT">Information Technology</option>
						<option value="ECE">Electronics and Communication Engineering</option>
						<option value="EEE">Electrical and Electronics Engineering</option>
					</select>
					<p>Year</p>
					<select name="year" required>
						<option value="first">First year</option>
						<option value="second">Second year</option>
						<option value="third">Third year</option>
						<option value="fourth">Fourth year</option>
					</select>
					<p>Price</p>
					<input type="text" name="price" required>
					<p>Upload file</p>
					<input type="file" name="file" accept=".pdf" required><br>
					<input type="submit" name="upload_form">
				</form>
			</div>
	</section>
</body>
</html>
<?php  
	//File Uploadation
	if(isset($_REQUEST['upload_form'])){
		
		//uploading file to upload directory
		$file=$_FILES['file'];
		move_uploaded_file($file["tmp_name"], "upload/".$file["name"]);

		// declaration of database variable
		$subject=$_POST['subject'];
		$branch=$_POST['branch'];
		$year=$_POST['year'];
		$price=$_POST['price'];
		$file_name=$file["name"];

		//inserting data into database
		$query="INSERT INTO notes(Subject, Branch, Year, Price, Notes) VALUES ('$subject', '$branch', '$year', '$price', '$file_name')";
		mysqli_query($conn, $query);
		header('location:notes.php');
	}
?>

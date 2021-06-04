<?php 
	session_start();

	include('connection.php');

	$msg="";

	if(isset($_SESSION['msg'])){
		$msg=$_SESSION['msg'];
		unset($_SESSION['msg']);
	}

	$_SESSION['url']="my_notes.php";

	if(isset($_SESSION['username'])){
		$user=$_SESSION['username'];
	}
	else{
		header('location:login.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ks Academy</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	<link href="css/my_notes.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
</head>
<body>

	<header>
		<nav>
			<input type="checkbox" id="check">
			<img class="logo" src="images/logo.png">
			<form method="post" action="notes.php">
				<input type="search" name="searchbar">
				<button type="submit" ><i class="fas fa-search"></i></button>	
			</form>
			<label for="check"  class="checkbtn" >
				<i class="fa fa-bars"></i>
			</label>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li class="drop-btn">
					<a href="#" ><i class="fas fa-caret-down"></i>Notes</a>
					<ul  class="drop-cont">
						<li><a href="notes.php?id=1">First Year</a></li>
						<li><a href="notes.php?id=2">Second Year</a></li>
						<li><a href="notes.php?id=3">Third Year</a></li>
						<li><a href="notes.php?id=4">Fourth Year</a></li>
					</ul>
				</li>
				<li><a href="my_notes.php"><i class="far fa-heart"></i>My Notes</a></li>
				<li><a href="login.php"  id="login" style="background-color: red; display: inline;" >Login</a></li>
				<li>
					<a href="logout.php" id="logout" onclick="log()"  style="background-color: red; display: none;" >Logout</a>
				</li>
			</ul>

		</nav>
	</header>
	<?php 
		
		if($user==NULL){
			echo"<script type='text/javascript'>
				var x=document.getElementById('logout');
				var y=document.getElementById('login');
				x.style.display='none';
				y.style.display='inline';
			</script>";
		}

		else{
			echo"<script type='text/javascript'>
				var x=document.getElementById('logout');
				var y=document.getElementById('login');
				x.style.display='inline';
				y.style.display='none';
			</script>";
		}	
	?>
		
	<section>
		<div class="notes">
			<table class="table">

				<col id="col1" >
				<col id="col2" >
				<col id="col3" >
				<col id="col4" >
				<col id="col5" >		
				<tr>
					<th>S No.</th>
					<th>Subject</th>
					<th>Branch</th>
					<th>Year</th>
					<th>Notes</th>
				</tr>
				<?php
					$query="SELECT * FROM my_notes WHERE User='$user'";
					$result=mysqli_query($conn, $query);

					if(!empty(mysqli_num_rows($result))){
						$num=1;
						while($row=mysqli_fetch_array($result)){
							echo"<tr>";
							echo"<td height='30'>".$num."</td>";
							echo"<td height='30'>".$row['Subject']."</td>";
							echo"<td height='30'>".$row['Branch']."</td>";
							echo"<td height='30'>".$row['Year']."</td>";
							echo"<td height='30'><a target='_blank' id='notes' href='upload/".$row['Notes']."'><i class='far fa-file-pdf'></i>PDF_File</a>"."</td>";
							echo"</tr>";	
							$num++;
						}
					}
				?>
			</table>
		</div>
	</section>
	<?php  
		if(empty(mysqli_num_rows($result))){
			echo "<section>
					<div class='my_notes'>
						<h2>NO NOTES FOUND</h2>
					</div>
				</section>";
		}
	?>

	<section  class="footer">
			<div class="footer_cont">
				<div class="foot-block">
					<h3>Contact us</h3>	
					<form action="email_form.php" method="post">
						<br>
						<p>Name</p>
						<input type="text" name="name" required>
						<p>Email</p>
						<input type="email" name="email" required>
						<p>Phone Number</p>
						<input type="tel" name="number" pattern="[0-9]{10}" required>
						<p>Message</p>
						<textarea name="msg" rows="4" cols="91" required></textarea><br>
						<input type="submit" name="Send"></ins>>
						<h3 id="send"><?php echo $msg;  ?></h3>
					</form>
				</div>
				
				<div class="foot-block">
					<img src="images/logo.png">
					<p><i class="fas fa-phone"></i>+91-9355192609</p>
					<p><i class="fas fa-envelope"></i>ksgill9999@gmail.com</p>
					<a href="about.php">About us</a><br>
					<a href="terms.php">Terms and conditions</a>	
				</div>
			</div>
	</section>
</body>
</html>
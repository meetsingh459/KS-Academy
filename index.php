<?php 
	session_start();
	$user=NULL;
	if(isset($_COOKIE['username']) and isset($_COOKIE['password'])){
		$_SESSION['username']=$_COOKIE['username'];
	}
	if(isset($_SESSION['username'])){
		$user=$_SESSION['username'];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>ks Academy</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	<link href="css/home.css?v=<?php echo time();?>" rel="stylesheet" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="header">
		<nav>
			<input type="checkbox" id="check">
			<label for="check"  class="checkbtn" >
				<i class="fa fa-bars"></i>
			</label>
			<img class="logo" src="images/logo.png">
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
		<div class="title">
			<h1>Ks Academy</h1><br>
		</div>
		<div class="search" >
			<form  action="notes.php" method="post"  >
				<input type="search" name="searchbar" >
				<button type="submit" ><i class="fas fa-search"></i></button>
			</form>
		</div>
		<div class="tut">
			<a href="https://www.youtube.com/channel/UC8ewIOzX7q4tJYcKkg1rAAg" target="_blank">Online Tutorials</a>
		</div>
		<div class="about">
			<a href="about.php">About us</a>
			<a href="terms.php">Terms and Conditions</a>
			
		</div>
	</div>
</body>
</html>


<?php
	session_start();
	
	$msg=NULL;
	$user=NULL;
	
	if(isset($_SESSION['msg'])){
		$msg=$_SESSION['msg'];
		$_SESSION['msg']="";
	}
	
	if(isset($_SESSION['username'])){
		$user=$_SESSION['username'];
	}

	$_SESSION['url']="terms.php";
?>

<!DOCTYPE html>
<html>
<head >
	<title>Ks Academy</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	<link href="css/terms_and_condition.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
		
	<section class="terms">
		<div class=" cond">
			<h2>TERMS AND CONDITIONS</h2>
			<p>
				Please read these Terms and Conditions, along with the Disclaimer and all other rules and policies made available or published on www.ksacademy.com as they shall govern your use of Ks Academy. By using or visiting Ks Academy website or any service provided to you on, from, or through Ks Academy , you signify your agreement to these “Terms and Conditions”, Ks Academy Disclaimer and any other terms that are updated from time to time. If you do not agree to any of these terms, please do not use Ks Academy.
			</p>			
		</div>
		<div class="cond ">
			<h3>ACCOUNTS</h3>
			<ul>
				<li>
					In order to access some of the features of Ks Academy , you may have to create your account with Ks Academy. You agree and confirm that you will never use another User’s account nor provide access to your account to any third-party.
				</li>
				<li>
					When creating your account, you confirm that the information provided is accurate and complete. Further, you agree that you are solely responsible for the activities that occur on your account, and you shall keep your account password secure and not share the same with anyone. You must notify Ks Academy immediately of any breach of security or unauthorized use of your account.
				</li>
				<li>
					At no point in time will Ks Academy be liable for any losses caused by any unauthorized use of your account, you shall solely be liable for the losses caused to Ks Academy or others due to such unauthorized use, if any.
				</li>
			</ul>
		</div>
		<div class="cond" >
			<h3>ACCESS, PERMISSIONS ,RESTRICTIONS AND TERMINATION</h3>
			<ul>
				<li>
					Ks Academy grants you (as a student) a limited, non-exclusive, non-transferable license to access and view the courses and associated content for which you have paid all required fees, solely for your personal, non- commercial, educational purposes through the Services, in accordance with these Terms and any conditions or restrictions associated with a particular courses or feature of our Services.
				</li>
				<li>
					All other uses are expressly prohibited. You may not reproduce, redistribute, transmit, assign, sell, broadcast, rent, share, lend, modify, adapt, edit, create derivative works of, sublicense, or otherwise transfer or use any course unless we give you explicit permission to do so in a written agreement signed by a Ks Academy authorized representative
				</li>
				<li>
					Ks Academy reserves the right to refuse access to Ks Academy , terminate Accounts, remove or edit content without any notice to You.
				</li>
			</ul>
		</div>
		<div class="cond">
			<h3>LINKS TO THIRD PARTY WEBSITE</h3>
			<ul>
				<li>
					Ks Academy may include or contain links to any third-party websites that may or may not be owned or controlled by Ks Academy.
				</li>
				<li>
					Ks Academy has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third-party websites. In addition, Ks Academy will not and cannot censor or edit the content of any third-party site.
				</li>
			</ul>
		</div>
		<div class="cond">
			<h3>STUDY MATERIAL</h3>
			<ul>
				<li>
					The Study Material provided on www.Ksacademy.com including notes, question papers, importance and other documents with embedded watermark is not free for lifetime. Informal Tuitions holds the right to anytime make these “Study Material “ payable without consent of any user at any point-of-time.
				</li>
				<li>
					Importance Provided by Ks Academy are based on previous year question papers and Calculated Prediction , hence there is no 100% surety of it coming in Exams.
				</li>
				<li>
					Studying from Ks Academy does not guarantee your passing, and it does not guarantee your marks in any context
				</li>
				<li>
					Ks Academy is not Responsible for KT , Drop or Semester Back
				</li>
			</ul>
		</div>
		<div class="cond">
			<h3>REFUNDS</h3>
			<ul>
				<li>
					Please check and verify the topics mentioned under the course index provided along with the description and the topics covered.
				</li>
				<li>
					No refunds is liable in the case of user(student or any other) denying the courses syllabus being out of their academic prospectus.
				</li>
			</ul>
		</div>
	</section>

		<footer class="footer">
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
						<input type="tel" name="number" pattern="[0-9]{10}">
						<p>Message</p>
						<textarea rows="4" cols="91"></textarea><br>
						<input type="submit" name="Send" value="send"><br>
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
		</footer>

</body>
</html>
<?php
   session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ebook Management System</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --> 
    <style type="text/css">
    	nav
		{
		    float: right;
		    word-spacing: 30px;
		    padding: 20px;
		}
		nav li
		{
		    display: inline-block;
		    line-height: 80px;
		}
    </style>
</head>
<body>
	<div class="wrapper">
		<header>
			<div class="logo">
				<img class="lg" src="images/b2.jpg" style="height: 120px; padding-left: 0px;">
			</div>
			<div style="width:600px; margin: 0px; float:left;">
			    <i><h1 style="color: white; padding-top: 50px;font-size: 35px;">Ebook Management System</h1></i>
			</div>
			<?php
			   if(isset($_SESSION['login_user'])) //if user is logged in then show navbar
			   {
			   	 ?>
			   	  <nav>
					<ul>
						<li><a href="index.php">HOME</a></li>
						<li><a href="books.php">BOOKS</a></li>
						<li><a href="logout.php">LOGOUT</a></li>
						<!-- // <li><a href="registration.php">REGISTRATION</a></li> -->
						<li><a href="feedback.php">FEEDBACK</a></li>
					</ul>
			     </nav>
			     <?php
			   }
			   else // if user is not logged in then show this navbar
			   {
			   	  ?>   
			   	       <nav>
							<ul>
								<li><a href="index.php">HOME</a></li>
								<!-- <li><a href="books.php">BOOKS</a></li> -->
								<li><a href="loginpage.php">ADMIN-LOGIN</a></li>
								<!-- <li><a href="feedback.php">FEEDBACK</a></li> -->
							</ul>
						</nav>
			   	  <?php
			   }
			?>
		</header>
		<section>
		    <br><br><br>
			<div class="box">
				<br><br><br><br>
				<h1 style="font-size: 30px;">Welcome to BOOKSPOT</h1><br><br><br>
				<p style="font-size: 30px;"><i>Your own in hand ebook store..... Just a click away :)</i></p>
	<!-- 			<h1 style="font-size: 25px;">Opens at 09:00AM</h1><br>
				<h1 style="font-size: 25px;">Closes at 06:00PM</h1><br>
 -->			</div>
		</section>
		<?php
	     include "footer.php";
	    ?>
	</div>
</body>
</html>
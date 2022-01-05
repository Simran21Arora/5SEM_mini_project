<?php
   include "connection.php";
   include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit Profile</title>
	<style type="text/css">
		.wrapper
		{
			width: 550px;
			height: 750px;
			margin: 0 auto;
			background-color: #f8eded;
			border-radius: 30px;
			margin-top: 30px;
		}
		.form-control
		{
			width:250px;
			height: 38px;
		}
		.form1
		{
			margin:0 150px;
			text-align: center;
		}

	</style>
</head>
<body style="background-color: #f4d9e5;">
	<div class="container">
		<div class="wrapper">
			<h3 style="text-align: center;">Edit Information</h3>

			<div class="profile_info" style="text-align: center;">
				<span>Welcome,</span>	
				<h4><?php echo $_SESSION['login_user']; ?></h4>
			</div><br>
			    <?php
						$sql = "SELECT * FROM student WHERE username='$_SESSION[login_user]'";
						$result = mysqli_query($db,$sql) or die (mysql_error());

						while ($row = mysqli_fetch_assoc($result)) 
						{
							$first=$row['first'];
							$last=$row['last'];
							$username=$row['username'];
							$password=$row['password'];
							$email=$row['email'];
							$contact=$row['contact'];
						}

			   ?>
			<div class="form1">
					<form action="" method="post" enctype="multipart/form-data">
					<input class="form-control" type="file" name="file">
					<label><h4>Name</h4></label>
					<input class="form-control" type="text" name="first" value="<?php echo $first;?>">
					<label><h4>Last</h4></label>
					<input class="form-control" type="text" name="last" value="<?php echo $last;?>">
					<label><h4>Username</h4></label>
					<input class="form-control" type="text" name="username" value="<?php echo $username;?>">
					<label><h4>Password</h4></label>
					<input class="form-control" type="text" name="password" value="<?php echo $password;?>">
					<label><h4>Email</h4></label>
					<input class="form-control" type="text" name="email" value="<?php echo $email;?>">
					<label><h4>Contact No</h4></label>
					<input class="form-control" type="text" name="contact" value="<?php echo $contact;?>"><br>
					<div style="padding-left: 0px;">
						<button class="btn btn-default" type="submit" name="submit">save</button></div>
				    </form>
               </div>

               <?php 

		if(isset($_POST['submit']))
		{
			move_uploaded_file($_FILES['file']['tmp_name'],"images/".$_FILES['file']['name']);
	      $first=$_POST['first'];
			$last=$_POST['last'];
			$username=$_POST['username'];
			$password=$_POST['password'];
			$email=$_POST['email'];
			$contact=$_POST['contact'];
			$pic=$_FILES['file']['name'];

			$sql1= "UPDATE student SET pic='$pic',first='$first',last='$last', username='$username', password='$password', email='$email', contact='$contact' WHERE username='".$_SESSION['login_user']."';";

			if(mysqli_query($db,$sql1))
			{
				?>
					<script type="text/javascript">
						alert("Saved Successfully.");
						window.location="profile.php";
					</script>
				<?php
			}
		}
 	?>
		</div>
	</div>
</body>
</html>
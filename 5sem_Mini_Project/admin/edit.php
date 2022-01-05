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
			<h2 style="text-align: center;">Edit Information</h2>

			<div class="profile_info" style="text-align: center;">
				<span>Welcome,</span>	
				<h4><?php echo $_SESSION['login_user']; ?></h4>
			</div><br><br>

			    <?php
						$sql = "SELECT * FROM admin WHERE username='$_SESSION[login_user]'";
						$result = mysqli_query($db,$sql) or die (mysql_error());

						while ($row = mysqli_fetch_assoc($result)) 
						{
							$name=$row['name'];
							$username=$row['username'];
							$password=$row['password'];
							$email=$row['email'];
							$contact=$row['phone'];
						}

			   ?>
			<div class="form1">
					<form action="" method="post" enctype="multipart/form-data">
					<input class="form-control" type="file" name="file">
					<label><h4>Name</h4></label>
					<input class="form-control" type="text" name="name" value="<?php echo $name;?>">
					<label><h4>Username</h4></label>
					<input class="form-control" type="text" name="username" value="<?php echo $username;?>">
					<label><h4>Password</h4></label>
					<input class="form-control" type="text" name="password" value="<?php echo $password;?>">
					<label><h4>Email</h4></label>
					<input class="form-control" type="text" name="email" value="<?php echo $email;?>">
					<label><h4>Contact No</h4></label>
					<input class="form-control" type="text" name="phone" value="<?php echo $contact;?>"><br>
					<div style="padding-left: 0px;">
						<button class="btn btn-default" type="submit" name="submit">save</button></div>
				    </form>
               </div>

               <?php 

		if(isset($_POST['submit']))
		{
			move_uploaded_file($_FILES['file']['tmp_name'],"images/".$_FILES['file']['name']);

			$name=$_POST['name'];
			$username=$_POST['username'];
			$password=$_POST['password'];
			$email=$_POST['email'];
			$contact=$_POST['phone'];
			$pic=$_FILES['file']['name'];

			$sql1= "UPDATE admin SET pic='$pic',name='$name', username='$username', password='$password', email='$email', phone='$contact' WHERE username='".$_SESSION['login_user']."';";

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
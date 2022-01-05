<?php
   include "connection.php";
   include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Profile</title>
	<style type="text/css">
		.wrapper
		{
			width: 550px;
			margin: 0 auto;
			background-color: #f8eded;
			border-radius: 30px;
			margin-top: 30px;
		}
	</style>
</head>
<body style="background-color: #f4d9e5;">
	<div class="container" >
		<div class="wrapper">
			<?php
			     if(isset($_POST['submit_b']))
			    {
			    	?>
			    	<script type="text/javascript">
			    		window.location="edit.php"
			    	</script>
			    	<?php
			    }
			    $q=mysqli_query($db,"select * from admin where username='$_SESSION[login_user]';");
			?>
			<h2 style="text-align: center;">My Profile</h2>
			<?php
			    $row=mysqli_fetch_assoc($q);

			    echo "<div style='text-align : center;'><img class='img-circle profile-img' height=250px width=250px src='images/".$_SESSION['picture']."'></div>";
			?>

			<div style="text-align: center; font-size: 20px;"> <b>Welcome, </b>
	 			<h4>
	 				<?php echo $_SESSION['login_user']; ?>
	 			</h4>
 			</div>

 			<?php
 				echo "<b>";
 				echo "<table class='table table-bordered'>";
	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b>Name: </b>";
	 					echo "</td>";

	 					echo "<td>";
	 						echo $row['name'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> User Name: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['username'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Password: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['password'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Email: </b>";	
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['email'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Contact: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['phone'];
	 					echo "</td>";
	 				echo "</tr>";

	 				
 				echo "</table>";
 				echo "</b>";
 			?>
      <form action="" method="post" style="margin-right:250px;">
			<button class="btn btn-default" style="float:right; width: 70px;" name="submit_b" type="submit">Edit</button>
		</form>

		</div>
	</div>
</body>
</html>
<?php
   include "connection.php";
   include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>

  <title>Student Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

</head>
<body>
<section style="margin-top: -20px;">
  <div class="log_img">
    <br> <br><br>
    <div class="box1">
      <br>
        <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;">Welcome to BookSpot</h1>
        <h1 style="text-align: center; font-size: 25px;">Admin Login Form</h1><br>
      <form name="login" action="" method="post">
        <div class="login">
          <input class="form-control" type="text" name="username" placeholder="Username" required=""> <br>
          <input class="form-control" type="password" name="password" placeholder="Password" required=""> <br>
          <input class="btn btn-default" type="submit" name="submit" value="Login" style="color: black; width: 80px; height: 30px;">
      </form>
      <p style="color: white; padding-left: 5px;">
        <br><br>
      </p>
    </div>
  </div>
</section>
<?php
    //if submit button is clicked
    if(isset($_POST['submit']))
    {
      $count=0;
      $res=mysqli_query($db,"select * from admin where username='$_POST[username]' && password='$_POST[password]'");
      $row=mysqli_fetch_assoc($res);
      //mysqli_num_rows() function will count how many rows are there in our result
      $count=mysqli_num_rows($res);

      if($count==0)
      {
        ?>

        <script type="text/javascript">
          alert("The username and password doesn't match")
        </script>
        <?php
      }
      else
      {
        $_SESSION['login_user']=$_POST['username'];
        $_SESSION['picture']=$row['pic'];
        ?>
           <script type="text/javascript">
             window.location="index.php"
           </script>
        <?php
      }
    }
?>
</body>
</html>
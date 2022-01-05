<?php
    include "connection.php";
   include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>

  <title>Student Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</head>
<body>
<section style="margin-top: -20px;">
  <div class="reg_img">
    <br><br>
    <div class="box2">
      <br>
        <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;">Welcome to BookSpot</h1>
        <h1 style="text-align: center; font-size: 25px;">User Registration Form</h1>
      <form name="Registration" action="" method="post">
        <div class="login">
          <input class="form-control" type="text" name="first" placeholder="First Name" required=""> <br>
          <input class="form-control" type="text" name="last" placeholder="Last Name" required=""> <br>
          <input class="form-control" type="text" name="username" placeholder="Username" required=""> <br>
          <input class="form-control" type="password" name="password" placeholder="Password" required=""> <br>
          <input class="form-control" type="text" name="roll" placeholder="Roll No" required=""><br>
          <input class="form-control" type="email" name="email" placeholder="Email" required=""><br>
          <input class="form-control" type="text" name="contact" placeholder="Phone No" required=""><br>
          <input class="btn btn-default" type="submit" name="submit" value="Sign Up" style="color: black; width: 80px; height: 30px;"></div>
      </form>
     
    </div>
  </div>
</section>

<?php
   //to check if submit button is pressed or not
   if(isset($_POST['submit']))
   {
      //to check that no two users should have same username
      $count=0;
      $sql="select username from student";
      $res=mysqli_query($db,$sql); //to store result of above ($sql) query

      // while loop and funtion inside it will be used to fetch username one by one
      while ($row=mysqli_fetch_assoc($res)) {
        if($row['username']==$_POST['username'])
        {
          $count=$count+1;
        }
      }

      //inserting values in student table for new user if no same username found.
      if($count==0) 
      {
      mysqli_query($db,"insert into `student` values('$_POST[first]','$_POST[last]','$_POST[username]','$_POST[password]','$_POST[roll]','$_POST[email]','$_POST[contact]');");
    ?>

    <script type="text/javascript">
      alert("Registration Successful");
    </script>
    <?php
      }
      else
      {
       ?>
        <script type="text/javascript">
          alert("The username already exists.");
        </script>
      <?php
     }
   }

?>
</body>

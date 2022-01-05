<?php
   include "connection.php";
   include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>Feedback</title>

   <link rel="stylesheet" type="text/css" href="style.css">                
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

   <style type="text/css">
      body
      {
         background-image: url("images/feed.jpg");
      }
      .feed
      {
         width: 900px;
         height: 500px;
         background-color: #f8eded;
         opacity: .8;
         color: black;
         padding: 10px;
         margin: 200px auto;
         text-align: center;
         border-radius: 40px;
      }
      .form-control
      {
         height: 100px;
         width: 60%;
         margin-left: 170px;
      }
      .btn
      {
         width: 100px;
         height: 35px;
      }
      .scroll
      {
         width: 100%;
         height: 270px;
         overflow: auto;
      }
   </style>
</head>
<body>
   <div class="feed">
      <i><h4>If You have any suggestions or questions please comment below.</h4></i>
      <form style="" action="" method="post">
         <input class="form-control" type="text" name="feedback" placeholder="Write your feedback here.."><br>
         <input class="btn btn-default" type="submit" name="submit" value="Feedback">
      </form>

   <br>
   <div class="scroll">
      <?php
         if(isset($_POST['submit']))
         {
            $sql="insert into comment values('','$_SESSION[login_user]','$_POST[feedback]');";
            if(mysqli_query($db,$sql))
            {
               $q="SELECT * FROM `comment` ORDER BY `comment`.`id` DESC";

               $res=mysqli_query($db,$q);

               echo "<table class='table table-bordered'>";

               while($row=mysqli_fetch_assoc($res))
               {
                  echo "<tr>";
                     echo "<td>"; echo $row['username']; echo "</td>";
                     echo "<td>"; echo $row['feedback']; echo "</td>";
                  echo "</tr>";
               }
               echo "</table>";
            }
            else
            {
               $q="SELECT * FROM `comment` ORDER BY `comment`.`id` DESC";

               $res=mysqli_query($db,$q);

               echo "<table class='table table-bordered'>";

               while($row=mysqli_fetch_assoc($res))
               {
                  echo "<tr>";
                     echo "<td>"; echo $row['username']; echo "</td>";
                     echo "<td>"; echo $row['feedback']; echo "</td>";
                  echo "</tr>";
               }
               echo "</table>";
            }
         }
      ?>
   </div>
</div>
</body>
</html>
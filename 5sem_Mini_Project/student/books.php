<?php
   include "connection.php";
   include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="css_files/display.css" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
   <title>Books</title>
   <style type="text/css">
      .srch
      {
         margin-left: -20px;
      }
      body {
          font-family: "Lato", sans-serif;
      }
      .sidenav {
        height: 100%;
        margin-top: 51px;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #222;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
      }

      .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 20px;
        color: #818181;
        display: block;
        transition: 0.3s;
      }

      .sidenav a:hover {
        color: #f1f1f1;
      }

      .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
      }

      #main {
        transition: margin-left .5s;
        padding: 16px;
      }

      @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
      }
   </style>
</head>
<body>
   <!-----------------------------Sidenav------------------------------------ -->
   <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div style="color: white; margin-left: 65px; font-size: 15px;">
       <?php
        if(isset($_SESSION['login_user']))
           {
             echo "<img class='img-circle profile_img' height=130 width=130 src='images/".$_SESSION['picture']."'>";
             echo "</br>";
             echo "</br>Welcome ".$_SESSION['login_user'];
            }
       ?>
   </div>
  <a href="profile.php">Profile</a>
  <a href="books.php">Books</a>
  <a href="edit.php">Edit Profile</a>
   </div>

   <div id="main">
     <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
   <script>
   function openNav() {
     document.getElementById("mySidenav").style.width = "250px";
     document.getElementById("main").style.marginLeft = "250px";
   }

   function closeNav() {
     document.getElementById("mySidenav").style.width = "0";
     document.getElementById("main").style.marginLeft= "0";
   }
   </script>
   <!-- ------------------------- Search Bar ------------------------------- -->
   <div class="srch">
      <form class="navbar-form" method="post" name="form1">
            <input class="form-control" type="text" name="search" placeholder="search books...." required="">
            <button style="background-color: #f0d3ef;" type="submit" name="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
      </form>
   </div>
   <!-- -------------------------------------------------------------------- -->

   <h2>List Of Books</h2>
   <?php

     if(isset($_POST['submit']))
     { 
        $q=mysqli_query($db,"select * from books where name like '%$_POST[search]%'"); // query to check if any available books row are matching the input provided by user.to check if any row matches to data or not
        // if num of rows matched is 0 then no data found.
        if(mysqli_num_rows($q)==0)
        {
           echo "Sorry! No books found.";
        }
        else
        {
               echo "<table class='table table-bordered table-hover'>";
             //Table header
                echo "<tr style='background-color: #f0d3ef;'>";
                echo "<th>"; echo "Book ID"; echo "</th>"; 
                echo "<th>"; echo "Book"; echo "</th>";
                echo "<th>"; echo "Book Name"; echo "</th>"; 
                echo "<th>"; echo "Authors Name"; echo "</th>"; 
                echo "<th>"; echo "Edition"; echo "</th>"; 
                echo "<th>"; echo "Status"; echo "</th>"; 
                echo "<th>"; echo "Quantity"; echo "</th>"; 
                echo "<th>"; echo "Department"; echo "</th>";
                echo "<th>"; echo "Read"; echo "</th>";
             echo "</tr>";

             while($row=mysqli_fetch_assoc($q)) //to fetch all rows from table
             {
               echo "<tr>";
                  echo "<td>"; echo $row['bid']; echo "</td>";
                  echo "<td>"; ?> <img src="<?php echo $row['bookpic']; ?>" width="100px" height="130px">; <?php echo"</td>";
                  echo "<td>"; echo $row['name']; echo "</td>";
                  echo "<td>"; echo $row['authors']; echo "</td>";
                  echo "<td>"; echo $row['edition']; echo "</td>";
                  echo "<td>"; echo $row['status']; echo "</td>";
                  echo "<td>"; echo $row['quantity']; echo "</td>";
                  echo "<td>"; echo $row['department']; echo "</td>";
                  echo"<td>"; echo "<a href='".$row['link']."'>READ</a>"; echo"</td>";
               echo "</tr>";
             }

             echo "</table>";
        }
     }

     else
     {
        $res=mysqli_query($db,"select * from `books`;");

          echo "<table class='table table-bordered table-hover'>";
          //Table header
          echo "<tr style='background-color: #f0d3ef;'>";
             echo "<th>"; echo "Book ID"; echo "</th>"; 
             echo "<th>"; echo "Book"; echo "</th>";
             echo "<th>"; echo "Book Name"; echo "</th>"; 
             echo "<th>"; echo "Authors Name"; echo "</th>"; 
             echo "<th>"; echo "Edition"; echo "</th>"; 
             echo "<th>"; echo "Status"; echo "</th>"; 
             echo "<th>"; echo "Quantity"; echo "</th>"; 
             echo "<th>"; echo "Department"; echo "</th>";
             echo "<th>"; echo "Read"; echo "</th>";
          echo "</tr>";

          while($row=mysqli_fetch_assoc($res)) //to fetch all rows from table
          {
            echo "<tr>";
               echo "<td>"; echo $row['bid']; echo "</td>";
               echo "<td>"; ?> <img src="<?php echo $row['bookpic']; ?>" width="100px" height="130px"> <?php echo "</td>";
               echo "<td>"; echo $row['name']; echo "</td>";
               echo "<td>"; echo $row['authors']; echo "</td>";
               echo "<td>"; echo $row['edition']; echo "</td>";
               echo "<td>"; echo $row['status']; echo "</td>";
               echo "<td>"; echo $row['quantity']; echo "</td>";
               echo "<td>"; echo $row['department']; echo "</td>";
               echo"<td>"; echo "<a href='".$row['link']."'>READ</a>"; echo"</td>";
            echo "</tr>";
          }

          echo "</table>";
      }
   ?>
</body>
</html>
<?php
   include "connection.php";
   include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>Student-Info</title>
   <style type="text/css">
/*      .srch
      {
         padding-left: 1250px;
      }*/
   </style>
</head>
<body>
   <!-- ------------------------- Search Bar ------------------------------- -->
   <div class="srch">
      <form class="navbar-form" method="post" name="form1">
            <input class="form-control" type="text" name="search" placeholder="search a username...." required="">
            <button style="background-color: #f0d3ef;" type="submit" name="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
      </form>
   </div>
   <!-- -------------------------------------------------------------------- -->

   <i><b><h3 style="margin-left: 20px;">List Of Students</h3></b></i>
   <?php

     if(isset($_POST['submit']))
     { 
        $q=mysqli_query($db,"SELECT first,last,username,roll,email,contact FROM `student` where username like '%$_POST[search]%'"); // query to check if any student row are matching the input provided by admin.to check if any row matches to data or not
        // if num of rows matched is 0 then no data found.
        if(mysqli_num_rows($q)==0)
        {
           echo "Sorry incorrect username! No user found.";
        }
        else
        {
               echo "<table class='table table-bordered table-hover'>";
             //Table header
                echo "<tr style='background-color: #f0d3ef;'>";
                echo "<th>"; echo "First-Name"; echo "</th>"; 
                echo "<th>"; echo "Last-Name"; echo "</th>"; 
                echo "<th>"; echo "Username"; echo "</th>"; 
                echo "<th>"; echo "User ID"; echo "</th>"; 
                echo "<th>"; echo "Email"; echo "</th>"; 
                echo "<th>"; echo "Contact"; echo "</th>"; 
             echo "</tr>";

             while($row=mysqli_fetch_assoc($q)) //to fetch all rows from table
             {
               echo "<tr>";
                  echo "<td>"; echo $row['first']; echo "</td>";
                  echo "<td>"; echo $row['last']; echo "</td>";
                  echo "<td>"; echo $row['username']; echo "</td>";
                  echo "<td>"; echo $row['roll']; echo "</td>";
                  echo "<td>"; echo $row['email']; echo "</td>";
                  echo "<td>"; echo $row['contact']; echo "</td>";
               echo "</tr>";
             }

             echo "</table>";
        }
     }

     else
     {
        $res=mysqli_query($db,"SELECT first,last,username,roll,email,contact FROM `student`;");

          echo "<table class='table table-bordered table-hover'>";
          //Table header
          echo "<tr style='background-color: #f0d3ef;'>";
                echo "<tr style='background-color: #f0d3ef;'>";
                echo "<th>"; echo "First-Name"; echo "</th>"; 
                echo "<th>"; echo "Last-Name"; echo "</th>"; 
                echo "<th>"; echo "Username"; echo "</th>"; 
                echo "<th>"; echo "User ID"; echo "</th>"; 
                echo "<th>"; echo "Email"; echo "</th>"; 
                echo "<th>"; echo "Contact"; echo "</th>"; 
          echo "</tr>";

          while($row=mysqli_fetch_assoc($res)) //to fetch all rows from table
          {
            echo "<tr>";
                  echo "<td>"; echo $row['first']; echo "</td>";
                  echo "<td>"; echo $row['last']; echo "</td>";
                  echo "<td>"; echo $row['username']; echo "</td>";
                  echo "<td>"; echo $row['roll']; echo "</td>";
                  echo "<td>"; echo $row['email']; echo "</td>";
                  echo "<td>"; echo $row['contact']; echo "</td>";
            echo "</tr>";
          }

          echo "</table>";
      }
   ?>
</body>
</html>
<?php
   include "connection.php";
   include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
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
      .book
      {
      width: 400px;
      margin: 0px auto;
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
   <a href="books.php">Books</a>
  <a href="add.php">Add Books</a>
  <a href="student.php">Student-Info</a>
  <a href="edit.php">Edit Profile</a>
   </div>

   <div id="main">
     <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
     <div class="container" style="text-align: center;">
    <h2 style="color:black; font-family: Lucida Console; text-align: center"><b>Add New Books</b></h2>
    
    <form class="book" action="" method="post" enctype="multipart/form-data">
        
        <input type="text" name="bid" class="form-control" placeholder="Book id" required=""><br>
        <input type="text" name="name" class="form-control" placeholder="Book Name" required=""><br>
        <input type="text" name="authors" class="form-control" placeholder="Authors Name" required=""><br>
        <input type="text" name="edition" class="form-control" placeholder="Edition" required=""><br>
        <input type="text" name="status" class="form-control" placeholder="Status" required=""><br>
        <input type="text" name="quantity" class="form-control" placeholder="Quantity" required=""><br>
        <input type="text" name="department" class="form-control" placeholder="Department" required=""><br>
        <input type="file" name="book1" class="form-control" placeholder="Add Book Picture"><br>
        <button style="text-align: center;" class="btn btn-default" type="submit" name="submit">ADD</button>
    </form>
  </div>
<?php   
if(isset($_POST['submit']))
{
$b_id=$_POST['bid'];
$b_name=$_POST['name'];
$b_author=$_POST['authors'];
$bedition=$_POST['edition'];
$b_status=$_POST['status'];
$b_quantity=$_POST['quantity'];
$b_type=$_POST['department'];
$file=$_FILES['book1'];
$filename=$file['name'];
$filepath=$file['tmp_name'];
$fileerror=$file['error'];
// print_r($file);
      if($fileerror==0)
      {
        $destfile='upload/'.$filename;
        // echo "$destfile";
        //  echo "$filepath";
         $insertq="INSERT INTO books(bid,name,authors,edition,status,quantity,department,bookpic) VALUES('$b_id','$b_name','$b_author','$bedition','$b_status','$b_quantity','$b_type','$destfile')";

         $query=mysqli_query($db, $insertq);
         move_uploaded_file($filepath, $destfile); //upload file in database
         // if(move_uploaded_file($filepath, $destfile)) 
         // {
         //     echo"insetted";
         // }
         // else
         // {
         //     echo"not inserted";
         // }
      }
}
  ?>
    </div>
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

   <?
</body>
</html>
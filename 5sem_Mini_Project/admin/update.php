<?php
   include "connection.php";
   include "navbar.php";
   if(count($_POST)>0) //update data when update button is clicked.
{
    $e=mysqli_query($db,"UPDATE books SET name='". $_POST['name']."',authors='". $_POST['authors']."',edition='". $_POST['edition']."', status='". $_POST['status']."', quantity='". $_POST['quantity']."', department='". $_POST['department']."' where bid='".$_GET['book_id']."'");
    if($e)
    {
        header("location:books.php");
    }
    else{
        echo "error";
    }
}
//gets book id from table
   $sq=mysqli_query($db,"select * from books where bid='".$_GET['book_id']."'");
   $data=mysqli_fetch_array($sq);

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
  <a href="add.php">Add Books</a>
  <a href="delete.php">Delete Books</a>
  <a href="update.php">Update Book Info</a>
  <a href="#">Issue Info</a>
   </div>

   <div id="main">
     <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
     <div class="container" style="text-align: center;">
    <h2 style="color:black; font-family: Lucida Console; text-align: center"><b>Update Book Details</b></h2>
    
    <form class="book" action="" method="post" enctype="multipart/form-data">
        
        <input type="text" name="bid" class="form-control" placeholder="Book id" value="<?php echo $data['bid'];?>"><br>
        <input type="text" name="name" class="form-control" placeholder="Book Name" value="<?php echo $data['name'];?>"><br>
        <input type="text" name="authors" class="form-control" placeholder="Authors Name" value="<?php echo $data['authors'];?>"><br>
        <input type="text" name="edition" class="form-control" placeholder="Edition" value="<?php echo $data['edition'];?>"><br>
        <input type="text" name="status" class="form-control" placeholder="Status" value="<?php echo $data['status'];?>"><br>
        <input type="text" name="quantity" class="form-control" placeholder="Quantity" value="<?php echo $data['quantity'];?>"><br>
        <input type="text" name="department" class="form-control" placeholder="Department" value="<?php echo $data['department'];?>"><br>
        <button style="text-align: center;" class="btn btn-default" type="submit" name="submit">UPDATE</button>
    </form>
  </div>
 
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
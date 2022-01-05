<?php
   include "connection.php";
   $sq=mysqli_query($db,"delete from books where bid='".$_GET['bk_id']."'");
   header("location:books.php");

?>
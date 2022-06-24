<?php

    include('../config/constants.php');

   if(isset($_GET['id']) && isset($_GET['image_name']))
   {
     $id = $_GET['id'];
     $image_name = $_GET['image_name'];
     
     if($image_name != "")
     {
         $path = "../Images/shoes/".$image_name;

         $remove = unlink($path);

         if($remove==false)
         {
             $_SESSION['upload'] = "<div class='error'>Failed to remove Image.</div>";
             header('location:'.SITEURL.'admin/manage-shoes.php');
             die();
         }
     }

     $sql ="DELETE FROM tbl_shoes WHERE id=$id";

     $res = mysqli_query($conn, $sql);

     if($res==true)
     {
         $_SESSION['delete'] = "<div class='success'>Shoe deleted Successfully.</div>";
         header('location:'.SITEURL.'admin/manage-shoes.php');
     }
     else
     {
        $_SESSION['delete'] = "<div class='error'>Failed to delete Food.<?div>";
        header('location:'.SITEURL.'admin/manage-shoes.php');
     }
   } 
   else
   {
        $_SESSION['unauthorise'] = "<div class='error'>Unauthorised Access.</div>";
        header('location:'.SITEURL.'admin/manage-shoes.php');
   }

?>
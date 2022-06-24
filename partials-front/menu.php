<?php include('config/constants.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DC Footline</title>

    <link rel="stylesheet" href="shaddy.css">
<style>
    body{
        background:F4F9F9;
    }
    .navbar{
        background:#F7F9fD ;
        padding:8px;
    }
    .menu ul{ border-bottom:1px  solid black;
     
    }
    .menu ul li{
       
        margin:6px;

        padding:12px;
        margin-left:44px;
       
    }
    .menu ul li:hover{
        background:##FFFFFF;
        border:1px solid black;
        color:#DC3790;
        border-radius:7px;
    }
    .menu ul li>a:hover{
   color:#DC3790;
   
    }
    @media only screen and (min-width:788px){
        .menu ul{
            border-bottom:none;
        }
    .menu ul li{
       
       margin:6px;
       border-radius:4px;
       padding:12px;
       margin-left:44px;
      font-size:22px;
   }
}
    
    </style>
    
    </head>
<body>
    <!--Nav bar starts-->
    <section class="navbar">
        <div class="container nav-bar" >
            <div class="logo">
                <img src="Images/Logo.jpg" alt="footline logo" class="img-responsive">
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL;?>shaddy.php">Home</a>
                    </li>

                    <li>
                        <a href="<?php echo SITEURL;?>categories.php">Categories</a>
                    </li>

                    <li>
                        <a href="<?php echo SITEURL;?>shoes.php">Shoes</a>
                    </li>
                </ul>
              
                <div class="clearfix"></div>
            </div>
        </div>

    </section>
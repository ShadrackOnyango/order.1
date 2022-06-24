<?php include('partials-front/menu.php'); ?>

    <section class="search text-center">
        <div class="container">
            <form action="<?php echo SITEURL; ?>shoe-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for shoe">
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>   
        </div>


    </section>

    <?php
      if(isset($_SESSION['order']))
      {
          echo $_SESSION['order'];
          unset($_SESSION['order']);
      }  
    ?>

    <section class="categories">
        <div class="container">
            <h2 class="text-center">Categories</h2>

            <?php
            
                $sql="SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 5 ";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                            <a href="<?php echo SITEURL; ?>shoe-categories.php?category_id=<?php echo $id?>"> 
                            <div class="box-3 float-container">
                                <?php
                                    if($image_name=="")
                                    {
                                      echo "Image not Available.<div class='error'></div>";

                                    }
                                    else
                                    {
                                        ?>
                                            <img src="<?php echo SITEURL; ?>Images/category/<?php echo $image_name; ?>" alt="Sneakers" class="img-responsive img-curve" width="auto" height="auto">
                                        <?php
                                    }
                                ?>
                                

                                <h3 class="float-text text-white"><?php echo $title;?></h3>
                            </div>   
                            </a>                            
                        <?php
                    }
                }
                else
                {
                    echo "<div class='error'>Category Not Added.</div>";
                }

            ?>



            <div class="clearfix"></div> 
        </div>


    </section>

    <section class="type">
        <div class="container">
            <h2 class="text-center">Explore shoes</h2>

            <?php
            
               $sql2 = "SELECT * FROM tbl_shoes WHERE active='Yes' AND featured='Yes' LIMIT 6";
               
               $res2 = mysqli_query($conn, $sql2);
               
               $count2 = mysqli_num_rows($res2);

               if($count2>0)
               {
                    while($row = mysqli_fetch_assoc($res2))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        ?>
                        <div class="shoe-type">
                            <div class="shoe-img">
                                <?php
                                    if($image_name=="")
                                    {
                                        echo "<div class='error'>Image Not Available.</div>";
                                    }
                                    else
                                    {
                                        ?>
                                            <img src="<?php echo SITEURL; ?>Images/shoes/<?php echo $image_name; ?>" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                
                            </div>

                            <div class="shoe-desc">
                                <h4><?php echo $title;?></h4>
                                <p class="shoe-price"><?php echo $price;;?></p>
                                <p class="shoe-size"><?php echo $description;?></p>
                                <br />
                                <a href="<?php echo SITEURL; ?>order.php?shoes_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>

                        <?php
                    }
               }
               else
               {
                   echo "<div class='error'>Shoe not Available.</div>";
               }

            ?>

            

            <div class="clearfix"></div>
        </div>
    </section>

    <?php include('partials-front/footer.php'); ?>
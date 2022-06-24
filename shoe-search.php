<?php include('partials-front/menu.php'); ?>

    <section class="search text-center">
        <div class="container">

        <?php
               $search = mysqli_real_escape_string($conn, $_POST['search']);
        ?>
            
            <h2>Shoes on Your Search <a href="" class="text-white">"<?php echo $search ?>"</a></h2>

        </div>
    </section>
    
    <section class="shoe-menu">
        <div class="container">
            <h2 class="text-center">Shoe Menu</h2>

            <?php
               
               $sql ="SELECT * FROM tbl_shoes WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

               $res = mysqli_query($conn, $sql);

               $count = mysqli_fetch_assoc($res);

               if($count>0)
               {
                    while($row = mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];

                        ?>

                    <div class="menu-box">
                        <div class="shoe-menu-img">
                            <?php
                                if($image_name=="")
                                {
                                    echo "<div class='error'>Image Not Available.</div>";
                                }
                                else
                                {   
                                    ?>
                                    <img src="<?php echo SITEURL; ?>Images/shoes/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">;
                                    <?php
                                }
                            ?>
                            
                        </div>

                        <div class="shoe-desc">
                            <h4><?php echo $title;?></h4>
                            <p class="shoe-price"><?php echo $price; ?></p>
                            <p class="food-detail">
                                <?php echo $description;?>
                            </p>
                            <br>

                            <a href="<?php echo SITEURL; ?>order.php?shoes_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>

                        <?php
                    }
               }
               else
               {
                   echo "<div class='error'>Shoes Not Found.</div>";
               }
            ?>


            <div class="clearfix"></div>
        </div>

    </section>

    <?php include('partials-front/footer.php'); ?>
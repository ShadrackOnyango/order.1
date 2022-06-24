<?php include('partials-front/menu.php'); ?>

    <!-- Shoe Search Section Starts Here -->
    <section class="search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>shoe-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Shoes.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- Shoe Search Section Ends Here -->



    <!-- Shoe Menu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Shoes Menu</h2>

            <?php
                $sql = "SELECT * FROM tbl_shoes WHERE active='Yes'";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        ?>
                             <div class="shoe-menu-box">
                                <div class="shoe-menu-img">
                                    <?php
                                    if($image_name=="")
                                    {
                                        echo "<div class='error'>Image Not Available.</div>";
                                    }
                                    else
                                    {
                                        ?>
                                            <img src="<?php echo SITEURL; ?>Images/shoes/<?php echo $image_name; ?>" alt="IMAGE" class="img-responsive img-curve"  width="100px" height="150px">
                                        <?php
                                    }
                                    ?>
                                    
                                </div>

                                <div class="shoe-desc">
                                    <h4><?php echo $title;?></h4>
                                    <p class="shoe-price"><?php echo $price;?></p>
                                    <p class="food-detail">
                                    <?php echo $description;?>
                                    </p>
                                    <br>

                                    <a href="<?php echo SITEURL; ?>order.php?shoes_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                                    <br /> <br/>
                                </div>
                            </div>
                        <?php
                    }
                }
                else
                {
                    echo "<div class='error'>Shoe not Found.</div>";
                }
            ?>


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- Shoe Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>
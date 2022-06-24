<?php include('partials-front/menu.php'); ?>
<?php if(isset($_GET['shoe_id']))
{
    $shoes_id = $_GET['shoes_id'];

    $sql = "SELECT * FROM tbl_shoes WHERE id=$shoes_id";

    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if($count ==1) 
    {
        $row = mysqli_fetch_assoc($res);
        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];
    }
}
else
{
    header('location:'.SITEURL);
}

?>

<section class="search">
    <div class="container">
        <h2 class="text-center text-white">Fill this form to Confirm your Order.</h2>
        <form action="" class="order">
            <fieldset>
                <legend>Selected Shoes</legend>
                <div class="shoe-menu-img">
                    <?php
                        if($image_name=="")
                        {
                            echo "<div class='error'>Image Not Available.</div>";
                        }
                        else
                        {   ?>
                            <img src="<?php echo SITEURL; ?>Images/shoes/<?php echo $image_name?>" alt="" class="img-responsive img-curve">;
                            <?php
                        }
                    ?>
                    
                </div>

                <div class="shoe-desc">
                    <h3><?php echo $title; ?></h3>
                    <p class="shoe-price"></p>

                    <div class="order-label">Size</div>
                    <input type="number" min="30" max="45" name="size" class="input-responsive" value="" required>
                    <div class="order-label">Quantity</div>
                    <input type="number" name="quantity" class="input-responsive" value="" required>
                    <div class="order-label bold">Color
                        <select>
                            <option>Black</option>
                            <option>White</option>
                            <option>Black and White</option>
                            <option>Green</option>
                            <option>Custom Made</option>
                        </select>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>Delivery Details</legend>
                <div class="order-label">Full Name</div>
                <input type="text" name="full-name" placeholder="E.g Daniel Carson" class="input-responsive" required>
                <div class="order-label">Phone Number</div>
                <input type="tel" name="contact" placeholder="E.g +254xxxxxxx61" class="input-responsive" required>
                <div class="order-label">Email</div>
                <input type="email" name="email" placeholder="E.g danielcarson@gamail.com" class="input-responsive" required>
                <div class="order-label">Location</div>
                <textarea name="address" rows="10" placeholder="Country, City, Town" class="input-responsive" required></textarea>

                <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
            </fieldset>
        </form>
    </div>
</section>

<?php include('partials-front/footer.php'); ?>
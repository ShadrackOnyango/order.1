<?php include('partials/menu.php')?>

        <div class="main-content">
         <div class="wrapper">
           <h1>Manage Order</h1>


           <br/><br/>

           <?php
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
           ?>

           <table class="tbl-full">
               <tr>
                   <th>ID</th>
                   <th>Shoes</th>
                   <th>Price</th>
                   <th>Quantity</th>
                   <th>Total</th>
                   <th>Order Date</th>
                   <th>status</th>
                   <th>Customer Name</th>
                   <th>Contact</th>
                   <th>Email</th>
                   <th>Location</th>
                   <th>Actions</th>
               </tr>
                <?php
                    $sql = "SELECT * FROM tbl_order ORDER BY id DESC";

                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);
                    $ID = 1;

                    if($count>0)
                    {
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $id = $row['id'];
                            $shoes = $row['shoes'];
                            $price = $row['price'];
                            $quantity = $row['quantity'];
                            $total = $row['total'];
                            $order_date = $row['order_date'];
                            $status = $row['status'];
                            $customer_name = $row['customer_name'];
                            $contact = $row['contact'];
                            $location = $row['location'];
                            $email = $row['email'];

                            ?>
                                <tr>
                                    <td><?php echo $ID++; ?></td>
                                    <td><?php echo $shoes; ?> </td>
                                    <td><?php echo $price; ?> </td>
                                    <td><?php echo $quantity; ?> </td>
                                    <td><?php echo $total; ?> </td>
                                    <td><?php echo $order_date ?> </td>

                                    <td>
                                        <?php
                                            if($status=="Ordered")
                                            {
                                                echo "<label>$status</label>";
                                            }
                                            elseif($status=="On delivery")
                                            {
                                                echo "<label style='color: orange;'>$status</label>";
                                            }
                                            elseif($status=="Delivered")
                                            {
                                                echo "<label style='color: green;'>$status</label>";
                                            }
                                            elseif($status=="Cancelled")
                                            {
                                                echo "<label style='color: pink;'>$status</label>"; 
                                            }
                                        ?>
                                    </td>

                                    <td><?php echo $customer_name; ?> </td>
                                    <td><?php echo $contact;?> </td>
                                    <td><?php echo $location; ?> </td>
                                    <td><?php echo $email; ?> </td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-secondary">Update Order</a>
                                    </td>
                                </tr>
                            <?php
                        }
                    }
                    else
                    {
                        echo "<tr><td colspan='12' class='error'>Order Not Available</td></tr>";
                    }
                ?>
               
           </table>

        </div>
        </div>

<?php include('partials/footer.php')?>
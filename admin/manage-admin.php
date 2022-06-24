<?php include('partials/menu.php')?>

        <div class="main-content">
         <div class="wrapper">
           <h1>Manage Admin</h1>
           <br/>
           <?php 
               if(isset($_SESSION['add']))
               {
                   echo $_SESSION['add'];
                   unset($_SESSION['add']);
               }
               
               if(isset($_SESSION['delete']))
               {
                   echo $_SESSION['delete'];
                   unset($_SESSION['delete']);
               }

               if(isset($_SESSION['update']))
               {
                   echo $_SESSION['update'];
                   unset($_SESSION['update']);
               }
               if(isset($_SESSION['user-not-found']))
               {
                   echo $_SESSION['user-not-found'];
                   unset($_SESSION['user-not-found']);
               }
               if(isset($_SESSION['password-didnt-match']))
               {
                   echo $_SESSION['password-didnt-match'];
                   unset($_SESSION['password-didnt-match']);
               }
               if(isset($_SESSION['change-pwd']))
               {
                   echo $_SESSION['change-pwd'];
                   unset($_SESSION['change-pwd']);
               }
           ?>

           <br/><br/>
           <a href="add-admin.php" class="btn-primary">Add Admin</a>
           <br/><br/>

           <table class="tbl-full">
               <tr>
                   <th>ID</th>
                   <th>Full Name</th>
                   <th>Username</th>
                   <th>Actions</th>
               </tr>

               <?php
                    $sql = "SELECT * FROM tbl_admin";
                    $res = mysqli_query($conn, $sql);
                    if($res == TRUE)
                    {
                        $count = mysqli_num_rows($res);

                        $ID=1;

                        if($count>0)
                        {
                            while($row = mysqli_fetch_assoc($res))
                            {
                               $id=$row['id'];
                               $full_name=$row['full_name'];
                               $username=$row['username']; 

                               ?>
                                
                                <tr>
                                    <td><?php echo $ID++;?></td>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $username?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                        <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                                    </td>
                                </tr>

                               <?php
                            }
                        }
                        else
                        {

                        }
                    }
               ?>

           </table>

        </div>
        </div>

        <?php include('partials/footer.php')?>
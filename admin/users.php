<!DOCTYPE html>
<html lang="en">
<!--                                   HEADER                           -->
<?php include './includes/header.php';  ?>


<body>
    
    <div id="wrapper">

        <!-- Navigation -->
        <?php include './includes/navigation.php'  ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12" style="overflow-x: scroll; padding-bottom:50px;">
                        <h1 class="page-header">
                            EToday
                            <small>Manage Users and Admins</small>
                        </h1>
                        <div class="col-xs-6">
                        <h3>Users</h3>
                        <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Delete</th>
                                        
                                    </tr>
                                </thead>
                                <?php
                                $sql = "SELECT * from user_registration";
                                $all_users = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($all_users)) {
                                    $user_id = $row['user_id'];
                                    $username = $row['username'];
                                    $email = $row['email'];

                                    





                                ?>


                                    <tbody>
                                        <tr>
                                            <td><?php echo $user_id;  ?></td>
                                            <td><?php echo $username;  ?></td>
                                            <td><?php echo $email;  ?></td>
                                            <td><?php echo "<a href=users.php?delete=$user_id>Delete</a>";  ?></td>
                                        </tr>



                                    </tbody>
                                <?php }  ?>
                            </table>

                             <?php 
                            if (isset($_GET['delete'])) {
                                $the_user_id = $_GET['delete'];
                                $sql = "DELETE from user_registration where user_id = '$the_user_id'";
                                mysqli_query($conn, $sql);
                                header("location:users.php");
                            }  ?>             




                        </div>


                        <div class="col-xs-6" >
                            <h3>Admins</h3>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Admin Name</th>
                                        <th>Email</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <?php
                                $sql = "SELECT * from admin_registration";
                                $all_admins = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($all_admins)) {
                                    $admin_id = $row['admin_id'];
                                    $admin_username = $row['admin_username'];
                                    $admin_email = $row['admin_email'];





                                ?>


                                    <tbody>
                                        <tr>
                                            <td><?php echo $admin_id;  ?></td>
                                            <td><?php echo $admin_username;  ?></td>
                                            <td><?php echo $admin_email;  ?></td>
                                            <td><?php echo "<a href=users.php?delete_admin=$admin_id>Delete</a>";  ?></td>
                                        </tr>



                                    </tbody>
                                <?php }  ?>
                            </table>
                            <?php 
                            if (isset($_GET['delete_admin'])) {
                                $the_admin_id = $_GET['delete_admin'];
                                $sql = "DELETE from admin_registration where admin_id = '$the_admin_id'";
                                mysqli_query($conn, $sql);
                                header("location:users.php");
                            }  ?>    









                        </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
            <?php include '../includes/footer.php';  ?> 

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="./js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./js/bootstrap.min.js"></script>

</body>

</html>
<!DOCTYPE html>
<html lang="en">
<!--                                   HEADER                           -->
<?php include './includes/header.php';  ?>
<?php include 'functions.php'  ?>

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
                            <small>Categories</small>
                        </h1>
                        <div class="col-xs-6">
                            <form action="categories.php" method="post">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="cat_title" name="cat_id" placeholder="Enter Category" required>
                                </div>
                                <div class="form-group" style="float: left; padding-right:20px; ">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>



                            <!--             PHP FOR CATEGORY SUBMISSION                 -->
                            <?php
                            
                            insert_category();

                            delete_category();
                            
                            update_category();

                            ?>
                            <!--                          PHP   ENDS             -->
                                
                                    </form>
                        </div>


                        <div class="col-xs-6" >
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                        <th>Delete</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <?php
                                $sql = "SELECT * from categories";
                                $all_categories = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($all_categories)) {
                                    $cat_title = $row['cat_title'];
                                    $cat_id = $row['cat_id'];



                                ?>


                                    <tbody>
                                        <tr>
                                            <td><?php echo $cat_id;  ?></td>
                                            <td><?php echo $cat_title;  ?></td>
                                            <td><?php echo "<a href=categories.php?delete=$cat_id>Delete</a>";  ?></td>
                                            <td><?php echo "<a href=categories.php?edit=$cat_id>Edit</a>";  ?></td>
                                        </tr>



                                    </tbody>
                                <?php }  ?>
                            </table>
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
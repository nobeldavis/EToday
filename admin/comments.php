<-- HEADER -->
<?php include './includes/header.php';  ?>

    <body>



        <div id="wrapper">

            <!-- Navigation -->
            <?php include 'includes/navigation.php'  ?>

            <div id="page-wrapper">

                <div class="container-fluid">


                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-xs-12">
                            <h1 class="page-header">
                                EToday
                                <small>Comments</small>
                            </h1>

                        </div>
                    </div>
                    <!-- /.row -->

                    <?php
                    if (isset($_GET['delete'])) {
                        $the_comment_id = $_GET['delete'];
                        $sql = "DELETE from comments where comment_id = '$the_comment_id'";
                        $delete_comment = mysqli_query($conn, $sql);
                        header("location:comments.php");
                    }
                    ?>
                    </form>
                
                    <div class="col-lg-12" style="overflow-x: scroll;padding-bottom:100px;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Post Name</th>
                                    <th>Date</th>
                                    <th>Author</th>
                                    <th>Content</th>
                                    <th>Delete</th>
                                   
                                </tr>
                            </thead>
                            <?php
                            $sql = "SELECT * from comments";
                            $all_comments = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($all_comments)) {
                                $comment_id = $row['comment_id'];
                                $comment_post_id = $row['comment_post_id'];
                                $comment_date = $row['comment_date'];
                                $comment_author = $row['comment_author'];
                                $comment_content = $row['comment_content'];
                        ?>

                            <tbody>
                                <tr>
                                    <td><?php echo $comment_id;  ?></td>
                                    <td><?php
                                    $sql = "SELECT * FROM `posts` WHERE post_id = $comment_post_id;";
                                    $post_title = mysqli_query($conn, $sql); 
                                    while ($row = mysqli_fetch_assoc($post_title)) {
                                            
                                        echo "<a href=../post.php?post_id=$comment_post_id>$row[post_title]</a>";
                                    } 
                                    ?>
                                     </td>
                                    <td><?php echo $comment_date;  ?></td>
                                    <td><?php echo $comment_author;  ?></td>
                                    <td><?php echo $comment_content;  ?></td>
                                    
                                    <td><?php echo "<a href=comments.php?delete=$comment_id>Delete</a>";  ?></td>
                                    
                                </tr>



                            </tbody>
                            <?php }  ?>
                        </table>
                    </div>
                </div>
                <!-- /.container-fluid -->
                <?php include '../includes/footer.php';  ?> 

            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->
        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

    </body>

    </html>
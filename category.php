<?php include "includes/db.php";  ?>

<!-- H  E  A  D  E  R -->
<?php include "includes/header.php";  ?>

<body>
    <!-- N  A  V  B  A  R -->
    <?php include "includes/navigation.php";  ?>


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">



                <!-- First Blog Post -->
                <?php {
                    if (isset($_GET['category'])) {

                        $post_category = $_GET['category'];

                        $sql = "SELECT * FROM `posts` WHERE  post_category = '$post_category' ORDER BY `post_date` DESC ";
                        $posts_query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($posts_query)) {
                            $post_id = $row['post_id'];
                            $post_title = $row['post_title'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];
                        }
                        $count = mysqli_num_rows($posts_query);
                        if ($count == 0) {
                            echo "<h1>Nothing Found</h1>";
                        } if ($count == !0) {
                            $sql = "SELECT * FROM `posts` WHERE  post_category = '$post_category' ORDER BY `post_date` DESC ";
                        $posts_query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($posts_query)) {
                            $post_id = $row['post_id'];
                            $post_title = $row['post_title'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];

                ?>
                            <h2>
                                <a href="post.php?post_id=<?php echo $post_id;  ?> "><?php echo $post_title;  ?></a>
                            </h2>

                            <p><span class=glyphicon glyphicon-time></span> Posted on <?php echo $post_date;  ?></p>

                            <img class="img-responsive" src="./images/<?php echo $post_image;  ?>">
                            <br>
                            <p row="5"><?php echo $post_content;  ?></p>
                            <a class='btn btn-primary' href="post.php?post_id=<?php echo $post_id;  ?> ">Read More <span class='glyphicon glyphicon-chevron-right'></span></a>

                            <hr>
                    <?php
                            }
                        }
                    }
                }
                ?>


               <!-- \ Pager -->
               <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul> 
            </div>

            <!-- S  I  D  E  B  A  R  -->
            <?php include "includes/sidebar.php";  ?>


        </div>
        <!-- /.row -->

        <hr>
        <!-- F  O  O  T  E  R -->
        <?php include "includes/footer.php";  ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
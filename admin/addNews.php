
<!--  HEADER  -->
<?php include './includes/header.php';  ?>


<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include 'includes/navigation.php'  ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            EToday
                            <small>Add News</small>
                        </h1>
                        <div class="col-lg-6" >
                            <form action="addNews.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <h4>Add Title</h4>
                                    <input class="form-control" type="text" name="post_title" placeholder="Enter News Title">
                                </div>
                                <div class="form-group">
                                    <h4>Add Category</h4>
                                    <select name="post_category">
                                    <?php  $sql = "SELECT * from categories";
                                        $all_categories = mysqli_query($conn, $sql); 
                                        while ($row = mysqli_fetch_assoc($all_categories)) {
                                            
                                            echo "<option>$row[cat_title]</option>";
                                        } 
                                    ?>  
                                    </select> 
                                </div>
                                                                   
                                <div class="form-group">
                                    <h4>Add Content</h4>
                                    <textarea  name="post_content"></textarea>
                                </div>
                                <div class="form-group">
                                    <h4>Add Image</h4>
                                    <input type="file" name="post_image">
                                </div>
                                <div class="form-group">
                                    <h4>Add Tags</h4>
                                    <input class="" type="text" name="post_tags" placeholder="Enter Related Tags">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add News" >
                                </div>
                            </form>
    <?php 
    if (isset($_POST['submit'])) {        
        $post_title = $_POST['post_title'];
        $post_content = $_POST['post_content'];
        $post_category = $_POST['post_category'];
        $post_tags = $_POST['post_tags'];
          
        $post_image = $_FILES['post_image']['name'];
        $post_image_temp = $_FILES['post_image']['tmp_name'];
        move_uploaded_file($post_image_temp, "../images/$post_image");

        if ($post_title == "" || $post_content == ""){
            echo '<script>alert("Title and Content is must")</script>';
        }
        else{
        
        $sql = "INSERT INTO `posts` (`post_id`, `post_category`, `post_title`, `post_date`, `post_image`, `post_content`, `post_tags`) VALUES (NULL, '$post_category', '$post_title', current_timestamp(), '$post_image', '$post_content', '$post_tags')";

        $add_news = mysqli_query($conn, $sql);
        if (!$add_news) {
            die('Failed' . mysqli_error($add_news));
        }
        header("location:news.php");
        }
    }
    ?>




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
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- tinyMCE -->
    <script src="../js/tinymce/tinymce.min.js"></script>
    <script src="../js/tinymce/init-tinymce.js"></script>

</body>

</html>
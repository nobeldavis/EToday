<?php include "includes/db.php";  ?>

<!-- H  E  A  D  E  R -->
<?php include "includes/header.php";  ?>

<!-- N  A  V  B  A  R -->   
<?php include "includes/navigation.php";  ?>

<body>
<div class="container" style="padding-top: 30px;">

        <div class="row">
            
            <!-- Blog Entries Column -->
            <div class="col-lg-12">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            EToday
                            <small>Suggest News! This won't be published instantly.</small>
                        </h1>
                        <div class="col-lg-6" >
                            <form action="news_sugg.php" method="post" enctype="multipart/form-data">
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
                                    <textarea name="post_content"></textarea>
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
                                    <input class="btn btn-primary" type="submit" name="submit" value="Suggest News" >
                                </div>
                            </form>
                            <?php 
if (isset($_POST['submit'])) {        
    $post_title2 = $_POST['post_title'];
    $post_content2 = $_POST['post_content'];
    $post_category2 = $_POST['post_category'];
    $post_tags2 = $_POST['post_tags'];
    
    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];

   // $post_date = date(('d-m-y'));
    
   move_uploaded_file($post_image_temp, "./images2/$post_image");

   if ($post_title2 == "" || $post_content2 == ""){
    echo '<script>alert("Title and Content is must")</script>';
    }
    else{
    
     $sql = "INSERT INTO `news_sugg` (`post_id2`, `post_category2`, `post_title2`, `post_date2`, `post_image2`, `post_content2`, `post_tags2`) VALUES (NULL, '$post_category2', '$post_title2', current_timestamp(), '$post_image', '$post_content2', '$post_tags2')";

        $add_news = mysqli_query($conn, $sql);
        if (!$add_news) {
            die('Failed' . mysqli_error($create_cat_query));
        }
    }
}  ?>




                        </div> 
                    </div>
                    
                </div>
                

            </div>

        </div>
        <!-- FOOTER -->
        <?php include './includes/footer.php';  ?> 
        

    </div>
    

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- tinyMCE -->
    <script src="./js/tinymce/tinymce.min.js"></script>
    <script src="./js/tinymce/init-tinymce.js"></script>

</body>
<html>
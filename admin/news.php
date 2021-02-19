
<!-- HEADER -->

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
                                <small>Edit News</small>
                            </h1>

                        </div>
                    </div>
                    <!-- /.row -->

                    <?php
                    /* DELETE */
                    if (isset($_GET['delete'])) {
                        $the_post_id = $_GET['delete'];
                        $sql = "DELETE from posts where post_id = '$the_post_id'";
                        $delete_post_query = mysqli_query($conn, $sql);
                        header("location:news.php");
                    }



                    /* EDIT NEWS */
                    if (isset($_GET['edit'])) {
                        $post_update_id = $_GET['edit'];
                        $sql = "SELECT * from posts where post_id = '$post_update_id' ";
                        $update_post_query = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_assoc($update_post_query)) {

                            $post_id = $row['post_id'];
                            $post_category = $row['post_category'];
                            $post_title = $row['post_title'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];
                            $post_tags = $row['post_tags'];
                            ?>
                            <form action="news.php" method="post" enctype="multipart/form-data" style="padding-bottom: 90px;">
                                <div class="form-group">
                                    <input class="form-control" value="<?php if (isset($post_id)) {
                                        echo $post_id;
                                    }  ?>" type="text"  required name="post_id">
                                </div>

                                <div class="form-group">
                                    <h4>Edit Title</h4>
                                    <input class="form-control" value="<?php if (isset($post_title)) {
                                        echo $post_title;
                                    }  ?>"  type="text" name="post_title" placeholder="Enter News Title">
                                </div>

                                <div class="form-group">
                                    <h4>Edit Category</h4>
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
                                    <h4>Edit Content</h4>
                                    <textarea  name="post_content">
                                    <?php if (isset($post_content)) {
                                        echo $post_content;
                                    }  ?></textarea>
                                </div>

                                <div class="form-group">
                                    <h4>Edit Image</h4>
                                    <img class="form-group" width=200px src="../images/<?php echo $post_image;  ?>" alt="Post Thumbnail">
                                    <input type="file" name="post_image">
                                </div>

                                <div class="form-group">
                                    <h4>Edit Tags</h4>
                                    <input class="form-control" value="<?php if (isset($post_tags)) {
                                        echo $post_tags;
                                    }  ?>" type="text" name="post_tags" placeholder="Enter Related Tags">
                                </div>

                                <div class="form-group" style="float: left; padding-right:20px; ">
                                    <input class="btn btn-primary" type="submit" name="submit2" value="Update">
                                </div>
                            <?php
                            }
                    }


                    /* IF EDIT BUTTON PRESSED */
                    if (isset($_POST['submit2'])) {
                        $post_id = $_POST['post_id'];
                        $post_title = $_POST['post_title'];
                        $post_content = $_POST['post_content'];
                        $post_category = $_POST['post_category'];
                        $post_tags = $_POST['post_tags'];

                        $post_image = $_FILES['post_image']['name'];
                        $post_image_temp = $_FILES['post_image']['tmp_name'];

                        // $post_date = date(('d-m-y'));

                        move_uploaded_file($post_image_temp, "../images/$post_image");

                        if(empty($post_image)){
                          $sql = "SELECT * FROM posts WHERE post_id = $post_id";
                          $check_image = mysqli_query($conn,$sql);
                           
                          while($row = mysqli_fetch_array($check_image)){
                              $post_image = $row['post_image'];
                              
                          }
                        }

                        /* $sql = "UPDATE  `posts` SET  'post_title` = '$post_title' WHERE `posts`.`post_id` =$post_id; "; */
                        if ($post_title == "" || $post_content == ""){
                            echo '<script>alert("Title and Content is must")</script>';
                        }
                        else{
                        $sql2 = "UPDATE `posts` SET `post_category` = '$post_category', `post_title` = '$post_title', `post_image` = '$post_image', `post_content` = '$post_content', `post_tags` = '$post_tags'  WHERE `posts`.`post_id` = '$post_id'; ";

                        $update_news = mysqli_query($conn, $sql2);
                        }
                    }
                    ?>
                    </form><hr>
                        <!--  TABLE CONTENTS  -->
                        <div class="col-lg-12" style="overflow-x: scroll;padding-bottom:100px;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Image</th>
                                        <th>Content</th>
                                        <th>Tags</th>
                                        <th>Delete</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <?php
                                $sql = "SELECT * from posts ORDER BY post_date DESC";
                                $all_news = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($all_news)) {
                                    $post_id = $row['post_id'];
                                    $post_category = $row['post_category'];
                                    $post_title = $row['post_title'];
                                    $post_date = $row['post_date'];
                                    $post_image = $row['post_image'];
                                    $post_content = $row['post_content'];
                                    $post_tags = $row['post_tags'];
                                    ?>

                                    <tbody>
                                        <tr>
                                            <td><?php echo $post_id;  ?></td>
                                            <td><?php echo $post_category;  ?></td>
                                            <td><?php echo $post_title;  ?></td>
                                            <td><?php echo $post_date;  ?></td>
                                            <td> <img width=100px src="../images/<?php echo $post_image;  ?>" alt=""></td>
                                            <td><?php echo $post_content;  ?></td>
                                            <td><?php echo $post_tags;  ?></td>
                                            <td><?php echo "<a href=news.php?delete=$post_id>Delete</a>";  ?></td>
                                            <td><?php echo "<a href=news.php?edit=$post_id>Edit</a>";  ?></td>
                                        </tr>
                                    </tbody>
                                 <?php 
                                }
                                ?>
                            </table>
                        </div> <!-- END OF TABLE -->
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
        <!-- TinyMCE -->
        <script src="../js/tinymce/tinymce.min.js"></script>
        <script src="../js/tinymce/init-tinymce.js"></script>
    </body>
 
    </html>
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
                            <small>User News Suggestions</small>
                        </h1>

                    </div>
                </div>

                <?php
                    if (isset($_GET['delete'])) {
                        $the_post_id = $_GET['delete'];
                        $sql = "DELETE from news_sugg where post_id2 = '$the_post_id'";
                        $delete_post_query = mysqli_query($conn, $sql);
                        header("location:view_sugg.php");
                    }
                    if (isset($_GET['publish'])) {
                        $post_update_id = $_GET['publish'];
                        $sql = "SELECT * from news_sugg where post_id2 = '$post_update_id' ";
                        $update_post_query = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_assoc($update_post_query)) {

                            $post_id2 = $row['post_id2'];
                            $post_category2 = $row['post_category2'];
                            $post_title2 = $row['post_title2'];
                            $post_date2 = $row['post_date2'];
                            $post_image2 = $row['post_image2'];
                            $post_content2 = $row['post_content2'];
                            $post_tags2 = $row['post_tags2'];
                            
                    ?>

                        <form action="view_sugg.php" method="post" enctype="multipart/form-data">
                     <div class="form-group">
                    <input class="form-control" value="<?php if (isset($post_id2)) {
                                        echo $post_id2;
                                    }  ?>" type="text"  required name="post_id">
                </div>
                                <div class="form-group">
                                    <h4>Add Title</h4>
                                    <input class="form-control" value="<?php if (isset($post_title2)) {
                                        echo $post_title2;
                                    }  ?>"  type="text" name="post_title" placeholder="Enter News Title">
                                </div>
                                <div class="form-group">
                                <h4>Add Category</h4>
                                    <input class="form-control" value="<?php if (isset($post_category2)) {
                                        echo $post_category2;
                                    }  ?>"  name="post_category" type="text"  placeholder="Enter Category">
                                </div>


                                <div class="form-group">
                                    <h4>Add Content</h4>
                                    
                                    <textarea class="form-control"  rows="10" type="text" name="post_content" placeholder="Enter News Content"><?php if (isset($post_content2)) {
                                        echo $post_content2;
                                    }  ?></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <h4>Edit Image</h4>
                                    <img class="form-group" width=200px src="../images2/<?php echo $post_image2;  ?>" alt="Post Thumbnail">
                                    <input type="file" name="post_image">
                                </div>
                                <div class="form-group">
                                    <h4>Add Tags</h4>
                                    <input class="form-control" value="<?php if (isset($post_tags2)) {
                                        echo $post_tags2;
                                    }  ?>" type="text" name="post_tags" placeholder="Enter Related Tags">
                                </div>
                                


                                <div class="form-group" style="float: left; padding-right:20px; ">
                                    <input class="btn btn-primary" type="submit" name="submit2" value="Publish">
                                </div><br><br><br>
                                <!-- header("location:categories.php");  -->
                        <?php
                        }
                    }
                    if (isset($_POST['submit2'])) {
                        $post_id2 = $_POST['post_id'];
                        $post_title2 = $_POST['post_title'];
                        $post_content2 = $_POST['post_content'];
                        $post_category2 = $_POST['post_category'];
                        $post_tags2 = $_POST['post_tags']; 

                        $post_image = $_FILES['post_image']['name'];
                        $post_image_temp = $_FILES['post_image']['tmp_name'];

                        // $post_date = date(('d-m-y'));

                        move_uploaded_file($post_image_temp, "../images/$post_image");

                        if(empty($post_image)){
                          $sql = "SELECT * FROM news_sugg WHERE post_id2 = $post_id2";
                          $check_image = mysqli_query($conn,$sql);
                           
                          while($row = mysqli_fetch_array($check_image)){
                              $post_image = $row['post_image2'];

                            $oldname = "../images2/$post_image";
                            $newname = "../images/$post_image";
                            copy($oldname,$newname);
                              
                          }
                        }

                        /* $sql = "UPDATE  `posts` SET  'post_title` = '$post_title' WHERE `posts`.`post_id` =$post_id; "; */
                        $sql2 = "INSERT INTO `posts` (`post_id`, `post_category`, `post_title`, `post_date`, `post_image`, `post_content`, `post_tags`) VALUES (NULL, '$post_category2', '$post_title2', current_timestamp(), '$post_image', '$post_content2', '$post_tags2')";
                        /* $sql2 = "UPDATE `news_sugg` SET `post_category2` = '$post_category2', `post_title2` = '$post_title2', `post_image2` = '$post_image', `post_content2` = '$post_content2', `post_tags2` = '$post_tags2'  WHERE `news_sugg`.`post_id2` = '$post_id2'; "; */

                        $update_news = mysqli_query($conn, $sql2);
                        
                    }
                    ?>
                    </form>
                




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
                                <th>Publish</th>
                            </tr>
                        </thead>
                        <?php
                        $sql = "SELECT * from news_sugg";
                        $all_news = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($all_news)) {
                            $post_id2 = $row['post_id2'];
                            $post_category2 = $row['post_category2'];
                            $post_title2 = $row['post_title2'];
                            $post_date2 = $row['post_date2'];
                            $post_image2 = $row['post_image2'];
                            $post_content2 = $row['post_content2'];
                            $post_tags2 = $row['post_tags2'];





                        ?>

                            <tbody>
                                <tr>
                                    <td><?php echo $post_id2;  ?></td>
                                    <td><?php echo $post_category2;  ?></td>
                                    <td><?php echo $post_title2;  ?></td>
                                    <td><?php echo $post_date2;  ?></td>
                                    <td> <img width=100px src="../images2/<?php echo $post_image2;  ?>" alt=""></td>

                                    <td><?php echo $post_content2;  ?></td>
                                    <td><?php echo $post_tags2;  ?></td>
                                    <td><?php echo "<a href=view_sugg.php?delete=$post_id2>Delete</a>";  ?></td>
                                    <td><?php echo "<a href=view_sugg.php?publish=$post_id2>Publish</a>";  ?></td>
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
<?php include "includes/db.php";  ?>
<?php include "includes/header.php"  ?>

 

<body style="padding-top: 70px;">
<!-- NAVBAR -->
<?php include 'includes/navigation.php'  ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->
                
                <?php {
                    if (isset($_GET['post_id']))
                    $post_id = $_GET['post_id'];
                    $sql = "SELECT * FROM `posts` WHERE post_id=$post_id  ORDER BY `post_date` DESC ";
                    $posts_query = mysqli_query($conn, $sql); 
                    while ($row = mysqli_fetch_assoc($posts_query)) {
                        $post_title = $row['post_title'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
                    
                
                ?>
                        <h2 class="title">
                            <?php echo $post_title;  ?>
                        </h2>
                    
                        <p><span class=glyphicon glyphicon-time></span> Posted on <?php echo $post_date;  ?></p>
                        
                        <img class="img-responsive" src="./images/<?php echo $post_image;  ?>" alt="">
                        <br>
                        <p class="content"><?php echo $post_content;  ?></p>
                        

                        <hr>
            <?php 
                } 
            }
            ?>
                

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <?php if(isset($_SESSION['username'])){ ?>
                    <div class="well">
                        <h4>Leave a Comment:</h4>
                        <form action="" method="post" role="form">
                            <div class="form-group">
                                <textarea class="form-control" rows="3" name="comment"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
                        </form>
                    </div>
                <?php }  ?>
                
                <!-- INSERT COMMENT -->
                <?php 
                if(isset($_POST['submit'])){
                    $comment_post_id = $_GET['post_id'];
                    $comment_content = $_POST['comment'];
                    $sql = "INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_date`, `comment_author`, `comment_content`) VALUES (NULL,$comment_post_id, current_timestamp(), '{$_SESSION['username']}', '$comment_content');";
                    mysqli_query($conn, $sql);
                    
                }
                  ?>
                

                <!-- Posted Comments -->

                <!-- Comment -->
                <h4> <u>Comments</u> </h4>
                <?php {
                    $comment_post_id = $_GET['post_id'];
                    $sql = "SELECT * FROM `comments` WHERE comment_post_id = $comment_post_id ORDER BY `comment_date` DESC ";
                    $comments_query = mysqli_query($conn, $sql); 
                    while ($row = mysqli_fetch_assoc($comments_query)) {
                        $comment_id =$row['comment_id'];
                        $comment_author = $row['comment_author'];
                        $comment_date = $row['comment_date'];
                        $comment_content = $row['comment_content'];
                
                        ?>
                            <div class="media">
                            
                            <div class="media-body">
                                <h4 class="media-heading"><b><?php echo $comment_author;  ?></b>
                                    <small><?php echo $comment_date;  ?></small>
                                </h4>
                                <?php echo $comment_content;  ?>
                            </div>
                        </div>
                        
                            <hr>
                        <?php 
                    } 
                }
            ?>


            </div>

       
            <!-- SIDEBAR-->
            <?php include './includes/sidebar.php'  ?>



        
        <!-- Footer -->
        
        <?php include "includes/footer.php"  ?>
    
        </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
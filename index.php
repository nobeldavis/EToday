<?php include "includes/db.php";  ?>

<!-- H  E  A  D  E  R -->
<?php include "includes/header.php";  ?>

<body>
    <!-- N  A  V  B  A  R -->
    <?php include "includes/navigation.php";  ?>
    <div class="headerss">
        <h1>E-Today</h1>
        <p><b>News</b> at your fingertips.</p>
    </div>

    <!-- Page Content -->
    <div class="container" style="padding-top: 30px;">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <!-- First Blog Post -->

                <?php { 
                    $page_limit = 5; //  P  A  G  E  I  N  G
                    if (isset($_GET['page'])) { 
                        $page = $_GET['page'];
                    } else {
                        $page = "";
                    }
                    if ($page == "" || $page == 1) {
                        $page_1 = 0;
                    } else {
                        $page_1 = ($page * $page_limit) - $page_limit;
                    }


                    $post_query_count = "SELECT * FROM posts";
                    $find_count = mysqli_query($conn, $post_query_count);
                    $count = mysqli_num_rows($find_count);
                    $count = ceil($count / $page_limit);

                    $sql = "SELECT * FROM `posts` ORDER BY `post_date` DESC LIMIT $page_1,$page_limit";
                    $posts_query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($posts_query)) {
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];


                ?>
                        <h2 class="title">
                            <a class="title-links" href="post.php?post_id=<?php echo $post_id;  ?> "><?php echo $post_title;  ?></a>
                        </h2>

                        <p><span class=glyphicon glyphicon-time></span> Posted on <?php echo $post_date;  ?></p>

                        <img class="img-responsive" src="./images/<?php echo $post_image;  ?>">
                        <br>
                        <p style="display: inline-block;height: 80px;overflow:hidden;" class="content" row="5"><?php echo $post_content;  ?></p>
                        <a class='btn btn-primary' href="post.php?post_id=<?php echo $post_id;  ?> ">Read More <span class='glyphicon glyphicon-chevron-right'></span></a>

                        <hr>
                <?php
                    }
                }
                ?>
            </div>

            <!-- S  I  D  E  B  A  R  -->
            <?php include "includes/sidebar.php";  ?>
            <!-- PHP FOR LOGIN -->
            <?php include "includes/db.php"; ?>
            <?php

            if (isset($_POST['login'])) {
                $wrong = "";
                $db_email = "";
                $db_password = "";
                global $conn;
                $email = $_POST["email"];
                $password = $_POST["password"];

                $email = mysqli_real_escape_string($conn, $email);
                $password = mysqli_real_escape_string($conn, $password);

                $sql = "SELECT * FROM user_registration WHERE (`email`, `password`) = ('$email', '$password')  ";
                $select_user_query = mysqli_query($conn, $sql);
                if (!$select_user_query) {
                    die('Query Failed' . mysqli_error($conn));
                }
                while ($row = mysqli_fetch_array($select_user_query)) {
                    $db_username = $row['username'];
                    $db_email = $row['email'];
                    $db_password = $row['password'];
                }
                if ($email === $db_email && $password === $db_password) {
                    $_SESSION['username'] = $db_username;
                    header("Location: index.php");
                } elseif ($email !== $db_email && $password !== $db_password) {
                    echo '<script>alert("Wrong credentials, Try again...")</script>';
                } else {
                    header("Location: index.php");
                }
            }

            ?>


        </div>
        <!-- /.row -->
        <ul class="pager">
            <?php
            for ($i = 1; $i <= $count; $i++) {
                if ($i == $page){
                    echo "<li style=padding-right:10px; ><a style=background-color:red;color:white; href=index.php?page=$i>$i</a></li>";

                }
                else{
                    echo "<li  style=padding-right:10px;><a href=index.php?page=$i>$i</a></li>";
                }
            }
            ?>

        </ul>
        <!-- F  O  O  T  E  R -->
        <?php include "includes/footer.php";  ?>
        <!-- /.container -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </div>
</body>

</html>
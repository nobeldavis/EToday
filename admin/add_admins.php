<-- HEADER -->
    <?php include './includes/header.php';  ?>
    <?php include "../includes/db.php"; ?>
    

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
                                <small>Add Admins</small>
                            </h1>

                        </div>
                    </div>
                    <!-- /.row -->
                    <?php
                    $usernameErr = $emailErr = $passErr = $passConfErr = $emailEr =  $sameEmailErr = $wrong =  "";

                    if (isset($_POST['signup'])) {
                        $username = $_POST['username'];
                        $email = $_POST["email"];
                        $password = $_POST["password"];
                        $passwordConf = $_POST["passwordConf"];
                        mysqli_real_escape_string($conn, $username);
                        mysqli_real_escape_string($conn, $email);
                        mysqli_real_escape_string($conn, $password);
                        mysqli_real_escape_string($conn, $passwordConf);
                        /* Email Validation */
                        $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
                        $sql = "SELECT * FROM admin_registration";
                        $check_email = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($check_email)) {
                            $email_check = $row['admin_email'];


                        if ($email_check === $email) {
                                $sameEmailErr = "Email Already in use. Try another one";
                            }
                        }
                        /* Username Validation */
                        if ($username === "") {
                            $usernameErr = "Enter a Name";
                        }
                        elseif (!preg_match($pattern, $email)) {
                            $emailErr = "Enter correct email address";
                        }
                        
                        /* Password Validation */
                        elseif ($password === "") {
                            $passErr = "Enter Password";
                        }
                        /* Password Matching */
                        elseif ($passwordConf !== $password) {
                            $passConfErr = "Passwords Doesn't match";
                        } else {
                            $sql = "INSERT INTO `admin_registration` (`admin_id`, `admin_username`, `admin_email`, `admin_password`) VALUES (NULL, '$username', '$email', '$password');";
                            mysqli_query($conn, $sql);
                        }
                    }
                    ?>

                    <!-- Admin Registration -->
                    
                        <div class="row">
                            <div class="col-lg-3 col-md-4 ">
                                <form action="add_admins.php" method="post">
                                    <h3 class="text-center ">Add Admins</h3>
                                    <div class="form-group">
                                        <label for="username">Name</label>
                                        <input type="text" name="username" placeholder="Enter Full Name" class=" form-control form-control-lg">

                                        <!-- <div class="alert-warning alert-dismissible"> -->
                                        <p style=color:red;><?php echo $usernameErr; ?></p>

                                        <!-- </div> -->

                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" placeholder="Enter Email" class=" form-control form-control-lg">
                                        <p style=color:red;><?php echo $sameEmailErr; ?></p>
                                        <p style=color:red;><?php echo $emailErr; ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" placeholder="Password" class=" form-control form-control-lg">
                                        <p style=color:red;><?php echo $passErr; ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="passwordConf">Re-Enter Password</label>
                                        <input type="password" name="passwordConf" placeholder="ReEnter Password" class=" form-control form-control-lg">
                                        <p style=color:red;><?php echo $passConfErr; ?></p>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="signup" class="btn btn-block btn-primary btn-lg">Sign
                                            Up</button>
                                    </div>
                                </form>
                            </div>


                        </div>
                        <!-- /.container-fluid -->
                        <?php include '../includes/footer.php';  ?> 

                    
                    <!-- /#page-wrapper -->

                </div>
                <!-- /#wrapper -->
                <!-- jQuery -->
                <script src="js/jquery.js"></script>

                <!-- Bootstrap Core JavaScript -->
                <script src="js/bootstrap.min.js"></script>

    </body>

    </html>
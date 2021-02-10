
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top " role="navigation">
        <div class="container ">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header ">
                <button type="button" class="navbar-toggle" data-toggle="collapse"  data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                    <?php 
                        $sql = "SELECT * from categories";
                        $all_categories = mysqli_query($conn, $sql); 
                        while ($row = mysqli_fetch_assoc($all_categories)) {
                            $cat_title = $row['cat_title'];
                            echo "<li><a href='category.php?category=$cat_title'>$row[cat_title]</a></li>";
                        
                            
                        }
                    ?>
                
                    <li style="padding-left: 100px;"> .</li>    
                    <li style="background-color: white;">
                        <a href="./admin/admin_login.php"><b style="color: black;">Admin</b></a>
                    </li><li>.</li>
                    <li style="background-color: white;">
                        <a href="registration.php"><b style="color: black;">Register</b></a>
                    </li><li>.</li>
                    <!--               ACCOUNT              -->
                    <?php if (isset($_SESSION['username'])) {  ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <b style="color: white;">
                        <?php
                        
                            echo $_SESSION['username'];  ?></b><b class="caret"></b></a></a>
                            <ul class="dropdown-menu">
                            <li>
                                    <a href="./news_sugg.php" ><i class="fa fa-fw fa-power-off"></i>Suggest a News</a>
                                </li>
                                <li>
                                    <a href="./includes/logout.php" ><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                                </li>
                       <?php }?>
                       
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
                        
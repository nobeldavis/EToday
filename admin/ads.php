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
                    <div class="col-lg-12" style="padding-bottom: 30px;padding-top:10px;">
                        <h1 class="page-header">
                            EToday
                            <small>Advertisements</small>
                        </h1>
                        <div class="col-lg-6 col-xs-12" >
                            <?php if(!isset($_SESSION['ad_exist'])){?>
                            <form action="ads.php" method="post" enctype="multipart/form-data"> 
                                <div class="form-group">
                                    <h4>Add Advertisement Image</h4>
                                    <input type="file" name="ad">
                                </div>
                                
                                <div class="form-group" style="padding-bottom: 30px;">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Display Ad" >
                                </div>
                                </form>
                                <?php 
                            }  

                            
                            if (isset($_POST['submit'])) {        
                                $ad = $_FILES['ad']['name'];
                                $ad_temp = $_FILES['ad']['tmp_name'];
                                if($ad == ""){
                                    echo '<script>alert("You have to select an image.Try again...")</script>';
                                } else {
                                move_uploaded_file($ad_temp, "../ads/$ad");
                                
                                $sql = "INSERT INTO `ads` (`ad_id`,`ad_image`) VALUES (NULL, '$ad')";

                                $add_ad = mysqli_query($conn, $sql);
                                if (!$add_ad) {
                                    die('Failed' . mysqli_error($add_ad));
                                } 
                                $_SESSION['ad_exist'] = 'ad_exist';
                                header("location:ads.php");

                                }
                            }
                            ?>


                            <?php
                                $sql2 = "SELECT * from ads";
                                $all_ads = mysqli_query($conn, $sql2);
                                while ($row = mysqli_fetch_assoc($all_ads)) {
                                    $ad_id = $row['ad_id'];
                                    $ad = $row['ad_image'];
                                    
                                    ?>
                                    
                                    <img style="width: 100%;padding-bottom: 30px;" src="../ads/<?php echo $ad;  ?>" alt="ad">
                                    
                                    <?php echo "<a href=ads.php?delete=$ad_id><button class='btn btn-block btn-primary btn-lg'>Delete Ad</button></a>";  ?> <br>       
                                    <?php 
                                } 
                                /* DELETE */
                                if (isset($_GET['delete'])) {
                                    $the_ad_id = $_GET['delete'];
                                    $sql3 = "DELETE from ads where ad_id = '$the_ad_id'";
                                    $delete_ad_query = mysqli_query($conn, $sql3);
                                    unset($_SESSION['ad_exist']);
                                    header("location:ads.php");
                                } 
                            ?> 


                        </div> 
                    </div>
                    
                </div>
                <!-- /.row -->
                <?php include '../includes/footer.php';  ?>                    
            </div>
            <!-- /.container-fluid -->
            
            

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
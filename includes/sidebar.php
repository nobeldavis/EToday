<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">





    <!-- Blog Search Well -->
    <div class="well search" style="border-radius: 10px;">
        <h4 style="color: white;">Search News</h4>
        <!-- SEARCH FORM-->
        <form action="search.php" method="post">
            <div class="input-group">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                    <button name='submit' class="btn btn-primary" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
    </div>

    <!-- L O G I N    F O R M -->
    <div class="well login" style="border-radius: 10px;">
        <h4 style="color: white;">Login</h4>
        <form action="./index.php" method="post">
            <div class="form-group">
                <input name="email" type="text" class="form-control" placeholder="Email">
            </div>
            <div class="input-group">
                <input name="password" type="password" class="form-control" placeholder="Password">
                <span class="input-group-btn">
                    <button name='login' class="btn btn-primary" type="submit">Login</button>
                </span>
            </div>
        </form>
    </div>


    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                <?php 
                    $sql = "SELECT * from categories";
                    $all_categories = mysqli_query($conn, $sql); 
                    while ($row = mysqli_fetch_assoc($all_categories)) {
                        $cat_title = $row['cat_title'];
                        echo "<li><a href='category.php?category=$cat_title'>$row[cat_title]</a></li>";
                    
                        
                    }
                    ?>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>
    
    <?php
        $sql2 = "SELECT * from ads";
        $all_ads = mysqli_query($conn, $sql2);
        while ($row = mysqli_fetch_assoc($all_ads)) { 
            $ad = $row['ad_image'];
        }?>
    <img src="./ads/<?php echo $ad; ?>" alt="" style="width: 100%; padding-bottom:20px;" > 
    


    

    <!-- Side Widget Well -->
    <div class="well" style="background-color: #99ff33;">
        <h4 style="font-family: 'Noto Sans JP', sans-serif;font-weight: 700;"><a style="color:white;text-decoration: none" href="./about.php">Contact us</a></h4>
    </div>

</div>
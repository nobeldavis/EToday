
<?php 


function insert_category() {
    global $conn;

    if (isset($_POST['submit'])) {        
        $cat_title = $_POST['cat_title'];
        $sql = "INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES (NULL, '$cat_title')";
        $create_cat_query = mysqli_query($conn, $sql);
        if (!$create_cat_query) {
            die('Failed' . mysqli_error($create_cat_query));
        }
    }

}  

function delete_category(){
    global $conn;

    if (isset($_GET['delete'])) {
        $the_cat_id = $_GET['delete'];
        $sql = "DELETE from categories where cat_id = '$the_cat_id'";
        mysqli_query($conn, $sql);
        header("location:categories.php");
    }
}


function update_category(){
    global $conn;
    if (isset($_GET['edit'])) {
        $cat_update_id = $_GET['edit'];
        $sql = "SELECT * from categories where cat_id = '$cat_update_id' ";
        $update_cat_query = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($update_cat_query)) {
            $cat_title = $row['cat_title'];
            $cat_id = $row['cat_id'];
            echo $cat_id;
    ?>     <form action="categories.php" method="post">
                <div class="form-group">
                    <input value="<?php if (isset($cat_title)) {
                                        echo $cat_title;
                                    }  ?>" type="text" class="form-control" required name="cat_title">
                </div>


                <div class="form-group">
                    <input value="<?php if (isset($cat_id)) {
                                        echo $cat_id;
                                    }  ?>" type="text" class="form-control" required name="cat_id">
                </div>



                <div class="form-group" style="float: left; padding-right:20px; ">
                    <input class="btn btn-primary" type="submit" name="submit2" value="Update">
                </div>
                <!-- header("location:categories.php");  -->
             <?php                    
        }
                                
    }
                        

     if (isset($_POST['submit2'])) {

    $cat_title = $_POST['cat_title'];

    $cat_id = $_POST['cat_id'];
    $sql = "UPDATE `categories` SET `cat_title` = '$cat_title' WHERE `categories`.`cat_id` = '$cat_id' ";
    mysqli_query($conn, $sql);
    } 
    
}








?>
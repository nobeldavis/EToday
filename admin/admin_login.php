<!-- <?php  include "../includes/db.php"; ?>
<!-- Header -->
 <?php  include "../includes/header.php"; ?>
<?php if(isset($_SESSION['admin_username'])){
    header("location: index.php");
}  ?>


 <!-- LOGIN -->
    <?php 
    $wrong = "";
    if (isset($_POST['login'])) {
        
        $email = $_POST["email"];
        $password = $_POST["password"];
        $admin_email = "";
        $admin_password ="";

        $email = mysqli_real_escape_string($conn,$email);
        $password = mysqli_real_escape_string($conn,$password);

        $sql = "SELECT * FROM admin_registration WHERE (`admin_email`, `admin_password`) = ('$email', '$password')  ";
        $select_admin_query = mysqli_query($conn, $sql);
        if(!$select_admin_query){
            die('Query Failed'.mysqli_error($conn));
        }
        while ($row=mysqli_fetch_array($select_admin_query)) {
            $admin_username = $row['admin_username'];
            $admin_email = $row['admin_email'];
            $admin_password = $row['admin_password'];  
        }
        if($email === $admin_email && $password === $admin_password){
            $_SESSION['admin_username'] = $admin_username;
            header("Location: index.php");

        }
        elseif ($email !== $admin_email && $password !== $admin_password) {
            $wrong = "Wrong credentials, Try again...";
        }
        else{
            header("Location: ../index.php");
        }   
     
}

?>

<!-- Admin Login -->
            <div class="col-xs-12 col-md-6 col-lg-3 col-lg-offset-4">
                <form action="admin_login.php" method="post">
                    <h3 class="text-center ">Admin Login</h3>
                    <div class="form-group">
                        
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text"  name="email" placeholder="Enter Email" class=" form-control form-control-lg">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password"  name="password" placeholder="Password" class=" form-control form-control-lg">
                        <p style=color:red;><?php echo $wrong; ?></p>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="login" class="btn btn-block btn-primary btn-lg">Log In</button>
                        
                    </div>
                    
                </form>
                <form action="../index.php"><div class="form-group">
                        <button  style="background-color: #00ff00;color:white" type="submit" name="login" class="btn btn-block  btn-lg" >Go Back</button>
                    </div></form>
            </div>
        </div>
    </div>

        <hr>




<!-- footer -->
<?php include "../includes/footer.php";?>

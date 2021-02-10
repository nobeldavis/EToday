<?php include "db.php"  ?>

<?php 
if(isset($_POST['signup'])){
    $email = $_POST['email'];
    $password =$_POST['password'];
    $passwordConf = $_POST['passwordConf'];

    if($passwordConf !== $password){
        $passErr = "Password Doesn't match";
        
    }
    else{

    $sql = "INSERT INTO `user_registration` (`user_id`, `username`, `email`, `password`) VALUES (NULL, '', '$email', '$password');" ;  
    mysqli_query($conn,$sql) ;


    echo "<b style=color:green;>Entered data successfully\n</b>"; 
 
    }
}

?>
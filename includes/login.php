<!-- <?php include "db.php"  ; ?>
<?php session_start();  ?>

<?php 
if (isset($_POST['login'])) {
    $wrong = "";
    $db_email = "";
    $db_password = "";
    global $conn;
    $email = $_POST["email"];
    $password = $_POST["password"];

    $email = mysqli_real_escape_string($conn,$email);
    $password = mysqli_real_escape_string($conn,$password);

    $sql = "SELECT * FROM user_registration WHERE (`email`, `password`) = ('$email', '$password')  ";
    $select_user_query = mysqli_query($conn, $sql);
    if(!$select_user_query){
        die('Query Failed'.mysqli_error($conn));
    }
    while ($row=mysqli_fetch_array($select_user_query)) {
        $db_username = $row['username'];
        $db_email = $row['email'];
        $db_password = $row['password'];
    }
    if($email === $db_email && $password === $db_password){
        $_SESSION['username'] = $db_username;
        header("Location: ../index.php");
    }
    elseif ($email !== $db_email && $password !== $db_password){
        $wrong = "Wrong credentials, Try again...";
    }
    else{
        header("Location: ../index.php");
    }
    
}

 ?> -->
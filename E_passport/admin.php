<?php
include 'config.php';
session_start();
if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = mysqli_real_escape_string($conn,$_POST['password']);
    $select = mysqli_query($conn, "SELECT * FROM `admin` WHERE email='$email'AND password='$pass' ") or die('query failed');
    
   if(mysqli_num_rows($select)>0){
        $row=mysqli_fetch_assoc($select);
        $_SESSION['admin_id'] = $row['id'];
        header('location:adminindex.php');
    }else{
       $message[] = 'incorrect password or email!';     
    } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>
    <link rel="stylesheet" href="style.css">
    <p style="background-image: url('log.webp');">
</head> 
<body>
    <?php
    if(isset($message)) {
        foreach($message as $message){
        echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
        }
    }
    ?>
    <div class="form-container">
        <form action="" method="post">
            <h3>Admin login </h3>
             <input type="email" name="email" required placeholder="Enter email" class="box">
             <input type="password" name="password" required placeholder="Enter password" class="box">
             <a href=adminindex.php><input type="submit" name="submit"  class="btn" style="color:white " value="login now!"></a>
            </form>             
    </div>
</body>
</html>
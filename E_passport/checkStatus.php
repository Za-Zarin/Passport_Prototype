<?php
include 'config.php';
session_start();
if(isset($_POST['submit'])){
    $id = mysqli_real_escape_string($conn,$_POST['ApplicationID']);
    $select = mysqli_query($conn, "SELECT * FROM `status` WHERE ApplicationID='$id' ") or die('query failed');
    
   if(mysqli_num_rows($select)>0){
        $row=mysqli_fetch_assoc($select);
        $_SESSION['ApplicationID'] = $row['ApplicationID'];
        header('location:final.php');
    }else{
       $message[] = 'incorrect application id!';     
    } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check status</title>
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
            <h3>Check Status </h3>
             <input type="status" name="ApplicationID" required placeholder="Enter ApplicationID" class="box">
              <a href=final.php><input type="submit" name="submit"  class="btn" style="color:white " value="Check now!"></a>
            </form>             
    </div>
</body>
</html>
<?php
include 'config.php';
session_start();
$applicant_id = $_SESSION['ApplicationID'];
if(!isset($applicant_id)){
  header('location: final.php');
};
if(isset($_GET['logout'])){
    unset($applicant_id);
    session_destroy();
    header('location:check-status.html');
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>status3</title>
    <!-- Bootsrap CND -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

    <!-- Custome CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    if(isset($message)) {
        foreach($message as $message){
        echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
        }
    }
    ?>
    <div class="container" >
        <div class="user-profile">
            <?php
            $select_user = mysqli_query($conn,"SELECT ApplicationID, Status FROM  status WHERE (ApplicationID = '$applicant_id')") or die('query failed!');
            if(mysqli_num_rows($select_user) > 0) {
                $fetch_user = mysqli_fetch_assoc($select_user);
            };
          ?>
         <p>Application ID : <span><?php echo $fetch_user['ApplicationID']; ?></span></p>
          <p>Status : <span><?php echo $fetch_user['Status']; ?></span></p>
          <a href="final.php?logout=<?php echo $applicant_id; ?>" onclick="return confirm('are you sure you want to go back?');" class="d">back</a>
         </div>
    </div>
</body>
</html>
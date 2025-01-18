
<?php
include 'config.php';
session_start();
$admin_id = $_SESSION['admin_id'];
if(!isset($admin_id)){
  header('location: admin.php');
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link rel="stylesheet" href="style.css">
    <p style="background-image: url('bhut.jpg');">
</head>
<body>
    
    <div class="navbar">
  <a href="adminindex.php">Profile</a>
  <a href="">About</a>
  <div class="dropdown">
    <button class="dropbtn">Dropdown
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="manageApplicant.php">Manage Application</a>
      <a href="UrgentApplicant.php">urgent Application</a>
      <a href="viewuser.php">View Member</a>
      <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox">Check Mail</a>
    </div>
  </div>
  <a href="apply-online.html" onclick="return confirm('are you sure you want to logout?');">logout</a>
    
</div>
    <div class="dash2">
         <img src="adminPic.jpg" class="dash2"  width="150px">
         <?php
            $select_admin = mysqli_query($conn,"SELECT * FROM `admin` WHERE id = '$admin_id'") or die('query failed!');
            if(mysqli_num_rows($select_admin) > 0) {
                $fetch_user = mysqli_fetch_assoc($select_admin);
            };
          ?>
          <p>username: <span><?php echo $fetch_user['name']; ?></span></p>
          <p>email: <span><?php echo $fetch_user['email']; ?></span></p>
    </div>
</body>
</html>
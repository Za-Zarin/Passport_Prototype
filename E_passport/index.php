<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
if(!isset($user_id)){
  header('location: login.php');
};
if(isset($_GET['logout'])){
    unset($user_id);
    session_destroy();
    header('location: apply-online.html');
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping cart</title>
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
            $select_user = mysqli_query($conn,"SELECT * FROM `user` WHERE id = '$user_id'") or die('query failed!');
            if(mysqli_num_rows($select_user) > 0) {
                $fetch_user = mysqli_fetch_assoc($select_user);
            };
          ?>
          <p>username: <span><?php echo $fetch_user['name']; ?></span></p>
          <p>email: <span><?php echo $fetch_user['email']; ?></span></p>
          <div class="flex">
              <a href="login.php" class="b" >login</a>
              <a href="register.php" class="c">register</a>
              <a href="index.php?logout=<?php echo $user_id; ?>" onclick="return confirm('are you sure you want to logout?');" class="d">logout</a>
          </div>
        </div>
    </div>
    <section class="cards" style="background:#e7e5e5; padding: 60px 0px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mt-4">
                    <div class="d-flex p-5 rounded shadow bg-white">
                        <i class="fa-solid fa-display h1"></i>
                        <div class="content ms-4">
                            <h6 style="font-weight:bold;">Apply Online for <br> e‑Passport </h5>
                                <span class="d-flex justify-content-between align-items-center mt-4 mb-4"> <a
                                        href="application.php">Directly to online <br> Application</a> <i
                                        class="fa-solid fa-angle-right"></i> </span>
                        </div>
                    </div>

                </div>

                <div class="col-lg-4 col-md-6 mt-4">
                    <div class="d-flex p-5 rounded shadow bg-white">
                        <i class="fa-solid fa-list h1"></i>
                        <div class="content ms-4">
                            <h6 style="font-weight:bold;">Urgent Application</h6>
                            <span class="d-flex justify-content-between align-items-center mt-5 pb-4"> <a
                                    href="urgent.php">Information about all <br> Application Steps</a> <i
                                    class="fa-solid fa-angle-right"></i> </span>
                        </div>
                    </div>

                </div>

                <div class="col-lg-4 col-md-6 mt-4">
                    <div class="d-flex p-5 rounded shadow bg-white">
                        <i class="fa-solid fa-clock h1"></i>
                        <div class="content ms-4">
                            <h6 style="font-weight:bold;">Check Status</h6>
                            <span class="d-flex pb-5 justify-content-between align-items-center mt-4"> <a href="check-status.html">Need a
                                    passport <br> Check?</a> <i class="fa-solid fa-angle-right"></i> </span>
                        </div>
                    </div>

                </div>

                <div class="col-lg-4 col-md-6 mt-4">
                    <div class="d-flex p-5 rounded shadow bg-white">
                        <img style="width:35px; height:40px;"
                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/62/Taka_%28Bengali_letter%29.svg/1200px-Taka_%28Bengali_letter%29.svg.png"
                            alt="">
                        <div class="content ms-4">
                            <h6 style="font-weight:bold;">Passport Fees</h5>
                                <span class="d-flex justify-content-between  align-items-center mt-4 mb-5"> <a
                                        href="passportFee.php">Payment Information <br> and options </a> <i
                                        class="fa-solid fa-angle-right"></i> </span>
                        </div>
                    </div>

                </div>

                <div class="col-lg-4 col-md-6 mt-4">
                    <div class="d-flex p-5 rounded shadow bg-white">
                        <img style="width:50px; height:50px"
                            src="https://d29fhpw069ctt2.cloudfront.net/icon/image/39127/preview.png" alt="">
                        <div class="content ms-4">
                            <h6 style="font-weight:bold;">Apply For correction</h6>
                            <span class="d-flex justify-content-between align-items-center mt-5 pb-4"> <a href="correction.php">Have a
                                    look before <br> applying</a> <i class="fa-solid fa-angle-right"></i> </span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

</body>
</html>
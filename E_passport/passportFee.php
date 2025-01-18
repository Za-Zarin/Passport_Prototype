<?php
include 'config.php';
if(isset($_POST['submit'])){
    $id = mysqli_real_escape_string($conn,$_POST['ApplicationID']);
    $payment = mysqli_real_escape_string($conn,$_POST['payment']);
    $ApplicationType = mysqli_real_escape_string($conn,$_POST['ApplicationType']);

    $select = mysqli_query($conn, "SELECT DISTINCT * FROM `payment` WHERE ApplicationID='$id' ") or die('query failed');

    if(mysqli_num_rows($select)>0){
        mysqli_query($conn,"UPDATE `payment` SET ApplicationID='$id',payment='$payment',ApplicationType='$ApplicationType' WHERE ApplicationID='$id'") or die('query failed');
       $message[] = 'Updated successfully!';
    }else{
        mysqli_query($conn,"INSERT INTO `payment` (ApplicationID, payment, ApplicationType) VALUES('$id','$payment','$ApplicationType')") or die('query failed');
       $message[] = 'Updated successfully!';
    } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
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
    <div class="form-container">
        <form action="" method="post">
            <h3>pay the fees</h3>
             <input type="text" name="ApplicationID" required placeholder="Enter ApplicationID" class="box">
             <input type="text" name="payment" id="payment" required placeholder="Update payment" class="box">
             <select name="ApplicationType" id="ApplicationType"  required class="box" onchange="updatePayment()">
                    <option value="" disabled selected>Select Application Type</option>
                    <option value="Usual">Usual</option>
                    <option value="regular">regular</option>
                    <option value="urgent">urgent</option>
                </select>
             <input type="submit" name="submit"  class="btn" style="color:white " value="Update now!">
            <p >Back?<a href="index.php">Back?</a></p>
            </form>             
    </div>
    <script>
function updatePayment() {
    var applicationType = document.getElementById("ApplicationType").value;
    var paymentInput = document.getElementById("payment");

    // Assuming you want to set different payment amounts based on the selected application type
    // You can adjust these values as needed
    var paymentValue = "";
    switch(applicationType) {
        case "Usual":
            paymentValue = "4000"; // Example payment amount for Usual
            break;
        case "regular":
            paymentValue = "6000"; // Example payment amount for regular
            break;
        case "urgent":
            paymentValue = "9000"; // Example payment amount for urgent
            break;
        default:
            paymentValue = ""; // Default to empty string
    }

    // Set the value of the payment input field
    paymentInput.value = paymentValue;
}
</script>
</body>
</html>
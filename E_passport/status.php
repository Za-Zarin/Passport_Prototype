<?php
include 'config.php';
if (isset($_POST['submit'])) {
    $id = mysqli_real_escape_string($conn, $_POST['ApplicationID']);
    $status = mysqli_real_escape_string($conn, $_POST['Status']);
    $select = mysqli_query($conn, "SELECT DISTINCT * FROM `status` WHERE ApplicationID='$id' ") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        mysqli_query($conn, "UPDATE `status` SET Status='$status' where ApplicationID='$id'") or die('query failed');
        $message[] = 'Updated successfully!';
    } else {
        mysqli_query($conn, "INSERT INTO `status`(ApplicationID,Status) VALUES('$id','$status')") or die('query failed');
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
    if (isset($message)) {
        foreach ($message as $message) {
            echo '<div class="message" onclick="this.remove();">' . $message . '</div>';
        }
    }
    ?>
    <div class="form-container">
        <form action="" method="post">
            <h3>Update Status</h3>
            <input type="text" name="ApplicationID" id="ApplicationID" required placeholder="Enter ApplicationID" class="box">
            <select name="Status" id="Status" required class="box">
                <option value="" disabled selected>Select Update Status</option>
                <option value="Complete">Complete</option>
                <option value="pending">pending</option>
            </select>
            <input type="submit" name="submit" class="btn" style="color:white " value="Update now!">
            <p>Back?<a href="ViewStatus.php">checkApplication</a></p>
        </form>
    </div>
    <script>
        var applicationId = document.getElementById("ApplicationID");
        const urlParams = new URLSearchParams(window.location.search);
        const status = urlParams.get('Status');

        // Set the value of the input field with id "ApplicationID" using the correct variable name
        applicationId.value = status;
    </script>
</body>

</html>
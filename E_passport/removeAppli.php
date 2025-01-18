<?php
require('db.php');
if (isset($_POST["remove"])) {
$id = $_POST['ApplicationID'];
$delete_query = "DELETE FROM payment WHERE ApplicationID = '$id'";
$delete_result = mysqli_query($conn, $delete_query);

if ($delete_result) {
if (mysqli_affected_rows($conn) > 0) {
echo "Data removed successfully.";
} else {
echo "No matching ID found to remove.";
}
} else {
echo "Failed to remove data: " . mysqli_error($conn);
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Remove Student Data</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div style="text-align: center; margin-top: 20px;">
<a href="manageApplicant.php" class="view-button">View Data</a>
</div>';
<div class="remove-form">
<h2>Remove Aplicant Data</h2>
<form action="removeAppli.php" method="post">
<label for="id">Enter ID to Remove:</label>
<input type="number" id="id" name="ApplicationID" required>

<button type="submit" name="remove">Remove Applicant</button>
</form>
</div>
</body>
</html>
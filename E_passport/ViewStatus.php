<?php
require('db.php');
$query = "SELECT DISTINCT application.ApplicationID,nameofapplicant,Email,payment,Status  FROM application,payment,status WHERE (application.ApplicationID=payment.ApplicationID) and (status.ApplicationID=payment.ApplicationID) ";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Application Data</title>
<link rel="stylesheet" type="text/css" href="style.css">  
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
      <a href="viewuser.php">View Member</a>
      <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox">Check Mail</a>
    </div>
  </div>
  <a href="apply-online.html" onclick="return confirm('are you sure you want to logout?');">logout</a>
</div>
<div class="viewdata">
<form class="view">
<h2>User applicant List</h2>
<table>
<tr>
    <th>ApplicationID</th>
    <th>nameofapplicant</th>
    <th>Email</th>  
    <th>payment</th> 
    <th>Status</th>
</tr>
<?php
if($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['ApplicationID'] . "</td>";
        echo "<td>" . $row['nameofapplicant'] . "</td>";
        echo "<td>" . $row['Email'] . "</td>";
        echo "<td>" . $row['payment'] . "</td>";
        echo "<td>" . $row['Status'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "Query failed: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
</table>
</form></div>
</body>
</html>

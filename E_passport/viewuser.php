<?php
require('db.php');
$query = "SELECT * FROM user";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View User Data</title>
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
      <a href="UrgentApplicant.php">urgent Application</a>
      <a href="viewuser.php">View Member</a>
      <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox">Check Mail</a>
    </div>
  </div>
  <a href="apply-online.html" onclick="return confirm('are you sure you want to logout?');">logout</a>
</div>
<div class="viewdata">
<form class="view">
<h2>User Data List</h2>
<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>  
    <th>Actions</th>
</tr>
<?php
if($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo '<td> <a href="remove.php?id=' . $row['id'] . '">Remove</a></td>';
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

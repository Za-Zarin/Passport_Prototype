<?php
require('db.php');

// Check if form is submitted
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

// Fetch data from database
$query = "SELECT DISTINCT application.ApplicationID,nameofapplicant,Email,ApplicationType,payment  FROM application,payment WHERE (application.ApplicationID=payment.ApplicationID) ";
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
    <a href="apply-online.html" onclick="return confirm('Are you sure you want to logout?');">Logout</a>
</div>
<div class="viewdata">
    <form class="view" method="POST">
        <h2>User Data List</h2>
        <table>
            <tr>
                <th>ApplicationID</th>
                <th>Name of Applicant</th>
                <th>Email</th>
                <th>Application Type</th>
                <th>Payment</th>
                <th>Update Status</th>
                <th>Remove</th>
            </tr>
            <?php
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['ApplicationID'] . "</td>";
                    echo "<td>" . $row['nameofapplicant'] . "</td>";
                    echo "<td>" . $row['Email'] . "</td>";
                    echo "<td>" . $row['ApplicationType'] . "</td>";
                    echo "<td>" . $row['payment'] . "</td>";
                    echo '<td><a href="status.php?Status=' . $row['ApplicationID'] . '">UpdateStatus</a></td>';
                    echo '<td> 
                            <form method="POST">
                                <input type="hidden" name="ApplicationID" value="' . $row['ApplicationID'] . '">
                                <button type="submit" name="remove">Remove Applicant</button>
                            </form>
                          </td>';
                    echo "</tr>";
                }
            } else {
                echo "Query failed: " . mysqli_error($conn);
            }
            mysqli_close($conn);
            ?>
        </table>
    </form>
</div>
</body>
</html>

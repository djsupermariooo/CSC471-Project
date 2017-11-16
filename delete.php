<?php
/*
 * CSC471 Database Project
 * Mario Month
 *
 * delete.php
 *
 * Used to delete records from the database
 */

// Connect to the database
include ('connect.php');

// Retrieve variables from previous script
$tableName = $_GET['tableName'];
$var = $_GET['var'];

// Specify query to delete specific record from the database
if ($tableName == 'employee' || $tableName == 'emp_dependent' || $tableName == 'hourlyemp' || $tableName == 'manager' || $tableName == 'salariedemp' || $tableName == 'works')
{
    $sql_deleteRecord = "DELETE FROM " . $tableName . " WHERE ssn=" . $var;
}
elseif ($tableName == 'department' || $tableName == 'dept_loc')
{
    $sql_deleteRecord = "DELETE FROM " . $tableName . " WHERE deptNum=" . $var;
}
elseif ($tableName == 'project')
{
    $sql_deleteRecord = "DELETE FROM " . $tableName . " WHERE projNum=" . $var;
}
?>

<html>
<head>
    <title>CSC471 Database Project Demo</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>
    <div>
        <h1>CSC 471 Project Demo</h1>
    </div>
</header>
<div>
    <?php
    // Delete chosen record from the database
    if (mysqli_query($conn, $sql_deleteRecord)) {
        echo "<p>Record deleted successfully</p>";
    } else {
        echo "<p>Error deleting record: " . mysqli_error($conn) . "</p>";
    }
    ?>
</div>
<div>
    <a href="index.php">Back</a>
</div>
</body>
</html>

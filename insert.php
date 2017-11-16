<?php
/*
 * CSC471 Database Project
 * Mario Month
 *
 * insert.php
 *
 * Used for getting user data to insert to the database
 */

// Connect to the database
include ('connect.php');

// Retrieve variable sent from previous script
$tableName = $_GET['tableName'];
?>

<html>
<head>
    <title>CSC 471 Database Project Demo</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>
    <div class="topbar">
        <h1>CSC 471 Project Demo</h1>
    </div>
</header>
<!-- Display the current database table -->
<div>
    <h3><?php echo $tableName ?></h3>
</div>
<!-- Display example input for user -->
<div>
    <h4>Example Input: </h4>
</div>
<div>
    <?php

    // Get an example row from the current database table and display to the user, then display the correct
    // form based on what fields are available for the current table
    if ($tableName == "employee")
    {
        echo "<table>";
        echo "<tr>";
        echo "<th>ssn</th><th>fName</th><th>mInit</th><th>lName</th><th>address</th><th>dateOfBirth</th>";
        echo "</tr>";
        echo "<tr>";
        $sql_getExampleRow = "SELECT * FROM employee";
        $result = mysqli_query($conn, $sql_getExampleRow);
        $row = mysqli_fetch_row($result);
        echo "<td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td>";
        $result->free();
        echo "</tr>";
        echo "</table>";

        echo "<div>";
        echo "<form action='add.php' method='post'>";
        echo "<fieldset>";
        echo "<label for='ssn'>ssn: *</label><input type='text' name='ssn'><br>";
        echo "<label for='fName'>fName: *</label><input type=text name='fName'><br>";
        echo "<label for='mInit'>mInit:</label><input type='text' name='mInit'><br>";
        echo "<label for='lName'>lName: *</label><input type='text' name='lName'><br>";
        echo "<label for='address'>address:</label><input type='text' name='address'><br>";
        echo "<label for='dateOfBirth'>dateOfBirth:</label><input type='text' name='dateOfBirth'><br>";
        echo "</fieldset>";
        echo "<input type='submit' value='Submit' name='submit_emp_info'>";
        echo "<p>* Required</p>";
        echo "</div>";
    }
    elseif ($tableName == "department")
    {
        echo "<table>";
        echo "<tr>";
        echo "<th>deptNum</th><th>deptName</th>";
        echo "</tr>";
        echo "<tr>";
        $sql_getExampleRow = "SELECT * FROM department";
        $result = mysqli_query($conn, $sql_getExampleRow);
        $row = mysqli_fetch_row($result);
        echo "<td>$row[0]</td><td>$row[1]</td>";
        $result->free();
        echo "</tr>";
        echo "</table>";

        echo "<div>";
        echo "<form action='add.php' method='post'>";
        echo "<fieldset>";
        echo "<label for='deptNum'>deptNum: *</label><input type='text' name='deptNum'><br>";
        echo "<label for='deptName'>deptName: *</label><input type=text name='deptName'><br>";
        echo "</fieldset>";
        echo "<input type='submit' value='Submit' name='submit_dept_info'>";
        echo "<p>* Required</p>";
        echo "</div>";
    }
    elseif ($tableName == 'dept_loc')
    {
        echo "<table>";
        echo "<tr>";
        echo "<th>deptNum</th><th>location</th>";
        echo "</tr>";
        echo "<tr>";
        $sql_getExampleRow = "SELECT * FROM dept_loc";
        $result = mysqli_query($conn, $sql_getExampleRow);
        $row = mysqli_fetch_row($result);
        echo "<td>$row[0]</td><td>$row[1]</td>";
        $result->free();
        echo "</tr>";
        echo "</table>";

        echo "<div>";
        echo "<form action='add.php' method='post'>";
        echo "<fieldset>";
        echo "<label for='deptNum'>deptNum: *</label><input type='text' name='deptNum'><br>";
        echo "<label for='location'>location: *</label><input type=text name='location'><br>";
        echo "</fieldset>";
        echo "<input type='submit' value='Submit' name='submit_deptloc_info'>";
        echo "<p>* Required</p>";
        echo "</div>";
    }
    elseif ($tableName == 'emp_dependent')
    {
        echo "<table>";
        echo "<tr>";
        echo "<th>ssn</th><th>name</th><th>relationship</th>";
        echo "</tr>";
        echo "<tr>";
        $sql_getExampleRow = "SELECT * FROM emp_dependent";
        $result = mysqli_query($conn, $sql_getExampleRow);
        $row = mysqli_fetch_row($result);
        echo "<td>$row[0]</td><td>$row[1]</td><td>$row[2]</td>";
        $result->free();
        echo "</tr>";
        echo "</table>";

        echo "<div>";
        echo "<form action='add.php' method='post'>";
        echo "<fieldset>";
        echo "<label for='ssn'>ssn: *</label><input type='text' name='ssn'><br>";
        echo "<label for='name'>name:</label><input type=text name='name'><br>";
        echo "<label for='relationship'>relationship:</label><input type=text name='relationship'><br>";
        echo "</fieldset>";
        echo "<input type='submit' value='Submit' name='submit_empdep_info'>";
        echo "<p>* Required</p>";
        echo "</div>";
    }
    elseif ($tableName == 'hourlyemp')
    {
        echo "<table>";
        echo "<tr>";
        echo "<th>ssn</th><th>hourlyPay</th>";
        echo "</tr>";
        echo "<tr>";
        $sql_getExampleRow = "SELECT * FROM hourlyemp";
        $result = mysqli_query($conn, $sql_getExampleRow);
        $row = mysqli_fetch_row($result);
        echo "<td>$row[0]</td><td>$row[1]</td>";
        $result->free();
        echo "</tr>";
        echo "</table>";

        echo "<div>";
        echo "<form action='add.php' method='post'>";
        echo "<fieldset>";
        echo "<label for='ssn'>ssn: *</label><input type='text' name='ssn'><br>";
        echo "<label for='hourlyPay'>hourlyPay: *</label><input type=text name='hourlyPay'><br>";
        echo "</fieldset>";
        echo "<input type='submit' value='Submit' name='submit_hremp_info'>";
        echo "<p>* Required</p>";
        echo "</div>";
    }
    elseif ($tableName == 'manager')
    {
        echo "<table>";
        echo "<tr>";
        echo "<th>ssn</th><th>deptNum</th><th>officeNum</th><th>startDate</th>";
        echo "</tr>";
        echo "<tr>";
        $sql_getExampleRow = "SELECT * FROM manager";
        $result = mysqli_query($conn, $sql_getExampleRow);
        $row = mysqli_fetch_row($result);
        echo "<td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td>";
        $result->free();
        echo "</tr>";
        echo "</table>";

        echo "<div>";
        echo "<form action='add.php' method='post'>";
        echo "<fieldset>";
        echo "<label for='ssn'>ssn: *</label><input type='text' name='ssn'><br>";
        echo "<label for='deptNum'>deptNum: *</label><input type=text name='deptNum'><br>";
        echo "<label for='officeNum'>officeNum: *</label><input type='text' name='officeNum'><br>";
        echo "<label for='startDate'>startDate: *</label><input type='text' name='startDate'><br>";
        echo "</fieldset>";
        echo "<input type='submit' value='Submit' name='submit_mgr_info'>";
        echo "<p>* Required</p>";
        echo "</div>";
    }
    elseif ($tableName == 'project')
    {
        echo "<table>";
        echo "<tr>";
        echo "<th>projectName</th><th>projNum</th><th>projDesc</th>";
        echo "</tr>";
        echo "<tr>";
        $sql_getExampleRow = "SELECT * FROM project";
        $result = mysqli_query($conn, $sql_getExampleRow);
        $row = mysqli_fetch_row($result);
        echo "<td>$row[0]</td><td>$row[1]</td><td>$row[2]</td>";
        $result->free();
        echo "</tr>";
        echo "</table>";

        echo "<div>";
        echo "<form action='add.php' method='post'>";
        echo "<fieldset>";
        echo "<label for='projectName'>projectName: *</label><input type='text' name='projectName'><br>";
        echo "<label for='projNum'>projNum: *</label><input type=text name='projNum'><br>";
        echo "<label for='projDesc'>projDesc:</label><input type=text name='projDesc'><br>";
        echo "</fieldset>";
        echo "<input type='submit' value='Submit' name='submit_proj_info'>";
        echo "<p>* Required</p>";
        echo "</div>";
    }
    elseif ($tableName == 'salariedemp')
    {
        echo "<table>";
        echo "<tr>";
        echo "<th>ssn</th><th>monthlySalary</th>";
        echo "</tr>";
        echo "<tr>";
        $sql_getExampleRow = "SELECT * FROM salariedemp";
        $result = mysqli_query($conn, $sql_getExampleRow);
        $row = mysqli_fetch_row($result);
        echo "<td>$row[0]</td><td>$row[1]</td>";
        $result->free();
        echo "</tr>";
        echo "</table>";

        echo "<div>";
        echo "<form action='add.php' method='post'>";
        echo "<fieldset>";
        echo "<label for='ssn'>ssn: *</label><input type='text' name='ssn'><br>";
        echo "<label for='monthlySalary'>monthlySalary: *</label><input type=text name='monthlySalary'><br>";
        echo "</fieldset>";
        echo "<input type='submit' value='Submit' name='submit_salemp_info'>";
        echo "<p>* Required</p>";
        echo "</div>";
    }
    elseif ($tableName == 'works')
    {
        echo "<table>";
        echo "<tr>";
        echo "<th>ssn</th><th>deptNum</th><th>projectName</th><th>projNum</th>";
        echo "</tr>";
        echo "<tr>";
        $sql_getExampleRow = "SELECT * FROM works";
        $result = mysqli_query($conn, $sql_getExampleRow);
        $row = mysqli_fetch_row($result);
        echo "<td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td>";
        $result->free();
        echo "</tr>";
        echo "</table>";

        echo "<div>";
        echo "<form action='add.php' method='post'>";
        echo "<fieldset>";
        echo "<label for='ssn'>ssn: *</label><input type='text' name='ssn'><br>";
        echo "<label for='deptNum'>deptNum: *</label><input type=text name='deptNum'><br>";
        echo "<label for='projectName'>projectName: *</label><input type='text' name='projectName'><br>";
        echo "<label for='projNum'>projNum: *</label><input type='text' name='projNum'><br>";
        echo "</fieldset>";
        echo "<input type='submit' value='Submit' name='submit_works_info'>";
        echo "<p>* Required</p>";
        echo "</div>";
    }
    ?>
</div>
<div>
    <a href="index.php">Back</a>
</div>
</body>
</html>
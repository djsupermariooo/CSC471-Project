<?php
/*
 * CSC471 Database Project
 * Mario Month
 *
 * edit.php
 *
 * Used to display existing record data and allow the user to edit existing values
 */

// Connect to the database
include ('connect.php');

// Retrieve variables sent from previous script
$tableName = $_GET['tableName'];
$var = $_GET['var'];
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
    // Retrieve the requested record from the database
    if ($tableName == 'employee' || $tableName == 'emp_dependent' || $tableName == 'hourlyemp' || $tableName == 'manager' || $tableName == 'salariedemp' || $tableName == 'works')
    {
        $sql_getRecord = "SELECT * FROM " . $tableName . " WHERE ssn=" . $var;
    }
    elseif ($tableName == 'department' || $tableName == 'dept_loc')
    {
        $sql_getRecord = "SELECT * FROM " . $tableName . " WHERE deptNum=" . $var;
    }
    elseif ($tableName == 'project')
    {
        $sql_getRecord = "SELECT * FROM " . $tableName . " WHERE projNum=" . $var;
    }
    $result = mysqli_query($conn, $sql_getRecord);
    $row = mysqli_fetch_row($result);

    // Display the correct fields to edit relative to the chosen table and auto-populate the text boxes with existing
    // values
    if ($tableName == "employee")
    {
        echo "<form action='update.php?var=" . $var . "' method='post'>";
        echo "<fieldset>";
        echo "<label for='ssn'>ssn:</label><input type='text' name='ssn' value='" . $row[0] . "'><br>";
        echo "<label for='fName'>fName:</label><input type=text name='fName' value='" . $row[1] . "'><br>";
        echo "<label for='mInit'>mInit:</label><input type='text' name='mInit' value='" . $row[2] . "'><br>";
        echo "<label for='lName'>lName:</label><input type='text' name='lName' value='" . $row[3] . "'><br>";
        echo "<label for='address'>address:</label><input type='text' name='address' value='" . $row[4] . "'><br>";
        echo "<label for='dateOfBirth'>dateOfBirth:</label><input type='text' name='dateOfBirth' value='"
            . $row[5] . "'><br>";
        echo "</fieldset>";
        echo "<input type='submit' value='Submit' name='submit_emp_info'>";
    }
    elseif ($tableName == "department")
    {
        echo "<form action='update.php?var=" . $var . "' method='post'>";
        echo "<fieldset>";
        echo "<label for='deptNum'>deptNum:</label><input type='text' name='deptNum' value='" . $row[0] . "'><br>";
        echo "<label for='deptName'>deptName:</label><input type=text name='deptName' value='" . $row[1] . "'><br>";
        echo "</fieldset>";
        echo "<input type='submit' value='Submit' name='submit_dept_info'>";
    }
    elseif ($tableName == 'dept_loc')
    {
        echo "<form action='update.php?var=" . $var . "' method='post'>";
        echo "<fieldset>";
        echo "<label for='deptNum'>deptNum:</label><input type='text' name='deptNum' value='" . $row[0] . "'><br>";
        echo "<label for='location'>location:</label><input type=text name='location' value='" . $row[1] . "'><br>";
        echo "</fieldset>";
        echo "<input type='submit' value='Submit' name='submit_deptloc_info'>";
    }
    elseif ($tableName == 'emp_dependent')
    {
        echo "<form action='update.php?var=" . $var . "' method='post'>";
        echo "<fieldset>";
        echo "<label for='ssn'>ssn:</label><input type='text' name='ssn' value='" . $row[0] . "'><br>";
        echo "<label for='name'>name:</label><input type=text name='name' value='" . $row[1] . "'><br>";
        echo "<label for='relationship'>relationship:</label><input type=text name='relationship' value='"
            . $row[2] . "'><br>";
        echo "</fieldset>";
        echo "<input type='submit' value='Submit' name='submit_empdep_info'>";
    }
    elseif ($tableName == 'hourlyemp')
    {
        echo "<form action='update.php?var=" . $var . "' method='post'>";
        echo "<fieldset>";
        echo "<label for='ssn'>ssn:</label><input type='text' name='ssn' value='" . $row[0] . "'><br>";
        echo "<label for='hourlyPay'>hourlyPay:</label><input type=text name='hourlyPay' value='" . $row[1] . "'><br>";
        echo "</fieldset>";
        echo "<input type='submit' value='Submit' name='submit_hremp_info'>";
    }
    elseif ($tableName == 'manager')
    {
        echo "<form action='update.php?var=" . $var . "' method='post'>";
        echo "<fieldset>";
        echo "<label for='ssn'>ssn:</label><input type='text' name='ssn' value='" . $row[0] . "'><br>";
        echo "<label for='deptNum'>deptNum:</label><input type=text name='deptNum' value='" . $row[1] . "'><br>";
        echo "<label for='officeNum'>officeNum:</label><input type='text' name='officeNum' value='" . $row[2] . "'><br>";
        echo "<label for='startDate'>startDate:</label><input type='text' name='startDate' value='" . $row[3] . "'><br>";
        echo "</fieldset>";
        echo "<input type='submit' value='Submit' name='submit_mgr_info'>";
    }
    elseif ($tableName == 'project')
    {
        echo "<form action='update.php?var=" . $var . "' method='post'>";
        echo "<fieldset>";
        echo "<label for='projectName'>projectName:</label><input type='text' name='projectName' value='"
            . $row[0] . "'><br>";
        echo "<label for='projNum'>projNum:</label><input type=text name='projNum' value='" . $row[1] . "'><br>";
        echo "<label for='projDesc'>projDesc:</label><input type=text name='projDesc' value='" . $row[2] . "'><br>";
        echo "</fieldset>";
        echo "<input type='submit' value='Submit' name='submit_proj_info'>";
    }
    elseif ($tableName == 'salariedemp')
    {
        echo "<form action='update.php?var=" . $var . "' method='post'>";
        echo "<fieldset>";
        echo "<label for='ssn'>ssn:</label><input type='text' name='ssn' value='" . $row[0] . "'><br>";
        echo "<label for='monthlySalary'>monthlySalary:</label><input type=text name='monthlySalary' value='"
            . $row[1] . "'><br>";
        echo "</fieldset>";
        echo "<input type='submit' value='Submit' name='submit_salemp_info'>";
    }
    elseif ($tableName == 'works')
    {
        echo "<form action='update.php?var=" . $var . "' method='post'>";
        echo "<fieldset>";
        echo "<label for='ssn'>ssn:</label><input type='text' name='ssn' value='" . $row[0] . "'><br>";
        echo "<label for='deptNum'>deptNum:</label><input type=text name='deptNum' value='" . $row[1] . "'><br>";
        echo "<label for='projectName'>projectName:</label><input type='text' name='projectName' value='"
        . $row[2] . "'><br>";
        echo "<label for='projNum'>projNum:</label><input type='text' name='projNum' value='" . $row[3] . "'><br>";
        echo "</fieldset>";
        echo "<input type='submit' value='Submit' name='submit_works_info'>";
    }
    ?>
</div>
<div>
    <a href="index.php">Back</a>
</div>
</body>
</html>
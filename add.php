<?php
/*
 * CSC471 Database Project
 * Mario Month
 *
 * add.php
 *
 * Used to submit 'insert' data to the database
 */

// Connect to the database
include ('connect.php');
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
    // Inserts user data to the database relative to the table the data is being inserted to
    if (isset($_POST['submit_emp_info']))
    {
        $ssn = $_POST['ssn'];
        $fName = $_POST['fName'];
        $mInit = $_POST['mInit'];
        $lName = $_POST['lName'];
        $address = $_POST['address'];
        $dateOfBirth = $_POST['dateOfBirth'];

        // Validate input
        if (strlen($ssn) != 9)
        {
            echo "<p>ERROR: ssn must be exactly 9 digits. Please try again.</p>";
            echo "<div><a href=\"insert.php?tableName=employee\">Back</a></div>";
        }
        elseif (empty($ssn) || empty($fName) || empty($lName))
        {
            echo "<p>ERROR: Missing required field. Please try again.</p>";
            echo "<div><a href=\"insert.php?tableName=employee\">Back</a></div>";
        }
        else
        {
            $sql_insertNewData = "INSERT INTO employee (ssn, fName, mInit, lName, address, dateOfBirth) VALUES ('$ssn', '$fName', '$mInit', '$lName', '$address', '$dateOfBirth')";
            if (mysqli_query($conn, $sql_insertNewData))
            {
                echo "<p>Record added successfully.</p>";
                echo "<div><a href=\"index.php\">Back</a></div>";
            }
            else
            {
                echo "<p>ERROR: Could not execute " . $sql_insertNewData . " . " . mysqli_error($conn) . "</p>";
                echo "<div><a href=\"insert.php?tableName=employee\">Back</a></div>";
            }
        }
    }
    elseif (isset($_POST['submit_dept_info']))
    {
        $deptNum = $_POST['deptNum'];
        $deptName = $_POST['deptName'];

        // Validate input
        if (empty($deptNum) || empty($deptName))
        {
            echo "<p>ERROR: Missing required field. Please try again.";
            echo "<div><a href=\"insert.php?tableName=department\">Back</a></div>";
        }
        else
        {
            $sql_insertNewData = "INSERT INTO department (deptNum, deptName) VALUES ('$deptNum', '$deptName')";
            if (mysqli_query($conn, $sql_insertNewData))
            {
                echo "<p>Record added successfully.</p>";
                echo "<div><a href=\"index.php\">Back</a></div>";
            }
            else
            {
                echo "<p>ERROR: Could not execute " . $sql_insertNewData . " . " . mysqli_error($conn) . "</p>";
                echo "<div><a href=\"insert.php?tableName=department\">Back</a></div>";
            }
        }
    }
    elseif (isset($_POST['submit_deptloc_info']))
    {
        $deptNum = $_POST['deptNum'];
        $location = $_POST['location'];

        // Validate input
        if (empty($deptNum) || empty($location))
        {
            echo "<p>ERROR: Missing required field. Please try again.</p>";
            echo "<div><a href=\"insert.php?tableName=dept_loc\">Back</a></div>";
        }
        else
        {
            $sql_insertNewData = "INSERT INTO dept_loc (deptNum, location) VALUES ('$deptNum', '$location')";
            if (mysqli_query($conn, $sql_insertNewData)) {
                echo "<p>Record added successfully.</p>";
                echo "<div><a href=\"index.php\">Back</a></div>";
            }
            else
            {
                echo "<p>ERROR: Could not execute " . $sql_insertNewData . " . " . mysqli_error($conn) . "</p>";
                echo "<div><a href=\"insert.php?tableName=dept_loc\">Back</a></div>";
            }
        }
    }
    elseif (isset($_POST['submit_empdep_info']))
    {
        $ssn = $_POST['ssn'];
        $name = $_POST['name'];
        $relationship = $_POST['relationship'];

        // Validate input
        if (strlen($ssn) != 9)
        {
            echo "<p>ERROR: ssn must be exactly 9 digits. Please try again.</p>";
            echo "<div><a href=\"insert.php?tableName=emp_dependent\">Back</a></div>";
        }
        elseif (empty($ssn))
        {
            echo "<p>ERROR: Missing required field. Please try again.</p>";
            echo "<div><a href=\"insert.php?tableName=emp_dependent\">Back</a></div>";
        }
        else
        {
            $sql_insertNewData = "INSERT INTO emp_dependent (ssn, name, relationship) VALUES ('$ssn', '$name', '$relationship')";
            if (mysqli_query($conn, $sql_insertNewData))
            {
                echo "<p>Record added successfully.</p>";
                echo "<div><a href=\"index.php\">Back</a></div>";
            }
            else
            {
                echo "<p>ERROR: Could not execute " . $sql_insertNewData . " . " . mysqli_error($conn) . "</p>";
                echo "<div><a href=\"insert.php?tableName=emp_dependent\">Back</a></div>";
            }
        }
    }
    elseif (isset($_POST['submit_hremp_info']))
    {
        $ssn = $_POST['ssn'];
        $hourlyPay = $_POST['hourlyPay'];

        // Validate input
        if (strlen($ssn) != 9)
        {
            echo "<p>ERROR: ssn must be exactly 9 digits. Please try again.</p>";
            echo "<div><a href=\"insert.php?tableName=hourlyemp\">Back</a></div>";
        }
        elseif (empty($ssn) || empty($hourlyPay))
        {
            echo "<p>ERROR: Missing required field. Please try again.</p>";
            echo "<div><a href=\"insert.php?tableName=hourlyemp\">Back</a></div>";
        }
        else
        {
            $sql_insertNewData = "INSERT INTO hourlyemp (ssn, hourlyPay) VALUES ('$ssn', '$hourlyPay')";
            if (mysqli_query($conn, $sql_insertNewData))
            {
                echo "<p>Record added successfully.</p>";
                echo "<div><a href=\"index.php\">Back</a></div>";
            }
            else
            {
                echo "<p>ERROR: Could not execute " . $sql_insertNewData . " . " . mysqli_error($conn) . "</p>";
                echo "<div><a href=\"insert.php?tableName=hourlyemp\">Back</a></div>";
            }
        }
    }
    elseif (isset($_POST['submit_mgr_info']))
    {
        $ssn = $_POST['ssn'];
        $deptNum = $_POST['deptNum'];
        $officeNum = $_POST['officeNum'];
        $startDate = $_POST['startDate'];

        // Validate input
        if (strlen($ssn) != 9)
        {
            echo "<p>ERROR: ssn must be exactly 9 digits. Please try again.</p>";
            echo "<div><a href=\"insert.php?tableName=manager\">Back</a></div>";
        }
        elseif (empty($ssn) || empty($deptNum) || empty($officeNum) || empty($startDate))
        {
            echo "<p>ERROR: Missing required field. Please try again.</p>";
            echo "<div><a href=\"insert.php?tableName=manager\">Back</a></div>";
        }
        else
        {
            $sql_insertNewData = "INSERT INTO manager (ssn, deptNum, officeNum, startDate) VALUES ('$ssn', '$deptNum', '$officeNum', '$startDate')";
            if (mysqli_query($conn, $sql_insertNewData))
            {
                echo "<p>Record added successfully.</p>";
                echo "<div><a href=\"index.php\">Back</a></div>";
            }
            else
            {
                echo "<p>ERROR: Could not execute " . $sql_insertNewData . " . " . mysqli_error($conn) . "</p>";
                echo "<div><a href=\"insert.php?tableName=manager\">Back</a></div>";
            }
        }
    }
    elseif (isset($_POST['submit_proj_info']))
    {
        $projectName = $_POST['projectName'];
        $projNum = $_POST['projNum'];
        $projDesc = $_POST['projDesc'];

        // Validate input
        if (empty($projectName) || empty($projNum))
        {
            echo "<p>ERROR: Missing required field. Please try again.</p>";
            echo "<div><a href=\"insert.php?tableName=project\">Back</a></div>";
        }
        else
        {
            $sql_insertNewData = "INSERT INTO project (projectName, projNum, projDesc) VALUES ('$projectName', '$projNum', '$projDesc')";
            if (mysqli_query($conn, $sql_insertNewData))
            {
                echo "<p>Record added successfully.</p>";
                echo "<div><a href=\"index.php\">Back</a></div>";
            }
            else
            {
                echo "<p>ERROR: Could not execute " . $sql_insertNewData . " . " . mysqli_error($conn) . "</p>";
                echo "<div><a href=\"insert.php?tableName=project\">Back</a></div>";
            }
        }
    }
    elseif (isset($_POST['submit_salemp_info']))
    {
        $ssn = $_POST['ssn'];
        $monthlySalary = $_POST['monthlySalary'];

        // Validate input
        if (strlen($ssn) != 9)
        {
            echo "<p>ERROR: ssn must be exactly 9 digits. Please try again.</p>";
            echo "<div><a href=\"insert.php?tableName=salariedemp\">Back</a></div>";
        }
        elseif (empty($ssn) || empty($monthlySalary))
        {
            echo "<p>ERROR: Missing required field. Please try again.</p>";
            echo "<div><a href=\"insert.php?tableName=salariedemp\">Back</a></div>";
        }
        else
        {
            $sql_insertNewData = "INSERT INTO salariedemp (ssn, monthlySalary) VALUES ('$ssn', '$monthlySalary')";
            if (mysqli_query($conn, $sql_insertNewData))
            {
                echo "<p>Record added successfully.</p>";
                echo "<div><a href=\"index.php\">Back</a></div>";
            }
            else
            {
                echo "<p>ERROR: Could not execute " . $sql_insertNewData . ". " . mysqli_error($conn) . "</p>";
                echo "<div><a href=\"insert.php?tableName=salariedemp\">Back</a></div>";
            }
        }
    }
    elseif (isset($_POST['submit_works_info']))
    {
        $ssn = $_POST['ssn'];
        $deptNum = $_POST['deptNum'];
        $projectName = $_POST['projectName'];
        $projNum = $_POST['projNum'];

        // Validate input
        if (strlen($ssn) != 9)
        {
            echo "<p>ERROR: ssn must be exactly 9 digits. Please try again.</p>";
            echo "<div><a href=\"insert.php?tableName=works\">Back</a></div>";
        }
        elseif (empty($ssn) || empty($deptNum) || empty($projectName) || empty($projNum))
        {
            echo "<p>ERROR: Missing required field. Please try again.</p>";
            echo "<div><a href=\"insert.php?tableName=works\">Back</a></div>";
        }
        else
        {
            $sql_insertNewData = "INSERT INTO works (ssn, deptNum, projectName, projNum) VALUES ('$ssn', '$deptNum', '$projectName', '$projNum')";
            if (mysqli_query($conn, $sql_insertNewData))
            {
                echo "<p>Record added successfully.</p>";
                echo "<div><a href=\"index.php\">Back</a></div>";
            }
            else
            {
                echo "<p>ERROR: Could not execute " . $sql_insertNewData . ". " . mysqli_error($conn) . "</p>";
                echo "<div><a href=\"insert.php?tableName=works\">Back</a></div>";
            }
        }
    }
    ?>
</div>
</body>
</html>

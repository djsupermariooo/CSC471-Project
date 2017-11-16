<?php
/*
 * CSC471 Database Project
 * Mario Month
 *
 * update.php
 *
 * Used to submit edited values to the database and update record
 */

// Connect to the database
include ('connect.php');

// Retrieve variable sent from previous script
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

    // Updates existing data to the database relative to the table the data is being updated to
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
            echo "<div><a href=\"edit.php?var=" . $var . "&tableName=employee\">Back</a></div>";
        }
        elseif (empty($ssn) || empty($fName) || empty($lName))
        {
            echo "<p>ERROR: Missing required field. Please try again.</p>";
            echo "<div><a href=\"edit.php?var=" . $var . "&tableName=employee\">Back</a></div>";
        }
        else
        {
            $sql_editRecord = "UPDATE employee SET ssn='" . $ssn . "', fName='" . $fName
                . "', mInit='" . $mInit . "', lName='" . $lName . "', address='" . $address
                . "', dateOfBirth='" . $dateOfBirth . "' WHERE ssn=" . $var;
            if (mysqli_query($conn, $sql_editRecord))
            {
                echo "<p>Record updated successfully.</p>";
                echo "<div><a href=\"index.php\">Back</a></div>";
            }
            else
            {
                echo "<p>ERROR: Could not execute " . $sql_editRecord . " . " . mysqli_error($conn) . "</p>";
                echo "<div><a href=\"edit.php?var=" . $var . "&tableName=employee\">Back</a></div>";
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
            echo "<p>ERROR: Missing required field. Please try again.</p>";
            echo "<div><a href=\"edit.php?var=" . $var . "&tableName=department\">Back</a></div>";
        }
        else
        {
            $sql_editRecord = "UPDATE department SET deptNum='" . $deptNum . "', deptName='" . $deptName
                . "' WHERE deptNum='" . $var . "'";
            if(mysqli_query($conn, $sql_editRecord))
            {
                echo "<p>Record updated successfully.</p>";
                echo "<div><a href=\"index.php\">Back</a></div>";
            }
            else
            {
                echo "<p>ERROR: Could not execute " . $sql_editRecord . " . " . mysqli_error($conn) . "</p>";
                echo "<div><a href=\"edit.php?var=" . $var . "&tableName=department\">Back</a></div>";
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
            echo "<div><a href=\"edit.php?var=" . $var . "&tableName=dept_loc\">Back</a></div>";
        }
        else
        {
            $sql_editRecord = "UPDATE dept_loc SET deptNum='" . $deptNum . "', location='" . $location
                . "' WHERE deptNum='". $var . "'";
            if(mysqli_query($conn, $sql_editRecord))
            {
                echo "<p>Record updated successfully.</p>";
                echo "<div><a href=\"index.php\">Back</a></div>";
            }
            else
            {
                echo "<p>ERROR: Could not execute " . $sql_editRecord ." . " . mysqli_error($conn) . "</p>";
                echo "<div><a href=\"edit.php?var=" . $var . "&tableName=dept_loc\">Back</a></div>";
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
            echo "<div><a href=\"edit.php?var=" . $var . "&tableName=emp_dependent\">Back</a></div>";
        }
        elseif (empty($ssn))
        {
            echo "<p>ERROR: Missing required field. Please try again.</p>";
            echo "<div><a href=\"edit.php?var=" . $var . "&tableName=emp_dependent\">Back</a></div>";
        }
        else
        {
            $sql_editRecord = "UPDATE emp_dependent SET ssn='" . $ssn . "', name='" . $name
                . "', relationship='" . $relationship . "' WHERE ssn='" . $var . "'";
            if (mysqli_query($conn, $sql_editRecord))
            {
                echo "<p>Record updated successfully.</p>";
                echo "<div><a href=\"index.php\">Back</a></div>";
            }
            else
            {
                echo "<p>ERROR: Could not execute " . $sql_editRecord . " . " . mysqli_error($conn) . "</p>";
                echo "<div><a href=\"edit.php?var=" . $var . "&tableName=emp_dependent\">Back</a></div>";
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
            echo "<div><a href=\"edit.php?var=" . $var . "&tableName=hourlyemp\">Back</a></div>";
        }
        elseif (emtpy($ssn) || empty($hourlyPay))
        {
            echo "<p>ERROR: Missing required field. Please try again.</p>";
            echo "<div><a href=\"edit.php?var=" . $var . "&tableName=hourlyemp\">Back</a></div>";
        }
        else
        {
            $sql_editRecord = "UPDATE hourlyemp SET ssn='" . $ssn . "', hourlyPay='"
                . $hourlyPay . "' WHERE ssn='" . $var . "'";
            if (mysqli_query($conn, $sql_editRecord))
            {
                echo "<p>Record updated successfully.</p>";
                echo "<div><a href=\"index.php\">Back</a></div>";
            }
            else
            {
                echo "<p>ERROR: Could not execute " . $sql_editRecord . " . " . mysqli_error($conn) . "</p>";
                echo "<div><a href=\"edit.php?var=" . $var . "&tableName=hourlyemp\">Back</a></div>";
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
            echo "<div><a href=\"edit.php?var=" . $var . "&tableName=manager\">Back</a></div>";
        }
        elseif (empty($ssn) || empty($deptNum) || empty($officeNum) || empty($startDate))
        {
            echo "<p>ERROR: Missing required field. Please try again.</p>";
            echo "<div><a href=\"edit.php?var=" . $var . "&tableName=manager\">Back</a></div>";
        }
        else
        {
            $sql_editRecord = "UPDATE manager SET ssn='" . $ssn . "', deptNum='"
                . $deptNum . "', officeNum='" . $officeNum . "', startDate='"
                . $startDate . "' WHERE ssn='". $var . "'";
            if (mysqli_query($conn, $sql_editRecord))
            {
                echo "<p>Record updated successfully.</p>";
                echo "<div><a href=\"index.php\">Back</a></div>";
            }
            else
            {
                echo "<p>ERROR: Could not execute " . $sql_editRecord . " . " . mysqli_error($conn) . "</p>";
                echo "<div><a href=\"edit.php?var=" . $var . "&tableName=manager\">Back</a></div>";
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
            echo "<div><a href=\"edit.php?var=" . $var . "&tableName=project\">Back</a></div>";
        }
        else
        {
            $sql_editRecord = "UPDATE project SET projectName='" . $projectName . "', projNum='"
                . $projNum . "', projDesc='" . $projDesc . "' WHERE projNum='" . $var . "'";
            if(mysqli_query($conn, $sql_editRecord))
            {
                echo "<p>Record updated successfully.</p>";
                echo "<div><a href=\"index.php\">Back</a></div>";
            }
            else
            {
                echo "<p>ERROR: Could not execute " . $sql_editRecord . " . " . mysqli_error($conn) . "</p>";
                echo "<div><a href=\"edit.php?var=" . $var . "&tableName=project\">Back</a></div>";
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
            echo "<div><a href=\"edit.php?var=" . $var . "&tableName=salariedemp\">Back</a></div>";
        }
        elseif (empty($ssn) || empty($monthlySalary))
        {
            echo "<p>ERROR: Missing required field. Please try again.</p>";
            echo "<div><a href=\"edit.php?var=" . $var . "&tableName=salariedemp\">Back</a></div>";
        }
        else
        {
            $sql_editRecord = "UPDATE salariedemp SET ssn='" . $ssn . "', monthlySalary='"
                . $monthlySalary . "' WHERE ssn='" . $var . "'";
            if (mysqli_query($conn, $sql_editRecord))
            {
                echo "<p>Record updated successfully.</p>";
                echo "<div><a href=\"index.php\">Back</a></div>";
            }
            else
            {
                echo "<p>ERROR: Could not execute " . $sql_editRecord . ". " . mysqli_error($conn) . "</p>";
                echo "<div><a href=\"edit.php?var=" . $var . "&tableName=salariedemp\">Back</a></div>";
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
            echo "<div><a href=\"edit.php?var=" . $var . "&?tableName=works\">Back</a></div>";
        }
        elseif (empty($ssn) || empty($deptNum) || empty($projectName) || empty($projNum))
        {
            echo "<p>ERROR: Missing required field. Please try again.</p>";
            echo "<div><a href=\"edit.php?var=" . $var . "&?tableName=works\">Back</a></div>";
        }
        else
        {
            $sql_editRecord = "UPDATE works SET ssn='" . $ssn . "', deptNum='". $deptNum . "', projectName='"
                . $projectName . "', projNum='" . $projNum . "' WHERE ssn='" . $var . "'";
            if (mysqli_query($conn, $sql_editRecord))
            {
                echo "<p>Record updated successfully.</p>";
                echo "<div><a href=\"index.php\">Back</a></div>";
            }
            else
            {
                echo "<p>ERROR: Could not execute " . $sql_editRecord . ". " . mysqli_error($conn) . "</p>";
                echo "<div><a href=\"edit.php?var=" . $var . "&tableName=works\">Back</a></div>";
            }
        }
    }
    ?>
</div>
</body>
</html>
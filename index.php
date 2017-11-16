<?php
/*
 * CSC471 Database Project
 * Mario Month
 *
 * index.php
 *
 * The main entry to the application
 */

// Connect to the database
include ('connect.php');

// Sets default table view or table chosen by user
if (isset($_POST['choose_table']))
{
    $tableName = $_POST['choose_table'];
}
else
{
    $tableName = "employee";
}
?>

<html>
<head>
    <title>CSC 471 Database Project Demo</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <div>
            <h1>CSC 471 Project Demo</h1>
        </div>
    </header>
    <!-- Displays a drop down form for user to select a table -->
    <div id="dropdownform">
        <form action="index.php" method="post">
            Choose Table: <select name="choose_table">
                <?php
                // Query the database and get a list of available tables
                $sql_getTableNames = "SHOW TABLES";
                $result = mysqli_query($conn,$sql_getTableNames);
                while($table = mysqli_fetch_array($result))
                {
                    // Sets default option based on current table being viewed
                    if ($table[0] == $tableName)
                    {
                        echo "<option selected='selected' value='" . $table[0] . "'>" . $table[0] . "</option>";
                    }
                    else
                    {
                        echo "<option value='" . $table[0] . "'>" . $table[0] . "</option>";
                    }
                }
                $result->free();
                ?>
            </select>
            <input type="submit" value="Submit">
        </form>
    </div>
    <!-- Displays the name of the currently viewed table -->
    <div id="tablename">
        <h3><?php echo $tableName ?></h3>
    </div>
    <!-- Option for user to add new record to the current database table -->
    <div id="addbutton">
        <p><a href="insert.php?tableName=<?php echo $tableName ?>"><img id="add" src="Add.png">New Record</a></p>
    </div>
    <!-- Displays the contents of the database table -->
    <div id="dbtable">
        <table>
            <?php
            $i = 0;

            // Query the database and retrieve all records for the currently selected database table
            $sql = "SELECT * FROM ".$tableName;
            $result = mysqli_query($conn,$sql);
            while($row = $result->fetch_assoc())
            {
                // Sets the variables to pass to the edit and delete scripts
                if ($tableName == 'employee' || $tableName == 'emp_dependent' || $tableName == 'hourlyemp' || $tableName == 'manager' || $tableName == 'salariedemp' || $tableName == 'works')
                {
                    $var = $row['ssn'];
                }
                elseif ($tableName == 'department' || $tableName == 'dept_loc')
                {
                    $var = $row['deptNum'];
                }
                elseif ($tableName == 'project')
                {
                    $var = $row['projNum'];
                }

                // Loops through the query results and displays the data in a HTML table
                if ($i == 0)
                {
                    $i++;
                    echo "<tr>";
                    foreach ($row as $key => $value)
                    {
                        echo "<th>" . $key . "</th>";
                    }
                    echo "<th>Edit</th><th>Delete</th>";
                    echo "</tr>";
                }
                echo "<tr>";
                foreach ($row as $value)
                {
                    echo "<td>" . $value . "</td>";
                }
                echo "<td><a href='edit.php?var=".$var."&tableName=".$tableName."'><img src='Edit.png'></a></td><td><a href='delete.php?var=".$var."&tableName=".$tableName."'><img src='Remove.png'></a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
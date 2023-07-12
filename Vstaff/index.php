<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <h1>Staff</h1>

    <?php
    $field = isset($_POST["txtfield"]) ? $_POST["txtfield"] : "";
    $search = isset($_POST["txtsearch"]) ? $_POST["txtsearch"] : "";
    $staffid = $field == 1 ? "Selected" : "";
    $name = $field == 2 ? "Selected" : "";
    $department = $field == 3 ? "Selected" : "";
    $position = $field == 4 ? "Selected" : "";
    $salary = $field == 5 ? "Selected" : "";
    ?>

    <fieldset>
        <legend>Lookup</legend>
        <form method="post">
            <select name="txtfield">
                <option>--Choose field--</option>
                <option value="1" <?php echo ($staffid) ?>>Staff ID</option>
                <option value="2" <?php echo ($name) ?>>Name</option>
                <option value="3" <?php echo ($department) ?>>Department</option>
                <option value="4" <?php echo ($position) ?>>Position</option>
                <option value="5" <?php echo ($salary) ?>>Salary</option>
            </select>
            <input type="text" name="txtsearch" value="<?php echo ($search) ?>">
            <input type="submit" name="btnsearch" value="Search" class='button'>
            <input type="submit" name="btnreset" value="Reset" class='button button5'>
        </form>
    </fieldset>
    <table border="1">
        <tr>
            <th>Staff ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Position</th>
            <th>Salary</th>
            <th>Option</th>
        </tr>

        <?php
        require("db.php");
        $sql = "SELECT * FROM vstaff";
        if (isset($_POST["btnsearch"])) {
            $field = $_POST['txtfield'];
            $text = $_POST['txtsearch'];
            switch ($field) {
                case '1':
                    $sql .= " WHERE staffid=$text";
                    break;
                case '2':
                    $sql .= " WHERE name LIKE '$text%'";
                    break;
                case '3':
                    $sql .= " WHERE department =$text";
                    break;
                case '4':
                    $sql .= " WHERE position =$text";
                    break;
                case '5':
                    $sql .= " WHERE salary = $text";
                    break;
            }
        }
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo ("<tr>");
            echo ("<td>" . $row["staffid"] . "</td>");
            echo ("<td>" . $row["name"] . "</td>");
            echo ("<td>" . $row["department"] . "</td>");
            echo ("<td>" . $row["position"] . "</td>");
            echo ("<td>" . $row["salary"] . "</td>");
            echo ("<td>
                        <a href='update.php?staffid=" . $row["staffid"] . "' class='button button2'> Edit</a> |
                        <a href='delete.php?staffid=" . $row["staffid"] . "' class='button button3' onclick='return confirm(\"Are you Sure want to delete this record?\")'>Delete</a>
                </td>");
            echo ("</tr>");
        }
        ?>
    </table>
    <br>
    <p> <a href="add.php" class="button">Add new Book</a></p>
</body>

</html>
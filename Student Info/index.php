<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <h1>List Student</h1>

    <?php
    $field = isset($_POST["txtfield"]) ? $_POST["txtfield"] : "";
    $search = isset($_POST["txtsearch"]) ? $_POST["txtsearch"] : "";
    $stuid = $field == 1 ? "Selected" : "";
    $name = $field == 2 ? "Selected" : "";
    $gender = $field == 3 ? "Selected" : "";
    $pob = $field == 4 ? "Selected" : "";
    $dob = $field == 5 ? "Selected" : "";
    ?>

    <fieldset>
        <legend>Lookup</legend>
        <form method="post">
            <select name="txtfield">
                <option>--Choose field--</option>
                <option value="1" <?php echo ($stuid) ?>>Studen ID</option>
                <option value="2" <?php echo ($name) ?>>Student Name</option>
                <option value="3" <?php echo ($gender) ?>>Gender</option>
                <option value="4" <?php echo ($pob) ?>>Place of Birth</option>
                <option value="5" <?php echo ($dob) ?>>Date of Birth</option>
            </select>
            <input type="text" name="txtsearch" value="<?php echo ($search) ?>">
            <input type="submit" name="btnsearch" value="Search" class='button'>
            <input type="submit" name="btnreset" value="Reset" class='button button5'>
            <input type="submit" name="btnasc" value="Sort ASC" class='button button2'>
            <input type="submit" name="btndesc" value="Sort Desc" class='button button4'>
        </form>
    </fieldset>
    <table border="1">
        <tr>
            <th>Studen ID</th>
            <th>Student Name</th>
            <th>Gender</th>
            <th>Place of Birth</th>
            <th>Date of Birth</th>
            <th>Option</th>
        </tr>

        <?php
        require("db.php");
        $sql = "SELECT * FROM tblstudent";
        //Search
        if (isset($_POST["btnsearch"])) {
            $field = $_POST['txtfield'];
            $text = $_POST['txtsearch'];
            switch ($field) {
                case '1':
                    $sql .= " WHERE stu_id=$text";
                    break;
                case '2':
                    $sql .= " WHERE stu_name LIKE '$text%'";
                    break;
                case '3':
                    $sql .= " WHERE gender='$text'";
                    break;
                case '4':
                    $sql .= " WHERE pob LIKE '%$text%'";
                    break;
                case '5':
                    $sql .= " WHERE dob LIKE '%$text%'";
                    break;
            }
        }
        //Sort ASC 
        if (isset($_POST["btnasc"])) {
            $field = $_POST['txtfield'];
            switch ($field) {
                case '1':
                    $sql .= " ORDER BY stu_id ASC;";
                    break;
                case '2':
                    $sql .= " ORDER BY stu_name ASC;";
                    break;
                case '3':
                    $sql .= " ORDER BY gender ASC;";
                    break;
                case '4':
                    $sql .= " ORDER BY pob ASC;";
                    break;
                case '5':
                    $sql .= " ORDER BY dob ASC;";
                    break;
            }
        }
        //Sort Desc 
        if (isset($_POST["btndesc"])) {
            $field = $_POST['txtfield'];
            switch ($field) {
                case '1':
                    $sql .= " ORDER BY stu_id DESC;";
                    break;
                case '2':
                    $sql .= " ORDER BY stu_name DESC;";
                    break;
                case '3':
                    $sql .= " ORDER BY gender DESC;";
                    break;
                case '4':
                    $sql .= " ORDER BY pob DESC;";
                    break;
                case '5':
                    $sql .= " ORDER BY dob DESC;";
                    break;
            }
        }
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo ("<tr>");
            echo ("<td>" . $row["stu_id"] . "</td>");
            echo ("<td>" . $row["stu_name"] . "</td>");
            echo ("<td>" . $row["gender"] . "</td>");
            echo ("<td>" . $row["pob"] . "</td>");
            echo ("<td>" . $row["dob"] . "</td>");
            echo ("<td>
                        <a href='update.php?stu_id=" . $row["stu_id"] . "' class='button button2'> Edit</a> |
                        <a href='delete.php?stu_id=" . $row["stu_id"] . "' class='button button3' onclick='return confirm(\"Are you Sure want to delete this record?\")'>Delete</a>
                </td>");
            echo ("</tr>");
        }
        ?>
    </table>
    <br>
    <p> <a href="add.php" class="button">Add new Student</a></p>
</body>

</html>
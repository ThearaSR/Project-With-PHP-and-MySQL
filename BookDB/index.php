<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <h1>Book List</h1>

    <?php
    $field = isset($_POST["txtfield"]) ? $_POST["txtfield"] : "";
    $search = isset($_POST["txtsearch"]) ? $_POST["txtsearch"] : "";
    $bookid = $field == 1 ? "Selected" : "";
    $tiltle = $field == 2 ? "Selected" : "";
    $Author = $field == 3 ? "Selected" : "";
    $pub = $field == 4 ? "Selected" : "";
    $price = $field == 5 ? "Selected" : "";
    $sup = $field == 6 ? "Selected" : "";
    ?>

    <fieldset>
        <legend>Lookup</legend>
        <form method="post">
            <select name="txtfield">
                <option>--Choose field--</option>
                <option value="1" <?php echo ($bookid) ?>>Book ID</option>
                <option value="2" <?php echo ($tiltle) ?>>Book Title</option>
                <option value="3" <?php echo ($Author) ?>>Author</option>
                <option value="4" <?php echo ($pub) ?>>Pub Year</option>
                <option value="5" <?php echo ($price) ?>>Price</option>
                <option value="6" <?php echo ($sup) ?>>Subpplier</option>
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
            <th>Book ID</th>
            <th>Book Title</th>
            <th>Author</th>
            <th>Pub Year</th>
            <th>Price</th>
            <th>Supplier</th>
            <th>Option</th>
        </tr>

        <?php
        require("db.php");
        $sql = "SELECT * FROM tblbook";
        //Search
        if (isset($_POST["btnsearch"])) {
            $field = $_POST['txtfield'];
            $text = $_POST['txtsearch'];
            switch ($field) {
                case '1':
                    $sql .= " WHERE BookID=$text";
                    break;
                case '2':
                    $sql .= " WHERE Title LIKE '$text%'";
                    break;
                case '3':
                    $sql .= " WHERE Author LIKE ='%$text%'";
                    break;
                case '4':
                    $sql .= " WHERE PubYear = '$text'";
                    break;
                case '5':
                    $sql .= " WHERE Price = '$text'";
                    break;
                case '6':
                    $sql .= " WHERE Supplier LIKE = '%$text%'";
                    break;
            }
        }
        //Sort ASC 
        if (isset($_POST["btnasc"])) {
            $field = $_POST['txtfield'];
            switch ($field) {
                case '1':
                    $sql .= " ORDER BY BookID ASC;";
                    break;
                case '2':
                    $sql .= " ORDER BY Title ASC;";
                    break;
                case '3':
                    $sql .= " ORDER BY Author ASC;";
                    break;
                case '4':
                    $sql .= " ORDER BY PubYear ASC;";
                    break;
                case '5':
                    $sql .= " ORDER BY Price ASC;";
                    break;
                case '6':
                    $sql .= " ORDER BY Supplier ASC;";
                    break;
            }
        }
        //Sort Desc 
        if (isset($_POST["btndesc"])) {
            $field = $_POST['txtfield'];
            switch ($field) {
                case '1':
                    $sql .= " ORDER BY BookID DESC;";
                    break;
                case '2':
                    $sql .= " ORDER BY Title DESC;";
                    break;
                case '3':
                    $sql .= " ORDER BY Author DESC;";
                    break;
                case '4':
                    $sql .= " ORDER BY PubYear DESC;";
                    break;
                case '5':
                    $sql .= " ORDER BY Price DESC;";
                    break;
                case '6':
                    $sql .= " ORDER BY Supplier DESC;";
                    break;
            }
        }
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo ("<tr>");
            echo ("<td>" . $row["BookID"] . "</td>");
            echo ("<td>" . $row["Title"] . "</td>");
            echo ("<td>" . $row["Author"] . "</td>");
            echo ("<td>" . $row["PubYear"] . "</td>");
            echo ("<td>" . $row["Price"] . "</td>");
            echo ("<td>" . $row["Supplier"] . "</td>");
            echo ("<td>
                        <a href='update.php?BookID=" . $row["BookID"] . "' class='button button2'> Edit</a> |
                        <a href='delete.php?BookID=" . $row["BookID"] . "' class='button button3' onclick='return confirm(\"Are you Sure want to delete this record?\")'>Delete</a>
                </td>");
            echo ("</tr>");
        }
        ?>
    </table>
    <br>
    <p> <a href="add.php" class="button">Add new Book</a></p>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Book Record</title>
</head>

<body>
    <?php
    $bookid = $_GET['BookID'];
    $sql = "DELETE FROM tblbook WHERE BookID=$bookid;";
    require("db.php");
    if ($conn->query($sql) == true) {
        header("Location:index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    ?>
</body>

</html>
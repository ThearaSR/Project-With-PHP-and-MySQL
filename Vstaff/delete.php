<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Staff</title>
</head>

<body>
    <?php
    $staffid = $_GET['staffid'];
    $sql = "DELETE FROM tblstaff WHERE staffid=$staffid;";
    require("db.php");
    if ($conn->query($sql) == true) {
        header("Location:index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    ?>
</body>

</html>
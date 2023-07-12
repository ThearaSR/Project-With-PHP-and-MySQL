<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Student</title>
</head>

<body>
    <?php
    $stuid = $_GET['stu_id'];
    $sql = "DELETE FROM tblstudent WHERE stu_id=$stuid;";
    require("db.php");
    if ($conn->query($sql) == true) {
        header("Location:index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    ?>
</body>

</html>
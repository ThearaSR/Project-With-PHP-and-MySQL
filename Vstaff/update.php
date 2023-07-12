<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Staff</title>
    <link rel="stylesheet" href="CSS/formstyle.css">
</head>

<body>
    
    <?php
    if (!isset($_POST['btnsubmit'])) {
        require("db.php");
        $staffid = $_GET['staffid'];
        $sql = "SELECT * FROM tblstaff WHERE staffid = $staffid;";
        $result = $conn->query($sql);
        if ($row = $result->fetch_assoc()) {
    ?>
            <div class="center">
                <h2>Edit Staff Infor</h2>
                <form method="POST">
                    <label for="staffid">Staff ID</label>
                    <input type="text" id="" name="staffid" value="<?php echo ($row["staffid"]) ?>" readonly>

                    <label for="name">Name</label>
                    <input type="text" id="title" name="name" value="<?php echo ($row["name"]) ?>">

                    <label for="department">Department</label>
                    <input type="text" name="department" value="<?php echo ($row["depid"]) ?>">

                    <label for="position">Position</label>
                    <input type="text" name="position" value="<?php echo ($row["posid"]) ?>">

                    <label for="salary">Salary</label>

                    <input type="text" id="Price" name="salary" value="<?php echo ($row["salary"]) ?>">

                    <input type="submit" name="btnsubmit" value="Save">
                </form>
            </div>
    <?php
        }
    }
    ?>

    <?php
    if (isset($_POST['btnsubmit'])) {
        require("db.php");
        $staffid = $_POST['staffid'];
        $name = $_POST['name'];
        $department = $_POST['department'];
        $position = $_POST['position'];
        $salary = $_POST['salary'];
        $sql = "UPDATE tblstaff SET name='$name',depid='$department',posid='$position', salary='$salary' WHERE staffid=$staffid;";
        if ($conn->query($sql) == true) {
            header("Location:index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
</body>

</html>
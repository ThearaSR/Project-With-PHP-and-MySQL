<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <link rel="stylesheet" href="CSS/formstyle.css">
</head>

<body>
    <?php
    if (!isset($_POST['btnsubmit'])) {
        require("db.php");
        $stuid = $_GET['stu_id'];
        $sql = "SELECT * FROM tblstudent WHERE stu_id=$stuid;";
        $result = $conn->query($sql);
        if ($row = $result->fetch_assoc()) {
    ?>
            <div class="center">
                <h2>Edit Student</h2>
                <form method="POST">
                    <label for="stuid">Student ID</label>
                    <input type="text" id="stu_id" name="stu_id" value="<?php echo ($row["stu_id"]) ?>" readonly>

                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="<?php echo ($row["stu_name"]) ?>">

                    <label for="gender">Gender</label>
                    <input type="text" id="gender" name="gender" value="<?php echo ($row["gender"]) ?>">

                    <label for="pob">Place of Birth</label>
                    <input type="text" id="pob" name="pob" value="<?php echo ($row["pob"]) ?>">

                    <label for="dob">Date of Birth</label>

                    <input type="text" id="dob" name="dob" value="<?php echo ($row["dob"]) ?>">

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
        $stuid = $_POST['stu_id'];
        $stuname = $_POST['name'];
        $gender = $_POST['gender'];
        $pob = $_POST['pob'];
        $dob = $_POST['dob'];
        $sql = "UPDATE tblstudent SET stu_name='$stuname',gender='$gender',pob='$pob',dob='$dob' WHERE stu_id=$stuid;";
        if ($conn->query($sql) == true) {
            header("Location:index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
</body>

</html>
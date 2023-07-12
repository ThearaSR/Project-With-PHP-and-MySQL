<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new Student</title>
    <link rel="stylesheet" href="CSS/formstyle.css">
</head>

<body>
    <div>
        <h1>Add new Student</h1>
        <form method="POST">
            <label for="name">Name</label>
            <input type="text" name="name" id="name">
            <label for="gender">Gender</label>
            <input type="text" name="gender" id="gender">
            <label for="pob">Plce of Birth</label>
            <input type="text" name="pob" id="pob">
            <label for="dob">Date of Birth</label>
            <input type="text" name="dob" id="dob">
            <input type="submit" value="Save" name="btnsave">
        </form>
    </div>
    <?php
    if (isset($_POST["btnsave"])) {
        require("db.php");
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $pob = $_POST['pob'];

        $sql = "INSERT INTO tblstudent(stu_name,gender,pob,dob) VALUES('$name','$gender','$pob','$dob');";
        if ($conn->query($sql) == true) {
            header("Location:index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
</body>

</html>
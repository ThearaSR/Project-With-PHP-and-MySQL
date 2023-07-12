<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/formstyle.css">
</head>

<body>
    <div>
        <h2>AddNew Staff</h2>
        <form method="post">
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
            <label for="department">Department</label>
            <select id="department" name="department">
                <option>--Choose--</option>
                <?php
                require("db.php");
                $sql = "SELECT * FROM tbldepa";
                $result= $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    echo("<option value='" . $row['depid'] . "'>" . $row['department'] . "</option>");
                }
                ?>
            </select>
            <label for="position">Position</label>
            <select id="position" name="position">
                <option>--Choose--</option>
                <?php
                require("db.php");
                $sql = "SELECT * FROM tblpos";
                $result= $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    echo("<option value='" . $row['posid'] . "'>" . $row['position'] . "</option>");
                }
                ?>
            </select>
            <label for="salary">Salary</label>
            <input type="text" id="salary" name="salary">
            <input type="submit" name="btnsubmit" value="Save">
        </form>
    </div>
    <?php
    if(isset($_POST['btnsubmit'])) {
    require("db.php");
    $name = $_POST["name"];
    $depid = $_POST["department"];
    $posid = $_POST["position"];
    $salary = $_POST["salary"];
    $sql = "INSERT INTO tblstaff(name,depid, posid,salary) VALUES('$name',$depid,$posid,$salary);";
    if($conn->query($sql) ==true) {
        header("Location:index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYSQL</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <?php
        $server = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "staffdb";

        $conn = new mysqli($server, $username, $password, $dbname);
        if($conn->connect_error){
            die("Connection Field: " . $conn->connect_error);
        }
    ?>
</body>
</html>
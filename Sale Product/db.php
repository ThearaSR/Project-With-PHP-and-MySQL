<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <?php
        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbName = "SaleProduct";

        $connection = new mysqli($servername, $username, $password, $dbName);
        if($connection->connect_error){
            die("Connection Field: " . $connection->connect_error);
        }
        echo "Connected Successfully";
    ?>
</body>
</html>
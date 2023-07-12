<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <h1>Product List</h1>
    <table border="1">
    	<tr>
            <th>Product Code</th>
            <th>Product Name</th>
            <th>Stock</th>
            <th>Cost</th>
            <th>Profit</th>
            <th>Price</th>
            <th>ExpDate</th>
            <th>Re-Oder Point</th>
        </tr>
        <?php
            require("db.php");
            $sql = "SELECT * FROM tblProduct";
            $result = $connection->query($sql);
            while($row = $result->fetch_assoc()){
                echo ("<tr>");
                echo ("<td>" . $row["ProCode"] . "</td>");
                echo ("<td>" . $row["ProName"] . "</td>");
                echo ("<td>" . $row["Stock"] . "</td>");
                echo ("<td>" . $row["Cost"] . "</td>");
                echo ("<td>" . $row["Profit"] . "</td>");
                echo ("<td>" . $row["Price"] . "</td>");
                echo ("<td>" . $row["ExpDate"] . "</td>");
                echo ("<td>" . $row["ReOderPoint"] . "</td>");
                echo ("</tr>");
            }
        ?>
    </table>
</body>
</html>
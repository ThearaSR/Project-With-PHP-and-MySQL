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
        <h2>Add new Book</h2>
        <form method="POST">
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
            <label for="Author">Author</label>
            <input type="text" name="Author" id="Author">
            <label for="pub">Pub Year</label>
            <input type="text" name="pub" id="pub">
            <label for="price">Price</label>
            <input type="text" name="price" id="price">
            <label for="sup">Supplier</label>
            <input type="text" name="sup" id="sup">
            <input type="submit" value="Save" name="btnsave">
        </form>
    </div>
    <?php
    if (isset($_POST["btnsave"])) {
        require("db.php");
        $title = $_POST['title'];
        $author = $_POST['Author'];
        $pub = $_POST['pub'];   
        $price = $_POST['price'];
        $sup = $_POST['sup'];

        $sql = "INSERT INTO tblbook(Title,Author,PubYear,Price,Supplier) VALUES('$title','$author','$pub','$price','$sup');";
        if ($conn->query($sql) == true) {
            header("Location:index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Book Info</title>
    <link rel="stylesheet" href="CSS/formstyle.css">
</head>

<body>
    
    <?php
    if (!isset($_POST['btnsubmit'])) {
        require("db.php");
        $bookid = $_GET['BookID'];
        $sql = "SELECT * FROM tblbook WHERE BookID = $bookid;";
        $result = $conn->query($sql);
        if ($row = $result->fetch_assoc()) {
    ?>
            <div class="center">
                <h2>Edit Book Information</h2>
                <form method="POST">
                    <label for="bookid">Book ID</label>
                    <input type="text" id="bookid" name="BookID" value="<?php echo ($row["BookID"]) ?>" readonly>

                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" value="<?php echo ($row["Title"]) ?>">

                    <label for="Author">Author</label>
                    <input type="text" id="Author" name="Author" value="<?php echo ($row["Author"]) ?>">

                    <label for="pub">Pub Year</label>
                    <input type="text" id="pub" name="pub" value="<?php echo ($row["PubYear"]) ?>">

                    <label for="Price">Price</label>

                    <input type="text" id="Price" name="Price" value="<?php echo ($row["Price"]) ?>">

                    <label for="sup">Supplier</label>

                    <input type="text" id="sup" name="sup" value="<?php echo ($row["Supplier"]) ?>">

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
        $bookid = $_POST['BookID'];
        $title = $_POST['title'];
        $Author = $_POST['Author'];
        $pub = $_POST['pub'];
        $price = $_POST['Price'];
        $sup = $_POST['sup'];
        $sql = "UPDATE tblbook SET Title='$title',Author='$Author',PubYear='$pub', Price='$price' WHERE BookID=$bookid;";
        if ($conn->query($sql) == true) {
            header("Location:index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
</body>

</html>
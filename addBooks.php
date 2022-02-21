<?php
    $conn = mysqli_connect("localhost", "root", "", "library");
    $sql = "SELECT * FROM book;";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Books</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="addBooks">
        <div class="box">

        <?php
                if (mysqli_num_rows($result) > 0) {
                    ?>


<?php 
                    if (array_key_exists('add', $_POST)) {
                        $Bname = $_REQUEST['Bname'];
                        $Aname = $_REQUEST['Aname'];
                        $Bprice = $_REQUEST['Bprice'];

                        $add = "INSERT INTO book VALUES ('$Bname', '$Aname', '$Bprice');";


                            if (mysqli_query($conn, $add)) {
                                echo "<script>alert('Details added successfully')</script>";
                            } else {
                                echo "<script>alert('Error, Try Again!')</script>";
                            }
                            header("Refresh:0");

                    }
                    
?>
                <div>

                <form method="POST">

                <label>Book Name</label>
                <input class="bookName" type="text" name="Bname">
                </div>
                <div>
                <label>Authors Name</label>
                <input class="authorName" type="text" name="Aname">
                </div>
                <div>
                <label>Book Price</label>
                <input class="bookPrice" type="text" name="Bprice">
                </div>
                <div>
                <button class="submit" type="submit" name="add" value="add">Add Book</button>
                </form>

            </div>
        </div>
    </div>
    <?php
                }
    mysqli_close($conn);
?>


</body>
</html>

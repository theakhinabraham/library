<?php
    $conn = mysqli_connect("localhost", "root", "", "library");
    $sql = "SELECT * FROM book";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Books</title>
    <link rel="stylesheet" href="style.css">
    <script src="http://localhost/library/script.js"></script>

</head>
<body>
    <section class="selectBooks">
        <div class="leftBlock">
        
        <?php
                if (mysqli_num_rows($result) > 0) {
                    ?>

            <table class="selectedBooks">
            <thead>    
                <tr>
                    <th>Book Name</th>
                    <th>Author Name</th>
                    <th>Price</th>
                </tr>
            </thead>
            <?php
           
           while ($row = mysqli_fetch_assoc($result)) {
               echo "<tr>";
               echo "<td>".$row['Bname']."</td>";
               echo "<td>".$row['Aname']."</td>";
               echo "<td>".$row['Bprice']."</td>";
               echo "</tr>";
           } ?>

        </table>    
        </div>
        <?php 
                    if (array_key_exists('select', $_POST)) {

                        echo "<script>alert('Book Added!')</script>";

                    }

                    if (array_key_exists('buy', $_POST)) {

                        echo "<script>alert('Purchased!')</script>";

                    }
?>

        <div class="rightBlock">
            <label>Book Name</label>
            <input class="bookName" type="text">
            <label>Author Name</label>
            <input class="authorName" type="text">
            <button class="selectButton" type="submit" name="select" value="select"><a href="#" onclick="select()">Select</a></button>
            <button class="selectButton" type="submit" name="buy" value="buy"><a href="http://localhost/library/purchase.html">Buy</a></button>
        </div>
    </section>
    <?php
                }
    mysqli_close($conn);
?>

</body>
</html>

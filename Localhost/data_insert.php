<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $name = $_POST['name'];
        $name_ar = $_POST['name_ar'];

        $name = mysqli_real_escape_string($conn, $name);
        $name_ar = mysqli_real_escape_string($conn, $name_ar);

        // Insert data into the table
        $sql = "INSERT INTO users (name, name_ar) VALUES ('$name', '$name_ar')";

        if (mysqli_query($conn, $sql)) {
                echo "Data inserted successfully.";
        } else {
                echo "Error: " . mysqli_error($conn);
        }
}
?>

<!DOCTYPE html>
<html>

<head>
        <title>Insert Data</title>
</head>

<body>
        <h2>Insert Data</h2>
        <form method="post">
                <label>Name:</label>
                <input type="text" name="name" required><br>

                <label>Name (Arabic):</label>
                <input type="text" name="name_ar" required><br>

                <input type="submit" value="Insert">
        </form>
</body>

</html>
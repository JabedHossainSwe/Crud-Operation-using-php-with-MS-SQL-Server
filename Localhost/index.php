<?php
include 'connect.php'; // Include the database connection script

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Handle form submission
        $name = $_POST['name'];
        $mobile = $_POST['mobile'];

        $name = mysqli_real_escape_string($conn, $name); // Prevent SQL injection

        // Insert data into the table
        $sql = "INSERT INTO users (name, mobile) VALUES ('$name', '$mobile')";

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

                <label>Mobile:</label>
                <input type="text" name="mobile" required><br>

                <input type="submit" value="Insert">
        </form>
</body>

</html>
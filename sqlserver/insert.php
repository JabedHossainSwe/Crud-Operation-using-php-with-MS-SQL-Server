<?php
include 'connect_sqlsrv.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $name = $_POST['name'];
        $name_ar = $_POST['name_ar'];


        $sql = "INSERT INTO users (name, name_ar) VALUES (:name, :name_ar)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':name_ar', $name_ar);

        if ($stmt->execute()) {
                echo "Data inserted successfully.";
        } else {
                echo "Error: " . implode(" - ", $stmt->errorInfo());
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
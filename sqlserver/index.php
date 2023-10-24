<?php
include 'connect_sqlsrv.php'; // Include the database connection script

// Fetch data from the table
$sql = "SELECT name, name_ar FROM users";
$stmt = $conn->query($sql);

if ($stmt === false) {
        die("Error: " . implode(" - ", $conn->errorInfo()));
}
?>

<!DOCTYPE html>
<html>

<head>
        <title>Data Listing</title>
</head>

<body>
        <h2>Data Listing</h2>
        <table border="1">
                <tr>
                        <th>Name</th>
                        <th>Name (Arabic)</th>
                </tr>
                <?php
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['name_ar'] . "</td>";
                        echo "</tr>";
                }
                ?>
        </table>
</body>

</html>
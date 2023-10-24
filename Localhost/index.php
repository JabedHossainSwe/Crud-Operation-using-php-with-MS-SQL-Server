<?php
include 'connect.php';

$sql = "SELECT name, name_ar FROM users";
$result = mysqli_query($conn, $sql);

if (!$result) {
        die("Error: " . mysqli_error($conn));
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
                while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['name_ar'] . "</td>";
                        echo "</tr>";
                }
                ?>
        </table>
</body>

</html>
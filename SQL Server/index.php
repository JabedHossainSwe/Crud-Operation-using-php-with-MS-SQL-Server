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

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $name = $_POST['name'];
        $mobile = $_POST['mobile'];


        include 'connect_sqlsrv.php';

        // Insert data into the SQL Server database
        $sql = "INSERT INTO SampleTable (name, mobile) VALUES (?, ?)";
        $params = array($name, $mobile);

        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt) {
            echo "Data inserted successfully.";
        } else {
            echo "Error: " . print_r(sqlsrv_errors(), true);
        }

        sqlsrv_close($conn);
    }
    ?>
</body>

</html>
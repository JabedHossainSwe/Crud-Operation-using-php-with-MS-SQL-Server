<?php
include './config/connect_sqlsrv.php';
$sql = "SELECT * FROM Student";
$result = $conn->query($sql);

if ($result === false) {
        die("Error: " . implode(" - ", $conn->errorInfo()));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <title>Student Data</title>
        <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" href="./css/style.css">
</head>

<body>
        <div class="container mt-5">
                <h2>Student Data</h2>

                <div class="add-btn">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#addStudentModal">
                                Add Student
                        </button>
                </div>

                <!-- bootstrap datatable for showing student's info -->
                <?php include './Table/studentTable.php'; ?>

                <!-- Modal for Adding Student -->
                <?php include './Form/addStudentForm.php'; ?>

        </div>


        <script>
                $(document).ready(function () {
                        $('#studentTable').DataTable();
                });
        </script>

        <!-- Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
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

        <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

        <!-- Font Awesome CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

        <!-- DataTables JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

        <!-- Bootstrap JS (if not already included in your project) -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <!-- Your custom JS file -->
        <script src="js/index.js"></script>

        <!-- Your custom CSS file -->
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

                <div class="print-btn">
                        <button type="button" id="printButton" class="btn btn-secondary">
                                Print Data
                        </button>
                </div>

                <!-- bootstrap datatable for showing student's info -->
                <?php include './Table/studentTable.php'; ?>

                <!-- Modal for Adding Student -->
                <?php include './Form/addStudentForm.php'; ?>

        </div>

        <script>
                $(document).ready(function () {
                        var table = $('#studentTable').DataTable({
                                "paging": true,
                                "searching": true,
                                "ordering": true,
                                "info": true,
                                "language": {
                                        "paginate": {
                                                "previous": '<i class="fas fa-angle-double-left"></i>',
                                                "next": '<i class="fas fa-angle-double-right"></i>'
                                        }
                                }
                        });

                        // Handle the print button click event
                        $('#printButton').on('click', function () {
                                window.print();
                        });
                });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
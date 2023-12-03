<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <title>Student Data</title>

        <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

        <!-- Font Awesome CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

        <!-- DataTables CSS -->
        <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">


        <!-- jsPDF library -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

        <!-- Your custom JS file -->
        <script src="js/index.js"></script>

        <!-- jQuery and DataTables JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <!-- Your custom JS file -->
        <script src="js/index.js"></script>

        <!-- Your custom CSS file -->
        <link rel="stylesheet" href="./css/style.css">

        <!-- Additional styles for hiding elements during print -->
        <style>
                @media print {
                        .no-print {
                                display: none;
                        }
                }
        </style>
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

                <div class="btn-group no-print">
                        <button type="button" onclick="generatePDF()" class="btn btn-secondary">
                                Download PDF
                        </button>
                </div>

                <div class="btn-group no-print">
                        <button type="button" onclick="window.print()" class="btn btn-secondary">
                                Print
                        </button>
                </div>

                <!-- Bootstrap datatable for showing student's info -->
                <?php include './Table/studentTable.php'; ?>

                <!-- Modal for Adding Student -->
                <?php include './Form/addStudentForm.php'; ?>
        </div>

        <script>
                $(document).ready(function () {
                        // Initialize DataTable
                        var table = $('#studentTable').DataTable({
                                "paging": false,
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

                        // Function to generate PDF
                        window.generatePDF = function () {
                                // Create jsPDF instance
                                const pdf = new jsPDF();

                                // Add content to the PDF using autoTable
                                pdf.autoTable({ html: '#studentTable' });

                                // Save the PDF
                                pdf.save('Student_Data.pdf');
                        };
                });
        </script>
</body>

</html>
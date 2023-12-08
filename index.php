<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <title>Student Data</title>

        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.5/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.html5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.0/jszip.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.print.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jspdf-autotable"></script>

        <link rel="stylesheet" href="./css/style.css">
        <style>
                @media print {
                        .no-print {
                                display: none;
                        }
                }

                /* English style */
                .english {
                        direction: ltr;
                        text-align: left;
                }

                /* Arabic style */
                .arabic {
                        direction: rtl;
                        text-align: right;
                        font-family: 'Arial', sans-serif;
                }
        </style>
</head>

<body class="english">
        <div class="container mt-5">
                <h2>Student Data</h2>

                <div class="add-btn">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#addStudentModal">
                                Add Student
                        </button>

                </div>

                <div class="btn-group no-print">
                        <button type="button" onclick="window.print()" class="btn btn-secondary">
                                Print
                        </button>
                </div>
                <!-- <button class="btn btn-primary" id="languageButton" onclick="switchLanguage()">English / Arabic</button> -->

                <button onclick="switchLanguage()">Switch Language</button>


                <!-- Bootstrap datatable for showing student's info -->
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
                                                "previous": '<i class="fa fa-angle-double-left"></i>',
                                                "next": '<i class="fa fa-angle-double-right"></i>'
                                        }
                                },
                                "buttons": [{
                                        extend: 'pdfHtml5',
                                        text: 'Export PDF',
                                        title: 'Student Data',
                                        exportOptions: {
                                                columns: ':visible'
                                        }
                                }]
                        });

                        window.generatePDF = function () {
                                var pdf = new jsPDF();
                                var columns = [];
                                var data = [];

                                // Get column names
                                table.columns().every(function () {
                                        columns.push(this.header().textContent.trim());
                                });

                                // Get table data
                                table.rows().every(function () {
                                        var row = [];
                                        this.data().each(function (cell, i) {
                                                row.push(cell);
                                        });
                                        data.push(row);
                                });

                                // Add content to the PDF
                                pdf.autoTable({
                                        head: [columns],
                                        body: data,
                                });

                                // Save the PDF with a specific filename
                                pdf.save('Student_Data.pdf');
                        };
                });
        </script>

        <script>
                function switchLanguage() {
                        var elements = document.querySelectorAll('.english, .arabic');

                        elements.forEach(function (element) {
                                if (element.classList.contains('english')) {
                                        var arabicContent = element.dataset.arabic;
                                        if (arabicContent) {
                                                element.textContent = arabicContent;
                                        }
                                        element.classList.remove('english');
                                        element.classList.add('arabic');
                                } else if (element.classList.contains('arabic')) {
                                        var englishContent = element.dataset.english;
                                        if (englishContent) {
                                                element.textContent = englishContent;
                                        }
                                        element.classList.remove('arabic');
                                        element.classList.add('english');
                                }
                        });

                        // Refresh DataTables after changing the language classes
                        $('#studentTable').DataTable().draw();
                }
        </script>


</body>

</html>
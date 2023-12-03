<?php
include '../config/connect_sqlsrv.php';

if (isset($_GET['id'])) {
    $student_id = $_GET['id'];
    $sql = "SELECT * FROM Student WHERE student_id = :student_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':student_id', $student_id);
    $stmt->execute();
    $student = $stmt->fetch(PDO::FETCH_ASSOC);

    // Display student details in an edit form
    if ($student) {
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Student Details</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <style>
                h1 {
                    text-align: center;
                }

                .form-container {
                    max-width: 400px;
                    margin: auto;
                }
            </style>
        </head>

        <body>
            <h1>Edit Student Details</h1>
            <form class="form-container" action="update.php" method="POST">
                <input type="hidden" name="student_id" value="<?= $student['student_id'] ?>">
                <div class="form-group">
                    <label for="firstName">First Name:</label>
                    <input type="text" class="form-control" id="firstName" name="firstName"
                        value="<?= $student['first_name'] ?>">
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name:</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" value="<?= $student['last_name'] ?>">
                </div>

                <div class="form-group">
                    <label for="date_of_birth">Date of Birth:</label>
                    <input type="text" class="form-control" id="date_of_birth" name="date_of_birth"
                        value="<?= $student['date_of_birth'] ?>">
                </div>

                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" id="address" value="<?= $student['address'] ?>">
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" id="email" value="<?= $student['email'] ?>">
                </div>

                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" class="form-control" id="phone" value="<?= $student['phone_number'] ?>">
                </div>

                <div class="form-group">
                    <label for="department">Department:</label>
                    <input type="text" class="form-control" id="department" value="<?= $student['department'] ?>">
                </div>

                <div class="form-group">
                    <label for="father_name">Father's Name:</label>
                    <input type="text" class="form-control" id="father_name" value="<?= $student['father_name'] ?>">
                </div>

                <div class="form-group">
                    <label for="mother_name">Mother's Name:</label>
                    <input type="text" class="form-control" id="mother_name" value="<?= $student['mother_name'] ?>">
                </div>

                <div class="form-group">
                    <label for="grade">Grade:</label>
                    <input type="text" class="form-control" id="grade" value="<?= $student['grade'] ?>">
                </div>


                <button type="submit" class="btn btn-primary form-control">Update</button> <br>
                <a class='btn btn-secondary form-control' href='../index.php '>Exit</a>
            </form>
            <script src=" https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </body>

        </html>
        <?php
    } else {
        echo "Student not found.";
    }
} else {
    echo "Student ID not provided.";
}
?>
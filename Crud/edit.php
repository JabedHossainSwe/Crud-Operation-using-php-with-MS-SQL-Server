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
        // Display student details in an HTML form for editing
    } else {
        echo "Student not found.";
    }
} else {
    echo "Student ID not provided.";
}
?>

<?php

include '../config/connect_sqlsrv.php';

if (isset($_GET['id'])) {
  $student_id = $_GET['id'];
  $sql = "SELECT * FROM Student WHERE student_id = :student_id";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':student_id', $student_id);
  $stmt->execute();
  $student = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($student) {
    // Return the data as JSON
    header('Content-Type: application/json');
    echo json_encode($student);
  } else {
    echo "Student not found.";
  }
} else {
  echo "Student ID not provided.";
}
?>
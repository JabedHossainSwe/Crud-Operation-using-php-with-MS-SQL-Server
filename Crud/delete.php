<?php
include '../config/connect_sqlsrv.php';

if (isset($_GET['id'])) {
  $studentID = $_GET['id'];

  // Prepare and execute the delete query
  $sql = "DELETE FROM Student WHERE student_id = :student_id";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':student_id', $studentID);
  $stmt->execute();

  // Check if any rows were affected
  if (!$stmt->rowCount() > 0) {
    echo "Student not found or could not be deleted.";
  }
} else {
  echo "Student ID not provided.";
}
?>
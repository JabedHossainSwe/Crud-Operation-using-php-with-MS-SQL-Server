<?php
include '../config/connect_sqlsrv.php';

$studentID = $_GET['id'];

$sql = "SELECT * FROM Student WHERE student_id = :student_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':student_id', $student_id);
$stmt->execute();
$student = $stmt->fetch(PDO::FETCH_ASSOC);

if ($student) {
  // Prepare JSON data for modal
  $studentDetails = array(
    'student_id' => $student['student_id'],
    'first_name' => $student['first_name'],
    'last_name' => $student['last_name'],
    'date_of_birth' => $student['date_of_birth'],
    'address' => $student['address'],
    'email' => $student['email'],
    'phone_number' => $student['phone_number'],
    'department' => $student['department'],
    'father_name' => $student['father_name'],
    'mother_name' => $student['mother_name'],
    'grade' => $student['grade'],
    'enrolment_date' => $student['enrolment_date']
  );

  // Encode JSON data for AJAX response
  $jsonData = json_encode($studentDetails);
} else {
  $jsonData = "Student not found.";
}

echo $jsonData;

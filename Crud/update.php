<?php
include '../config/connect_sqlsrv.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['student_id'])) {
  $student_id = $_POST['student_id'];
  $updatedFirstName = $_POST['firstName'];
  $updatedLastName = $_POST['lastName'];
  $updatedDateOfBirth = $_POST['date_of_birth'];
  $updatedAddress = $_POST['address'];
  $updatedEmail = $_POST['email'];
  $updatedPhone = $_POST['phone_number'];
  $updatedDepartment = $_POST['department'];
  $updatedFatherName = $_POST['father_name'];
  $updatedMotherName = $_POST['mother_name'];
  $updatedGrade = $_POST['grade'];


  $updateSql = "UPDATE Student SET 
    first_name = :first_name, 
    last_name = :last_name, 
    date_of_birth = :date_of_birth, 
    address = :address, 
    email = :email,
    phone_number = :phone_number,
    department = :department,
    father_name = :father_name,
    mother_name = :mother_name,
    grade = :grade
    WHERE student_id = :student_id";


  $updateStmt = $conn->prepare($updateSql);
  $updateStmt->bindParam(':first_name', $updatedFirstName);
  $updateStmt->bindParam(':last_name', $updatedLastName);
  $updateStmt->bindParam(':date_of_birth', $updatedDateOfBirth);
  $updateStmt->bindParam(':address', $updatedAddress);
  $updateStmt->bindParam(':email', $updatedEmail);
  $updateStmt->bindParam(':address', $updatedAddress);
  $updateStmt->bindParam(':phone_number', $updatedPhone);
  $updateStmt->bindParam(':department', $updatedDepartment);
  $updateStmt->bindParam(':father_name', $updatedFatherName);
  $updateStmt->bindParam(':mother_name', $updatedMotherName);
  $updateStmt->bindParam(':grade', $updatedGrade);


  $updateStmt->bindParam(':student_id', $student_id);
  $updateResult = $updateStmt->execute();

  if ($updateResult) {
    echo "Student information updated successfully!";
    // Redirect to view the updated student details
    header("Location: view.php?id=$student_id");
    exit();
  } else {
    echo "Failed to update student information.";
  }
} else {
  echo "Invalid request.";
}
?>
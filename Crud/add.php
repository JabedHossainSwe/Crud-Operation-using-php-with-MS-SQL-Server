<?php
include '../config/connect_sqlsrv.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"] ?? '';
    $last_name = $_POST["last_name"] ?? '';
    $date_of_birth = isset($_POST["dob"]) ? date('Y-m-d', strtotime($_POST["dob"])) : '';
    $address = $_POST["address"] ?? '';
    $email = $_POST["email"] ?? '';
    $phone_number = $_POST["phone"] ?? '';
    $department = $_POST["department"] ?? '';
    $father_name = $_POST["father_name"] ?? '';
    $mother_name = $_POST["mother_name"] ?? '';
    $grade = $_POST["grade"] ?? '';

    $sql = "INSERT INTO Student (first_name, last_name, date_of_birth, address, email, phone_number, department, father_name, mother_name, grade, enrolment_date) 
            VALUES (:first_name, :last_name, :date_of_birth, :address, :email, :phone_number, :department, :father_name, :mother_name, :grade, GETDATE())";

    try {
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':date_of_birth', $date_of_birth);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone_number', $phone_number);
        $stmt->bindParam(':department', $department);
        $stmt->bindParam(':father_name', $father_name);
        $stmt->bindParam(':mother_name', $mother_name);
        $stmt->bindParam(':grade', $grade);

        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error executing statement";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        $stmt = null;
        $conn = null;
    }
}
?>
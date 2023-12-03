<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Details</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    h1 {
      text-align: center;
    }

    .centered-form {
      display: flex;
      justify-content: center;
    }

    .form-container {
      max-width: 400px;
      width: 100%;
    }
  </style>
</head>

<body>
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
      ?>
      <h1>Student Details</h1>
      <div class="centered-form">
        <form class="form-container">
          <div class="form-group">
            <label for="studentID">Student ID:</label>
            <input type="text" class="form-control" id="studentID" value="<?= $student['student_id'] ?>" readonly>
          </div>
          <div class="form-group">
            <label for="firstName">First Name:</label>
            <input type="text" class="form-control" id="firstName" value="<?= $student['first_name'] ?>" readonly>
          </div>
          <div class="form-group">
            <label for="lastName">Last Name:</label>
            <input type="text" class="form-control" id="lastName" value="<?= $student['last_name'] ?>" readonly>
          </div>
          <div class="form-group">
            <label for="dateOfBirth">Date of Birth:</label>
            <input type="text" class="form-control" id="dateOfBirth" value="<?= $student['date_of_birth'] ?>" readonly>
          </div>
          <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" value="<?= $student['address'] ?>" readonly>
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" value="<?= $student['email'] ?>" readonly>
          </div>

          <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" id="phone" value="<?= $student['phone_number'] ?>" readonly>
          </div>

          <div class="form-group">
            <label for="department">Department:</label>
            <input type="text" class="form-control" id="department" value="<?= $student['department'] ?>" readonly>
          </div>

          <div class="form-group">
            <label for="father_name">Father's Name:</label>
            <input type="text" class="form-control" id="father_name" value="<?= $student['father_name'] ?>" readonly>
          </div>

          <div class="form-group">
            <label for="mother_name">Mother's Name:</label>
            <input type="text" class="form-control" id="mother_name" value="<?= $student['mother_name'] ?>" readonly>
          </div>

          <div class="form-group">
            <label for="grade">Grade:</label>
            <input type="text" class="form-control" id="grade" value="<?= $student['grade'] ?>" readonly>
          </div>

          <!-- Additional actions or buttons if needed -->
          <a href="edit.php?id=<?= $student_id ?>" class="btn btn-primary">Edit</a>
          <a href="delete.php?id=<?= $student_id ?>" class="btn btn-danger">Delete</a>
        </form>
      </div>
      <?php
    } else {
      echo "Student not found.";
    }
  } else {
    echo "Student ID not provided.";
  }
  ?>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
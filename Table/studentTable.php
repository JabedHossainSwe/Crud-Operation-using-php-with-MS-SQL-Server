<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="container mt-4">

    <table id="studentTable" class="table table-striped table-bordered student-table">
      <thead class="thead-dark">
        <tr>
          <th>Student ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Date of Birth</th>
          <th>Address</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Department</th>
          <th>Father's Name</th>
          <th>Mother's Name</th>
          <th>Grade</th>
          <th>Enrolment Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include 'config/connect_sqlsrv.php';
        $sql = "SELECT * FROM Student";
        $result = $conn->query($sql);

        if ($result) {
          foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . $row['student_id'] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['date_of_birth'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['phone_number'] . "</td>";
            echo "<td>" . $row['department'] . "</td>";
            echo "<td>" . $row['father_name'] . "</td>";
            echo "<td>" . $row['mother_name'] . "</td>";
            echo "<td>" . $row['grade'] . "</td>";
            echo "<td>" . $row['enrolment_date'] . "</td>";
            echo "<td>
      
        <a class='btn btn-primary btn-sm' href='crud/view.php?id=" . $row['student_id'] . "'>View</a> 
        <a class='btn btn-warning btn-sm' href='crud/edit.php?id=" . $row['student_id'] . "'>Edit</a>
        <a class='btn btn-danger btn-sm' href='crud/delete.php?id=" . $row['student_id'] . "'>Delete</a>
      </td>";

            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='13'>No records found</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>
<div class="container mt-4">
  <table class="table table-striped table-bordered student-table">
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
        <button class='btn btn-primary btn-sm'>View</button>
        <button class='btn btn-warning btn-sm'>Edit</button>
        <button class='btn btn-danger btn-sm'>Delete</button>
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
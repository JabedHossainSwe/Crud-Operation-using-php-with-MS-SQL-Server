<div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title" id="addStudentModalLabel">Add Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action="crud/add.php" method="POST">
          <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" class="form-control" id="first_name" name="first_name" autocomplete="off"
              placeholder="First Name" required>

            <label for="first_name">Last Name:</label>
            <input type="text" class="form-control" id="last_name" name="last_name" autocomplete="off"
              placeholder="Last Name" required>

            <label for="dob">Date of Birht</label>
            <input type="date" class="form-control" id="dob" name="dob" autocomplete="off" required>

            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address" autocomplete="off" placeholder="Address"
              required>

            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" autocomplete="off" placeholder="Email"
              required>

            <label for="phone">Phone:</label>
            <input type="number" class="form-control" id="phone" name="phone" autocomplete="off" placeholder="Phone"
              required>

            <label for="department">Department:</label>
            <input type="text" class="form-control" id="department" name="department" autocomplete="off"
              placeholder="Department" required>

            <label for="father_name">Father's Name:</label>
            <input type="text" class="form-control" id="father_name" name="father_name" autocomplete="off"
              placeholder="Father's Name" required>

            <label for="mother_name">Mother's Name:</label>
            <input type="text" class="form-control" id="mother_name" name="mother_name" autocomplete="off"
              placeholder="Mother's Name" required>

            <label for="Grade">Grade:</label>
            <input type="number" class="form-control" id="Grade" name="Grade" autocomplete="off" required>

          </div>

          <div class="modal_bottom_button">
            <button type="submit" class="btn btn-primary">Add
              Student</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
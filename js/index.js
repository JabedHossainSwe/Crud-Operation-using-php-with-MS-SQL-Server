$(document).ready(function () {
  $(".view-details").on("click", function () {
    var studentId = $(this).data("id");

    // Fetch student details using AJAX
    $.ajax({
      url: "Crud/view.php?id=" + studentId,
      method: "GET",
      dataType: "json",
      success: function (data) {
        $("#studentID").text(data.student_id);
        $("#firstName").text(data.first_name);
        $("#lastName").text(data.last_name);
        $("#dateOfBirth").text(data.date_of_birth);
        $("#address").text(data.address);
        $("#email").text(data.email);
        $("#phoneNumber").text(data.phone_number);
        $("#department").text(data.department);
        $("#fatherName").text(data.father_name);
        $("#motherName").text(data.mother_name);
        $("#grade").text(data.grade);
        $("#enrolmentDate").text(data.enrolment_date);

        // Show the modal
        $("#studentModal").modal("show");
      },
      error: function () {
        alert("Error occurred while loading student details.");
      },
    });
  });
});

$(document).ready(function () {
  // AJAX request to fetch faculty data
  $.ajax({
    url: "../../src/model/getFaculty.php",
    type: "GET",
    dataType: "json",
    success: function (data) {
      // Populate table with fetched data
      var tableBody = $("#bootstrap-data-table tbody");
      $.each(data, function (index, faculty) {
        var row = $('<tr>');
        var facultyID = $('<td>').text(faculty.facultyID);
        var facultyName = $("<td>").text(
          faculty.facultyFName + " " + faculty.facultyMName + " " + faculty.facultyLName
        );
        var facultyEmail = $("<td>").text(faculty.facultyEmail);
        var facultyDept = $("<td>").text(faculty.facultyDept);
        var facultyEdit = $('<td><button class="btn btn-primary">Edit</button></td>');
        var facultyArchive = $('<td><button class="btn btn-danger">Archive</button></td>');
        

        row.append(facultyID, facultyName, facultyEmail, facultyDept, facultyEdit, facultyArchive);

        $("#bootstrap-data-table tbody").append(row);
      });
    },
    error: function (xhr, status, error) {
      // Handle error
      console.error("Error fetching faculty data:", error);
    },
  });
});

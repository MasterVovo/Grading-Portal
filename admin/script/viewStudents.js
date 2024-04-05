$(document).ready(function () {
  // Fetch student data using jQuery AJAX
  $.getJSON("../../src/php/getStudents.php", function (data) {
    // Process the data and create table rows
    $.each(data, function (index, student) {
      var row = $("<tr>");
      var stdID = $("<td>").text(student.stdID);
      var stdName= $("<td>")
        .text(
          student.stdFName + " " + student.stdMName + " " + student.stdLName
        )
        ;
      var stdEmail= $("<td>").text(student.stdEmail);

      row.append(stdID, stdName, stdEmail);

      $("#students-table tbody").append(row);
    });
  }).fail(function (jqXHR, textStatus, errorThrown) {
    console.error("Error:", errorThrown);
  });
});

$(document).ready(function () {
  // // Event delegation to handle clicks on the edit button
  // $("#subjects-table").on("click", ".edit-btn", function () {
  //   var row = $(this).closest("tr");

  //   // Find all text cells in the row and replace their content with input fields
  //   row.find("td:eq(1), td:eq(2)").each(function () {
  //     var currentContent = $(this).text().trim();
  //     $(this).data("originalValue", currentContent); // Store original value
  //     var inputField = '<input type="text" value="' + currentContent + '">';
  //     $(this).html(inputField);
  //   });

  //   // Append submit and cancel buttons
  //   var submitButton = $("<button>").addClass("submit-btn").text("Submit");
  //   var cancelButton = $("<button>").addClass("cancel-btn").text("Cancel");
  //   row.append(submitButton, cancelButton);
  //   $(this).hide(); // Hide edit button
  // });

  // // Event delegation to handle clicks on the submit button
  // $("#subjects-table").on("click", ".submit-btn", function () {
  //   var row = $(this).closest("tr");
  //   var courseID = row.find("td:eq(0)").text();
  //   var newCourseCode = row.find('td:eq(1) input[type="text"]').val();
  //   var newCourseTitle = row.find('td:eq(2) input[type="text"]').val();

  //   var isConfirmed = confirm("Are you sure you want to update this subject?");

  //   if (!isConfirmed) {
  //     return;
  //   }

  //   console.log(row, courseID, newCourseCode, newCourseTitle);

  //   console.log(
  //     "Attempting to update subject with ID:",
  //     newCourseCode,
  //     "New Title:",
  //     newCourseTitle
  //   );

  //   if (
  //     typeof newCourseTitle === "undefined" ||
  //     newCourseTitle === "" ||
  //     typeof newCourseCode === "undefined" ||
  //     newCourseCode === ""
  //   ) {
  //     console.error(
  //       "New course title is undefined or empty. Please check the input."
  //     );
  //     alert("New course title is undefined or empty. Please check the input.");
  //     return;
  //   }

  //   $.ajax({
  //     type: "POST",
  //     url: "../../src/php/updateSubjects.php",
  //     data: {
  //       crsID: courseID,
  //       crsCode: newCourseCode,
  //       crsTitle: newCourseTitle,
  //     },
  //     success: function (response) {
  //       console.log("Server response:", response);
  //       if (response.message) {
  //         alert(response.message);
  //       } else if (response.error) {
  //         alert("Error: " + response.error);
  //       } else {
  //         // Reset row to uneditable state
  //         row.find("td:eq(1), td:eq(2)").each(function () {
  //           var currentContent = $(this).find('input[type="text"]').val();
  //           $(this).text(currentContent);
  //         });

  //         row.find(".edit-btn").show(); // Show edit button
  //         row.find(".submit-btn, .cancel-btn").remove(); // Remove submit and cancel buttons
  //       }
  //     },
  //     error: function (xhr, status, error) {
  //       console.error("Error updating subject:", error);
  //       alert("Error updating subject: " + error);
  //     },
  //   });
  // });

  // // Event delegation to handle clicks on the cancel button
  // $("#subjects-table").on("click", ".cancel-btn", function () {
  //   var row = $(this).closest("tr");

  //   // Restore original values
  //   row.find("td").each(function () {
  //     var originalValue = $(this).data("originalValue");
  //     $(this).text(originalValue);
  //   });

  //   // Remove submit and cancel buttons
  //   row.find(".edit-btn").show(); // Show edit button
  //   $(this).siblings(".submit-btn").remove();
  //   $(this).remove();
  // });

  // // Event delegation to handle blur event on input fields
  // $("#subjects-table").on("blur", "input", function () {
  //   var row = $(this).closest("tr");
  //   var hasButtons = row.find(".submit-btn").length > 0;

  //   if (!hasButtons) {
  //     var currentValue = $(this).val();
  //     var originalValue = $(this).parent().data("originalValue");

  //     // If value has changed, show submit and cancel buttons
  //     if (currentValue !== originalValue) {
  //       row.append(
  //         '<button class="submit-btn">Submit</button><button class="cancel-btn">Cancel</button>'
  //       );
  //     }
  //   }
  // });

  // Fetch student data using jQuery AJAX
  $.getJSON("../../src/php/getSubjects.php", function (data) {
    // Process the data and create table rows
    $.each(data, function (index, subject) {
      var row = $("<tr>");
      var courseID = $("<td>").text(subject.crsID);
      var courseCode = $("<td>").text(subject.crsCode);
      var courseTitle = $("<td>").text(subject.crsTitle);
      // var editButton = $("<button>").addClass("edit-btn").text("Edit");

      row.append(courseID, courseCode, courseTitle);

      $("#subjects-table tbody").append(row);
    });
  }).fail(function (jqXHR, textStatus, errorThrown) {
    console.error("Error:", errorThrown);
  });

  // $("#subjects-table").on("keydown", 'input[type="text"]', function (event) {
  //   if (event.keyCode === 13) {
  //     // Check if Enter key was pressed
  //     var row = $(this).closest("tr");
  //     var submitBtn = row.find(".submit-btn");
  //     submitBtn.click(); // Trigger click event on the submit button
  //   }
  // });
});

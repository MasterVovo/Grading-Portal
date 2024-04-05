document.addEventListener("DOMContentLoaded", function() {
    // Fetch student data
    fetch('../../src/php/getStudents.php')
    .then(response => response.json())
    .then(data => {
        // Process the data and create an HTML table
        const table = document.createElement('table');
        table.innerHTML = `
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        `;
        data.forEach(student => {
            const row = table.insertRow();
            row.insertCell(0).textContent = student.stdID;
            row.insertCell(1).textContent = student.stdFName + ' ' + student.stdMName + ' ' + student.stdLName;
            row.insertCell(2).textContent = student.stdEmail;
        });
        // Append the table to the document body
        document.body.appendChild(table);
    })
    .catch(error => console.error('Error:', error));
});

// $(document).ready(function() {
//     // Fetch student data using jQuery AJAX
//     $.getJSON('../../src/php/getStudents.php', function(data) {
//         // Process the data and create table rows
//         $.each(data, function(index, student) {
//             var row = $('<tr>');
//             $('<td>').text(student.stdID).appendTo(row);
//             $('<td>').text(student.stdFName + ' ' + student.stdMName + ' ' + student.stdLName).appendTo(row);
//             $('<td>').text(student.stdEmail).appendTo(row);

//             // Create input fields for midterm and final term grades
//             var midtermInput = $('<input>').attr('type', 'text').attr('name', 'midtermGrade').addClass('midterm-input');
//             var finalTermInput = $('<input>').attr('type', 'text').attr('name', 'finalTermGrade').addClass('finalterm-input');

//             // Append inputs to table row
//             $('<td>').append(midtermInput).appendTo(row);
//             $('<td>').append(finalTermInput).appendTo(row);

//             $('#students-table tbody').append(row);
//         });

//         // Focus on next input field when Enter key is pressed
//         $('input').keypress(function(event) {
//             if (event.which == 13) {
//                 event.preventDefault();
//                 var $this = $(this);
//                 var index = $('input').index($this);
//                 $('input').eq(index + 2).focus(); // +2 to skip to the next row's input field
//             }
//         });
//     })
//     .fail(function(jqXHR, textStatus, errorThrown) {
//         console.error('Error:', errorThrown);
//     });
// });
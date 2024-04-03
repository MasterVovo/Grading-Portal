document.addEventListener("DOMContentLoaded", function() {
    // Fetch student data
    fetch('../php/getStudents.php')
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

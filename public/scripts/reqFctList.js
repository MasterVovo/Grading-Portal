const tbody = document.querySelector('tbody');

fetch('../../src/controller/getFctList.php', {
    method: 'POST'
})
.then(response => response.json())
.then(data => {
    console.log(data)
    data.forEach((item) => {
        tbody.innerHTML += `
        <tr>
            <th>${item.facultyID}</th>
            <td>${item.facultyFName}</td>
            <td>${item.facultyMName}</td>
            <td>${item.facultyLName}</td>
            <td>${item.facultyEmail}</td>
            <td>
                <a href="#" onclick="event.preventDefault()"><i class="fa fa-edit fa-1x" data-toggle="modal" data-target="#editFacultyModal"></i></a>
                <a onclick="return confirm('Are you sure you want to delete?')" href="deleteStudent.php?delid=<?php echo $row['matricNo'];?>" title="Delete Student Details"><i class="fa fa-trash fa-1x"></i></a>
                
            </td>

            
        </tr>
        `;
    });
})
.catch(error => console.error(error));
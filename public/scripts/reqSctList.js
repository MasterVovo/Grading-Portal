const tbody = document.querySelector('tbody');

const formData = new FormData();
formData.append('method', 'getAllSct');

fetch('../../src/controller/getSctList.php', {
    method: 'POST',
    body: formData
})
.then(response => response.json())
.then(data => {
    console.log(data)
    data.forEach((item) => {
        tbody.innerHTML += `
        <tr>
            <th>${item.sectionID}</th>
            <td>${item.facultyFName + ' ' + item.facultyMName + ' ' + item.facultyLName}</td>
            <td>${item.sectionYearLvl}</td>
            <td>
                <a href="#" onclick="event.preventDefault()"><i class="fa fa-edit fa-1x" data-toggle="modal" data-target="#editFacultyModal"></i></a>
                <a onclick="return confirm('Are you sure you want to delete?')" href="deleteStudent.php?delid=<?php echo $row['matricNo'];?>" title="Delete Student Details"><i class="fa fa-trash fa-1x"></i></a>
                
            </td>

            
        </tr>
        `;
    });
})
.catch(error => console.error(error));
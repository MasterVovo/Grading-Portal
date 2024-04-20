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
            <th>${item.thrID}</th>
            <th>${item.thrFName}</th>
            <th>${item.thrMName}</th>
            <th>${item.thrLName}</th>
            <th>1</th>
            <th><a href="editStudent.php?editStudentId=<?php echo $row['matricNo'];?>" title="Edit Details"><i class="fa fa-edit fa-1x"></i></a>
            <a onclick="return confirm('Are you sure you want to delete?')" href="deleteStudent.php?delid=<?php echo $row['matricNo'];?>" title="Delete Student Details"><i class="fa fa-trash fa-1x"></i></a></td></th>

            
        </tr>
        `;
    });
})
.catch(error => console.error(error));
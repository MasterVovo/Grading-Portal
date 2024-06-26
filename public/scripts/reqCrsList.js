const tbody = document.querySelector('tbody');

fetch('../../src/controller/getCrsList.php', {
    method: 'POST',
    body: (() => {
        const formData = new FormData();
        formData.append('method', 'getAllCrs')
        return formData;
    })()
})
.then(response => response.json())
.then(data => {
    console.log(data)
    data.forEach((item) => {
        tbody.innerHTML += `
        <tr>
            <th>${item.courseCode}</th>
            <td>${item.courseName}</td>
            <td>${item.courseYear}</td>
            <td>${item.courseSem}</td>
            <td>
                <a href="#" onclick="event.preventDefault()"><i class="fa fa-edit fa-1x" data-toggle="modal" data-target="#editFacultyModal"></i></a>
                <a onclick="return confirm('Are you sure you want to delete?')" href="deleteStudent.php?delid=<?php echo $row['matricNo'];?>" title="Delete Student Details"><i class="fa fa-trash fa-1x"></i></a>
                
            </td>

            
        </tr>
        `;
    });

    $("#bootstrap-data-table-export").DataTable({
        lengthMenu: [10, 25, 50, 100, { label: "All", value: -1 }],
        columnDefs: [{ targets: 4, orderable: false }],
    });
})
.catch(error => console.error(error));
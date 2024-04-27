// Script for adding separate html
fetch("includes/leftnav.html")
.then((response) => response.text())
.then((data) => {
  document.querySelector("#left-panel").innerHTML = data;
});



// Loads the student list
fetch('../../src/controller/getStdList.php', {
    method: 'POST',
    body: (() => {
        const formData = new FormData();
        formData.append('method', 'getAllStd');
        return formData;
    })()
})
.then(response => response.json())
.then(data => {
    console.log(data)
    data.forEach(item => {
        document.querySelector('#std-list-tbody').innerHTML += `
        <tr>
            <th>${item.studentID}</th>
            <td>${item.studentFName + ' ' + item.studentMName + ' ' + item.studentLName}</td>
            <td>${item.studentEmail}</td>
            <td>${item.studentSect}</td>
            <td>
                <a href="#" onclick="event.preventDefault()"><i class="fa fa-edit fa-1x" data-toggle="modal" data-target="#editFacultyModal"></i></a>
                <a onclick="return confirm('Are you sure you want to delete?')" href="deleteStudent.php?delid=<?php echo $row['matricNo'];?>" title="Delete Student Details"><i class="fa fa-trash fa-1x"></i></a>
                
            </td>

            
        </tr>
        `;
    });
    $('#std-list-data-table').DataTable();
})
.catch(error => console.error(error));



// Script for adding section on select input
const year = document.querySelector('#year');

year.addEventListener('change', () => {
    const sect = document.querySelector('#sect');
    sect.innerHTML = `<option value="" disabled selected>--Select Section--</option>`;

    formData = new FormData();
    formData.append('method', 'getSectionsByYear');
    formData.append('year', year.value)

    fetch("../../src/controller/getSctList.php", {
        method: 'POST',
        body: formData
    })
    .then((response) => response.json())
    .then(data => {
        data.forEach((item) => {
        sect.innerHTML += `<option value="${item.sectionID}">${item.sectionID}</option>`
        });
    })
    .catch((error) => console.error(error));
});



// Function for uploading student
function addStudent(event) {
    event.preventDefault();

    const stdID = document.querySelector('#std-id').value;
    const fname = document.querySelector('#fname').value;
    const mname = document.querySelector('#mname').value;
    const lname = document.querySelector('#lname').value;
    const email = document.querySelector('#email').value;
    const pass = document.querySelector('#pass').value;
    const year = document.querySelector('#year').value;
    const sect = document.querySelector('#sect').value;
    
    if (!(isValueEmpty([stdID, fname, lname, email, year, sect]))) {
        const formData = new FormData();
        formData.append('stdID', stdID);
        formData.append('fname', fname);
        formData.append('mname', mname);
        formData.append('lname', lname);
        formData.append('email', email);
        formData.append('pass', pass);
        formData.append('year', year);
        formData.append('sect', sect);

        fetch('../../src/controller/addStudent.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => alert(data))
        .catch(error => console.error(error));
    } else {
        alert("There's an empty field");
    }

    
}
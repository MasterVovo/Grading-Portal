let sectionID;

// Function for loading some contents of the assign section page
function loadContent() {
    // Load the section table
    fetch('../../src/controller/getSctList.php', {
        method: 'POST',
        body: (() => {
            const formData = new FormData();
            formData.append('method', 'getAllSct');
            return formData;
        })()
    })
    .then(response => response.json())
    .then(data => {
        data.forEach(item => {
            document.querySelector('#sct-list-tbody').innerHTML += `
                <tr>
                    <th>${item.sectionID}</th>
                    <td>${item.facultyFName + ' ' + item.facultyMName + ' ' + item.facultyLName}</td>
                    <td>${item.sectionYearLvl}</td>
                    <td>
                        <a href="#" onclick="loadCourseList(event)" data-id="${item.sectionID}"><i class="fa fa-edit fa-1x" data-toggle="modal" data-target="#assignSectionModal"></i></a>
                    </td>
                </tr>
            `;
        });
        $("#sct-table").DataTable({
            columnDefs: [{ targets: 3, orderable: false }]
        });
        
    })
    .catch(error => console.error(error));

}



// Displays the courses for the sections
function loadCourseList(event) {
    event.preventDefault();
    sectionID = event.currentTarget.getAttribute('data-id');

    fetch('../../src/controller/getCrsList.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            'method': 'getBySection',
            'section': sectionID
        }).toString()
    })
    .then(response => response.json())
    .then(data => {
        data.forEach(item => {
            document.querySelector('#course-tbody').innerHTML += `
                <tr>
                    <th>${item.courseCode}</th>
                    <td>${item.courseName}</td>
                    <td>${getAssignedTeacher(sectionID, item.courseCode)}</td>
                    <td>
                        <a href="#" onclick="populateFctSelector(event)" data-id="${item.courseCode}"><i class="fa fa-edit fa-1x" data-toggle="modal" data-target="#editSemesterModal"></i></a>
                    </td>
                </tr>
            `
        });
    })
    .catch(error => console.error(error));
}



// Fetches the assigned subject teacher on a section
function getAssignedTeacher(section, course) {
    fetch('../../src/controller/getFctList.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            'method': 'getAssignedFct',
            'section': section,
            'course': course
        }).toString()
    })
    .then(response => response.text())
    .then(data => {
        
        console.log(data);
        return data;
    })
    .catch(error => console.error(error));
}



// Enable the assign button
function enableButton() {
    document.querySelector('#assign-teacher-button').removeAttribute('disabled')
}

// Fetches the available teachers that can teach the subject selector
function populateFctSelector(event) {
    document.querySelector('#assign-teacher-button').setAttribute('disabled', 'disabled')
    const courseCode = event.currentTarget.getAttribute('data-id');

    fetch('../../src/controller/getFctList.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            'method': 'getBySpecialization',
            'course': courseCode
        }).toString()
    })
    .then(response => response.json())
    .then(data => {
        if (data == 'none') {
            document.querySelector('#crs-code').placeholder = 'Course Code';
            document.querySelector('#fct').innerHTML = `<option value="" disabled selected>--No Available Teachers--</option>`
            throw new Error('No available teachers');
        } else {
            document.querySelector('#crs-code').placeholder = courseCode;
            document.querySelector('#fct').innerHTML = `<option value="" disabled selected>--Select a Teacher--</option>`

            data.forEach(item => {
                document.querySelector('#fct').innerHTML += `
                    <option value="${item.facultyID}">${item.facultyFName + ' ' + item.facultyMName + ' ' + item.facultyLName}</option>
                `
            })
        }
    })
    .catch(error => console.error(error));
}



// Assign the teacher on the subject and section
function assignTeacher(event) {
    event.preventDefault();
    
    swal.fire({
        title: "Are you sure?",
        text: "This will assign the teacher to the section!",
        icon: "question",
        showConfirmButton: true,
        showCancelButton: true,
    })
    .then((result) => {
    if (result.isConfirmed) {
        fetch('../../src/controller/setAssignment.php', {
            method: 'POST',
            body: new URLSearchParams({
                'id': document.querySelector('#fct').value,
                'sect': sectionID,
                'crs': document.querySelector('#crs-code').placeholder
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data == 'Query executed successfully.') {
                swal.fire({
                    title: 'Teacher assigned successfully.',
                    icon: "success",
                    showConfirmButton: true,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "assignSection.html";
                    }
                })
            } else
                throw new Error(data);
        })
        .catch(error => {
            console.error(error)
            swal.fire({
                title: 'Something went wrong.',
                text: error,
                icon: "error"
            })
        });
    }
    });


    // fetch('../../src/controller/setAssignment.php', {
    //     method: 'POST',
    //     body: new URLSearchParams({
    //         'id': document.querySelector('#fct').value,
    //         'sect': sectionID,
    //         'crs': document.querySelector('#crs-code').placeholder
    //     })
    // })
    // .then(response => response.text())
    // .then(data => {
    //     console.log(data);
    // })
    // .catch(error => console.error(error));
}
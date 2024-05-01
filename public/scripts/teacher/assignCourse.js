function loadContent() {
    // Load the teacher table
    const fctTable = document.querySelector("#fct-list-tbl");
    const formData = new FormData();
    formData.append("method", "getAllFct");
    fetch("../../src/controller/getFctList.php", {
        method: "POST",
        body: formData,
    })
    .then((response) => response.json())
    .then((data) => {
        console.log(data);
        // Clear existing table content
        fctTable.innerHTML = "";
        data.forEach((item) => {
            fctTable.innerHTML += `
            <tr>
                <td>${item.facultyID}</th>
                <td>${item.facultyFName} ${item.facultyMName} ${item.facultyLName}</td>
                <td>${item.facultyEmail}</td>
                <td>${item.facultyType}</td>
                <td>
                    <a href="#" onclick="loadModalFields(event)" data-id="${item.facultyID}"><i class="fa fa-edit fa-1x" data-toggle="modal" data-target="#assignCoursesModal"></i></a>
                </td>
            </tr>
            `;
        });
        $("#faculty-table").DataTable({
            lengthMenu: [10, 25, 50, 100, { label: "All", value: -1 }],
            columnDefs: [{ targets: 4, orderable: false }],
        });
    })
    .catch((error) => console.error(error));



    // Load the course selection
    fetch('../../src/controller/getCrsList.php', {
        method: 'POST',
        body: (() => {
            const formData = new FormData();
            formData.append('method', 'getAllCrs');
            return formData;
        })()
    })
    .then(response => response.json())
    .then(data => {
        data.forEach(item => {
            document.querySelector('#crs').innerHTML += `
                <option value="${item.courseCode}">${item.courseName}</option>
            `;
        })
    })
    .catch(error => console.error(error));
}



// Set the ID on the teacher ID field on the modal
function loadModalFields(event) {
    event.preventDefault();
    document.querySelector('#fct-id').value = event.currentTarget.getAttribute('data-id');
    document.querySelector('#course-tbody').innerHTML = ''; // Clears the course ass table

    fetch('../../src/controller/getSpecialization.php', {
        method: 'POST',
        body: (() => {
            const formData = new FormData();
            formData.append('facultyID', document.querySelector('#fct-id').value);
            return formData;
        })()
    })
    .then(response => response.json())
    .then(data => {
        data.forEach(item => {
            document.querySelector('#course-tbody').innerHTML += `
                <tr>
                    <td>${item.courseCode}</th>
                    <td>${item.courseName}</td>
                    <td>${item.courseYear}</td>
                    <td>${item.courseSem}</td>
                    <td>
                    <a onclick="deleteCourseAssignment()" href="#"><i class="fa fa-trash fa-1x"></i></a>
                    </td>
                </tr>
            `;
        })
    })
    .catch(error => console.error(error));
}



// Set specialization of the teacher
function setSpecialization(event) {
    event.preventDefault();

    swal.fire({
        title: "Are you sure?",
        text: "This will assign the teacher to the course!",
        icon: "question",
        showConfirmButton: true,
        showCancelButton: true,
    })
    .then((result) => {
    if (result.isConfirmed) {
        fetch('../../src/controller/setSpecialization.php', {
            method: 'POST',
            body: (() => {
                const formData = new FormData();
                formData.append('facultyID', document.querySelector('#fct-id').value);
                formData.append('courseCode', document.querySelector('#crs').value);
                return formData;
            })()
        })
        .then(response => response.text())
        .then(data => {
            if (data == 'success') {
                swal.fire({
                    title: 'Teacher assigned successfully.',
                    icon: "success",
                    showConfirmButton: true,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "assignCourse.html";
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
}

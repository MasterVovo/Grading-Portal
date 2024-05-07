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

    fetch('../../src/controller/getCrsList.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            'method': 'getBySection',
            'section': event.currentTarget.getAttribute('data-id')
        }).toString()
    })
    .then(response => response.json())
    .then(data => {
        data.forEach(item => {
            document.querySelector('#course-tbody').innerHTML += `
                <tr>
                    <th>${item.courseCode}</th>
                    <td>${item.courseName}</td>
                    <td>
                        <a href="#" onclick="populateEditFields()" data-id="${item.semesterID}"><i class="fa fa-edit fa-1x" data-toggle="modal" data-target="#editSemesterModal"></i></a>
                        <a onclick="deleteSemester()" href="#"><i class="fa fa-trash fa-1x"></i></a>
                    </td>
                </tr>
            `
        });
    })
    .catch(error => console.error(error));
}
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
                    <a href="#" onclick="" data-id="${item.facultyID}"><i class="fa fa-edit fa-1x" data-toggle="modal" data-target="#assignCoursesModal"></i></a>
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


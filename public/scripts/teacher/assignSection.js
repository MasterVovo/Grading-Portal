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
        console.log(data);
        data.forEach(item => {
            document.querySelector('#sct-list-tbody').innerHTML += `
                <tr>
                    <th>${item.sectionID}</th>
                    <td>${item.facultyFName + ' ' + item.facultyMName + ' ' + item.facultyLName}</td>
                    <td>${item.sectionYearLvl}</td>
                    <td>
                        <a href="#" onclick="loadModalFields(event)" data-id="${item.sectionID}"><i class="fa fa-edit fa-1x" data-toggle="modal" data-target="#assignSectionModal"></i></a>
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
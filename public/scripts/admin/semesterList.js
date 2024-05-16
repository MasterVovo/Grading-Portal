let semDataTable = $("#sem-table").DataTable({
    columnDefs: [{ targets: 4, orderable: false }],
});

function loadContent() {
    document.querySelector('#sem-name').value = '';
    document.querySelector('#start-date').value = '';
    document.querySelector('#end-date').value = '';

    // Loading the left nav and header
    fetch("includes/leftnav.html")
    .then((response) => response.text())
    .then((data) => {
        document.querySelector("#left-panel").innerHTML = data;
    });
    fetch("includes/header.html")
    .then((response) => response.text())
    .then((data) => {
        document.querySelector("#header").innerHTML = data;
    });

    // Load the semester table list
    fetch("../../src/controller/getSemester.php", {
        method: "POST",
        body: (() => {
            const formData = new FormData();
            formData.append('get', 'all');
            return formData;
        })()
    })
    .then(response => response.json())
    .then(data => {
        semDataTable.destroy();
        document.querySelector('#sem-tbody').innerHTML = '';
        document.querySelector('#upd-button').setAttribute('disabled', 'disabled');
        data.forEach(item => {
            document.querySelector('#sem-tbody').innerHTML += `
                <tr>
                    <th>${item.semesterID}</th>
                    <td>${item.semesterName}</td>
                    <td>${item.startDate}</td>
                    <td>${item.endDate}</td>
                    <td>
                        <a href="#" onclick="populateEditFields(event)" data-id="${item.semesterID}" data-name="${item.semesterName}" data-start="${item.startDate}" data-end="${item.endDate}"><i class="fa fa-edit fa-1x" data-toggle="modal" data-target="#editSemesterModal"></i></a>
                    </td>
                </tr>
            `
        });
        semDataTable = $("#sem-table").DataTable({
            columnDefs: [{ targets: 4, orderable: false }],
        });
    })
    .catch(error => console.error(error));
}

function populateEditFields(event) {
    document.querySelector('#sem-name').value = event.currentTarget.getAttribute('data-name');
    document.querySelector('#start-date').value = event.currentTarget.getAttribute('data-start');
    document.querySelector('#end-date').value = event.currentTarget.getAttribute('data-end');

    document.querySelector('#upd-button').removeAttribute('disabled', 'disabled');
}

function updateSem(event) {
    event.preventDefault();

    swal.fire({
        title: 'Are you sure?',
        text: 'This will update the start and end data of the semester.',
        icon: 'question',
        showConfirmButton: true,
        showCancelButton: true
    })
    .then(result => {
        if (result.isConfirmed) {
            doUpdateSem()
            .then(updateRes => {
                if (updateRes == 'Success') {
                    swal.fire({
                        title: 'The semester was updated',
                        icon: 'success',
                        showConfirmButton: true
                    })
                    .then(response => {
                        if (response.isConfirmed) {
                            loadContent();
                        }
                    });
                } else {
                    swal.fire({
                        title: 'Oops! Something went wrong.',
                        icon: 'error',
                        showConfirmButton: true
                    })
                    .then(response => {
                        if (response.isConfirmed) {
                            loadContent();
                        }
                    });
                }
            })
        }
    })
    
}

async function doUpdateSem() {
    return await fetch('../../src/controller/updateSemester.php', {
        method: 'POST',
        body: (() => {
            const formData = new FormData();
            formData.append('semName', document.querySelector('#sem-name').value);
            formData.append('startDate', document.querySelector('#start-date').value);
            formData.append('endDate', document.querySelector('#end-date').value);
            return formData;
        })()
    })
    .then(response => response.json())
    .then(result => {
        return result;
    })
    .catch(error => console.error(error));
}
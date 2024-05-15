let ecrListDataTable = $("#ecr-list-table").DataTable({
    columnDefs: [{ targets: 5, orderable: false }]
});;

let rootECRs;
let currentECRindex;

function loadContent() {
    clearECRListTable();
    createECRListTable();
}

function clearECRListTable() {
    ecrListDataTable.destroy();
    document.querySelector('#ecr-list-body').innerHTML = '';
}

function createECRListTable() {
    ecrListDataTable = $("#ecr-list-table").DataTable({
        columnDefs: [{ targets: 5, orderable: false }]
    });
}

function fetchApprovalECR() {
    fetch('../../src/controller/getGrades.php', {
        method: 'POST',
        body: (() => {
            const formData = new FormData();
            formData.append('method', 'getApprovalGrades');
            formData.append('term', document.querySelector('#term').value);
            return formData;
        })()
    })
    .then(response => response.json())
    .then(ecrs => {
        console.log(ecrs);
        rootECRs = ecrs;
        ecrs.forEach((ecr, index) => {
            if (ecr['ecr'][0] == undefined)
                return;

            clearECRListTable();
            document.querySelector('#ecr-list-body').innerHTML += `
                <tr>
                    <td>${ecr['ecr'][0].facultyFName} ${ecr['ecr'][0].facultyMName} ${ecr['ecr'][0].facultyLName}</td>
                    <td>${ecr['ecr'][0].studentSect}</td>
                    <td>${ecr['ecr'][0].courseCode}</td>
                    <td>${countPassed(ecr['ecr'])}</td>
                    <td>${countFailed(ecr['ecr'])}</td>
                    <td>
                        <a href="#" onclick="viewECR(event)" data-id="${index}" data-toggle="modal" data-target="#ECRModal"><i class="fa fa-eye fa-1x"></i></a>
                    </td>
                </tr>
            `;
            createECRListTable();
        });
        $('#grd-table').DataTable({
            columnDefs: [{ targets: 5, orderable: false }],
        });
    })
    .catch(error => console.error(error));
}

function countPassed(ecr) {
    let count = 0;
    ecr.forEach(record => {
        if (record.grade <= 3.00 && record.grade != 0.00)
            count++;
    })
    return count;
}

function countFailed(ecr) {
    let count = 0;
    ecr.forEach(record => {
        if (record.grade > 3.00 || record.grade == 0.00)
            count++;
    })
    return count;
}

function getRemark(grade) {
    if (grade <= 3.00)
        return 'Passed';
    else (grade > 3.00)
        return 'Failed'
}

function viewECR(event) {
    currentECRindex = event.currentTarget.getAttribute('data-id');
    rootECRs[currentECRindex]['ecr'].forEach(record => {
        document.querySelector('#ecr-body').innerHTML += `
            <tr>
                <td>${record.studentID}</td>
                <td>${record.studentFName} ${record.studentMName} ${record.studentLName}</td>
                <td>${record.grade}</td>
                <td>${getRemark(record.grade)}</td>
            </tr>
        `;
    });
    $('#ecr-table').DataTable();
}

function approveECR() {
    swal.fire({
        title: "Are you sure?",
        text: "You approve to the contents of the ECR!",
        icon: "question",
        showConfirmButton: true,
        showCancelButton: true,
    })
    .then((result) => {
        if (result.isConfirmed) {
            fetch('../../src/controller/approveECR.php', {
                method: 'POST',
                body: (() => {
                    const formData = new FormData;
                    formData.append('approvalID', rootECRs[currentECRindex].approvalID);
                    formData.append('term', document.querySelector('#term').value);
                    return formData;
                })()
            })
            .then(response => response.json())
            .then(result => {
                if (result == 'Success') {
                    swal.fire({
                        title: 'The ECR is now approved.',
                        icon: "success",
                        showConfirmButton: true,
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                          loadContent();
                        }
                    });
                } else {
                    swal.fire({
                        title: 'Oops! Something went wrong.',
                        icon: 'error',
                        showConfirmButton: true,
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                          loadContent();
                        }
                    })
                }
            })
            .catch(error => console.error(error));

        }

    });
    
}
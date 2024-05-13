let rootECRs;
let currentECRindex;

function loadContent() {
    fetchApprovalECR();
}

function fetchApprovalECR() {
    fetch('../../src/controller/getGrades.php', {
        method: 'POST',
        body: (() => {
            const formData = new FormData();
            formData.append('method', 'getApprovalGrades');
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
            document.querySelector('#grd-body').innerHTML += `
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
        if (record.gradeFinal <= 3.00 && record.gradeFinal != 0.00)
            count++;
    })
    return count;
}

function countFailed(ecr) {
    let count = 0;
    ecr.forEach(record => {
        if (record.gradeFinal > 3.00 || record.gradeFinal == 0.00)
            count++;
    })
    return count;
}

function viewECR(event) {
    currentECRindex = event.currentTarget.getAttribute('data-id');
    rootECRs[currentECRindex]['ecr'].forEach(record => {
        document.querySelector('#ecr-body').innerHTML += `
            <tr>
                <td>${record.studentID}</td>
                <td>${record.studentFName} ${record.studentMName} ${record.studentLName}</td>
                <td>${record.gradeMidterm}</td>
                <td>${record.gradeFinal}</td>
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
                    formData.append('method', json_stringify(rootECRs[currentECRindex]));
                    return formData;
                })()
            })
            .then(response => response.json())
            .then()
            .catch(error => console.error(error));

        }

    });
    
}
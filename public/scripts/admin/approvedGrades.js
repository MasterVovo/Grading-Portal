let ecrListDataTable = $("#ecr-list-table").DataTable({
    columnDefs: [{ targets: 5, orderable: false }]
});;
let ecrDataTable = $('#ecr-table').DataTable();

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

function fetchApprovedECR() {
    fetch('../../src/controller/getGrades.php', {
        method: 'POST',
        body: (() => {
            const formData = new FormData();
            formData.append('method', 'getApprovedGrades');
            formData.append('term', document.querySelector('#term').value);
            return formData;
        })()
    })
    .then(response => response.json())
    .then(ecrs => {
        console.log(ecrs);
        rootECRs = ecrs;
        clearECRListTable();
        ecrs.forEach((ecr, index) => {
            if (ecr['ecr'][0] == undefined)
                return;
            
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
        });
        createECRListTable();
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
    ecrDataTable.destroy();
    document.querySelector('#ecr-body').innerHTML = '';
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
    ecrDataTable = $('#ecr-table').DataTable();
}

function printECR() {
    // const page = document.querySelector('#ecr-table').innerHTML; // Specify the content you want to convert to PDF
    const page = '<h1 style="background:black">Hello world</h1>';
    console.log(page);
    var opt = {
        margin:       1,
        filename:     'ECR.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2 },
        jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
    };
    // Choose the element that contains the content you want to convert.
    html2pdf().set(opt).from(page).save();
}
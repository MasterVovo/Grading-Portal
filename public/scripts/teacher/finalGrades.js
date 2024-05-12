function loadContent() {
    fetch('../../src/controller/getSctList.php', {
        method: 'POST',
        body: (() => {
            const formData = new FormData();
            formData.append('method', 'getSctByFct');
            return formData;
        })()
    })
    .then(response => response.json())
    .then(data => {
        document.querySelector('#sections').innerHTML = '<option value="" disabled selected>Select A Section</option>';

        data.forEach(item => {
            document.querySelector('#sections').innerHTML += `
                <option value="${item.sectionID}">${item.sectionID}</option>
            `;
        })
    })
    .catch(error => console.error(error));
}



function loadCourses(event) {
    fetch('../../src/controller/getAssignment.php', {
        method: 'POST',
        body: (() => {
            const formData = new FormData();
            formData.append('method', 'getBySctAndFct');
            formData.append('section', event.currentTarget.value);
            return formData;
        })()
    })
    .then(response => response.json())
    .then(data => {
        document.querySelector('#courses').innerHTML = '<option value="" disabled selected>Select A Section</option>';

        data.forEach(item => {
            document.querySelector('#courses').innerHTML += `
                <option value="${item.courseCode}">${item.courseCode}</option>
            `;
        });
    })
    .catch(error => console.error(error));
}



let stdDataTable = $("#std-table").DataTable({
    columnDefs: [{ targets: [2, 3], orderable: false }]
});
function loadStudents() {
    fetch('../../src/controller/getStdList.php', {
        method: 'POST',
        body: (() => {
            const formData = new FormData();
            formData.append('method', 'getStdBySct');
            formData.append('section', document.querySelector('#sections').value);
            return formData;
        })()
    })
    .then(response => response.json())
    .then(data => {
        stdDataTable.destroy();
        document.querySelector('#std-tbody').innerHTML = '';
        data.forEach(item => {
            document.querySelector('#std-tbody').innerHTML += `
            <tr>
                <td>${item.studentID}</td>
                <td>${item.studentFName + ' ' + item.studentMName + ' ' + item.studentLName}</td>
                <td>
                    <select class="custom-select form-control grades" data-id="${item.studentID}">
                        <option disabled selected>-Grade-</option>
                        <option value='1.00'>1.00</option>
                        <option value='1.25'>1.25</option>
                        <option value='1.50'>1.50</option>
                        <option value='1.75'>1.75</option>
                        <option value='2.00'>2.00</option>
                        <option value='2.25'>2.25</option>
                        <option value='2.50'>2.50</option>
                        <option value='2.75'>2.75</option>
                        <option value='3.00'>3.00</option>
                        <option value='3.25'>3.25</option>
                        <option value='3.50'>3.50</option>
                        <option value='3.75'>3.75</option>
                        <option value='4.00'>4.00</option>
                        <option value='4.25'>4.25</option>
                        <option value='4.50'>4.50</option>
                        <option value='4.75'>4.75</option>
                        <option value='5.00'>5.00</option>
                    </select>
                <td>
                    <input type="text" class="form-control cc-exp feedbacks">
                </td>
            </tr>
        `;
        });
        stdDataTable = $("#std-table").DataTable({
            columnDefs: [{ targets: [2, 3], orderable: false }]
        });
       
    })
    .catch(error => console.error(error));
}



function submitGrades() {
    swal.fire({
        title: "Are you sure?",
        text: "This will upload the students grade!",
        icon: "question",
        showConfirmButton: true,
        showCancelButton: true,
      })
      .then((result) => {
        const gradesElement = document.querySelectorAll('.grades');
        const feedbacksElement = document.querySelectorAll('.feedbacks');

        let assocArr = {};
        for (let i = 0; i < gradesElement.length; i++) {
            assocArr[gradesElement[i].getAttribute('data-id')] = {'grade': gradesElement[i].value, 'feedback': feedbacksElement[i].value};
        }

        fetch('../../src/controller/setGrades.php', {
            method: 'POST',
            body: (() => {
                const formData = new FormData();
                formData.append('grdTerm', 'final');
                formData.append('grades', JSON.stringify(assocArr));
                formData.append('course', document.querySelector('#courses').value)
                return formData;
            })()
        })
        .then(response => response.json())
        .then(data => {
            swal.fire({
                title: data,
                icon: "success",
                showConfirmButton: true,
            })
            .then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "finalGrades.html";
                }
            })
        })
        .catch(error => console.error(error));
    });


    
}
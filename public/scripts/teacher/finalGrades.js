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
                <td><input type="text" maxlength="4" size="4" class="grades" data-id="${item.studentID}" /></td>
                <td>
                    <textarea
                    class="feedbacks"
                    cols="30"
                    rows="1"
                    ></textarea>
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
    const gradesElement = document.querySelector('#grades');
    const feedbacksElement = document.querySelector('#feedbacks');

}
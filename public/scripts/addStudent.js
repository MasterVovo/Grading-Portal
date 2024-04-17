const form = document.querySelector('#add-student');

form.addEventListener('submit', (event) => {
    event.preventDefault();

    const stdID = document.querySelector('#std-id').value;
    const fname = document.querySelector('#fname').value;
    const mname = document.querySelector('#mname').value;
    const lname = document.querySelector('#lname').value;
    const email = document.querySelector('#email').value;
    const pass = document.querySelector('#pass').value;
    const dept = document.querySelector('#dept').value;
    const year = document.querySelector('#year').value;
    const sect = document.querySelector('#sect').value;
    
    if (!(isValueEmpty([stdID, fname, mname, lname, email, pass, dept, year, sect]))) {
        const formData = new FormData();
        formData.append('stdID', stdID);
        formData.append('fname', fname);
        formData.append('mname', mname);
        formData.append('lname', lname);
        formData.append('email', email);
        formData.append('pass', pass);
        formData.append('dept', dept);
        formData.append('year', year);
        formData.append('sect', sect);

        fetch('../../src/controller/addStudents.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => console.log(data))
        .catch(error => console.error(error));
    } else {
        alert("There's an empty field");
    }
});

function isValueEmpty(arr) {
    return arr.some(elem => elem === '');
}
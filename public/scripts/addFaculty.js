const form = document.querySelector('#add-faculty');

form.addEventListener('submit', (event) => {
    event.preventDefault();

    const fctID = document.querySelector('#fct-id').value;
    const fname = document.querySelector('#fname').value;
    const mname = document.querySelector('#mname').value;
    const lname = document.querySelector('#lname').value;
    const email = document.querySelector('#email').value;
    const pass = document.querySelector('#pass').value;
    const dept = document.querySelector('#dept').value;
    
    if (!(isValueEmpty([fctID, fname, mname, lname, email, dept]))) {
        const formData = new FormData();
        formData.append('fctID', fctID);
        formData.append('fname', fname);
        formData.append('mname', mname);
        formData.append('lname', lname);
        formData.append('email', email);
        formData.append('pass', pass);
        formData.append('dept', dept);

        fetch('../../src/controller/addFaculty.php', {
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
};
const form = document.querySelector('#add-faculty');

form.addEventListener('submit', (event) => {
    event.preventDefault();

    const fctID = document.querySelector('#fct-id').value;
    const fname = document.querySelector('#fname').value;
    const mname = document.querySelector('#mname').value;
    const lname = document.querySelector('#lname').value;
    const email = document.querySelector('#email').value;
    const pass = document.querySelector('#pass').value;
    const fctType = document.querySelector('#fct-type').value;
    
    if (!(isValueEmpty([fctID, fname, lname, email]))) {
        const formData = new FormData();
        formData.append('fctID', fctID);
        formData.append('fname', fname);
        formData.append('mname', mname);
        formData.append('lname', lname);
        formData.append('email', email);
        formData.append('pass', pass);
        formData.append('fctType', fctType);

        fetch('../../src/controller/addFaculty.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => alert(data))
        .catch(error => console.error(error));
    } else {
        alert("There's an empty field");
    }
});

function isValueEmpty(arr) {
    return arr.some(elem => elem === '');
};
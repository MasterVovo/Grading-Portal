const form = document.querySelector('#add-course');

form.addEventListener('submit', (event) => {
    event.preventDefault();

    const crsCode = document.querySelector('#crs-code').value;
    const crsName = document.querySelector('#crs-name').value;
    const year = document.querySelector('#year').value;
    const sem = document.querySelector('#sem').value;
    
    if (!(isValueEmpty([crsCode, crsName, year, sem]))) {
        const formData = new FormData();
        formData.append('crsCode', crsCode);
        formData.append('crsName', crsName);
        formData.append('year', year);
        formData.append('sem', sem);

        fetch('../../src/controller/addCourse.php', {
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
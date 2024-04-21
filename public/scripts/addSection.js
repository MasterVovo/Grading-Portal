const form = document.querySelector('#add-section');

form.addEventListener('submit', (event) => {
    event.preventDefault();

    const sctID = document.querySelector('#sct-id').value;
    const fctID = document.querySelector('#adv-id').value;
    const year = document.querySelector('#year').value;
    
    if (!(isValueEmpty([sctID, fctID, year]))) {
        const formData = new FormData();
        formData.append('sctID', sctID);
        formData.append('fctID', fctID);
        formData.append('year', year);

        fetch('../../src/controller/addSection.php', {
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
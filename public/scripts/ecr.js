const formECR = document.querySelector('#form-ecr');

formECR.addEventListener('submit', (event) => {
    event.preventDefault();

    const files = document.querySelector('#input-ecr').files;
    const startCell = document.querySelector('#startCell');
    const endCell = document.querySelector('#endCell');
    if (files.length > 0 && startCell !== '' && endCell !== '') {
        // Create form data.
        const formData = new FormData();
        formData.append('ecr', files[0]);
        formData.append('startCell', startCell.value);
        formData.append('endCell', endCell.value);

        // Send the formData to php.
        fetch('../../src/controller/importECR.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => document.querySelector('.error').innerHTML = data)
        .catch(error => document.querySelector('.error').innerHTML = data);
    } else {
        // Notify when no file is seleted.
        alert("Please select a file");
    }
})
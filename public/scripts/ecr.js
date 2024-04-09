const formECR = document.querySelector('#form-ecr');

formECR.addEventListener('submit', (event) => {
    event.preventDefault();

    const files = document.querySelector('#input-ecr').files;
    const grdTerm = document.querySelector('#grd-term');
    const idStartCell = document.querySelector('#idStartCell');
    const idEndCell = document.querySelector('#idEndCell');
    const grdStartCell = document.querySelector('#grdStartCell');
    const grdEndCell = document.querySelector('#grdEndCell');
    if (files.length > 0 && idStartCell !== '' && idEndCell !== '' && grdStartCell !== '' && grdEndCell !== '') {
        // Create form data.
        const formData = new FormData();
        formData.append('ecr', files[0]);
        formData.append('grdTerm', grdTerm.value);
        formData.append('idStartCell', idStartCell.value);
        formData.append('idEndCell', idEndCell.value);
        formData.append('grdStartCell', grdStartCell.value);
        formData.append('grdEndCell', grdEndCell.value);

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
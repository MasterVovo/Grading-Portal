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
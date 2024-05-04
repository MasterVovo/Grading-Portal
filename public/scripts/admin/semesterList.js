function loadContent() {
    // Loading the left nav and header
    fetch("includes/leftnav.html")
    .then((response) => response.text())
    .then((data) => {
        document.querySelector("#left-panel").innerHTML = data;
    });
    fetch("includes/header.html")
    .then((response) => response.text())
    .then((data) => {
        document.querySelector("#header").innerHTML = data;
    });

    // Load the semester table list
    fetch("../../src/controller/getSemester.php", {
        method: "POST",
        body: (() => {
            const formData = new FormData();
            formData.append('get', 'all');
            return formData;
        })()
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
    })
    .catch(error => console.error(error));
}



// Function for uploading the semester to the database
function uploadSemester(event) {
    event.preventDefault();

    fetch('../../src/controller/addSemester.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            'semName': document.querySelector('#sem-name').value,
            'startDate': document.querySelector('#start-date').value,
            'endDate': document.querySelector('#end-date').value
        }).toString()
    })
    .then(response => response.text())
    .then(data => {
        console.log(data)
    })
    .catch(error => console.error(error));
}
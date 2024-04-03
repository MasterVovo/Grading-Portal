document.addEventListener("DOMContentLoaded", function() {
    fetch('get_grades.php')
    .then(response => response.json())
    .then(data => {
        // Process the data and update the HTML content
        data.forEach(subject => {
            const subjectDiv = document.createElement('div');
            subjectDiv.classList.add('subject');
            subjectDiv.innerHTML = `
                <h2>${subject.name}</h2>
                <p>Midterm Grade: ${subject.midterm}</p>
                <p>Final Term Grade: ${subject.final}</p>
                <p>Average Final Grade: ${subject.average}</p>
            `;
            document.body.appendChild(subjectDiv);
        });
    })
    .catch(error => console.error('Error:', error));
});
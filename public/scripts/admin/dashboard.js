function loadContent() {
    loadCardData();
    loadChartData();
}

function loadCardData() {
    // Display active users
    fetch('../../src/controller/getChartData.php', {
        method: 'POST',
        body: (() => {
        const formData = new FormData();
        formData.append('method', 'getActiveUsers');
        return formData;
        })()
    })
    .then(response => response.json())
    .then(data => {
        document.querySelector('#active-users').innerHTML = data[0]['activeUsers'];
    })
    .catch(error => console.error(error));

    let totalStdValue;
    let totalFctValue;

    // Fetch total student count
    fetch('../../src/controller/getChartData.php', {
        method: 'POST',
        body: (() => {
        const formData = new FormData();
        formData.append('method', 'getTotalStudent');
        return formData;
        })()
    })
    .then(response => response.json())
    .then(data => {
        totalStdValue = parseInt(data[0]['totalStd']);
        document.querySelector('#total-std').innerHTML = totalStdValue;

        // Call calculateTotalUsers() after fetching total student count
        calculateTotalUsers();
    })
    .catch(error => console.error(error));

    // Fetch total faculty count
    fetch('../../src/controller/getChartData.php', {
        method: 'POST',
        body: (() => {
        const formData = new FormData();
        formData.append('method', 'getTotalFaculty');
        return formData;
        })()
    })
    .then(response => response.json())
    .then(data => {
        totalFctValue = parseInt(data[0]['totalFct']);
        document.querySelector('#total-fct').innerHTML = totalFctValue;

        // Call calculateTotalUsers() after fetching total faculty count
        calculateTotalUsers();
    })
    .catch(error => console.error(error));

    // Calculate total users and update the UI
    function calculateTotalUsers() {
    if (totalStdValue !== undefined && totalFctValue !== undefined) {
        const totalUsers = totalStdValue + totalFctValue;
        document.querySelector('#total-users').innerHTML = totalUsers;
    } else {
        console.error('Total student or faculty value is not available');
    }
    }
}

function loadChartData() {
    fetch('../../src/controller/getChartData.php', {
        method: 'POST',
        body: (() => {
            const formData = new FormData()
            formData.append('method', 'getGradeHistory');
            return formData;
        })()
    })
    .then(response => response.json())
    .then(gradeHistory => {
        console.log(gradeHistory);
        createAvgGradeChart(gradeHistory);
        createStdCountChart(gradeHistory);
        createPerformanceChart(gradeHistory);
    })
    .catch(error => console.error(error));
    
}

function createAvgGradeChart($gradeHistory) {
    const data = [
        {
            year: '1st',
            count: $gradeHistory['firstYear'].avg[0].avgGrade
        },
        {
            year: '2nd',
            count: $gradeHistory['secondYear'].avg[0].avgGrade
        },
        {
            year: '3rd',
            count: $gradeHistory['thirdYear'].avg[0].avgGrade
        },
        {
            year: '4th',
            count: $gradeHistory['fourthYear'].avg[0].avgGrade
        },
    ];
    

    new Chart(document.querySelector('#avg-grades-chart'), {
        type: 'bar',
        options: {
          scales: {
            y: {
              min: 1,
              max: 5
            }
          },
          plugins: {
            legend: {
              display: false
            },
            tooltip: {
              enabled: false
            },
            title: {
              display: true,
              text: 'Average Grades of Students Per Year Level'
            }
          },
          responsive: true,
          maintainAspectRatio: false
        },
        data: {
          labels: data.map(row => row.year),
          datasets: [{
            data: data.map(row => row.count),
            backgroundColor: [
              'hsla(207, 95%, 63%, 0.5)',
              'hsla(146, 87%, 44%, 0.5)',
              'hsla(37, 94%, 64%, 0.5)',
              'hsla(6, 92%, 62%, 0.5)'
            ]
          }]
        }
      });
}

function createStdCountChart($gradeHistory) {
    const data = [
        {
            year: '1st',
            count: $gradeHistory['firstYear'].studCount[0].studentCount
        },
        {
            year: '2nd',
            count: $gradeHistory['secondYear'].studCount[0].studentCount
        },
        {
            year: '3rd',
            count: $gradeHistory['thirdYear'].studCount[0].studentCount
        },
        {
            year: '4th',
            count: $gradeHistory['fourthYear'].studCount[0].studentCount
        },
    ];
    

    new Chart(document.querySelector('#no-students-chart'), {
        type: 'bar',
        options: {
          plugins: {
            legend: {
              display: false
            },
            tooltip: {
              enabled: false
            },
            title: {
              display: true,
              text: 'Number of Students Per Year Level'
            }
          },
          responsive: true,
          maintainAspectRatio: false
        },
        data: {
          labels: data.map(row => row.year),
          datasets: [{
            data: data.map(row => row.count),
            backgroundColor: [
              'hsla(207, 95%, 63%, 0.5)',
              'hsla(146, 87%, 44%, 0.5)',
              'hsla(37, 94%, 64%, 0.5)',
              'hsla(6, 92%, 62%, 0.5)'
            ]
          }]
        }
      });
}

function createPerformanceChart($gradeHistory) {
    const data = [
        {
            year: '1st',
            count: $gradeHistory['firstYear'].avg[0].avgGrade
        },
        {
            year: '2nd',
            count: $gradeHistory['secondYear'].avg[0].avgGrade
        },
        {
            year: '3rd',
            count: $gradeHistory['thirdYear'].avg[0].avgGrade
        },
        {
            year: '4th',
            count: $gradeHistory['fourthYear'].avg[0].avgGrade
        },
    ];
    

    new Chart(document.querySelector('#performance-chart'), {
        type: 'line',
        options: {
          plugins: {
            legend: {
              display: true
            },
            tooltip: {
              enabled: true
            },
            title: {
              display: true,
              text: 'Performance of Student Throughout Grading Period'
            }
          },
          responsive: true,
          maintainAspectRatio: false
        },
        data: {
          labels: ['1Y1S', '1Y2S', '2Y1S', '2Y2S', '3Y1S', '3Y2S', '4Y1S', '4Y2S', ],
          datasets: [{
              label: '1st',
              data: [92, 95],
              fill: true,
              backgroundColor: 'hsla(207, 95%, 63%, 0.2)',
              borderColor: 'hsla(207, 95%, 63%)',
              tension: 0.2
            },
            {
              label: '2nd',
              data: [88, 87, 85, 90],
              fill: true,
              backgroundColor: 'hsla(146, 87%, 44%, 0.2)',
              borderColor: 'hsla(146, 87%, 44%)',
              tension: 0.2
            },
            {
              label: '3rd',
              data: [95, 96, 88, 85, 92, 92],
              fill: true,
              backgroundColor: 'hsla(37, 94%, 64%, 0.2)',
              borderColor: 'hsla(37, 94%, 64%)',
              tension: 0.2
            },
            {
              label: '4th',
              data: [88, 85, 90, 89, 94, 93, 96, 98],
              fill: true,
              backgroundColor: 'hsla(6, 92%, 62%, 0.2)',
              borderColor: 'hsla(6, 92%, 62%)',
              tension: 0.2
            }
          ]
        }
      });
}
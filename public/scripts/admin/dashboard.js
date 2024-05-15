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

    // Fetch total failures and passers
    fetch('../../src/controller/getChartData.php', {
      method: 'POST',
      body: (() => {
      const formData = new FormData();
      formData.append('method', 'getTotalFailuresAndPassers');
      return formData;
      })()
    })
    .then(response => response.json())
    .then(data => {
      // Display number of failures
      document.querySelector('#total-fails').innerHTML = data.totalFails;

      // Display passing percentage
      document.querySelector('#pass-rate').innerHTML = ((data.totalPasses / (data.totalPasses + data.totalFails)) * 100).toFixed(2) + '%';
    })
    .catch(error => console.error(error));

    // // Display passing rate
    // fetch('../../src/controller/getChartData.php', {
    //   method: 'POST',
    //   body: (() => {
    //   const formData = new FormData();
    //   formData.append('method', 'getTotalFailures');
    //   return formData;
    //   })()
    // })
    // .then(response => response.json())
    // .then(data => {
    //   document.querySelector('#total-fails').innerHTML = data.totalFails;
    // })
    // .catch(error => console.error(error));
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
            count: 6 - (($gradeHistory['firstYear'].avg[0].avgGrade == null) ? 5 : $gradeHistory['firstYear'].avg[0].avgGrade)
        },
        {
            year: '2nd',
            count: 6 - (($gradeHistory['secondYear'].avg[0].avgGrade == null) ? 5 : $gradeHistory['secondYear'].avg[0].avgGrade)
        },
        {
            year: '3rd',
            count: 6 - (($gradeHistory['thirdYear'].avg[0].avgGrade == null) ? 5 : $gradeHistory['thirdYear'].avg[0].avgGrade)
        },
        {
            year: '4th',
            count: 6 - (($gradeHistory['fourthYear'].avg[0].avgGrade == null) ? 5 : $gradeHistory['fourthYear'].avg[0].avgGrade)
        },
    ];
    

    new Chart(document.querySelector('#avg-grades-chart'), {
        type: 'bar',
        options: {
          scales: {
            y: {
              min: 1,
              max: 5,
              ticks: {
                callback: function(value, index, values) {
                    return (6 - value).toFixed(1);
                }
              }
            }
          },
          plugins: {
            legend: {
              display: false
            },
            tooltip: {
              enabled: false,
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
let rootGrade;
function createPerformanceChart($gradeHistory) {
  rootGrade = $gradeHistory;
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
          scales: {
            y: {
              min: 1,
              max: 5,
              ticks: {
                callback: function(value, index, values) {
                    return (6 - value).toFixed(1);
                },
                stepSize: .5
              }
            }
          },
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
              data: [getAvg($gradeHistory['firstYear']['1Y1S']), getAvg($gradeHistory['firstYear']['1Y2S'])],
              fill: true,
              backgroundColor: 'hsla(207, 95%, 63%, 0.2)',
              borderColor: 'hsla(207, 95%, 63%)',
              tension: 0.2
            },
            {
              label: '2nd',
              data: [getAvg($gradeHistory['secondYear']['1Y1S']), getAvg($gradeHistory['secondYear']['1Y2S']), getAvg($gradeHistory['secondYear']['2Y1S']), getAvg($gradeHistory['secondYear']['2Y2S'])],
              fill: true,
              backgroundColor: 'hsla(146, 87%, 44%, 0.2)',
              borderColor: 'hsla(146, 87%, 44%)',
              tension: 0.2
            },
            {
              label: '3rd',
              data: [getAvg($gradeHistory['thirdYear']['1Y1S']), getAvg($gradeHistory['thirdYear']['1Y2S']), getAvg($gradeHistory['thirdYear']['2Y1S']), getAvg($gradeHistory['thirdYear']['2Y2S']), getAvg($gradeHistory['thirdYear']['3Y1S']), getAvg($gradeHistory['thirdYear']['3Y2S'])],
              fill: true,
              backgroundColor: 'hsla(37, 94%, 64%, 0.2)',
              borderColor: 'hsla(37, 94%, 64%)',
              tension: 0.2
            },
            {
              label: '4th',
              data: [getAvg($gradeHistory['fourthYear']['1Y1S']), getAvg($gradeHistory['fourthYear']['1Y2S']), getAvg($gradeHistory['fourthYear']['2Y1S']), getAvg($gradeHistory['fourthYear']['2Y2S']), getAvg($gradeHistory['fourthYear']['3Y1S']), getAvg($gradeHistory['fourthYear']['3Y2S']), getAvg($gradeHistory['fourthYear']['4Y1S']), getAvg($gradeHistory['fourthYear']['4Y2S'])],
              fill: true,
              backgroundColor: 'hsla(6, 92%, 62%, 0.2)',
              borderColor: 'hsla(6, 92%, 62%)',
              tension: 0.2
            }
          ]
        }
      });
}

function getAvg(grades) {
  let sum = 0;
  grades.forEach(grade => {
    sum += parseFloat(grade.gradeFinal);
  });
  return 6 - (sum / grades.length);
}
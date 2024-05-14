// Script for adding separate html
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

// Loads the student list
fetch("../../src/controller/getStdList.php", {
  method: "POST",
  body: (() => {
    const formData = new FormData();
    formData.append("method", "getAllStd");
    return formData;
  })(),
})
  .then((response) => response.json())
  .then((data) => {
    console.log(data);
    // Clear existing table content
    document.querySelector("#std-list-tbody").innerHTML = "";
    data.forEach((item) => {
      document.querySelector("#std-list-tbody").innerHTML += `
        <tr>
            <th>${item.studentID}</th>
            <td>${item.studentFName} ${item.studentMName} ${item.studentLName}</td>
            <td>${item.studentEmail}</td>
            <td>${item.studentSect}</td>
            <td>
                <a href="#"><i class="fa fa-edit fa-1x" data-toggle="modal" data-target=""></i></a>
                <a onclick="deleteStudent('${item.studentID}', '${item.studentFName} ', '${item.studentMName} ', '${item.studentLName}')" href="#"><i class="fa fa-trash fa-1x"></i></a>
            </td>
        </tr>
        `;
    });
    $("#student-table").DataTable({
      lengthMenu: [10, 25, 50, 100, { label: "All", value: -1 }],
      columnDefs: [{ targets: 4, orderable: false }],
    });
  })
  .catch((error) => console.error(error));

// Loads the section
fetch("../../src/controller/getSctList.php", {
  method: "POST",
  body: (() => {
    const formData = new FormData();
    formData.append("method", "getAllSct");
    return formData;
  })(),
})
  .then((response) => response.json())
  .then((data) => {
    console.log(data);
    data.forEach((item) => {
      document.querySelector("#sect").innerHTML += `
            <option value="${item.sectionID}">${item.sectionID}</option>
        `;
    });
  })
  .catch((error) => console.error(error));

// Function for uploading student
function addStudent() {
  const form = document.querySelector("#add-student");
  form.addEventListener("submit", (event) => {
    event.preventDefault();

    const stdID = document.querySelector("#std-id").value;
    const fname = document.querySelector("#fname").value;
    const mname = document.querySelector("#mname").value;
    const lname = document.querySelector("#lname").value;
    const email = document.querySelector("#email").value;
    const pass = document.querySelector("#pass").value;
    const sect = document.querySelector("#sect").value;

    if (!isValueEmpty([stdID, fname, lname, email, sect])) {
      swal
        .fire({
          title: "Are you sure?",
          text: "This will upload the student's data to the database!",
          icon: "question",
          showConfirmButton: true,
          showCancelButton: true,
        })
        .then((result) => {
          if (result.isConfirmed) {
            const formData = new FormData();
            formData.append("stdID", stdID);
            formData.append("fname", fname);
            formData.append("mname", mname);
            formData.append("lname", lname);
            formData.append("email", email);
            formData.append("pass", pass);
            formData.append("sect", sect);
            formData.append('method', 'addSingle');

            swal.fire({
              // Loading
              title: "Adding Student...",
              html: "Please wait...",
              allowOutsideClick: false,
              allowEscapeKey: false,
              didOpen: () => {
                swal.showLoading();
              },
            });

            fetch("../../src/controller/addStudent.php", {
              method: "POST",
              body: formData,
            })
              .then((response) => response.text())
              .then((data) =>
                swal
                  .fire({
                    title: data,
                    icon: "success",
                    showConfirmButton: true,
                  })
                  .then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = "studentList.php";
                    }
                  })
              )
              .catch((error) => console.error(error));
          }
        });
    } else {
      alert("There's an empty field");
    }
  });
}

function deleteStudent(studentID, studentFName, studentMName, studentLName) {
  swal
    .fire({
      title:
        "<h3>Are you sure you want to archive this user?</h3><i><h5>" +
        studentID +
        " - " +
        studentFName +
        studentMName +
        studentLName +
        "</h5></i>",
      text: "Doing so will remove the user from the system",
      icon: "danger",
      showConfirmButton: true,
      showCancelButton: true,
      confirmButtonText: "Archive User",
    })
    .then((result) => {
      if (result.isConfirmed) {
        swal.fire({
          // Loading
          title: "Archiving User...",
          html: "Please wait...",
          allowOutsideClick: false,
          allowEscapeKey: false,
          didOpen: () => {
            swal.showLoading();
          },
        });
        fetch("../../src/model/archiveStudent.php", {
          method: "POST",
          body: new URLSearchParams({ studentID: studentID }),
          headers: {
            "Content-Type": "application/x-www-form-urlencoded",
          },
        })
          .then((response) => {
            if (response.ok) {
              response.text().then((text) => {
                // Display the echoed text from PHP
                swal
                  .fire({
                    title: text,
                    icon: "success",
                    showConfirmButton: true,
                  })
                  .then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = "studentList.php";
                    }
                  });
              });
            } else {
              console.error("Error archiving student");
            }
          })
          .catch((error) => console.error(error));
      }
    });
}

// Get excel of new students and display it on the table
let bulkStdData;
function getExcelFile(event) {
  const formData = new FormData();
  formData.append('excel', event.target.files[0]);
  formData.append('method', 'student');

  fetch('../../src/controller/convertExcel.php', {
    method: 'POST',
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    fetch('../../src/controller/getStdList.php', {
      method: 'POST',
      body: (() => {
        const formData = new FormData();
        formData.append('method', 'countStd')
        return formData
      })()
    })
    .then(request => request.json())
    .then(data1 => {
      data.id = []; // Initialize new id field in the json of bulk teacher data
      for (i = 0; i < data['First name'].length; i++) {
        data1[0]['stdCount']++;
        const id = "KLD-" + new Date().getFullYear().toString().substring(2) + "-" + data1[0]['stdCount'].toString().padStart(6, '0');
        document.querySelector('#bulk-std-tbody').innerHTML += `
          <tr>
            <th>${id}</th>
            <td>${data['First name'][i]}</td>
            <td>${data['Middle name'][i]}</td>
            <td>${data['Last name'][i]}</td>
            <td>${data['Email'][i]}</td>
            <td>${data['Year level'][i]}</td>
            <td>${data['Section'][i]}</td>
          </tr>
        `;
        data.id.push(id); // The id will be used when the teachers are uploaded to database
      }
      bulkStdData = data;
      document.querySelector('#bulk-upload').removeAttribute('disabled');
    })
    .catch(error => console.error(error));

  })
  .catch(error => {
    console.error(error);
    alert('An error occured :(');
  });
}

// Upload excel of new students
function uploadStdExcel() {
  swal.fire({
    title: "Are you sure?",
    text: "This will upload the students's data to the database!",
    icon: "question",
    showConfirmButton: true,
    showCancelButton: true,
  })
  .then((result) => {
    if (result.isConfirmed) {
      fetch('../../src/controller/addStudent.php', {
        method: 'POST',
        body: (() => {
          const formData = new FormData();
          formData.append('method', 'addBulk');
          formData.append('bulkData', JSON.stringify(bulkStdData));
          return formData;
        })()
      })
      .then(response => response.text())
      .then(data => {
        swal.fire({
          title: data,
          icon: "success",
          showConfirmButton: true,
        })
        .then((result) => {
          if (result.isConfirmed) {
            window.location.href = "studentList.php";
          }
        })
      })
      .catch(error => {
        console.error(error)
        alert('Something went wrong :(');
      });
    }
  });
}
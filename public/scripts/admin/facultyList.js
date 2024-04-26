// Script for adding separate html
fetch("includes/leftnav.html")
    .then((response) => response.text())
    .then((data) => {
    document.querySelector("#left-panel").innerHTML = data;
});

// Filling in section selection
const getAllSctId = new FormData();
getAllSctId.append('method', 'getAllSctId')
fetch('../../src/controller/getSctList.php', {
    method: 'POST',
    body: getAllSctId
  })
  .then(response => response.json())
  .then(data => {
    data.forEach(item => {
      document.querySelector('#sect').innerHTML += `<option value="${item.sectionID}">${item.sectionID}</option>`;
    })
  })
  .catch(error => console.error(error));

// Filling in course selection
const getAllCrsId = new FormData();
getAllCrsId.append('method', 'getAllCrsId')
fetch('../../src/controller/getCrsList.php', {
    method: 'POST',
    body: getAllCrsId
})
.then(response => response.json())
.then(data => {
    data.forEach(item => {
        document.querySelector('#crs').innerHTML += `<option value="${item.courseCode}">${item.courseCode}</option>`;
    })
})
.catch(error => console.error(error));

// Initialize the assignment table as DataTable
let assignmentDataTable = $("#assignment-table").DataTable();

// Populating the edit fields
function populateEditFields(event) {
  event.preventDefault();
  const facultyID = event.currentTarget.getAttribute('data-id');

  const formData = new FormData();
  formData.append('method', 'getFct');
  formData.append('facultyID', facultyID);

  fetch('../../src/controller/getFctList.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      console.log(data[0]);
      document.querySelector('#edit-fct-id').value = data[0].facultyID;
      document.querySelector('#edit-fname').value = data[0].facultyFName;
      document.querySelector('#edit-mname').value = data[0].facultyMName;
      document.querySelector('#edit-lname').value = data[0].facultyLName;
      document.querySelector('#edit-email').value = data[0].facultyEmail;
      document.querySelector('#edit-pass').value = data[0].facultyPass;
    })
    .catch(error => console.error(error));


  fetch('../../src/controller/getAssignment.php', {
      method: 'POST',
      body: (() => {
        const formData = new FormData();
        formData.append('method', 'getAssignmentByFct');
        formData.append('facultyID', facultyID);
        return formData;
      })()
    })
    .then(response => response.json())
    .then(data => {
      console.log(data);
      assignmentDataTable.destroy();
      document.querySelector('#ass-table').innerHTML = '';
      data.forEach((item) => {
        document.querySelector('#ass-table').innerHTML += `
          <tr>
            <th>${item.sectionID}</th>
            <td>${item.courseID}</td>
            <td>
                <a onclick="return confirm('Are you sure you want to delete?')" href="deleteStudent.php?delid=<?php echo $row['matricNo']; ?>" title="Delete Student Details"><i class="fa fa-trash fa-1x"></i></a>
            </td>
          </tr>
        `;
      });
      assignmentDataTable = $("#assignment-table").DataTable();
    })
    .catch(error => console.error(error));
}



// Setting assignment of section and course
function setAssignment(event) {
  event.preventDefault();

  const id = document.querySelector('#edit-fct-id').value;
  const sect = document.querySelector('#sect').value;
  const crs = document.querySelector('#crs').value;

  if (!(isValueEmpty([id, sect, crs]))) {
    const formData = new FormData();
    formData.append('id', id);
    formData.append('sect', sect);
    formData.append('crs', crs);

    fetch('../../src/controller/setAssignment.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.text())
      .then(data => alert(data))
      .catch(error => console.error(error));
  } else {
    alert("There's an empty field");
  }
}



// Show image of excel example
function showHelp(){
    swal.fire({
        html: "<h5>Sample excel file</h5><br>" + 
        "<img src='../images/sample excel.png'>" + "",
        
    });
}



// Adds faculty to the database
function addFaculty() {
    const form = document.querySelector("#add-faculty");

    form.addEventListener("submit", (event) => {
      event.preventDefault();
    
      const fctID = document.querySelector("#fct-id").value;
      const fname = document.querySelector("#fname").value;
      const mname = document.querySelector("#mname").value;
      const lname = document.querySelector("#lname").value;
      const email = document.querySelector("#email").value;
      const pass = document.querySelector("#pass").value;
      const fctType = document.querySelector("#fct-type").value;
    
      if (!isValueEmpty([fctID, fname, lname, email])) {
        swal
          .fire({
            title: "Are you sure?",
            text: "This will upload the teacher's data to the database!",
            icon: "question",
            showConfirmButton: true,
            showCancelButton: true,
          })
          .then((result) => {
            if (result.isConfirmed) {
              const formData = new FormData();
              formData.append("fctID", fctID);
              formData.append("fname", fname);
              formData.append("mname", mname);
              formData.append("lname", lname);
              formData.append("email", email);
              formData.append("pass", pass);
              formData.append("fctType", fctType);
              formData.append('method', 'addSingle');
    
              fetch("../../src/controller/addFaculty.php", {
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
                        window.location.href = "facultyList.php";
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
    
    function isValueEmpty(arr) {
      return arr.some((elem) => elem === "");
    }
}



// Get the excel containing the teachers data
function xlsUpload(event) {
  event.preventDefault();
  alert('dropped!');
  event.target.innerHTML = "File(s) dropped";
}



// Get excel of new teachers and display it on the table
let bulkFctData;
function getExcelFile(event) {
  const formData = new FormData();
  formData.append('excel', event.target.files[0]);
  formData.append('method', 'faculty');

  fetch('../../src/controller/convertExcel.php', {
    method: 'POST',
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    fetch('../../src/controller/getFctList.php', {
      method: 'POST',
      body: (() => {
        const formData = new FormData();
        formData.append('method', 'countFct')
        return formData
      })()
    })
    .then(request => request.json())
    .then(data1 => {
      data.id = []; // Initialize new id field in the json of bulk teacher data
      for (i = 0; i < data['First name'].length; i++) {
        data1[0]['fctCount']++;
        const id = "KLD-" + new Date().getFullYear().toString().substring(2) + "-" + data1[0]['fctCount'].toString().padStart(4, '0');
        document.querySelector('#bulk-fct-tbody').innerHTML += `
          <tr>
            <th>${id}</th>
            <td>${data['First name'][i]}</td>
            <td>${data['Middle name'][i]}</td>
            <td>${data['Last name'][i]}</td>
            <td>${data['Email'][i]}</td>
          </tr>
        `;
        data.id.push(id); // The id will be used when the teachers are uploaded to database
      }
      bulkFctData = data;
      document.querySelector('#bulk-upload').removeAttribute('disabled');
    })
    .catch(error => console.error(error));
    
  })
  .catch(error => {
    console.error(error);
    alert('An error occured :(');
  });
}




// Upload excel of new teachers and display it on the table
function uploadFctExcel() {
  fetch('../../src/controller/addFaculty.php', {
      method: 'POST',
      body: (() => {
        const formData = new FormData();
        formData.append('method', 'addBulk');
        formData.append('bulkData', JSON.stringify(bulkFctData));
        return formData;
      })()
  })
  .then(response => response.text())
  .then(data => alert(data))
  .catch(error => {
    console.error(error)
    alert('Something went wrong :(');
  });
  
}
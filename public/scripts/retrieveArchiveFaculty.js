const fctTable = document.querySelector("#arc-fct-list-tbl");
const formData = new FormData();
formData.append("method", "getAllFct");
fetch("../../src/controller/getArcFctList.php", {
  method: "POST",
  body: formData,
})
  .then((response) => response.json())
  .then((data) => {
    console.log(data);
    // Clear existing table content
    fctTable.innerHTML = "";
    data.forEach((item) => {
      fctTable.innerHTML += `
        <tr>
            <td>${item.facultyID}</th>
            <td>${item.facultyFName} ${item.facultyMName} ${item.facultyLName}</td>
            <td>${item.facultyEmail}</td>
            <td>
                <a href="#" onclick="populateEditFields()" data-id="${item.facultyID}"><i class="fa fa-edit fa-1x" data-toggle="modal" data-target="#editFacultyModal"></i></a>
                <a onclick="deleteFaculty('${item.facultyID}', '${item.facultyFName} ', '${item.facultyMName} ', '${item.facultyLName}')" href="#"><i class="fa fa-trash fa-1x"></i></a>
            </td>
        </tr>
        `;
    });
    $("#archive-faculty-table").DataTable({
      lengthMenu: [10, 25, 50, 100, { label: "All", value: -1 }],
    });
  })
  .catch((error) => console.error(error));
function deleteFaculty(facultyID, facultyFName, facultyMName, facultyLName) {
  swal
    .fire({
      title:
        "<h3>Are you sure you want to archive this user?</h3><i><h5>" +
        facultyID +
        " - " +
        facultyFName +
        facultyMName +
        facultyLName +
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
        fetch("../../src/model/archiveFaculty.php", {
          method: "POST",
          body: new URLSearchParams({ facultyID: facultyID }),
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
                      window.location.href = "facultyList.php";
                    }
                  });
              });
            } else {
              console.error("Error archiving faculty");
            }
          })
          .catch((error) => console.error(error));
      }
    });
}

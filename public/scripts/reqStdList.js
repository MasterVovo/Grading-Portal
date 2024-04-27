const stdTable = document.querySelector("#std-list-tbl");
const formData = new FormData();
formData.append("method", "getAllStd");
fetch("../../src/controller/getStdList.php", {
  method: "POST",
  body: formData,
})
  .then((response) => response.json())
  .then((data) => {
    console.log(data);
    // Clear existing table content
    stdTable.innerHTML = "";
    data.forEach((item) => {
      stdTable.innerHTML += `
        <tr>
            <th>${item.studentID}</th>
            <td>${item.studentFName} ${item.studentMName} ${item.studentLName}</td>
            <td>${item.studentEmail}</td>
            <td>${item.studentSect}</td>
            <td>
                <a href="#" onclick="event.preventDefault()"><i class="fa fa-edit fa-1x" data-toggle="modal" data-target="#editFacultyModal"></i></a>
                <a onclick="return confirm('Are you sure you want to delete?')" href="deleteStudent.php?delid=<?php echo $row['matricNo'];?>" title="Delete Student Details"><i class="fa fa-trash fa-1x"></i></a>
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
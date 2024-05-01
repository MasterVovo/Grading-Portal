const firstPart = `
<nav class="navbar navbar-expand-sm navbar-default">
<div id="main-menu" class="main-menu collapse navbar-collapse">
<ul class="nav navbar-nav">
    <li class="menu-title">Teacher:&nbsp;</li>
    <li class="">
    <a href="dashboard.html"
        ><i class="menu-icon fa fa-dashboard"></i>Dashboard
    </a>
    </li>

    <li class="menu-item-has-children dropdown">
    <a
        href="#"
        class="dropdown-toggle"
        data-toggle="dropdown"
        aria-haspopup="true"
        aria-expanded="false"
    >
        <i class="menu-icon fa fa-file"></i> Grade</a
    >
    <ul class="sub-menu children dropdown-menu">
        <li>
        <i class="fa fa-plus"></i>
        <a href="midtermGrades.html"> Midterms</a>
        </li>
        <li>
        <i class="fa fa-plus"></i> <a href="finalGrades.html"> Finals</a>
        </li>
        <li>
        <i class="fa fa-plus"></i>
        <a href="gradingCriteria.html"> Grading Criteria</a>
        </li>
    </ul>
    </li>
`;
const secondPart = `
    <li>
        <a href="updateProfile.html">
        <i class="menu-icon fa fa-user"></i>Profile
        </a>
    </li>

    <li>
        <a href="logout.html">
        <i class="menu-icon fa fa-power-off"></i>Logout
        </a>
    </li>
    </ul>
    </div>
    <!-- /.navbar-collapse -->
    </nav>
`;

// Check the user type
fetch('../../src/controller/getFctType.php', {
    method: 'POST'
})
.then(response => response.text())
.then(data => {
    switch(data) {
        case 'Teacher':
            document.querySelector('#left-panel').innerHTML = `${firstPart + secondPart}`;
        case 'Program Chair':
            document.querySelector('#left-panel').innerHTML = `
                ${firstPart}

                <li>
                    <a href="approveGrades.html">
                    <i class="menu-icon fa fa-thumbs-up"></i>Approve
                    </a>
                </li>

                <li>
                    <a href="assignCourse.html">
                    <i class="menu-icon fa fa-book"></i>Assign Course
                    </a>
                </li>

                ${secondPart}
            `;
            break;
        case 'Dean':
            document.querySelector('#left-panel').innerHTML = `
                ${firstPart}

                <li>
                    <a href="approveGrades.html">
                    <i class="menu-icon fa fa-thumbs-up"></i>Approve
                    </a>
                </li>

                <li>
                    <a href="assignSection.html">
                    <i class="menu-icon fa fa-list"></i>Assign Section
                    </a>
                </li>

                ${secondPart}
            `;
            break;
        default:
            throw new Error('Teacher type is not recognized.');
    }
})
.catch(error => console.error(error));
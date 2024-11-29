<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Barangay Management System | Requests</title>
    <link rel="icon" type="image/x-icon" href="../../src/assets/img/apalit.ico"/>
    <link href="../../layouts/modern-light-menu/css/light/loader.css" rel="stylesheet" type="text/css" />
    <link href="../../layouts/modern-light-menu/css/dark/loader.css" rel="stylesheet" type="text/css" />
    <script src="../../layouts/modern-light-menu/loader.js"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../../src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../layouts/modern-light-menu/css/light/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../../layouts/modern-light-menu/css/dark/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="../../src/plugins/src/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="../../src/assets/css/light/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <link href="../../src/assets/css/dark/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="../../src/plugins/src/table/datatable/datatables.css">

    <link rel="stylesheet" type="text/css" href="../../src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="../../src/plugins/css/light/table/datatable/custom_dt_custom.css">

    <link rel="stylesheet" type="text/css" href="../../src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="../../src/plugins/css/dark/table/datatable/custom_dt_custom.css">
    
    <link href="../../src/assets/css/dark/components/modal.css" rel="stylesheet" type="text/css" />
    <link href="../../src/assets/css/light/components/modal.css" rel="stylesheet" type="text/css" />

    <!-- END PAGE LEVEL CUSTOM STYLES -->

</head>
<body class="layout-boxed">
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <div class="header-container container-xxl">

                <?php include('../../components/nav-dropdown.php'); ?>

    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <?php include('../../components/side-navigation.php'); ?>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">

                    <div class=" layout-top-spacing">
                        <nav class="breadcrumb-style-five  mb-3" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">User</li>
                                <li class="breadcrumb-item">Transactions</li>
                                <li class="breadcrumb-item"><a href="requests.php">Requests</a></li>
                                <li class="breadcrumb-item">New Request</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="row layout-spacing">
                        <div class="col-lg-12">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-content widget-content-area">
                                    <div class="layout-spacing layout-top-spacing">
                                            <div class="row p-3">
                                                <h6 class="mb-3">New Request</h6>
                                                <form id="addUser">
                                                    <div class="container col-12">
                                                        <div class="row d-flex flex-md-column flex-lg-row justify-content-evenly">
                                                            <div class="col-12 col-md-12 col-lg-4 mb-3">
                                                                <label class="form-label">First Name<b class="text-danger"></b></label>
                                                                <input type="text" name="firstname" id="firstname" class="form-control text-dark" readonly value="<?php echo $userFirstname; ?>">
                                                            </div>
                                                            <div class="col-12 col-md-12 col-lg-4 mb-3">
                                                                <label class="form-label">Middle Name<b class="text-danger"></b></label>
                                                                <input type="text" name="middlename" id="middlename" class="form-control text-dark" readonly value="<?php echo $userMiddlename; ?>">
                                                            </div>
                                                            <div class="col-12 col-md-12 col-lg-4 mb-3">
                                                                <label class="form-label">Last Name<b class="text-danger"></b></label>
                                                                <input type="text" name="lastname" id="lastname" class="form-control text-dark" readonly value="<?php echo $userLastname; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="container">
                                                        <div class="row d-flex flex-md-column flex-lg-row justify-content-between">
                                                            <div class="col-12 col-md-12 col-lg-4 mb-3">
                                                                <label class="form-label">Birthday<b class="text-danger"></b></label>
                                                                <input type="text" name="bday" id="bday" class="form-control text-dark" readonly value="<?php echo $formattedBday; ?>">
                                                            </div>
                                                            <div class="col-12 col-md-12 col-lg-4 mb-3">
                                                                <label class="form-label">Age<b class="text-danger"></b></label>
                                                                <input type="text" name="civil" id="civil" class="form-control text-dark" readonly value="<?php echo $age; ?>">
                                                            </div>
                                                            <div class="col-12 col-md-12 col-lg-4 mb-3">
                                                                <label class="form-label">Civil Status<b class="text-danger"></b></label>
                                                                <input type="text" name="civil" id="civil" class="form-control text-dark" readonly value="<?php echo $civil; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="container">
                                                        <div class="row d-flex flex-md-column flex-lg-row justify-content-between">
                                                            <div class="col-12 col-md-12 col-lg-4 mb-3">
                                                                <label class="form-label">Purok<b class="text-danger"></b></label>
                                                                <input type="text" name="purok" id="purok" class="form-control text-dark" readonly value="<?php echo $purok; ?>">
                                                            </div>
                                                            <div class="col-12 col-md-12 col-lg-4 mb-3">
                                                                <label class="form-label">Document<b class="text-danger"></b></label>
                                                                <select id="cert" class="form-select" name="cert" onchange="updatePurpose()">
                                                                    <option value="" selected disabled>--Select Certificate--</option>
                                                                    <option value="Indigency">Certificate of Indegency</option>
                                                                    <option value="Residency">Certificate of Residency</option>
                                                                    <option value="Clearance">Barangay Clearance</option>
                                                                    <option value="ID">Barangay Identification</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-12 col-md-12 col-lg-4 mb-3">
                                                                <label class="form-label">Purpose<b class="text-danger"></b></label>
                                                                <select id="purpose" class="form-select" name="purpose" disabled>
                                                                    <option value="" selected disabled>--Disabled--</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                            
                                                </form>
                                                
                                                <div class="col-12">
                                                    <div class="mb-4 d-flex justify-content-end align-self-center">
                                                        <button id="registerButton" class="btn btn-warning"><b>Submit Request</b></button>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="../../src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../../src/plugins/src/mousetrap/mousetrap.min.js"></script>
    <script src="../../src/plugins/src/waves/waves.min.js"></script>
    <script src="../../src/plugins/src/global/vendors.min.js"></script>
    <script src="../../layouts/modern-light-menu/app.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="../../src/plugins/src/table/datatable/datatables.js"></script>
    <script src="../../src/assets/js/custom.js"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <script>


        function updatePurpose() {
            const cert = document.getElementById('cert').value;
            const purpose = document.getElementById('purpose');

            purpose.disabled = false;

            purpose.innerHTML = '<option value="" selected disabled>--Select Purpose--</option>';

            if (cert === 'Indigency') {

                purpose.innerHTML += '<option value="School">For School</option>';
                purpose.innerHTML += '<option value="Financial Assistance">For Financial Assistance</option>';
                purpose.innerHTML += '<option value="Employment">For Employment</option>';

            } else if (cert === 'Residency') {

                purpose.innerHTML += '<option value="ID Processing">For ID Processing</option>';
                purpose.innerHTML += '<option value="Proof of Residency">Proof of Residency</option>';
                purpose.innerHTML += '<option value="Legal Matters">For Legal Matters</option>';

            } else if (cert === 'Clearance') {

                purpose.innerHTML += '<option value="Employment">For Employment</option>';
                purpose.innerHTML += '<option value="Business Permit">For Business Permit</option>';
                purpose.innerHTML += '<option value="Legal Matters">For Legal Matters</option>';
                purpose.innerHTML += '<option value="Motorcycle Loan">Motorcycle Loan</option>';
                purpose.innerHTML += '<option value="Car Loan">Car Loan</option>';

            } else if (cert === 'ID') {

                purpose.innerHTML += '<option value="Identification">Identification</option>';
                
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const deleteStudentForm = document.getElementById('deleteStudent');
            const cancelDeleteStudentForm = document.getElementById('cancelDeleteStudent');

            deleteStudentForm.addEventListener('submit', function(event) {
                event.preventDefault();

                const formData = new FormData(deleteStudentForm);
                const studentId = formData.get('id');

                fetch(`../../api/deleteData.php?delete=deleteStudent&id=${studentId}`, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert('Error deleting student: ' + data.error);
                    } else {
                        alert('Student deleted successfully.');
                        location.reload();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while deleting the student.');
                });
            });

            cancelDeleteStudentForm.addEventListener('click', function() {
                const studentIdInput = document.getElementById('student_id');
                studentIdInput.value = '';
            });

            $('#deleteModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var dataId = button.data('id');
                $('#student_id').val(dataId);
            });
        });

        document.addEventListener('DOMContentLoaded', function() {

            document.getElementById('addTeacherForm').addEventListener('submit', function(event) {
                event.preventDefault();

                const formData = new FormData(this);

                for (const [key, value] of formData.entries()) {
                    console.log(`${key}:`, value);
                }

                fetch('../../api/addData.php?insertion=addStudent', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    if (data.error) {
                        document.getElementById('course-error').textContent = data.error;
                    } else {
                        console.log(data.message);
                        alert('Student added successfully.');
                        location.reload();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });

            document.getElementById('submitAddTeacherForm').addEventListener('click', function() {
            document.getElementById('addTeacherForm').dispatchEvent(new Event('submit'));

            });
        });
        
        document.addEventListener('DOMContentLoaded', function() {
            fetch('../../api/fetch_record_api.php?action=getStudents')
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.getElementById('studentTableBody');
                    if (data.error) {
                        tableBody.innerHTML = '<tr><td colspan="8" class="text-center">' + data.error + '</td></tr>';
                    } else {
                        
                    }
                    document.querySelectorAll('.edit-button').forEach(button => {
                        button.addEventListener('click', function() {

                            const teacherId = this.getAttribute('data-id');

                            fetch(`../../api/fetch_record_api.php?id=${encodeURIComponent(teacherId)}&action=getStudentById`)
                                .then(response => response.json())
                                .then(data => {

                                    if (data.error) {

                                        alert(data.error);
                                    } else {

                                        document.getElementById('efirstname').value = data.firstname;
                                        document.getElementById('elastname').value = data.lastname;
                                        document.getElementById('eteacherid').value = data.stdnumber;
                                        document.getElementById('eemail').value = data.email;
                                        document.getElementById('ephone').value = data.phone;
                                        document.getElementById('erole').value = data.role;
                                        document.getElementById('estatus').value = data.status;
                                        document.getElementById('epassword').value = data.password;
                                    }

                                })

                                .catch(error => {

                                    console.error('Error fetching teacher data:', error);

                                });

                        });
                    });
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
                
        });

    </script>

</body>
</html>
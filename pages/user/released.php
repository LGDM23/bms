<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Barangay Management System | Released</title>
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
                                <li class="breadcrumb-item"><a href="released.php">Released</a></li>
                            </ol>
                        </nav>
                    </div>

                    <div class="d-flex justify-content-end mb-3">

                        <!-- <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addTeacherModal">Add Student</button> -->

                    </div>

                    <div class="row layout-spacing">
                        <div class="col-lg-12">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-content widget-content-area">
                                    <table id="style-3" class="table style-3 dt-table-hover">
                                        <thead>
                                            <tr>
                                                <th>Request ID</th>
                                                <th>Full Name</th>
                                                <th>Document</th>
                                                <th>Purpose</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="studentTableBody">
                                        <?php
                                            $url = 'http://localhost/bms/api/a_get_data.php?action=getMyReleased&id='.$user_id.'';

                                            $ch = curl_init();

                                            curl_setopt($ch, CURLOPT_URL, $url);
                                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

                                            $response = curl_exec($ch);

                                            if (curl_errno($ch)) {
                                                echo 'Error: ' . curl_error($ch);
                                                curl_close($ch);
                                                exit;
                                            }

                                            curl_close($ch);

                                            $data = json_decode($response, true);

                                            if (isset($data['error'])) {
                                                // echo '<tr><td colspan="8" class="text-center">' . htmlspecialchars($data['error']) . '</td></tr>';
                                                // exit;
                                            } else {

                                                $html = '';
                                                foreach ($data as $student) {
                                                    $html .= '<tr>';
                                                    $html .= '<td><p class="badge badge-info w-100">' . htmlspecialchars($student['request_code']).'</p></td>';
                                                    $html .= '<td>' . htmlspecialchars($student['fullname']).'</td>';
                                                    $html .= '<td>' . htmlspecialchars($student['request_docu']) . '</td>';
                                                    $html .= '<td>' . htmlspecialchars($student['purpose']) . '</td>';
                                                    $html .= '<td class=""><span class=" w-100 bs-tooltip badge '. (($student['status'] == 'RELEASED') ? 'badge-success' : 'badge-success') .' data-bs-toggle="tooltip" data-bs-placement="top" title="Ready for Pickup" mb-2 me-4">' . htmlspecialchars($student['status']) . '</span></td>';
                                                    $html .= '</tr>';
                                                }
    
                                                echo $html;

                                            }

                                            

                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- modal start -->
                <div class="modal fade" id="addTeacherModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="exampleModalCenterTitle"><b>Add Student</b></h6>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="addTeacherForm">
                                        <div class="col-12">
                                            <p id="course-error" class="text-light w-100 badge badge-danger mt-2 mb-2"></p>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-6">
                                                <label for="firstname"><p>First Name</p></label>
                                                <input type="text" class="form-control" name="sfirstname" id="sfirstname" placeholder="e.g. Jane">
                                            </div>
                                            <div class="col-6">
                                                <label for="lastname"><p>Last Name</p></label>
                                                <input type="text" class="form-control" name="slastname" id="slastname" placeholder="e.g. Doe">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col">
                                                <label for="teacherid"><p>Student Number</p></label>
                                                <input type="text" class="form-control" name="student_number" id="student_number" placeholder="XX-XXXX-XXX / XXXXXXXXXX">
                                            </div>
                                        </div>
                                        <div class="row profile-image  mt-4">

                                            <div class="img-uploader-content">
                                                <label for="filepond"><p>Image</p></label><br>
                                                <input type="file" class="bg-dark w-100 rounded p-2"
                                                    name="filepond" accept="image/png, image/jpeg, image/gif"/>
                                            </div>
                        
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col">
                                                <label for="email"><p>Email Address</p></label>
                                                <input type="text" class="form-control" name="semail" id="semail" placeholder="example@provider.com">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col">
                                                <label for="phone"><p>Phone Number</p></label>
                                                <input type="text" class="form-control" name="sphone" id="sphone" placeholder="09XXXXXXXXX">
                                            </div>
                                        </div>
                                            <div class="col">
                                                <input type="hidden" class="form-control" name="section" id="section" placeholder="section" value="0">
                                            </div>
                                            <div class="col">
                                                <input type="hidden" class="form-control" name="acc_status" id="acc_status" placeholder="acc_status" value="0">
                                            </div>
                                            <div class="col">
                                                <input type="hidden" class="form-control" name="email_verif" id="email_verif" placeholder="email_verif" value="0">
                                            </div>
                                            <div class="col">
                                                <label for="password"><p>Password</p></label>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="status" value="blazelearning2024" readonly>
                                            </div>
                                    </form>
                                    
                                    <div class="modal-footer">
                                                <button type="submit" id="submitAddTeacherForm" class="btn btn-success">Add Student</button>
                                                <button class="btn btn-light-dark" data-bs-dismiss="modal">Cancel</button>
                                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- modal end -->
                <!-- edit modal start -->
                <div class="modal fade" id="editTeacherModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="exampleModalCenterTitle"><b>Edit Student</b></h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="editTeacherForm">
                                        <div class="row mb-4">
                                            <div class="col-6">
                                                <label for="firstname"><p>First Name</p></label>
                                                <input type="text" class="form-control" name="firstname" id="efirstname" placeholder="e.g. Jane">
                                            </div>
                                            <div class="col-6">
                                                <label for="lastname"><p>Last Name</p></label>
                                                <input type="text" class="form-control" name="lastname" id="elastname" placeholder="e.g. Doe">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col">
                                                <label for="teacherid"><p>Student Number</p></label>
                                                <input type="text" class="form-control" name="teacherid" id="eteacherid" placeholder="XX-XXXX-XXX / XXXXXXXXXX">
                                            </div>
                                        </div>
                                        <div class="row profile-image  mt-4">

                                            <div class="img-uploader-content">
                                                <label for="filepond"><p>Image</p></label><br>
                                                <input type="file" class="bg-dark w-100 rounded p-2"
                                                    name="filepond" accept="image/png, image/jpeg, image/gif"/>
                                            </div>
                        
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col">
                                                <label for="email"><p>Email Address</p></label>
                                                <input type="text" class="form-control" name="email" id="eemail" placeholder="example@provider.com">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col">
                                                <label for="phone"><p>Phone Number</p></label>
                                                <input type="text" class="form-control" name="phone" id="ephone" placeholder="09XXXXXXXXX">
                                            </div>
                                        </div>
                                            <div class="col">
                                                <input type="hidden" class="form-control" name="role" id="erole" placeholder="role" value="teacher">
                                            </div>
                                            <div class="col">
                                                <input type="hidden" class="form-control" name="status" id="estatus" placeholder="status" value="1">
                                            </div>
                                            <div class="col">
                                                <input type="hidden" class="form-control" name="section" id="esection" placeholder="section" value="0">
                                            </div>
                                            <div class="col">
                                                <label for="password"><p>Password</p></label>
                                                <input type="password" class="form-control" name="password" id="epassword" placeholder="" value="">
                                            </div>
                                    </form>
                                    
                                    <div class="modal-footer">
                                        <button id="submitEditTeacherForm" class="btn btn-success">Update</button>
                                        <a class="btn btn-light-dark" data-bs-dismiss="modal">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- edit modal end -->
                <!-- deactivate modal start -->
                <div class="modal fade" id="deactivateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="exampleModalCenterTitle"><b>Deactivate Account</b></h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        <p>Deactivate this student account? this process is reversible do you want to proceed?</p><br>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-dark">Deactivate</button>
                                        <button class="btn btn-light-dark" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- deactivate modal end -->
                
                <!-- delete modal start -->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="exampleModalCenterTitle"><b>Delete Account</b></h6>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <p>Delete this student account? This process is non-reversible, and all records attached to this account ID will also be deleted. Do you want to proceed?</p><br>
                                </div>
                                <form id="deleteStudent">
                                    <input type="hidden" name="id" id="student_id">
                                    <div class="modal-footer">
                                        <button type="submit" id="deleteStud" class="btn btn-danger">Delete</button>
                                        <button type="button" id="cancelDeleteStudent" class="btn btn-light-dark" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- delete modal end -->

        

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
        c3 = $('#style-3').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 10
        });

        multiCheck(c3);

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
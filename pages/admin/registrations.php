<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Barangay Management System | Registrations</title>
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
    <link href="../../src/assets/css/light/elements/tooltip.css" rel="stylesheet" type="text/css" />
    <link href="../../src/assets/css/dark/elements/tooltip.css" rel="stylesheet" type="text/css" />
    
    <link href="../../src/assets/css/dark/components/modal.css" rel="stylesheet" type="text/css" />
    <link href="../../src/assets/css/light/components/modal.css" rel="stylesheet" type="text/css" />
    
    <link href="../../src/plugins/css/light/filepond/custom-filepond.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../../src/plugins/src/filepond/filepond.min.css">
    <link rel="stylesheet" href="../../src/plugins/src/filepond/FilePondPluginImagePreview.min.css">
    

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
                            <li class="breadcrumb-item">Administrator</li>
                                <li class="breadcrumb-item">Management</li>
                                <li class="breadcrumb-item"><a href="registrations.php">Registrations</a></li>
                            </ol>
                        </nav>
                    </div>

                    <div class="d-flex justify-content-end mb-3">

                        <!-- <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addTeacherModal">Add User</button> -->

                    </div>

                    <div class="row layout-spacing">
                        <div class="col-lg-12">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-content widget-content-area">
                                    <table id="style-3" class="table style-3 dt-table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Image</th>
                                                <th>Full Name</th>
                                                <th>Civil Status</th>
                                                <th>Birth Date</th>
                                                <th class="text-center bs-tooltip" data-bs-placement="top" title="Section that teacher handles">Purok</th>
                                                <th class="text-center bs-tooltip" data-bs-placement="top" title="Section that teacher handles">Voter</th>
                                                <th class="text-center dt-no-sorting">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="regTable">
                                        <?php

                                            $sql = "SELECT *, CONCAT(firstname,' ',middlename,' ',lastname) as fullname FROM users WHERE role != 'admin' AND active = 0";
                                            $result = $con->query($sql);
                                            $html = '';

                                            if ($result && $result->num_rows > 0) {
                                                while ($users = $result->fetch_assoc()) {
                                                    $html .= '<tr>';
                                                    $html .= '<td class="text-center"><span><img src="data:' . htmlspecialchars($users['imgType']) . '; base64,' . htmlspecialchars(base64_encode($users['imgData'])) . '" class="profile-img rounded-circle" alt="avatar"></span></td>';
                                                    $html .= '<td >' . htmlspecialchars($users['fullname']) . '</td>';
                                                    $html .= '<td >' . htmlspecialchars($users['civil_status']) . '</td>';
                                                    $html .= '<td >' . htmlspecialchars($users['birthday']) . '</td>';
                                                    $html .= '<td >' . htmlspecialchars($users['purok']) . '</td>';
                                                    $html .= '<td >' . htmlspecialchars($users['voter']) . '</td>';
                                                    $html .= '<td >
                                                                <ul class="table-controls">
                                                                    <li>
                                                                        <a href="javascript:void(0);" class="btn btn-success" data-id="' . htmlspecialchars($users['identifier']) . '" data-bs-toggle="modal" data-bs-target="#viewModal" class="edit-button bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                                                            View
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </td>';
                                                    $html .= '</tr>';
                                                }
                                                echo $html;
                                            } else {
                                            }

                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- View modal start -->
                <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="exampleModalCenterTitle"><b>View Account</b></h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <p id="login-error" class="badge badge-danger w-100 p-3"></p>
                                            </div>
                                        </div>
                                        <form id="addUser">
                                            <div class="container col-12">
                                                <div class="row d-flex flex-md-column flex-lg-row justify-content-evenly">
                                                    <div class="col-12 col-md-12 col-lg-4 mb-3">
                                                        <label class="form-label">First Name<b class="text-danger">*</b></label>
                                                        <input type="text" name="vfirstname" id="vfirstname" class="form-control" onkeyup=generateUsername() disabled>
                                                    </div>
                                                    <div class="col-12 col-md-12 col-lg-4 mb-3">
                                                        <label class="form-label">Middle Name<b class="text-danger"></b></label>
                                                        <input type="text" name="vmiddlename" id="vmiddlename" class="form-control" onkeyup=generateUsername() disabled>
                                                    </div>
                                                    <div class="col-12 col-md-12 col-lg-4 mb-3">
                                                        <label class="form-label">Last Name<b class="text-danger">*</b></label>
                                                        <input type="text" name="vlastname" id="vlastname" class="form-control" onkeyup=generateUsername() disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row d-flex flex-md-column flex-lg-row justify-content-between">
                                                    <div class="col-12 col-md-12 col-lg-6 mb-3">
                                                        <label class="form-label">Years in Tabuyuc<b class="text-danger">*</b></label>
                                                        <input type="text" name="yrs" id="vyrs" class="form-control" disabled>
                                                    </div>
                                                    <div class="col-12 col-md-12 col-lg-6 mb-3">
                                                        <label class="form-label">Residency Status<b class="text-danger">*</b></label>
                                                        <select class="form-control" name="residency" id="vresidency" disabled>
                                                            <option value="" disabled selected>---Select Residency---</option>
                                                            <option value="Home Owner">Home Owner</option>
                                                            <option value="Tenant">Tenant</option>
                                                            <option value="Helper">Helper</option>
                                                            <option value="Construction Worker">Construction Worker</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row d-flex flex-md-column flex-lg-row justify-content-between">
                                                    <div class="col-12 col-md-12 col-lg-4 mb-3">
                                                        <label class="form-label">Birthday<b class="text-danger">*</b></label>
                                                        <input type="date" name="birthday" id="vbirthday" class="form-control" disabled>
                                                    </div>
                                                    <div class="col-12 col-md-12 col-lg-4 mb-3">
                                                        <label class="form-label">Civil Status<b class="text-danger">*</b></label>
                                                        <select class="form-control" name="civil_status" id="vcivil_status" disabled>
                                                            <option value="" disabled selected>---Select Civil Status---</option>
                                                            <option value="Single">Single</option>
                                                            <option value="Married">Married</option>
                                                            <option value="Separated">Separated</option>
                                                            <option value="Divorced">Divorced</option>
                                                            <option value="Widowed">Widowed</option>
                                                            <option value="Common-Law">Common-Law</option>
                                                            <option value="Annulled">Annulled</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-12 col-md-12 col-lg-4 mb-3">
                                                        <label class="form-label">Gender<b class="text-danger">*</b></label>
                                                        <select class="form-control" name="gender" id="vgender" disabled>
                                                            <option value="" disabled selected>---Select Gender---</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row d-flex flex-md-column flex-lg-row justify-content-between">
                                                    <div class="col-12 col-md-12 col-lg-12 mb-3">
                                                        <label class="form-label">House Number,/Lot/Block Street, Subdivision<b class="text-danger">*</b></label>
                                                        <input type="text" name="house" id="vhouse" class="form-control" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row d-flex flex-md-column flex-lg-row justify-content-between">
                                                    <div class="col-12 col-md-12 col-lg-4 mb-3">
                                                        <label class="form-label">Purok<b class="text-danger">*</b></label>
                                                        <select class="form-control" name="purok" id="vpurok" disabled>
                                                            <option value="" disabled selected>---Select Purok---</option>
                                                            <option value="Sitio Alauli">Sitio Alauli</option>
                                                            <option value="Married">Purok 1</option>
                                                            <option value="Separated">Purok 2</option>
                                                            <option value="Divorced">Purok 3</option>
                                                            <option value="Widowed">Purok 4</option>Sitio Masuque
                                                            <option value="Common-Law">Purok 5</option>
                                                            <option value="Annulled">Purok 6</option>
                                                            <option value="Sitio Masuque">Sitio Masuque</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-12 col-md-12 col-lg-4 mb-3">
                                                        <label class="form-label">Bona fide Voter<b class="text-danger">*</b></label>
                                                        <select class="form-control" name="voter" id="vvoter" disabled>
                                                            <option value="" disabled selected>---Select Option---</option>
                                                            <option value="YES">Yes</option>
                                                            <option value="NO">No</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-12 col-md-12 col-lg-4 mb-3">
                                                        <label class="form-label">Phone Number<b class="text-danger">*</b></label>
                                                        <input type="tel" name="phone" id="vphone" class="form-control" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container col-12">
                                                <div class="row d-flex flex-md-column flex-lg-row justify-content-evenly">
                                                    <div class="col-12 col-md-12 col-lg-4 mb-3">
                                                        <label class="form-label">Barangay<b class="text-danger">*</b></label>
                                                        <input type="text" name="barangay" id="barangay" class="form-control text-dark" value="Tabuyuc" disabled>
                                                    </div>
                                                    <div class="col-12 col-md-12 col-lg-4 mb-3">
                                                        <label class="form-label">Municipality<b class="text-danger"></b></label>
                                                        <input type="text" name="municipality" id="municipality" class="form-control text-dark" value="Apalit" disabled>
                                                    </div>
                                                    <div class="col-12 col-md-12 col-lg-4 mb-3">
                                                        <label class="form-label">Province<b class="text-danger">*</b></label>
                                                        <input type="text" name="province" id="province" class="form-control text-dark" value="Pampanga" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <!-- <div class="row profile-image mb-3">
                                                    <div class="img-uploader-content">
                                                        <label for="filepond"><p>ID Upload<b class="text-danger">*</b></p></label><br>
                                                        <input type="file" class="bg-dark w-100 rounded p-2" name="filepond" accept="image/png, image/jpeg, image/gif"/>
                                                        <div class="text-center"><p class="text-muted mt-1"><b class="text-danger">**</b>Please upload a clear image of your Valid ID that shows your address<b class="text-danger">**</b></p></div>
                                                    </div>
                                                </div> -->
                                                <div class="img-uploader-content">
                                                        <label for="filepond"><p>Uploaded ID</p></label><br>
                                                        <a href="" class="btn btn-info mb-3" target="_blank" id="vatt">View Attachment</a>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Username</label>
                                                        <input type="text" name="username" id="vusername" class="form-control text-dark" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                            <label for="filepond"><p>Emergency Contact Details</p></label><br>
                                                <div class="row d-flex flex-md-column flex-lg-row justify-content-between">
                                                    <div class="col-12 col-md-12 col-lg-6 mb-3">
                                                        <label class="form-label">Contact Person<b class="text-danger">*</b></label>
                                                        <input type="text" name="ecp" id="vecp" class="form-control" disabled>
                                                    </div>
                                                    <div class="col-12 col-md-12 col-lg-6 mb-3">
                                                        <label class="form-label">Contact Relationship<b class="text-danger">*</b></label>
                                                        <input type="text" name="ecr" id="vecr" class="form-control" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row d-flex flex-md-column flex-lg-row justify-content-between">
                                                    <div class="col-12 col-md-12 col-lg-6 mb-3">
                                                        <label class="form-label">Contact Number<b class="text-danger">*</b></label>
                                                        <input type="text" name="ecn" id="vecn" class="form-control" disabled>
                                                    </div>
                                                    <div class="col-12 col-md-12 col-lg-6 mb-3">
                                                        <label class="form-label">Contact Address<b class="text-danger">*</b></label>
                                                        <input type="text" name="eca" id="veca" class="form-control" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success" id="btn_approve" data-bs-toggle="modal" data-bs-target="#approveModal" >Approve</button>
                                            <button class="btn btn-danger" id="btn_reject" data-bs-toggle="modal" data-bs-target="#rejectModal" >Reject</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- edit modal end -->

                
                
                <!-- approve modal start -->
                <div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="exampleModalCenterTitle"><b>Approve Registration</b></h6>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <p>Approve this Registration?</p><br>
                                </div>
                                <form id="approveRegister">
                                    <input type="hidden" name="user_identifier" id="user_identifier">
                                    <div class="modal-footer">
                                        <button type="submit" id="approveReg" class="btn btn-success">Approve</button>
                                        <button type="button" class="btn btn-light-dark" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- approve modal end -->
                
                <!-- reject modal start -->
                <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="exampleModalCenterTitle"><b>Reject Modal</b></h6>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <p>Reject this Registration?</p><br>
                                </div>
                                <form id="rejectRegister">
                                    <input type="hidden" name="user_identifier_r" id="user_identifier_r">
                                    <div class="form-group">
                                        <p>Rejection Message</p>
                                        <textarea class="form-control mb-3" name="reject_msg" id="reject_msg" rows="4"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="rejectReg" class="btn btn-danger">Reject</button>
                                        <button type="button" class="btn btn-light-dark" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
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
    <script src="../../src/plugins/src/highlight/highlight.pack.js"></script>
    <script src="../../layouts/modern-light-menu/app.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="../../src/plugins/src/table/datatable/datatables.js"></script>
    <script src="../../src/assets/js/custom.js"></script>

    
    <!-- <script src="../../src/plugins/src/filepond/filepond.min.js"></script>
    <script src="../../src/plugins/src/filepond/FilePondPluginFileValidateType.min.js"></script>
    <script src="../../src/plugins/src/filepond/FilePondPluginImageExifOrientation.min.js"></script>
    <script src="../../src/plugins/src/filepond/FilePondPluginImagePreview.min.js"></script>
    <script src="../../src/plugins/src/filepond/FilePondPluginImageCrop.min.js"></script>
    <script src="../../src/plugins/src/filepond/FilePondPluginImageResize.min.js"></script>
    <script src="../../src/plugins/src/filepond/FilePondPluginImageTransform.min.js"></script>
    <script src="../../src/plugins/src/filepond/filepondPluginFileValidateSize.min.js"></script> -->
    

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

        // multiCheck(c3);
        
        document.addEventListener('DOMContentLoaded', function() {

            $('#viewModal').on('show.bs.modal', function(event) {

                var button = $(event.relatedTarget);
                var dataId = button.data('id');


                fetch(`../../api/a_get_data.php?action=getAccount`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ identifier: dataId })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                    } else {

                        const imgType = data.imgType || 'image/png'; 
                        const blobUrl = `data:${imgType}; base64,${data.imgData}`;
                        $('#vatt').attr('href', blobUrl);
                        $('#vatt').attr('target', '_blank');
                        $('#btn_approve').attr('data-identifier', data.identifier);
                        $('#btn_reject').attr('data-identifier', data.identifier);

                        $('#vfirstname').val(data.firstname);
                        $('#vlastname').val(data.lastname);
                        $('#vmiddlename').val(data.middlename);
                        $('#vyrs').val(data.duration);
                        $('#vresidency').val(data.residency).change();
                        $('#vresidency').val(data.residency).change();
                        $('#vbirthday').val(data.birthday);
                        $('#vcivil_status').val(data.civil_status);
                        $('#vgender').val(data.gender);
                        $('#vvoter').val(data.voter).change();
                        $('#vpurok').val(data.purok).change();
                        $('#vhouse').val(data.address);
                        $('#vphone').val(data.phone);
                        $('#vusername').val(data.username);
                        $('#vecp').val(data.ecp);
                        $('#vecr').val(data.ecr);
                        $('#vecn').val(data.ecn);
                        $('#veca').val(data.eca);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert(error);
                });


            });

            $('#approveModal').on('show.bs.modal', function(event) {

                var button = $(event.relatedTarget);
                var dataId = button.data('identifier');
                $('#user_identifier').val(dataId);

            });

            $('#rejectModal').on('show.bs.modal', function(event) {

                var button = $(event.relatedTarget);
                var dataId = button.data('identifier');
                $('#user_identifier_r').val(dataId);

            });
            
            $('#rejectRegister').on('submit', function(event) {

                event.preventDefault();
                var formData = $(this).serialize();
                console.log(formData);

                $.ajax({
                    type: 'POST',
                    url: '../../api/a_post_data.php?action=reject',
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            alert('Registration Rejected');
                            window.location.reload();

                        } else {
                            alert('Error: ' + response.error);
                            console.log(response.error);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error:', textStatus, errorThrown);
                        alert('An error occurred while sending the rejection message.');
                    }
                });
            });
            $('#approveRegister').on('submit', function(event) {  // Target form directly by its ID
                event.preventDefault();
                var formData = $(this).serialize();
                console.log(formData);

                $.ajax({
                    type: 'POST',
                    url: '../../api/a_post_data.php?action=approve',
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            alert('Registration Approved');
                            window.location.reload();
                        } else {
                            alert('Error: ' + response.error);
                            console.log(response.error);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error:', textStatus, errorThrown);
                        alert('An error occurred while approving registration.');
                    }
                });
            });

        });

    </script>

</body>
</html>
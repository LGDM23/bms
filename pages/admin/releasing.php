<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Barangay Management System | Ready</title>
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
    <link href="../../src/assets/css/light/components/tabs.css" rel="stylesheet" type="text/css">
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
                                <li class="breadcrumb-item">Administrator</li>
                                <li class="breadcrumb-item">Management</li>
                                <li class="breadcrumb-item"><a href="ready.php">Ready</a></li>
                            </ol>
                        </nav>
                    </div>

                    <div class="d-flex justify-content-end mb-3">

                        <!-- <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addTeacherModal">Add Student</button> -->

                    </div>
                    <!-- content -->
                    <div class="row layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-content widget-content-area p-4">
                                <div class="simple-tab">

                                    <ul class="nav nav-tabs" id="myTab" role="tablist" style="color: #fff;">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="indigency-tab" data-bs-toggle="tab" data-bs-target="#indigency-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Certificate of Indigency</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="residency-tab" data-bs-toggle="tab" data-bs-target="#residency-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Certificate of Residency</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="clearance-tab" data-bs-toggle="tab" data-bs-target="#clearance-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Barangay Clearance</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="identification-tab" data-bs-toggle="tab" data-bs-target="#identification-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Barangay Identification</button>
                                        </li>
                                    </ul>

                                    <div class="tab-content" id="myTabContent">
                                        <!-- indigency tab -->
                                        <div class="tab-pane fade show active" id="indigency-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                            <div class="col-lg-12 mt-3">
                                                <div class="statbox widget box box-shadow">
                                                    <div class="widget-content widget-content-area">
                                                        <table id="style-2" class="table style-3 dt-table-hover table-responsive">
                                                            <thead>
                                                                <tr>
                                                                    <th>Request ID</th>
                                                                    <th>Full Name</th>
                                                                    <th>Request Documents</th>
                                                                    <th>Purpose</th>
                                                                    <th>Status</th>
                                                                    <th class="text-center dt-no-sorting">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="indigencyTable">
                                                                <?php

                                                                    $sql = "SELECT 
                                                                                r.*, 
                                                                                a.lastname, 
                                                                                a.middlename, 
                                                                                a.firstname, 
                                                                                a.purok, 
                                                                                CONCAT(a.firstname, ' ', a.middlename, ' ', a.lastname) AS fullname
                                                                            FROM 
                                                                                requests r 
                                                                            JOIN 
                                                                                users a ON r.user_id = a.user_id 
                                                                            WHERE 
                                                                                r.status = 'READY'
                                                                            AND
                                                                                r.request_docu = 'Indigency';";
                                                                    $result = $con->query($sql);
                                                                    $html = '';

                                                                    if ($result && $result->num_rows > 0) {
                                                                        while ($requestee = $result->fetch_assoc()) {
                                                                            $html .= '<tr>';
                                                                            $html .= '<td ><p class="badge badge-info w-100">' . htmlspecialchars($requestee['request_code']) . '</p></td>';
                                                                            $html .= '<td >' . htmlspecialchars($requestee['fullname']) . '</td>';
                                                                            $html .= '<td >' . htmlspecialchars($requestee['request_docu']) . '</td>';
                                                                            $html .= '<td >' . htmlspecialchars($requestee['purpose']) . '</td>';
                                                                            $html .= '<td class=""><span class=" w-100 bs-tooltip badge '. (($requestee['status'] == 'RELEASED') ? 'badge-success' : 'badge-warning') .' data-bs-toggle="tooltip" data-bs-placement="top" title="Request on Pending" mb-2 me-4">' . htmlspecialchars($requestee['status']) . '</span></td>';
                                                                            $html .= '<td class="d-flex justify-content-evenly">
                                                                                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#deactivateModal" data-id='.htmlspecialchars($requestee['user_id']).' data-reqid='.htmlspecialchars($requestee['request_code']).' data-doc='.htmlspecialchars($requestee['request_docu']).' data-pur="'.$requestee["purpose"].'">Release</button>
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
                                        <!-- indigency tab -->
                                        <!-- residency tab -->
                                        <div class="tab-pane fade" id="residency-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                            <div class="row">
                                                <div class="col-lg-12 mt-3">
                                                    <div class="statbox widget box box-shadow">
                                                        <div class="widget-content widget-content-area">
                                                            <table id="style-3" class="table style-3 dt-table-hover table-responsive">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Request ID</th>
                                                                        <th>Full Name</th>
                                                                        <th>Request Documents</th>
                                                                        <th>Purpose</th>
                                                                        <th>Status</th>
                                                                        <th class="text-center dt-no-sorting">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="residencyTable">
                                                                <?php

                                                                    $sql = "SELECT 
                                                                                r.*, 
                                                                                a.lastname, 
                                                                                a.middlename, 
                                                                                a.firstname, 
                                                                                a.purok, 
                                                                                CONCAT(a.firstname, ' ', a.middlename, ' ', a.lastname) AS fullname
                                                                            FROM 
                                                                                requests r 
                                                                            JOIN 
                                                                                users a ON r.user_id = a.user_id 
                                                                            WHERE 
                                                                                r.status = 'READY'
                                                                            AND
                                                                                r.request_docu = 'Residency';";
                                                                    $result = $con->query($sql);
                                                                    $html = '';

                                                                    if ($result && $result->num_rows > 0) {
                                                                        while ($requestee = $result->fetch_assoc()) {
                                                                            $html .= '<tr>';
                                                                            $html .= '<td ><p class="badge badge-info w-100">' . htmlspecialchars($requestee['request_code']) . '</p></td>';
                                                                            $html .= '<td >' . htmlspecialchars($requestee['fullname']) . '</td>';
                                                                            $html .= '<td >' . htmlspecialchars($requestee['request_docu']) . '</td>';
                                                                            $html .= '<td >' . htmlspecialchars($requestee['purpose']) . '</td>';
                                                                            $html .= '<td class=""><span class=" w-100 bs-tooltip badge '. (($requestee['status'] == 'RELEASED') ? 'badge-success' : 'badge-warning') .' data-bs-toggle="tooltip" data-bs-placement="top" title="Request on Pending" mb-2 me-4">' . htmlspecialchars($requestee['status']) . '</span></td>';
                                                                            $html .= '<td class="d-flex justify-content-evenly">
                                                                                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#deactivateModal" data-id='.htmlspecialchars($requestee['user_id']).' data-reqid='.htmlspecialchars($requestee['request_code']).' data-doc='.htmlspecialchars($requestee['request_docu']).' data-pur="'.$requestee["purpose"].'">Release</button>
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
                                        <!-- residency tab -->
                                        <!-- clearance tab -->
                                        <div class="tab-pane fade" id="clearance-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                            <div class="row">
                                                <div class="col-lg-12 mt-3">
                                                    <div class="statbox widget box box-shadow">
                                                        <div class="widget-content widget-content-area">
                                                            <table id="style-4" class="table style-3 dt-table-hover table-responsive">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Request ID</th>
                                                                        <th>Full Name</th>
                                                                        <th>Request Documents</th>
                                                                        <th>Purpose</th>
                                                                        <th>Status</th>
                                                                        <th class="text-center dt-no-sorting">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="clearanceTable">
                                                                <?php

                                                                    $sql = "SELECT 
                                                                                r.*, 
                                                                                a.lastname, 
                                                                                a.middlename, 
                                                                                a.firstname, 
                                                                                a.purok, 
                                                                                CONCAT(a.firstname, ' ', a.middlename, ' ', a.lastname) AS fullname
                                                                            FROM 
                                                                                requests r 
                                                                            JOIN 
                                                                                users a ON r.user_id = a.user_id 
                                                                            WHERE 
                                                                                r.status = 'READY'
                                                                            AND
                                                                                r.request_docu = 'Clearance';";
                                                                    $result = $con->query($sql);
                                                                    $html = '';

                                                                    if ($result && $result->num_rows > 0) {
                                                                        while ($requestee = $result->fetch_assoc()) {
                                                                            $html .= '<tr>';
                                                                            $html .= '<td ><p class="badge badge-info w-100">' . htmlspecialchars($requestee['request_code']) . '</p></td>';
                                                                            $html .= '<td >' . htmlspecialchars($requestee['fullname']) . '</td>';
                                                                            $html .= '<td >' . htmlspecialchars($requestee['request_docu']) . '</td>';
                                                                            $html .= '<td >' . htmlspecialchars($requestee['purpose']) . '</td>';
                                                                            $html .= '<td class=""><span class=" w-100 bs-tooltip badge '. (($requestee['status'] == 'RELEASED') ? 'badge-success' : 'badge-warning') .' data-bs-toggle="tooltip" data-bs-placement="top" title="Request on Pending" mb-2 me-4">' . htmlspecialchars($requestee['status']) . '</span></td>';
                                                                            $html .= '<td class="d-flex justify-content-evenly">
                                                                                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#deactivateModal" data-id='.htmlspecialchars($requestee['user_id']).' data-reqid='.htmlspecialchars($requestee['request_code']).' data-doc='.htmlspecialchars($requestee['request_docu']).' data-pur="'.$requestee["purpose"].'">Release</button>
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
                                        <!-- clearance tab -->
                                        <!-- identification tab -->
                                        <div class="tab-pane fade" id="identification-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                            <div class="row">
                                                <div class="col-lg-12 mt-3">
                                                    <div class="statbox widget box box-shadow">
                                                        <div class="widget-content widget-content-area">
                                                            <table id="style-5" class="table style-3 dt-table-hover table-responsive">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Request ID</th>
                                                                        <th>Full Name</th>
                                                                        <th>Request Documents</th>
                                                                        <th>Purpose</th>
                                                                        <th>Status</th>
                                                                        <th class="text-center dt-no-sorting">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="identificationTable">
                                                                <?php

                                                                    $sql = "SELECT 
                                                                                r.*, 
                                                                                a.lastname, 
                                                                                a.middlename, 
                                                                                a.firstname, 
                                                                                a.purok, 
                                                                                CONCAT(a.firstname, ' ', a.middlename, ' ', a.lastname) AS fullname
                                                                            FROM 
                                                                                requests r 
                                                                            JOIN 
                                                                                users a ON r.user_id = a.user_id 
                                                                            WHERE 
                                                                                r.status = 'READY'
                                                                            AND
                                                                                r.request_docu = 'ID';";
                                                                    $result = $con->query($sql);
                                                                    $html = '';

                                                                    if ($result && $result->num_rows > 0) {
                                                                        while ($requestee = $result->fetch_assoc()) {
                                                                            $html .= '<tr>';
                                                                            $html .= '<td ><p class="badge badge-info w-100">' . htmlspecialchars($requestee['request_code']) . '</p></td>';
                                                                            $html .= '<td >' . htmlspecialchars($requestee['fullname']) . '</td>';
                                                                            $html .= '<td >' . htmlspecialchars($requestee['request_docu']) . '</td>';
                                                                            $html .= '<td >' . htmlspecialchars($requestee['purpose']) . '</td>';
                                                                            $html .= '<td class=""><span class=" w-100 bs-tooltip badge '. (($requestee['status'] == 'RELEASED') ? 'badge-success' : 'badge-warning') .' data-bs-toggle="tooltip" data-bs-placement="top" title="Request on Pending" mb-2 me-4">' . htmlspecialchars($requestee['status']) . '</span></td>';
                                                                            $html .= '<td class="d-flex justify-content-evenly">
                                                                                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#deactivateModal" data-id='.htmlspecialchars($requestee['user_id']).' data-reqid='.htmlspecialchars($requestee['request_code']).' data-doc='.htmlspecialchars($requestee['request_docu']).' data-pur="'.$requestee["purpose"].'">Release</button>
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
                                        <!-- identification tab -->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- content -->

                </div>
                <!-- deactivate modal start -->
                <div class="modal fade" id="deactivateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="exampleModalCenterTitle"><b>Release Document</b></h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        <p>Document(<b><i id="reqCode"></i></b>) has been picked up by the requester. </p><br>
                                        <form id="releaseForm">
                                            <input type="hidden" name="user_id" id="user_id">
                                            <input type="hidden" name="req_id" id="req_id">
                                            <input type="hidden" name="docu" id="docu">
                                            <input type="hidden" name="pur" id="pur">
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success" id="releasetheKraken">Release</button>
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
                                <h6 class="modal-title" id="exampleModalCenterTitle"><b>Reject Request</b></h6>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <p>Reject Requests <b><i id="reqCode2"></i></b> ?</p><br>
                                </div>
                                <form id="deleteStudent">
                                    <input type="hidden" name="id" id="student_id">
                                    <div class="modal-footer">
                                        <button type="submit" id="deleteStud" class="btn btn-danger">Reject</button>
                                        <button type="button" id="cancelDeleteStudent" class="btn btn-light-dark" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
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
     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

    <script>
        c5 = $('#style-5').DataTable({
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

        multiCheck(c5);

        c4 = $('#style-4').DataTable({
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

        multiCheck(c4);

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

        c2 = $('#style-2').DataTable({
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

        multiCheck(c2);

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
                $('#reqCode2').html(dataId);
            });

            $('#deactivateModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var dataId = button.data('id');
                var dataId2 = button.data('reqid');
                var dataId3 = button.data('doc');
                var dataId4 = button.data("pur");
                $('#reqCode').html(dataId2);
                $('#user_id').val(dataId);
                $('#req_id').val(dataId2);
                $('#docu').val(dataId3);
                $('#pur').val(dataId4);
            });

        });

        document.addEventListener('DOMContentLoaded', function() {

            document.getElementById('releaseForm').addEventListener('submit', function(event) {
                event.preventDefault();

                const formData = new FormData(this);

                for (const [key, value] of formData.entries()) {
                    console.log(`${key}:`, value);
                }
                const reqIdValue = formData.get('req_id');
                const docu = formData.get('docu');
                const requestee = formData.get('user_id');
                const pur = formData.get('pur');
                const datetodz = setCurrentDate();
                const ctrl = '24-TBYAP-'+generateRandomNumber();
                formData.append('requestCode', reqIdValue);
                formData.append('requestDocu', docu);

                fetch('../../api/status_upd.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {

                        alert("Document("+reqIdValue+") status changed to RELEASED");
                        window.location.reload();

                    } else {

                        alert(`Error: ${data.message}`);

                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });

            });

            document.getElementById('releasetheKraken').addEventListener('click', function() {

                document.getElementById('releaseForm').dispatchEvent(new Event('submit'));

            });
        });


        
        function generateRandomNumber() {

            let randomNumber = '';
            for (let i = 0; i < 10; i++) {
                randomNumber += Math.floor(Math.random() * 10);
            }

            return randomNumber;

        }

        function setCurrentDate() {
            const today = new Date();

            const month = String(today.getMonth() + 1).padStart(2, '0');
            const day = String(today.getDate()).padStart(2, '0');
            const year = today.getFullYear();

            const formattedDate = `${month}/${day}/${year}`;

            return formattedDate;
        }

        setCurrentDate();
        
        async function generateExcel(fileName, ctrl, datetodz, user, pur) {

            const formData = new FormData();
            formData.append('fileName', fileName);
            formData.append('ctrl', generateRandomNumber());
            formData.append('datetodz', datetodz);
            formData.append('user_id', user);
            formData.append('purpose', pur);

            fetch('http://localhost/bms/api/update_excel.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                console.log('Response status:', response.status);
                return response.text();
            })
            .then(data => {
                console.log('Response data:', data); 

                let jsonResponse;
                try {
                    jsonResponse = JSON.parse(data);
                } catch (error) {
                    console.error('Error parsing JSON:', error);
                    alert('Received unexpected response from the server.');
                    return;
                }

                if (jsonResponse.success) {
                    alert(`Document Created`);
                } else {
                    alert(`Error: ${jsonResponse.message}`);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });

        }
        

    </script>

</body>
</html>
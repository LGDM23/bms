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
                            </ol>
                        </nav>
                    </div>

                    <div class="d-flex justify-content-end mb-3">
                        
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#newRequest">New Request</button>

                    </div>

                    <div class="row layout-spacing">
                        <div class="col-lg-12">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-content widget-content-area table-responsive">
                                    <table id="style-3" class="table style-3 dt-table-hover">
                                        <thead>
                                            <tr>
                                                <th>Request ID</th>
                                                <th>Full Name</th>
                                                <th>Document</th>
                                                <th>Purpose</th>
                                                <th>Status</th>
                                                <th class="text-center dt-no-sorting">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="studentTableBody">
                                        <?php

                                            $url = 'http://localhost/bms/api/a_get_data.php?action=getMyRequests&id='.$user_id.'';

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
                                                foreach ($data as $request) {
                                                    $html .= '<tr>';
                                                    $html .= '<td><p class="badge badge-info w-100">' . htmlspecialchars($request['request_code']).'</p></td>';
                                                    $html .= '<td>' . htmlspecialchars($request['fullname']).'</td>';
                                                    $html .= '<td>' . htmlspecialchars($request['request_docu']) . '</td>';
                                                    $html .= '<td>' . htmlspecialchars($request['purpose']) . '</td>';
                                                    $html .= '<td class=""><span class="w-100 bs-tooltip badge '. (($request['status'] == 'PENDING') ? 'badge-warning' : (($request['status'] == 'READY') ? 'badge-info' : 'badge-danger')) .' data-bs-toggle="tooltip" data-bs-placement="top" title="Waiting for Approval" mb-2 me-4">' . htmlspecialchars($request['status']) . '</span></td>';
                                                    $html .= '<td class="text-center">
                                                            <ul class="table-controls">' .
                                                                ($request['status'] === 'PENDING' ? 
                                                                '<li>
                                                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="' . htmlspecialchars($request['request_code']) . '" data-bs-toggle="tooltip" data-bs-placement="top" title="Cancel Request" data-original-title="Delete">
                                                                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                                                        </svg>
                                                                    </a>
                                                                </li>' : '<p class="text-muted">'.$request['status'].'</p>') . '
                                                            </ul>
                                                        </td>';
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
                <!-- deactivate modal start -->
                <div class="modal fade" id="newRequest" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="exampleModalCenterTitle"><b>New Request</b></h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p id="retvalue" class="text-light text-center badge badge-danger w-100 text-wrap"></p>
                                    <form id="addRequest">

                                        <div class="container">
                                            <div class="row d-flex flex-md-column flex-lg-row justify-content-between">
                                                <div class="col-12 col-md-12 col-lg-12 mb-3">
                                                    <label class="form-label">Document<b class="text-danger"></b></label>
                                                    <select id="cert" class="form-select" name="cert" onchange="updatePurpose()">
                                                        <option value="" selected disabled>--Select Certificate--</option>
                                                        <option value="Indigency">Certificate of Indegency</option>
                                                        <option value="Residency">Certificate of Residency</option>
                                                        <option value="Clearance">Barangay Clearance</option>
                                                        <option value="ID">Barangay Identification</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-12 col-lg-12 mb-3">
                                                    <label class="form-label">Purpose<b class="text-danger"></b></label>
                                                    <select id="purpose" class="form-select" name="purpose" disabled>
                                                        <option value="" selected disabled>--Disabled--</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                                            
                                    </form>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-secondary" id="submitRequest">Request</button>
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
                                <h6 class="modal-title" id="exampleModalCenterTitle"><b>Cancel Request</b></h6>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <p>Cancel this document request?</p><br>
                                </div>
                                <form id="cancelMyReq">
                                    <input type="hidden" name="id" id="id">
                                    <div class="modal-footer">
                                        <button type="submit" id="cancelReq" class="btn btn-danger">Cancel</button>
                                        <button type="button" id="cancelDeleteStudent" class="btn btn-light-dark" data-bs-dismiss="modal">Dismiss</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                


    </div>
   

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

            } else if (cert === 'Clearance') {

                purpose.innerHTML += '<option value="Employment">For Employment</option>';
                purpose.innerHTML += '<option value="Business Permit">For Business Permit</option>';
                purpose.innerHTML += '<option value="Legal Matters">For Legal Matters</option>';

            } else if (cert === 'ID') {

                purpose.innerHTML += '<option value="Identification">Identification</option>';
                
            }
        }

        
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

            const cancelReqForm = document.getElementById('cancelMyReq');
            const cancelReq = document.getElementById('cancelReq');

            cancelReqForm.addEventListener('submit', function(event) {
                event.preventDefault();

                const formData = new FormData(cancelReqForm);
                const reqID = formData.get('id');

                console.log(reqID);

                fetch(`../../api/cancel_request.php`, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        alert("Request Cancelled");
                        window.location.reload();
                    } else {
                        alert('Error canceling request: ' + data.error);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while canceling the request.');
                });

            });

            $('#deleteModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var dataId = button.data('id');
                $('#id').val(dataId);
            });

        });

        document.addEventListener('DOMContentLoaded', function() {

            document.getElementById('addRequest').addEventListener('submit', function(event) {

                event.preventDefault();

                const formData = new FormData(this);
                let id = <?php echo $user_id ?>;

                for (const [key, value] of formData.entries()) {
                    console.log(`${key}:`, value);
                }

                fetch(`../../api/a_post_data.php?action=addRequests&id=${id}`, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    console.log(data);
                    const json = JSON.parse(data);
                    if (json.error) {
                        document.getElementById('retvalue').textContent = json.error;
                    } else {
                        alert(json.message);
                        window.location.reload();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });

            });

            document.getElementById('submitRequest').addEventListener('click', function() {

                document.getElementById('addRequest').dispatchEvent(new Event('submit'));

            });

        });

    </script>

</body>
</html>
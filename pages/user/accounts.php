<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Barangay Management System | Account</title>
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

<link href="../../src/assets/css/dark/components/modal.css" rel="stylesheet" type="text/css" />
<link href="../../src/assets/css/light/components/modal.css" rel="stylesheet" type="text/css" />

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
                                <li class="breadcrumb-item"><a href="dashboard.php">Account</a></li>
                            </ol>
                        </nav>
                    </div>

                    <div class="row layout-top-spacing">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">
                            <div class="user-profile">
                                <div class="widget-content widget-content-area">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="">User Details</h3>
                                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#changePass">Password</button>
                                    </div>
                                    <div class="text-center user-info">
                                    <div class="avatar avatar-xl avatar-online">
                                        <?php

                                            $base64Image = 'data:' . $imgType . ';base64,' . base64_encode($img);
                                            echo '<img src="' . htmlspecialchars($base64Image) . '" class="rounded-circle" alt="avatar">';

                                        ?>
                                    </div>
                                    </div>
                                    <div class=" d-flex align-items-center justify-content-center">
    
                                        <div class="col-12 col-lg-6">
                                            <ul class="contacts-block list-unstyled">
                                                <li class="contacts-block__item mt-2">
                                                    <label for="firstname"><p>Name</p></label>
                                                    <input type="text" class="form-control text-dark" name="a" id="a" value="<?php echo $userFirstname." ".$userLastname ?>" readonly>
                                                </li>
                                                <li class="contacts-block__item mt-2">
                                                    <label for="firstname"><p>Purok</p></label>
                                                    <input type="text" class="form-control text-dark" name="b" id="b" value="<?php echo $purok ?>" readonly>
                                                </li>
                                                <li class="contacts-block__item mt-2">
                                                    <label for="firstname"><p>Phone</p></label>
                                                    <input type="text" class="form-control text-dark" name="c" id="c" value="<?php echo $userPhone ?>" readonly>
                                                </li>
                                                <li class="contacts-block__item mt-2">
                                                    <label for="firstname"><p>Username</p></label>
                                                    <input type="text" class="form-control text-dark" name="d" id="d" value="<?php echo $username ?>" readonly>
                                                </li>
                                            </ul>
                                        </div>                                    
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
            <div class="modal fade" id="changePass" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalCenterTitle"><b>Change Password</b></h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="changePasswordForm">
                        <div class="col-12">
                            <p id="course-error" class="text-light w-100 badge badge-danger mt-2 mb-2"></p>
                        </div>
                        <div class="row mb-4" hidden>
                            <div class="col-12">
                                <label for="firstname"><p>Role</p></label>
                                <input type="text" class="form-control" name="user_role" id="ff" value="<?php echo $role ?>">
                            </div>
                        </div>
                        <div class="row mb-4" hidden>
                            <div class="col-12">
                                <label for="firstname"><p>User</p></label>
                                <input type="text" class="form-control" name="user_id" id="e" value="<?php echo $_SESSION['user_id']; ?>">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12">
                                <label for="firstname"><p>Current Password</p></label>
                                <input type="password" class="form-control" name="current_password" id="sfirstname" placeholder="">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="teacherid"><p>New Password</p></label>
                                <input type="password" class="form-control" name="new_password" id="student_number">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="teacherid"><p>Confirm New Password</p></label>
                                <input type="password" class="form-control" name="confirm_new_password" id="student_number">
                            </div>
                        </div>
                    </form>
                    
                    <div class="modal-footer">
                                <button type="submit" id="change" class="btn btn-success">Change Password</button>
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
    <script src="../../layouts/modern-light-menu/app.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

</body>
</html>

<script>
        
    var storedData = localStorage.getItem('user-data');

    if (storedData) {
        var userData = JSON.parse(storedData);

        if (userData.login === true) {
            
            console.log('User is logged in');

        } else {

            window.location.href = '../../authentication/SignIn.php';

        }

    } else {

        window.location.href = '../../authentication/SignIn.php';

    }

    document.addEventListener('DOMContentLoaded', function() {

        document.getElementById('changePasswordForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(this);

            for (const [key, value] of formData.entries()) {
                console.log(`${key}:`, value);
            }

            fetch('../../api/addData.php?insertion=changepass', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    document.getElementById('course-error').textContent = data.error;
                } else {
                    alert(data.message);
                    LogOut();
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });

    document.getElementById('change').addEventListener('click', function() {
    document.getElementById('changePasswordForm').dispatchEvent(new Event('submit'));

    });

    });


    function LogOut() {
        localStorage.clear();
        window.location.href = '../../authentication/SignIn.php';
    }
</script>

<style>

    .img-profile {

        width: 5%;

    }

</style>
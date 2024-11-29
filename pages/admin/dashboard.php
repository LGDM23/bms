<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Barangay Management System | Dashboard</title>
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

</head>
<body class="dark layout-boxed">
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <div class="header-container container-xxl">
        

                <?php include('../../components/nav-dropdown.php'); ?>
                <?php include('../../api/counter.php'); ?>
                


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
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            </ol>
                        </nav>
                    </div>

                    <div class="row layout-top-spacing">

                        <!-- counter -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="row widget-statistic">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                                    <div class="widget widget-one_hybrid widget-followers">
                                        <div class="widget-heading">
                                            <div class="w-title">
                                                <div class="w-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                                </div>
                                                <div class="">
                                                    <p class="w-value"><?php //echo $student_count2 ?></p>
                                                    <p class="w-value"><?php echo $all_pop ?></p>
                                                    <h5 class="">System Population</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                                    <div class="widget widget-one_hybrid widget-engagement">
                                        <div class="widget-heading">
                                            <div class="w-title">
                                                <div class="w-icon">
                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                                </div>
                                                <div class="">
                                                    <p class="w-value"><?php //echo $act_count2 ?></p>
                                                    <p class="w-value"><?php echo $all_voters ?></p>
                                                    <h5 class="">Voter/s</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                                    <div class="widget widget-one_hybrid widget-referral">
                                        <div class="widget-heading">
                                            <div class="w-title">
                                                <div class="w-icon">
                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                                </div>
                                                <div class="">
                                                    <p class="w-value"><?php //echo $res_count2 ?></p>
                                                    <p class="w-value"><?php echo $all_non ?></p>
                                                    <h5 class="">Non-Voter/s</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- counter -->
                         
                        <!-- counter -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                            <div class="row widget-statistic">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                                    <div class="widget widget-one_hybrid widget-followers">
                                        <div class="widget-heading">
                                            <div class="w-title">
                                                <div class="w-icon">
                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                                                </div>
                                                <div class="">
                                                    <p class="w-value"><?php //echo $student_count3 ?></p>
                                                    <p class="w-value"><?php echo $all_pending ?></p>
                                                    <h5 class="">Requests</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 layout-spacing">
                                    <div class="widget widget-one_hybrid widget-engagement">
                                        <div class="widget-heading">
                                            <div class="w-title">
                                                <div class="w-icon">
                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                                                </div>
                                                <div class="">
                                                    <p class="w-value"><?php //echo $res_count3 ?></p>
                                                    <p class="w-value"><?php echo $all_released ?></p>
                                                    <h5 class="">Released</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- counter -->
                         

                        <!-- chart -->
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                            <div class="widget widget-chart-three p-3">
                                <div class="widget-heading">
                                    <div class="">
                                        <h5 class="">System Population(Gender)</h5>
                                        <p>Users enrolled in the system parts by Gender</p>
                                    </div>
                                </div>
                                <div class="widget-content">
                                    <canvas id="populationGender" width="400" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- chart -->

                        <!-- chart -->
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                            <div class="widget widget-chart-three p-3">
                                <div class="widget-heading">
                                    <div class="">
                                        <h5 class="">System Population(Age)</h5>
                                        <p>Users enrolled in the system parts by Age Bracket</p>
                                    </div>
                                </div>
                                <div class="widget-content">
                                    <canvas id="ageBracket" width="400" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- chart -->

                        <!-- chart -->
                        <!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-chart-three p-3">
                                <div class="widget-heading">
                                    <div class="">
                                        <h5 class="">Student Activity Chart</h5>
                                        <p>Average across all Courses and summation throught out the Activities</p>
                                    </div>
                                </div>
                                <div class="widget-content">
                                    <canvas id="activityChart"></canvas>
                                </div>
                            </div>
                        </div> -->
                        <!-- chart -->

                    </div>

                </div>

            </div>

        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="../../src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../../src/plugins/src/mousetrap/mousetrap.min.js"></script>
    <script src="../../src/plugins/src/waves/waves.min.js"></script>
    <script src="../../layouts/modern-light-menu/app.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>
</html>

<script>
    async function fetchPopulationData() {
        const response = await fetch('../../api/population_api.php');
        const data = await response.json();
        
        const genderData = {
            labels: ['Male', 'Female'],
            datasets: [{
                label: 'Population by Gender',
                data: [data.gender.male, data.gender.female],
                backgroundColor: ['#42a5f5', '#ff4081'],
                hoverOffset: 4,
                barThickness: 20
            }]
        };

        const populationGender = new Chart(
            document.getElementById('populationGender'),
            {
                type: 'bar',
                data: genderData,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Gender'
                            }
                        }
                    }
                }
            }
        );

        const ageData = {
            labels: ['0-18', '19-35', '36-50', '51-65', '66+'],
            datasets: [{
                label: 'Population by Age Bracket',
                data: [
                    data.age['0-18'], 
                    data.age['19-35'], 
                    data.age['36-50'], 
                    data.age['51-65'], 
                    data.age['66+']
                ],
                backgroundColor: '#42a5f5',
                barThickness: 20, // Set bar thickness for age chart
            }]
        };

        const ageBracket = new Chart(
            document.getElementById('ageBracket'),
            {
                type: 'bar',
                data: ageData,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Age Brackets'
                            }
                        }
                    }
                }
            }
        );
    }

    fetchPopulationData();
</script>

    fetchPopulationData();
</script>

<style>
    canvas {
    width: 100% !important;
    height: auto !important;
}
</style>
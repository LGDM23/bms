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
                                <li class="breadcrumb-item">User</li>
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            </ol>
                        </nav>
                    </div>

                    <div class="row layout-top-spacing">

                        <!-- counter -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="row widget-statistic">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                                    <div class="widget widget-one_hybrid widget-followers">
                                        <div class="widget-heading">
                                            <div class="w-title">
                                                <div class="w-icon">
                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                                </div>
                                                <div class="">
                                                    <p class="w-value"><?php //echo $student_count2 ?></p>
                                                    <p class="w-value"><?php echo $my_pending ?></p>
                                                    <h5 class="">My Request</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                                    <div class="widget widget-one_hybrid widget-engagement">
                                        <div class="widget-heading">
                                            <div class="w-title">
                                                <div class="w-icon">
                                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                                </div>
                                                <div class="">
                                                    <p class="w-value"><?php echo $my_released ?></p>
                                                    <h5 class="">Released</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- counter -->

                    </div>

                </div>

            </div>
            <!--  BEGIN FOOTER  -->


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
        
    fetch('fetch_activities.php')
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            console.error('Error:', data.message);
            return;
        }

        const ctx = document.getElementById('activityChart').getContext('2d');

        const courseData = data.data.reduce((acc, item) => {
            if (!acc[item.course_name]) {
                acc[item.course_name] = { pass_count: 0, fail_count: 0, not_yet_taken_count: 0 };
            }
            acc[item.course_name].pass_count += item.pass_count;
            acc[item.course_name].fail_count += item.fail_count;
            acc[item.course_name].not_yet_taken_count += item.not_yet_taken_count;
            return acc;
        }, {});

        const courseNames = Object.keys(courseData);
        const passCounts = courseNames.map(courseName => courseData[courseName].pass_count);
        const failCounts = courseNames.map(courseName => courseData[courseName].fail_count);
        const notYetTakenCounts = courseNames.map(courseName => courseData[courseName].not_yet_taken_count);

        const activityChart = new Chart(ctx, {
            type: 'bar', // Changed to 'bar' to better visualize grouped data
            data: {
                labels: courseNames,
                datasets: [
                    {
                        label: 'Pass',
                        data: passCounts,
                        backgroundColor: 'rgba(45, 196, 45, 0.5)',
                        borderColor: 'rgba(45, 196, 45, 1)',
                        borderWidth: 1,
                        barThickness: 20
                    },
                    {
                        label: 'Failed',
                        data: failCounts,
                        backgroundColor: 'rgba(247, 80, 54, 0.5)',
                        borderColor: 'rgba(247, 80, 54, 1)',
                        borderWidth: 1,
                        barThickness: 20
                    },
                    {
                        label: 'Not Yet Taken',
                        data: notYetTakenCounts,
                        backgroundColor: 'rgba(104, 104, 104, 0.5)',
                        borderColor: 'rgba(104, 104, 104, 1)',
                        borderWidth: 1,
                        barThickness: 20
                    }
                ]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Course Name'
                        },
                        beginAtZero: true
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Counts'
                        },
                        beginAtZero: true
                    }
                },
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.dataset.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        });
    })
    .catch(error => {
        console.error('Error:', error);
    });

    fetch('fetch_performance.php')
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    console.error('Error:', data.message);
                    return;
                }

                const labels = data.data.map(item => item.performanceCateg);
                const avgScores = data.data.map(item => item.avg_score);
                const avgPercentages = data.data.map(item => item.avg_percentage);

                const ctx = document.getElementById('performanceChart').getContext('2d');

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                label: 'Average Score',
                                data: avgScores,
                                backgroundColor: 'rgba(39, 171, 219, 0.2)',
                                borderColor: 'rgba(39, 171, 219, 1)',
                                borderWidth: 1,
                                barThickness: 20
                            },
                            {
                                label: 'Average Percentage',
                                data: avgPercentages,
                                backgroundColor: 'rgba(11, 199, 87, 0.2)',
                                borderColor: 'rgba(11, 199, 87, 1)',
                                borderWidth: 1,
                                barThickness: 20
                            }
                        ]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Average Value'
                                }
                            }
                        },
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(tooltipItem) {
                                        return tooltipItem.dataset.label + ': ' + tooltipItem.raw;
                                    }
                                }
                            }
                        }
                    }
                });
            })
            .catch(error => {
                console.error('Error:', error);
            });

            fetch('fetch_student_performance.php')
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    console.error('Error:', data.message);
                    return;
                }

                const studentNames = data.data.map(item => item.firstname);
                const avgScores = data.data.map(item => item.avg_score);
                const avgPercentages = data.data.map(item => item.avg_percentage);

                console.log(studentNames);
                console.log(avgScores);
                console.log(avgPercentages);
                

                const ctx = document.getElementById('studentPerformanceChart').getContext('2d');

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: studentNames, // Student first names as labels
                        datasets: [
                            {
                                label: 'Average Score',
                                data: avgScores,
                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1,
                                barThickness: 20
                            },
                            {
                                label: 'Average Percentage',
                                data: avgPercentages,
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1,
                                barThickness: 20
                            }
                        ]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Average Value'
                                }
                            }
                        },
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(tooltipItem) {
                                        return tooltipItem.dataset.label + ': ' + tooltipItem.raw;
                                    }
                                }
                            }
                        }
                    }
                });
            })
            .catch(error => {
                console.error('Error:', error);
            });
    var storedData = localStorage.getItem('user-data');

    // if (storedData) {
    //     var userData = JSON.parse(storedData);

    //     if (userData.login === true) {
            
    //         console.log('User is logged in');

    //     } else {
    //         window.location.href = '../../authentication/SignIn.php';
    //     }
    // } else {
    //     window.location.href = '../../authentication/SignIn.php';
    // }

</script>

<style>
    canvas {
    width: 100% !important;
    height: auto !important;
}
</style>
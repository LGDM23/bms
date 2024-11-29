

<div class="sidebar-wrapper sidebar-theme">

            <nav id="sidebar">

                <div class="navbar-nav theme-brand text-center">
                    <div class="">
                        <div class="nav-item d-flex justify-content-center col-12">
                            <a href="">
                                <img src="../../src/assets/img/apalit.png" class="img-fluid" width="100" alt="haaa">
                            </a>
                        </div>
                    </div>
                </div>
                                
                <div class="shadow-bottom"></div>


                <ul class="list-unstyled menu-categories" id="accordionExample">
                    
                <li class="menu menu-heading">
                        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>Home</span></div>
                    </li>
                    <li class="menu">
                        <a href="./dashboard.php" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span>Dashboard</span>
                            </div>
                        </a>
                    </li>

                    

                        <?php 
                            if($role == 'admin') {
                                echo    '<li class="menu menu-heading">
                        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>Management</span></div>
                    </li>
                                <li class="menu">
                                            <a href="./registrations.php" aria-expanded="false" class="dropdown-toggle">
                                                <div class="">
                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                                                    <span>Registrations</span>
                                                </div>
                                            </a>
                                        </li>
                                <li class="menu">
                                            <a href="./users.php" aria-expanded="false" class="dropdown-toggle">
                                                <div class="">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                                    <span>Users</span>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="menu">
                                            <a href="./requests.php" aria-expanded="false" class="dropdown-toggle">
                                                <div class="">
                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                                
                                                    <span>Requests</span>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="menu">
                                            <a href="./releasing.php" aria-expanded="false" class="dropdown-toggle">
                                                <div class="">
                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                                    <span>Releasing</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="menu">
                                            <a href="./released.php" aria-expanded="false" class="dropdown-toggle">
                                                <div class="">
                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                                    <span>Released</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="menu">
                                            <a href="./population.php" aria-expanded="false" class="dropdown-toggle">
                                                <div class="">
                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                                    <span>Population</span>
                                                </div>
                                            </a>
                                        </li>

                                        ';

                            }
                            if($role != 'admin') {

                                echo '<li class="menu menu-heading">
                                        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>Transactions</span></div>
                                    </li>

                                        <li class="menu">
                                            <a href="./requests.php" aria-expanded="false" class="dropdown-toggle">
                                                <div class="">
                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                                
                                                    <span>Requests</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="menu">
                                            <a href="./released.php" aria-expanded="false" class="dropdown-toggle">
                                                <div class="">
                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                                    <span>Released</span>
                                                </div>
                                            </a>
                                        </li>';

                            }
                
                        ?>
                        
                </ul>
                
            </nav>

        </div>

        <script>

            document.addEventListener('DOMContentLoaded', function() {
                const currentLocation = window.location.href;
                const menuItems = document.querySelectorAll('#accordionExample .menu a.dropdown-toggle');
                
                menuItems.forEach(item => {
                    if (item.href === currentLocation) {
                        item.parentElement.classList.add('active');  // Add active class to li.menu
                        item.classList.add('picked');  // Add picked class to a.dropdown-toggle
                    }
                });
            });

        </script>

        <style>

            .picked {
                background-color: #FD9726 !important;
            }

            .dropdown-toggle:hover, svg:hover, .menu {
                color: #FD9726 !important;
            }
            .menu a[disabled] {
                pointer-events: none;
                color: #898989;
                cursor: not-allowed;
            }

        </style>
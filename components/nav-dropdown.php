<?php

    include('../../api/database.php');
    include('../../api/session.php');

    

    if(isset($_SESSION['user_id'])) {

        $user_id = $_SESSION['user_id'];

        $retrieveUser = "SELECT * FROM users WHERE user_id = $user_id";

        $result = $con->query($retrieveUser);

        if ($result->num_rows > 0) {
        
            $data = $result->fetch_assoc();

            $userFirstname = $data['firstname'];
            $userMiddlename = $data['middlename'];
            $userLastname = $data['lastname'];
            $userPhone = $data['phone'];
            $imgType = $data['imgType'];
            $img = $data['imgData'];
            $role = $data['role'];
            $purok = $data['purok'];
            $username = $data['username'];
            $civil = $data['civil_status'];
            $bday = $data['birthday'];
            $formattedBday = date("F d, Y", strtotime($bday));
            $today = new DateTime("today");
            $birthDate = new DateTime($bday);
            $age = $birthDate->diff($today)->y;

        }

    } else {

        // echo '<script>
        
        //         localStorage.clear();
        //         window.location.href = "../../authentication/SignIn.php";

        //       </script>';

    }

?>
<header class="header navbar navbar-expand-sm expand-header">

    <a href="javascript:void(0);" class="sidebarCollapse">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
    </a>
    
    <ul class="navbar-item flex-row ms-lg-auto ms-0">

        <li class="nav-item theme-toggle-item">
            <a href="javascript:void(0);" class="nav-link theme-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon dark-mode"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sun light-mode"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
            </a>
        </li>

        <li class="nav-item dropdown user-profile-dropdown order-lg-0 order-1">
            <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="avatar-container d-flex justify-content-end align-items-end">
                    
                    <div class="avatar avatar-sm avatar-indicators avatar-online">
                        <?php

                            $base64Image = 'data:' . $imgType . ';base64,' . base64_encode($img);
                            echo '<img src="' . htmlspecialchars($base64Image) . '" class="rounded-circle" alt="avatar">';

                        ?>
                    </div>
                </div>
            </a>

            <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                <div class="user-profile-section">
                    <div class="media mx-auto">
                        <div class="media-body">
                            <h5><?php echo $userFirstname." ".$userLastname ?></h5>
                            <p><?php echo ($role == 'user') ? 'User' : 'Administrator' ?></p>
                        </div>
                    </div>
                </div>
                <div class="dropdown-item">
                    <a href="accounts.php" id="acct">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg> 
                        <span>Account</span>
                    </a>
                </div>
                <div class="dropdown-item">
                    <a href="../../authentication/SignIn.php" id="logoutAccount">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" y1="12" x2="9" y2="12"></line>
                        </svg> <span>Log Out</span>
                    </a>
                </div>
            </div>
            
        </li>
    </ul>

</header>

<script>

    document.addEventListener('DOMContentLoaded', function() {

        const logout = document.getElementById('logoutAccount');

        logout.onclick = function() {
            fetch('../../api/logout.php', {
                method: 'POST'
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    console.log(data.error);
                    alert(data.error);
                } else {
                    console.log(data.message);
                    alert(data.message);
                    localStorage.clear();
                    window.location.href = '../../authentication/SignIn.php';
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        };
    });

</script>
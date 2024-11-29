<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>BMS | SignIn </title>
    <link rel="icon" type="image/x-icon" href="../landing/img/apalit.ico"/>
    <link href="../layouts/modern-light-menu/css/light/loader.css" rel="stylesheet" type="text/css" />
    <link href="../layouts/modern-light-menu/css/dark/loader.css" rel="stylesheet" type="text/css" />
    <script src="../layouts/modern-light-menu/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    
    <link href="../layouts/modern-light-menu/css/light/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../src/assets/css/light/authentication/auth-boxed.css" rel="stylesheet" type="text/css" />
    
    <!-- <link href="../layouts/modern-light-menu/css/dark/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../src/assets/css/dark/authentication/auth-boxed.css" rel="stylesheet" type="text/css" /> -->
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- jQuery -->
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    
</head>
<body class="form">

    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <div class="auth-container d-flex">

        <div class="container mx-auto align-self-center">
    
            <div class="row">
    
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
                    <div class="card mt-3 mb-3">
                        <div class="card-body">
    
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    
                                    <h2>Sign In</h2>
                                    <p>Barangay Management System Login</p>
                                    
                                </div>
                                <form id="loginUser">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <p id="login-error" class="badge badge-danger w-100 p-3"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Username</label>
                                            <input type="text" name="username" id="username" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <label class="form-label">Password</label>
                                            <input type="password" name="password" id="password" class="form-control">
                                        </div>
                                    </div>
                                
                                    <div class="col-12">
                                    <div class="mb-3">
                                        <div class="form-check form-check-primary form-check-inline">
                                            <input class="form-check-input me-3" type="checkbox" id="form-check-default">
                                            <label class="form-check-label" for="form-check-default">
                                                Remember me
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-4">
                                        <button id="loginButton" type="submit" class="btn btn-secondary w-100">SIGN IN</button>
                                    </div>
                                </div>
                                </form>

                                <div class="col-12">
                                    <div class="text-center mb-1">
                                        <p class="mb-0">Don't have account yet? <a href="Registration.php" class="text-success">Register</a></p>
                                    </div>
                                    <div class="text-center">
                                        <p class="mb-0">Forgot password? Click <a href="Reset.php" class="text-success">here</a></p>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>

    </div>
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="../src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../src/assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

<script>

    document.addEventListener('DOMContentLoaded', function() {

        document.getElementById('loginUser').addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(this);

            console.log(formData);
            for (const [key, value] of formData.entries()) {
                console.log(`${key}:`, value);
            }

            fetch('../api/authentication_api.php?auth=login', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {

                    document.getElementById('login-error').textContent = data.error;

                } else {

                    if(data.login) {

                        localStorage.setItem('user-data', JSON.stringify(data));

                        document.getElementById('login-error').classList.remove('badge-danger');
                        document.getElementById('login-error').classList.remove('badge-info');
                        document.getElementById('login-error').classList.add(data.color);
                        document.getElementById('login-error').textContent = data.message;
                        if(data.role === 'admin') {
                            window.location.href = '../pages/admin/dashboard.php';
                        } else {
                            window.location.href = '../pages/user/dashboard.php';
                        }
                        console.log(data.login);
                        

                    } else {

                        document.getElementById('login-error').classList.remove('badge-danger');
                        document.getElementById('login-error').classList.add(data.color);
                        document.getElementById('login-error').textContent = data.message;

                    }

                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });

        document.getElementById('loginButton').addEventListener('click', function() {

            document.getElementById('loginUser').dispatchEvent(new Event('submit'));
            

        });

    });

</script>

</body>
</html>
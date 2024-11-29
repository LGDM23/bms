<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>BMS | Password Reset </title>
    <link rel="icon" type="image/x-icon" href="../landing/img/apalit.ico"/>
    <link href="../layouts/modern-light-menu/css/light/loader.css" rel="stylesheet" type="text/css" />
    <link href="../layouts/modern-light-menu/css/dark/loader.css" rel="stylesheet" type="text/css" />
    <script src="../layouts/modern-light-menu/loader.js"></script>
    
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../layouts/modern-light-menu/css/light/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../src/assets/css/light/authentication/auth-boxed.css" rel="stylesheet" type="text/css" />
    <link href="../layouts/modern-light-menu/css/dark/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../src/assets/css/dark/authentication/auth-boxed.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    
</head>
<body class="form">
    <!-- BEGIN LOADER -->
    <div id="load_screen"> 
        <div class="loader"> 
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!-- END LOADER -->

    <div class="auth-container d-flex h-100">
        <div class="container mx-auto align-self-center">
            <div class="row">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
                    <div class="card mt-3 mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <h2>Password Reset</h2>
                                    <p>Provide the details used in creating your <b class="text-secondary">Account</b>.</p>
                                </div>
                                <div class="col-md-12">
                                    <form action="">
                                        <div class="mb-2">
                                            <i class="badge badge-danger text-light w-100 text-center d-none" id="err-txt"></i>
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label">Username</label>
                                            <p class="text-muted">**1st letter of your first name and middle name + surname**</p>
                                            <input type="text" name="username" class="form-control">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Birthday</label>
                                            <input type="date" name="birthday" class="form-control">
                                        </div>
                                        <div class="mb-4">
                                            <button class="btn btn-secondary w-100">Reset</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-12">
                                    <div class="text-center">
                                        <p class="mb-0">Remembered password? <a href="SignIn.php" class="text-secondary">Sign In</a></p>
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
    <!-- END GLOBAL MANDATORY SCRIPTS -->
</body>
</html>

<script>
    document.querySelector('form').addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(this);
        fetch('../api/reset.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            const errText = document.getElementById('err-txt');
            if (data.status === 'success') {
                sessionStorage.setItem('phone', data.phone);
                sessionStorage.setItem('email', data.email);

                window.location.href = data.redirect;
            } else {
                errText.textContent = data.message;
                errText.classList.remove('d-none');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });

    });
</script>

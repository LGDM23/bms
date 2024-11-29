<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>BMS | Password Creation </title>
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
                                    <h2>New Password Creation</h2>
                                    <p>You may now create a new <b class="text-secondary">Password</b>.</p>
                                </div>
                                <div class="col-md-12">
                                <form action="">
                                        <div class="mb-2">
                                            <i class="badge badge-danger text-light w-100 text-center d-none" id="err-txt"></i>
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label">New Password</label>
                                            <input type="password" name="npass" id="npass" class="form-control" onkeyup="validatePassword()">
                                            <p id="validation1" class="mt-2 text-danger" hidden></p>
                                            <p id="validation2" class="mt-2 text-danger" hidden></p>
                                            <p id="validation3" class="mt-2 text-danger" hidden></p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Confirm New Password</label>
                                            <input type="password" name="cnpass" id="cnpass" class="form-control" onkeyup="matchPassword()">
                                            <p id="validation4" class="mt-2 text-danger" hidden></p>
                                        </div>
                                        <div class="mb-4">
                                            <button class="btn btn-secondary w-100">Change Password</button>
                                        </div>
                                    </form>
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
    
    const email = sessionStorage.getItem('email');
    const phone = sessionStorage.getItem('phone');
    const typez = sessionStorage.getItem('type');

    const errText = document.getElementById('err-txt');

    document.querySelector('form').addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(this);

        formData.append('type', typez);

        if(typez === "phone") {
            formData.append('match', phone);
        } else {
            formData.append('match', email);
        }

        console.log(formData.get('match'));
        console.log(formData.get('type'));
        console.log(formData.get('npass'));
        console.log(formData.get('cnpass'));

        if(matchPassword()) {

            fetch('../api/updatePassword.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                
                if (data.status === 'success') {

                    alert("Password reset Success.");

                    window.location.href = data.redirect;
                } else {
                    errText.textContent = data.message;
                    errText.classList.remove('d-none');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });

            errText.classList.add('d-none');

        } else {

            errText.textContent = "Password doesn't matched";
            errText.classList.remove('d-none');

        }

    });
    

    function validatePassword() {

        const password = document.getElementById('npass').value;
        const validationMessage1 = document.getElementById('validation1');
        const validationMessage2 = document.getElementById('validation2');
        const validationMessage3 = document.getElementById('validation3');

        const hasUpperCase = /[A-Z]/.test(password);
        const hasLowerCase = /[a-z]/.test(password);
        const isValidLength = password.length >= 8;

        if(hasUpperCase) {

            validationMessage1.hidden = false;
            validationMessage1.classList.remove('text-danger');
            validationMessage1.classList.add('text-success'); 


        } else {

            validationMessage1.hidden = false;

            validationMessage1.innerText = 'Password must contain atleast one(1) uppercase letter[A-Z]';
            validationMessage1.classList.add('text-danger');
            validationMessage1.classList.remove('text-success');


        }

        if(hasLowerCase) {
            
            validationMessage2.hidden = false;
            validationMessage2.classList.remove('text-danger');
            validationMessage2.classList.add('text-success'); 


        } else {

            validationMessage2.hidden = false;
            validationMessage2.innerText = 'Password must contain atleast one(1) lowercase letter[a-z]';
            validationMessage2.classList.add('text-danger');
            validationMessage2.classList.remove('text-success');


        }

        if(isValidLength) {
            
            validationMessage3.hidden = false;
            validationMessage3.classList.remove('text-danger');
            validationMessage3.classList.add('text-success'); 


        } else {

            validationMessage3.hidden = false;
            validationMessage3.innerText = 'Password must be at least 8 characters long.';
            validationMessage3.classList.add('text-danger');
            validationMessage3.classList.remove('text-success');


        }
    }


    function matchPassword() {

        const password = document.getElementById('npass').value;
        const cpassword = document.getElementById('cnpass').value;
        const validationMessage4 = document.getElementById('validation4');

        const matched = password === cpassword;

        if(matched) {
            
            validationMessage4.hidden = false;
            validationMessage4.innerText = 'Password Matched';
            validationMessage4.classList.remove('text-danger');
            validationMessage4.classList.add('text-success'); 

            return true;

        } else {

            validationMessage4.hidden = false;
            validationMessage4.innerText = 'Password doesn\'t match';
            validationMessage4.classList.add('text-danger');
            validationMessage4.classList.remove('text-success');

            return false;

        }
    }
    
    // sessionStorage.removeItem('phone');
    // sessionStorage.removeItem('email');

</script>

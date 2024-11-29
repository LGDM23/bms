<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>BMS | Registration </title>
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
    <!-- jQuery -->
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    
</head>
<body class="form">

    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center">
                </div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->

    <div class="auth-container d-flex">

        <div class="container mx-auto align-self-center">
    
            <div class="row">
    
                <div class="col-xxl-7 col-xl-6 col-lg-8 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
                    <div class="card mt-3 mb-3">
                        <div class="card-body">
    
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    
                                    <h2>Registration</h2>
                                    <p>Barangay Management System Resident's Registration</p>
                                    
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <p id="login-error" class="badge badge-danger w-100 p-3"></p>
                                    </div>
                                </div>
                                <form id="addUser">
                                    <div class="container col-12">
                                        <div class="row d-flex flex-md-column flex-lg-row justify-content-evenly">
                                            <div class="col-12 col-md-12 col-lg-4 mb-3">
                                                <label class="form-label">First Name<b class="text-danger">*</b></label>
                                                <input type="text" name="firstname" id="firstname" class="form-control" onkeyup=generateUsername()>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-4 mb-3">
                                                <label class="form-label">Middle Name<b class="text-danger"></b></label>
                                                <input type="text" name="middlename" id="middlename" class="form-control" onkeyup=generateUsername()>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-4 mb-3">
                                                <label class="form-label">Last Name<b class="text-danger">*</b></label>
                                                <input type="text" name="lastname" id="lastname" class="form-control" onkeyup=generateUsername()>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row d-flex flex-md-column flex-lg-row justify-content-between">
                                            <div class="col-12 col-md-12 col-lg-3 mb-3">
                                                <label class="form-label">Years in Tabuyuc<b class="text-danger">*</b></label>
                                                <input type="number" name="yrs" id="yrs" class="form-control">
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-3 mb-3">
                                                <label class="form-label">Unit<b class="text-danger">*</b></label>
                                                <select class="form-control" name="unit" id="unit">
                                                    <option value="" disabled selected>---Select Unit---</option>
                                                    <option value="Month/s">Month/s</option>
                                                    <option value="Year/s">Year/s</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6 mb-3">
                                                <label class="form-label">Residency Status<b class="text-danger">*</b></label>
                                                <select class="form-control" name="residency" id="residency">
                                                    <option value="" disabled selected>---Select Residency---</option>
                                                    <option value="Home Owner">Home Owner</option>
                                                    <option value="Tenant">Tenant</option>
                                                    <option value="Helper">Helper</option>
                                                    <option value="Construction Worker">Construction Worker</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row d-flex flex-md-column flex-lg-row justify-content-between">
                                            <div class="col-12 col-md-12 col-lg-4 mb-3">
                                                <label class="form-label">Birthday<b class="text-danger">*</b></label>
                                                <input type="date" name="birthday" id="birthday" class="form-control">
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-4 mb-3">
                                                <label class="form-label">Civil Status<b class="text-danger">*</b></label>
                                                <select class="form-control" name="civil_status" id="civil_status">
                                                    <option value="" disabled selected>---Select Civil Status---</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Separated">Separated</option>
                                                    <option value="Divorced">Divorced</option>
                                                    <option value="Widowed">Widowed</option>
                                                    <option value="Common-Law">Common-Law</option>
                                                    <option value="Annulled">Annulled</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-4 mb-3">
                                                <label class="form-label">Gender<b class="text-danger">*</b></label>
                                                <select class="form-control" name="gender" id="gender">
                                                    <option value="" disabled selected>---Select Gender---</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row d-flex flex-md-column flex-lg-row justify-content-between">
                                            <div class="col-12 col-md-12 col-lg-12 mb-3">
                                                <label class="form-label">House Number,/Lot/Block Street, Subdivision<b class="text-danger">*</b></label>
                                                <input type="text" name="house" id="house" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row d-flex flex-md-column flex-lg-row justify-content-between">
                                            <div class="col-12 col-md-12 col-lg-4 mb-3">
                                                <label class="form-label">Purok<b class="text-danger">*</b></label>
                                                <select class="form-control" name="purok" id="purok">
                                                    <option value="" disabled selected>---Select Purok---</option>
                                                    <option value="Sitio Alauli">Sitio Alauli</option>
                                                    <option value="Purok 1">Purok 1</option>
                                                    <option value="Purok 2">Purok 2</option>
                                                    <option value="Purok 3">Purok 3</option>
                                                    <option value="Purok 4">Purok 4</option>
                                                    <option value="Purok 5">Purok 5</option>
                                                    <option value="Purok 6">Purok 6</option>
                                                    <option value="Sitio Masuque">Sitio Masuque</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-4 mb-3">
                                                <label class="form-label">Bona fide Voter<b class="text-danger">*</b></label>
                                                <select class="form-control" name="voter" id="voter">
                                                    <option value="" disabled selected>---Select Option---</option>
                                                    <option value="YES">Yes</option>
                                                    <option value="NO">No</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-4 mb-3">
                                                <label class="form-label">Phone Number<b class="text-danger">*</b></label>
                                                <input type="tel" name="phone" id="phone" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container col-12">
                                        <div class="row d-flex flex-md-column flex-lg-row justify-content-evenly">
                                            <div class="col-12 col-md-12 col-lg-4 mb-3">
                                                <label class="form-label">Barangay<b class="text-danger">*</b></label>
                                                <input type="text" name="barangay" id="barangay" class="form-control text-dark" value="Tabuyuc" disabled>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-4 mb-3">
                                                <label class="form-label">Municipality<b class="text-danger"></b></label>
                                                <input type="text" name="municipality" id="municipality" class="form-control text-dark" value="Apalit" disabled>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-4 mb-3">
                                                <label class="form-label">Province<b class="text-danger">*</b></label>
                                                <input type="text" name="province" id="province" class="form-control text-dark" value="Pampanga" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row profile-image mb-3">
                                            <div class="img-uploader-content">
                                                <label for="filepond"><p>ID Upload<b class="text-danger">*</b></p></label><br>
                                                <input type="file" class="bg-dark w-100 rounded p-2" name="filepond" accept="image/png, image/jpeg, image/gif"/>
                                                <div class="text-center"><p class="text-muted mt-1"><b class="text-danger">**</b>Please upload a clear image of your Valid ID that shows your address<b class="text-danger">**</b></p></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Username(<i class="text-muted">Use this to log into your account</i>)</label>
                                                <input type="text" name="username" id="username" class="form-control text-dark" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Email Address</label>
                                                <input type="text" name="email" id="email" class="form-control text-dark">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-4">
                                                <label class="form-label">Password<b class="text-danger">*</b></label>
                                                <input type="password" name="password" id="password" class="form-control" onkeyup="validatePassword()">
                                                <p id="passwordValidation" class="mt-2 text-danger" hidden>Password must be atleast 8 characters</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                    <label for="filepond"><p>Emergency Contact Details</p></label><br>
                                        <div class="row d-flex flex-md-column flex-lg-row justify-content-between">
                                            <div class="col-12 col-md-12 col-lg-6 mb-3">
                                                <label class="form-label">Contact Person<b class="text-danger">*</b></label>
                                                <input type="text" name="ecp" id="ecp" class="form-control">
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6 mb-3">
                                                <label class="form-label">Contact Relationship<b class="text-danger">*</b></label>
                                                <input type="text" name="ecr" id="ecr" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row d-flex flex-md-column flex-lg-row justify-content-between">
                                            <div class="col-12 col-md-12 col-lg-6 mb-3">
                                                <label class="form-label">Contact Number<b class="text-danger">*</b></label>
                                                <input type="text" name="ecn" id="ecn" class="form-control">
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6 mb-3">
                                                <label class="form-label">Contact Address<b class="text-danger">*</b></label>
                                                <input type="text" name="eca" id="eca" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <div class="form-check form-check-primary form-check-inline">
                                            <input class="form-check-input me-3" type="checkbox" id="form-check-default" required>
                                            <label class="form-check-label" for="form-check-default">
                                                I hereby certify that the information above is correct
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="mb-4">
                                        <button id="registerButton" class="btn btn-secondary w-100">SIGN UP</button>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="text-center mb-1">
                                        <p class="mb-0">Already have an account? <a href="SignIn.php" class="text-success">Sign In</a></p>
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

    const birthdayInput = document.getElementById('birthday');
    const today = new Date();
    const eighteenYearsAgo = new Date(today.getFullYear() - 18, today.getMonth(), today.getDate());
    const maxDate = eighteenYearsAgo.toISOString().split('T')[0];
    birthdayInput.setAttribute('max', maxDate);

    document.addEventListener('DOMContentLoaded', function() {

        document.getElementById('addUser').addEventListener('submit', function(event) {
            
            event.preventDefault();

            const formData = new FormData(this);

            console.log(formData);
            for (const [key, value] of formData.entries()) {
                console.log(`${key}:`, value);
            }

            fetch('../api/registration_api.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    document.getElementById('login-error').textContent = data.error;
                } else {
                    console.log(data.message);
                    alert('Account created successfully. Verification is being processed. Please wait for the admin to approve your registration.');
                    window.location.href = 'SignIn.php';
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });

        });

        document.getElementById('registerButton').addEventListener('click', function() {

            if (validatePassword()) {

                document.getElementById('addUser').dispatchEvent(new Event('submit'));

            } else {

                const validationMessage = document.getElementById('login-error');
                validationMessage.innerText = 'Password must be at least 8 characters long, contain at least 1 uppercase letter, and at least 1 lowercase letter.';

            }

        });

    });

    function generateUsername() {
        const firstname = document.getElementById('firstname').value.trim();
        const middlename = document.getElementById('middlename').value.trim();
        const lastname = document.getElementById('lastname').value.trim();

        let username = '';
        if (firstname.length > 0) {
            username += firstname.charAt(0).toLowerCase();
        }
        if (middlename.length > 0) {
            username += middlename.charAt(0).toLowerCase();
        }
        if (lastname.length > 0) {
            username += lastname.replace(/\s+/g, '').toLowerCase();
        }

        document.getElementById('username').value = username;
    }

    function validatePassword() {

        const password = document.getElementById('password').value;
        const validationMessage = document.getElementById('passwordValidation');

        const hasUpperCase = /[A-Z]/.test(password);
        const hasLowerCase = /[a-z]/.test(password);
        const isValidLength = password.length >= 8;

        if (isValidLength && hasUpperCase && hasLowerCase) {

            validationMessage.hidden = true;

            return true;

        } else {
            validationMessage.hidden = false;

            validationMessage.innerText = 'Password must be at least 8 characters long, contain at least 1 uppercase letter, and at least 1 lowercase letter.';

            return false;
        }



    }

</script>

</body>
</html>
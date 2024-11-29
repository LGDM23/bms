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
                                    <h2>Send Code</h2>
                                    <p>Choose a way to recieve <b class="text-secondary">OTP</b>.</p>
                                </div>
                                <div class="col-md-12">
                                <form id="resetForm">
                                    <div class="mb-2">
                                        <i class="badge badge-danger text-light w-100 text-center d-none" id="err-txt"></i>
                                    </div>
                                    <div class="mb-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="username" id="email" value="">
                                            <label class="form-check-label" for="usernameOption1">
                                                Send code to:
                                                <span id="maskedEmail"></span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="username" id="phone" value="">
                                            <label class="form-check-label" for="usernameOption2">
                                                Send code to:
                                                <span id="maskedPhone"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <button type="submit" class="btn btn-secondary w-100">Reset</button>
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

    const email = sessionStorage.getItem('email');
    const phone = sessionStorage.getItem('phone');

    if (email) {
        document.getElementById('email').value = email;
        
        const atIndex = email.indexOf('@');
        const charsToMask = Math.floor(atIndex * 0.8);
        const emailMasked = email.substring(0, atIndex)
                            .replace(new RegExp(`.{${charsToMask}}`), '*'.repeat(charsToMask)) +
                            email.substring(atIndex);
        document.getElementById('maskedEmail').textContent = emailMasked;
    }

    if (phone) {
        document.getElementById('phone').value = phone;
        
        const phoneMasked = phone.substring(0, 7).replace(/./g, '*') + phone.substring(7);
        document.getElementById('maskedPhone').textContent = phoneMasked;
    }


    document.querySelectorAll('input[name="username"]').forEach((radio) => {
        radio.addEventListener('change', (event) => {
            console.log("Selected value:", event.target.value + " ID: "+event.target.id);
        });
    });

    document.getElementById('resetForm').addEventListener('submit', (event) => {

        event.preventDefault(); 

        const selectedValue = document.querySelector('input[name="username"]:checked')?.value;
        const selectedValueID = document.querySelector('input[name="username"]:checked')?.id;

        console.log("ID: "+ selectedValueID + " Value: "+ selectedValue);
        

        if (!selectedValue) {
            document.getElementById('err-txt').textContent = 'Please select an option to send the code to.';
            document.getElementById('err-txt').classList.remove('d-none');
            return;
        }

        const formData = new FormData();
        formData.append('sendTo', selectedValue);
        formData.append('type', selectedValueID);

        fetch('../api/generateotp.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            
            if (data.status === 'success') {

                sessionStorage.setItem('type', selectedValueID);
                window.location.href = 'otp.php';
                console.log(data.status);
                
                console.log(data.message);

            } else {

                document.getElementById('err-txt').textContent = data.message;
                document.getElementById('err-txt').classList.remove('d-none');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });

</script>

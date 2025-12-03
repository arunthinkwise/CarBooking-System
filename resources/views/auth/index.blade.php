<!DOCTYPE html>
<html lang="en">

    
<!-- Mirrored from coderthemes.com/attex/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Feb 2025 06:35:32 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Car Rental</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/carcarlogo.png">
        
        <!-- Theme Config Js -->
        <script src="assets/js/config.js"></script>

        <!-- App css -->
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    </head>
    
    <body class="authentication-bg position-relative">
        <div class="position-absolute start-0 end-0 start-0 bottom-0 w-100 h-100">
           
        </div>
        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-4 col-lg-5">
                        <div class="card">

                            <!-- Logo -->
                            <div class="card-header py-4 text-center bg-primary">
                                <a href="index.html">
                                    <span><img src="assets/images/carlogo.png" alt="logo" height="120" width="120"></span>
                                </a>
                            </div>

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <h4 class="text-dark-50 text-center pb-0 fw-bold">Sign In</h4>
                                </div>

                                <form action="{{ route('login.post') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="emailaddress" class="form-label">Email address</label>
        <input class="form-control" type="email" name="email" required placeholder="Enter your email">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <div class="input-group input-group-merge">
            <input type="password" name="password" class="form-control" placeholder="Enter your password">
        </div>
    </div>

    <div class="mb-3 text-center">
        <button class="btn btn-primary" type="submit">Log In</button>
    </div>

    @if(session('error'))
        <p class="text-danger text-center">{{ session('error') }}</p>
    @endif
</form>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <footer class="footer footer-alt fw-medium">
            <span class="bg-body"><script>document.write(new Date().getFullYear())</script> Car Rental</span>
        </footer>
        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>
        
        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

    </body>

<!-- Mirrored from coderthemes.com/attex/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Feb 2025 06:35:32 GMT -->
</html>

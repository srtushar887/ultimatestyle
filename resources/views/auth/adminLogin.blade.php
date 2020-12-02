<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from myrathemes.com/xeloro/layouts/vertical/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Aug 2020 10:34:10 GMT -->
<head>
    <meta charset="utf-8" />
    <title> Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset($gn->icon)}}">

    <!-- App css -->
    <link href="{{asset('assets/admin/')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin/')}}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin/')}}/css/theme.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

<div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center min-vh-100">
                    <div class="w-100 d-block bg-white shadow-lg rounded my-5">
                        <div class="row">
                            <div class="col-lg-5 d-none d-lg-block bg-login rounded-left"></div>
                            <div class="col-lg-7">
                                <div class="p-5">
                                    <div class="text-center mb-5">
                                        <a href="{{route('admin.login')}}" class="text-dark font-size-22 font-family-secondary">
                                            <img src="{{asset($gn->logo)}}" style="height: 100px;width: 100%">
                                        </a>
                                    </div>
                                    <h1 class="h5 mb-1">Welcome Back!</h1>
                                    <p class="text-muted mb-4">Enter your email address and password to access admin panel.</p>
                                    <form class="user" action="{{route('admin.login.submit')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" required>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-block waves-effect waves-light"> Log In </button>


                                    </form>

                                    <div class="row mt-4">
                                        <div class="col-12 text-center">
                                            <p class="text-muted mb-2"><a href="pages-recoverpw.html" class="text-muted font-weight-medium ml-1">Forgot your password?</a></p>
                                        </div> <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                </div> <!-- end .padding-5 -->
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div> <!-- end .w-100 -->
                </div> <!-- end .d-flex -->
            </div> <!-- end col-->
        </div> <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->

<!-- jQuery  -->
<script src="{{asset('assets/admin/')}}/js/jquery.min.js"></script>
<script src="{{asset('assets/admin/')}}/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/admin/')}}/js/metismenu.min.js"></script>
<script src="{{asset('assets/admin/')}}/js/waves.js"></script>
<script src="{{asset('assets/admin/')}}/js/simplebar.min.js"></script>

<!-- App js -->
<script src="{{asset('assets/admin/')}}/js/theme.js"></script>

</body>


<!-- Mirrored from myrathemes.com/xeloro/layouts/vertical/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Aug 2020 10:34:10 GMT -->
</html>

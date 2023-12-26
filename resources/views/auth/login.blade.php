<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <meta name="csrf-token" content="IeVqYCuHzHZohni1iiZceQRBsGffvNj2hCwTI586">
    <base href="../../../">
    <title>Login</title>
    <meta charset="utf-8" />
    <meta name="description"
        content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords"
        content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title"
        content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="http://erp-test.devharshinfotech.com/assets/plugins/global/plugins.bundle.css" rel="stylesheet"
        type="text/css" />


    <link href="http://erp-test.devharshinfotech.com/assets/css/style.bundle.css " rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <!--end::Global Stylesheets Bundle-->
    <style>
    .help-block-error {
        color: red;
    }
    </style>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="bg-body">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid py-10">
                <!--begin::Content-->
                <div class="d-flex flex-center flex-column flex-column-fluid">
                    <!--begin::Wrapper-->
                    <div class="w-lg-500px p-10 p-lg-15 mx-auto">


                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="text-center mb-10">
                                <!--begin::Logo-->

                                <img alt="Logo"
                                    src="http://erp-test.devharshinfotech.com/assets/media/logos/logo-2.jpg "
                                    class="h-60px" style="margin-bottom:30px" />
                                    

                                <!--end::Logo-->
                                <!--begin::Title-->
                                <h1 class="text-dark mb-3">Sign In to PMS ERP</h1>
                               
                            </div>

                            <div class="alert alert-danger alert-block" id="err_msg" style="display:none">
                                <!-- <button type="button" class="close" data-dismiss="alert">×</button> -->
                                <strong>Wrong Login Details</strong>
                            </div>

                            <!--begin::Heading-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <!--begin::Label-->
                                <label class="form-label fs-6 fw-bolder text-dark">Username</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input id="username" type="text"
                                    class="form-control form-control-lg form-control-solid @error('username') is-invalid @enderror"
                                    name="username" value="{{ old('username') }}" required autocomplete="off" autofocus>

                                <span id="emailError" style="color:red;font-size: 12px;"></span>
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <span>{{ $message }}</span>
                                </span>
                                @enderror

                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack mb-2">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                                    <!--end::Label-->
                                    <!--begin::Link-->

                                    <a href="#" class="link-primary fs-6 fw-bolder" data-toggle="modal"
                                        data-target="#forgotPasswordModal">Forgot Password ?</a>

                                    <!--end::Link-->
                                </div>

                                <!--end::Wrapper-->
                                <!--begin::Input-->
                                <input id="password" type="password"
                                    class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="current-password">

                                    <span id="passwordError" style="color:red;font-size: 12px;"></span>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <span>{{ $message }}</span>
                                </span>
                                @enderror

                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="text-center">
                                <!--begin::Submit button-->
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                                    <span class="indicator-label">Continue</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Submit button-->




                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Content-->

            </div>
            <!--end::Body-->
            <!--begin::Aside-->
            <div class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative"
                style="background-image: url('http://erp-test.devharshinfotech.com/assets/media/logos/backgroundimage.jpg');">
                <!--begin::Wrapper-->
                <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
                    <!--begin::Content-->
                    <div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20" style="margin-top:40%">
                        <!--begin::Logo-->
                        <!-- <a href="../../demo1/dist/index.html" class="py-9 mb-5">
								<img alt="Logo" src="http://erp-test.devharshinfotech.com/assets/media/logos/logo-2.jpg " class="h-60px" />
							</a> -->
                        <!--end::Logo-->
                        <!--begin::Title-->
                        <h1 class="fw-bolder fs-2qx pb-5 pb-md-10" style="color: #ffffff;">WELCOME TO PMS ERP</h1>
                        <!--end::Title-->
                        <!--begin::Description-->

                        <p class="fw-bold fs-2" style="color: #ffffff;">
                            A Gateway to<br />
                            <span >Better</span> Production Management System
                        </p>
                        <!--end::Description-->
                    </div>
                    <!--end::Content-->

                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Aside-->

        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Root-->

    <!-- Add a modal dialog to your HTML file -->
    <div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog"
        aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="forgotPasswordModalLabel">Forgot Password?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6>Please contact project co-ordinator Mr. Anil Yadav</h6>
                    <p>on <strong>+91 95610 36224</strong> or email him on <strong>it@devharshinfotech.com</strong> for
                        request to reset password.</p>
                    <form>
                        <!-- Input fields, labels, etc. -->
                        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end::Main-->
    <!--begin::Javascript-->
    <script>
    var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <!-- <script src="{{url('assets/plugins/global/plugins.bundle.js')}} "></script> -->
    <!-- <script src="{{url('assets/js/scripts.bundle.js')}}"></script> -->
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <!-- <script src="{{url('assets/js/custom/authentication/sign-in/general.js')}}"></script> -->
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script>
    $(document).ready(function () {
        var form = $('form');
        form.validate({
            rules: {
                username: {
                    required: true
                },
               
                password: {
                    required: true
                },
                
            },
            messages: {
                username: {
                    required: 'Username is required.'
                },
                password: {
                    required: 'Password is required.'
                },
               
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {

                error.appendTo(element.next('span'));
            },
            submitHandler: function (form) {
                
                form.submit();
            }
        });

    });
      
</script>
</body>

</html>
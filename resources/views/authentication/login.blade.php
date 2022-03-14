<!DOCTYPE html>
<html lang="en">
<head>
    <title>Leadsy</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="Leadsy"/>
    <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.png')}}"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>

</head>
<body id="kt_body" class="bg-body">
<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(assets/media/illustrations/sigma-1/14.png">
        <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
            <a href="#" class="mb-12">
                <img alt="Logo" src="{{asset('assets/media/logos/logo.png')}}" class="h-60px"/>
            </a>
            <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                <!--begin::Form-->
                <form class="form w-100" autocomplete id="kt_sign_in_form" action="" method="POST">
                    @csrf
                    <div class="text-center mb-10">
                        <h1 class="text-dark mb-3">Sign In to Leadsy</h1>
                        {{--<div class="text-gray-400 fw-bold fs-4">New Here?
                            <a href="/metronic8/demo9/../demo9/authentication/layouts/basic/sign-up.html" class="link-primary fw-bolder">Create
                                an Account</a></div>--}}
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="fv-row mb-10">
                        <label class="form-label fs-6 fw-bolder text-dark">Username</label>
                        <input class="form-control form-control-lg form-control-solid" type="text" name="email"/>
                    </div>
                    <div class="fv-row mb-10">
                        <div class="d-flex flex-stack mb-2">
                            <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                            <a href="#" class="link-primary fs-6 fw-bolder">Forgot
                                Password ?</a>
                        </div>
                        <input class="form-control form-control-lg form-control-solid" type="password" name="password"/>
                    </div>
                    <div class="text-center">
                        <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-purple text-white w-100 mb-5">
                            <span class="indicator-label">Continue</span>
                            <span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="d-flex flex-center flex-column-auto p-10">
            <div class="d-flex align-items-center fw-bold fs-6">
                <a href="https://leadsy.pro" class="text-muted text-hover-primary px-2">About</a>
                <a href="#" class="text-muted text-hover-primary px-2">Contact Us</a>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
</body>
</html>

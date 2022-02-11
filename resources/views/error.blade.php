<html lang="en">
<!--begin::Head-->
<head>
    <title>Error | Leadsy </title>
    <meta charset="utf-8" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}" />
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="auth-bg">
<!--Begin::Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!--End::Google Tag Manager (noscript) -->
<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-column flex-center flex-column-fluid p-10">
        <img src="{{asset('assets/media/illustrations/sigma-1/18.png')}}" alt="" class="mw-100 mb-10 h-lg-450px" />
        <h1 class="fw-bold mb-10" style="color: #A3A3C7">Seems there is nothing here</h1>
        <a href="{{ auth()->user()->getAccountName().'/dashboard' }}" class="btn btn-primary">Return Home</a>
    </div>
</div>
</body>
</html>

<h1 class="d-flex flex-column text-dark fw-bolder my-1">
    <span class="text-white fs-1">@yield('pageTitle')</span>
    <small class="text-gray-600 fs-6 fw-normal pt-2">@yield('pageDescription')</small>
    <ul class="breadcrumb breadcrumb-line fw-bold fs-7 my-2">
        <li class="breadcrumb-item text-gray-600">
            <a href="dashboard" class="text-gray-600">Home</a>
        </li>
        <li class="breadcrumb-item text-gray-600">@yield('pageTitle')</li>
    </ul>
</h1>

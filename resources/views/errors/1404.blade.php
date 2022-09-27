<!DOCTYPE html>
<html lang="en" class="light-style " dir="ltr" data-theme="theme-default" data-assets-path="admin/asset/"
    data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <title>404 NOT FOUND!</title>
    <meta name="description" content="" />
    <meta name="keywords" content="">

    <!-- laravel CRUD token -->
    <meta name="csrf-token" content="❴❴ csrf_token() ❵❵">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="❴❴ asset('assets/img/favicon/favicon.ico') ❵❵" />

    <!-- Include Styles -->
    @include('admin.layouts.sections.styles')

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
    <!-- Include Scripts for customizer, helper, analytics, config -->
    @include('admin.layouts.sections.scriptsIncludes')
    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="/admin/asset/vendor/css/pages/page-misc.css">

</head>

<body>

    <!-- Content -->

    <!-- Error -->
    <div class="container-xxl container-p-y">
        <div class="misc-wrapper">
            <h2 class="mb-2 mx-2">Page Not Found :(</h2>
            <p class="mb-4 mx-2">Oops! 😖 The requested URL was not found on this server.</p>
            <a href="{{ route('dashboard.home') }}" class="btn btn-success">Back to home</a>
            <div class="mt-3">
                <img src="/admin/asset/img/illustrations/page-misc-error-light.png" height="450" width="500" class="">
            </div>
        </div>
    </div>
    <!-- /Error -->

    <!-- / Content -->
    <!-- Include Scripts -->
    @include('admin.layouts.sections.scripts')


</body>

</html>

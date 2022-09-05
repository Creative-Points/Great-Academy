<!DOCTYPE html>

<html lang="{{ session()->get('locale') ?? app()->getLocale() }} " class="light-style" dir="rtl"
    data-theme="theme-default" data-assets-path="{{ asset('admin/asset/') }}/" data-template="vertical-menu-template" data-framework="laravel">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <title>@yield('title')</title>
    <meta name="description" content="" />
    <meta name="keywords" content="">
    
    <!-- laravel CRUD token -->
    <meta name="csrf-token" content="❴❴ csrf_token() ❵❵">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="❴❴ asset('assets/img/favicon/favicon.ico') ❵❵" />

    <!-- Include Styles -->
    @include('admin.layouts.sections.styles')

    <!-- Include Scripts for customizer, helper, analytics, config -->
    @include('admin.layouts.sections.scriptsIncludes')
</head>

<body>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            @include('admin.layouts.sections.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                @include('admin.layouts.sections.nav')

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        {{$slot}}
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    @include('admin.layouts.sections.footer')
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>


    <!-- Include Scripts -->
    @include('admin.layouts.sections.scripts')

</body>

</html>

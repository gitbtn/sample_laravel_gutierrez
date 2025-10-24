<!DOCTYPE html>
<html lang="en">
@include('partials.header')

<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary app-loaded"><div class="skip-links"><a href="#main" class="skip-link">Skip to main content</a><a href="#navigation" class="skip-link">Skip to navigation</a></div>
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        {{--@include('partials.nav')--}}
         @include('layouts.navigation')

        @include('partials.sidebar')

        @yield('content')
        @include('partials.footer')
    </div>

</body>
</html>

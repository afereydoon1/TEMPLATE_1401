<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.head-tag')
    <title>@yield('head-tag')</title>
</head>

<body dir="rtl">

@include('admin.layouts.header')

<section class="body-container">
    @include('admin.layouts.sidebar')

    <section id="main-body" class="main-body">

        @yield('content')

    </section>

</section>

@include('admin.layouts.scripts')
@yield('script')

<section class="toast-wrapper flex-row-reverse">
@include('alerts.toast.error')
@include('alerts.toast.success')
</section>

@include('alerts.sweetalert.success')
@include('alerts.sweetalert.error')

</body>
</html>

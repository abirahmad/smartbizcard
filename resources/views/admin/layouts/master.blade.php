<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>

    @include('admin.layouts.partials.css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        @include('admin.layouts.partials.header')

        @include('admin.layouts.partials.sidebar')

        @yield('content')
        
        @include('admin.layouts.partials.footer')
    </div>
    <!-- ./wrapper -->
    @include('admin.layouts.partials.scripts')
</body>

</html>

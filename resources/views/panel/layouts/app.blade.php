<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <title>Jury|Management System </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Jury Management SYstem" name="description" />
    <meta content="Jury Management SYstem" name="author" />

    <!-- jquery.vectormap css -->
    <link href="{{ url('') }}/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css"
        rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/js/dataTables.js">
    <link href="{{ url('') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('') }}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ url('') }}/assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ url('') }}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ url('') }}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('') }}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
    <!-- Icons Css -->
    <link href="{{ url('') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ url('') }}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link href="{{ url('') }}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body data-topbar="dark">
    <div id="layout-wrapper">

        @include('panel.layouts.header')
        @include('panel.layouts.sidebar')

        <main>
            <div class="main-content">
                @yield('content')
            </div>
        </main>
    </div>




    @include('panel.layouts.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ url('') }}/assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ url('') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('') }}/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ url('') }}/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ url('') }}/assets/libs/node-waves/waves.min.js"></script>


    <!-- apexcharts -->
    <script src="{{ url('') }}/assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- jquery.vectormap map -->
    <script src="{{ url('') }}/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="{{ url('') }}/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js">
    </script>

    <!-- Required datatable js -->
    <script src="{{ url('') }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ url('') }}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>


    <!-- Responsive examples -->
    <script src="{{ url('') }}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ url('') }}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <script src="{{ url('') }}/assets/js/pages/dashboard.init.js"></script>

    <script src="{{ url('') }}/assets/js/app.js"></script>
    @yield('script')

</body>

</html>

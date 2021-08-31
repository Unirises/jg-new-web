<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | JG Express</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}">
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&libraries=places"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.css">
    @include('layouts.head-css')
</head>

@section('body')

<body data-sidebar="dark">
    @show
    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('layouts.topbar')
        @include('layouts.sidebar')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            @include('layouts.footer')
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    @include('layouts.right-sidebar')
    <!-- /Right-bar -->

    <!-- JAVASCRIPT -->
    @include('layouts.vendor-scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.js" async defer></script>
    <script>
        $(document).ready(function() {
            $('#table thead tr').clone(true).appendTo('#table thead');
            $('#table thead tr:eq(1) th').each(function(i) {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Search ' + title + '" />');

                $('input', this).on('keyup change', function() {
                    if (table.column(i).search() !== this.value) {
                        table
                            .column(i)
                            .search(this.value)
                            .draw();
                    }
                });
            });
            var table = $('#table').DataTable({
                orderCellsTop: true,
                fixedHeader: true
            });
        });
    </script>
</body>

</html>
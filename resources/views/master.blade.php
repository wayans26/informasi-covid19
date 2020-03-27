<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Covid19</title>
    <!--favicon-->
    <link rel="icon" href="{{ asset('admin/images/favicon.ico') }}" type="image/x-icon">
    <!-- simplebar CSS-->
    <link href="{{ asset('admin/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="{{ asset('admin/css/animate.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="{{ asset('admin/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <!-- Sidebar CSS-->
    <link href="{{ asset('admin/css/sidebar-menu.css') }}" rel="stylesheet" />
    <!-- Custom Style-->
    <link href="{{ asset('admin/css/app-style.css') }}" rel="stylesheet" />


    {{-- ============================Java Script ====================== --}}
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>

    <!-- simplebar js -->
    <script src="{{ asset('admin/plugins/simplebar/js/simplebar.js') }}"></script>
    <!-- waves effect js -->
    <script src="{{ asset('admin/js/waves.js') }}"></script>
    <!-- sidebar-menu js -->
    <script src="{{ asset('admin/js/sidebar-menu.js') }}"></script>
    <!-- Custom scripts -->
    <script src="{{ asset('admin/js/app-script.js') }}"></script>
    <!-- Chart js -->
    <script src="{{ asset('admin/plugins/Chart.js/Chart.min.js') }}"></script>
    <!--Peity Chart -->
    <script src="{{ asset('admin/plugins/peity/jquery.peity.min.js') }}"></script>


</head>

<body>

    <!-- Start wrapper-->
    <div id="wrapper">

        <div class="clearfix"></div>

        <div class="">
            <div class="container-fluid">

                @section('konten')

                @show

            </div>
            <!-- End container-fluid-->
        </div>
        <!--End content-wrapper-->
        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->

        <!--Start footer-->
        <footer class="footer">
            <div class="container">
                <div class="text-center">
                    Copyright © <script>
                        document.write(new Date().getFullYear())

                    </script> Wayan Setiawan
                </div>
            </div>
        </footer>
        <!--End footer-->
    </div>
    <!--End wrapper-->
</body>

</html>

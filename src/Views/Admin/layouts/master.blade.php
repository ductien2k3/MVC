@include('layouts.header')
<title>@yield('title') - ZenBlog</title>



<!-- Main Content -->
<div id="content">

    @yield('content')

</div>
<!-- End of Main Content -->

<!-- Footer -->
@include('layouts.footer')
<!-- End of Footer -->


<!-- Bootstrap core JavaScript-->
<script src="/assets/admin/vendor/jquery/jquery.min.js"></script>
<script src="/assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="/assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="/assets/admin/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="/assets/admin/vendor/chart.js/Chart.min.js"></script>
<script src="/assets/admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="/assets/admin/js/demo/chart-area-demo.js"></script>
<script src="/assets/admin/js/demo/chart-pie-demo.js"></script>
<script src="/assets/admin/js/demo/datatables-demo.js"></script>

</body>

</html>

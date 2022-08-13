<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{$tittle}}</title>

    <!-- Custom fonts for this template-->
    <link href="/assets/template_dash/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/assets/template_dash/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <!-- My Css -->
    <link rel="stylesheet" href="/assets/template_dash/admin.css">

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
                <div class="sidebar-brand-icon  ">
                    <img src="{{ url($data_user['user']->image) }}" alt="Admin" width="60" height="60">
                </div>
                <div class="sidebar-brand-text mx-3">{{$data_user['user']->name}}</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('admin') }}">
                    <i class="fas fa-home"></i>
                    <span>Home</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Fitur Admin
            </div>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - lihat Data Pengunjung -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/category/') }}">
                    <i class="bi bi-bookmarks"></i>
                    <!-- Kelulusan -->
                    <span>Category</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/slider/') }}">
                    <i class="bi bi-sliders"></i>
                    <span>Slider</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/post/') }}">
                    <i class="bi bi-file-post"></i>
                    <span>Post</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/mainmenu/') }}">
                    <i class="bi bi-menu-app"></i>
                    <span>Main Menu</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/message/') }}">
                    <i class="bi bi-chat-square-text"></i>
                    <span>Massage</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/post_comment') }}">
                    <i class="bi bi-chat-square-text"></i>
                    <span>Post Comment</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/profil/'. session('admin_id')) }}">
                    <i class="fas fa-user"></i>
                    <span>Profil</span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Nav Item - Logout -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('logout')}}">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>LogOut</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <div class="my-4"></div>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4"></div>
                    <!-- Content Row -->
                    @yield('content')
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Muhammad Dwi Cahyono <?= date('Y'); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="/assets/template_dash/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/template_dash/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/assets/template_dash/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/assets/template_dash/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/assets/template_dash/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/assets/template_dash/js/demo/chart-area-demo.js"></script>
    <script src="/assets/template_dash/js/demo/chart-pie-demo.js"></script>

    @yield('js')
    <!-- preview Gambar -->
    <script>
        function priviewImage() {
            const sampul = document.querySelector('#image'); //ambil nama id dari input file
            const sampulLabel = document.querySelector('.custom-file-label'); //ambil nama label dari input file
            const imgPriview = document.querySelector('.img-priview'); //ambil nama class image dari foto yang ada di form create


            sampulLabel.textContent = sampul.files[0].name;

            const fileSampul = new FileReader();
            fileSampul.readAsDataURL(sampul.files[0]);

            fileSampul.onload = function(e) {
                imgPriview.src = e.target.result;
            }
        }
    </script>
</body>

</html>
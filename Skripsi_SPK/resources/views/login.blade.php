<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="/css/admin.css">

</head>

<body class="bg-gradient-dark">

    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center mt-3">
            <div class="col-lg-5">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="/assets/logo.png" alt="Logo-Pemerintah" width="200" height="220" class="mb-4">
                                        <h1 class="h4 mb-4">Login Admin Pemerintahan Desa GampangSejati</h1>
                                    </div>
                                    @if (Session::has('pesan'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ Session::get('pesan') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                    @if (Session::has('status'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ Session::get('status') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                    <hr>

                                    <form class="user" action="{{ url('login') }}" method="POST">
                                        @csrf
                                        <div class="input-group flex-nowrap">
                                            <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan Email ..." autofocus>
                                        </div>
                                        <div class="input-group flex-nowrap mt-3">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukkan Password ...">
                                        </div>
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-primary btn-block mb-5 mt-3">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/assets/js/demo/chart-area-demo.js"></script>
    <script src="/assets/js/demo/chart-pie-demo.js"></script>

</body>

</html>
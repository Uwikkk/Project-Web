<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="/assets/login_register/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <!-- Main css -->
    <link rel="stylesheet" href="/assets/login_register/css/style.css">
</head>

<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <div class="col-md">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach()
                                </ul>
                            </div>
                            @endif
                            @if (Session::has('status'))
                            <div class="alert alert-warning">
                                {{ Session::get('status') }}
                            </div>
                            @endif
                        </div>
                        <form action="{{ url('register') }}" method="post" class="register-form" id="register-form" enctype="multipart/form-data">
                            <h2 class="form-title">Registrasi</h2>
                            @csrf
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" />
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <label for="image"><i class="zmdi zmdi-image"></i></label>
                                <input type="file" class="form-control-file" name="image" id="image">
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="submit" class="form-submit" value="Register">
                                <a href="login" id="login" class="form-submit bg-danger">Login</a>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="/assets/login_register/images/signup-image.jpg" alt="sing up image"></figure>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="/assets/login_register/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/login_register/js/main.js"></script>
</body>

</html>
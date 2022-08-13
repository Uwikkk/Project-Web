<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="/assets/login_register/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <!-- Main css -->
    <link rel="stylesheet" href="/assets/login_register/css/style.css">
</head>

<body>
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="/assets/login_register/images/signin-image.jpg" alt="sing up image"></figure>
                </div>
                <div class="signin-form">
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
                    <form action="{{ url('login') }}" method="post" class="register-form" id="login-form">
                        @csrf
                        <h2 class="form-title">Login</h2>
                        <div class="form-group">
                            <label for="email" class="float-right"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Your Email" required />
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" id="password" placeholder="Password" required />
                            <label for="password"><i class="zmdi zmdi-lock"></i></label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="submit" class="form-submit" value="Log in" />
                            <a href="register" id="register" class="form-submit bg-danger">Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- JS -->
    <script src="/assets/login_register/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/login_register/js/main.js"></script>
</body>

</html>
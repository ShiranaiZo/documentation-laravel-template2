<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Mazer</title>

    {{-- CSS Styles --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('node_modules/bootstrap-social/bootstrap-social.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/dripicons/webfont.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/dripicons.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand text-center mb-4">
                            <img src="assets/images/faces/5.jpg" alt="logo" width="100" class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary shadow-sm border-top border-primary border-2">
                            <div class="card-header"><h4>Login</h4></div>

                            <div class="card-body">
                                @if ( session('error'))
                                    <div class="alert alert-danger alert-dismissible show fade">
                                        <div class="float-starts" style="width: 90%">
                                            <i class="bi bi-file-excel"></i> {{ session('error') }}
                                        </div>

                                        <div class="float-end" style="width: 10%">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>
                                @endif

                                <form method="POST" action="{{ url('login') }}" class="needs-validation" novalidate="">
                                    @csrf

                                    <div class="form-group mb-3">
                                        <label for="username">Username</label>

                                        <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus autocomplete="off" placeholder="Username">

                                        <div class="invalid-feedback invalid-username">
                                            Please fill in your username
                                        </div>
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="password">Password</label>

                                        <input id="password" type="password" class="form-control" name="password" tabindex="2" required autofocus autocomplete="off" placeholder="Password">

                                        <div class="invalid-feedback invalid-password">
                                            Please fill in your password
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">

                                            <label class="custom-control-label" for="remember-me">Remember Me</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="simple-footer">
                            <div class="d-flex justify-content-between">
                                <span>Copyright &copy; Stisla 2018</span>

                                <span>Modified by <a href="https://www.instagram.com/yt_depeloper/">Yuta</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- JS Scripts -->
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/js/stisla.js') }}"></script>

    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>


    <!-- Page Specific JS File -->
    <script>
        $(document).ready(function () {
			$("#username").keyup(function() {
                var username = $(this).val();
                    username = $.trim(username);

                $(this).val(username);
            });

			$("#password").keyup(function() {
                var password = $(this).val();
                    password = $.trim(password);

                $(this).val(password);
            });
		});
    </script>
</body>
</html>

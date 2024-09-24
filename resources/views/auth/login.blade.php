<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Jury Management System</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="{{ url('') }}/assets/img/logo.png" rel="icon">
    <link href="{{ url('') }}/assets/img/logo.png" rel="logo">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link href="{{ url('') }}/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ url('') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('') }}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ url('') }}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link href="{{ url('') }}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
</head>

<body>

    <main class="login-page">
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                        <p class="text-center small">please Enter your Email & password to login</p>
                                    </div>
                                    @include('_message')

                                    <form class="row g-3" action="" method="post">
                                        {{ csrf_field() }}

                                        <div class="col-12">
                                            <label for="yourEmail" class="form-label">Email</label>
                                            <div class="input-group ">
                                                <input type="text" name="email" class="form-control" id="yourEmail"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                id="yourPassword" required>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="rememberMe">
                                                <label class="form-check-label" for="rememberMe">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Login</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main>


    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>

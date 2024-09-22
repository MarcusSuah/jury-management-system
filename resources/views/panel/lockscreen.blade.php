<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Jury | Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Jury Management SYstem" name="description" />
    <meta content="Jury Management SYstem" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" class="favicon" href="{{ url('') }}/assets/images/logo.png">

    <!-- Bootstrap Css -->
    <link href="{{ url('') }}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ url('') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ url('') }}/assets/css/style.css" id="app-style" rel="stylesheet" type="text/css" />
    @vite('resources/css/app.css')

</head>

<body class="auth-body-bg">
    <div class="bg-overlay"></div>
    <div class="wrapper-page">
        <main class="login-page">
            <div class="container-fluid p-0">
                <div class="cards">
                    <div class="card-body">
                        <div class="p-3">
                            @include('_message')
                            <form class="form-horizontal mt-3" action="" method="post">
                                {{ csrf_field() }}

                                <div class="text-center mb-4">
                                    <img src="{{ url('') }}/assets/images/logo.jpeg"
                                        class="rounded-circle avatar-lg img-thumbnail" width="85px" alt="thumbnail">
                                </div>
                                <div class="col-12">
                                    <label for="yourPassword" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="yourPassword"
                                        required>
                                </div>
                                <div class="col-12 mt-3">
                                    <button class="btn btn-info w-100 waves-effect waves-light"
                                        type="submit">Login</button>
                                </div>

                                <div class="form-group mt-4 mb-0 row">
                                    <div class="col-12 text-center">
                                        <a href="{{ url('panel/homepage') }}" class="text text-primary">Not you?</a>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
        </main>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ url('') }}/assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ url('') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('') }}/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ url('') }}/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ url('') }}/assets/libs/node-waves/waves.min.js"></script>

    <script src="{{ url('') }}/assets/js/app.js"></script>

</body>

</html>

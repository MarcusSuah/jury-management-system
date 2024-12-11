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
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

    <main class="login-page">
        <div class="container">

            <section class="min-vh-100">
                <div class="container py-5">

                    <div class="row d-flex justify-content-center">
                        <div class="col-md-10 col-lg-8 col-xl-6">

                            <div class="card" id="chat2">
                                <div class="card-header d-flex justify-content-between align-items-center p-3">
                                    <h5 class="mb-0">AI Chatbot </h5>
                                    <a href="{{ url('/') }}" data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-primary btn-sm" data-mdb-ripple-color="dark">Go to Home</a>
                                </div>
                                <div class="card-body" data-mdb-perfect-scrollbar-init
                                    style="position: relative; height: 400px">

                                    <div class="d-flex flex-row justify-content-start">
                                        <div>
                                            <p class="small p-2 ms-3 mb-1 rounded-3 bg-body-tertiary" id="response">
                                            </p>
                                        </div>
                                    </div>



                                </div>
                                <form class="col-12" method="post">
                                    <div
                                        class="card-footer text-muted d-flex justify-content-start align-items-center p-3">

                                        <textarea name="message" id="message" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Enter your message" required></textarea>
                                        <button class="btn btn-primary ms-3" id="form-btn"><i
                                                class="fas fa-paper-plane"></i></button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </section>

        </div>
    </main>

</body>

</html>
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("form").submit(function(e) {
                e.preventDefault();
                $('#form-btn').addClass('disabled');
                $('#response').text('Processsing...');
                var token = $('meta[name="csrf-token"]').attr('content');
                var message = $('#message').val();

                $.ajax({
                    type: 'POST',
                    url: "/chat-message",
                    data: {
                        _token: token,
                        message: message
                    },
                    success: function(data) {
                        var parsedJson = jQuery.parseJSON(data);

                        if (typeof parsedJson.msg != 'undefined') {
                            $('#response').text(parsedJson.msg);
                            $('#form-btn').removeClass('disabled');
                        }
                    }
                });

            });

        });
    </script>

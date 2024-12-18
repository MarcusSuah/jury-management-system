<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Jury Management System | AI-Featured</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicon -->
    <link href="assets/images/favicon.icon" rel="icon">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Recursive:wght@300..1000&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="{{ url('') }}/assets/libs/animate/animate.min.css" rel="stylesheet">
    <link href="{{ url('') }}/assets/libs/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ url('') }}/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="{{ url('') }}/assets/css/homepage.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            background-color: #0A415D;
            color: white;
            font-family: Arial, sans-serif;
        }

        .hero-section {
            padding: 80px 0;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: left;
        }

        .hero-section img {
            max-width: 100%;
            border-radius: 15px;
        }

        .hero-text {
            margin-left: 40px;
        }

        .hero-text h1 {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .hero-text p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .features-list {
            list-style: none;
            padding-left: 0;
        }

        .features-list li {
            font-size: 1.1rem;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .features-list li::before {
            content: '\2713';
            color: #A3F7FF;
            margin-right: 10px;
            font-weight: bold;
        }

        .contact-link {
            color: #033438;
            font-weight: bold;
            text-decoration: none;
        }

        .contact-link:hover {
            text-decoration: underline;
        }

        .ai-chat {
            position: fixed;
            display: inline;
            right: 45px;
            bottom: 45px;
            z-index: 99;
        }

        .chat-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }

        .chat-box {
            position: fixed;
            bottom: 80px;
            right: 20px;
            width: 300px;
            max-width: 90%;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: none;
            flex-direction: column;
        }

        .chat-header {
            padding: 10px;
            background-color: #007bff;
            color: white;
            border-radius: 10px 10px 0 0;
            font-weight: bold;
            text-align: center;
        }

        .chat-body {
            padding: 10px;
            overflow-y: auto;
            height: 200px;
        }

        .chat-footer {
            padding: 10px;
            border-top: 1px solid #ddd;
        }

        #request>span {
            width: fit-content;
            float: right;
        }

        .form-label {
            color: black;
        }
    </style>
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark p-0">
                <a href="#" class="navbar-brand">
                    <h1 class="text-white">JMS<span class="text-dark">|</span>AI-Featured</h1>
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="#home" class="nav-item nav-link active">Home</a>
                        <a href="#about" class="nav-item nav-link">About</a>
                        <a href="#service" class="nav-item nav-link">Services</a>
                        <a href="{{ route('ai-chatbot') }}" class="nav-item nav-link">AI Chatbot</a>
                        @if (Auth::check())
                            <button type="button" class="btn text-white bg-dark pd-0 d-lg-block rounded-pill "><a
                                    href="{{ url('/panel/dashboard') }}" class="nav-item">My Account</a></button>
                        @else
                            <div class="dropdown show">
                                <a href="#" id="dropdownMenuLink"
                                    class="nav-item nav-link dropdown-toggle">Register</a>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ url('register-jury') }}">Register as Jury</a>
                                    <a class="dropdown-item" href="{{ url('register-judge') }}">Register as Judge</a>
                                </div>
                            </div>
                            <button type="button" class="btn text-white bg-dark pd-0 d-lg-block rounded-pill "><a
                                    href="{{ url('/login') }}" class="nav-item">Login</a></button>
                        @endif
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->
    <main class="login-page">
        <div class="container">

            <section class="min-vh-100">
                <div class="container py-5">

                    <div class="row d-flex justify-content-center">
                        <div class="col-md-10 col-lg-8 col-xl-6">

                            <div class="card" id="chat2">
                                <div class="container z-3">
                                    <div class="row">
                                        <div class="card mx-auto p-2 z-3" style="width: 600px;">
                                            <div class="card-body">
                                                <h1 class="card-title text-center py-lg-4">Judge Registration Form</h1>
                                                @include('_message')
                                                <form class="row g-3" action="" method="post">
                                                    {{ csrf_field() }}
                                                    <div class="col-md-12 mb-3">
                                                        <label for="name" class="form-label">Full Name</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ old('name') }}" name="name" required>
                                                        @if ($errors->has('name'))
                                                            <span class="help-block text-danger">
                                                                <strong>{{ $errors->first('name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label for="inputState" class="form-label">Gender</label>
                                                        <select id="inputState" class="form-select" name="gender">
                                                            @if (old('gender') && old('gender') == 'Male')
                                                                <option value="{{ old('gender') }}" selected>Male
                                                                </option>
                                                                <option value="Female">Female</option>
                                                            @elseif(old('gender') && old('gender') == 'Female')
                                                                <option value="{{ old('gender') }}" selected>Female
                                                                </option>
                                                                <option value="Male">Male</option>
                                                            @else
                                                                <option value="">Please Select Gender</option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                            @endif
                                                        </select>
                                                        @if ($errors->has('gender'))
                                                            <span class="help-block text-danger">
                                                                <strong>{{ $errors->first('gender') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="dob" class="form-label">Date of Birth</label>
                                                        <input type="date" class="form-control"
                                                            value="{{ old('dob') }}" name="dob" required>
                                                        @if ($errors->has('dob'))
                                                            <span class="help-block text-danger">
                                                                <strong>{{ $errors->first('dob') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="inputNationality"
                                                            class="form-label">Nationality</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ old('country') }}" name="country" required>
                                                        @if ($errors->has('country'))
                                                            <span class="help-block text-danger">
                                                                <strong>{{ $errors->first('country') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="inputCity" class="form-label">City</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ old('city') }}" name="city" required>
                                                        @if ($errors->has('city'))
                                                            <span class="help-block text-danger">
                                                                <strong>{{ $errors->first('city') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="phone" class="form-label">Phone</label>
                                                        <input type="tel" class="form-control"
                                                            value="{{ old('contact') }}" name="contact" required>
                                                        @if ($errors->has('contact'))
                                                            <span class="help-block text-danger">
                                                                <strong>{{ $errors->first('contact') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="address" class="form-label">Address</label>
                                                        <textarea class="form-control" value="{{ old('address') }}" name="address" rows="3" required>{{ old('address') }}</textarea>
                                                        @if ($errors->has('address'))
                                                            <span class="help-block text-danger">
                                                                <strong>{{ $errors->first('address') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="specialization"
                                                            class="form-label">Specialization</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ old('specialization') }}"
                                                            name="specialization">
                                                        @if ($errors->has('specialization'))
                                                            <span class="help-block text-danger">
                                                                <strong>{{ $errors->first('specialization') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="years-experience" class="form-label">Years of
                                                            Experience</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ old('yr_exp') }}" name="yr_exp" required>
                                                        @if ($errors->has('yr_exp'))
                                                            <span class="help-block text-danger">
                                                                <strong>{{ $errors->first('yr_exp') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="email" class="form-control"
                                                            value="{{ old('email') }}" name="email" required>
                                                        @if ($errors->has('email'))
                                                            <span class="help-block text-danger">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">Password</label>
                                                        <input type="password" class="form-control" name="password"
                                                            min-length="6" max-length="30" required>
                                                    </div>

                                                    <div class="mb-2">
                                                        <button type="submit"
                                                            class="btn btn-primary col-md-3 mb-2">Submit</button>
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
            </section>

        </div>
    </main>

</body>

</html>

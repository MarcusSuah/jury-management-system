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
    @vite('resources/css/app.css')

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
    </style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


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
                        @if(Auth::check())
                            <button type="button" class="btn text-white bg-dark pd-0 d-lg-block rounded-pill "><a
                                href="{{ url('/panel/dashboard') }}" class="nav-item">My Account</a></button>
                        @else
                            <button type="button" class="btn text-white bg-dark pd-0 d-lg-block rounded-pill "><a
                        href="{{ url('/login') }}" class="nav-item">Login</a></button>
                        @endif
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header mb-5">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <div class="btn btn-sm border rounded-pill text-white px-3 mb-3 animated slideInRight">JMS</div>
                    <h1 class="display-4 text-white mb-4 animated slideInRight">Welcome to the Future of Jury
                        Management.</h1>
                    <p class="text-white mb-4 animated slideInRight fs-4 text-justify">Experience the next generation of
                        jury management with our cutting-edge AI technologies, designed to streamline and optimize every
                        aspect of the jury process.</p>
                    <a href="" class="btn btn-light py-sm-3 px-sm-5 rounded-pill me-3 animated slideInRight">Read
                        More</a>
                    <a href="#contact"
                        class="btn btn-outline-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">Contact
                        Us</a>
                </div>
                <div class="col-lg-6 align-self-end text-center text-lg-end">
                    <img class="img-fluid" src="{{ url('') }}/assets/images/hero-img.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(20, 24, 62, 0.7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn btn-square bg-white btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-light p-3"
                            placeholder="Type search keyword">
                        <button class="btn btn-light px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img">
                        <img class="img-fluid" src="{{ url('') }}/assets/images/jury.jpeg">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3"><a href="#about"></a>About Us
                    </div>
                    <h1 class="mb-4">Jury Panel Management</h1>
                    <p class="mb-4">Optimize and manage your jury panels with our advanced AI features.</p>
                    <p class="mb-4">To transform your jury management process with our advanced AI features, Contact
                        us
                        to learn more.</p>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Efficient Assignments</h6>
                            <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>Optimized Pools</h6>
                        </div>
                        <div class="col-sm-6">
                            <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>24/7 Support</h6>
                            <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>AI Assistance</h6>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mt-4">
                        <a class="btn btn-primary rounded-pill px-4 me-3" href="">Read More</a>
                        <a class="btn btn-outline-primary btn-square me-3" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-primary btn-square me-3" href=""><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-primary btn-square me-3" href=""><i
                                class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-primary btn-square" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Service Start -->
    <div class="container-fluid bg-light mt-5 py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3 fs-3">Our Services</div>
                    <h1 class="mb-4">Our Excellent AI Solutions for Jury Selection</h1>
                    <p class="mb-4 text-dark">The AI Jury Management System has revolutionized our jury selection
                        process. The
                        efficiency and accuracy are unparalleled.</p>
                    <a class="btn btn-primary rounded-pill px-4" href="">Read More</a>
                </div>
                <div class="col-lg-7">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="row g-4">
                                <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                                    <div
                                        class="service-item d-flex flex-column justify-content-center text-center rounded">
                                        <div class="service-icon btn-square">
                                            <i class="fa-solid fa-vr-cardboard fa-4x"></i>
                                        </div>
                                        <h5 class="mb-3">Virtual Assistants</h5>
                                        <p>Machine learning algorithms to enhance decision-making and accuracy.</p>
                                        <a class="btn px-3 mt-auto mx-auto" href="">Read More</a>
                                    </div>
                                </div>
                                <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                                    <div
                                        class="service-item d-flex flex-column justify-content-center text-center rounded">
                                        <div class="service-icon btn-square">
                                            <i class="fa fa-robot fa-4x"></i>
                                        </div>
                                        <h5 class="mb-3">Machine learning</h5>
                                        <p>Machine learning algorithms to enhance decision-making and accuracy.</p>
                                        <a class="btn px-3 mt-auto mx-auto" href="">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 pt-md-4">
                            <div class="row g-4">
                                <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                                    <div
                                        class="service-item d-flex flex-column justify-content-center text-center rounded">
                                        <div class="service-icon btn-square">
                                            <i class="fa fa-brain fa-4x"></i>
                                        </div>
                                        <h5 class="mb-3">Natural Language Processing</h5>
                                        <p>Utilize NLP to understand and process juror information efficiently.</p>
                                        <a class="btn px-3 mt-auto mx-auto" href="">Read More</a>
                                    </div>
                                </div>
                                <div class="col-12 wow fadeIn" data-wow-delay="0.7s">
                                    <div
                                        class="service-item d-flex flex-column justify-content-center text-center rounded">
                                        <div class="service-icon btn-square">
                                            <i class="fa-solid fa-chart-column fa-4x"></i>
                                        </div>
                                        <h5 class="mb-3">Predictive Analysis</h5>
                                        <p>Predictive analytics to optimize jury selection and pool management.</p>
                                        <a class="btn px-3 mt-auto mx-auto" href="">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Feature Start -->
    <div class="container-fluid  feature">
        <div class="container pt-2">
            <div class="row g-5">
                <div class="col-lg-6 align-self-center mb-md-5 pb-md-5 wow fadeIn" data-wow-delay="0.3s">
                    <div class="btn btn-sm border rounded-pill text-white px-3 mb-3 fs-3"></div>
                    <h1 class="text-white mb-4">Improved service and efficiency</h1>
                    <p class="text-light mb-4">Aliqu diam amet diam et eos labore. Clita erat ipsum et lorem et sit,
                        sed
                        stet no labore lorem sit. Sanctus clita duo justo et tempor</p>
                    <div class="d-flex align-items-center text-white mb-3">
                        <div class="btn-sm-square bg-white text-primary rounded-circle me-3">
                            <i class="fa fa-check"></i>
                        </div>
                        <span>Streamlined jury management</span>
                    </div>
                    <div class="d-flex align-items-center text-white mb-3">
                        <div class="btn-sm-square bg-white text-primary rounded-circle me-3">
                            <i class="fa fa-check"></i>
                        </div>
                        <span>Improved efficiency</span>
                    </div>
                    <div class="d-flex align-items-center text-white mb-3">
                        <div class="btn-sm-square bg-white text-primary rounded-circle me-3">
                            <i class="fa fa-check"></i>
                        </div>
                        <span>Enhanced decision-making</span>
                    </div>
                    <div class="d-flex align-items-center text-white mb-3">
                        <div class="btn-sm-square bg-white text-primary rounded-circle me-3">
                            <i class="fa fa-check"></i>
                        </div>
                        <span>Robust security</span>
                    </div>
                    <div class="row g-4 pt-3">
                        <div class="col-sm-6">
                            <div class="d-flex rounded p-3" style="background: rgba(256, 256, 256, 0.1);">
                                <i class="fa fa-users fa-3x text-white"></i>
                                <div class="ms-3">
                                    <span class="text-white mb-0 fs-2">+</span>
                                    <h2 class="text-white mb-0" data-toggle="counter-up">2000 </h2>
                                    <p class="text-white mb-0">Jury Panels Managed</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex rounded p-3" style="background: rgba(256, 256, 256, 0.1);">
                                <i class="fa fa-check fa-3x text-white"></i>
                                <div class="ms-3">
                                    <span class="text-white mb-0 fs-2">+</span>
                                    <h2 class="text-white mb-0" data-toggle="counter-up">1500</h2>
                                    <p class="text-white mb-0">Satisfied Jurors</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img">
                        <img class="img-fluid" src="{{ url('') }}/assets/images/ai (5).png">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->


    <!-- Case Start -->
    <div class="container-fluid bg-light py-5">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3 fs-6">Case Study</div>
                <h1 class="mb-4">Explore Our Recent AI Case Studies</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="case-item position-relative overflow-hidden rounded mb-2">
                        <img class="img-fluid" src="{{ url('') }}/assets/images/jury.jpeg" alt="">
                        <a class="case-overlay text-decoration-none" href="">
                            <small>Robotic Automation</small>
                            <h5 class="lh-base text-white mb-3">Lorem elitr magna stet eirmod labore amet labore clita
                            </h5>
                            <span class="btn btn-square btn-primary"><i class="fa fa-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="case-item position-relative overflow-hidden rounded mb-2">
                        <img class="img-fluid" src="{{ url('') }}/assets/images/ai (5).png" alt="">
                        <a class="case-overlay text-decoration-none" href="">
                            <small>Machine learning</small>
                            <h5 class="lh-base text-white mb-3">Lorem elitr magna stet eirmod labore amet labore clita
                            </h5>
                            <span class="btn btn-square btn-primary"><i class="fa fa-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.7s">
                    <div class="case-item position-relative overflow-hidden rounded mb-2">
                        <img class="img-fluid" src="{{ url('') }}/assets/images/ai (2).png" alt="">
                        <a class="case-overlay text-decoration-none" href="">
                            <small>Predictive Analysis</small>
                            <h5 class="lh-base text-white mb-3">Lorem elitr magna stet eirmod labore amet labore clita
                            </h5>
                            <span class="btn btn-square btn-primary"><i class="fa fa-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Case End -->


    <!-- FAQs Start -->
    <div class="container-fluid py-2">
        <div class="container py-2">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Popular FAQs</div>
                <h1 class="mb-4">Frequently Asked Questions</h1>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="accordion" id="accordionFAQ1">
                        <div class="accordion-item wow fadeIn" data-wow-delay="0.1s">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    How efficient is the service?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                data-bs-parent="#accordionFAQ1">
                                <div class="accordion-body">
                                    Jury Management System (JMS) makes it easier and faster for jurors to navigate their
                                    way through the justice system.
                                    It is a unique cloud-based solution which optimises the jury management selection
                                    process by streamlining and automating the selection activities and improving
                                    service quality and efficiency. <p>
                                        The JMS was first implemented by the New South Wales (NSW) government to improve
                                        stakeholder engagement, remove manual processes, and provide a process and cost
                                        saving to court jurisdictions.</p>
                                    The JMS system also improves the user experience for prospective jurors and judicial
                                    administrators. With enhanced accessibility and responsiveness, JMS enables clear
                                    and consistent messaging for a quality user experience.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item wow fadeIn" data-wow-delay="0.2s">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    How is the Current Jury System?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionFAQ1">
                                <div class="accordion-body">

                                    <p class="mb-0">
                                        Juries, composed of ordinary citizens, play a critical role in legal
                                        proceedings. Their collective judgment, guided by evidence and legal
                                        guidance, determines the fate of defendants. However, human judgment is
                                        not infallible, and biases, emotions, and cognitive limitations can
                                        influence verdicts.
                                    </p>

                                    <p> AI systems, with their ability to process vast amounts of data and
                                        analyze complex patterns, offer a potential solution to the limitations
                                        of human judgment. They can provide unbiased assessments, impartially
                                        considering evidence and legal precedent, thus contributing to more
                                        consistent and fair decisions.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item wow fadeIn" data-wow-delay="0.3s">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    What are the Pros of AI-Assisted Jury Decision-Making?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="headingThree" data-bs-parent="#accordionFAQ1">
                                <div class="accordion-body">

                                    <ul>
                                        <p>Reduced Bias: AI can be programmed to make decisions solely based on
                                            evidence, reducing the influence of personal biases.</p>
                                        <p>Enhanced Efficiency: AI can process large volumes of information
                                            quickly, potentially expediting trials and reducing court backlogs.
                                        </p>
                                        <p> Consistency: AI can provide consistent judgments, ensuring similar
                                            cases are treated ake, promoting fairness.</p>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item wow fadeIn" data-wow-delay="0.4s">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                    what are the Cons of AI-Assisted Jury Decision-Making?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionFAQ1">
                                <div class="accordion-body">

                                    <ul>
                                        <p> Lack of Empathy: AI lacks the capacity for empathy, which is
                                            crucial for understanding the human aspects of a case, such as the
                                            defendant's emotions or intentions.</p>
                                        <p>Ethical and Legal Challenges: Determining the ethical and legal
                                            framework for AI in jury decision-making, including accountability
                                            and transparency, presents significant challenges.</p>
                                        <p>Job Displacement: Widespread adoption of AI in the legal system may
                                            raise concerns about the displacement of human jurors and legal
                                            professionals.</p>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="accordion" id="accordionFAQ2">
                        <div class="accordion-item wow fadeIn" data-wow-delay="0.5s">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="false"
                                    aria-controls="collapseFive">
                                    The Human-AI Partnership?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                data-bs-parent="#accordionFAQ2">
                                <div class="accordion-body">
                                    <ul>
                                        <p> An alternative approach to AI replacing human jurors entirely is to
                                            utilize AI as a tool to aid human jurors. AI can assist in data
                                            analysis, providing jurors with relevant information and insights, while
                                            the final decision remains in human hands. This approach combines the
                                            strengths of AI's analytical capabilities with human empathy and
                                            judgment.</p>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item wow fadeIn" data-wow-delay="0.6s">
                            <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    What are the Potential Impact on Justice?
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                                data-bs-parent="#accordionFAQ2">
                                <div class="accordion-body">
                                    <ul>
                                        <p>The ultimate goal of any justice system is to ensure fairness and
                                            maintain public trust. The integration of AI in jury decision-making
                                            must be carefully implemented to avoid eroding trust in the legal
                                            system. Transparency, accountability, and regular audits of AI systems
                                            are crucial to maintaining public confidence.</p>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item wow fadeIn" data-wow-delay="0.7s">
                            <h2 class="accordion-header" id="headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSeven" aria-expanded="false"
                                    aria-controls="collapseSeven">
                                    What are the challenges and Ethical Considerations?
                                </button>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse collapse"
                                aria-labelledby="headingSeven" data-bs-parent="#accordionFAQ2">
                                <div class="accordion-body">
                                    <ul>
                                        As we navigate the future of AI in jury decision-making, we must address
                                        several challenges:
                                        <p>Bias in AI: Ensuring AI systems are free from bias is essential to
                                            prevent automated injustice.</p>
                                        <p>Data Privacy: Protecting the privacy of individuals involved in
                                            legal proceedings when using AI is paramount.</p>
                                        <p>Legal Standards: Developing clear legal standards and regulations
                                            for AI's role in the justice system is crucial.</p>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item wow fadeIn" data-wow-delay="0.8s">
                            <h2 class="accordion-header" id="headingEight">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseEight" aria-expanded="false"
                                    aria-controls="collapseEight">
                                    What are the Way forward?
                                </button>
                            </h2>
                            <div id="collapseEight" class="accordion-collapse collapse"
                                aria-labelledby="headingEight" data-bs-parent="#accordionFAQ2">
                                <div class="accordion-body">
                                    <p class="mb-0">The incorporation of AI into jury decision-making is a
                                        complex and
                                        evolving topic. While it holds promise in reducing bias, enhancing
                                        efficiency, and improving consistency, it also raises profound ethical,
                                        legal, and human concerns. Striking the right balance between AI and
                                        human judgment is key to achieving a fair and just legal system.</p><br>
                                    <p class="mb-0">As we move forward, it is essential to engage in open
                                        dialogue, ethical
                                        deliberation, and rigorous oversight to ensure that AI serves as a
                                        valuable tool for justice without compromising the core principles of
                                        fairness, empathy, and human understanding that underpin our legal
                                        system.</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQs Start -->


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="btn btn-sm border rounded-pill text-primary px-1 mb-3">Contact Us</div>
                <h1 class="mb-4">If You Have Any Query</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <p class="text-center mb-4">or need assistance, please reach out to our support team</p>
                    <div class="wow fadeIn" data-wow-delay="0.3s">
                        <form>
                            <div class="row g-3 text-dark">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name"
                                            placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="subject"
                                            placeholder="Subject">
                                        <label for="subject">Subject</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <!-- Newsletter Start -->
    <div class="container-fluid bg-primary newsletter py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-md-5 ps-lg-0 pt-5 pt-md-0 text-start wow fadeIn" data-wow-delay="0.3s">
                    <img class="img-fluid" src="{{ url('') }}/assets/images/newsletter.png" alt="">
                </div>
                <div class="col-md-7 py-5 newsletter-text wow fadeIn" data-wow-delay="0.5s">
                    <div class="btn btn-sm border rounded-pill text-white px-3 mb-3">Newsletter</div>
                    <h1 class="text-white mb-4">Let's subscribe the newsletter</h1>
                    <div class="position-relative w-100 mt-3 mb-2">
                        <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text"
                            placeholder="Enter Your Email" style="height: 48px;">
                        <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i
                                class="fa fa-paper-plane text-primary fs-4"></i></button>
                    </div>
                    <small class="text-white-50">To stay up to date with our latest stories</small>
                </div>
            </div>
        </div>
    </div>
    <!-- Newsletter End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                    <a href="#" class="d-inline-block mb-3">
                        <h3 class="text-white">JMS<span class="text-primary">|</span>AI-Enabled</h3>
                    </a>
                    <p class="mb-0">Using different forms of AI such as machine learning and natural language
                        processing (NLP), these tools can sift through voluminous data on social media platforms,
                        public records, and other online locations to find information that might affect a person's
                        favorability as a potential juror.</p>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
                    <h5 class="text-white mb-4">Get In Touch</h5>
                    <p><i class="fa fa-map-marker-alt me-3 footer-tab"></i>KK 653 Street, Kicukiro, Rwanda</p>
                    <p><i class="fa fa-phone-alt me-3 footer-tab"></i>+250 790 802 120</p>
                    <p><i class="fa fa-envelope me-3 footer-tab"></i>suahmarcus.s@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i
                                class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                    <h5 class="text-white mb-4">Popular Link</h5>
                    <a class="btn btn-link" href="about">About Us</a>
                    <a class="btn btn-link" href="contact">Contact Us</a>
                    <a class="btn btn-link" href="">Privacy Policy</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">Career</a>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
                    <h5 class="text-white mb-4">Our Services</h5>
                    <a class="btn btn-link" href="">Robotic Automation</a>
                    <a class="btn btn-link" href="">Machine learning</a>
                    <a class="btn btn-link" href="">Predictive Analysis</a>
                    <a class="btn btn-link" href="">Data Science</a>
                    <a class="btn btn-link" href="">Robot Technology</a>
                </div>
            </div>
        </div>
        <div class="container wow fadeIn" data-wow-delay="0.1s">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Jury Management System </a>, AI-Enabled.

                        Designed By : <a class="border-bottom" href="#">S. Marcus Suah</a> Computing Information
                        Science Student <a class="border-bottom" href="#">UNILAK</a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="#home">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FAQs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('') }}/assets/libs/wow/wow.min.js"></script>
    <script src="{{ url('') }}/assets/libs/easing/easing.min.js"></script>
    <script src="{{ url('') }}/assets/libs/waypoints/waypoints.min.js"></script>
    <script src="{{ url('') }}/assets/libs/counterup/counterup.min.js"></script>
    <script src="{{ url('') }}/assets/libs/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ url('') }}/assets/js/main.js"></script>
</body>

</html>

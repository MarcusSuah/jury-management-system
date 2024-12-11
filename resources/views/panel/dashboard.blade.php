@extends('panel.layouts.app')

@section('content')
    <section>

        <div class="page-content">
            <div class="container-fluid">
                @hasrole('superadmin')
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Dashboard</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Jury Admin</a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-truncate font-size-14 mb-2">Court</p>
                                            <h4 class="mb-2">{{ $courts }}</h4>
                                            <p class="text-muted mb-0"><span
                                                    class="text-warning fw-bold font-size-18 me-2">Total Court</span>
                                            </p>
                                        </div>
                                        <div class="avatar-lg">
                                            <span class="avatar-title bg-light text-warning rounded-3">
                                                <i class="fa-solid fa-scale-balanced"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-truncate font-size-14 mb-2">Judges</p>
                                            <h4 class="mb-2">{{ $judges }}</h4>
                                            <p class="text-muted mb-0"><span class="text-info fw-bold font-size-18 me-2">Total
                                                    Judges
                                                </span></p>
                                        </div>
                                        <div class="avatar-lg">
                                            <span class="avatar-title bg-light text-info rounded-3">
                                                <i class="fa-solid fa-gavel"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-truncate font-size-14 mb-2">Cases</p>
                                            <h4 class="mb-2">{{ $court_cases }}</h4>
                                            <p class="text-muted mb-0"><span class="text-danger fw-bold font-size-18 me-2">Total
                                                    Cases</span></p>
                                        </div>
                                        <div class="avatar-lg">
                                            <span class="avatar-title bg-light text-danger rounded-3">
                                                <i class="fa-solid fa-newspaper"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-truncate font-size-14 mb-2">Jurors</p>
                                            <h4 class="mb-2">{{ $jurors }}</h4>
                                            <p class="text-muted mb-0"><span
                                                    class="text-primary fw-bold font-size-18 me-2">Total Jury
                                                </span></p>
                                        </div>
                                        <div class="avatar-lg">
                                            <span class="avatar-title bg-light text-primary rounded-3">
                                                <i class="fa-solid fa-users"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-truncate font-size-14 mb-2">Jury Summon</p>
                                            <h4 class="mb-2">{{ $others_summons }}</h4>
                                            <p class="text-muted mb-0"><span class="text-dark fw-bold font-size-18 me-2">Total
                                                    Persons Summon
                                                </span></p>
                                        </div>
                                        <div class="avatar-lg">
                                            <span class="avatar-title bg-light text-dark rounded-3">
                                                <i class="fa-solid fa-rectangle-list"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-truncate font-size-14 mb-2">Summon Message</p>
                                            <h4 class="mb-2">{{ $jury_summons }}</h4>
                                            <p class="text-muted mb-0"><span
                                                    class="text-secondary fw-bold font-size-18 me-2">Total Jury Summons
                                                </span></p>
                                        </div>
                                        <div class="avatar-lg">
                                            <span class="avatar-title bg-light text-secondary rounded-3">
                                                <i class="fa-solid fa-paper-plane"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-truncate font-size-14 mb-2">Message</p>
                                            <h4 class="mb-2">{{ $summons }}</h4>
                                            <p class="text-muted mb-0"><span
                                                    class="text-success fw-bold font-size-18 me-2">Total Summon Messages
                                                </span></p>
                                        </div>
                                        <div class="avatar-lg">
                                            <span class="avatar-title bg-light text-success rounded-3">
                                                <i class="fa-solid fa-comment-sms"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-truncate font-size-14 mb-2">Questionnaire</p>
                                            <h4 class="mb-2">{{ $questionnaires }}</h4>
                                            <p class="text-muted mb-0"><span class="sms-text fw-bold font-size-18 me-2">Total
                                                    Questionnaire
                                                </span></p>
                                        </div>
                                        <div class="avatar-lg">
                                            <span class="avatar-title bg-light sms-text rounded-3">
                                                <i class="fa-solid fa-clipboard-question"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-6">

                            <div class="card">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card-box">

                                                <div class="col-md-12">
                                                    <h4 class="header-title mb-3" align="center"
                                                        style="margin-bottom: 11.5px!important;">Statistics of Jurors Per
                                                        Gender</h4>
                                                    <p class="m-0">Male: <b style="color:blue">{{ $male }}</b></p>
                                                    <p class="m-0">Female: <b style="color:red">{{ $female }}</b></p>
                                                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                                                    <span class="cover-canvas"></span>
                                                    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
                                                </div>
                                                <script>
                                                    window.onload = function() {
                                                        var jurors = {{ $jurors }};
                                                        var male = {{ $male }};
                                                        var male_per = male / jurors;
                                                        var male_part = male_per * 360;
                                                        var female_part = 360 - male_part;
                                                        var chart = new CanvasJS.Chart("chartContainer", {
                                                            animationEnabled: true,
                                                            title: {
                                                                //text: "Statistics of Juror Per Gender"
                                                            },
                                                            data: [{
                                                                type: "pie",
                                                                startAngle: 240,
                                                                yValueFormatString: "##0.00\" degree\"",
                                                                indexLabel: "{label} {y}",
                                                                dataPoints: [{
                                                                        y: male_part,
                                                                        label: "Male"
                                                                    },
                                                                    {
                                                                        y: female_part,
                                                                        label: "Female"
                                                                    }
                                                                ]
                                                            }]
                                                        });
                                                        chart.render();

                                                    }
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body pb-0">
                                    <div class="float-end d-none d-md-inline-block">
                                        <div class="dropdown">
                                            <a class="text-reset" href="#" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <span class="text-muted">This Years<i
                                                        class="mdi mdi-chevron-down ms-1"></i></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Today</a>
                                                <a class="dropdown-item" href="#">Last Week</a>
                                                <a class="dropdown-item" href="#">Last Month</a>
                                                <a class="dropdown-item" href="#">This Year</a>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="card-title mb-4">Summons</h4>
                                    {{--
                                <div class="text-center pt-3">
                                    <div class="row">
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <div>
                                                <h5></h5>
                                                <p class="text-muted text-truncate mb-0">This Week</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <div>
                                                <h5>$44,960</h5>
                                                <p class="text-muted text-truncate mb-0">Last Week</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div>
                                                <h5>$29,142</h5>
                                                <p class="text-muted text-truncate mb-0">Last Month</p>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}`
                                </div>
                                <div class="card-body py-0 px-2">
                                    <div id="column_line_chart" class="apex-charts" dir="ltr"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                @endrole

                @hasrole('judge')
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Dashboard</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Jury Admin</a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-truncate font-size-14 mb-2">Court</p>
                                            <h4 class="mb-2">{{ $courts }}</h4>
                                            <p class="text-muted mb-0"><span
                                                    class="text-warning fw-bold font-size-18 me-2">Total Court</span>
                                            </p>
                                        </div>
                                        <div class="avatar-lg">
                                            <span class="avatar-title bg-light text-warning rounded-3">
                                                <i class="fa-solid fa-scale-balanced"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-truncate font-size-14 mb-2">Cases</p>
                                            <h4 class="mb-2">{{ $court_cases }}</h4>
                                            <p class="text-muted mb-0"><span
                                                    class="text-danger fw-bold font-size-18 me-2">Total
                                                    Cases</span></p>
                                        </div>
                                        <div class="avatar-lg">
                                            <span class="avatar-title bg-light text-danger rounded-3">
                                                <i class="fa-solid fa-newspaper"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                @endrole

                @hasrole('jury')
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Dashboard</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Jury Admin</a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-truncate font-size-14 mb-2">Court</p>
                                            <h4 class="mb-2">{{ $courts }}</h4>
                                            <p class="text-muted mb-0"><span
                                                    class="text-warning fw-bold font-size-18 me-2">Total Court</span>
                                            </p>
                                        </div>
                                        <div class="avatar-lg">
                                            <span class="avatar-title bg-light text-warning rounded-3">
                                                <i class="fa-solid fa-scale-balanced"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-truncate font-size-14 mb-2">Summon</p>
                                            <h4 class="mb-2">{{ $summons }}</h4>
                                            <p class="text-muted mb-0"><span
                                                    class="text-warning fw-bold font-size-18 me-2">Total Summon</span>
                                            </p>
                                        </div>
                                        <div class="avatar-lg">
                                            <span class="avatar-title bg-light text-warning rounded-3">
                                                <i class="fa-solid fa-comment"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-truncate font-size-14 mb-2">Cases</p>
                                            <h4 class="mb-2">{{ $court_cases }}</h4>
                                            <p class="text-muted mb-0"><span
                                                    class="text-danger fw-bold font-size-18 me-2">Total
                                                    Cases</span></p>
                                        </div>
                                        <div class="avatar-lg">
                                            <span class="avatar-title bg-light text-danger rounded-3">
                                                <i class="fa-solid fa-newspaper"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                @endrole

            </div>
        </div>



    </section>
@endsection

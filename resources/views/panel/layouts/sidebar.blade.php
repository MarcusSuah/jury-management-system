    <!-- !========= Left Sidebar Start !========= -->

    <div class="vertical-menu">

        <div data-simplebar class="h-100">

            <div id="sidebar-menu">

                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title">Menu</li>

                    <li>
                        <a href="{{ url('/panel/dashboard') }}" class="waves-effect">
                            <i class="fa-solid fa-house"></i></span>
                            <span>Dashboard</span>
                        </a>
                    </li>
                @hasrole('superadmin')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fa-solid fa-users"></i>
                            <span>Manage Jury</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ url('panel/jury/add') }}">Add New Juror</a></li>
                            <li><a href="{{ url('panel/jury') }}">View Jurors List</a></li>
                            <li><a href="{{ url('panel/assignjury/add') }}">Assign Juror</a></li>
                            <li><a href="{{ url('panel/assignjury/list') }}">Vew Assignment</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fa-solid fa-scale-balanced"></i>
                            <span>Manage Court</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ url('panel/court/add') }}">Add Court form</a></li>
                            <li><a href="{{ url('panel/court') }}">View Court Record</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fa-solid fa-gavel"></i>
                            <span>Manage Judge</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href=" {{ url('panel/judge/add') }}">Add New Judge</a></i></li>
                            <li><a href=" {{ url('panel/judge') }}">View Judges List</a></li>
                            <li><a href=" {{ url('panel/assignjudge/add') }}">Assign Judges </a></li>
                            <li><a href=" {{ url('panel/assignjudge/list') }}">View Assignment</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fa-solid fa-newspaper"></i>
                            <span>Manage Case</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ url('panel/case/add') }}">Add New Case</a></li>
                            <li><a href="{{ url('panel/case') }}">View Cases List</a></li>
                        </ul>
                    </li>


                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fa-solid fa-wand-magic-sparkles"></i>
                            <span>Manage Jury Summons</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ url('panel/summon/add') }}">Add New Summon</a></li>
                            <li><a href="{{ url('panel/summon') }}">View Summons List</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-folder-open-fill"></i>
                            <span>Manage Quiz</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ url('panel/questionnaire/add') }}"> Create Quiz</a></li>
                            <li><a href="{{ url('panel/questionnaire') }}">View Quiz</a></li>
                            <li><a href="{{ url('panel/quiz-assigment') }}">Assign Quiz To Juror</a></li>
                            <li><a href="{{ url('panel/view/quiz-assigment') }}">View Quiz Assigment</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ url('panel/role') }}" class=" waves-effect ">
                            <i class="fa-solid fa-chart-bar"></i>
                            <span>Roles -{{ Request::segment(1) }} </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('panel/user') }}"
                            class=" waves-effect @if (Request::segment(2) != 'user')  @endif">
                            <i class="fa-solid fa-user"></i>
                            <span>User</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fa-solid fa-layer-group"></i>
                            <span>Report</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ url('court-report') }}">Court Report</a></li>
                            <li><a href="{{ url('case-report') }}">Case Report</a></li>
                            <li><a href="{{ url('summon-report') }}">Summon Report</a></li>
                            <li><a href="{{ url('jury-report') }}">Jury Report</a></li>
                            <li><a href="{{ url('judge-report') }}">Judge Report</a></li>
                        </ul>
                    </li>
                @endrole

                @hasrole('jury')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fa-solid fa-users"></i>
                            <span>My Cases</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ url('/view-cases/'.Auth::user()->id) }}">View Cases</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-folder-open-fill"></i>
                            <span>My Quiz</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ url('panel/view-pending-quiz') }}">Pending Quiz</a></li>
                            <li><a href="{{ url('panel/quiz-records') }}">View Quiz Records</a></li>
                        </ul>
                    </li>
                @endrole

                @hasrole('judge')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fa-solid fa-users"></i>
                            <span>My Cases</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ url('/view-cases/'.Auth::user()->id) }}">View Cases</a></li>
                        </ul>
                    </li>
                @endrole

                    <li>
                        <a href="{{ url('logout') }}">
                            <i class="mdi mdi-logout text-bg-dark"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

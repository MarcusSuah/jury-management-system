<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ url('/') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ url('/') }}/assets/images/logo.png" height="40" class="logo2 mx-auto"
                            alt="">
                    </span>
                    <span class="logo-lg">
                        <span class="d-none d-lg-inline text-white px-3 font-size-14">Jury Management </span>
                        <img src="{{ url('/') }}/assets/images/logo.png" height="40" class="logo2 mx-auto"
                            alt="">
                    </span>
                </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="ri-menu-2-line align-middle"></i>
            </button>

        </div>
        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ url('') }}/assets/images/1.jpeg"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1">{{ Auth::user()->name }} 
                        | <small>
                            @hasrole('superadmin')
                            Superadmin
                            @endrole

                            @hasrole('admin')
                            Admin
                            @endrole

                            @hasrole('jury')
                            Jury
                            @endrole

                            @hasrole('judge')
                            Judge
                            @endrole
                        </small>
                    </span>
                </button>
            </div>
        </div>
    </div>
</header>

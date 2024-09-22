@extends('panel.layouts.app')

@section('content')
    <div class="row py-5 mt-6">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Roles</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active"> Dashboard</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <section class="section dashboard">

        <div class="col-lg-9  mx-auto p-2">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add New Role</h5>
                    <form class="row g-3" action="" method="post">
                        {{ csrf_field() }}
                        <div class="col-12">
                            <label for="inputText" class="col-sm-2 form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="inputText" required>
                        </div>


                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </section>
@endsection

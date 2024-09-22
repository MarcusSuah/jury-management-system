@extends('panel.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>EDIT ROLES</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">

        <div class="col-lg-8  mx-auto p-2">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Role</h5>
                    <form class="row g-3" action="" method="post">
                        {{ csrf_field() }}
                        <div class="col-12">
                            <label for="inputText" class="col-sm-2 form-label">Name</label>
                            <input type="text" name="name" value="{{ $getRecord->name }}" class="form-control"
                                id="inputText" required>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </section>
@endsection

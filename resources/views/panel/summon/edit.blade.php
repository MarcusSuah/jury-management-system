@extends('panel.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>EDIT SUMMON</h1>
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
                    <h5 class="card-title">Edit Summon</h5>
                    <form class="row g-3" action="" method="post">
                        {{ csrf_field() }}
                        <div class="col-12">
                            <label for="inputText" class="col-sm-2 form-label">Name</label>
                            <input type="text" name="name" value="{{ $getRecord->name }}" class="form-control">
                        </div>
                        <div class="col-12">
                            <label for="inputText" class="col-sm-2 form-label">Email</label>
                            <input type="email" name="email" value="{{ $getRecord->email }}" class="form-control">
                        </div>
                        <div class="col-12">
                            <label for="inputText" class="col-sm-2 form-label">Category</label>
                            <select class="form-control" name="category" required>
                                <option value="{{ $getRecord->category }}" selected>{{ $getRecord->category }}</option>
                                <option value="Jury">Jury</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="col-sm-2 form-label">Address</label>
                            <input type="text" name="address" value="{{ $getRecord->address }}" class="form-control">
                        </div>
                        <div class="col-12">
                            <label for="inputDate" class="col-sm-2 form-label">Summon Date</label>
                            <input type="text" name="date" value="{{ $getRecord->date }}" class="form-control">
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

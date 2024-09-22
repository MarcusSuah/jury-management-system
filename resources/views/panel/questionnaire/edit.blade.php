@extends('panel.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Questionnaire</h1>
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
                    <h5 class="card-title">Edit Questionnaire</h5>
                    <form class="row g-3" action="" method="post">
                        {{ csrf_field() }}
                        <div class="col-12">
                            <label for="inputText" class="col-sm-2 form-label">Questionnaire Title</label>
                            <input type="text" name="questionnaire_title" class="form-control"
                                value="{{ $getRecord->questionnaire_title }}">
                        </div>
                        <div class="col-12">
                            <label for="inputText" class="col-sm-2 form-label">Case Number</label>
                            <input type="text" name="case_number" class="form-control"
                                value="{{ $getRecord->case_number }}">
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="col-sm-2 form-label">Questionnaire</label>
                            <textarea type="text" name="questionnaire" class="form-control" value="{{ $getRecord->questionnaire }}"></textarea>
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

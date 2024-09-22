@extends('panel.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Questionnaire</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                <li class="breadcrumb-item active"> Dashboard</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="container py-2 z-3">
                <div class="row">
                    <div class="col-12 ">
                        <div class="card mx-auto col-8">
                            <div class="card-body">
                                <h4 class="card-title text-center mb-3">Questionnaire Form</h4>
                                <form class="row g-3" action="" method="post">
                                    {{ csrf_field() }}
                                    <div class="col-12">
                                        <label for="inputText" class="col-sm-2 form-label">Questionnaire Title</label>
                                        <input type="text" name="questionnaire_title" class="form-control" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputText" class="col-sm-2 form-label">Case Number</label>
                                        <input type="text" name="case_number" class="form-control" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputAddress" class="col-sm-2 form-label">Questionnaire</label>
                                        <textarea type="text" name="questionnaire" class="form-control" required></textarea>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

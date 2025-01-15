@extends('panel.layouts.app')

@section('content')
    <div class="container py-5 z-3">
        <div class="row">
            <div class="card mx-auto p-2 z-3 col-lg-8" >
                <div class="card-body py-3">
                    <h1 class="card-title text-center py-lg-4">Edit Court Case Form </h1>
                    <form class="row g-3" action="" method="post">
                        {{ csrf_field() }}
                        <div class="col-md-6">
                            <label for="case-number" class="form-label">Case Number</label>
                            <input type="text" class="form-control" name="case_no" value="{{ $getRecord->case_no }}"
                                required>
                        </div>
                        <div class="col-md-6">
                            <label for="case-title" class="form-label">Case Title</label>
                            <input type="text" class="form-control" name="title" value="{{ $getRecord->title }}"
                                required>
                        </div>
                        <div class="col-md-6">
                            <label for="case-type" class="form-label">Case Type</label>
                            <select class="form-select" name="case_type" value="{{ $getRecord->case_type }}" required>
                                <option value="{{ $getRecord->case_type }}" selected>{{ $getRecord->case_type }}</option>
                                <option value="Criminal">Criminal</option>
                                <option value="Civil">Civil</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="court-date" class="form-label">Court Date</label>
                            <input type="date" class="form-control" name="court_date"
                                value="{{ $getRecord->court_date }}" required>
                        </div>

                        <div class="col-md-12">
                            <label for="inputStatus" class="form-label">Case Status</label>
                            <select id="inputStatus" class="form-select" name="status" value="{{ $getRecord->status }}">
                                <option value="{{ $getRecord->status }}">{{ $getRecord->status }}</option>
                                <option>Finished</option>
                                <option>Ongoing</option>
                                <option>Pending</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

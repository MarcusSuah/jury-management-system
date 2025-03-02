@extends('panel.layouts.app')

@section('content')
    <div class="container py-3 z-3">
        <div class="row">
            <div class="card mx-auto p-2 z-3 col-lg-8">
                <div class="card-body py-5">
                    <h1 class="card-title text-center py-lg-4">Add Case Form </h1>
                    <form class="row g-3" action="" method="post">
                        {{ csrf_field() }}
                        <div class="col-md-6">
                            <label for="case-number" class="form-label">Case Number</label>
                            <input type="text" class="form-control" name="case_no" required>
                        </div>
                        <div class="col-md-6">
                            <label for="case-title" class="form-label">Case Title</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                        <div class="col-md-6">
                            <label for="case-type" class="form-label">Case Type</label>
                            <select class="form-select" name="case_type" required>
                                <option value="">Select case type</option>
                                <option value="criminal">Criminal</option>
                                <option value="civil">Civil</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="court-date" class="form-label">Court Date</label>
                            <input type="date" class="form-control no-past-day" name="court_date" required>
                        </div>

                        <div class="col-md-12">
                            <label for="inputStatus" class="form-label">Case Status</label>
                            <select id="inputStatus" class="form-select" name="status">
                                <option selected disabled>Select Case Status</option>
                                <option>Finished</option>
                                <option>Ongoing</option>
                                <option>Pending</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

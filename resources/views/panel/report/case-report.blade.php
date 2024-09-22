@extends('panel.layouts.app')

@section('content')
    <div class="container py-3 z-3">
        <div class="row">
            <div class="card mx-auto p-3 z-3 col-8">
                <div class="card-body py-5">
                    <h1 class="card-title text-center py-lg-4">Case Report</h1>
                    @include('_message')
                    <form class="row g-3" action="{{ route('generate-case-report') }}" method="post">
                        {{ csrf_field() }}

                        <div class="col-md-3">
                            <label for="inputEmail" class="form-label">Case Status</label>
                            <select id="inputType" class="form-select" name="status">
                                <option value="any">Any</option>
                                <option value="Finished">Finished</option>
                                <option value="Important">Important</option>
                                <option value="Ongoing">Ongoing</option>
                                <option value="Pending">Pending</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="inputEmail" class="form-label">Case Type</label>
                            <select id="inputType" class="form-select" name="case_type">
                                <option value="any">Any</option>
                                <option value="Criminal">Criminal</option>
                                <option value="Civil">Civil</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="inputEmail" class="form-label">From (Date)</label>
                            <input type="date" class="form-select" name="from_date">
                        </div>
                        <div class="col-md-3">
                            <label for="inputEmail" class="form-label">To (Date)</label>
                            <input type="date" class="form-select" name="to_date">
                        </div>
                        <div class="mb-2">
                            <button type="submit" class="btn btn-primary col-md-2">
                                <i class="fa-solid fa-file"></i>Report</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('panel.layouts.app')

@section('content')
    <div class="container py-3 z-3">
        <div class="row">
            <div class="card mx-auto p-3 z-3 col-8">
                <div class="card-body py-5">
                    <h1 class="card-title text-center py-lg-4">Jury Report</h1>
                    @include('_message')
                    <form class="row g-3" action="{{ route('generate-jury-report') }}" method="post">
                        {{ csrf_field() }}

                        <div class="col-md-3">
                            <label for="inputEmail" class="form-label">Status</label>
                            <select id="inputType" class="form-select" name="status">
                                <option value="any">Any</option>
                                <option value="0">Pending</option>
                                <option value="1">Approved</option>
                                <option value="2">Denied</option>
                                <option value="3">Disabled</option>
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

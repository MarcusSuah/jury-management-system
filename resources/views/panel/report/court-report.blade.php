@extends('panel.layouts.app')

@section('content')
    <div class="container py-3 z-3">
        <div class="row">
            <div class="card mx-auto p-3 z-3 col-8">
                <div class="card-body py-5">
                    <h1 class="card-title text-center py-lg-4">Court Report</h1>
                    @include('_message')
                    <form class="row g-3" action="{{ route('generate-court-report') }}" method="post">
                        {{ csrf_field() }}

                        <div class="col-md-12">
                            <label for="inputEmail" class="form-label">Court Type</label>
                            <select id="inputType" class="form-select" name="type">
                                <option value="any">Any</option>
                                <option value="Supreme Court">Supreme Court</option>
                                <option value="Criminal and Assizes Court">Criminal and Assizes Court</option>
                                <option value="Circuit Courts">Circuit Courts</option>
                                <option value="Debt Courts">Debt Courts</option>
                                <option value="Monthly & Probate Court">Monthly & Probate Court</option>
                                <option value="Tax Court">Tax Court</option>
                                <option value="The Commercial Court">The Commercial Court</option>
                                <option value="National Labor Court">National Labor Court</option>
                                <option value="Traffic Court">Traffic Court</option>
                                <option value="Juvenile Court">Juvenile Court</option>
                                <option value="Revenue Court">Revenue Court</option>
                            </select>
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

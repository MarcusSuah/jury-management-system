@extends('panel.layouts.app')

@section('content')
    <div class="container py-3 z-3">
        <div class="row">
            <div class="card mx-auto p-3 z-3 col-8">
                <div class="card-body py-5">
                    <h1 class="card-title text-center py-lg-4">Summon Report</h1>
                    @include('_message')
                    <form class="row g-3" action="{{ route('generate-summon-report') }}" method="post">
                        {{ csrf_field() }}

                        <div class="col-md-4">
                            <label for="inputEmail" class="form-label">Jury</label>
                            <select id="inputState" class="form-select" name="user">
                                <option value="any" selected>Any</option>
                                @if ($users)
                                    @foreach ($users as $user)
                                        <option value="{{ $user['email'] }}">{{ $user['name'] }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @if ($errors->has('user'))
                                <span class="help-block">
                                    <strong>
                                        {{ $errors->first('user') }}
                                    </strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <label for="inputEmail" class="form-label">From (Date)</label>
                            <input type="date" class="form-select" name="from_date">
                        </div>
                        <div class="col-md-4">
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

@extends('panel.layouts.app')

@section('content')
    <div class="container py-5 z-3">
        <div class="row">
            <div class="card mx-auto p-2 z-3 col-8">
                <div class="card-body ">
                    <h1 class="card-title text-center py-lg-4 text-blue">Jury Assignment Form </h1>
                    @include('_message')
                    <form class="row g-3" action="" method="post">
                        {{ csrf_field() }}
                        <div class="col-md-6">
                            <label for="inputState" class="form-label">Jury</label>
                            <select id="inputState" class="form-select" name="jury" required>
                                @if (old('jury'))
                                    @if ($jurors)
                                        @foreach ($jurors as $juror)
                                            @if (old('jury') == $juror->id)
                                                <option value="{{ $juror->id }}" selected>{{ $juror->name }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                @else
                                    <option value="" selected>Select Jury</option>
                                @endif
                                @if ($jurors)
                                    @foreach ($jurors as $juror)
                                        <option value="{{ $juror->id }}">{{ $juror->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputState" class="form-label">Court</label>
                            <select id="inputState" class="form-select" name="court" required>
                                @if (old('court'))
                                    @if ($courts)
                                        @foreach ($courts as $court)
                                            @if (old('court') == $court->id)
                                                <option value="{{ $court->id }}" selected>{{ $court->name }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                @else
                                    <option value="" selected>Select Court</option>
                                @endif
                                @if ($courts)
                                    @foreach ($courts as $court)
                                        <option value="{{ $court->id }}">{{ $court->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @if ($errors->has('court'))
                                <span class="help-block">
                                    <strong>
                                        {{ $errors->first('court') }}
                                    </strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="inputState" class="form-label">Cases</label>
                            <select id="inputState" class="form-select" name="case">
                                @if (old('case'))
                                    @if ($court_cases)
                                        @foreach ($court_cases as $case)
                                            @if (old('case') == $case->id)
                                                <option value="{{ $case->id }}" selected>{{ $case->case_no }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                @else
                                    <option value="" selected>Select Case</option>
                                @endif
                                @if ($court_cases)
                                    @foreach ($court_cases as $case)
                                        <option value="{{ $case->id }}">{{ $case->case_no }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @if ($errors->has('case'))
                                <span class="help-block">
                                    <strong>
                                        {{ $errors->first('case') }}
                                    </strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" class="form-control no-past-day" name="start_date"
                                value="{{ old('start_date') }}" required>
                            @if ($errors->has('start_date'))
                                <span class="help-block">
                                    <strong>
                                        {{ $errors->first('start_date') }}
                                    </strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" class="form-control no-past-day" name="end_date"
                                value="{{ old('end_date') }}" required>
                            @if ($errors->has('end_date'))
                                <span class="help-block">
                                    <strong>
                                        {{ $errors->first('end_date') }}
                                    </strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <input type="checkbox" id="act_status" class="pt-2" name="status">
                            <label for="act_status" class="form-label">Active</label>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

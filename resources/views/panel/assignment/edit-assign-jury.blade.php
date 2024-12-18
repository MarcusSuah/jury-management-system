@extends('panel.layouts.app')

@section('content')
    <div class="container py-5 z-3">
        <div class="row">
            <div class="card mx-auto p-2 z-3 col-6">
                <div class="card-body ">
                    <h1 class="card-title text-center py-lg-4 text-blue">Edit Jury Assignment</h1>
                    @include('_message')
                    <form class="row g-3" action="" method="post">
                        {{ csrf_field() }}
                        <div class="col-md-12">
                            <label for="inputState" class="form-label">Jury</label>
                            <select id="inputState" class="form-select" name="jury" required>
                                @if (!is_null($assignedJury))
                                    <option value="{{ $assignedJury->id }}" selected>{{ $assignedJury->name }}</option>
                                @endif
                                @if (old('jury'))
                                    @if ($jurors)
                                        @foreach ($jurors as $juror)
                                            @if (old('jury') == $juror->id)
                                                <option value="{{ $juror->id }}" selected>{{ $juror->name }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                @endif
                                @if ($jurors)
                                    @foreach ($jurors as $juror)
                                        @if ($juror != $assignedJury->name)
                                            <option value="{{ $juror->id }}">{{ $juror->name }}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="inputState" class="form-label">Court</label>
                            <select id="inputState" class="form-select" name="court" required>
                                @if (!is_null($assignedCourt))
                                    <option value="{{ $assignedCourt->id }}" selected>{{ $assignedCourt->name }}</option>
                                @endif
                                @if (old('court'))
                                    @if ($courts)
                                        @foreach ($courts as $court)
                                            @if (old('court') == $court->id)
                                                <option value="{{ $court->id }}" selected>{{ $court->name }}</option>
                                            @endif
                                        @endforeach
                                    @endif
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
                        <div class="col-md-12">
                            <label for="inputState" class="form-label">Cases</label>
                            <select id="inputState" class="form-select" name="case">
                                @if (!is_null($assignedCase))
                                    <option value="{{ $assignedCase->id }}" selected>{{ $assignedCase->case_no }}</option>
                                @endif
                                @if (old('case'))
                                    @if ($court_cases)
                                        @foreach ($court_cases as $case)
                                            @if (old('case') == $case->id)
                                                <option value="{{ $case->id }}" selected>{{ $case->case_no }}</option>
                                            @endif
                                        @endforeach
                                    @endif
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
                        <div class="col-md-12">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" class="form-control" name="start_date"
                                value="{{ $data->start_date ?? '' }}">
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
                            <input type="date" class="form-control" name="end_date" value="{{ $data->end_date ?? '' }}">
                            @if ($errors->has('end_date'))
                                <span class="help-block">
                                    <strong>
                                        {{ $errors->first('end_date') }}
                                    </strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <input type="checkbox" id="act_status" class="pt-2" name="status"
                                @if ($data->status == 1) {{ 'checked' }} @endif>
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

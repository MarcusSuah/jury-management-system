@extends('panel.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="container py-2 z-3">
                <div class="row">
                    <div class="col-12 ">
                        <div class="card mx-auto col-8">
                            <div class="card-body">
                                <h4 class="card-title text-center mb-3">Add Summon Form</h4>
                                <form class="row g-3" action="" method="post">
                                    {{ csrf_field() }}
                                    <div class="col-12">
                                        <label for="inputText" class="col-sm-2 form-label">Name</label>
                                        <input type="text" name="name" class="form-control" required>
                                        @if ($errors->has('end_date'))
                                            <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('end_date') }}
                                                </strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-12">
                                        <label for="inputText" class="col-sm-2 form-label">Email</label>
                                        <input type="email" name="email" class="form-control" required>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('email') }}
                                                </strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-12">
                                        <label for="inputState" class="form-label">Court</label>
                                        <select id="inputState" class="form-select" name="court" required>
                                            @if (old('court'))
                                                @if ($courts)
                                                    @foreach ($courts as $court)
                                                        @if (old('court') == $court->id)
                                                            <option value="{{ $court->id }}" selected>{{ $court->name }}
                                                            </option>
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
                                    <div class="col-md-12">
                                        <label for="inputState" class="form-label">Case</label>
                                        <select id="inputState" class="form-select" name="case">
                                            @if (old('case'))
                                                @if ($court_cases)
                                                    @foreach ($court_cases as $case)
                                                        @if (old('case') == $case->id)
                                                            <option value="{{ $case->id }}" selected>
                                                                {{ $case->case_no }}</option>
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
                                    <div class="col-12">
                                        <label for="inputEmail" class="col-sm-2 form-label">Category</label>
                                        <select class="form-control" name="category" required>
                                            <option value="">Select Category</option>
                                            <option value="Jury">Jury</option>
                                            <option value="Others">Others</option>
                                        </select>
                                        @if ($errors->has('category'))
                                            <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('category') }}
                                                </strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-12">
                                        <label for="inputAddress" class="col-sm-2 form-label">Address</label>
                                        <input type="text" name="address" class="form-control" required></input>
                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('address') }}
                                                </strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-12">
                                        <label for="inputDate" class="col-sm-2 form-label">Summon Date</label>
                                        <input type="date" name="date" class="form-control no-past-day" required>
                                        @if ($errors->has('date'))
                                            <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('date') }}
                                                </strong>
                                            </span>
                                        @endif
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

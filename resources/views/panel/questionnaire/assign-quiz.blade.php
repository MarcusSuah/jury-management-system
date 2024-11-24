@extends('panel.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Quiz Assigment</h4>

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
                                <h4 class="card-title text-center mb-3">Quiz Assigment Form</h4>
                                <form class="row g-3" action="" method="post">
                                    {{ csrf_field() }}
                                    <div class="col-md-12">
                                        <label for="inputState" class="form-label">Select Juror</label>
                                        <select id="inputState" class="form-select" name="user_id" required>
                                            @if (old('user_id'))
                                                @if ($users)
                                                    @foreach ($users as $user)
                                                        @if (old('user_id') == $user['id'])
                                                            <option value="{{ $user['id'] }}" selected>{{ $user['email'] }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @else
                                                <option value="" selected>Select Juror</option>
                                            @endif
                                            @if ($users)
                                                @foreach ($users as $user)
                                                    <option value="{{ $user['id'] }}">{{ $user['email'] }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if ($errors->has('user_id'))
                                            <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('user_id') }}
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

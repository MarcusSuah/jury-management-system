@extends('panel.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="container py-2 z-3">

                <div class="col-lg-12 mx-auto ">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center mb-3">Questionnaire Form</h4>
                            <form class="row g-3" action="" method="post">
                                {{ csrf_field() }}
                                <div class="col-12">
                                    <label for="inputText" class="col-sm-2 form-label">Question</label>
                                    <input type="text" name="question" class="form-control" value="{{ old('question') }}"
                                        required>
                                    @if ($errors->has('question'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('question') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-12">
                                    <label for="inputText" class="col-sm-2 form-label text-success">True Answer</label>
                                    <input type="text" name="true_answer" class="form-control"
                                        value="{{ old('true_answer') }}" required>
                                    @if ($errors->has('true_answer'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('true_answer') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-12">
                                    <label for="inputText" class="col-sm-2 form-label text-warning">Biased
                                        Answer</label>
                                    <input type="text" name="biased_answer" class="form-control"
                                        value="{{ old('biased_answer') }}" required>
                                    @if ($errors->has('biased_answer'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('biased_answer') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-12">
                                    <label for="inputText" class="col-sm-2 form-label text-danger">Wrong Answer</label>
                                    <input type="text" name="wrong_answer_1" class="form-control"
                                        value="{{ old('wrong_answer_1') }}" required>
                                    @if ($errors->has('wrong_answer_1'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('wrong_answer_1') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-12">
                                    <label for="inputText" class="col-sm-2 form-label text-danger">Wrong Answer</label>
                                    <input type="text" name="wrong_answer_2" class="form-control"
                                        value="{{ old('wrong_answer_2') }}" required>
                                    @if ($errors->has('wrong_answer_2'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('wrong_answer_2') }}</strong>
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
@endsection

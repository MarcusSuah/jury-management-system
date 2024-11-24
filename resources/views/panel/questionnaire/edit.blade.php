@extends('panel.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Questionnaire</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">

        <div class="col-lg-8  mx-auto p-2">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Questionnaire</h5>
                    <form class="row g-3" action="" method="post">
                        {{ csrf_field() }}
                        <div class="col-12">
                            <label for="inputText" class="col-sm-2 form-label">Question</label>
                            <input type="text" name="question" class="form-control" value="{{ $result[0]['question'] }}" required>
                            @if ($errors->has('question'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('question') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-12">
                            <label for="inputText" class="col-sm-2 form-label text-success">True Answer</label>
                            <input type="text" name="true_answer" class="form-control" value="{{ $result[0]['trueAns'] }}" required>
                            <input type="hidden" name="true_answer_id" value="{{ $result[0]['trueAnsId'] }}">
                            @if ($errors->has('true_answer'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('true_answer') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-12">
                            <label for="inputText" class="col-sm-2 form-label text-warning">Biased Answer</label>
                            <input type="text" name="biased_answer" class="form-control" value="{{ $result[0]['biasedAns'] }}" required>
                            <input type="hidden" name="biased_answer_id" value="{{ $result[0]['biasedAnsId'] }}">
                            @if ($errors->has('biased_answer'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('biased_answer') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-12">
                            <label for="inputText" class="col-sm-2 form-label text-danger">Wrong Answer</label>
                            <input type="text" name="wrong_answer_1" class="form-control" value="{{ $result[0]['wrongAns1'] }}" required>
                            <input type="hidden" name="wrong_answer_1_id" value="{{ $result[0]['wrongAns1Id'] }}">
                            @if ($errors->has('wrong_answer_1'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('wrong_answer_1') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-12">
                            <label for="inputText" class="col-sm-2 form-label text-danger">Wrong Answer</label>
                            <input type="text" name="wrong_answer_2" class="form-control" value="{{ $result[0]['wrongAns2'] }}" required>
                            <input type="hidden" name="wrong_answer_2_id" value="{{ $result[0]['wrongAns2Id'] }}">
                            @if ($errors->has('wrong_answer_2'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('wrong_answer_2') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </section>
@endsection

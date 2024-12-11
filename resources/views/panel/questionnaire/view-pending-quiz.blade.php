@extends('panel.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container py-2 z-3">
            <div class="row">
                <div class="card col-4">
                    <div class="card-body">
                        <form class="row g-3" action="" method="post">
                            {{ csrf_field() }}
                            @if (!$assignment->isEmpty())
                                <div class="form-group">
                                    Assigned on: {{ $assignment[0]->created_at ?? '' }}
                                    <br>
                                    Exam Duration: 10 minutes
                                </div>
                                <div class="form-group">
                                    <input type="hidden" value="{{ $assignment[0]->id }}" name="assignment_id">
                                    <button type="submit" class="btn btn-primary">Attempt Quiz</button>
                                </div>
                            @else
                                <span class="text-danger text-center">NO PENDING QUIZ</span>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

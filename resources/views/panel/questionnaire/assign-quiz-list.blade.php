@extends('panel.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ url('panel/quiz-assigment') }}">
                                <button class="btn btn-primary float-lg-end">Add
                                    Quiz Assignment</button>
                            </a>
                            <h4 class="card-title mb-4">View Quiz Assigment</h4>
                            <div class="table-responsive col-sm">
                                @include('_message')
                                <table id="example" class="display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">Juror Name</th>
                                            <th scope="col">Juror Email</th>
                                            <th scope="col">Quiz Status</th>
                                            <th scope="col">Comment</th>
                                            <th scope="col">Score</th>
                                            <th scope="col">Creation Date</th>
                                        </tr>
                                    </thead>
                                    <tbody class="col-sm ">
                                        @foreach ($result as $value)
                                            <tr>
                                                <td scope="row">{{ $value['name'] }}</td>
                                                <td>{{ $value['email'] }}</td>
                                                <td>{{ $value['status'] }}</td>
                                                <td>{{ $value['comment'] }}</td>
                                                <td>{{ $value['score'] }}</td>
                                                <td>{{ $value['created_at'] }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

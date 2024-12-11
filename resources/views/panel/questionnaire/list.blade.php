@extends('panel.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ url('panel/questionnaire/add') }}">
                                <button class="btn btn-primary float-lg-end">Add
                                    Quiz</button>
                            </a>
                            <h4 class="card-title mb-4">View Quiz Record</h4>
                            <div class="table-responsive col-sm">
                                @include('_message')
                                <table id="example" class="display wrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Question</th>
                                            <th scope="col">Correct Answer</th>
                                            <th scope="col">Biased Answer</th>
                                            <th scope="col">Wrong Answer</th>
                                            <th scope="col">Creation Date</th>
                                            <th scope="col" width="180px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="col-sm">
                                        @foreach ($result as $value)
                                            <tr>
                                                <th scope="row">{{ $value['questionId'] }}</th>
                                                <td>{{ $value['question'] }}</td>
                                                <td>{{ $value['trueAns'] }}</td>
                                                <td>{{ $value['biasedAns'] }}</td>
                                                <td>
                                                    <ul>
                                                        <li>{{ $value['wrongAns1'] }}</li>
                                                        <li>{{ $value['wrongAns2'] }}</li>
                                                    </ul>
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($value['createdAt'])->format('l, d F, Y \\a\\t h:i A') }}
                                                </td>
                                                <td>
                                                    <a href="{{ url('panel/questionnaire/edit/' . $value['questionId']) }}"
                                                        class="btn btn-success btn-sm"><i
                                                            class="fa-solid fa-pen-to-square"></i>Edit</a>
                                                    <a href="{{ url('panel/questionnaire/delete/' . $value['questionId']) }}"
                                                        class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill mr-4"><i
                                                                class="fa-solid fa-trash"></i>Delete</a>
                                                </td>
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

@extends('panel.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">View Quiz Records</h4>
                            <div class="table-responsive col-sm">
                                <table id="example" class="display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Score</th>
                                            <th scope="col">Comment</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Start Date & time</th>
                                            <th scope="col">End Date & time</th>
                                        </tr>
                                    </thead>
                                    <tbody class="col-sm ">
                                        @foreach ($record as $value)
                                            <tr>
                                                <td scope="row">{{ $value['name'] }}</td>
                                                <td>{{ $value['email'] }}</td>
                                                <td>{{ $value['status'] }}</td>
                                                <td>{{ $value['comment'] }}</td>
                                                <td>{{ $value['score'] }}</td>
                                                <td>{{ \Carbon\Carbon::parse($value['created_at'])->format('l, d F, Y \\a\\t h:i A') }}
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

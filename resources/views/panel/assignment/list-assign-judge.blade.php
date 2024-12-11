@extends('panel.layouts.app')

@section('content')
    <section class="section dashboard">

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ url('panel/assignjudge/add') }}">
                                    <button class="btn btn-primary float-lg-end">Assign
                                        Judge</button>
                                </a>
                                <h4 class="card-title mb-4">Assignment List</h4>
                                <div class="table-responsive col-sm">
                                    @include('_message')
                                    <table id="example" class="display wrap" style="width:100%">
                                        <thead>
                                            <tr class="fs-6 fw-normal font-monospace">
                                                <th>ID</th>
                                                <th>JUDGE NAME</th>
                                                <th>JUDGE EMAIL</th>
                                                {{-- <th>JUDGE POSITION</th> --}}
                                                <th>COURT NAME</th>
                                                <th>COURT LOCATION</th>
                                                <th>COURT TYPE</th>
                                                {{-- <th>COURT CATEGORY</th> --}}
                                                <th>ASSIGNED CASE</th>
                                                <th>CASE START DATE</th>
                                                <th>CASE END DATE</th>
                                                <th>CASE STATUS</th>
                                                <th width="280px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="col-sm ">
                                            @foreach ($getRecord as $value)
                                                <tr>
                                                    <th scope="row">{{ $value->id }}</th>
                                                    <td>{{ $value->Judge->name }}</td>
                                                    <td>{{ $value->Judge->email }}</td>
                                                    {{-- <td>{{ $value->Judge->specialization }}</td> --}}
                                                    <td>{{ $value->Court->name }}</td>
                                                    <td>{{ $value->Court->location }}</td>
                                                    <td>{{ $value->Court->type }}</td>
                                                    {{-- <td>{{ $value->Court->category }}</td> --}}
                                                    <td>{{ $value->Case->case_no }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($value->case_start_date)->format('l, d F, Y \\a\\t h:i A') }}
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($value->case_end_date)->format('l, d F, Y \\a\\t h:i A') }}
                                                    </td>
                                                    <td>
                                                        @if ($value->case_status == 0)
                                                            <a class="btn btn-sm btn-danger">Inactive</a>
                                                        @else
                                                            <a class="btn btn-sm btn-primary">Active</a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ url('panel/jury/edit/' . $value->id) }}"
                                                            class="btn btn-success btn-sm"><i
                                                                class="fa-solid fa-pen-to-square"></i>Edit</a>
                                                        <a href="{{ url('panel/jury/delete/' . $value->id) }}"
                                                            class="btn btn-danger btn-sm"><i
                                                                class="bi bi-trash3-fill mr-4"><i
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

            </div> <!-- container-fluid -->

        </div>
        <!-- End Page-content -->

    </section>
@endsection

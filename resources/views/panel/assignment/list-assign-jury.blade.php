@extends('panel.layouts.app')

@section('content')
    <section class="section dashboard">

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ url('panel/jury/add') }}">
                                    <button class="btn btn-primary float-lg-end">Assign
                                        Jury</button>
                                </a>
                                <h4 class="card-title mb-4">Assignment List</h4>
                                <div class="table-responsive col-sm">
                                    @include('_message')
                                    <table id="example" class="display nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>JURY</th>
                                                <th>COURT</th>
                                                <th>ASSIGNED CASE</th>
                                                <th>START DATE</th>
                                                <th>END DATE</th>
                                                <th>STATUS</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="col-sm ">
                                            @foreach ($getRecord as $value)
                                                <tr>
                                                    <th scope="row">{{ $value->id }}</th>
                                                    <td>{{ $value->Jury->name }}</td>
                                                    <td>{{ $value->Court->name }}</td>
                                                    <td>{{ $value->Case->case_no }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($value->start_date)->format('l, d F, Y ') }}
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($value->end_date)->format('l, d F, Y ') }}
                                                    </td>
                                                    <td>
                                                        @if ($value->status == 0)
                                                            <a class="btn btn-sm btn-danger">Inactive</a>
                                                        @else
                                                            <a class="btn btn-sm btn-success">Active</a>
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

            </div>

        </div>

        </div>



    </section>
@endsection

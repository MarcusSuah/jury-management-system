@extends('panel.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Court Dashboard</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Court</a></li>
                                <li class="breadcrumb-item active">Admin Table</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ url('panel/court/add') }}">
                                <button class="btn btn-primary float-lg-end">Add
                                    Court</button>
                            </a>
                            <h4 class="card-title mb-4">View Court List</h4>
                            @include('_message')
                            <div class="table-responsive col-sm">
                                <table id="example" class="display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Court Name</th>
                                            <th>Court Type</th>
                                            <th>Court Location</th>
                                            {{-- <th>Court Category</th> --}}
                                            {{-- <th>Date Created</th> --}}
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="col-sm ">
                                        @foreach ($getRecord as $value)
                                            <tr>
                                                <th scope="row">{{ $value->id }}</th>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->type }}</td>
                                                <td>{{ $value->location }}</td>
                                                {{-- <td>{{ $value->category }}</td> --}}
                                                {{-- <td>{{ $value->created_at }}</td> --}}
                                                <td>
                                                    <a href="{{ url('panel/court/edit/' . $value->id) }}"
                                                        class="btn btn-success btn-sm"><i
                                                            class="fa-solid fa-pen-to-square"></i>Edit</a>
                                                    <a href="{{ url('panel/court/delete/' . $value->id) }}"
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

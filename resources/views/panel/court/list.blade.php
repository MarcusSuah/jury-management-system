@extends('panel.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">View Court Dashboard</h4>

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
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Court</p>
                                    <h4 class="mb-2">5565</h4>
                                    <p class="text-muted mb-0"><span class="text-warning fw-bold font-size-18 me-2">Total
                                            Court</span>
                                    </p>
                                </div>
                                <div class="avatar-lg">
                                    <span class="avatar-title bg-light text-warning rounded-3">
                                        <i class="fa-solid fa-scale-balanced"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Court</p>
                                    <h4 class="mb-2">938</h4>
                                    <p class="text-muted mb-0"><span class="text-info fw-bold font-size-18 me-2">
                                            Category
                                        </span></p>
                                </div>
                                <div class="avatar-lg">
                                    <span class="avatar-title bg-light text-info rounded-3">
                                        <i class="fa-solid fa-layer-group"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Court</p>
                                    <h4 class="mb-2">1238</h4>
                                    <p class="text-muted mb-0"><span
                                            class="text-danger fw-bold font-size-18 me-2">Locations</span></p>
                                </div>
                                <div class="avatar-lg">
                                    <span class="avatar-title bg-light text-danger rounded-3">
                                        <i class="fa-solid fa-map-location"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Types of Court</p>
                                    <h4 class="mb-2">598</h4>
                                    <p class="text-muted mb-0"><span class="text-primary fw-bold font-size-18 me-2">Total
                                            Types
                                        </span></p>
                                </div>
                                <div class="avatar-lg">
                                    <span class="avatar-title bg-light text-primary rounded-3">
                                        <i class="fa-solid fa-landmark"></i>
                                    </span>
                                </div>
                            </div>
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
                                            <th>Court Category</th>
                                            <th>Date Created</th>
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
                                                <td>{{ $value->category }}</td>
                                                <td>{{ $value->created_at }}</td>
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

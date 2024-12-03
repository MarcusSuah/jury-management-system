@extends('panel.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">User Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">User List</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
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
                                    <p class="text-truncate font-size-14 mb-2">Jury</p>
                                    <h4 class="mb-2">598</h4>
                                    <p class="text-muted mb-0"><span class="text-primary fw-bold font-size-18 me-2">Total
                                            Jurors
                                        </span></p>
                                </div>
                                <div class="avatar-lg">
                                    <span class="avatar-title bg-light text-primary rounded-3">
                                        <i class="fa-solid fa-users"></i>
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
                                    <p class="text-truncate font-size-14 mb-2">Category</p>
                                    <h4 class="mb-2">7</h4>
                                    <p class="text-muted mb-0"><span class="text-warning fw-bold font-size-18 me-2">Judges
                                            Category</span></p>
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
                                    <p class="text-truncate font-size-14 mb-2">Judges</p>
                                    <h4 class="mb-2">938</h4>
                                    <p class="text-muted mb-0"><span class="text-info fw-bold font-size-18 me-2">Total
                                            Judges
                                        </span></p>
                                </div>
                                <div class="avatar-lg">
                                    <span class="avatar-title bg-light text-info rounded-3">
                                        <i class="fa-solid fa-gavel"></i>
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
                                    <p class="text-truncate font-size-14 mb-2">Cases</p>
                                    <h4 class="mb-2">1238</h4>
                                    <p class="text-muted mb-0"><span class="text-danger fw-bold font-size-18 me-2">Total
                                            Cases</span></p>
                                </div>
                                <div class="avatar-lg">
                                    <span class="avatar-title bg-light text-danger rounded-3">
                                        <i class="fa-solid fa-newspaper"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <a href="{{ url('panel/user/add') }}" class="py-2 mt-4 mr-6">
                                <button class="btn btn-primary float-lg-end">Add New
                                    User</button>
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">User Table</h5>
                                <div class="table-responsive col-sm">
                                    @include('_message')
                                    <table id="example" class="display nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col"> Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Date Created</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="col-sm ">
                                            @foreach ($getRecord as $value)
                                                <tr>
                                                    <th scope="row">{{ $value->id }}</th>
                                                    <td>{{ $value->name }}</td>
                                                    <td>{{ $value->email }}</td>
                                                    <td>{{ $value->created_at }}</td>
                                                    <td>
                                                        <a href="{{ url('panel/user/edit/' . $value->id) }}"
                                                            class="btn btn-success btn-sm"><i
                                                                class="bi bi-pencil-square mr-4">Edit</i></a>
                                                        <a href="{{ url('panel/user/delete/' . $value->id) }}"
                                                            class="btn btn-danger btn-sm"><i
                                                                class="bi bi-trash3-fill mr-4">Delete</i></a>

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
        <!-- End Page-content -->


    </div>
@endsection

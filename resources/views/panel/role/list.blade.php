@extends('panel.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Roles Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Jury admin</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <a href="{{ url('panel/role/add') }}" class="py-2 mt-4 mr-6">
                            <button class="btn btn-primary float-lg-end">Add New
                                Role</button>
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Roles</h5>
                            <div class="table-responsive col-sm">
                                @include('_message')
                                <table id="example" class="display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col"> Name</th>
                                            <th scope="col">Date Created</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="col-sm ">
                                        @foreach ($getRecord as $value)
                                            <tr>
                                                <th scope="row">{{ $value->id }}</th>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->created_at }}</td>
                                                <td>
                                                    <a href="{{ url('panel/role/edit/' . $value->id) }}"
                                                        class="btn btn-success btn-sm"><i
                                                            class="bi bi-pencil-square mr-4">Edit</i></a>
                                                    <a href="{{ url('panel/role/delete/' . $value->id) }}"
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
        <!-- End Page-content -->


    </div>
@endsection

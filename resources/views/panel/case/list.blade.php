@extends('panel.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Case Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Case</a></li>
                                <li class="breadcrumb-item active">Admin Dashboard</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Cases</p>
                                    <h4 class="mb-2">{{ $finished_case }}</h4>
                                    <p class="text-muted mb-0"><span class="text-success fw-bold font-size-18 me-2">Finished
                                            Cases
                                        </span></p>
                                </div>
                                <div class="avatar-lg">
                                    <span class="avatar-title bg-light text-success rounded-3">
                                        <i class="fa-solid fa-file-circle-check"></i>
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
                                    <p class="text-truncate font-size-14 mb-2">Case Type</p>
                                    <h4 class="mb-2">{{ $important_case }}</h4>
                                    <p class="text-muted mb-0"><span
                                            class="text-warning fw-bold font-size-18 me-2">Important Cases
                                        </span></p>
                                </div>
                                <div class="avatar-lg">
                                    <span class="avatar-title bg-light text-warning rounded-3">
                                        <i class="fa-solid fa-file-circle-exclamation"></i>
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
                                    <p class="text-truncate font-size-14 mb-2">Case Type</p>
                                    <h4 class="mb-2">{{ $ongoing_case }}</h4>
                                    <p class="text-muted mb-0"><span class="text-primary fw-bold font-size-18 me-2">Ongoing
                                            Cases
                                        </span></p>
                                </div>
                                <div class="avatar-lg">
                                    <span class="avatar-title bg-light text-primary rounded-3">
                                        <i class="fa-solid fa-file-zipper"></i>
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
                                    <p class="text-truncate font-size-14 mb-2">Case Type</p>
                                    <h4 class="mb-2">{{ $pending_case }}</h4>
                                    <p class="text-muted mb-0"><span
                                            class="text-secondary fw-bold font-size-18 me-2">Pending Case
                                        </span></p>
                                </div>
                                <div class="avatar-lg">
                                    <span class="avatar-title bg-light text-secondary rounded-3">
                                        <i class="fa-solid fa-clock"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ url('panel/case/add') }}">
                                <button class="btn btn-primary float-lg-end">Add Case</button>
                            </a>
                            <h4 class="card-title">View Case</h4>
                            <p class="card-title-desc">Here are the list of Cases</p>
                            <div class="table-responsive col-sm">
                                @include('_message')
                                <table id="example" class="display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Case Number</th>
                                            <th>Title</th>
                                            <th>Case Type</th>
                                            <th>Court Date</th>
                                            <th>Case Status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="col-sm ">
                                        @foreach ($getRecord as $value)
                                            <tr>
                                                <th scope="row">{{ $value->id }}</th>
                                                <td>{{ $value->case_no }}</td>
                                                <td>{{ $value->title }}</td>
                                                <td>{{ $value->case_type }}</td>
                                                <td>{{ $value->court_date }}</td>
                                                <td>{{ $value->status }}</td>
                                                <td>{{ $value->created_at }}</td>
                                                <td>
                                                    <a href="{{ url('panel/case/edit/' . $value->id) }}"
                                                        class="btn btn-success btn-sm"><i
                                                            class="fa-solid fa-pen-to-square"></i>Edit</a>
                                                    <a href="{{ url('panel/case/delete/' . $value->id) }}"
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

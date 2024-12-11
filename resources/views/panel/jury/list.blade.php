@extends('panel.layouts.app')

@section('content')
    <section class="section dashboard">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Jury Dashboard</h4>

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
                    <div class="col-xl-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-truncate font-size-14 mb-2">Jury</p>
                                        <h4>{{ $jurors_count }}</h4>
                                        <p class="text-muted mb-0"><span
                                                class="text-primary fw-bold font-size-18 me-2">Total Jurors
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
                                        <p class="text-muted mb-0"><span
                                                class="text-warning fw-bold font-size-18 me-2">Judges
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
                                        <h4 class="mb-2"></h4>
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
                                        <h4 class="mb-2"></h4>
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
                                <div class="card-body">
                                    <a href="{{ url('panel/jury/add') }}">
                                        <button class="btn btn-primary float-lg-end">Add
                                            Jury</button>
                                    </a>
                                    <h4 class="card-title mb-4">Jury List</h4>
                                    <div class="table-responsive col-sm">
                                        @include('_message')
                                        <table id="example" class="display nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>D.O.B</th>
                                                    <th>Gender</th>
                                                    <th>Contact</th>
                                                    <th>Address</th>
                                                    <th>Occupation</th>
                                                    <th>Work Address</th>
                                                    <th>Race</th>
                                                    <th>Nationality</th>
                                                    <th>Country</th>
                                                    <th>City</th>
                                                    <th>District</th>
                                                    <th>Created At</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="col-sm ">
                                                @foreach ($result as $value)
                                                    <tr>
                                                        <th scope="row">{{ $value['id'] }}</th>
                                                        <td>{{ $value['name'] }}</td>
                                                        <td>{{ $value['email'] }}</td>
                                                        <td>{{ $value['dob'] }}</td>
                                                        <td>{{ $value['gender'] }}</td>
                                                        <td>{{ $value['contact'] }}</td>
                                                        <td>{{ $value['address'] }}</td>
                                                        <td>{{ $value['occupation'] }}</td>
                                                        <td>{{ $value['work_add'] }}</td>
                                                        <td>{{ $value['race'] }}</td>
                                                        <td>{{ $value['nationality'] }}</td>
                                                        <td>{{ $value['country'] }}</td>
                                                        <td>{{ $value['city'] }}</td>
                                                        <td>{{ $value['district'] }}</td>
                                                        <td>{{ $value['created_at'] }}</td>
                                                        <td>
                                                            @if($value['status'] == '0')
                                                                <a class="btn-sm btn-warning">Pending</a>
                                                            @elseif($value['status'] == '1')
                                                                <a class="btn-sm btn-success">Approved</a>
                                                            @elseif($value['status'] == '2')
                                                            <a class="btn-sm btn-danger">Denied</a>
                                                            @else
                                                                <a class="btn-sm btn-danger">Disabled</a>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($value['approved'] != '' && $value['approved'] == 'no')
                                                        <a href="{{ url('panel/jury/approve/' . $value['id']) }}"
                                                            class="btn btn-primary btn-sm" title="Approve"><i
                                                                class="fa-solid fa-check"></i></a>
                                                        <a href="{{ url('panel/jury/deny/' . $value['id']) }}"
                                                            class="btn btn-danger btn-sm" title="Deny"><i
                                                                class="fa-solid fa-close"></i></a>
                                                        @endif

                                                        <a href="{{ url('panel/jury/edit/' . $value['id']) }}"
                                                            class="btn btn-success btn-sm" title="Edit"><i
                                                                class="fa-solid fa-pen-to-square"></i></a>

                                                        @if($value['role_status'] != '' && $value['role_status'] == 'yes')
                                                            <a href="{{ url('panel/jury/disable/' . $value['id']) }}"
                                                                    class="btn btn-danger btn-sm" title="Disable"><i
                                                                        class="fa-solid fa-close"></i></a>
                                                        @else
                                                            <a href="{{ url('panel/jury/activate/' . $value['id']) }}"
                                                            class="btn btn-primary btn-sm" title="Activate"><i
                                                                class="fa-solid fa-check"></i></a>
                                                        @endif

                                                        <a href="{{ url('panel/jury/delete/' . $value['id']) }}"
                                                            class="btn btn-danger btn-sm" title="Delete"><i
                                                                class="bi bi-trash3-fill mr-4"><i
                                                                    class="fa-solid fa-trash"></i></a>
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

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Jury Management System.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Designed <i class="mdi mdi-heart text-danger"></i> by Marcus
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

        </div>



    </section>
@endsection

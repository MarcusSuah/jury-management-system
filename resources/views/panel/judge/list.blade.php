@extends('panel.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">


            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">

                        <h4 class="mb-sm-0">Judges Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Judges admin</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                @include('_message')
                                <a href="{{ url('panel/judge/add') }}">
                                    <button class="btn btn-primary float-lg-end">Add
                                        Judge</button>
                                </a>
                                <h4 class="card-title mb-4">Judges List</h4>
                                <div class="table-responsive col-sm">
                                    <table id="example" class="table table-striped display nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Gender</th>
                                                <th>DOB</th>
                                                <th>Nationality</th>
                                                <th>City</th>
                                                <th>Email</th>
                                                <th>Contact</th>
                                                <th>Address</th>
                                                <th>Position</th>
                                                <th>Year of Exp.</th>
                                                <th>Creation Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="col-sm ">
                                            @foreach ($result as $value)
                                                <tr>
                                                    <th scope="row">{{ $value['judge_id'] }}</th>
                                                    <td>{{ $value['name'] }}</td>
                                                    <td>{{ $value['gender'] }}</td>
                                                    <td>{{ $value['dob'] }}</td>
                                                    <td>{{ $value['country'] }}</td>
                                                    <td>{{ $value['city'] }}</td>
                                                    <td>{{ $value['email'] }}</td>
                                                    <td>{{ $value['contact'] }}</td>
                                                    <td>{{ $value['address'] }}</td>
                                                    <td>{{ $value['specialization'] }}</td>
                                                    <td>{{ $value['yr_exp'] }}</td>
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
                                                        <a href="{{ url('panel/judge/approve/' . $value['id']) }}"
                                                            class="btn btn-primary btn-sm" title="Approve"><i
                                                                class="fa-solid fa-check"></i></a>
                                                        <a href="{{ url('panel/judge/deny/' . $value['id']) }}"
                                                            class="btn btn-danger btn-sm" title="Deny"><i
                                                                class="fa-solid fa-close"></i></a>
                                                        @endif
                                                        <a href="{{ url('panel/judge/edit/' . $value['judge_id']) }}"
                                                            class="btn btn-success btn-sm" title="Edit"><i
                                                                class="fa-solid fa-pen-to-square"></i></a>

                                                        @if($value['role_status'] != '' && $value['role_status'] == 'yes')
                                                            <a href="{{ url('panel/judge/disable/' . $value['id']) }}"
                                                                    class="btn btn-danger btn-sm" title="Disable"><i
                                                                        class="fa-solid fa-close"></i></a>
                                                        @else
                                                            <a href="{{ url('panel/judge/activate/' . $value['id']) }}"
                                                            class="btn btn-primary btn-sm" title="Activate"><i
                                                                class="fa-solid fa-check"></i></a>
                                                        @endif

                                                        <a href="{{ url('panel/judge/delete/' . $value['id']) }}"
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


                <!-- View Modal -->
                <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="viewModalLabel">View Judge Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Judge details will be populated here -->
                                <h4>John Doe</h4>
                                <p><strong>Date of Birth:</strong> 1970-05-15</p>
                                <p><strong>Email:</strong> john.doe@example.com</p>
                                <p><strong>Phone:</strong> (555) 123-4567</p>
                                <p><strong>Address:</strong> 123 Main St, Anytown, USA 12345</p>
                                <p><strong>Specialization:</strong> Criminal Law</p>
                                <p><strong>Years of Experience:</strong> 15</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Judge</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <!-- Add form fields similar to the add_judge.html form -->
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

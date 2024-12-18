@extends('panel.layouts.app')

@section('content')
    <section class="section dashboard">

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Assignment List</h4>
                                <div class="table-responsive col-sm">
                                    @include('_message')
                                    <table id="example" class="display nowrap" style="width:100%">
                                        <thead>
                                            <tr class="fs-6 fw-normal font-monospace">
                                                <th>ID</th>
                                                <th>COURT NAME</th>
                                                <th>COURT LOCATION</th>
                                                <th>COURT TYPE</th>
                                                <th>COURT CATEGORY</th>
                                                <th>ASSIGNED CASE</th>
                                                <th>CASE START DATE</th>
                                                <th>CASE END DATE</th>
                                                <th>CASE STATUS</th>
                                            </tr>
                                        </thead>
                                        <tbody class="col-sm ">
                                            @foreach ($getRecord as $value)
                                                <tr>
                                                    <th scope="row">{{ $value->id }}</th>
                                                    <td>{{ $value->name }}</td>
                                                    <td>{{ $value->location }}</td>
                                                    <td>{{ $value->type }}</td>
                                                    <td>{{ $value->category }}</td>
                                                    <td>{{ $value->case_no }}</td>
                                                    <td>{{ $value->start_date }}</td>
                                                    <td>{{ $value->end_date }}</td>
                                                    <td>
                                                        @if ($value->status == 0)
                                                            <a class="btn btn-sm btn-danger">Inactive</a>
                                                        @else
                                                            <a class="btn btn-sm btn-success">Active</a>
                                                        @endif
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

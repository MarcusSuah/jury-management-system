@extends('panel.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">View Questionnaire Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Questionnaire</a></li>
                                <li class="breadcrumb-item active">Admin Table</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ url('panel/questionnaire/add') }}">
                                <button class="btn btn-primary float-lg-end">Add
                                    Questionnaire</button>
                            </a>
                            <h4 class="card-title mb-4">View Questionnaire List</h4>
                            <div class="table-responsive col-sm">
                                @include('_message')
                                <table id="example" class="display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Questionnaire Title</th>
                                            <th scope="col">Case Number</th>
                                            <th scope="col">Questionnaire</th>
                                            <th scope="col">Creation Date</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="col-sm ">
                                        @foreach ($getRecord as $value)
                                            <tr>
                                                <th scope="row">{{ $value->id }}</th>
                                                <td>{{ $value->questionnaire_title }}</td>
                                                <td>{{ $value->case_number }}</td>
                                                <td>{{ $value->questionnaire }}</td>
                                                <td>{{ $value->created_at }}</td>
                                                <td>

                                                    <a href="{{ url('panel/questionnaire/edit/' . $value->id) }}"
                                                        class="btn btn-success btn-sm"><i
                                                            class="fa-solid fa-pen-to-square"></i>Edit</a>
                                                    <a href="{{ url('panel/questionnaire/delete/' . $value->id) }}"
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

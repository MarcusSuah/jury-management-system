@extends('panel.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('_message')
                            <h4 class="card-title">Summon List</h4>
                            <a href="{{ route('panel/summon/add') }}">
                                <button class="btn btn-primary float-lg-end">Add
                                    Summon</button>
                            </a>
                            <p class="card-title-desc">Here are the list of Summon</p>
                            <div class="table-responsive col-sm">
                                <table id="example" class="display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Address</th>
                                            <th>Summon Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="col-sm ">
                                        @foreach ($getRecord as $value)
                                            <tr>
                                                <th scope="row">{{ $value->id }}</th>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>{{ $value->category }}</td>
                                                <td>{{ $value->address }}</td>
                                                <td>{{ \Carbon\Carbon::parse($value->created_at)->format('l, d F, Y \\a\\t h:i A') }}
                                                </td>
                                                <td>
                                                    <a title="View Message" href="#"
                                                        class="btn btn-primary btn-sm viewMsg"><i
                                                            class="fa-solid fa-eye"></i> Message
                                                        <!-- Modal -->
                                                        <div class="modal msgModal" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            {{ $value->name }} Summon Message</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body " value="message">
                                                                        <p
                                                                            style="
                                                                color: #080804;
                                                                width: 100%;
                                                                text-wrap: initial;
                                                                text-align: left;
                                                                font-size: 16px;
                                                            ">
                                                                            {{ base64_decode($value->message) }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>

                                                    <a href="{{ url('panel/summon/edit/' . $value->id) }}"
                                                        class="btn btn-success btn-sm"><i
                                                            class="fa-solid fa-pen-to-square"></i> Edit</a>
                                                    <a href="{{ url('panel/summon/delete/' . $value->id) }}"
                                                        class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill mr-4"><i
                                                                class="fa-solid fa-trash"></i> Delete</a>
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
@section('script')
    <script>
        $(document).ready(function() {
            $.each($(".viewMsg"), function() {
                $(this).click(function() {
                    $(this).find(".msgModal").css("display", "flex");
                    $(this).find(".msgModal").css("opacity", "1");
                    $(this).find(".msgModal").addClass("show");
                });
            });

            $.each($(".btn-close"), function() {
                $(this).click(function() {
                    document.location.reload();
                    //  $(this).parent(".msgModal").css("display","done");
                    //  $(this).parent(".msgModal").css("opacity","0");
                    //  $(this).parent(".msgModal").removeClass("show");
                });
            });
        });
    </script>
@endsection

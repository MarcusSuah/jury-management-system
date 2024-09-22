@extends('panel.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Summon</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                <li class="breadcrumb-item active"> Dashboard</li>
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
                                    <p class="text-truncate font-size-14 mb-2">Summon</p>
                                    <h4 class="mb-2">120</h4>
                                    <p class="text-muted mb-0"><span class="text-warning fw-bold font-size-18 me-2">Total
                                            Summon</span>
                                    </p>
                                </div>
                                <div class="avatar-lg">
                                    <span class="avatar-title bg-light text-warning rounded-3">
                                        <i class="fa-solid fa-rectangle-list"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->

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
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->

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
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->



                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Case Type</p>
                                    <h4 class="mb-2">598</h4>
                                    <p class="text-muted mb-0"><span class="text-primary fw-bold font-size-18 me-2">Archive
                                            Cases
                                        </span></p>
                                </div>
                                <div class="avatar-lg">
                                    <span class="avatar-title bg-light text-primary rounded-3">
                                        <i class="fa-solid fa-file-zipper"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->

            </div><!-- end row -->

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
                                            <th>Category</th>
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
                                                <td>{{ $value->created_at }}</td>
                                                <td>
                                                    <a title="View Message" href="#" class="btn btn-primary btn-sm viewMsg"><i
                                                            class="fa-solid fa-eye"></i> Message
                                                        <!-- Modal -->
                                                    <div class="modal msgModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">{{ $value->name }} Summon Message</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body " value="message">
                                                                <p style="
                                                                color: #080804;
                                                                width: 100%;
                                                                text-wrap: initial;
                                                                text-align: left;
                                                                font-size: 16px;
                                                            ">{{ base64_decode($value->message) }}</p>
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
    $(document).ready(function(){
        $.each($(".viewMsg"),function(){
            $(this).click(function(){
                $(this).find(".msgModal").css("display","flex");
                $(this).find(".msgModal").css("opacity","1");
                $(this).find(".msgModal").addClass("show");
            });
        });

        $.each($(".btn-close"),function(){
            $(this).click(function(){
                document.location.reload();
                //  $(this).parent(".msgModal").css("display","done");
                //  $(this).parent(".msgModal").css("opacity","0");
                //  $(this).parent(".msgModal").removeClass("show");
            });
        });
    });
    
</script>
@endsection
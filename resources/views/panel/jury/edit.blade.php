@extends('panel.layouts.app')

@section('content')
    <div class="container py-5 z-3">
        <div class="row">
            <div class="card mx-auto p-2 z-3 col-8">
                <div class="card-body ">
                    <h1 class="card-title text-center py-lg-4 text-blue">Jury Edit Form </h1>
                    @include('_message')
                    <form class="row g-3" action="" method="post">
                        {{ csrf_field() }}
                        <div class="col-md-6">
                            <label for="inputName" class="form-label">Your Name:</label>
                            <input type="text" class="form-control" name="name" value="{{ $data->name ?? '' }}">
                        </div>

                        <div class="col-md-6">
                            <label for="inputEmail" class="form-label">Email:</label>
                            <input type="email" class="form-control" name="email" value="{{ $data->email ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label for="inputDate" class="form-label">Date of Birth:</label>
                            <input type="date" class="form-control" name="dob">
                        </div>
                        <div class="col-md-6">
                            <label for="inputState" class="form-label">Gender</label>
                            <select id="inputState" class="form-select" name="gender">
                                @if ($data->gender == 'Male')
                                    <option value="{{ $data->gender }}" selected>Male</option>
                                    <option value="Female">Female</option>
                                @elseif($data->gender == 'Female')
                                    <option value="{{ $data->gender }}" selected>Female</option>
                                    <option value="Male">Male</option>
                                @else
                                    <option value="" selected>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputContactNumber" class="form-label">Contact:
                            </label>
                            <input type="number" class="form-control" name="contact" value="{{ $data->contact ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label for="inputAddress" class="form-label">Address:</label>
                            <input type="text" class="form-control" name="address" value="{{ $data->address ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label for="inputOccupation" class="form-label">Occupation:</label>
                            <input type="text" class="form-control" name="occupation"
                                value="{{ $data->occupation ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label for="inputAddress" class="form-label">Work
                                Address:</label>
                            <input type="text" class="form-control" name="work_add" value="{{ $data->work_add ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label for="inputRace" class="form-label">Race:</label>
                            <input type="text" class="form-control" name="race" value="{{ $data->race ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label for="inputNationality" class="form-label">Nationlity:</label>
                            <input type="text" class="form-control" name="nationality"
                                value="{{ $data->nationality ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label for="inputZip" class="form-label">Country:</label>
                            <input type="text" class="form-control" name="country" value="{{ $data->country ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label for="inputCity" class="form-label">City:</label>
                            <input type="text" class="form-control" name="city" value="{{ $data->city ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label for="inputDistrict" class="form-label">District:</label>
                            <input type="text" class="form-control" name="district"
                                value="{{ $data->district ?? '' }}">
                        </div>
                        <div class="mb-2">
                            <button type="submit" class="btn btn-primary col-md-3 mb-2">Update</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

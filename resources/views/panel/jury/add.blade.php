@extends('panel.layouts.app')

@section('content')
    <div class="container py-5 z-3">
        <div class="row">
            <div class="card mx-auto p-2 z-3 col-6">
                <div class="card-body ">
                    <h1 class="card-title text-center py-lg-4 text-blue">Jury Registration Form </h1>
                    @include('_message')
                    <form class="row g-3" action="" method="post">
                        {{ csrf_field() }}
                        <div class="col-md-12">
                            <label for="inputName" class="form-label">Your Name:</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="col-md-12">
                            <label for="inputDate" class="form-label">Date of Birth:</label>
                            <input type="date" class="form-control" name="dob">
                        </div>
                        <div class="col-md-12">
                            <label for="inputState" class="form-label">Gender</label>
                            <select id="inputState" class="form-select" name="gender">
                                <option selected disabled>Select Gender</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="inputContactNumber" class="form-label">Contact:
                            </label>
                            <input type="number" class="form-control" name="contact">
                        </div>
                        <div class="col-md-12">
                            <label for="inputAddress" class="form-label">Address:</label>
                            <input type="text" class="form-control" name="address">
                        </div>
                        <div class="col-md-12">
                            <label for="inputOccupation" class="form-label">Occupation:</label>
                            <input type="text" class="form-control" name="occupation">
                        </div>
                        <div class="col-md-12">
                            <label for="inputAddress" class="form-label">Work
                                Address:</label>
                            <input type="text" class="form-control" name="work_add">
                        </div>
                        <div class="col-md-12">
                            <label for="inputRace" class="form-label">Race:</label>
                            <input type="text" class="form-control" name="race">
                        </div>
                        <div class="col-md-12">
                            <label for="inputNationality" class="form-label">Nationlity:</label>
                            <input type="text" class="form-control" name="nationality">
                        </div>
                        <div class="col-md-12">
                            <label for="inputZip" class="form-label">Country:</label>
                            <input type="text" class="form-control" name="country">
                        </div>
                        <div class="col-md-12">
                            <label for="inputCity" class="form-label">City:</label>
                            <input type="text" class="form-control" name="city">
                        </div>
                        <div class="col-md-12">
                            <label for="inputDistrict" class="form-label">District:</label>
                            <input type="text" class="form-control" name="district">
                        </div>
                        <div class="col-md-12">
                            <label for="inputEmail" class="form-label">Email:</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="col-md-12">
                            <label for="inputEmail" class="form-label">Password:</label>
                            <input type="password" class="form-control" name="password" min-length="6" max-length="30" required>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

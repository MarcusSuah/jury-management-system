@extends('panel.layouts.app')

@section('content')
    <div class="container py-2 z-3">
        <div class="row">
            <div class="card mx-auto p-2 z-3 col-lg-8">
                <div class="card-body py-5">
                    <h1 class="card-title text-center py-lg-4">Edit Judge Form</h1>
                    @include('_message')
                    <form class="row g-3" action="" method="post">
                        {{ csrf_field() }}

                        <div class="col-md-6">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $getRecord->name }}">
                        </div>

                        <div class="col-md-3">
                            <label for="inputState" class="form-label">Court Gender</label>
                            <select id="inputState" class="form-select" name="gender">
                                @if ($getRecord->gender == 'Male')
                                    <option value="{{ $getRecord->gender }}" selected>Male</option>
                                    <option value="Female">Female</option>
                                @elseif($getRecord->gender == 'Female')
                                    <option value="{{ $getRecord->gender }}" selected>Female</option>
                                    <option value="Male">Male</option>
                                @else
                                    <option value="" selected>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" name="dob" value="{{ $getRecord->dob }}">
                        </div>
                        <div class="col-md-6">
                            <label for="inputZip" class="form-label">Nationality</label>
                            <input type="text" class="form-control" name="country" value="{{ $getRecord->country }}">
                        </div>
                        <div class="col-md-3">
                            <label for="inputCity" class="form-label">City</label>
                            <input type="text" class="form-control" name="city" value="{{ $getRecord->city }}">
                        </div>
                        <div class="col-md-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $getRecord->email }}">
                        </div>
                        <div class="col-md-4">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" class="form-control" name="contact" value="{{ $getRecord->contact }}">
                        </div>

                        <div class="col-md-4">
                            <label for="specialization" class="form-label">Specialization</label>
                            <input type="text" class="form-control" name="specialization"
                                value="{{ $getRecord->specialization }}">
                        </div>
                        <div class="col-md-4">
                            <label for="years-experience" class="form-label">Years of Experience</label>
                            <input type="text" class="form-control" name="yr_exp" value="{{ $getRecord->yr_exp }}">
                        </div>
                        <div class="col-md-12">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" name="address" rows="2" value="{{ $getRecord->address }}">{{ $getRecord->address }}</textarea>
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

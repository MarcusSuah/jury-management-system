@extends('panel.layouts.app')

@section('content')
    <div class="container py-5 z-3">
        <div class="row">
            <div class="card mx-auto p-2 z-3" style="width: 600px;">
                <div class="card-body py-5">
                    <h1 class="card-title text-center py-lg-4">Add Judge Form</h1>
                    @include('_message')
                    <form class="row g-3" action="" method="post">
                        {{ csrf_field() }}
                        <div class="col-md-12 mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>

                        <div class="col-md-12">
                            <label for="inputState" class="form-label">Gender</label>
                            <select id="inputState" class="form-select" name="gender">
                                <option selected disabled>Select Gender</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" name="dob" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="inputNationality" class="form-label">Nationality</label>
                            <input type="text" class="form-control" name="country" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="inputCity" class="form-label">City</label>
                            <input type="text" class="form-control" name="city" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" class="form-control" name="contact" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" name="address" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="specialization" class="form-label">Specialization</label>
                            <input type="text" class="form-control" name="specialization">
                        </div>
                        <div class="mb-3">
                            <label for="years-experience" class="form-label">Years of Experience</label>
                            <input type="text" class="form-control" name="yr_exp" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" min-length="6" max-length="30" required>
                        </div>

                        <div class="mb-2">
                            <button type="submit" class="btn btn-primary col-md-3 mb-2">Submit</button>
                            <button type="cancel" class="btn btn-danger col-md-3 mb-2"><a
                                    href="panel/judge">Cancel</a></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

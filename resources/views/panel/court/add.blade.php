@extends('panel.layouts.app')

@section('content')
    <div class="container py-3 z-3">
        <div class="row">
            <div class="card mx-auto p-3 z-3 col-8">
                <div class="card-body py-5">
                    <h1 class="card-title text-center py-lg-4">Add Court Form </h1>
                    @include('_message')
                    <form class="row g-3" action="" method="post">
                        {{ csrf_field() }}
                        <div class="col-md-12">
                            <label for="inputCourt" class="form-label">Court Name</label>
                            <input type="text" class="form-control" name="name" placeholder="enter court name">
                        </div>

                        <div class="col-md-6">
                            <label for="inputEmail" class="form-label">Court Type</label>
                            <select id="inputType" class="form-select" name="type">
                                <option selected disabled>Select Court Type</option>
                                <option>Supreme Court</option>
                                <option>Criminal and Assizes Court</option>
                                <option> Circuit Courts</option>
                                <option>Debt Courts</option>
                                <option>Magistrate Courts</option>
                                <option>Monthly & Probate Court</option>
                                <option>Tax Court</option>
                                <option>The Commercial Court </option>
                                <option>National Labor Court</option>
                                <option>Traffic Court</option>
                                <option>Juvenile Court</option>
                                <option>Revenue Court</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputLocation" class="form-label">Court Location</label>
                            <input type="text" class="form-control" name="location" placeholder="enter court location">
                        </div>

                        <div class="col-md-12">
                            <label for="inputState" class="form-label">Court Category</label>
                            <select id="inputState" class="form-select" name="category">
                                <option selected disabled>Select Court Category</option>
                                <option>Supreme Court</option>
                                <option>High Court</option>
                                <option>District Court</option>
                                <option>Migisterial Court</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <button type="submit" class="btn btn-primary col-md-2">
                                <i class="fa-solid fa-floppy-disk"></i>Submit</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

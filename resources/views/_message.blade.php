@if (!empty(session('success')))
    <div class="alert alert-success text-center fw-bold fs-5 text-primary" tabindex="-1" role="alert">
        {{ session('success') }}
    </div>
@endif

@if (!empty(session('error')))
    <div class="alert alert-danger text-center fw-bold fs-5 text-danger" role="alert">
        {{ session('error') }}
    </div>
@endif

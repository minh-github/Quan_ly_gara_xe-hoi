@if (session()->has('success'))
    <div class="card-body" style="position: absolute; z-index:99999; transform:translateX(calc(50vw - 50%))">
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="background: #e7f8e8">
            <div class="alert-content">
                <p>{{ session('success') }}</p>
                <button type="button" class="btn-close text-capitalize" data-bs-dismiss="alert" aria-label="Close">
                    <img src="img/svg/x.svg" alt="x" class="svg" aria-hidden="true">
                </button>
            </div>
        </div>
    </div>
@endif
@if (session()->has('error'))
    <div class="card-body" style="position: absolute; z-index:99999; transform:translateX(calc(50vw - 50%))">
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="background: #ffe7e8">
            <div class="alert-content">
                <p>{{ session('error') }}</p>
                <button type="button" class="btn-close text-capitalize" data-bs-dismiss="alert" aria-label="Close">
                    <img src="img/svg/x.svg" alt="x" class="svg" aria-hidden="true">
                </button>
            </div>
        </div>
    </div>
@endif

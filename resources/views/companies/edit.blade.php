@extends('layout.app')

@section('title', 'Signup')

@section('content')


    <div class="container card shadow-lg p-5 mt-5" style="max-width: 50%;">
        <form method="post" action="{{ route('companies.update', $company->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <h4 class="text-center text-primary font-weight-bold pb-4">Update Company</h4>
            <div class="form-group">
                <input type="text" name="company_name" value="{{ $company->company_name }}" class="form-control w-75 mx-auto rounded-pill shadow-sm" placeholder="Full Name" required>
            </div>
            <div class="form-group mt-3">
                <input type="email" name="email" value="{{ $company->email }}" class="form-control w-75 mx-auto rounded-pill shadow-sm" placeholder="Email" required>
            </div>
            <div class="form-group mt-3">
                <input type="text" name="website" value="{{ $company->website }}" class="form-control w-75 mx-auto rounded-pill shadow-sm" placeholder="Website" required>
            </div>
            <div class="form-group mt-3">
                <input type="file" name="logo" class="form-control w-75 mx-auto rounded-pill shadow-sm">
                <center>
                    @if($company->logo)
                    <img src="{{ asset('uploads/CompanyLogo/' . $company->logo) }}" alt="Logo" style="width:50px;margin-top:22px">
                    @endif
                </center>
            </div>
            <div class="form-group text-center mt-4">
                <button type="submit" class="btn btn-primary px-5 py-1 rounded-pill shadow">Save</button>
            </div>
        </form>
    </div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    @if(session('success'))
        Toastify({
            text: "{{ session('success') }}",
            duration: 5000,
            gravity: "top",
            position: "right",
            backgroundColor: "green",
        }).showToast();
        document.querySelector("form").reset();
    @endif

    @if(session('error'))
        Toastify({
            text: "{{ session('error') }}",
            duration: 5000,
            gravity: "top",
            position: "right",
            backgroundColor: "red",
        }).showToast();
    @endif

    @if($errors->any())
        @foreach($errors->all() as $error)
            Toastify({
                text: "{{ $error }}",
                duration: 5000,
                gravity: "top",
                position: "right",
                backgroundColor: "orange",
            }).showToast();
        @endforeach
    @endif
});
</script>
@endsection

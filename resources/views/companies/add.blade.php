@extends('layout.app')

@section('title', 'Signup')

@section('content')

<div class="container card shadow-lg p-5 mt-5" style="max-width: 50%;">
    <form method="post" action="{{ route('companies.store') }}" enctype="multipart/form-data" onsubmit="showLoader(event)">

        @csrf
        <h4 class="text-center text-primary font-weight-bold pb-4">Create Company</h4>
        <div class="form-group">
            <input type="text" name="company_name" class="form-control w-75 mx-auto rounded-pill shadow-sm" placeholder="Full Name" required>
        </div>
        <div class="form-group mt-3">
            <input type="email" name="email" class="form-control w-75 mx-auto rounded-pill shadow-sm" placeholder="Email" required>
        </div>
        <div class="form-group mt-3">
            <input type="text" name="website" class="form-control w-75 mx-auto rounded-pill shadow-sm" placeholder="Website" required>
        </div>
        <div class="form-group mt-3">
            <input type="file" name="logo" class="form-control w-75 mx-auto rounded-pill shadow-sm" required>
        </div>

        <div class="form-group text-center mt-4">
            <button type="submit" id="submitBtn" class="btn btn-primary px-5 py-1 rounded-pill shadow">Save</button>
        </div>

        <input type="hidden" name="role" value="employee">

        <!-- Loader (Hidden Initially) -->
        <div id="loader" class="text-center mt-3" style="display: none;">
            <div class="spinner-border text-primary" role="status">
                <span class="sr-only">Processing...</span>
            </div>
            <p class="text-primary mt-2">Sending Email...</p>
        </div>

    </form>
</div>


<script>

function showLoader(event) {
        event.preventDefault(); // Prevent default form submission
        document.getElementById("submitBtn").disabled = true; // Disable button
        document.getElementById("loader").style.display = "block"; // Show loader
        event.target.submit(); // Submit the form after showing loader
    }

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

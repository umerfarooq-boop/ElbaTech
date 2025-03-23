@extends('layout.app')

@section('title', 'Signup')

@section('content')

<div class="container card shadow-lg p-5 mt-5" style="max-width: 50%;">
    <form method="post" action="{{ route('register') }}">

        @csrf
        <h4 class="text-center text-primary font-weight-bold pb-4">Signup User</h4>
        <div class="form-group">
            <input type="text" name="name" class="form-control w-75 mx-auto rounded-pill shadow-sm" placeholder="Full Name" required>
        </div>
        <div class="form-group mt-3">
            <input type="email" name="email" class="form-control w-75 mx-auto rounded-pill shadow-sm" placeholder="Email" required>
        </div>
        <div class="form-group mt-3">
            <input type="password" name="password" class="form-control w-75 mx-auto rounded-pill shadow-sm" placeholder="Password" required>
        </div>
        <div class="form-group text-center mt-4">
            <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill shadow">Sign Up</button>
        </div>
        <input type="hidden" name="role" value="employee">

        <div class="text-center mt-3">
            <a href="{{route('login')}}" class="text-primary">Already have an account? Login</a>
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
        setTimeout(() => {
            window.location.href = "{{ route('login') }}";
        }, 1500);
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

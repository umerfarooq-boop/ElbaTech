@extends('layout.app')

@section('title', 'Login')

@section('content')

<div class="container card shadow-lg p-5 mt-5" style="max-width: 50%;">
    <form method="POST" action="{{ route('loginuser') }}">
        @csrf
        <h4 class="text-center text-primary font-weight-bold pb-4">Login User</h4>
        <div class="form-group">
            <input type="email" name="email" class="form-control w-75 mx-auto rounded-pill shadow-sm" placeholder="Email" required>
        </div>
        <div class="form-group mt-3">
            <input type="password" name="password" class="form-control w-75 mx-auto rounded-pill shadow-sm" placeholder="Password" required>
        </div>
        <div class="form-group text-center mt-4">
            <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill shadow">Login</button>
        </div>
        <div class="text-center mt-3">
            <a href="{{route('home')}}" class="text-primary">Don't have an account? Signup</a>
        </div>
    </form>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    @if(session('error'))
        Toastify({
            text: "{{ session('error') }}",
            duration: 5000,
            gravity: "top",
            position: "right",
            backgroundColor: "red",
        }).showToast();
        document.querySelector("form").reset();
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
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
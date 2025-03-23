@extends('layout.app')

@section('title', 'Signup')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-6 flex justify-content-center align-items-center mx-auto">
            <div class="container card shadow-lg p-5" style="max-width: 100%;">
                <form method="post" action="{{ url('reset_information/'.$employee->id) }}">
                    {{-- @method('PUT') --}}
                    @csrf
                    <h4 class="text-center text-primary font-weight-bold pb-4">Update User Infromation</h4>
                    <div class="form-group">
                        <input type="text" value="{{$employee->name}}" name="name" class="form-control w-75 mx-auto rounded-pill shadow-sm" placeholder="Name" required>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" name="email" value="{{$employee->email}}" class="form-control w-75 mx-auto rounded-pill shadow-sm" placeholder="Email" required>
                    </div>
                    <div class="form-group text-center mt-4">
                        <button type="submit" class="btn btn-primary px-5 py-1 rounded-pill shadow">Save</button>
                    </div>
                    <input type="hidden" name="role" value="employee">
            
                </form>
            </div>
        </div>
        {{-- <div class="col-6">
            <div class="container card shadow-lg p-5" style="max-width: 100%;">
                <form method="post">
                    @csrf
                    <h4 class="text-center text-primary font-weight-bold pb-4">Reset Password</h4>
                    <div class="form-group">
                        <input type="text" name="email" class="form-control w-75 mx-auto rounded-pill shadow-sm" placeholder="Email" required>
                    </div>
                    <div class="form-group text-center mt-4">
                        <button type="submit" class="btn btn-primary px-5 py-1 rounded-pill shadow">Save</button>
                    </div>
                    <input type="hidden" name="role" value="employee">
            
                </form>
            </div>
        </div> --}}
    </div>
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
            window.location.href = '{{route('employee_index')}}'
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

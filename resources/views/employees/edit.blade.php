@extends('layout.app')

@section('title', 'Signup')

@section('content')

<div class="container card shadow-lg p-5 mt-5" style="max-width: 50%;">
    <form method="post" action="{{ route('employees.update',$employee->id) }}">
        @method('PUT')
        @csrf
        <h4 class="text-center text-primary font-weight-bold pb-4">Update Employee</h4>
        <div class="form-group">
            <input type="text" name="fname" value="{{$employee->fname}}"  class="form-control w-75 mx-auto rounded-pill shadow-sm" placeholder="Full Name" required>
        </div>
        <div class="form-group mt-3">
            <input type="text" name="lname" value="{{$employee->lname}}" class="form-control w-75 mx-auto rounded-pill shadow-sm" placeholder="Email" required>
        </div>
        <div class="form-group mt-3">
            <input type="number" name="phone" value="{{$employee->phone}}" class="form-control w-75 mx-auto rounded-pill shadow-sm" placeholder="Website" required>
        </div>
        <div class="form-group mt-3">
            <input type="email" name="email" value="{{$employee->email}}" class="form-control w-75 mx-auto rounded-pill shadow-sm" placeholder="Email" required>
        </div>
        <div class="form-group mt-3">
            <select name="company_id" class="form-control w-75 mx-auto rounded-pill shadow-sm">
                <option disabled selected>Select Company</option>
                @foreach ($companies as $company)
                    <option  value="{{$company->id}}" selected {{$company->id === $employee->id}}>{{$company->company_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group text-center mt-4">
            <button type="submit" class="btn btn-primary px-5 py-1 rounded-pill shadow">Save</button>
        </div>
        <input type="hidden" name="role" value="employee">

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
            window.location.href = '{{route('employees.index')}}'
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

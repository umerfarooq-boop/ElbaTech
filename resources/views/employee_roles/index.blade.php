@extends('Layout.app')
@section('title','Company Record')

@section('content')
<div class="container shadow-lg p-4 bg-white rounded">
    <p class="h5 text-start text-primary font-weight-bold">Employee</p>
    <hr>
    <div class="p-3">
        <p class="h6 text-start text-dark font-weight-bold">Employee List</p>
        <table class="table table-hover table-striped shadow-sm rounded">
            <thead class="bg-light text-dark border">
                <tr>
                    <th scope="col">S_NO</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->role}}</td>
                    <td>
                        <div class="row align-items-center py-2">
                            <div class="col-md-4 mr-2">
                                <a href="{{ url('edit_employee/'.$employee->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            </div>
                            
                        </div>
                </tr>
            </tbody>
        </table>
    </div>
</div>


@endsection

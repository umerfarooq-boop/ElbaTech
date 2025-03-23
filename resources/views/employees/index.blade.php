@extends('Layout.app')
@section('title','Company Record')

@section('content')
<div class="container shadow-lg p-4 bg-white rounded">
    <p class="h5 text-start text-primary font-weight-bold">Employee</p>
    <hr>
    <a href="{{ route('employees.create') }}" class="btn btn-success mb-4 rounded-pill shadow-sm"><i class="fa-solid fa-plus"></i> Employee</a>
    <div class="p-3">
        <p class="h6 text-start text-dark font-weight-bold">Employee List</p>
        <table class="table table-hover table-striped shadow-sm rounded">
            <thead class="bg-light text-dark border">
                <tr>
                    <th scope="col">S_NO</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Company Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;
                @endphp
                @foreach ($employees as $employee)
                @php
                    $i ++;
                @endphp
                <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$employee->fname.' '.$employee->lname}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->phone}}</td>
                    <td>{{$employee->company->company_name ?? 'Not Found'}}</td>
                    <td>
                        <div class="row align-items-center py-2">
                            <div class="col-md-4 mr-2">
                                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            </div>
                            
                            <div class="col-sm-4">
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Employee?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                            
                        </div>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {!! $employees->links() !!}
        </div>
    </div>
</div>


@endsection

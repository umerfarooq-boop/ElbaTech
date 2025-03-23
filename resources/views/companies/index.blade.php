@extends('Layout.app')
@section('title', __('Company Record'))

@section('content')

<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    {{ __('messages.dashboard') }}
</h2>
<div class="container shadow-lg p-4 bg-white rounded">
    <p class="h5 text-start text-primary font-weight-bold">{{ __('companies')  }}</p>
    {{-- <h1>@lang('dashboard')</h1> --}}
    <hr>
    <a href="{{ route('companies.create') }}" class="btn btn-success btn-sm mb-4 shadow-sm">
        <i class="fa-solid fa-plus"></i> {{ __('Company') }}
    </a>
    <div class="p-3">
        <p class="h6 text-start text-dark font-weight-bold">{{ __('Company List') }}</p>
        <table class="table table-hover table-striped shadow-sm rounded">
            <thead class="bg-light text-dark border">
                <tr>
                    <th scope="col">{{ __('Company Name') }}</th>
                    <th scope="col">{{ __('Email') }}</th>
                    <th scope="col">{{ __('Website') }}</th>
                    <th scope="col">{{ __('Logo') }}</th>
                    <th scope="col">{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                <tr>
                    <th scope="row">{{ $company->company_name }}</th>
                    <td>{{ $company->email }}</td>
                    <td>{{ $company->website }}</td>
                    <td>
                        <img src="{{ asset('uploads/CompanyLogo/' . $company->logo) }}" class="border rounded-sm" alt="{{ __('Company Logo') }}" style="width: 50px; height: auto;">
                    </td>
                    <td>
                        <div class="row align-items-center py-2">
                            <div class="col-md-4 mr-2">
                                <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-primary btn-sm">{{ __('Edit') }}</a>
                            </div>
                            
                            <div class="col-sm-4">
                                <form action="{{ route('companies.destroy', $company->id) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure you want to delete this company?') }}');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">{{ __('Delete') }}</button>
                                </form>
                            </div>
                            
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {!! $companies->links() !!}
        </div>
    </div>
</div>


@endsection




@extends('layouts.admin.app')
@section('content')
    <div class="row">
        <div class="col-md-10 offset-1 mb-5">
            <div class="card text-capitalize">
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <a href="{{route('companies.index')}}"
                           class="w-25 mx-2 btn btn-primary btn-lg p-5">{{__('app.companies')}}</a>
                        <a href="{{route('employees.index')}}"
                           class="w-25 mx-2 btn btn-dark btn-lg p-5">{{__('app.employees')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

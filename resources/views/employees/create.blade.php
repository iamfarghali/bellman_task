@extends('layouts.admin.app')
@section('content')
    <div class="row">
        <div class="col-md-10 offset-1 mb-5">
            <div class="card card-primary text-capitalize">
                <div class="card-header">
                    <h3 class="card-title"
                        style="{{app()->isLocale('ar') ? 'float:right' : ''}}">{{__('app.add') .' '. __('app.employee')}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form role="form" method="POST" action="{{route('employees.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleEmployeeFirstName">{{__('app.firstName')}} <small
                                    class="text-warning">( {{__('app.required')}} )</small></label>
                            <input type="text"
                                   class="form-control @error('first_name') is-invalid @enderror"
                                   id="exampleEmployeeFirstName"
                                   name="first_name"
                                   value="{{old('first_name')}}">

                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleEmployeeLastName">{{__('app.lastName')}} <small
                                    class="text-warning">( {{__('app.required')}} )</small></label>
                            <input type="text"
                                   class="form-control @error('last_name') is-invalid @enderror"
                                   id="exampleEmployeeLastName"
                                   name="last_name"
                                   value="{{old('last_name')}}">

                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleEmployeeEmail">{{__('app.email')}}</label>
                            <input type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   id="exampleEmployeeEmail"
                                   name="email"
                                   value="{{old('email')}}">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleEmployeePhone">{{__('app.phone')}}</label>
                            <input type="text"
                                   class="form-control @error('phone') is-invalid @enderror"
                                   id="exampleEmployeePhone"
                                   name="phone"
                                   value="{{old('phone')}}">

                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{__('app.company')}} <small class="text-warning">( {{__('app.required')}} )</small></label>
                            <select class="form-control @error('company_id') is-invalid @enderror" name="company_id">
                                <option value="" disabled selected>{{__('app.selectCompany')}}</option>
                                @foreach($companies as $company)
                                    <option value="{{$company->id}}"
                                            @if($company->id == old('company_id')) selected @endif>{{$company->name}}</option>
                                @endforeach
                            </select>
                            @error('company_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit"
                                    class="btn btn-primary text-capitalize px-5">{{__('app.add')}}</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

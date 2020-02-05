@extends('layouts.admin.app')
@section('content')
    <div class="row">
        <div class="col-md-10 offset-1 mb-5">
            <div class="card card-primary text-capitalize">
                <div class="card-header">
                    <h3 class="card-title"
                        style="{{app()->isLocale('ar') ? 'float:right' : ''}}">{{__('app.add') .' '. __('app.company')}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form role="form" method="POST" action="{{route('companies.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleCompanyName">{{__('app.companyName')}} <small class="text-warning">( {{__('app.required')}} )</small></label>
                            <input type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   id="exampleCompanyName"
                                   name="name"
                                   value="{{old('name')}}">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleCompanyEmail">{{__('app.email')}}</label>
                            <input type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   id="exampleCompanyEmail"
                                   name="email"
                                   value="{{old('email')}}">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleCompanyURL">{{__('app.website')}}</label>
                            <input type="text"
                                   class="form-control @error('website') is-invalid @enderror"
                                   id="exampleCompanyURL"
                                   name="website"
                                   value="{{old('website')}}">

                            @error('website')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">{{__('app.logo')}}</label>
                            <div class="input-group">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                <input type="file" class="custom-file-input @error('logo') is-invalid @enderror" name="logo" id="exampleInputFile">
                                @error('logo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary text-capitalize px-5">{{__('app.add')}}</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

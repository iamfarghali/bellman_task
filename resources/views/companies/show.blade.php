@extends('layouts.admin.app')
@section('content')
    <div class="row">
        <div class="col-md-10 offset-1 mb-5">
            <div class="card text-capitalize">
                <div class="card-header">
                    <h3 class="card-title"
                        style="{{app()->isLocale('ar') ? 'float:right' : ''}}">{{__('app.company')}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="text-center">
                            <th style="width: 10px">#</th>
                            <th>{{__('app.companyName')}}</th>
                            <th>{{__('app.email')}}</th>
                            <th>{{__('app.website')}}</th>
                            <th>{{__('app.logo')}}</th>
                            <th>{{__('app.action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="text-center">
                            <td>{{$company->id}}</td>
                            <td>{{$company->name}}</td>
                            <td>
                                {{$company->email ?: __('app.notFound')}}
                            </td>
                            <td>
                                {{$company->website ?: __('app.notFound')}}
                            </td>
                            <td>
                                @if($company->logo)
                                    <img src="{{asset('storage/'.$company->logo)}}" width="150" height="150" alt="">
                                @else
                                    {{__('app.notFound')}}
                                @endif
                            </td>

                            <td class="text-center">
                                <a class="btn btn-info btn-sm"
                                   href="{{route('companies.edit', $company->id)}}">{{__('app.edit')}}</a>

                                <form action="{{route('companies.destroy', $company->id)}}" class="d-inline"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-outline-danger btn-sm">{{__('app.delete')}}</button>
                                </form>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

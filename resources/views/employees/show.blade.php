@extends('layouts.admin.app')
@section('content')
    <div class="row">
        <div class="col-md-10 offset-1 mb-5">
            <div class="card text-capitalize">
                <div class="card-header">
                    <h3 class="card-title"
                        style="{{app()->isLocale('ar') ? 'float:right' : ''}}">{{__('app.employee')}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="text-center">
                            <th style="width: 10px">#</th>
                            <th>{{__('app.employee')}}</th>
                            <th>{{__('app.email')}}</th>
                            <th>{{__('app.phone')}}</th>
                            <th>{{__('app.company')}}</th>
                            <th>{{__('app.action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="text-center">
                            <td>{{$employee->id}}</td>
                            <td>{{$employee->first_name . ' ' . $employee->last_name}}</td>
                            <td>
                                {{$employee->email ?: __('app.notFound')}}
                            </td>
                            <td>
                                {{$employee->phone ?: __('app.notFound')}}
                            </td>
                            <td>
                                {{$employee->company->name}}
                            </td>

                            <td class="text-center">
                                <a class="btn btn-info btn-sm"
                                   href="{{route('employees.edit', $employee->id)}}">{{__('app.edit')}}</a>

                                <form action="{{route('employees.destroy', $employee->id)}}" class="d-inline"
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

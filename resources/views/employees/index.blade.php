@extends('layouts.admin.app')
@section('content')
    <div class="row">
        <div class="col-md-10 offset-1 mb-5">
            <div class="card text-capitalize">
                <div class="card-header">
                    <h3 class="card-title"
                        style="{{app()->isLocale('ar') ? 'float:right' : ''}}">{{__('app.employees')}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="text-center">
                            <th style="width: 10px">#</th>
                            <th>{{__('app.employee')}}</th>
                            <th>{{__('app.action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($employees as $employee)
                            <tr>
                                <td>{{$employee->id}}</td>
                                <td>{{$employee->first_name . ' ' . $employee->last_name}}</td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm"
                                       href="{{route('employees.show', $employee->id)}}">{{__('app.show')}}</a>
                                    <a class="btn btn-info btn-sm"
                                       href="{{route('employees.edit', $employee->id)}}">{{__('app.edit')}}</a>
                                    <form action="{{route('employees.destroy', $employee->id)}}" class="d-inline" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-outline-danger btn-sm">{{__('app.delete')}}</button>
                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr class="text-center">
                                <td colspan="3">{{__('app.noEmployees')}}</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                    {{$employees->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection

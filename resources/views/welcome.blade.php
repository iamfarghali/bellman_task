@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4 offset-4">
                <div class="content mt-5 text-center">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('dashboard') }}" class="w-100 dashboard-btn">{{__('app.dashboard')}}</a>
                        @else
                            <a href="{{ route('login') }}" class="w-100 login-btn">{{__('app.login')}}</a>
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

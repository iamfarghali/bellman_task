@include('layouts.admin.header')

<div class="content-wrapper">
    <section class="content mt-5">
        <div class="container-fluid">
            @if (session('status'))
                <div class="w-50 mx-auto text-center alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @yield('content')
        </div>
    </section>
</div>

@include('layouts.admin.footer')

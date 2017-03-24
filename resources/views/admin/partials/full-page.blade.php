@extends('account.app')

@section('content-page')
<div class="full-page login-page" filter-color="black" data-image="/fw/material-pro/assets/img/login.jpg">
    <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
    <div class="content">
        @yield('main-content')
    </div>
    @include('admin.partials.footer')
</div>
@endsection

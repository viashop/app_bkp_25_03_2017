<!doctype html>
<html lang="pt-br">

@include('control.partials.head')

<body>

<div class="wrapper">

    @include('control.partials.sidebar')

    <div class="main-panel">

        @include('control.partials.navbar')

        <div class="content">
            <div class="container-fluid">
                @yield('main-content')
            </div>
        </div>

        @include('control.partials.footer')

    </div>
</div>


<!-- Not Remove span #worldMap BUG in Javascript Browser Firefox -->
<div id="worldMap" style="height: 0px;"></div>
<!-- Not Remove span #worldMap BUG in Javascript Browser Firefox -->

</body>

@include('control.partials.scriptshtml')
@include('control.partials.scripts-message')

@if(Request::is('painel/account/personal'))
    @include('control.partials.pwstrength')
@endif

</html>

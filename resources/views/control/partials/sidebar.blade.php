<div class="sidebar" data-color="orange" data-image="/fw/light-pro/assets/img/full-screen-image-3.jpg">
    <!--
        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
        <a href="{{ url('/painel') }}" class="logo-text">
            Via<b>loja</b> Admin
        </a>
    </div>
    <div class="logo logo-mini">
        <a href="{{ url('/painel') }}" class="logo-text">
            VL
        </a>
    </div>
    @include('control.partials.sidebar-wrapper')
</div>

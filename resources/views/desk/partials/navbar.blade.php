<nav class="navbar navbar-primary navbar-transparent navbar-absolute">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Alternar de navegação</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}"><span class="logo-via">Via</span><span class="logo-loja">loja</span></a>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a rel="nofollow" href="{{ route('admin.dashboard') }}" title="Dashboard">
                        <i class="material-icons">dashboard</i> Dashboard
                    </a>
                </li>

                <li class="@if( Route::getFacadeRoot()->current()->uri() == '/') {{'active'}} @endif">
                    <a href="{{ route('account.login') }}" title="Login">
                        <i class="material-icons">fingerprint</i> Login
                    </a>
                </li>

                <li class="text-success @if( Route::getFacadeRoot()->current()->uri() == 'registrar') {{'active'}} @endif">
                    <a href="{{ route('account.register') }}"  title="CRIE SUA LOJA VIRTUAL GRÁTIS">
                        <i class="material-icons">pages</i> CRIE SUA LOJA VIRTUAL GRÁTIS
                    </a>
                </li>

                <li class="@if( Route::getFacadeRoot()->current()->uri() == 'bloqueado') {{'active'}} @endif">
                    <a rel="nofollow" href="{{ route('account.lock') }}" title="Travar">
                        <i class="material-icons">lock_open</i> Travar
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

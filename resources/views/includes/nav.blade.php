<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <div class="col-3">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="mt-2">
                @if(!empty(Auth::user()->appsetting))
                <h4 class="text-bold text-center text-white">
                    {{ Auth::user()->appsetting->appName }}
                    <input type="hidden" id="sysExp" value="{{ Auth::user()->appsetting->sessionExpiration }}">
                </h4>
                @else
                @endif
            </li>
        </ul>
    </div>
    <div class="col-9 d-flex justify-content-end">
        <div class="row">           
            <div class="col-auto">
                <h6 class="p-2">
                    {{'Hello'}} &nbsp; {{ Auth::user()->name }}
                </h6>
            </div>
            <div class="col-auto">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-danger form-control">Logout</button>
                </form>
            </div>
        </div>
    </div>

</nav>
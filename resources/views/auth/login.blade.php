<x-header />

<body class="hold-transition lockscreen">
    <!-- Automatic element centering -->
    <div class="lockscreen-wrapper">
        <div class="lockscreen-logo">
           <div class="col-auto">
             <img src="{{asset('Assets/img/logo.png')}}" alt="">
           </div>
            <a href="../../index2.html"><b>Friends Group-</b>005</a>
        </div>
        <div class="lockscreen-name"> লগিন ফরম</div>
        @if(session()->has('error'))
        <div class="text-center text-danger p-1">
            {{session('error')}}
        </div>
        @endif
        <x-input-error :messages="$errors->get('phoneNumber')" style="list-style:none;"
            class="text-danger text-center" />

        @if(session()->has('data'))
        <div class="lockscreen-name d-flex justify-content-center text-primary">Login Step 02 &nbsp; <span
                class="text-muted">/ 02</span>
        </div>
        <div class="lockscreen-item">
            <div class="lockscreen-image">
                <img src="{{asset('')}}{{session('data.photo')}}" alt="User Image">

            </div>
            <form class="lockscreen-credentials" action="{{route('login')}}" method="post">
                @csrf
                <div class="input-group">
                    <input type="hidden" name="phoneNumber" class="form-control"
                        value="{{session('data.phoneNumber')}}">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <button type="submit" class="btn">
                            <i class="fas fa-arrow-right text-muted"></i>
                        </button>
                    </div>
                </div>               
            </form>
        </div>

        @else
        <div class="lockscreen-name d-flex justify-content-center text-primary">Login Step 01 &nbsp; <span
                class="text-muted">/ 02</span>
        </div>
        <div class="lockscreen-item">
            <div class="lockscreen-image">
                <img src="{{asset('Assets/img/phoneDial.gif')}}" alt="User Image">
            </div>

            <form class="lockscreen-credentials" action="{{route('authChecker')}}" method="post">
                @csrf
                <div class="input-group">
                    <input type="number" name="phoneNumber" class="form-control" placeholder="Phone number">

                    <div class="input-group-append">
                        <button type="submit" class="btn">
                            <i class="fas fa-arrow-right text-muted"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="text-center">
            <a href="{{route('register')}}"><strong>Create a New Account</strong></a>
        </div>
        @endif

        <x-footer />
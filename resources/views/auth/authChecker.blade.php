<x-header />

<body class="hold-transition lockscreen">
    <!-- Automatic element centering -->
    <div class="lockscreen-wrapper">
        <div class="lockscreen-logo">
            <a href="../../index2.html"><b>Friends Group-005</b></a>
        </div>
        <!-- User name -->
        <div class="lockscreen-name">John Doe</div>

        <!-- START LOCK SCREEN ITEM -->
        <div class="lockscreen-item">
            <!-- lockscreen image -->
            <div class="lockscreen-image">
                <img src="{{asset('Assets/img/sample-img-3.png')}}" alt="User Image">
            </div>
            <!-- /.lockscreen-image -->

            <!-- lockscreen credentials (contains the form) -->
            <form class="lockscreen-credentials" action="{{route('authChecker')}}" method="post">
              @csrf
                <div class="input-group">
                    <input type="text" name="phoneNumber" class="form-control" placeholder="Phone number">

                    <div class="input-group-append">
                        <button type="submit" class="btn">
                            <i class="fa-solid fa-arrow-right text-muted"></i>
                        </button>
                    </div>
                </div>
            </form>
            <!-- /.lockscreen credentials -->
        </div>
        <div class="text-center">
                <a href="{{route('register')}}"><strong>Create a New Account</strong></a>
            </div>
        <x-footer />
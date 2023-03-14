<x-header />

<body class="hold-transition lockscreen">
    <!-- Automatic element centering -->
    <div class="lockscreen-wrapper">
        <div class="lockscreen-logo">
            <div class="col-auto">
                <img src="{{asset('Assets/img/logo.png')}}" alt="">
            </div>
            <a href="../../index2.html"><b>Friends Group-005</b></a>
        </div>
        <!-- User name -->
        <div class="lockscreen-name"> রেজিষ্ট্রেশন ফরম</div>

        <!-- START LOCK SCREEN ITEM -->
        <div class="p-4">

            <!-- lockscreen credentials (contains the form) -->
            <form class="" action="{{route('register')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-2">
                    <input type="text" name="name" class="form-control" placeholder="Full Name">
                    <input type="hidden" name="type" class="form-control" value="3">
                    <div class="input-group-append">
                        <i class="icon fa fa-user text-muted p-2"></i>
                    </div>
                </div>
                <div class="input-group mb-2">
                    <input type="number" name="phoneNumber" class="form-control" placeholder="Phone number">
                    <div class="input-group-append">
                        <i class="icon fa-solid fa-mobile-screen-button text-muted p-2"></i>
                    </div>
                </div>
                <div class="input-group mb-2">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <i class="icon fa-solid fa-key text-muted p-2"></i>
                    </div>
                </div>
                <div class="input-group mb-2">
                    <input type="file" name="photo" class="form-control">
                    <div class="input-group-append">
                        <i class="icon fa-solid fa-image text-muted p-2"></i>
                    </div>
                </div>
                <button type="submit" class="col-md-6 btn btn-info mb-2 form-control">
                    Register
                </button>

            </form>
            <!-- /.lockscreen credentials -->
        </div>
        <div class="text-center">
            <a href="{{route('login')}}">already have an account!! <strong>Sign-in</strong></a>
        </div>
        <x-footer />
<!-- theme header -->
<x-header />

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- main wrapper start -->
    <div class="wrapper">

        <!-- Navbar start-->
        @include('includes.nav')
        <!-- Navbar end-->
        <!-- Menu start -->
        @include('includes.menu')
        <!-- Menu end -->

        <!-- body content start -->
        <div class="content-wrapper">

            <!-- body content header start -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Friends List</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('friends.list')}}">Friends List</a></li>
                                <li class="breadcrumb-item active">Friends View</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- body content header end -->

            <!-- Body main content start -->
            <section class="content">
                <div class="container-fluid">
                    <!-- notification alart section start -->
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            @if(session()->has('success'))
                            <div id="successMessage" class="text-center text-success p-1">
                                {{session('success')}}
                            </div>
                            @endif
                            @if(session()->has('delete-success'))
                            <div id="successMessage" class="text-center text-danger p-1">
                                {{session('delete-success')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <!-- notification alart section end -->

                    <!-- data table start -->
                    <div class="row">
                        <!-- profile sections start-->
                        <div class="col-md-4">
                            <!-- Profile Image -->
                            <div class="friend-info card card-primary card-outline">
                                <div class="card-body">
                                    <div class="image text-center">
                                        <img src="{{asset('')}}{{$friend->photo}}"
                                            class="profile-user-img img-circle elevation-2" alt="User Image">
                                    </div>

                                    <h3 class="profile-username text-center"> {{ $friend->name }}</h3>

                                    @if(empty($friend->profile))
                                    <p class="text-muted text-center"></p>

                                    <ul class="list-group list-group-unbordered mb-3">

                                        <li class="list-group-item">
                                        <strong><i class="fa-solid fa-droplet text-danger mr-1"></i> রক্তের গ্রুপ =</strong>
                                            <strong class="float-right"></strong>                                            
                                        </li>
                                        <li class="list-group-item">
                                        <strong><i class="fa-solid fa-mobile-screen-button text-primary mr-1"></i> Mobile</strong>
                                            <strong class="float-right"><a
                                                    href="tel:{{ $friend->phoneNumber }}">{{ $friend->phoneNumber }}</a></strong>
                                        </li>
                                        <li class="list-group-item">
                                            <strong><i class="fa-brands fa-whatsapp text-success mr-1"></i> Whatsapp</strong>
                                            <strong class="float-right">
                                                <a href="tel:{{ $friend->phoneNumber }}"></a></strong>                                               
                                        </li>
                                        <li class="list-group-item">
                                            <strong><i class="fas fa-map-marker-alt mr-1"></i> বর্তমান ঠিকানা =</strong>
                                            <strong class="float-right"></strong>
                                        </li>
                                        <li class="list-group-item">
                                            <strong><i class="fas fa-pencil-alt mr-1"></i> পেশা =</strong>
                                            <strong class="float-right"></strong>
                                        </li>
                                        <li class="list-group-item">
                                        <strong><i class="fa-solid fa-star text-warning mr-1"></i> পদবী =</strong>
                                            <strong class="float-right"></strong>
                                        </li>
                                        <li class="list-group-item">
                                            <strong><i class="fa-sharp fa-solid fa-building mr-1"></i>প্রতিষ্ঠানের নাম =</strong>
                                            <strong class="float-right"></strong>                                            
                                        </li>
                                    </ul>
                                    @else
                                    <p class="text-muted text-center">{{$friend->profile->designation}}</p>

                                    <ul class="list-group list-group-unbordered mb-3">

                                        <li class="list-group-item">
                                            <strong><i class="fa-solid fa-droplet text-danger mr-1"></i> রক্তের গ্রুপ =</strong>
                                            <strong class="float-right">{{$friend->profile->bloodGroup}}</strong>
                                        </li>
                                        <li class="list-group-item">
                                            <strong><i class="fa-solid fa-mobile-screen-button text-primary mr-1"></i> Mobile</strong>
                                            <strong class="float-right"><a
                                                    href="tel:{{ $friend->phoneNumber }}">{{ $friend->phoneNumber }}</a></strong>
                                        </li>
                                        <li class="list-group-item">
                                        <strong><i class="fa-brands fa-whatsapp text-success mr-1"></i> Whatsapp</strong>
                                            <strong class="float-right"><a
                                                    href="{{'https://wa.me/'. $friend->phoneNumber }}" target="_blank">{{$friend->profile->waNumber}}</a></strong>
                                        </li>
                                        <li class="list-group-item">
                                            <strong><i class="fas fa-map-marker-alt mr-1"></i> বর্তমান ঠিকানা =</strong>
                                            <strong class="float-right">{{$friend->profile->address}}</strong>
                                        </li>
                                        <li class="list-group-item">
                                            <strong><i class="fas fa-pencil-alt mr-1"></i> পেশা =</strong>
                                            <strong class="float-right">{{$friend->profile->occupation}}</strong>
                                        </li>
                                        <li class="list-group-item">
                                            <strong><i class="fa-solid fa-star text-warning mr-1"></i> পদবী =</strong>
                                            <strong class="float-right">{{$friend->profile->designation}}</strong>
                                            
                                        </li>
                                        <li class="list-group-item">
                                        <strong><i class="fa-solid fa-building mr-1"></i>প্রতিষ্ঠানের নাম =</strong>
                                            <strong class="float-right">{{$friend->profile->companyName}}</strong>
                                        </li>
                                    </ul>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <!-- profile sections end-->
                        <!-- info sections start-->
                        <div class="col-md-8">
                            <div class="card friend-data">
                                <div class="card-header bg-primary p-2 text-center">
                                    <h4>Gallery</h4>
                                </div>
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#photos"
                                                data-toggle="tab">Photos</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#videos"
                                                data-toggle="tab">Videos</a></li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="photos">
                                            <h4>photos</h4>
                                        </div>

                                        <div class="tab-pane" id="videos">
                                            <h4>videos</h4>
                                        </div>
                                    </div>
                                    <!-- /.tab-content -->
                                </div>
                            </div>
                            <!-- info sections end-->
                        </div>
                    </div>
                    <!-- data table end -->
                </div>
            </section>
            <!-- Body main content end -->
        </div>
        <!-- body content end -->

        <!-- theme footer -->
        <x-footer />
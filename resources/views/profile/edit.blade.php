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
                            <h1 class="m-0">Profile Setting</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Profile Setting</li>
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
                    <div class="row text-nowrap">
                        <!-- personal information start -->
                        <div class="col-md-4 p-4">
                            <div class="image p-4">
                                <img src="{{asset('')}}{{Auth::user()->photo}}"
                                    class="profile-user-img img-circle elevation-2" alt="User Image">
                                <span class="photo-edit-btn">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="icon fa-solid fa-camera p-2"></i>
                                    </a>
                                </span>
                            </div>

                            <h4>
                                পাসওয়ার্ড পরিবর্তন <i class="fa-solid fa-key text-primary"></i>
                            </h4>
                            <form action="{{route('password.update')}}" method="post">
                                @csrf
                                @method('put')
                                <div class="col-auto">
                                    <label for="current_password" class="mb-0"> পুরাতন পাসওয়ার্ড </label>
                                    <div class="input-group mb-2">
                                        <input type="hidden" name="id" value="">
                                        <input type="password" name="current_password" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <label for="password" class="mb-0"> নতুন পাসওয়ার্ড </label>
                                    <div class="input-group mb-2">
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <label for="password_confirmation" class="mb-0"> কনফার্ম পাসওয়ার্ড </label>
                                    <div class="input-group mb-2">
                                        <input type="password" name="password_confirmation" class="form-control"
                                            required>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-auto ml-2">
                                        <button class="btn btn-primary form-control">
                                            সাবমিট করুন
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- personal information end -->
                        <!-- personal information start -->
                        <div class="col-md-6 p-4">
                            <h4>
                                ব্যাক্তিগত তথ্যাবলি
                                <a style="margin:2px; text-decoration:none;" href="">
                                    <i class="fa-solid fa-edit text-primary"></i>
                                </a>
                            </h4>
                            @if(empty(Auth::user()->profile))
                            <form action="{{route('edit.profile.info')}}" method="post">
                                @csrf
                                <div class="col-auto">
                                    <label for="name" class="mb-0"> নিজ নাম </label>
                                    <div class="input-group mb-2">
                                        <input type="text" name="name" class="form-control"
                                            value="{{Auth::user()->name}}">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <label for="phoneNumber" class="mb-0"> ফোন নাম্বার </label>
                                    <div class="input-group mb-2">
                                        <input type="text" name="phoneNumber" class="form-control"
                                            value="{{Auth::user()->phoneNumber}}">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <label for="waNumber" class="mb-0"> হোয়াটস্ এ্যাপ নাম্বার </label>
                                    <div class="input-group mb-2">
                                        <input type="text" name="waNumber" class="form-control">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <label for="address" class="mb-0"> বর্তমান ঠিকানা</label>
                                    <div class="input-group mb-2">
                                        <input type="text" name="address" class="form-control">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <label for="occupation" class="mb-0"> পেশা </label>
                                    <div class="input-group mb-2">
                                        <input type="text" name="occupation" class="form-control">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <label for="designation" class="mb-0"> পদবী </label>
                                    <div class="input-group mb-2">
                                        <input type="text" name="designation" class="form-control">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <label for="companyName" class="mb-0"> প্রতিষ্ঠানের নাম </label>
                                    <div class="input-group mb-2">
                                        <input type="text" name="companyName" class="form-control">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <label for="bloodGroup" class="mb-0"> রক্তের গ্রুপ </label>
                                    <div class="input-group mb-2">
                                        <input type="text" name="bloodGroup" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-auto ml-2">
                                        <button class="btn btn-primary form-control">
                                            সাবমিট করুন
                                        </button>
                                    </div>
                                </div>
                            </form>
                            @else
                            <form action="{{route('update.profile.info')}}" method="post">
                                @csrf
                                <div class="col-auto">
                                    <label for="name" class="mb-0"> নিজ নাম </label>
                                    <div class="input-group mb-2">
                                        <input type="text" name="name" class="form-control"
                                            value="{{Auth::user()->name}}">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <label for="phoneNumber" class="mb-0"> ফোন নাম্বার </label>
                                    <div class="input-group mb-2">
                                        <input type="text" name="phoneNumber" class="form-control"
                                            value="{{Auth::user()->phoneNumber}}">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <label for="waNumber" class="mb-0"> হোয়াটস্ এ্যাপ নাম্বার </label>
                                    <div class="input-group mb-2">
                                        <input type="text" name="waNumber" class="form-control"
                                            value="{{Auth::user()->profile->waNumber}}">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <label for="address" class="mb-0"> বর্তমান ঠিকানা</label>
                                    <div class="input-group mb-2">
                                        <input type="text" name="address" class="form-control"
                                            value="{{Auth::user()->profile->address}}">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <label for="occupation" class="mb-0"> পেশা </label>
                                    <div class="input-group mb-2">
                                        <input type="text" name="occupation" class="form-control"
                                            value="{{Auth::user()->profile->occupation}}">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <label for="designation" class="mb-0"> পদবী </label>
                                    <div class="input-group mb-2">
                                        <input type="text" name="designation" class="form-control"
                                            value="{{Auth::user()->profile->designation}}">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <label for="companyName" class="mb-0"> প্রতিষ্ঠানের নাম </label>
                                    <div class="input-group mb-2">
                                        <input type="text" name="companyName" class="form-control"
                                            value="{{Auth::user()->profile->companyName}}">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <label for="bloodGroup" class="mb-0"> রক্তের গ্রুপ </label>
                                    <div class="input-group mb-2">
                                        <input type="text" name="bloodGroup" class="form-control"
                                            value="{{Auth::user()->profile->bloodGroup}}">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-auto ml-2">
                                        <button class="btn btn-primary form-control">
                                            সাবমিট করুন
                                        </button>
                                    </div>
                                </div>
                            </form>
                            @endif
                        </div>
                        <!-- personal information end -->

                    </div>
                    <!-- data table end -->
                </div>
            </section>
            <!-- Body main content end -->
        </div>
        <!-- body content end -->
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <form action="{{route('edit.profile.photo')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Upload Photo</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <input type="file" name="photo" class="form-control" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- theme footer -->
        <x-footer />
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
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Friends List</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- body content header end -->

            <!-- Body main content start -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    @include('includes.boxdata')
                    <!-- Main row -->
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
                    <div class="row mb-4 p-2">
                        <table class="table table-striped table-hover">
                            <thead class="text-center text-uppercase">
                                <tr>
                                    <td>#</td>
                                    <td style="width:5%;">Photo</td>
                                    <td>Name</td>
                                    <td>Mobile</td>
                                    <td style="width:10%;">#</td>
                                </tr>
                            </thead>
                            <tbody class="text-center">

                                @foreach($friends as $key=> $friend)
                                <tr>
                                    <td>
                                        {{$key+1}}
                                    </td>
                                    <td>
                                        <div class="friendList-image p-0">
                                            <img src="{{asset('')}}{{$friend->photo}}"
                                                class="img-fluid img-circle elevation-2" alt="User Image">
                                        </div>
                                    </td>
                                    <td>{{$friend->name}}</td>
                                    <td>{{$friend->phoneNumber}}</td>
                                    <td>
                                        <a href="{{route('friends.view',['id'=>$friend->id])}}">
                                         view
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <span>{{$friends->links()}}</span>
                    </div>
                    <!-- data table end -->
                </div>
            </section>
            <!-- Body main content end -->
        </div>
        <!-- body content end -->

        <!-- theme footer -->
        <x-footer />
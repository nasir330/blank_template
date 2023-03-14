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
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
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
                    <div class="row">
                        
                    </div>
                </div>
            </section>
            <!-- Body main content end -->
        </div>
        <!-- body content end -->

<!-- theme footer -->
<x-footer />
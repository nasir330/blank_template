<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-2 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('')}}{{Auth::user()->photo}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link active">
                        <i class="fa-solid fa-house"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-users-gear"></i>
                        <p>
                            Profile
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                        <a href="{{route('profile.edit')}}" class="nav-link">
                                <i class="fa fa-solid fa-gears"></i>
                                <p>Setting</p>
                            </a>
                        </li>
                        <li class="nav-item">
                        <a href="{{route('friends.list')}}" class="nav-link">
                                <i class="fa-solid fa-users"></i>
                                <p>Friends List</p>
                            </a>
                        </li>                       
                    </ul>
                </li>              
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
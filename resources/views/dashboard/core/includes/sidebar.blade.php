<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset("logo/logo.jpg")}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">تطبيق  منشاه - monshaa</a>
            </div>
        </div>

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset(auth('admin')->user()->image)}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth('admin')->user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-home nav-icon"></i>
                        <p>
                           الرئيسيه
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-users nav-icon"></i>
                        <p>
                           موظفين الاداره
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.companies')}}" class="nav-link">
                        <i class="fa fa-building nav-icon"></i>
                        <p>
                            الشركات
                        </p>
                    </a>
                </li>



                <li class="nav-item">
                    <a href="{{route('admin.technical_support')}}" class="nav-link">
                        <i class="fas fa-envelope nav-icon"></i>
                        <p>
                            الدعم الفني
                            <span class="badge badge-danger right">{{messagesCount()}}</span>
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

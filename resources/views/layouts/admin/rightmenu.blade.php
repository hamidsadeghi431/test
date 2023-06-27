<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('admin/assets/dist/img/output.png')}}"  alt="MyEsco Logo" class="brand-image img-circle elevation-3" >
        MY<span class="brand-text font-weight-light " style="color: #6BCA16">ESCO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('admin/assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                @php($menu1=\App\Models\menu\menugrade1::get())
                @foreach($menu1 as $item)
                    @php($cnt1=\App\Models\menu\menugrade2::where('idg1',$item->id)->count())
                    <li class="nav-item
                    @if(\Request::route()->getName() == $item->link)
                        menu-open
                    @endif
                    ">
                    <a href="{{($item->link?route(''.$item->link.''):route('dashboard'))}}" class="nav-link
                   @if(\Request::route()->getName() == $item->link)
                        active
                    @endif
                    ">
                        <i class="nav-icon {{$item->icon}}"></i>
                        <p>
                            {{$item->NameG1}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                        @if($cnt1 > 0)
                    <ul class="nav nav-treeview">
                        @php($menu2=\App\Models\menu\menugrade2::where('idg1',$item->id)->get())
                        @foreach($menu2 as $item2)
                            @php($cnt2=\App\Models\menu\menugrade3::where('idg2',$item2->id)->count())
                            <li class="nav-item
                            @if(\Request::route()->getName() == $item->link)
                                menu-open
                            @endif
                                ">
                            <a href="{{($item2->link?route(''.$item2->link.''):route('dashboard'))}}" class="nav-link
                            @if(\Request::route()->getName() == $item->link)
                                active
                            @endif
                            ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    {{$item2->NameG2}}
                                    @if($cnt2 > 0)
                                    <i class="right fas fa-angle-left"></i>
                                    @endif
                                </p>
                            </a>
                            @if($cnt2 > 0)
                            <ul class="nav nav-treeview">
                                @php($menu3=\App\Models\menu\menugrade3::where('idg2',$item2->id)->get())
                                @foreach($menu3 as $item3)
                                <li class="nav-item">
                                    <a href="{{($item3->link?route(''.$item3->link.''):route('dashboard'))}}" class="nav-link
                                    @if(\Request::route()->getName() == $item->link)
                                        active
                                    @endif
                                        ">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>{{$item3->NameG3}}</p>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                        @endif
                </li>
                @endforeach
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

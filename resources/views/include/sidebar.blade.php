<link rel="stylesheet" href="{{ asset('css/sidemenu-rtl.css') }}">

<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="{{route('dashboard')}}">
            <div class="logo-img">
               <img height="40" src="{{ asset('img/logo_white.png')}}" class="header-brand-img" title="Radmin">
            </div>
        </a>
        <div class="sidebar-action"><i class="ik ik-arrow-right-circle"></i></div>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    @php
        $segment1 = request()->segment(1);
        $segment2 = request()->segment(2);
    @endphp

    <div class="sidebar-content ">
        <div class="nav-container ">

            <nav id="main-menu-navigation" class="navigation-main">
                <!--
                <div class="nav-item {{ ($segment1 == 'dashboard') ? 'active' : '' }}">
                    <a href="{{route('dashboard')}}"><i class="ik ik-bar-chart-2"></i><span>{{ __('Dashboard')}}</span></a>
                </div>
                <div class="nav-lavel">{{ __('Layouts')}} </div>
                <div class="nav-item {{ ($segment1 == 'pos') ? 'active' : '' }}">
                    <a href="{{url('inventory')}}"><i class="ik ik-shopping-cart"></i><span>{{ __('Inventory')}}</span> </a>
                </div>
                <div class="nav-item {{ ($segment1 == 'pos') ? 'active' : '' }}">
                    <a href="{{url('pos')}}"><i class="ik ik-printer"></i><span>{{ __('POS')}}</span> </a>
                </div>
                <div class="nav-item {{ ($segment1 == 'accounting') ? 'active' : '' }}">
                    <a href="{{url('accounting')}}"><i class="ik ik-printer"></i><span>{{ __('Accounting')}}</span> <span class=" badge badge-success badge-right">{{ __('New')}}</span></a>
                </div>
-->
 <!-- اداره المستخدمين  -->
                <div class="nav-item {{ ($segment1 == 'users'  ||$segment1 == 'user') ? 'active open' : '' }} has-sub">
                    <a href="#"><span>{{ __('اداره المستخدمين')}}</span><i class="ik ik-user"></i></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        @can('manage_user')

                        <a href="{{route('all_users')}}" class="menu-item {{ ($segment1 == 'users') ? 'active' : '' }}">{{ __('المستخدمين')}}</a>
                        <a href="{{route('create-user')}}" class="menu-item {{ ($segment1 == 'user' && $segment2 == 'create') ? 'active' : '' }}">{{ __(' اظافه مستخدم')}}</a>
                         @endcan

                    </div>
                </div>


                 <!-- اداره  الموظفين-->
                 <div class="nav-item {{ ( $segment1 == 'employees' ||$segment1 == 'employee' ) ? 'active open' : '' }} has-sub">
                    <a href="#"><span>{{ __('اداره الموظفين')}}</span><i class="ik ik-user"></i></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        @can('manage_employee')
                        <a href="{{url('all/emps')}}" class="menu-item {{ ($segment1 == 'employees') ? 'active' : '' }}">{{ __('الموظفين')}}</a>
                        <a href="{{route('emp_create')}}" class="menu-item {{ ($segment1  == 'employee'&& $segment2     == 'create') ? 'active' : '' }}">{{ __('اظافه موظف')}}</a>
                         @endcan

                    </div>
                </div>


<!-- اداره الصلاحيات  -->
<div class="nav-item {{ ($segment1 == 'roles'||$segment1 == 'permission') ? 'active open' : '' }} has-sub">
     <a href="#"><span>{{ __('أداره الصلاحيات')}}</span><i class="ik ik-user"></i></a>
        <div class="submenu-content">
   <!-- only those have manage_role permission will get access -->
   @can('manage_roles')
   <a href="{{url('roles')}}" class="menu-item {{ ($segment1 == 'roles') ? 'active' : '' }}">{{ __('الأدوار')}}</a>
   @endcan
   <!-- only those have manage_permission permission will get access -->
   @can('manage_permission')
   <a href="{{url('permission')}}" class="menu-item {{ ($segment1 == 'permission') ? 'active' : '' }}">{{ __('الصلاحيات')}}</a>
   @endcan
         </div>
    </div>


<!-- اداره الحضور والانصراف -->
<div class="nav-item {{ ($segment1 == 'Shifts' || $segment1 == 'Shift') ? 'active open' : '' }} has-sub">
                    <a href="#"><span>{{ __('أداره الفترات')}}</span><i class="ik ik-user"></i></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        @can('manage_shift')

                        <a href="{{route('all_shift')}}" class="menu-item {{ ($segment1 == 'Shifts') ? 'active' : '' }}">{{ __('الفترات')}}</a>
                        <a href="{{route('addshift')}}" class="menu-item {{ ($segment1 == 'Shift' && $segment2 == 'create') ? 'active' : '' }}">{{ __('اظافه فترة')}}</a>


                         @endcan
                         <!-- only those have manage_role permission will get access -->

                    </div>
                </div>

<!--  اداره الاقسام-->
                <div class="nav-item {{ ($segment1 == 'Departments' || $segment1 == 'Department') ? 'active open' : '' }} has-sub">
                    <a href="#"><span>{{ __('اداره الاقسام')}}</span><i class="ik ik-user"></i></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        @can('manage_department')
                        <a href="{{route('department')}}" class="menu-item {{ ($segment1 == 'Departments') ? 'active' : '' }}">{{ __('الاقسام')}}</a>
                        <a href="{{url('/add/Department')}}" class="menu-item {{ ($segment1 == 'Depaerment' && $segment1 == 'create') ? 'active' : '' }}">{{ __('اظافه قسم')}}</a>
                         @endcan
                         <!-- only those have manage_role permission will get access -->

                    </div>
                </div>

                <div class="nav-item {{ ($segment1 == 'Databases') ? 'active open' : '' }} has-sub">
                    <a href="#"><span>{{ __(' ادارة قواعد البيانات')}}</span><i ></i></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        @can('manage_database')
                        <a href="{{ route('database.index') }}" class="menu-item {{ ($segment1 == 'Databases' && $segment2 == 'create') ? 'active' : '' }}">{{ __(' اضافه قاعده بيانات')}}</a>
                    @endcan
                         <!-- only those have manage_role permission will get access -->

                    </div>
                </div>
                <!-- attendace-->
                <div class="nav-item {{ ($segment1 == 'attendances' || $segment1 == 'attendance') ? 'active open' : '' }} has-sub">
                    <a href="#"><span>{{ __(' ادارة التحضير ')}}</span><i ></i></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        @can('manage_attendance')
                        <a href="{{ route('attendance.show') }}" class="menu-item {{ ($segment1 == 'attendances' && $segment2 == 'create') ? 'active' : '' }}">{{ __('ادارة التحضير ')}}</a>
                        <a href="{{ route('attendance.index') }}" class="menu-item {{ ($segment1 == 'attendance' && $segment2 == 'create') ? 'active' : '' }}">{{ __('التحضير اليدوي')}}</a>

                    @endcan
                         <!-- only those have manage_role permission will get access -->

                    </div>
                </div>



                <div class="nav-item {{ ($segment1 == 'Reports' || $segment1 == 'Report') ? 'active open' : '' }} has-sub">
                    <a href="#"><span>{{ __(' ادارة التقارير ')}}</span><i ></i></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        @can('manage_hr')
                        <a href="{{ route('report') }}" class="menu-item {{ ($segment1 == 'Reports' && $segment2 == 'create') ? 'active' : '' }}">{{ __('اداره التقارير ')}}</a>
                        <a href="{{ route('reportdetails') }}" class="menu-item {{ ($segment1 == 'Report' && $segment2 == 'create') ? 'active' : '' }}">{{ __('  تقارير تفصيلية')}}</a>

                    @endcan
                         <!-- only those have manage_role permission will get access -->

                    </div>
                </div>

                <!-- Include demo pages inside sidebar start-->
                @include('pages.sidebar-menu')
                <!-- Include demo pages inside sidebar end-->

            </nav>

        </div>
    </div>
</div>

<!-- /Sidebar menu-->


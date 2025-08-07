<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="{{route('dashboard')}}">
            <div class="logo-img">
               <img height="40" src="{{ asset('img/logo_white.png')}}" class="header-brand-img" title="RADMIN">
            </div>
        </a>
        <div class="sidebar-action"><i class="ik ik-arrow-left-circle"></i></div>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    @php
        $segment1 = request()->segment(1);
        $segment2 = request()->segment(2);
    @endphp

    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-item {{ ($segment1 == 'accounting') ? 'active' : '' }}">
                    <a href="{{url('/accounting')}}"><i class="ik ik-bar-chart-2"></i><span>{{ __('Dashboard')}}</span></a>
                </div>

                <!-- start accounting pages -->
                <div class="nav-item {{ ($segment1 == 'presale') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-file"></i><span>{{ __('Presale')}}</span></a>
                    <div class="submenu-content">
                        <a href="{{url('presale/proposal')}}" class="menu-item {{ ($segment1 == 'presale' && $segment2 == 'proposal') ? 'active' : '' }}">{{ __('Proposals')}}</a>
                        <a href="{{url('presale/retainer')}}" class="menu-item {{ ($segment1 == 'presale' && $segment2 == 'retainer') ? 'active' : '' }}">{{ __('Retainers')}}</a>
                    </div>
                </div>
                <div class="nav-item {{ ($segment1 == 'banking') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-home"></i><span>{{ __('Banking')}}</span></a>
                    <div class="submenu-content">
                        <a href="{{url('banking/account')}}" class="menu-item {{ ($segment1 == 'banking' && $segment2 == 'account') ? 'active' : '' }}">{{ __('Account')}}</a>
                        <a href="{{url('banking/transfer')}}" class="menu-item {{ ($segment1 == 'banking' && $segment2 == 'transfer') ? 'active' : '' }}">{{ __('Transfer')}}</a>
                    </div>
                </div>

                <div class="nav-item {{ ($segment1 == 'income') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-dollar-sign"></i><span>{{ __('Income')}}</span></a>
                    <div class="submenu-content">
                        <a href="{{url('income/invoice')}}" class="menu-item {{ ($segment1 == 'income' && $segment2 == 'invoice') ? 'active' : '' }}">{{ __('Invoice')}}</a>
                        <a href="{{url('income/revenue')}}" class="menu-item {{ ($segment1 == 'income' && $segment2 == 'revenue') ? 'active' : '' }}">{{ __('Revenue')}}</a>
                    </div>
                </div>
                <div class="nav-item {{ ($segment1 == 'expense') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-dollar-sign"></i><span>{{ __('Expense')}}</span></a>
                    <div class="submenu-content">
                        <a href="{{url('expense/bill')}}" class="menu-item {{ ($segment1 == 'expense' && $segment2 == 'bill') ? 'active' : '' }}">{{ __('Bill')}}</a>
                        <a href="{{url('expense/payment')}}" class="menu-item {{ ($segment1 == 'expense' && $segment2 == 'payment') ? 'active' : '' }}">{{ __('Payment')}}</a>
                    </div>
                </div>
                <div class="nav-item {{ ($segment1 == 'budget-planner') ? 'active' : '' }}">
                    <a href="{{url('budget-planner')}}"><i class="ik ik-briefcase"></i><span>{{ __('Budget Planner')}}</span></a>
                </div>
                <div class="nav-item {{ ($segment1 == 'goal') ? 'active' : '' }}">
                    <a href="{{url('goal')}}"><i class="ik ik-trending-up"></i><span>{{ __('Goal')}}</span></a>
                </div>
                <div class="nav-item {{ ($segment1 == 'assets') ? 'active' : '' }}">
                    <a href="{{url('assets')}}"><i class="ik ik-package"></i><span>{{ __('Assets')}}</span></a>
                </div>
                <!-- end accounting pages -->
            </nav>
        </div>
    </div>
</div>

<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    متاح
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>

        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item active ">
                    <a href="{{ route('admin') }}" class='sidebar-link'>
                        <i class="fa-solid fa-gauge-high"></i>
                        <span class="mx-4">{{ __('dash.Dashboard') }}</span>
                    </a>
                </li>

                <li class=" sidebar-title"> <i class="fa-solid fa-minus"></i> {{ __('dash.pages') }}</li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="fa-solid fa-layer-group"></i>
                        <span class="mx-4">{{ __('dash.Categories') }}</span>
                    </a>

                    <ul class="submenu">
                        <i class="fa-solid fa-border-all"></i>
                        <!-- <li class="submenu-item"> -->
                            <a href="{{ route('list_categories') }}" class="mx-2">{{ __('dash.show_all') }}</a>
                        </li>
                        <li class="submenu-item ">
                        <!-- <i class="fa-solid fa-plus"></i> -->
                            <a href="{{ route('add_category') }}" class="mx-2">{{ __('dash.add') }}</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  has-sub"> 
                    <a href="#" class='sidebar-link'>
                        <i class="fa-solid fa-briefcase"></i>
                        <span class="mx-4">{{ __('dash.specialization') }}</span>
                    </a>

                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="{{ route('list_specialization') }}" class="mx-2">{{ __('dash.show_all') }}</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('add_specialization') }}" class="mx-2">{{ __('dash.add') }}</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item has-sub"> 
                    <a href="#" class='sidebar-link'>
                        <i class="fa-solid fa-tags"></i>
                        <span class="mx-4">{{ __('dash.Skills') }}</span>
                    </a>

                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="{{ route('list_skills') }}" class="mx-2">{{ __('dash.show_all') }}</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('add_skill') }}" class="mx-2">{{ __('dash.add') }}</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item"> 
                    <a href="{{ route('reports') }}" class='sidebar-link'>
                        <i class="fa-solid fa-flag-checkered"></i>
                        <span class="mx-4">{{ __('dash.all_report') }}</span>
                    </a>
                </li>
                    
                <li class="sidebar-item"> 
                    <a href="{{ route('showUsers') }}" class='sidebar-link'>
                    <i class="fa-solid fa-users"></i>
                        <span class="mx-4">{{ __('dash.users') }}</span>
                    </a>
                </li>

        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>

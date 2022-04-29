<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    كلفني
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
                        <i class="bi bi-grid-fill"></i>
                        <span class="mx-4">{{ __('dash.Dashboard') }}</span>
                    </a>
                </li>

                <li class=" sidebar-title">{{ __('dash.pages') }}</li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span class="mx-4">{{ __('dash.Categories') }}</span>
                    </a>

                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="{{ route('list_categories') }}"
                                class="mx-2">{{ __('dash.show_all') }}</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('add_category') }}" class="mx-2">{{ __('dash.add') }}</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span class="mx-4">{{ __('dash.specialization') }}</span>
                    </a>

                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="{{ route('list_specialization') }}"
                                class="mx-2">{{ __('dash.show_all') }}</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('add_specialization') }}"
                                class="mx-2">{{ __('dash.add') }}</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span class="mx-4">{{ __('dash.Skills') }}</span>
                    </a>

                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="{{ route('list_skills') }}"
                                class="mx-2">{{ __('dash.show_all') }}</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('add_skill') }}" class="mx-2">{{ __('dash.add') }}</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span class="mx-4">{{ __('dash.users') }}</span>
                    </a>

                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="{{ route('showUsers') }}"
                                class="mx-2">{{ __('dash.all_users') }}</a>
                        </li>

                    </ul>



                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>

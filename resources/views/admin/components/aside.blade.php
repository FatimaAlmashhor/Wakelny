<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    Kallefniy
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li>
                <a class="dropdown-item" href="{{ url('logout')}}" >
                  <i class="bx bx-power-off me-2"></i>
                  <span class="align-middle">Log Out</span>
                </a>
              </li>
              
                <li class="sidebar-item active ">
                    <a href="{{ route('home') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-title">Pages</li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Categories</span>
                    </a>

                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="{{ route('list_categories') }}">Show All</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('add_category') }}">Create</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Skills</span>
                    </a>

                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="{{ route('list_skills') }}">Show All</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('add_skill') }}">Create</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>

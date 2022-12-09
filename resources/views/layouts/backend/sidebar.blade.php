<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-dark.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-light.png" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('home')}}">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboard</span>
                    </a>
                    @if(Auth::user()->role==0)

                    <a class="nav-link menu-link" href="{{route('subAdmin')}}">
                        <i class="ri-user-2-line"></i> <span data-key="t-dashboards">Sub Admins</span>
                    </a>
                    @endif
                    <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-menu-2-line"></i> <span data-key="t-dashboards">Menus</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('categorieList')}}" class="nav-link" data-key="t-analytics">
                                    Categories </a>
                            </li>

                        </ul>
                    </div>

                    <a class="nav-link menu-link" href="{{route('testimonialList')}}">
                        <i class="ri-user-2-line"></i> <span data-key="t-dashboards">Testimonials</span>
                    </a>

                    <a class="nav-link menu-link" href="{{route('blogList')}}">
                        <i class="ri-menu-2-line"></i> <span data-key="t-dashboards">Blogs</span>
                    </a>
                    <a class="nav-link menu-link" href="{{route('allContacts')}}">
                        <i class="ri-message-2-line"></i> <span data-key="t-dashboards">All Contacts</span>
                    </a>
                    <a class="nav-link menu-link" href="{{route('notice')}}">
                        <i class="ri-message-2-line"></i> <span data-key="t-dashboards">Notice</span>
                    </a>
                    <a class="nav-link menu-link" href="{{route('allGallary')}}">
                        <i class="ri-image-2-line"></i> <span data-key="t-dashboards">All Gallary</span>
                    </a>
                    <a class="nav-link menu-link" href="{{route('allVideos')}}">
                        <i class="ri-video-upload-line"></i> <span data-key="t-dashboards">All Videos</span>
                    </a>
                    <a class="nav-link menu-link" href="{{route('allLeads')}}">
                        <i class="ri-user-2-line"></i> <span data-key="t-dashboards">My Leads</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
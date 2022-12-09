<!-- Main Header -->
<header class="main-header header-style-one">

    <!-- Header Upper -->
    <div class="header-upper">
        <div class="inner-container clearfix">
            <!--Logo-->
            <div class="logo-box">
                <div class="logo"><a href="{{route('welcome')}}" title="SyTanbir"><img
                            src="{{asset('frontend/images/logo.png')}}" alt="SyTanbir" title="SyTanbir"></a></div>
            </div>
            <div class="nav-outer clearfix">
                <!--Mobile Navigation Toggler-->
                <div class="mobile-nav-toggler"><i class="fa-solid fa-bars"></i><span class="txt">Menu</span></div>

                <!-- Main Menu -->
                <nav class="main-menu navbar-expand-md navbar-light">
                    <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                        <ul class="navigation clearfix">
                            <li><a href="{{route('welcome')}}" style="text-decoration: underline!important;">Home</a>
                            </li>
                            <li><a href="{{route('aboutUs')}}">About Us</a></li>
                            <li><a href="{{route('gallary')}}">Gallery</a></li>
                            <li><a href="{{route('categorie')}}">Categories</a></li>
                            <li><a href="{{route('blogs')}}">Blog</a></li>
                            <li><a href="{{route('contactUs')}}">Contact</a></li>
                            @guest()
                            @else
                            <?php
                            $notification_count = DB::table('notices')->count();
                            $read_notification_count = DB::table('read_notice')->where('user_id',Auth::user()->id)->count();
                            $final = $notification_count - $read_notification_count;
                            ?>
                            <li>
                                <a href="{{route('notifications')}}">Notification <span class="text-danger">
                                        ({{$final}})
                                    </span>
                                </a>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </nav>
            </div>

            @guest()
            <div class="other-links clearfix" id="user-section">
                <div class="info">
                    <ul class="clearfix ">
                        <li><a class="custom" href="{{route('login')}}"><i
                                    class="fa-solid fa-right-to-bracket"></i><span class="txt">Login</span></a></li>
                    </ul>
                </div>
                <div class="link-box">
                    <a href="{{route('newRegister')}}" class="theme-btn btn-style-one "><span
                            class="btn-title custom custom">Sign Up</span></a>
                </div>
            </div>
            @else
            <div class="dropdown other-links clearfix" id="user-section">
                <button class=" dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">

                    {{ucfirst(Auth::user()->name)}}
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <h6 class="dropdown-header">Welcome {{Auth::user()->name}}!</h6>
                    <a class="dropdown-item" href="{{route('profile')}}"><i
                            class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                            class="align-middle">Profile</span></a>
                    <a class="dropdown-item" href="{{route('myBlogs')}}"><i
                            class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                            class="align-middle">My Blogs</span></a>
                    <a class="dropdown-item" href="{{route('myGallary')}}"><i
                            class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                            class="align-middle">My Gallary</span></a>
                    <a class="dropdown-item" href="{{route('myVideo')}}"><i
                            class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                            class="align-middle">My Videos</span></a>
                    <a class="dropdown-item" href="{{ route('password.request') }}"><i
                            class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                            class="align-middle">Change Password</span></a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i
                            class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle"
                            data-key="t-logout">Logout</span></a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
            <div class="dropdown ms-sm-3 header-item topbar-user">


            </div>
            @endguest


        </div>
    </div>
    <!--End Header Upper-->

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="close-btn"><i class="fa-solid fa-xmark"></i></div>
        <div class="menu-backdrop"></div>
        <div class="nav-logo"><a href="i{{route('welcome')}}"><img src="{{asset('frontend/images/logo.png')}}" alt=""
                    title=""></a></div>
        <nav class="menu-box">
            <div class="menu-outer">
                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            </div>
        </nav>
        <div class="nav-bottom">
            <div class="copyright">SyTanbir &copy; 2020 All Right Reserved</div>
            <!--Social Links-->
            <div class="social-links">
                <a href="https://www.facebook.com/BeingTanbirRamiz"><span class="fab fa-facebook-f"></span></a>
                <a href="https://twitter.com/beingtanbir1310"><span class="fab fa-twitter"></span></a>
                <a href="https://www.instagram.com/beingtanbirramiz/"><span class="fab fa-instagram"></span></a>
                <a href="https://www.youtube.com/TanbirRamiz"><span class="fab fa-youtube"></span></a>
            </div>
        </div>
    </div>
    <!-- End Mobile Menu -->

</header>
<!-- End Main Header -->
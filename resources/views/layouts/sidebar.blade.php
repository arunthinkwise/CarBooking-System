<!-- ========== Topbar Start ========== -->
<div class="navbar-custom">
                <div class="topbar container-fluid">
                    <div class="d-flex align-items-center gap-lg-2 gap-1">

                        <!-- Topbar Brand Logo -->
                        <div class="logo-topbar">
                            <!-- Logo light -->
                            <a href="index.html" class="logo-light">
                                <span class="logo-lg">
                                    <img src="assets/images/carlogo.png" style="width:90px;height:90px" alt="logo">
                                </span>
                                <span class="logo-sm">
                                    <img src="assets/images/carlogo.png" style="width:90px;height:90px" alt="small logo">
                                </span>
                            </a>

                            <!-- Logo Dark -->
                            <a href="index.html" class="logo-dark">
                                <span class="logo-lg">
                                    <img src="assets/images/carlogo.png" style="width:90px;height:90px" alt="dark logo">
                                </span>
                                <span class="logo-sm">
                                    <img src="assets/images/carlogo.png" style="width:90px;height:90px" alt="small logo">
                                </span>
                            </a>
                        </div>

                        <!-- Sidebar Menu Toggle Button -->
                        <button class="button-toggle-menu">
                            <i class="ri-menu-2-fill"></i>
                        </button>

                        <!-- Horizontal Menu Toggle Button -->
                        <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </button>

                        <!-- Topbar Search Form -->
                        <div class="app-search dropdown d-none d-lg-block">
                            <form>
                                <div class="input-group">
                                    <input type="search" class="form-control dropdown-toggle" placeholder="Search..." id="top-search">
                                    <span class="ri-search-line search-icon"></span>
                                </div>
                            </form>

                            <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h5 class="text-overflow mb-1">Found <b class="text-decoration-underline">08</b> results</h5>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="ri-file-chart-line fs-16 me-1"></i>
                                    <span>Analytics Report</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="ri-lifebuoy-line fs-16 me-1"></i>
                                    <span>How can I help you?</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="ri-user-settings-line fs-16 me-1"></i>
                                    <span>User profile settings</span>
                                </a>

                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow mt-2 mb-1 text-uppercase">Users</h6>
                                </div>

                                <div class="notification-list">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="d-flex">
                                            <img class="d-flex me-2 rounded-circle" src="assets/images/users/avatar-2.jpg" alt="Generic placeholder image" height="32">
                                            <div class="w-100">
                                                <h5 class="m-0 fs-14">Erwin Brown</h5>
                                                <span class="fs-12 mb-0">UI Designer</span>
                                            </div>
                                        </div>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="d-flex">
                                            <img class="d-flex me-2 rounded-circle" src="assets/images/users/avatar-5.jpg" alt="Generic placeholder image" height="32">
                                            <div class="w-100">
                                                <h5 class="m-0 fs-14">Jacob Deo</h5>
                                                <span class="fs-12 mb-0">Developer</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <ul class="topbar-menu d-flex align-items-center gap-3">
                        <li class="dropdown d-lg-none">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="ri-search-line fs-22"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                                <form class="p-3">
                                    <input type="search" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                </form>
                            </div>
                        </li>

                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="assets/images/flags/us.jpg" alt="user-image" class="me-0 me-sm-1" height="12">
                                <span class="align-middle d-none d-lg-inline-block">English</span> <i class="ri-arrow-down-s-line d-none d-sm-inline-block align-middle"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated">

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <img src="assets/images/flags/germany.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">German</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <img src="assets/images/flags/italy.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Italian</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <img src="assets/images/flags/spain.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Spanish</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <img src="assets/images/flags/russia.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Russian</span>
                                </a>

                            </div>
                        </li>
                        <li class="d-none d-sm-inline-block">
                            <div class="nav-link" id="light-dark-mode" data-bs-toggle="tooltip" data-bs-placement="left" title="Theme Mode">
                                <i class="ri-moon-line fs-22"></i>
                            </div>
                        </li>


                        <li class="d-none d-md-inline-block">
                            <a class="nav-link" href="#" data-toggle="fullscreen">
                                <i class="ri-fullscreen-line fs-22"></i>
                            </a>
                        </li>

                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle arrow-none nav-user px-2" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <span class="account-user-avatar">
                                    <img src="assets/images/users/avatar-1.jpg" alt="user-image" width="32" class="rounded-circle">
                                </span>
                                <span class="d-lg-flex flex-column gap-1 d-none">
                                    <h5 class="my-0">Tosha Minner</h5>
                                    <h6 class="my-0 fw-normal">Founder</h6>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                                <!-- item-->
                                <div class=" dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="pages-profile.html" class="dropdown-item">
                                    <i class="ri-account-circle-line fs-18 align-middle me-1"></i>
                                    <span>My Account</span>
                                </a>

                                <!-- item-->
                                <a href="pages-profile.html" class="dropdown-item">
                                    <i class="ri-settings-4-line fs-18 align-middle me-1"></i>
                                    <span>Settings</span>
                                </a>

                                <!-- item-->
                                <a href="pages-faq.html" class="dropdown-item">
                                    <i class="ri-customer-service-2-line fs-18 align-middle me-1"></i>
                                    <span>Support</span>
                                </a>

                                <!-- item-->
                                <a href="auth-lock-screen.html" class="dropdown-item">
                                    <i class="ri-lock-password-line fs-18 align-middle me-1"></i>
                                    <span>Lock Screen</span>
                                </a>

                                <!-- item-->
                                <a href="auth-logout-2.html" class="dropdown-item">
                                    <i class="ri-logout-box-line fs-18 align-middle me-1"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- ========== Topbar End ========== -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu">

                <!-- Brand Logo Light -->
                <a href="index.html" class="logo logo-light" style="background:white">
                    <span class="logo-lg">
                        <img src="assets/images/carlogo.png" style="width:90px;height:90px" alt="logo">
                    </span>
                    <span class="logo-sm">
                        <img src="assets/images/carlogo.png" style="width:90px;height:90px" alt="small logo">
                    </span>
                </a>

                <!-- Brand Logo Dark -->
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-lg">
                        <img src="assets/images/carlogo.png" style="width:90px;height:90px" alt="dark logo">
                    </span>
                    <span class="logo-sm">
                        <img src="assets/images/carlogo.png" style="width:90px;height:90px" alt="small logo">
                    </span>
                </a>

                <!-- Sidebar Hover Menu Toggle Button -->
                <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
                    <i class="ri-checkbox-blank-circle-line align-middle"></i>
                </div>

                <!-- Full Sidebar Menu Close Button -->
                <div class="button-close-fullsidebar">
                    <i class="ri-close-fill align-middle"></i>
                </div>

                <!-- Sidebar -left -->
                <div class="h-100" id="leftside-menu-container" data-simplebar>
                    <!-- Leftbar User -->
                    <div class="leftbar-user">
                        <a href="pages-profile.html">
                            <img src="assets/images/users/avatar-1.jpg" alt="user-image" height="42" class="rounded-circle shadow-sm">
                            <span class="leftbar-user-name mt-2">Tosha Minner</span>
                        </a>
                    </div>

                    <!--- Sidemenu -->
                    <!-- <ul class="side-nav">

                        <li class="side-nav-title">Navigation</li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                                <i class="ri-home-4-line"></i>
                                <span class="badge bg-success float-end">2</span>
                                <span> Dashboards </span>
                            </a>
                            <div class="collapse" id="sidebarDashboards">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="dashboard-analytics.html">Analytics</a>
                                    </li>
                                    <li>
                                        <a href="index.html">Ecommerce</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        

                        <li class="side-nav-item">
                            <a href="apps-calendar.html" class="side-nav-link">
                                <i class="ri-calendar-event-line"></i>
                                <span> Fleet </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="apps-chat.html" class="side-nav-link">
                                <i class="ri-message-3-line"></i>
                                <span> Bookings </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="apps-chat.html" class="side-nav-link">
                                <i class="ri-message-3-line"></i>
                                <span> Customers </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="apps-chat.html" class="side-nav-link">
                                <i class="ri-message-3-line"></i>
                                <span> Financials </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="apps-chat.html" class="side-nav-link">
                                <i class="ri-message-3-line"></i>
                                <span> Payment Gateway </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="apps-chat.html" class="side-nav-link">
                                <i class="ri-message-3-line"></i>
                                <span> Toll Management </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="apps-chat.html" class="side-nav-link">
                                <i class="ri-message-3-line"></i>
                                <span> Driver Management </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="apps-chat.html" class="side-nav-link">
                                <i class="ri-message-3-line"></i>
                                <span> Maintenance </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="apps-chat.html" class="side-nav-link">
                                <i class="ri-message-3-line"></i>
                                <span> Analytics </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="apps-chat.html" class="side-nav-link">
                                <i class="ri-message-3-line"></i>
                                <span> Reports </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="apps-chat.html" class="side-nav-link">
                                <i class="ri-message-3-line"></i>
                                <span> User Management </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="apps-chat.html" class="side-nav-link">
                                <i class="ri-message-3-line"></i>
                                <span> Maintenance </span>
                            </a>
                        </li>
                        


                    </ul> -->

                    <ul class="side-nav">

  <li class="side-nav-title">Navigation</li>

  <li class="side-nav-item">
    <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
      <i class="ri-home-4-line"></i>
      <span class="badge bg-success float-end">2</span>
      <span> Dashboards </span>
    </a>
    <div class="collapse" id="sidebarDashboards">
      <ul class="side-nav-second-level">
        <li><a href="dashboard-analytics.html">Analytics</a></li>
        <li><a href="index.html">Ecommerce</a></li>
      </ul>
    </div>
  </li>

  <li class="side-nav-item">
    <a href="{{route('admin.category')}}" class="side-nav-link">
      <i class="ri-truck-line"></i>
      <span> Vehicle Category </span>
    </a>
  </li>

  <li class="side-nav-item">
    <a href="{{route('admin.calander')}}" class="side-nav-link">
      <i class="ri-truck-line"></i>
      <span> Calander </span>
    </a>
  </li>

  <li class="side-nav-item">
    <a href="{{route('admin.fleet')}}" class="side-nav-link">
      <i class="ri-truck-line"></i>
      <span> Fleet </span>
    </a>
  </li>

  <li class="side-nav-item">
    <a href="{{url('admin.bookin')}}" class="side-nav-link">
      <i class="ri-bookmark-line"></i>
      <span> Booking Calander </span>
    </a>
  </li>

  <li class="side-nav-item">
    <a href="{{route('admin.bookings')}}" class="side-nav-link">
      <i class="ri-bookmark-line"></i>
      <span> Bookings </span>
    </a>
  </li>

  <li class="side-nav-item">
    <a href="{{route('admin.customers')}}" class="side-nav-link">
      <i class="ri-user-3-line"></i>
      <span> Customers </span>
    </a>
  </li>

  <li class="side-nav-item">
    <a href="{{route('admin.financials')}}" class="side-nav-link">
      <i class="ri-bar-chart-2-line"></i>
      <span> Financials </span>
    </a>
  </li>

  <li class="side-nav-item">
    <a href="{{route('admin.payment')}}" class="side-nav-link">
      <i class="ri-bank-card-line"></i>
      <span> Payment Gateway </span>
    </a>
  </li>

  <li class="side-nav-item">
    <a href="{{route('admin.toll')}}" class="side-nav-link">
      <i class="ri-road-map-line"></i>
      <span> Toll Management </span>
    </a>
  </li>

  <li class="side-nav-item">
    <a href="{{route('admin.driver')}}" class="side-nav-link">
      <i class="ri-steering-2-line"></i>
      <span> Driver Management </span>
    </a>
  </li>

  <li class="side-nav-item">
    <a href="{{route('admin.maintenance')}}" class="side-nav-link">
      <i class="ri-tools-line"></i>
      <span> Maintenance </span>
    </a>
  </li>

  <li class="side-nav-item">
    <a href="{{route('admin.analytics')}}" class="side-nav-link">
      <i class="ri-line-chart-line"></i>
      <span> Analytics </span>
    </a>
  </li>

  <li class="side-nav-item">
    <a href="{{route('admin.reports')}}" class="side-nav-link">
      <i class="ri-file-chart-line"></i>
      <span> Reports </span>
    </a>
  </li>

  <li class="side-nav-item">
    <a href="{{route('admin.usermanagement')}}" class="side-nav-link">
      <i class="ri-user-settings-line"></i>
      <span> User Management </span>
    </a>
  </li>

  <li class="side-nav-item">
    <a href="{{route('admin.setting')}}" class="side-nav-link">
      <i class="ri-settings-3-line"></i>
      <span> Settings </span>
    </a>
  </li>

</ul>
                    <!--- End Sidemenu -->

                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- ========== Left Sidebar End ========== -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="{{ asset('assets/logo-kemendag.png') }}" type="image/gif" sizes="16x16">
    <title>Kemendag | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('lib/bootstrap_5/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <style>
        .logout-btn {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            padding: 0.375rem 0.75rem;
            transition: all 0.3s ease;
            color: #dc3545;
            display: flex;
            align-items: center;
            margin-top: 10px;
        }
        .logout-btn:hover {
            background-color: #dc3545;
            color: white;
        }
        .sidebar-footer {
            margin-top: auto;
            padding-top: 20px;
        }
    </style>
</head>
<body>
    <div class="d2c_wrapper">
        <div class="d2c_sidebar rounded-4 px-4 py-4 py-md-4 m-4 me-0" id="sidebar">
            <div class="d-flex flex-column h-100">
                <ul class="navbar-nav flex-grow-1" id="d2c_Sidebar">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.event.index') }}">
                            <i class="fas fa-home me-2"></i>
                            <span>Event</span>
                        </a>
                    </li>      
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.article.index') }}">
                            <i class="fas fa-book me-2"></i>
                            <span>Article</span>
                        </a>
                    </li>          
                </ul>     
                <hr class="divider">
                <div class="sidebar-mini-btn text-light">
                    <div class="dropdown">
                        <a class="dropdown-closer" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                             <img class="img-profile rounded-circle object-fit-cover border border-2 border-white me-2"
                                src="{{ asset('assets/icon/profil.jpg') }}" alt="avatar" width="30" height="30">
                            <span>{{Auth::user()->name}}</span>
                        </a>
                        <div class="dropdown-menu shadow border-0 end-0 start rounded-3">
                            <form action="{{ route('logout') }}" id="dropdown-logout-form">
                                <button type="submit" class="dropdown-item">
                                    <i class="fas fa-sign-out-alt fa-fw me-2 text-gray-400"></i>
                                    Logout
                                </button>
                            </form>
                            <div class="dropdown-arrow bg-info"></div>
                        </div>
                    </div>
                </div>
                
                <!-- Added dedicated logout button -->
                <div class="sidebar-footer">
                    <form action="{{ route('logout') }}" id="sidebar-logout-form">
                        @csrf
                        <button type="submit" class="btn w-100 logout-btn">
                            <i class="fas fa-sign-out-alt fa-fw me-2"></i>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="d2c_main px-lg-4 px-md-4 px-3">
            <nav class="navbar navbar-expand navbar-light sticky-top bg-white shadow py-2 px-3 rounded-4 d2c_top_navbar my-4">
                <button type="button" id="sidebarCollapse"
                    class="btn btn-transparent text-info d2c_sidebar_collapse me-1">
                    <i class="fas fa-bars"></i>
                </button>
            </nav>
            <div class="body">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{ asset('lib/jQuery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('lib/bootstrap_5/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
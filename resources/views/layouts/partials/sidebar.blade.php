<div class="left-side-menu">
    <div class="h-100" data-simplebar>
        <div class="user-box text-center">
            <img src="{{ asset('assets/images/users/user-6.jpg') }}" alt="user-img" title="Mat Helme" class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-black dropdown-toggle h5 mt-2 mb-1 d-block"
                    data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                <div class="dropdown-menu user-pro-dropdown">
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user me-1"></i>
                        <span>My Account</span>
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings me-1"></i>
                        <span>Settings</span>
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock me-1"></i>
                        <span>Lock Screen</span>
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out me-1"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
        </div>
        <div id="sidebar-menu">
            <ul id="side-menu">
                <li class="menu-title">Navigation</li>
                <li>
                    <a href="{{ route('dashboard') }}">
                        <i data-feather="airplay"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                <li>
                    <a href="#client" data-bs-toggle="collapse">
                        <i data-feather="users"></i>
                        <span> Client Info </span>
                        <span class="menu-arrow"></span>
                        <div class="collapse" id="client">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('bank.index') }}">Bank</a>
                                </li>
                                <li>
                                    <a href="{{ route('pic.index') }}">PIC</a>
                                </li>
                            </ul>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pembekalan.index') }}">
                        <i data-feather="calendar"></i>
                        <span> Schedule </span>
                    </a>
                </li>
                <li>
                    <a href="#document" data-bs-toggle="collapse">
                        <i data-feather="book"></i>
                        <span> Documents </span>
                        <span class="menu-arrow"></span>
                        <div class="collapse" id="document">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('surat-penawaran.index') }}">Surat Penawaran</a>
                                </li>
                                <li>
                                    <a href="{{ route('surat-penegasan.index') }}">Surat Penegasan</a>
                                </li>
                                <li>
                                    <a href="{{ route('berita-acara.index') }}">Berita Acara</a>
                                </li>
                                <li>
                                    <a href="#">Invoice</a>
                                </li>
                            </ul>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#general_info" data-bs-toggle="collapse">
                        <i data-feather="folder-plus"></i>
                        <span> General Info </span>
                        <span class="menu-arrow"></span>
                        <div class="collapse" id="general_info">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('materi_pembekalan.index') }}">Program Pembekalan</a>
                                </li>
                                <li>
                                    <a href="{{ route('pengajar.index') }}">Pengajar</a>
                                </li>
                            </ul>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

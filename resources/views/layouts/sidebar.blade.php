<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="dropdown header-profile">
                @guest
                @else
                    <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                        <img src="{{ asset('assets/images/avatar/1.png') }}" width="20" alt="">
                        <div class="header-info ms-3">
                            <span class="font-w600 ">
                                {{ Auth::user()->name }}
                            </span>
                            <small class="text-end font-w400">{{ Auth::user()->role }}</small>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @if (Auth::user()->role == 'admin')
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-025-dashboard"></i>
                            <span class="nav-text">Menu</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('/home') }}">Dashboard</a></li>
                            <li><a href="{{ url('users') }}">Data User</a></li>
                            <li><a href="{{ url('barangs') }}">Data Barang</a></li>
                            <li><a href="{{ url('mereks') }}">Data Merek</a></li>
                            <li><a href="{{ url('types') }}">Data Type</a></li>
                            <li><a href="{{ url('distributors') }}">Data Distributor</a></li>

                        </ul>

                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-072-printer"></i>
                            <span class="nav-text">Laporan</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('barang-masuk') }}">Barang Masuk</a></li>
                            <li><a href="{{ url('barang-keluar') }}">Barang Keluar</a></li>
                        </ul>

                    </li>
                @else
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-025-dashboard"></i>
                            <span class="nav-text">Menu</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('/home') }}">Dashboard</a></li>
                            <li><a href="{{ url('barang-masuk') }}">Data Barang Masuk</a></li>
                            <li><a href="{{ url('barang-keluar') }}">Data Barang Keluar</a></li>
                        </ul>

                    </li>
                @endif

            @endguest
        </ul>
        <div class="copyright">
            <p> © 2022 All Rights Reserved</p>
            <p class="fs-12">Made with <span class="heart"></span> by DexignLab</p>
        </div>
    </div>
</div>

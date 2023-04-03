<div class="sidebar-wrapper">
    <div class="sidebar sidebar-collapse" id="sidebar">
        <div class="sidebar__menu-group">
            <ul class="sidebar_nav">
                <li>
                    <a class="{{ request()->is('bang-dieu-khien') || request()->is('/') ? 'active' : '' }}"
                        href="{{ url('/bang-dieu-khien') }}">
                        <span class="nav-icon uil uil-create-dashboard"></span>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>
                <li class="has-child">
                    <a href="#" class="">
                        <span class="nav-icon uil uil-users-alt"></span>
                        <span class="menu-text">Quản lý nhân viên</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul>
                        <li class="l_sidebar">
                            <a class="{{ request()->is('danh-sach-user') ? 'active' : '' }}"
                                href="{{ url('/danh-sach-user') }}">Danh sách nhân viên</a>
                        </li>
                        <li class="l_sidebar">
                            <a class="{{ request()->is('them-tai-khoan') ? 'active' : '' }}"
                                href="{{ url('/them-tai-khoan') }}">Thêm
                                nhân viên</a>
                        </li>
                    </ul>
                </li>
                <li class="has-child">
                    <a href="#" class="">
                        <span class="nav-icon uil uil-arrow-growth"></span>
                        <span class="menu-text">Quản lý tài chính</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul>
                        <li class="l_sidebar">
                            <a class="{{ request()->is('tong-quan') ? 'active' : '' }}"
                                href="{{ url('/tong-quan') }}">Tổng quan</a>
                        </li>
                        <li class="l_sidebar">
                            <a class="{{ request()->is('tong-thu') ? 'active' : '' }}"
                                href="{{ url('/tong-thu') }}">Khoản thu</a>
                        </li>
                        <li class="l_sidebar">
                            <a class="{{ request()->is('tong-chi') ? 'active' : '' }}"
                                href="{{ url('/tong-chi') }}">Khoản chi</a>
                        </li>
                    </ul>
                </li>

                <li class="has-child">
                    <a href="#">
                        <span class="nav-icon uil uil-car-sideview"></span>
                        <span class="menu-text">Quản lý xe</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul>
                        <li class="l_sidebar">
                            <a class="{{ request()->is('danh-sach-xe') ? 'active' : '' }}"
                                href="{{ url('/danh-sach-xe') }}">Danh sách xe</a>
                        </li>
                        <li class="l_sidebar">
                            <a class="{{ request()->is('them-xe') ? 'active' : '' }}"
                                href="{{ url('/them-xe') }}">Thêm
                                xe mới</a>
                        </li>
                        <li class="l_sidebar">
                            <a class="{{ request()->is('them-loai-xe') ? 'active' : '' }}"
                                href="{{ url('/them-loai-xe') }}">Thêm loại xe</a>
                        </li>
                        <li class="l_sidebar">
                            <a class="{{ request()->is('them-thuong-hieu') ? 'active' : '' }}"
                                href="{{ url('/them-thuong-hieu') }}">Thêm thương hiệu</a>
                        </li>
                    </ul>
                </li>
                <li class="has-child">
                    <a href="#" class="">
                        <span class="nav-icon uil uil-file-medical-alt"></span>
                        <span class="menu-text">Bảo dưỡng/ kiểm tra xe</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul>
                        <li class="l_sidebar">
                            <a class="{{ request()->is('danh-sach-kiem-tra') ? 'active' : '' }}"
                                href="{{ url('/danh-sach-kiem-tra') }}">Danh sách kiểm tra</a>
                        </li>
                        <li class="l_sidebar">
                            <a href="#">Lịch sử</a>
                        </li>
                    </ul>
                </li>

                <li class="has-child">
                    <a href="#" class="">
                        <span class="nav-icon uil uil-file-medical-alt"></span>
                        <span class="menu-text">Cho thuê xe</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul>
                        <li class="l_sidebar">
                            <a class="{{ request()->is('danh-sach-cho-thue') ? 'active' : '' }}"
                                href="{{ url('/danh-sach-cho-thue') }}">Danh sách xe</a>
                        </li>
                        <li class="l_sidebar">
                            <a class="{{ request()->is('tra-xe') ? 'active' : '' }}" href="{{ url('/tra-xe') }}">Trả
                                xe thuê</a>
                        </li>
                        <li class="l_sidebar">
                            <a class="{{ request()->is('thanh-toan-thue-xe') ? 'active' : '' }}"
                                href="{{ url('/thanh-toan-thue-xe') }}">Thanh toán</a>
                        </li>
                    </ul>
                </li>

                {{-- <li class="menu-title mt-30">
                    <span>Chức năng</span>
                </li>
                <li>
                    <a href="#" class="">
                        <span class="nav-icon uil uil-calendar-alt"></span>
                        <span class="menu-text">Lịch làm việc</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="d-flex justify-content-center">
                        <span class="menu-text btn btn-warning">Chấm công</span>
                    </a>
                </li> --}}
            </ul>
        </div>
    </div>
</div>

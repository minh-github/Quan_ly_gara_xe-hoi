@extends('index')
@section('content')
    @include('components.notification')
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-main user-member justify-content-sm-between">
                        <div class="d-flex justify-content-center breadcrumb-main__wrapper flex-wrap">
                            <div class="d-flex align-items-center user-member__title justify-content-center me-sm-25">
                                <h4 class="text-capitalize fw-500 breadcrumb-title">Danh sách nhân viên</h4>
                                <span class="sub-title ms-sm-25 ps-sm-25">Dashboard</span>
                            </div>
                            <form action="https://demo.dashboardmarket.com/"
                                class="d-flex align-items-center user-member__form my-sm-0 my-2">
                                <img src="img/svg/search.svg" alt="search" class="svg">
                                <input class="form-control me-sm-2 box-shadow-none border-0" type="search"
                                    placeholder="Tìm kiếm theo tên" aria-label="Search">
                            </form>
                        </div>
                        <div class="action-btn">
                            <a href="{{ url('/them-tai-khoan') }}" class="btn px-15 btn-primary">
                                <i class="las la-plus fs-16"></i>Thêm người dùng</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($users as $user)
                    <div class="col-md-6 col-sm-12 mb-25">
                        <div class="media py-30 ps-30 pe-20 radius-xl users-list bg-white">
                            <img class="me-20 rounded-circle wh-80 bg-opacity-primary" style="object-fit: cover"
                                src="{{ $user->Avatar }}" alt="Generic placeholder image">
                            <div class="media-body d-xl-flex users-list-body">
                                <div class="pe-xl-30 users-list-body__title flex-1">
                                    <h6 class="fw-500 mt-0">{{ $user->name }}</h6>
                                    <span>
                                        @if ($user->role == '1')
                                            Quản trị viên
                                        @else
                                            Nhân viên
                                        @endif
                                    </span>
                                    <p class="mb-0">{{ $user->email }}</p>
                                </div>
                                <div class="users-list__button mt-xl-0 mt-15">
                                    @if ($user->role == '0')
                                        <a href="{{ url('/nguoi-dung/' . $user->id) }}"
                                            class="btn btn-primary btn-default btn-squared text-capitalize global-shadow mb-10 px-20">Cấp
                                            quyền quản trị
                                        </a>
                                    @endif
                                    <button type="button"
                                        class="text-capitalize px-25 color-gray transparent shadow2 follow my-xl-0 radius-md border">
                                        Nhắn tin</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="user-pagination">
                        <div class="d-flex justify-content-md-end justify-content-center mb-30 mt-1">
                            <nav class="dm-page">
                                <ul class="dm-pagination d-flex">
                                    <li class="dm-pagination__item">
                                        <a href="#" class="dm-pagination__link pagination-control"><span
                                                class="la la-angle-left"></span></a>
                                        <a href="#" class="dm-pagination__link"><span class="page-number">1</span></a>
                                        <a href="#" class="dm-pagination__link active"><span
                                                class="page-number">2</span></a>
                                        <a href="#" class="dm-pagination__link"><span class="page-number">3</span></a>
                                        <a href="#" class="dm-pagination__link pagination-control"><span
                                                class="page-number">...</span></a>
                                        <a href="#" class="dm-pagination__link"><span
                                                class="page-number">12</span></a>
                                        <a href="#" class="dm-pagination__link pagination-control"><span
                                                class="la la-angle-right"></span></a>
                                        <a href="#" class="dm-pagination__option">
                                        </a>
                                    </li>
                                    <li class="dm-pagination__item">
                                        <div class="paging-option">
                                            <select name="page-number" class="page-selection">
                                                <option value="20">20/page</option>
                                                <option value="40">40/page</option>
                                                <option value="60">60/page</option>
                                            </select>
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

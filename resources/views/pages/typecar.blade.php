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
                                <h4 class="text-capitalize fw-500 breadcrumb-title">Danh sách loại xe</h4>
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
                            <a href="#" class="btn px-15 btn-primary" data-bs-toggle="modal"
                                data-bs-target="#new-member">
                                <i class="las la-plus fs-16"></i>Thêm loại xe</a>
                            @include('components.add-typecar-modal')
                            @include('components.edit-typecar-modal')
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($typeCar as $type)
                    <div class="col-md-4 col-sm-6 mb-25">
                        <div class="media py-30 ps-30 pe-20 radius-xl users-list bg-white">
                            <div class="media-body d-xl-flex users-list-body">
                                <div class="pe-xl-30 users-list-body__title d-flex align-items-center flex-1">
                                    <h6 class="fw-500 mt-0">{{ $type->TenLoaiXe }}</h6>
                                </div>
                                <div class="d-flex users-list__button mt-xl-0 mt-15">
                                    <ul class="orderDatatable_actions d-flex mb-0 flex-wrap">
                                        <li>
                                            <a href="#" onclick="editTypeCar(event,{{ $type->id }})"
                                                class="edit">
                                                <i class="uil uil-edit"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/xoa-loai-xe/' . $type->id) }}" class="remove">
                                                <i class="uil uil-trash-alt"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ url('js/edit-type-car.js') }}"></script>
@endsection

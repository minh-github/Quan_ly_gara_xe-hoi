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
                                <h4 class="text-capitalize fw-500 breadcrumb-title">Danh sách thanh toán</h4>
                                <span class="sub-title ms-sm-25 ps-sm-25">Home</span>
                            </div>
                            <form action="https://demo.dashboardmarket.com/"
                                class="d-flex align-items-center user-member__form my-sm-0 my-2">
                                <img src="img/svg/search.svg" alt="search" class="svg">
                                <input class="form-control me-sm-2 box-shadow-none border-0" type="search"
                                    placeholder="Search by Name" aria-label="Search">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="userDatatable global-shadow border-light-0 p-30 radius-xl w-100 mb-30 bg-white">
                        <div class="table-responsive">
                            <table class="table-borderless mb-0 table">
                                <thead>
                                    <tr class="userDatatable-header">
                                        <th>
                                            <div class="d-flex align-items-center">
                                                <div class="custom-checkbox check-all">
                                                    <input class="checkbox" type="checkbox" id="check-44">
                                                    <label for="check-44">
                                                        <span class="checkbox-text userDatatable-title">Mã phiếu thuê</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">người thuê</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">số điện thoại</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">số căn cước</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">ngày thuê</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">ngày trả</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title float-end">tùy chọn</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($phieuThue as $item)
                                        <tr>
                                            <td>
                                                <div class="userDatatable__imgWrapper d-flex align-items-center">
                                                    <div class="checkbox-group-wrapper">
                                                        <div class="checkbox-group d-flex">
                                                            <div
                                                                class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                                <input class="checkbox" type="checkbox"
                                                                    id="check-grp-content{{ $loop->index }}">
                                                                <label for="check-grp-content{{ $loop->index }}"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="userDatatable-content">
                                                        Phiếu: {{ $item->id }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ $item->TenNguoiThue }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ $item->SoDienThoai }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ $item->CMNDT }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ $item->NgayThue }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ $item->NgayTra }}
                                                </div>
                                            </td>
                                            <td>
                                                <ul class="d-flex justify-content-center">
                                                    <li>
                                                        <a href="{{ url('/thanh-toan-tien/' . $item->id) }}"
                                                            class="btn px-15 btn-primary"></i>Thanh toán</a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

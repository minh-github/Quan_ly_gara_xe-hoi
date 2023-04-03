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
                                <h4 class="text-capitalize fw-500 breadcrumb-title">Danh sách cần kiểm tra</h4>
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
                                                        <span class="checkbox-text userDatatable-title">Xe</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">loại xe</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">số ghế</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">giá / ngày</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">tình trạng</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title float-end">tùy chọn</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($listBackCheck) > 0)
                                        <th>
                                            <span class="userDatatable-title">kiểm tra nhận xe</span>
                                        </th>
                                        @foreach ($listBackCheck as $item)
                                            <tr>
                                                <td>
                                                    <div class="d-flex">
                                                        <div class="userDatatable__imgWrapper d-flex align-items-center">
                                                            <div class="checkbox-group-wrapper">
                                                                <div class="checkbox-group d-flex">
                                                                    <div
                                                                        class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                                        <input class="checkbox" type="checkbox"
                                                                            id="check-grp-content{{ $loop->index }}">
                                                                        <label
                                                                            for="check-grp-content{{ $loop->index }}"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a href="#"
                                                                style="width:60px; height:60px; overflow:hidden; border-radius:100%">
                                                                <img class="w-100 h-100 object-fit-cover"
                                                                    src="{{ url($item->car->HinhAnh) }}" alt="ảnh xe hơi">
                                                            </a>
                                                        </div>
                                                        <div class="userDatatable-inline-title">
                                                            <a href="#" class="text-dark fw-500">
                                                                <h6>{{ $item->car->TenXe }}</h6>
                                                            </a>
                                                            <p class="d-block mb-0">
                                                                {{ $item->car->brand->TenThuongHieu }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        <a href="https://demo.dashboardmarket.com/cdn-cgi/l/email-protection"
                                                            class="__cf_email__"
                                                            data-cfemail="94fefbfcfab9fff1f8f8f1e6d4f3f9f5fdf8baf7fbf9">{{ $item->car->typeCar->TenLoaiXe }}</a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $item->car->SoCho }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $item->car->GiaThueNgay }} VND
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content d-inline-block">
                                                        @if ($item->car->check[0]->TrangThaiCheck == 2)
                                                            <span
                                                                class="bg-opacity-success color-success rounded-pill userDatatable-content-status active">kiểm
                                                                tra trả xe</span>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <ul class="d-flex justify-content-center">
                                                        <li>
                                                            <a href="{{ url('/kiem-tra-nhan-xe/' . $item->lease->idKTS) }}"
                                                                class="btn px-15 btn-warning"></i>Kiểm tra</a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    @if (count($listFrontCheck) > 0)
                                        <th>
                                            <span class="userDatatable-title">kiểm tra cho thuê xe</span>
                                        </th>
                                        @foreach ($listFrontCheck as $car)
                                            <tr>
                                                <td>
                                                    <div class="d-flex">
                                                        <div class="userDatatable__imgWrapper d-flex align-items-center">
                                                            <div class="checkbox-group-wrapper">
                                                                <div class="checkbox-group d-flex">
                                                                    <div
                                                                        class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                                        <input class="checkbox" type="checkbox"
                                                                            id="check-grp-content{{ $loop->index }}">
                                                                        <label
                                                                            for="check-grp-content{{ $loop->index }}"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a href="#"
                                                                style="width:60px; height:60px; overflow:hidden; border-radius:100%">
                                                                <img class="w-100 h-100 object-fit-cover"
                                                                    src="{{ url($car->car->HinhAnh) }}" alt="ảnh xe hơi">
                                                            </a>
                                                        </div>
                                                        <div class="userDatatable-inline-title">
                                                            <a href="#" class="text-dark fw-500">
                                                                <h6>{{ $car->car->TenXe }}</h6>
                                                            </a>
                                                            <p class="d-block mb-0">
                                                                {{ $car->car->brand->TenThuongHieu }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        <a href="https://demo.dashboardmarket.com/cdn-cgi/l/email-protection"
                                                            class="__cf_email__"
                                                            data-cfemail="94fefbfcfab9fff1f8f8f1e6d4f3f9f5fdf8baf7fbf9">{{ $car->car->typeCar->TenLoaiXe }}</a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $car->car->SoCho }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $car->car->GiaThueNgay }} VND
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content d-inline-block">
                                                        @if ($car->car->check[0]->TrangThaiCheck == 0)
                                                            <span
                                                                class="bg-opacity-warning color-warning rounded-pill userDatatable-content-status active">Chờ
                                                                kiểm tra</span>
                                                        @endif
                                                        @if ($car->car->check[0]->TrangThaiCheck == 1)
                                                            <span
                                                                class="bg-opacity-danger color-warning rounded-pill userDatatable-content-status active">Đang
                                                                kiểm tra</span>
                                                        @endif
                                                        @if ($car->car->check[0]->TrangThaiCheck == 2)
                                                            <span
                                                                class="bg-opacity-success color-success rounded-pill userDatatable-content-status active">Đã
                                                                kiểm tra</span>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <ul class="d-flex justify-content-center">
                                                        @if ($car->car->check[0]->TrangThaiCheck == 0)
                                                            <li>
                                                                <a href="{{ url('/kiem-tra/' . $car->car->id) }}"
                                                                    class="btn px-15 btn-warning"></i>Kiểm tra</a>
                                                            </li>
                                                        @endif
                                                        @if ($car->car->check[0]->TrangThaiCheck == 1)
                                                            <li>
                                                                <a href="{{ url('/kiem-tra/' . $car->car->id) }}"
                                                                    class="btn px-15 btn-warning"></i>Tiếp tục</a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    @if (count($normalCheck) > 0)
                                        <th>
                                            <span class="userDatatable-title">kiểm tra xe định kỳ</span>
                                        </th>
                                        @foreach ($normalCheck as $car)
                                            <tr>
                                                <td>
                                                    <div class="d-flex">
                                                        <div class="userDatatable__imgWrapper d-flex align-items-center">
                                                            <div class="checkbox-group-wrapper">
                                                                <div class="checkbox-group d-flex">
                                                                    <div
                                                                        class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                                        <input class="checkbox" type="checkbox"
                                                                            id="check-grp-content{{ $loop->index }}">
                                                                        <label
                                                                            for="check-grp-content{{ $loop->index }}"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a href="#"
                                                                style="width:60px; height:60px; overflow:hidden; border-radius:100%">
                                                                <img class="w-100 h-100 object-fit-cover"
                                                                    src="{{ url($car->HinhAnh) }}" alt="ảnh xe hơi">
                                                            </a>
                                                        </div>
                                                        <div class="userDatatable-inline-title">
                                                            <a href="#" class="text-dark fw-500">
                                                                <h6>{{ $car->TenXe }}</h6>
                                                            </a>
                                                            <p class="d-block mb-0">
                                                                {{ $car->brand->TenThuongHieu }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        <a href="https://demo.dashboardmarket.com/cdn-cgi/l/email-protection"
                                                            class="__cf_email__"
                                                            data-cfemail="94fefbfcfab9fff1f8f8f1e6d4f3f9f5fdf8baf7fbf9">{{ $car->typeCar->TenLoaiXe }}</a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $car->SoCho }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $car->GiaThueNgay }} VND
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content d-inline-block">
                                                        @if ($car->check[0]->TrangThaiCheck == 0)
                                                            <span
                                                                class="bg-opacity-success color-success rounded-pill userDatatable-content-status active">Chưa
                                                                kiểm tra</span>
                                                        @endif
                                                        @if ($car->check[0]->TrangThaiCheck == 1)
                                                            <span
                                                                class="bg-opacity-success color-success rounded-pill userDatatable-content-status active">Đang
                                                                kiểm tra</span>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <ul class="d-flex justify-content-center">
                                                        @if ($car->check[0]->TrangThaiCheck == 0)
                                                            <li>
                                                                <a href="{{ url('/kiem-tra-dinh-ky/' . $car->id) }}"
                                                                    class="btn px-15 btn-warning"></i>Kiểm tra</a>
                                                            </li>
                                                        @endif
                                                        @if ($car->check[0]->TrangThaiCheck == 1)
                                                            <li>
                                                                <a href="{{ url('/kiem-tra-dinh-ky/' . $car->id) }}"
                                                                    class="btn px-15 btn-warning"></i>Tiếp tục</a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

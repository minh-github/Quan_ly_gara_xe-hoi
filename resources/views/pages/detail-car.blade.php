@extends('index')
@section('content')
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop-breadcrumb">
                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">Thông tin xe</h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#"><i class="uil uil-estate"></i>Home</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Quản lý xe</li>
                                        <li class="breadcrumb-item active" aria-current="page">Thông tin xe</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="product-add global-shadow px-sm-30 py-sm-50 radius-xl w-100 mb-40 bg-white px-0 py-20">
                    <div class="row justify-content-center">
                        <div class="mb-30 row">
                            <div class="col-lg-6">
                                <div class="card-header">
                                    <h6 class="fw-500 h3">Thông tin xe</h6>
                                </div>
                                <div class="add-product__body px-sm-40 px-20">
                                    <div class="form-group">
                                        <label for="nameCar">Tên xe</label>
                                        <input type="text" disabled class="form-control" id="nameCar"
                                            value="{{ $car->TenXe }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="typeCar">Loại xe</label>
                                        <input type="text" disabled class="form-control" id="typeCar"
                                            value="{{ $car->typeCar->TenLoaiXe }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Đời xe</label>
                                        <input type="text" disabled class="form-control" id="date"
                                            value="{{ $car->DoiXe }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="seats">Số ghế</label>
                                        <input type="text" disabled class="form-control" id="seats"
                                            value="{{ $car->SoCho }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="brandCar">Loại xe</label>
                                        <input type="text" disabled class="form-control" id="brandCar"
                                            value="{{ $car->brand->TenThuongHieu }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="dungTich">Dung tích xi lanh</label>
                                        <input type="text" disabled class="form-control" id="dungTich"
                                            value="{{ $car->DungTich }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="color">Màu sơn</label>
                                        <input type="text" disabled class="form-control" id="color"
                                            value="{{ $car->MauSon }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="plate">Biển số</label>
                                        <input type="text" disabled class="form-control" id="plate"
                                            value="{{ $car->BienSo }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="soKhung">Số khung</label>
                                        <input type="text" disabled class="form-control" id="soKhung"
                                            value="{{ $car->SoKhung }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="soMay">Số máy</label>
                                        <input type="text" disabled class="form-control" id="soMay"
                                            value="{{ $car->SoMay }}">
                                    </div>
                                    <div class="form-group w-100 me-sm-15 form-group-calender">
                                        <label for="datepicker">Đăng ký lần đầu</label>
                                        <div class="position-relative">
                                            <input type="text" disabled class="form-control" id="datepicker"
                                                value="{{ $car->DangKyLanDau }}">
                                        </div>
                                    </div>
                                    <div class="form-group w-100 form-group-calender">
                                        <label for="datepicker2">Hạn đăng kiểm</label>
                                        <div class="position-relative">
                                            <input type="text" disabled class="form-control" id="datepicker2"
                                                value="{{ $car->HetDangKiem }}">
                                        </div>
                                    </div>
                                    <div class="form-group w-100 form-group-calender">
                                        <label for="datepicker2">Hạn bảo hiểm</label>
                                        <div class="position-relative">
                                            <input type="text" disabled class="form-control" id="datepicker2"
                                                value="{{ $car->HetHanBaoHiem }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="countryOption">
                                            <label for="status">Tình trạng xe</label>
                                            <input type="text" disabled class="form-control" id="status"
                                                value="{{ $car->TinhTrang }}">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="card-header">
                                    <h6 class="fw-500 h3">Thông tin chủ xe</h6>
                                </div>
                                <div class="add-product__body px-sm-40 px-20">
                                    <div class="form-group">
                                        <label for="nameOwner">Tên chủ xe</label>
                                        <input type="text" class="form-control" disabled id="nameOwner"
                                            value="{{ $car->owner->TenChuXe }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="CMT">Số căn cước chủ xe</label>
                                        <input type="text" class="form-control" disabled id="CMT"
                                            value="{{ $car->owner->CMT }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="SDT">Số điện thoại chủ xe</label>
                                        <input type="text" class="form-control" disabled id="SDT"
                                            value="{{ $car->owner->SDT }}">
                                    </div>
                                </div>
                                <div class="card-header">
                                    <h6 class="fw-500 h3">Thông tin giá thuê</h6>
                                </div>
                                <div class="add-product__body px-sm-40 px-20">
                                    <div class="form-group">
                                        <label for="thueNgay">Giá thuê theo ngày</label>
                                        <input type="text" disabled class="form-control" id="thueNgay"
                                            value="{{ $car->GiaThueNgay }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="thueThang">Giá thuê theo tháng</label>
                                        <input type="text" disabled class="form-control" id="thueThang"
                                            value="{{ $car->GiaThueThang }}">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body col-lg-6 p-0">
                                <div class="card-body">
                                    <div class="card-header">
                                        <h6 class="fw-500 h3">Ảnh bìa xe</h6>
                                    </div>
                                    <div class="add-product__body-img px-sm-20 px-10">
                                        <div
                                            class="upload-product-media d-flex justify-content-between align-items-center mt-25">
                                            <div class="upload-media-area d-flex">
                                                <img style="height: 400px; width:100%; object-fit:cover"
                                                    src="{{ url($car->HinhAnh) }}" alt="img">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body col-lg-6 p-0">
                                <div class="card-body">
                                    <div class="card-header">
                                        <h6 class="fw-500 h3">Ảnh mô tả xe</h6>
                                    </div>
                                    <div class="add-product__body-img px-sm-20 px-10">
                                        <div
                                            class="upload-product-media d-flex justify-content-between align-items-center mt-25">
                                            <div class="upload-media-area d-flex" style="flex-wrap: wrap; gap:8px">
                                                @foreach ($images as $item)
                                                    <img style="height: 200px; width:200px; object-fit:cover"
                                                        src="{{ url($item) }}" alt="img">
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

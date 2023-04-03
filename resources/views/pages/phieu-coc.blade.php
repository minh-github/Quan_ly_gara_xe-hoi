@extends('index')
@section('content')
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop-breadcrumb">
                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">Thông tin phiếu cọc</h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#"><i class="uil uil-estate"></i>Home</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Cho thuê xe</li>
                                        <li class="breadcrumb-item active" aria-current="page">Phiếu cọc</li>
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
                <form action="{{ url('/luu-phieu-coc') }}" method="POST" id="formPhieuCoc">
                    @csrf
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
                                            <label for="plate">Biển số</label>
                                            <input type="text" disabled class="form-control" id="plate"
                                                value="{{ $car->BienSo }}">
                                        </div>
                                        <div class="form-group">
                                            <div class="countryOption">
                                                <label for="status">Tình trạng xe</label>
                                                @if ($car->TinhTrang == 1)
                                                    <input type="text" disabled class="form-control" id="status"
                                                        value="Tốt">
                                                @endif
                                                @if ($car->TinhTrang == 2)
                                                    <input type="text" disabled class="form-control" id="status"
                                                        value="Trung bình">
                                                @endif
                                                @if ($car->TinhTrang == 3)
                                                    <input type="text" disabled class="form-control" id="status"
                                                        value="cần bảo trì">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="card-header">
                                            <h6 class="fw-500 h3">Thông tin giá thuê</h6>
                                        </div>
                                        <div class="add-product__body px-sm-40 px-20">
                                            <div class="form-group">
                                                <label for="thueNgay">Giá thuê theo ngày</label>
                                                <input type="text" disabled class="form-control" id="thueNgay"
                                                    data-value="{{ $car->GiaThueNgay }}"
                                                    value="{{ number_format($car->GiaThueNgay) }} VND">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card-header">
                                        <h6 class="fw-500 h3">Thông tin người thuê</h6>
                                    </div>
                                    <div class="add-product__body px-sm-40 px-20">
                                        <div class="form-group">
                                            <label for="tenNguoiThue">Tên người thuê</label>
                                            <input type="text" name="TenNguoiThue" placeholder="tên người thuê"
                                                class="form-control" id="tenNguoiThue">
                                        </div>
                                        <div class="form-group">
                                            <label for="sdtNguoiThue">Số điện thoại</label>
                                            <input type="text" name="SoDienThoai" placeholder="số điện thoại người thuê"
                                                class="form-control" id="sdtNguoiThue">
                                        </div>
                                        <div class="form-group">
                                            <label for="cmtNguoiThue">Số căn cước</label>
                                            <input type="text" name="cmtNguoiThue" placeholder="căn cước người thuê"
                                                class="form-control" id="cmtNguoiThue">
                                        </div>
                                    </div>
                                    <div class="card-header">
                                        <h6 class="fw-500 h3">Thông tin giao xe</h6>
                                    </div>
                                    <div class="add-product__body px-sm-40 px-20">
                                        <div class="form-group w-100 form-group-calender">
                                            <label>Ngày giao xe</label>
                                            <div class="position-relative">
                                                <input onclick="hienNgayTra()" type="text" name="ngayNhan"
                                                    id="ngayNhan" class="form-control"placeholder="dd/mm/yyyy">
                                                <a href="#">
                                                    <img class="svg" src="{{ url('img/svg/chevron-right.svg') }}"
                                                        alt="chevron-right.svg"></a>
                                            </div>
                                        </div>
                                        <div style="opacity: 0" class="form-group w-100 form-group-calender"
                                            id="formNgayTra">
                                            <label>Ngày trả xe</label>
                                            <div class="position-relative">
                                                <input onchange="hienXacNhan()" type="text" name="ngayTra"
                                                    id="ngayTra" class="form-control"placeholder="dd/mm/yyyy">
                                                <a href="#">
                                                    <img class="svg" src="{{ url('img/svg/chevron-right.svg') }}"
                                                        alt="chevron-right.svg"></a>
                                            </div>
                                        </div>
                                        <span onclick="tinhTien()" id="nutXacNhan" style="opacity: 0"
                                            class="btn btn-secondary btn-default btn-squared text-capitalize">xác nhận
                                        </span>
                                        <div class="dm-switch-wrap form-group">
                                            <label>Giao xe tận nơi</label>
                                            <div class="form-check form-switch form-switch-primary form-switch-sm">
                                                <input type="checkbox" class="form-check-input" id="switch-s1"
                                                    onchange="ableNote(event)" name="giaoTanNoi">
                                                <label class="form-check-label" for="switch-s1"></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Địa chỉ giao xe</label>
                                            <textarea class="form-control" id="noteGiaoXe" name="noteGiaoXe" rows="2" placeholder="Địa chỉ giao xe"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Ghi chú</label>
                                            <textarea class="form-control" name="note" rows="3" placeholder="Ghi chú"></textarea>
                                        </div>
                                    </div>
                                    <div class="card-header">
                                        <h6 class="fw-500 h3">Thanh toán</h6>
                                    </div>
                                    <div class="add-product__body px-sm-40 px-20">
                                        <div class="form-group" id="tienCoc">
                                            <label for="tienCoc">Tiền cọc</label>
                                            <input name="TamUng" type="text" disabled class="form-control">
                                        </div>
                                        <div class="form-group" id="thanhTien">
                                            <label for="thanhTien">Thành tiền</label>
                                            <input type="text" disabled class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body col-lg-12 p-0">
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
                        <input type="hidden" name="idXe" value="{{ $car->id }}">
                        <div
                            class="button-group add-product-btn d-flex justify-content-sm-end justify-content-center mt-40">
                            <button class="btn btn-light btn-default btn-squared fw-400 text-capitalize">Hủy
                            </button>
                            <button type="submit" class="btn btn-primary btn-default btn-squared text-capitalize">Lưu
                                phiếu cọc
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ url('/js/phieu-coc.js') }}"></script>
@endsection

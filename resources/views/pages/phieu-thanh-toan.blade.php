@extends('index')
@section('content')
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop-breadcrumb">
                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">Trả xe</h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#"><i class="uil uil-estate"></i>Home</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Cho thuê xe</li>
                                        <li class="breadcrumb-item active" aria-current="page">Trả xe</li>
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
                <form action="{{ url('/ket-thuc-hop-dong/' . $lease->id) }}" method="POST" id="formNhanXe">
                    @csrf
                    <div class="product-add global-shadow px-sm-30 py-sm-50 radius-xl w-100 mb-40 bg-white px-0 py-20">
                        <div class="row justify-content-center">
                            <div class="mb-30 row" id="ketQuaPhieu">
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
                                            <label for="thueNgay">Giá thuê / ngày</label>
                                            <input type="text" disabled class="form-control" id="thueNgay"
                                                value="{{ number_format($car->GiaThueNgay) }} VND">
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
                                            <input type="text" disabled class="form-control"
                                                value="{{ $lease->TenNguoiThue }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="sdtNguoiThue">Số điện thoại</label>
                                            <input type="text" disabled class="form-control"
                                                value="{{ $lease->SoDienThoai }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="cmtNguoiThue">Số căn cước</label>
                                            <input type="text" disabled class="form-control" value="{{ $lease->CMNDT }}">
                                        </div>
                                    </div>
                                    <div class="add-product__body px-sm-40 d-flex col-lg-12 gap-3 px-20">
                                        <div class="form-group form-group-calender col-lg-5">
                                            <label>Ngày thuê</label>
                                            <div class="position-relative">
                                                <input type="text" id="ngayNhan" class="form-control" disabled
                                                    value="{{ $lease->NgayThue }}">
                                            </div>
                                        </div>
                                        <div class="form-group form-group-calender col-lg-4" id="formNgayTra">
                                            <label>Ngày trả</label>
                                            <div class="position-relative">
                                                <input type="text" name="ngayTra" id="ngayTra" class="form-control"
                                                    disabled value="{{ $lease->NgayTra }}">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label for="sdtNguoiThue">Tổng</label>
                                            <input type="text" name="SoDienThoai" disabled class="form-control"
                                                id="sdtNguoiThue" value="{{ $lease->SoNgayThue }} Ngày">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="card-header">
                                        <h6 class="fw-500 h3">Đền bù & phụ thu</h6>
                                    </div>
                                    @foreach ($denBu as $item)
                                        <div class="add-product__body px-sm-40 d-flex gap-3 px-20">
                                            <div class="form-group col-lg-3" id="tienCoc">
                                                <label for="tienCoc">Tên bộ phận</label>
                                                <input name="TamUng" type="text" disabled class="form-control"
                                                    value="{{ $item->TenThietBi }}">
                                            </div>
                                            <div class="form-group col-lg-3" id="thanhTien">
                                                <label for="thanhTien">Tình trạng</label>
                                                @if ($item->TrangThai == 1)
                                                    <input type="text" disabled class="form-control" id="status"
                                                        value="Tốt">
                                                @endif
                                                @if ($item->TrangThai == 2)
                                                    <input type="text" disabled class="form-control" id="status"
                                                        value="Trung bình">
                                                @endif
                                                @if ($item->TrangThai == 3)
                                                    <input type="text" disabled class="form-control" id="status"
                                                        value="cần bảo trì">
                                                @endif
                                            </div>
                                            <div class="form-group col-lg-3" id="thanhTien">
                                                <label for="thanhTien">Xử lý</label>
                                                @if ($item->XuLy == 1)
                                                    <input type="text" disabled class="form-control" id="status"
                                                        value="Không">
                                                @endif
                                                @if ($item->XuLy == 2)
                                                    <input type="text" disabled class="form-control" id="status"
                                                        value="Sửa chữa ">
                                                @endif
                                                @if ($item->XuLy == 3)
                                                    <input type="text" disabled class="form-control" id="status"
                                                        value="Thay mới">
                                                @endif
                                            </div>
                                            <div class="form-group col-lg-3" id="thanhTien">
                                                <label for="thanhTien">Chi phí</label>
                                                <input type="text" disabled class="form-control"
                                                    value="{{ number_format($item->Gia) }} VND">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-lg-12">
                                    <div class="card-header">
                                        <h6 class="fw-500 h3">Thanh toán</h6>
                                    </div>
                                    <div class="add-product__body px-sm-40 px-20">
                                        <div class="form-group" id="tienCoc">
                                            <label>Tiền cọc : {{ number_format($lease->TamUng) }}
                                                VND</label>
                                        </div>
                                        <div class="form-group" id="tienCoc">
                                            <label>Đền bù : {{ number_format($lease->TienDenBu) }}
                                                VND</label>
                                        </div>
                                        <div class="form-group" id="tienCoc">
                                            <label>Phí giao xe : {{ number_format($lease->PhuThu) }}
                                                VND</label>
                                        </div>
                                        <div class="form-group" id="thanhTien">
                                            <label>Tiền thuê {{ $lease->SoNgayThue }} ngày :
                                                {{ number_format($lease->TienThue) }} VND</label>
                                        </div>
                                        <div class="form-group" id="thanhTien">
                                            <label class="text-danger" style="font-size: 25px">Thành tiền :
                                                {{ number_format($lease->ThanhTien) }}
                                                VND</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="button-group add-product-btn d-flex justify-content-sm-end justify-content-center mt-40">
                            <button type="submit" class="btn btn-primary btn-default btn-squared text-capitalize">Thanh
                                Toán
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection

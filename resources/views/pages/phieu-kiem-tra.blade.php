@extends('index')
@section('content')
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop-breadcrumb">
                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">Thông tin kiểm tra</h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#"><i class="uil uil-estate"></i>Home</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Kiểm tra xe</li>
                                        <li class="breadcrumb-item active" aria-current="page">Phiếu kiểm tra</li>
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
                <form action="{{ url('/luu-phieu-kiem-tra') }}" method="POST" id="formKiemTra">
                    @csrf
                    <div class="product-add global-shadow px-sm-30 py-sm-50 radius-xl w-100 mb-40 bg-white px-0 py-20">
                        <div class="row justify-content-center">
                            <div class="mb-30 row" id="danhSachPhuTung">
                                <div class="card-header">
                                    <h6 class="fw-500 h3">Danh sách kiểm tra</h6>
                                </div>
                                <div class="row" style="background: #f1f1f1">
                                    @if (count($check->detail) == 0)
                                        <div class="col-lg-5">
                                            <div class="add-product__body px-sm-40 px-20">
                                                <div class="form-group">
                                                    <label>Bộ phận cần kiểm tra</label>
                                                    <input type="text" class="form-control TenPhuTung"
                                                        name="tenPhuTung[]"placeholder="lốp xe,...">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="add-product__body px-sm-40 px-20">
                                                <div class="form-group">
                                                    <label>Tình trạng</label>
                                                    <select form="formKiemTra" name="tinhTrang[]"
                                                        class="js-example-basic-single js-states form-control TinhTrang"
                                                        id="type">
                                                        <option value="1">tốt</option>
                                                        <option value="2">trung bình</option>
                                                        <option value="3">kém</option>
                                                        <option value="4">nguy hiểm</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="add-product__body px-sm-40 px-20">
                                                <div class="form-group">
                                                    <label>xử lý</label>
                                                    <select form="formKiemTra" name="xuLy[]"
                                                        class="js-example-basic-single js-states form-control XuLy"
                                                        id="type">
                                                        <option value="1">không</option>
                                                        <option value="2">cần bảo trì</option>
                                                        <option value="3">cần thay thế</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="add-product__body px-sm-40 px-20">
                                                <div class="form-group">
                                                    <label>Giá khắc phục</label>
                                                    <input type="text" class="form-control giaKhacPhuc"
                                                        name="giaKhacPhuc[]" value="0">
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        @foreach ($check->detail as $item)
                                            <div class="col-lg-5">
                                                <div class="add-product__body px-sm-40 px-20">
                                                    <div class="form-group">
                                                        <label>Bộ phận cần kiểm tra</label>
                                                        <input type="text" class="form-control TenPhuTung"
                                                            name="tenPhuTung[]"placeholder="lốp xe,..."
                                                            value="{{ $item->TenThietBi }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="add-product__body px-sm-40 px-20">
                                                    <div class="form-group">
                                                        <label>Tình trạng</label>
                                                        <select form="formKiemTra" name="tinhTrang[]"
                                                            class="js-example-basic-single js-states form-control TinhTrang"
                                                            id="type">
                                                            @if ($item->TrangThai == 1)
                                                                <option selected value="1">tốt</option>
                                                                <option value="2">trung bình</option>
                                                                <option value="3">kém</option>
                                                                <option value="4">nguy hiểm</option>
                                                            @endif
                                                            @if ($item->TrangThai == 2)
                                                                <option value="1">tốt</option>
                                                                <option selected value="2">trung bình</option>
                                                                <option value="3">kém</option>
                                                                <option value="4">nguy hiểm</option>
                                                            @endif
                                                            @if ($item->TrangThai == 3)
                                                                <option value="1">tốt</option>
                                                                <option value="2">trung bình</option>
                                                                <option selected value="3">kém</option>
                                                                <option value="4">nguy hiểm</option>
                                                            @endif
                                                            @if ($item->TrangThai == 4)
                                                                <option value="1">tốt</option>
                                                                <option value="2">trung bình</option>
                                                                <option value="3">kém</option>
                                                                <option selected value="4">nguy hiểm</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="add-product__body px-sm-40 px-20">
                                                    <div class="form-group">
                                                        <label>xử lý</label>
                                                        <select form="formKiemTra" name="xuLy[]"
                                                            class="js-example-basic-single js-states form-control XuLy"
                                                            id="type">
                                                            @if ($item->XuLy == 1)
                                                                <option selected value="1">không</option>
                                                                <option value="2">cần bảo trì</option>
                                                                <option value="3">cần thay thế</option>
                                                            @endif
                                                            @if ($item->XuLy == 2)
                                                                <option value="1">không</option>
                                                                <option selected value="2">cần bảo trì</option>
                                                                <option value="3">cần thay thế</option>
                                                            @endif
                                                            @if ($item->XuLy == 3)
                                                                <option value="1">không</option>
                                                                <option value="2">cần bảo trì</option>
                                                                <option selected value="3">cần thay thế</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="add-product__body px-sm-40 px-20">
                                                    <div class="form-group">
                                                        <label>Giá khắc phục</label>
                                                        <input type="text" class="form-control giaKhacPhuc"
                                                            name="giaKhacPhuc[]" value="{{ $item->Gia }}">
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div
                                class="button-group add-product-btn d-flex justify-content-sm-end justify-content-center mt-40">
                                <span onclick="themPhuTung()"
                                    class="btn btn-primary btn-default btn-squared text-capitalize">Thêm
                                    bộ phận
                                </span>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="mb-30 row" id="danhGia">
                                <div class="col-lg-4">
                                    <div class="add-product__body px-sm-40 px-20">
                                        <div class="form-group">
                                            <label>Đánh giá tổng thể</label>
                                            <select form="formKiemTra" name="danhGia"
                                                class="js-example-basic-single js-states form-control" id="type">
                                                <option value="1">tốt</option>
                                                <option value="2">trung bình</option>
                                                <option value="3">kém</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="add-product__body px-sm-40 px-20">
                                        <div class="form-group">
                                            <label>Ghi chú</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" name="note" rows="3"
                                                placeholder="Ghi chú"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="idXe" name="idXe" value="{{ $car->id }}">
                    <input type="hidden" id="taoChiTietKiemTra" value="0">
                    <input type="hidden" id="idPhieuCheck" name="idPhieuCheck" value="{{ $car->idCheck }}">
                    <div class="button-group add-product-btn d-flex justify-content-sm-end justify-content-center mt-40">
                        <button class="btn btn-light btn-default btn-squared fw-400 text-capitalize">Hủy
                        </button>
                        <button type="submit" class="btn btn-primary btn-default btn-squared text-capitalize">Lưu phiếu
                            kiểm tra
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('js')
    <script src="{{ url('/js/them-phu-tung.js') }}"></script>
@endsection

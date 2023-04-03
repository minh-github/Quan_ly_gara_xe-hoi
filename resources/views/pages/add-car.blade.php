@extends('index')
@section('content')
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop-breadcrumb">
                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">Thêm xe mới</h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#"><i class="uil uil-estate"></i>Home</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Thêm xe mới</li>
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
                        <form action="{{ url('/them-xe') }}" method="POST" id="formThemXe" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-30 row">
                                <div class="col-lg-6">
                                    <div class="card-header">
                                        <h6 class="fw-500 h3">Thông tin xe</h6>
                                    </div>
                                    <div class="add-product__body px-sm-40 px-20">
                                        <div class="form-group">
                                            <label for="nameCar">Tên xe</label>
                                            <input type="text" class="form-control" name="nameCar" id="nameCar"
                                                placeholder="tên xe">
                                        </div>
                                        <div class="form-group">
                                            <div class="countryOption">
                                                <label for="type">
                                                    Loại xe
                                                </label>
                                                <select form="formThemXe" name="typeCar"
                                                    class="js-example-basic-single js-states form-control" id="type">
                                                    @foreach ($types as $type)
                                                        <option value="{{ $type->id }}">{{ $type->TenLoaiXe }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="date">Đời xe</label>
                                            <input type="text" class="form-control" name="date" id="date"
                                                placeholder="loai xe">
                                        </div>
                                        <div class="form-group">
                                            <label for="seats">Số ghế</label>
                                            <input type="text" class="form-control" name="seats" id="seats"
                                                placeholder="số ghế">
                                        </div>
                                        <div class="form-group">
                                            <div class="countryOption">
                                                <label for="brand">
                                                    Thương hiệu
                                                </label>
                                                <select form="formThemXe" name="brand"
                                                    class="js-example-basic-single js-states form-control" id="brand">
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->TenThuongHieu }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="dungTich">Dung tích xi lanh</label>
                                            <input type="text" class="form-control" name="capacity" id="dungTich"
                                                placeholder="dung tích xi lanh">
                                        </div>
                                        <div class="form-group">
                                            <label for="color">Màu sơn</label>
                                            <input type="text" class="form-control" id="color" name="color"
                                                placeholder="màu sơn">
                                        </div>
                                        <div class="form-group">
                                            <label for="plate">Biển số</label>
                                            <input type="text" class="form-control" name="plate" id="plate"
                                                placeholder="biển số">
                                        </div>
                                        <div class="form-group">
                                            <label for="soKhung">Số khung</label>
                                            <input type="text" class="form-control" name="soKhung" id="soKhung"
                                                placeholder="số khung">
                                        </div>
                                        <div class="form-group">
                                            <label for="soMay">Số máy</label>
                                            <input type="text" class="form-control" name="soMay" id="soMay"
                                                placeholder="số máy">
                                        </div>
                                        <div class="form-group w-100 me-sm-15 form-group-calender">
                                            <label for="datepicker">Đăng ký lần đầu</label>
                                            <div class="position-relative">
                                                <input type="text" name="dangKy" class="form-control"
                                                    id="datepicker" placeholder="mm/dd/yyyy">
                                                <a href="#">
                                                    <img class="svg" src="{{ url('img/svg/chevron-right.svg') }}"
                                                        alt="chevron-right.svg"></a>
                                            </div>
                                        </div>
                                        <div class="form-group w-100 form-group-calender">
                                            <label for="datepicker2">Hạn đăng kiểm</label>
                                            <div class="position-relative">
                                                <input type="text" name="hanDangKiem" class="form-control"
                                                    id="datepicker2" placeholder="mm/dd/yyyy">
                                                <a href="#">
                                                    <img class="svg" src="{{ url('img/svg/chevron-right.svg') }}"
                                                        alt="chevron-right.svg"></a>
                                            </div>
                                        </div>
                                        <div class="form-group w-100 form-group-calender">
                                            <label for="datepicker2">Hạn bảo hiểm</label>
                                            <div class="position-relative">
                                                <input type="text" name="baoHiem" class="form-control"
                                                    id="datepicker2" placeholder="mm/dd/yyyy">
                                                <a href="#">
                                                    <img class="svg" src="{{ url('img/svg/chevron-right.svg') }}"
                                                        alt="chevron-right.svg"></a>
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
                                            <input type="text" class="form-control" name="nameOwner" id="nameOwner"
                                                placeholder="tên chủ xe">
                                        </div>
                                        <div class="form-group">
                                            <label for="CMT">Số căn cước chủ xe</label>
                                            <input type="text" class="form-control" name="CMTOwner" id="CMT"
                                                placeholder="số căn cước chủ xe">
                                        </div>
                                        <div class="form-group">
                                            <label for="SDT">Số điện thoại chủ xe</label>
                                            <input type="text" class="form-control" name="SDTOwner" id="SDT"
                                                placeholder="số điện thoại chủ xe">
                                        </div>
                                    </div>
                                    <div class="card-header">
                                        <h6 class="fw-500 h3">Thông tin giá thuê</h6>
                                    </div>
                                    <div class="add-product__body px-sm-40 px-20">
                                        <div class="form-group">
                                            <label for="thueNgay">Giá thuê theo ngày</label>
                                            <input type="text" name="priceD" class="form-control" id="thueNgay"
                                                placeholder="giá thuê theo ngày">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body col-lg-6 p-0">
                                    <div class="card-body">
                                        <div class="card-header">
                                            <h6 class="fw-500 h3">Ảnh bìa xe</h6>
                                        </div>
                                        <div class="add-product__body-img px-sm-20 px-10">
                                            <label for="upload" class="file-upload__label">
                                                <span class="upload-product-img d-block">
                                                    <span class="file-upload">
                                                        <img class="svg" src="img/svg/upload.svg" alt="">
                                                        <input id="upload" class="file-upload__input" type="file"
                                                            name="thumbImg">
                                                    </span>
                                                    <span><a href="#" class="color-secondary">Browse</a> to
                                                        choose a
                                                        file</span>
                                                </span>
                                            </label>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-body col-lg-6 p-0">
                                    <div class="card-body">
                                        <div class="card-header">
                                            <h6 class="fw-500 h3">Ảnh mô tả xe</h6>
                                        </div>
                                        <div class="add-product__body-img px-sm-20 px-10">
                                            <label for="uploadDes" class="file-upload__label">
                                                <span class="upload-product-img d-block">
                                                    <span class="file-upload">
                                                        <img class="svg" src="img/svg/upload.svg" alt="">
                                                        <input id="uploadDes" class="file-upload__input" type="file"
                                                            name="desImgs[]" multiple>
                                                    </span>
                                                    <span><a href="#" class="color-secondary">Browse</a> to
                                                        choose a
                                                        file</span>
                                                </span>
                                            </label>
                                        </div>

                                    </div>
                                </div>
                                <div
                                    class="button-group add-product-btn d-flex justify-content-sm-end justify-content-center mt-40">
                                    <button class="btn btn-light btn-default btn-squared fw-400 text-capitalize">Hủy thêm
                                        xe
                                    </button>
                                    <button type="submit"
                                        class="btn btn-primary btn-default btn-squared text-capitalize">Lưu xe mới
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

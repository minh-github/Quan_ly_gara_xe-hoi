<div class="modal fade new-member" id="new-member" role="dialog" tabindex="-1" aria-labelledby="staticBackdropLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content radius-xl">
            <div class="modal-header">
                <h6 class="modal-title fw-500" id="staticBackdropLabel">Thêm xe mới</h6>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <img src="img/svg/x.svg" alt="x" class="svg">
                </button>
            </div>
            <div class="modal-body">
                <div class="new-member-modal">
                    <form method="POST" action="{{ url('/them-xe') }}" id="addCar" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex new-member-calendar">
                            <div class="form-group w-100 me-sm-15 form-group-calender">
                                <label for="nameCar">Tên xe</label>
                                <input type="text" class="form-control" name="nameCar" id="nameCar"
                                    placeholder="tên xe">
                            </div>
                            <div class="form-group w-100 me-sm-15">
                                <div class="countryOption">
                                    <label for="brand">
                                        Thương hiệu
                                    </label>
                                    <select form="addCar" name="brand"
                                        class="js-example-basic-single js-states form-control" id="brand">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->TenThuongHieu }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex new-member-calendar">
                            <div class="form-group w-100 me-sm-15 form-group-calender">
                                <label for="date">Năm sản xuất</label>
                                <input type="text" class="form-control" name="date" id="date"
                                    placeholder="năm sản xuất">
                            </div>
                            <div class="form-group w-100 me-sm-15">
                                <div class="countryOption">
                                    <label for="type">
                                        Loại xe
                                    </label>
                                    <select form="addCar" name="typeCar"
                                        class="js-example-basic-single js-states form-control" id="type">
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->TenLoaiXe }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex new-member-calendar">
                            <div class="form-group w-100 me-sm-15 form-group-calender">
                                <label for="nameOwner">Tên chủ xe</label>
                                <input type="text" class="form-control" name="nameOwner" id="nameOwner"
                                    placeholder="chủ xe">
                            </div>
                            <div class="form-group w-100 me-sm-15 form-group-calender">
                                <label for="CMT">Số căn cước</label>
                                <input type="text" class="form-control" name="CMTOwner" id="CMT"
                                    placeholder="số căn cước">
                            </div>
                        </div>
                        <div class="d-flex new-member-calendar">
                            <div class="form-group w-100 me-sm-15 form-group-calender">
                                <label for="SDTOwner">Số điện thoại chủ xe</label>
                                <input type="text" class="form-control" name="SDTOwner" id="SDTOwner"
                                    placeholder="SĐT chủ xe">
                            </div>
                            <div class="form-group w-100 me-sm-15 form-group-calender">
                                <label for="plate">Biển số</label>
                                <input type="text" class="form-control" name="plate" id="plate"
                                    placeholder="biển số">
                            </div>
                        </div>
                        <div class="d-flex new-member-calendar">
                            <div class="form-group w-100 me-sm-15 form-group-calender">
                                <label for="color">Màu xe</label>
                                <input type="text" class="form-control" name="color" id="color"
                                    placeholder="màu xe">
                            </div>
                            <div class="form-group w-100 me-sm-15 form-group-calender">
                                <label for="seats">Số ghế</label>
                                <input type="text" class="form-control" name="seats" id="seats"
                                    placeholder="số ghế">
                            </div>
                        </div>
                        <div class="d-flex new-member-calendar">
                            <div class="form-group w-100 me-sm-15">
                                <label>Tình trạng</label>
                                <select name="status" form="addCar"
                                    class="js-example-basic-single js-states form-control" id="category-member">
                                    <option value="1">Tốt</option>
                                    <option value="2">Trung bình</option>
                                    <option value="3">Cần bảo trì</option>
                                </select>
                            </div>
                            <div class="form-group w-100 me-sm-15 form-group-calender">
                                <label for="dungTich">Dung tích</label>
                                <input type="text" class="form-control" name="capacity" id="dungTich"
                                    placeholder="dung tích">
                            </div>
                        </div>
                        <div class="d-flex new-member-calendar">
                            <div class="form-group w-100 me-sm-15 form-group-calender">
                                <label for="priceH">Giá thuê ngày</label>
                                <input type="text" class="form-control" name="priceD" id="priceH"
                                    placeholder="100.000">
                            </div>
                            <div class="form-group w-100 me-sm-15 form-group-calender">
                                <label for="priceD">Giá thuê tháng</label>
                                <input type="text" class="form-control" name="priceM" id="priceD"
                                    placeholder="800.000">
                            </div>
                        </div>
                        <div class="d-flex new-member-calendar">
                            <div class="form-group w-100 me-sm-15 form-group-calender">
                                <label for="soKhung">Số khung</label>
                                <input type="text" class="form-control" name="soKhung" id="soKhung"
                                    placeholder="số khung">
                            </div>
                            <div class="form-group w-100 me-sm-15 form-group-calender">
                                <label for="soMay">Số máy</label>
                                <input type="text" class="form-control" name="soMay" id="soMay"
                                    placeholder="số máy">
                            </div>
                        </div>
                        <div class="d-flex new-member-calendar">
                            <div class="form-group w-100 me-sm-15 form-group-calender">
                                <label for="datepicker">Đăng ký lần đầu</label>
                                <div class="position-relative">
                                    <input type="text" name="dangKy" class="form-control" id="datepicker"
                                        placeholder="mm/dd/yyyy">
                                    <a href="#">
                                        <img class="svg" src="{{ url('img/svg/chevron-right.svg') }}"
                                            alt="chevron-right.svg"></a>
                                </div>
                            </div>
                            <div class="form-group w-100 form-group-calender">
                                <label for="datepicker2">Hạn bảo hiểm</label>
                                <div class="position-relative">
                                    <input type="text" name="baoHiem" class="form-control" id="datepicker2"
                                        placeholder="mm/dd/yyyy">
                                    <a href="#">
                                        <img class="svg" src="{{ url('img/svg/chevron-right.svg') }}"
                                            alt="chevron-right.svg"></a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex new-member-calendar">
                            <div class="form-group w-100 form-group-calender">
                                <label for="datepicker2">Hạn đăng kiểm</label>
                                <div class="position-relative">
                                    <input type="text" name="hanDangKiem" class="form-control" id="datepicker2"
                                        placeholder="mm/dd/yyyy">
                                    <a href="#">
                                        <img class="svg" src="{{ url('img/svg/chevron-right.svg') }}"
                                            alt="chevron-right.svg"></a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex new-member-calendar">
                            <div class="form-group w-100 me-sm-15 form-group-calender">
                                <label for="formFile" class="form-label">Ảnh xe</label>
                                <input class="form-control" name="thumbImg" type="file" id="formFile">
                            </div>
                            <div class="form-group w-100 me-sm-15 form-group-calender">
                                <label for="formFileMultiple" class="form-label">Ảnh mô tả</label>
                                <input class="form-control" name="desImgs[]" type="file" id="formFileMultiple"
                                    multiple>
                            </div>
                        </div>
                        <div class="form-group mb-20">
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="note" rows="3"
                                placeholder="Ghi chú"></textarea>
                        </div>
                        <div class="button-group d-flex pt-25">
                            <button class="btn btn-primary btn-default btn-squared text-capitalize">Thêm xe
                            </button>
                            <button type="button"
                                class="btn btn-light btn-default btn-squared fw-400 text-capitalize b-light color-light"
                                data-bs-dismiss="modal">Hủy</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

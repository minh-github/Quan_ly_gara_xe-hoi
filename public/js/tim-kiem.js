function timKiemTheoMaSoPhieu() {
    let value = document.getElementById('maSoPhieu').value
    let data = {
        idPhieu: value
    }
    var csrf = document.getElementsByName('_token')[0].defaultValue;
    fetch('/tim-kiem-phieu-thue', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrf,
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
        .then(function (response) {
            responseClone = response.clone(); // 2
            return response.json();
        })
        .then(function (data) {
            console.log(data);
            document.getElementById('formNhanXe').setAttribute('action', 'nhan-tra-xe/' + data.thongTinThue.id)
            document.getElementById('ketQuaPhieu').innerHTML =
                `
            <div class="col-lg-12">
            <div class="card-header">
                <h6 class="fw-500 h3">Tra cứu thông tin thuê</h6>
            </div>
            <div class="add-product__body px-sm-40 px-20">
                <div class="form-group">
                    <label for="nameCar">Mã phiếu thuê</label>
                    <div class="d-flex col-lg-6 formTimKiem gap-3">
                        <input type="text" class="form-control" id="maSoPhieu" value=""
                            placeholder="mã số phiếu">
                        <sapn onclick="timKiemTheoMaSoPhieu()"
                            class="btn btn-primary btn-default btn-squared text-capitalize col-lg-3">
                            tìm
                            kiếm</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card-header">
                <h6 class="fw-500 h3">Thông tin xe</h6>
            </div>
            <div class="add-product__body px-sm-40 px-20">
                <div class="form-group">
                    <label for="nameCar">Tên xe</label>
                    <input type="text" disabled class="form-control" id="nameCar"
                        value="${data.thongTinXe.TenXe}">
                </div>
                <div class="form-group">
                    <label for="typeCar">Loại xe</label>
                    <input type="text" disabled class="form-control" id="typeCar"
                        value="${data.typeCar}">
                </div>
                <div class="form-group">
                    <label for="seats">Số ghế</label>
                    <input type="text" disabled class="form-control" id="seats"
                        value="${data.thongTinXe.SoCho}">
                </div>
                <div class="form-group">
                    <label for="brandCar">Thương Hiệu</label>
                    <input type="text" disabled class="form-control" id="brandCar"
                        value="${data.thuongHieu}">
                </div>
                <div class="form-group">
                    <label for="plate">Biển số</label>
                    <input type="text" disabled class="form-control" id="plate"
                        value="${data.thongTinXe.BienSo}">
                </div>
                <div class="form-group">
                    <div class="countryOption">
                        <label for="status">Tình trạng xe</label>
                            <input type="text" disabled class="form-control" id="status"
                                value="${data.tinhTrangXe}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="thueNgay">Giá thuê / ngày</label>
                    <input type="text" disabled class="form-control" id="thueNgay"
                        value="${data.thongTinXe.GiaThueNgay} VND">
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
                        class="form-control" id="tenNguoiThue" value="${data.thongTinThue.TenNguoiThue}">
                </div>
                <div class="form-group">
                    <label for="sdtNguoiThue">Số điện thoại</label>
                    <input type="text" name="SoDienThoai"
                        placeholder="số điện thoại người thuê" class="form-control"
                        id="sdtNguoiThue" value="${data.thongTinThue.SoDienThoai}">
                </div>
                <div class="form-group">
                    <label for="sdtNguoiThue">Số căn cước công dân</label>
                    <input type="text" name="SoDienThoai"
                        placeholder="số điện thoại người thuê" class="form-control"
                        id="sdtNguoiThue" value="${data.thongTinThue.CMNDT}">
                </div>
            </div>
            <div class="card-header">
                <h6 class="fw-500 h3">Thuê từ ngày - đến ngày</h6>
            </div>
            <div class="add-product__body px-sm-40 px-20">
                <div class="form-group w-100 form-group-calender">
                    <label>Ngày thuê</label>
                    <div class="position-relative">
                        <input type="text"
                            id="ngayNhan" class="form-control" value="${data.thongTinThue.NgayThue}">
                    </div>
                </div>
                <div class="form-group w-100 form-group-calender"
                    id="formNgayTra">
                    <label>Ngày trả</label>
                    <div class="position-relative">
                        <input type="text" name="ngayTra"
                            id="ngayTra" class="form-control"placeholder="dd/mm/yyyy" value="${data.thongTinThue.NgayTra}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="sdtNguoiThue">Tổng số ngày thuê</label>
                    <input type="text" name="SoDienThoai"
                        placeholder="số điện thoại người thuê" class="form-control"
                        id="sdtNguoiThue" value="${data.thongTinThue.SoNgayThue} Ngày">
                </div>
            </div>
        </div>
            `
        }, function (rejectionReason) { // 3
            console.log('Error parsing JSON from response:', rejectionReason, responseClone); // 4
            responseClone.text() // 5
                .then(function (bodyText) {
                    console.log('Received the following instead of valid JSON:', bodyText); // 6
                });
        });
}
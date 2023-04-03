function themPhuTung() {
    let idXe = document.getElementById('idXe').value
    let itemNames = [], statuses = [], actions = [], prices = [];
    document.querySelectorAll('.TenPhuTung').forEach(item => {
        itemNames.push(item.value);
    });
    document.querySelectorAll('.TinhTrang').forEach(item => {
        statuses.push(item.value)
    });
    document.querySelectorAll('.XuLy').forEach(item => {
        actions.push(item.value)
    });
    document.querySelectorAll('.giaKhacPhuc').forEach(item => {
        prices.push(item.value)
    });
    let data =
    {
        itemNames: itemNames,
        statuses: statuses,
        actions: actions,
        prices: prices,
        idXe: idXe,
        taoPhieu: document.getElementById('taoChiTietKiemTra').value,
        idPhieuCheck: document.getElementById('idPhieuCheck').value
    }
    // storeData(data)
    var base = document.createElement('div');
    base.className = 'row'
    base.style.background = ' #f1f1f1'
    base.innerHTML =
        `
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
    `
    document.getElementById('danhSachPhuTung').appendChild(base)
}

// function storeData(data) {
//     console.log(data);
//     var csrf = document.getElementsByName('_token')[0].defaultValue;
//     fetch('/luu-phieu-kiem-tra', {
//         method: 'POST',
//         headers: {
//             'X-CSRF-TOKEN': csrf,
//             'Content-Type': 'application/json'
//         },
//         body: JSON.stringify(data)
//     })
//         .then(function (response) {
//             responseClone = response.clone(); // 2
//             return response.json();
//         })
//         .then(function (data) {
//             document.getElementById('taoChiTietKiemTra').value = data.status;
//         }, function (rejectionReason) { // 3
//             console.log('Error parsing JSON from response:', rejectionReason, responseClone); // 4
//             responseClone.text() // 5
//                 .then(function (bodyText) {
//                     console.log('Received the following instead of valid JSON:', bodyText); // 6
//                 });
//         });
// }
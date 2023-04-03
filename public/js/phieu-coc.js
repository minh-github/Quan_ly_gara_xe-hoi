function hienNgayTra() {
    document.getElementById('formNgayTra').style.opacity = 1;
}
function hienXacNhan() {
    document.getElementById('nutXacNhan').style.opacity = 1;
}
function tinhTien() {
    let daystart = document.getElementById('ngayNhan').value
    let dayend = document.getElementById('ngayTra').value
    var ddSplit1 = daystart.split("/")
    var ddSplit2 = dayend.split("/")

    let date_1 = new Date(ddSplit1[1] + '-' + ddSplit1[0] + '-' + ddSplit1[2]);
    let date_2 = new Date(ddSplit2[1] + '-' + ddSplit2[0] + '-' + ddSplit2[2]);

    const days = (date_2, date_1) => {
        let difference = date_2.getTime() - date_1.getTime();
        let TotalDays = Math.ceil(difference / (1000 * 3600 * 24));
        return TotalDays;
    }
    display(days(date_2, date_1), days(date_2, date_1) * document.getElementById('thueNgay').getAttribute('data-value'))
}

function display(soNgayThue, tienThue) {
    document.getElementById('tienCoc').innerHTML = `
    <label for="tamUng">Tiền cọc</label>
    <input type="hidden" name="soNgayThue" value="${soNgayThue}">
    <input name="TamUng" id="tamUng" type="text" class="form-control" value="${(tienThue * 25 / 100)}">`
    document.getElementById('thanhTien').innerHTML = `
    <label for="donGia">Thành tiền</label>
    <input name="thanhTien" id="donGia" type="text" class="form-control" value="${tienThue}">`
}
document.getElementById('noteGiaoXe').setAttribute('disabled', true);
function ableNote() {
    let ghichu = document.getElementById('noteGiaoXe');
    if (ghichu.getAttribute('disabled')) {
        ghichu.removeAttribute('disabled');
    }
    else {
        ghichu.setAttribute('disabled', true);
    }
}
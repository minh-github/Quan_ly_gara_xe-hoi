function editBrand(event, id) {
    fetch('/sua-thuong-hieu/' + id)
        .then((response) => response.json())
        .then((data) =>
            setData(data, id)
        )
        .catch(error => {
            console.log(error);
        });
}
function setData(data, id) {
    console.log(data);
    document.getElementById('brand').innerHTML = `
    <label for="nameBrand" id="nameBrand">Tên thương hiệu</label>
    <input type="text" class="form-control" name="nameBrand" id="nameBrand"
        placeholder="tên thương hiệu" value="${data.name}">
    `
    document.getElementById('note').innerHTML = data.note;
    document.getElementById('editBrand').setAttribute('action', "/sua-thuong-hieu/" + id);
    document.getElementById('modaledit').style.display = 'block'
    setNation(data.nation)
}

function setNation(mqg) {
    fetch(location.origin + '/js/data.json')
        .then((response) => response.json())
        .then((data) => {
            data.forEach(item => {
                if (item.code == mqg) {
                    document.getElementById('nation').innerHTML += `
                    <option selected="selected" value="${item.code}-${item.name}">${item.code} - ${item.name}</option>`
                } else {
                    document.getElementById('nation').innerHTML += `
                    <option value="${item.code}-${item.name}">${item.code} - ${item.name}</option>`
                }
            });
        });
}

function closeModal() {
    document.getElementById('modaledit').style.display = 'none'
}

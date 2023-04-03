function editTypeCar(event, id) {
    fetch('/sua-loai-xe/' + id)
        .then((response) => response.json())
        .then((data) =>
            setData(data, id)
        )
        .catch(error => {
            console.log(error);
        });
}
function setData(data, id) {
    document.getElementById('nameTypeInput').innerHTML = `
    <label for="nameType" id="nameType">Tên loại xe</label>
    <input type="text" class="form-control" name="nameType" id="nameType"
        placeholder="tên xe" value="${data.name}">
    `
    document.getElementById('note').innerHTML = data.note;
    document.getElementById('editTypecar').setAttribute('action', "/sua-loai-xe/" + id);
    document.getElementById('modaledit').style.display = 'block'
}

function closeModal() {
    document.getElementById('modaledit').style.display = 'none'
}
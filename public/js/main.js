function checkTest(event) {
    event.currentTarget.parentNode.innerHTML = '';
    let allPath = '';
    document.querySelectorAll('.imagesDes').forEach(item => {
        allPath += item.getAttribute('src').replace(location.origin + "/", "") + "|";
    });
    document.getElementById('oldPath').setAttribute('value', allPath)
}

function displayPreview(event) {
    let path = window.URL.createObjectURL(event.target.files[0])
    if (document.getElementById('thumb').innerHTML != '') {
        document.getElementById('anhBia').setAttribute('src', path)
    } else {
        document.getElementById('thumb').innerHTML = `
        <i class="uil uil-times-circle text-danger"
        style="position: absolute; right:0; font-size:30px; cursor: pointer"
        onclick="checkTest(event)"></i>
        <img id="anhBia"
        style="height: 400px; width:100%; object-fit:cover"
        src="${path}" alt="img">
        `
    }
}

function setOldPath() {
    let allPath = '';
    document.querySelectorAll('.imagesDes').forEach(item => {
        allPath += item.getAttribute('src').replace(location.origin + "/", "") + "|";
    });
    document.getElementById('oldPath').setAttribute('value', allPath)
}

function displayPreviewDes(event) {
    Array.from(event.target.files)
        .forEach(item => {
            let path = URL.createObjectURL(item)
            document.getElementById('desImgs').innerHTML += `
        <div style="position:relative; overflow:hidden;">
            <i class="uil uil-times-circle text-danger"
                style="position: absolute; right:0; font-size:30px; cursor: pointer"
                onclick="checkTest(event)"></i>
            <img class="imagesDes"
                style="height: 200px; width:200px; object-fit:cover; border-radius:8px"
                src="${path}" alt="img">
        </div>
        `
        });
}
window.onload = setOldPath

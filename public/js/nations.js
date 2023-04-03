function app() {
    fetch(location.origin + '/js/data.json')
        .then((response) => response.json())
        .then((data) => {
            data.forEach(item => {
                document.getElementById('nations').innerHTML += `
                <option value="${item.code}-${item.name}">${item.code} - ${item.name}</option>
                `
            });
        });
}
app()
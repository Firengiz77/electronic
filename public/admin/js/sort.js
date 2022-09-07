
function sort_by(url,key) {

    var artan = document.getElementById('artan').value;
    var azalan = document.getElementById('azalan').value;
    const formData = new FormData();
    formData.append('key', key);

    fetch(url, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'accept': 'application/json'
        },
        body: formData,
    })
        .then(response => response.text())
        .then(function (response) {


        });
}







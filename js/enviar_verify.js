var verify = document.getElementById('verify');
var mensajeCon = document.getElementById('mensaje');
const urlbase = "http://localhost/viauy/b.php?";
let url = urlbase + "c=Register&m=verificar";

verify.addEventListener('submit', function (e) {
    e.preventDefault();
    var cod = new FormData(verify);

    fetch(url, {
        method: 'POST',
        body: cod
    })
    .then(response => {
        if (response.ok) {
            return response.text();
        } else {
            throw new Error("Error en la solicitud: " + response.status);
        }
    })
    .then(data => {
        if (data === '"no"') {
            mensajeCon.textContent = "Código incorrecto";
        } else if (data === '"ver"') {
            window.location.href = "index.php";
        }

    })
    .catch(error => {
        console.error(error);
    });
});

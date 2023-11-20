var formulario = document.getElementById('Register');
var verify = document.getElementById('verify');
var messageUsu = document.getElementById("Gmail");
const urlbase = "http://localhost/viauy/b.php?";
let url = urlbase + "c=Register&m=ingresar";

formulario.addEventListener('submit', function (e) {
    e.preventDefault();
    var datos = new FormData(formulario);

    fetch(url, {
        method: 'POST',
        body: datos
    })
    .then(response => {
        if (response.ok) {
            return response.text();
        } else {
            throw new Error("Error en la solicitud: " + response.status);
        }
    })
    .then(data => {
        if (data === '"exist"') {
            messageUsu.textContent = "El email que ingresó ya existe";
        } else if (data === '"si"') {
            window.location.href = "verify.php";
        }
    })
    .catch(error => {
        console.error(error);
    });
});
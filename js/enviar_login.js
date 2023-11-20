var formulario = document.getElementById('Login');
var mensajeCon = document.getElementById('mensajeCon');
const urlbase = "http://localhost/viauy/b.php?";
let url = urlbase + "c=login&m=ingresar";

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
        if (data === '"use"') {
            mensajeCon.textContent = "El usuario no existe";
        } else if (data === '"con"') {
            mensajeCon.textContent = "Contraseña incorrecta";
        } else if (data === '"si"') {
            console.log(data);
            window.location.href = "index.php";
        } else {
            console.log(data);
            console.log("ERROR");
        }

    })
    .catch(error => {
        console.error(error);
    });
});

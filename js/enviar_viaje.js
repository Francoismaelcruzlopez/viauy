var formulario = document.getElementById('viaje');
var mensajeCon = document.getElementById('mensaje');
const urlbase = "http://localhost/viauy/b.php?";
let url = urlbase + "c=viaje&m=ingresar";

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
        console.log(data);
        if (data === '"si"') {
            mensajeCon.textContent = "el Viaje se agrego correctamente";
        }else {
            mensajeCon.textContent = "Hubo un error al agregar el viaje";
            console.log("ERROR");
        }

    })
    .catch(error => {
        console.error(error);
    });
});

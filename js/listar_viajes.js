var mensajeCon = document.getElementById('mensaje');
const urlbase = "http://localhost/viauy/b.php?";
let url = urlbase + "c=viaje&m=listar";

    fetch(url, {
        method: 'POST'
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
        /* mensajeCon.textContent = "<table><tr><td>id de viaje</td><td>lugar de salida</td><td>lugar de llegada</td><td>horario de salida</td><td>horario de llegada</td><table>";
        for(i=0; i<data.length;i++){
        mensajeCon.textContent = "<table><tr> <td>"+data[i] +"</td><td> </td><td> </td><td> </td><td> </td> </tr> <table>";
        } */
    })
    .catch(error => {
        console.error(error);
    });

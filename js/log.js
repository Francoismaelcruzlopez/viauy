var UserField = document.getElementById("usuario");
var PasswordField = document.getElementById("contrasena");
var messageUsu = document.getElementById("mensajeUsu");
var messageCon = document.getElementById("mensajeCon");

PasswordField.addEventListener("input", function() {
    messageCon.textContent = ""; // Borra el mensaje cuando el campo esté vacío
 
  }

  
);
UserField.addEventListener("input", function() {
  messageUsu.textContent = ""; // Borra el mensaje cuando el campo esté vacío

}


);

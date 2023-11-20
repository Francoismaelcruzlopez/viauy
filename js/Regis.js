document.addEventListener("DOMContentLoaded", function(){
  var UserField = document.getElementById("email");
  var messageUsu = document.getElementById("Gmail");
  var PasswordField = document.getElementById("contrasena");
  var messageCon = document.getElementById("cont");
  var ConfirmPasswordField = document.getElementById("contra_confir");

  
  ConfirmPasswordField.addEventListener("input", function() {
  
    if (ConfirmPasswordField.value === "") {
      messageCon.textContent = ""; // Borra el mensaje cuando el campo esté vacío
    }else {
        if(ConfirmPasswordField.value == PasswordField.value)  
        messageCon.textContent = "";
        else{
          if(ConfirmPasswordField.value !== PasswordField.value)  
        messageCon.textContent = "Las contraseñas no coinciden";
        }
      }});
   UserField.addEventListener("input", function(){  
      messageUsu.textContent = "";
  });
})



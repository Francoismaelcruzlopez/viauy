<?php

use Softwareflex\Viauy\modelo\Login;
use Softwareflex\Viauy\libs\Controlador;


class Login_Controller extends Controlador
{
  public function ingresar()
  {
    $res = new stdClass();
    $res->codigo = 200;
    $res->res = [
      

    ];
    try {
      $usuario = $_POST['usuario']; // Reemplaza 'usuario' con el nombre del campo en tu formulario
      $contrasena = $_POST['contrasena']; // Reemplaza 'contrasena' con el nombre del campo en tu formulario
      $resultado= Login::ingresar($usuario,$contrasena);
      $res->res= $resultado;
      //mover el archivo
     // echo "La imagen se ha subido exitosamente.";
        $this->cargarVista("api/index", $res);
      
    } catch (Throwable $th) {
      //throw $th;
      $res->codigo = 500;
      $this->cargarVista("api/index");
    }
  }
}

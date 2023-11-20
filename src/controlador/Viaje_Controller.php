<?php

use Softwareflex\Viauy\modelo\Viaje;
use Softwareflex\Viauy\libs\Controlador;


class Viaje_Controller extends Controlador
{
  
  public function listar()
  {
    $res = new stdClass();
    $res->codigo = 200;
    $res->res = [
      

    ];

    $resultado= Viaje::listar();
      $res->res= $resultado;
      //mover el archivo
     // echo "La imagen se ha subido exitosamente.";
        $this->cargarVista("api/index", $res);
  }

  public function ingresar()
  {
    $res = new stdClass();
    $res->codigo = 200;
    $res->res = [
      

    ];
    try {
      $idViaje= $_POST['idViaje']; 
      $iniViaje = $_POST['iniViaje']; 
      $finViaje = $_POST['finViaje']; 
      $horSal = $_POST['horSal']; 
      $horLleg = $_POST['horLleg']; 
      $resultado= Viaje::ingresar($idViaje, $iniViaje, $finViaje,$horLleg,$horSal);
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

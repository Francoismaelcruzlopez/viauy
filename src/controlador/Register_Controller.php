<?php


use Softwareflex\Viauy\modelo\Register;
use Softwareflex\Viauy\libs\Controlador;


class Register_Controller extends Controlador
{
  
  public function ingresar(){
      $res = new stdClass();
      $res->codigo = 200;
      $res->res = [
        

      ];
      try {
        session_start();
        if(empty($_SESSION['codigo'])){
        $_SESSION['nom_temp']= $_POST['nombre'];
        $_SESSION['usu_temp']= $_POST['email'];
        $_SESSION['pwd_temp']=$_POST['contrasena'];
        $_SESSION['type_temp']=$_POST['ty'];
        

      }else{
      $_SESSION['cod_temp']=$_POST['cod'];
      }
      /*$_SESSION['nom_temp'],$_SESSION['user_temp'],$_SESSION['pwd_temp']*/
      
      $resultado= Register::verificar($_SESSION['nom_temp'],$_SESSION['usu_temp'], $_SESSION['pwd_temp'], $_SESSION['type_temp']);
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
  public function verificar(){
    $res = new stdClass();
    $res->codigo = 200;
    $res->res = [
      

    ];
    try {
      session_start();
    $_SESSION['cod_temp']=$_POST['veri'];
    
    /*$_SESSION['nom_temp'],$_SESSION['user_temp'],$_SESSION['pwd_temp']*/
    
    $resultado= Register::Codigo($_SESSION['cod_temp']);
      $res->res= $resultado;
      //mover el archivo
    // echo "La imagen se ha subido exitosamente.";
        $this->cargarVista("api/index", $res);
      
    } catch (Throwable $th) {
      //throw $th;
      $res->codigo = 500;
      $this->cargarVista("api/index");
    }
}}

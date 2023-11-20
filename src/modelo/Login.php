<?php
namespace Softwareflex\Viauy\modelo;
use PDO;
use PDOException;
use Softwareflex\Viauy\Libs\Conexion;

class Login 
{
  public static function ingresar($user,$pwd){
    $pdo = null;
    $query = null;
    $items = [];

    $pdo = Conexion::getConexion()->getPdo();
    try {
      $sql="SELECT * FROM usuario WHERE gmail=:mail";
      $query      = $pdo->prepare($sql);
      $query->bindParam(':mail', $user);
      $query->execute();  
          while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          if($row)
            $items=  $row;
            else
            $items=false;
        //$item->url = isset($row['url']) ? $row['url'] : $urlDefecto;
      }
      if(!$items){
        return "use";
      } 
      if ($user == $items["gmail"] && $pwd == $items["password"]){
        session_start();
        $_SESSION["usuario"] = $user;
        $_SESSION["nombre"] =$items["nombre"];
        $_SESSION["tipo"] = $items["type"];
        return "si"; 
       }
       else
        if($user == $items["gmail"] &&  $pwd != $items["password"]){
          return "con";
        }
          
        
 
     
   }catch (PDOException $th) {
      //throw $th;
    } finally {
      $pdo = null;
    }
  }
}
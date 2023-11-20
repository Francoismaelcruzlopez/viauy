<?php
namespace Softwareflex\Viauy\modelo;
use PDO;
use PDOException;
use Softwareflex\Viauy\Libs\Conexion;

class Viaje 
{
  public static function ingresar($idViaje, $iniViaje, $finViaje,$horLleg,$horSal){
    $pdo = null;
    $query = null;

    $pdo = Conexion::getConexion()->getPdo();
    try {
        $query= $pdo->prepare(
            'INSERT INTO línea VALUES (:idViaje ,:iniViaje ,:finViaje ,:horLleg ,:horSal)'
        );
        $query->bindParam(':idViaje', $idViaje);
        $query->bindParam(':iniViaje', $iniViaje);
        $query->bindParam(':finViaje', $finViaje);
        $query->bindParam(':horLleg', $horLleg);
        $query->bindParam(':horSal', $horSal);
      $query->execute();  
      return "si";
   }catch (PDOException $th) {
      //throw $th;
    } finally {
      $pdo = null;
    }
  }
  public static function listar(){
    $pdo = null;
    $query = null;
    $items = [];
    $pdo = Conexion::getConexion()->getPdo();
    try {
      $query      = $pdo->query('SELECT * FROM línea');
      while ($row = $query->fetch()) {
        $item = $row;
        $items[] =   $item;
        //$item->url = isset($row['url']) ? $row['url'] : $urlDefecto;
      }
      return $items;
    } catch (PDOException $th) {
      //throw $th;
    } finally {
      $pdo = null;
    }
  }
}
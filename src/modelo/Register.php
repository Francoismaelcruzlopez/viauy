<?php

    namespace Softwareflex\Viauy\modelo;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PDO;
    use PDOException;
    use Softwareflex\Viauy\Libs\Conexion;
    class Register
{

    public static function verificar($nombre,$usuario,$contraseña, $type){ 
        if (empty($_SESSION['codigo'])){
            $pdo = null;
            $query = null;
            $items=[];
            $pdo = Conexion::getConexion()->getPdo();
            try {
                $sql="SELECT * FROM usuario WHERE gmail=:mail";
                $query      = $pdo->prepare($sql);
                $query->bindParam(':mail', $usuario);
                $query->execute();  
                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    if($row)
                      $items=  $row;
                      else
                      $items=false;
                }
                if($items){
                  return "exist";
                } else{
                    if($type == "usu"){
                        $caracteres_permitidos = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
                        $longitud_codigo = 6;
                    
                        $codigo_verificacion = '';
                        $longitud_caracteres = strlen($caracteres_permitidos);
                    
                    
                        for ($i = 0; $i < $longitud_codigo; $i++) {
                            $codigo_verificacion .= $caracteres_permitidos[rand(0, $longitud_caracteres - 1)];
                        }
                        $_SESSION['codigo']= $codigo_verificacion;
                        $mail = new PHPMailer(true);
                        $mail->isSMTP();  // Usa SMTP
                        $mail->Host = 'smtp.gmail.com'; // Servidor SMTP
                        $mail->Port = 587;   // Puerto SMTP
                        $mail->SMTPAuth = true;  // Autenticación SMTP
                        $mail->Username = 'viauy2023@gmail.com';  // Tu dirección de correo
                        $mail->Password = constant('PWD');  // Tu contraseña
                        $mail->SMTPSecure ='tls';  // Opciones: NONE, SSL, TLS
                        $mail->CharSet = "UTF-8";
                        $mail->setFrom('viauy2023@gmail.com', 'ViaUY');
                        $mail->addAddress($usuario, $nombre);
                        $mail->Subject = 'Verificación de cuenta para registrarse';
                        $mail->Body = $_SESSION['nom_temp'].'
                         Su codigo de verificación es:'.$_SESSION['codigo'];
                        try {
                                if($mail->send())
                                return 'si';
                            } catch (Exception $e) {
                                echo 'Hubo un error al enviar el correo: ' . $mail->ErrorInfo;
                            }
                    }if($type == "admin"){
                            $caracteres_permitidos = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
                            $longitud_codigo = 6;
                        
                            $codigo_verificacion = '';
                            $longitud_caracteres = strlen($caracteres_permitidos);
                        
                        
                            for ($i = 0; $i < $longitud_codigo; $i++) {
                                $codigo_verificacion .= $caracteres_permitidos[rand(0, $longitud_caracteres - 1)];
                            }
                            $_SESSION['codigo']= $codigo_verificacion;
                            $mail = new PHPMailer(true);
                            $mail->isSMTP();  // Usa SMTP
                            $mail->Host = 'smtp.gmail.com'; // Servidor SMTP
                            $mail->Port = 587;   // Puerto SMTP
                            $mail->SMTPAuth = true;  // Autenticación SMTP
                            $mail->Username = 'viauy2023@gmail.com';  // Tu dirección de correo
                            $mail->Password = constant('PWD');  // Tu contraseña
                            $mail->SMTPSecure ='tls';  // Opciones: NONE, SSL, TLS
                            $mail->CharSet = "UTF-8";
                            $mail->setFrom('viauy2023@gmail.com', 'ViaUY');
                            $mail->addAddress($usuario, $nombre);
                            $mail->Subject = 'Verificación de cuenta para registrarse';
                            $mail->Body = $_SESSION['nom_temp'].'
                             Su codigo de verificación es:'.$_SESSION['codigo'];
                            try {
                                    if($mail->send())
                                    return 'si';
                                } catch (Exception $e) {
                                    echo 'Hubo un error al enviar el correo: ' . $mail->ErrorInfo;
                                }
                    }elseif($type == "emp"){
                                $caracteres_permitidos = '01234567890123456789012345678901234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
                                $longitud_codigo = 6;
                            
                                $codigo_verificacion = '';
                                $longitud_caracteres = strlen($caracteres_permitidos);
                            
                            
                                for ($i = 0; $i < $longitud_codigo; $i++) {
                                    $codigo_verificacion .= $caracteres_permitidos[rand(0, $longitud_caracteres - 1)];
                                }
                                $_SESSION['codigo']= $codigo_verificacion;
                                $mail = new PHPMailer(true);
                                $mail->isSMTP();  // Usa SMTP
                                $mail->Host = 'smtp.gmail.com'; // Servidor SMTP
                                $mail->Port = 587;   // Puerto SMTP
                                $mail->SMTPAuth = true;  // Autenticación SMTP
                                $mail->Username = 'viauy2023@gmail.com';  // Tu dirección de correo
                                $mail->Password = constant('PWD');  // Tu contraseña
                                $mail->SMTPSecure ='tls';  // Opciones: NONE, SSL, TLS
                                $mail->CharSet = "UTF-8";
                                $mail->setFrom('viauy2023@gmail.com', 'ViaUY');
                                $mail->addAddress($usuario, $nombre);
                                $mail->Subject = 'Verificación de cuenta para registrarse';
                                $mail->Body = $_SESSION['nom_temp'].'
                                 Su codigo de verificación es:'.$_SESSION['codigo'];
                                try {
                                        if($mail->send())
                                        return 'si';
                                    } catch (Exception $e) {
                                        echo 'Hubo un error al enviar el correo: ' . $mail->ErrorInfo;
                                    }
                                }
                                }

                                }catch (PDOException $th) {
                                    throw $th;
                                    } finally {
                                    $pdo = null;
                                    }

                        
                        }
    }
    public static function Codigo($cod){
        if($_SESSION['codigo'] == $cod){
            Register::agregar($_SESSION['nom_temp'], $_SESSION['usu_temp'],$_SESSION['pwd_temp'], $_SESSION['type_temp']);
            return 'ver';
        }else
        return 'no';

    }
        public static function agregar($nombre, $email, $pwd,$tipo )
    {
        try{
        $pdo = null;
        $query = null;
        $pdo = Conexion::getConexion()->getPdo();
        $query= $pdo->prepare(
            'INSERT INTO usuario VALUES (:gmail,:nombre,:con,:ty)'
        );
        $query->bindParam(':gmail', $email);
        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':con', $pwd);
        $query->bindParam(':ty', $tipo);
        if ($query->execute()) {
            
            $_SESSION['nombre']=$nombre;
            $_SESSION['usuario']=$email;
            $_SESSION['tipo']=$tipo;
            unset($_SESSION['nom_temp']);
            unset($_SESSION['usu_temp']);
            unset($_SESSION['pwd_temp']);
            unset($_SESSION['cod_temp']);
            unset($_SESSION['type_temp']);
            unset($_SESSION['codigo']);
        }
        } catch (PDOException $th) {
        throw $th;
        } finally {
        $pdo = null;
        }
    }
}
 ;?>
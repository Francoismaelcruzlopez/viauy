<?php
    session_start();

 ;?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../imagen/LOGO_DEFINITIVO_NO_SE_CAMBIA_Y_SI_SE_CAMBIA_SON_TODOS_GAYS.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/4a96c5a388.js" crossorigin="anonymous"></script>
    <script src="../js/menu.js"></script>
    <title>Inicio</title>
</head>
<body class="bodyindex">
    <header>        
            <div class="list__item">
                    <a href="index.php" height="60" ><img src="../imagen/logo sin fondo.png" height="60" class="list_img"></a>
            </div>
            <nav class="nav">
                
                <ul class="list">
                    <?php
                    if(empty($_SESSION['tipo'])){
                        echo "
                            <li class='menu'>         
                                <strong><a href='horarios.php'>
                                    Horarios
                                        </a></strong>
                            </li> 
                            <li class='menu'>        
                                <strong><a href=''>
                                    Rutas
                                </a></strong>
                            </li>
                            <li class='menu'>        
                                <strong><a href='reservar.php'>
                                    Reservar
                                </a></strong>
                            </li>
                        ";
                    }
                    elseif($_SESSION['tipo']=="usu"){
                        echo "
                        <li class='menu'>         
                        <strong><a href='horarios.php'>
                            Horarios
                                </a></strong>
                    </li> 
                    <li class='menu'>        
                        <strong><a href=''>
                            Rutas
                        </a></strong>
                    </li>
                    <li class='menu'>        
                        <strong><a href='reservar.php'>
                            Reservar
                        </a></strong>
                    </li>
                        ";
                    }
                    elseif($_SESSION['tipo']=="emp"){
                        echo "
                        <li class='menu'>         
                        <strong><a href='horarios.php'>
                            Horarios
                                </a></strong>
                    </li> 
                    <li class='menu'>        
                        <strong><a href='admin/rutas.php'>
                            Rutas
                        </a></strong>
                    </li>

                        ";
                    }
                

                    ;?>       
                    </ul> 
                    <?php
                        if (empty($_SESSION["usuario"])) {
                            echo "<ul class='list__login'>
                                <section class='login'>    
                                    <strong>
                                        <a href='Login.php' class='login__item'>
                                            Ingresar
                                        </a>
                                    </strong>
                                </section> 
                            </ul>";
                            }
                            else{
                                
                        echo "<strong>
                                        <section class='login'>    
                                            <ul class='menu__links'>
                                                <li class='menu__item menu__item--show'>
                                                    <a class='menu__link'>".$_SESSION["nombre"]."</a>
                                                ";
                                                if($_SESSION['tipo']=="usu"){
                                                    echo "
                                                        <ul class='menu__nesting'>
                                                            <li class='menu__inside'>
                                                                <a href='#' class='menu__link menu__link--inside'>About 1</a>
                                                            </li>
                                                            <li class='menu__inside'>
                                                                <a href='#' class='menu__link menu__link--inside'>Preferencias</a>
                                                            </li>
                                                            <li class='menu__inside'>
                                                                <a href='../src/libs/logout.php' class='menu__link menu__link--inside'>Cerrar Sesión</a>
                                                            </li>
                                                        </ul>    
                                                    
                                                    ";
                                                }elseif($_SESSION['tipo']=="emp"){
                                                    echo "
                                                        <ul class='menu__nesting'>
                                                            <li class='menu__inside'>
                                                                <a href='#' class='menu__link menu__link--inside'>About 1</a>
                                                            </li>
                                                            <li class='menu__inside'>
                                                                <a href='#' class='menu__link menu__link--inside'>Preferencias</a>
                                                            </li>
                                                            <li class='menu__inside'>
                                                                <a href='../src/libs/logout.php' class='menu__link menu__link--inside'>Cerrar Sesión</a>
                                                            </li>
                                                        </ul>    
                                                    
                                                    ";
                                                }elseif($_SESSION['tipo']=="admin"){
                                                    echo "
                                                        <ul class='menu__nesting'>
                                                            <li class='menu__inside'>
                                                                <a href='#' class='menu__link menu__link--inside'>About 1</a>
                                                            </li>
                                                            <li class='menu__inside'>
                                                                <a href='#' class='menu__link menu__link--inside'>Preferencias</a>
                                                            </li>
                                                            <li class='menu__inside'>
                                                                <a href='../src/libs/logout.php' class='menu__link menu__link--inside'>Cerrar Sesión</a>
                                                            </li>
                                                        </ul>    
                                                    
                                                    ";
                                                }
                                                
                                                echo"</li> 
                                            </ul>
                                    </section>
                                </strong>";
                        };
                        
                    ?>
                </nav>
                <?php
                    echo "
                    <nav class='nav menu__cel'>
                    <strong>    
                            <ul class='menu__links'>
                                <li class='menu__item menu__item--show'>
                                    <a class='menu__link'><img src='../imagen/menu.png' height='60'></a>
                                        <ul class='menu__nesting'>
                                            <li class='menu__inside'>
                                                <a href='#' class='menu__link menu__link--inside'>About 1</a>
                                            </li>
                                            <li class='menu__inside'>
                                                <a href='#' class='menu__link menu__link--inside'>Preferencias</a>
                                            </li>
                                            <li class='menu__inside'>
                                                <a href='../src/libs/logout.php' class='menu__link menu__link--inside'>Cerrar Sesión</a>
                                            </li>
                                        </ul>    
                                </li> 
                            </ul>
                            </strong>
                        </nav>
    
                    ";                
                 ;?>



    </header>
        <section class="horarios">      
        <h1 class="prod">Horarios</h1>
            <object data="../imagen/Horarios - Hoja 1.pdf" type="application/pdf" width="100%" height="700">
                <iframe src="../imagen/Horarios - Hoja 1.pdf" width="100%" height="500">
                    <p>Su navegador no soporta PDF</p>
                </iframe>
            </object>
    </section> 

    <section class="ContactoIndex">
            <div class="footer">
            
                <div class="ContenidoContacto">
            
                    
            
                      <div class="izquierda">
                            <h1>Contacto</h1>
                          <h4>VIAUY</h4>
                          <h4> <i class="fas fa-map-marker-alt" aria-hidden="true"></i><strong> Calle Falsa 123</strong></h4>
                          <h4> <i class="fas fa-mobile-alt" aria-hidden="true"></i> 2364 1234</h4>
                          <h4> <i class="fas fa-envelope" aria-hidden="true"></i> sofflex@gmail.com</h4><br>
                      </div>
                          
                      <div class="izquierda">
                        <div class="newsletter">
                        </div>
            
                      </div>
                          
                      <div class="izquierda"> 
                          <h4 class="enc">Encontranos en:</h4>
                          <div class="social">
                                <a target="_blank" href="https://www.facebook.com"><img src="../imagen/Facebook_f_logo_(2019).svg.png" width="50" height="50"></a>
                                <a target="_blank" href="https://www.instagram.com/softwareflex2023/"><img src="../imagen/1658587303instagram-png.png" width="50" height="50"></a>
                          </div>
                      </div>
                </div>
                </div>
              </section>
<script src="../js/menu.js"></script>
</body>
</html>
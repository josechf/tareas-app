<?php

//sesion----------------------------------------------------------------
ifsesion();
function ifsesion()
{
    if (isset($_POST['iniciar'])) {
        require_once('vista/creasesion_vista.php');
    }else{
        if (isset($_POST['boton_inicia'])) {
            require_once('modelo/sesion/save_sesion.php');
            $nombre = $_POST['name'];
            $password = $_POST['password'];
            $pass_cifrado = password_hash($password, PASSWORD_DEFAULT);
            $gmail = $_POST['gmail'];
            $variable = new nuevasesion();
            $variable->get_accion($nombre, $password, $pass_cifrado, $gmail);
            //require_once('vista/registrar_vista.php');
        }
    }

    if (!isset($_POST['boton'])&&!isset($_POST['iniciar'])) {
        require_once('vista/registrar_vista.php');
    } else {
        if (isset($_POST['boton']) && !isset($_SESSION['nombre'])) {
            require_once('modelo/sesion/registrar.php');
        }
        require_once('vista/sesion_vista.php');
        if (isset($_POST['cerrar'])) {
            session_destroy();
        }
    }
}
//fin sesion-------------------------------------------------------------------

require_once('modelo/imprime.php');
require_once('vista/crood_vista.php');

function primera()
{
    $i = 1;
    $va = new Imprime();
    $v = $va->imprimidor($i);
    ciclo($i, $v);
}
function limite()
{
    $v = new LIMIT();
    $ve = $v->limitador();
    $final = 2;
    $total = ceil($ve / $final); ?>
    <div class="alert alert-warning alert-dismissible fade show">
        <p>total de paginas <?php echo $total ?> resultado buscqueda <?php echo $ve ?></p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
<?php return $total;
}
function segunda()
{
    $va = new Imprime();
    $i = $_GET['carga'];
    $v = $va->imprimidor($i);
    ciclo($i, $v);
}

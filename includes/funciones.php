<?php


define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');


function isAuth()
{
    session_start();
    if (!$_SESSION['login']) {
        header('Location: /');
    }
}


function  debuguear($variable)
{
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    exit;
}

function sz($html): string
{
    $sz = htmlspecialchars($html ?? '');
    return $sz;
}

//Validar tipo de contenido
function validarContenido($tipo)
{
    $tipos = ['vendedor', 'propiedad', 'blog'];

    return in_array($tipo, $tipos);
}

//Muestra los mensajes de alerta
function notificacion($codigo)
{
    $mensaje = '';
    switch ($codigo) {
        case 1:
            $mensaje = 'Creado Correctamente';
            break;
        case 2:
            $mensaje = 'Actualizado Correctamente';
            break;
        case 3:
            $mensaje = 'Borrado Correctamente';
            break;
        default:
            $mensaje = false;
            break;
    }

    return $mensaje;
}

function valRed(string $url)
{
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header("Location: $(url)");
    }
    return $id;
}

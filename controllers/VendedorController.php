<?php
namespace Controllers;
use MVC\Router;
use Model\Vendedor;

class VendedorController {
    public static function crear(Router $router) {

        $errores = Vendedor::getErrors();
        $vendedor = new Vendedor;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Crear una nueva instancia
            $vendedor = new Vendedor($_POST['vendedor']);
        
            //Validar que no haya campos vacios
            $errores = $vendedor->validate();
        
            //Si no hay errores, creamos el registro
            if(empty($errores)) {
                $vendedor->guardar();
            }
        }

        $router->render('vendedores/crear', [
            'errores'=>$errores,
            'vendedor'=>$vendedor
        ]);
    }

    public static function actualizar(Router $router) {
        $id = valRed('/admin');
        $vendedor = Vendedor::find($id);
        $errores = Vendedor::getErrors();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Asignar los valores
            $args = $_POST['vendedor'];
        
            //Sincronizar objeto en memoria con lo que el usuario escribio
            $vendedor->sincronizar($args);
        
            //Validacion
            $errores = $vendedor->validate();
        
            if (empty($errores)) {
                $vendedor->guardar();
            }
        }

        $router->render('vendedores/actualizar', [
            'errores'=>$errores,
            'vendedor'=>$vendedor
        ]);
    }

    public static function eliminar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id) {
                $tipo = $_POST['tipo'];
                if(validarContenido($tipo)) {
                    $vendedor = Vendedor::find($id);
                    $vendedor->delete();
                }
            }
        }
    }
}
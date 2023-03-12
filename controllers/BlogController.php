<?php
namespace Controllers;

use Model\Blog;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class BlogController {
    public static function index(Router $router){
        $blogs = Blog::all();
        
        $router->render('blogs/index', [
            'blogs' => $blogs
        ]);
    }

    public static function crear(Router $router){
        $errores = Blog::getErrors();
        $blog = new Blog();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Crear instancia
            $blog = new Blog($_POST['blog']);

            /* SUBIDA DE ARCHIVOS */
            //Generar un nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
            // Realiza un resize a la imagen con Intervention
            if ($_FILES['blog']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['blog']['tmp_name']['imagen'])->fit(800, 600);
                $blog->setImagen($nombreImagen);
            }

            // Validar
            $errores = $blog->validate();

            //Revisar que el arreglo de errores este vacio
            if (empty($errores)) {

                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                //Guarda la imagen
                $image->save(CARPETA_IMAGENES . $nombreImagen);
                $blog->guardar();
            }
        }


        $router->render('blogs/crear', [
            'errores' => $errores,
            'blog' => $blog
        ]);
    }

    public static function actualizar(Router $router){
        $id = valRed('/admin');
        $blog = Blog::find($id);
        $errores = Blog::getErrors();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Asignar los atributos
            $args = $_POST['blog'];
            $blog->sincronizar($args);
            $errores = $blog->validate();
        
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
        
            if ($_FILES['blog']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['blog']['tmp_name']['imagen'])->fit(800, 600);
                $blog->setImagen($nombreImagen);
            }
        
        
            if (empty($errores)) {
                // Almacenar la imagen
                if ($_FILES['blog']['tmp_name']['imagen']) {
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
                $blog->guardar();
            }
        }

        $router->render('blogs/actualizar', [
            'blog' => $blog,
            'errores' => $errores
        ]);
    }

    public static function eliminar(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
        
            if ($id) {
                $tipo = $_POST['tipo'];
                if (validarContenido($tipo)) {
                    $blog = Blog::find($id);
                    $blog->delete();
                }
            }
        }
    }
}
<?php
namespace Model;

class Blog extends ActiveRecord {
    protected static $tabla = 'blogs';
    protected static $columnasDB = ['id', 'titulo', 'fecha', 'autor', 'detalles', 'imagen'];

    public $id;
    public $titulo;
    public $fecha;
    public $autor;
    public $detalles;
    public $imagen;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->fecha = date('d-m-Y');
        $this->autor = $args['autor'] ?? '';
        $this->detalles = $args['detalles'] ?? '';
        $this->imagen =  $args['imagen'] ?? '';
    }

    public function validate() {
        if(!$this->titulo) {
            self::$errores[] = "El título no puede estar vacío";
        }

        if(!$this->autor) {
            self::$errores[] = "La entrada debe tener un autor";
        }

        if(strlen($this->detalles) < 50) {
            self::$errores[] = "La entrada debe tener una descripción";
        }

        if(!$this->imagen) {
            self::$errores[] = "La entrada debe tener una imagen";
        }

        return self::$errores;
    }
}
<?php

namespace Model;



class Vendedor extends ActiveRecord {
    
    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono', 'email'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    public $email;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->email = $args['email'] ?? '';
    }

    public function validate()
    {

        if (!$this->nombre) {
            self::$errores[] = "El Nombre no puede estar vacío";
        }

        if (!$this->apellido) {
            self::$errores[] = "El Apellido no puede estar vacío";
        }

        if (!$this->telefono) {
            self::$errores[] = "El Telefono no puede estar vacío";
        }

        if (!$this->email) {
            self::$errores[] = "El Correo no puede estar vacío";
        }

        if(!preg_match('/[0-9]{10}/', $this->telefono)) {
            self::$errores[] = "El formato de teléfono no es válido";
        }

        if (filter_var($this->email, FILTER_VALIDATE_EMAIL) === FALSE) {
            self::$errores[] = "El formato de email no es válido";
        }

        return self::$errores;
    }
}
<?php 
namespace Model;

class ActiveRecord {
    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = '';
    protected static $errores = [];

    // Definir la conexion a la base d edatos
    public static function setDB($database) {
        self::$db = $database;
    }

    public function guardar() {

        if (!is_null($this->id)) {
            $this->actualizar();
        } else {
            $this->crear();
        }
    }

    public function crear() {

        //Sanitizar datos
        $atributos = $this->sanitizeData();

        $query = "INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        $result = self::$db->query($query);
        if ($result) {
            //Redireccionar al usuario
            header('Location: /admin?result=1');
        }
    }

    public function actualizar()
    {
        $atributos = $this->sanitizeData();

        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $query = "UPDATE " . static::$tabla . " SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1";
        
        $result = self::$db->query($query);
        if ($result) {
            //Redireccionar al usuario
            header('Location: /admin?result=2');
        }
    }

    //Identificar y unir los atributos de la base de datos
    public function atributos()
    {
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizeData()
    {
        $atributos = $this->atributos();
        $sanitized = [];
        foreach ($atributos as $key => $value) {
            $sanitized[$key] = self::$db->escape_string($value);
        }
        return $sanitized;
    }

    //Subida de archivos
    public function setImagen($imagen)
    {
        if (!is_null($this->id)) {
            $this->deleteImage();
        }


        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    //Elimina el archivo 
    public function deleteImage()
    {
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
        if ($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }

    public static function getErrors() {
        return static::$errores;
    }

    public function validate()  {
        static::$errores = [];
        return static::$errores;
    }

    //Eliminar un registro
    public function delete()
    {
        //Eliminar la propiedad
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $result = self::$db->query($query);
        if ($result) {
            $this->deleteImage();
            header('location: /admin?result=3');
        }
    }

    // Lista todas las propiedades
    public static function all()
    {
        $query = "SELECT * FROM " . static::$tabla;
        $result = self::consultSQL($query);
        return $result;
    }

    //Obtiene determinando numero de registros
    public static function get($cantidad) {
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;
        $result = self::consultSQL($query);
        return $result;
    }

    // Busca un registro por su ID
    public static function find($id)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE id = {$id}";
        $result = self::consultSQL($query);
        return array_shift($result);
    }

    public static function consultSQL($query) {
        // consultar la base de datos
        $result = self::$db->query($query);
        // iterar los resultados
        $array = [];
        while ($registro = $result->fetch_assoc()) {
            $array[] = static::createObject($registro);
        }
        // liberar la memoria
        $result->free();
        // retornar los resultados
        return $array;
    }

    protected static function createObject($registro)
    {
        $objeto = new static;
        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    //Sincroniza el objeto en memoria con los cambios realizados por el usuario
    public function sincronizar($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}
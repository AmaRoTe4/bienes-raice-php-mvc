<?php

namespace Model;

use FFI\Exception;

class Principal
{

    protected static $db;
    protected static $columnasDB = [];
    protected static $table = "";

    public static function setDB($database)
    {
        self::$db = $database;
    }

    public function __construct($data = [])
    {
        self::$columnasDB = $data;
    }

    public static function get($id)
    {
        try {
            $query = "SELECT * FROM " . static::$table . " WHERE id = " . $id;
            $resultado = self::$db->query($query);
            $retorno = new static($resultado->fetch_assoc());

            return $retorno;
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public static function getAll(): array
    {
        $query = "SELECT * FROM " . static::$table;

        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    function create(): bool
    {
        try {
            $atributos = $this->sanitizarAtributos();

            if (self::$db === null) return false;

            $query = "INSERT INTO " . static::$table . " ( ";
            $query .= join(', ', array_keys($atributos));
            $query .= " ) VALUES (' ";
            $query .= join("', '", array_values($atributos));
            $query .= " ') ";

            return self::$db->query($query);
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function update(): bool
    {
        try {
            $atributos = $this->sanitizarAtributos();

            $valores = [];
            foreach ($atributos as $key => $value) {
                $valores[] = "{$key}='{$value}'";
            }

            $query = "UPDATE " . static::$table . " SET ";
            $query .=  join(', ', $valores);
            $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
            $query .= " LIMIT 1 ";

            return self::$db->query($query);
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function delete(): bool
    {
        try {
            $query = "DELETE FROM " . static::$table . " WHERE id=" .  self::$db->escape_string($this->id) . " LIMIT 1;";
            return self::$db->query($query);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    //ver estas dos
    public static function consultarSQL($query)
    {
        // Consultar la base de datos
        $resultado = self::$db->query($query);

        // Iterar los resultados
        $array = [];
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }

        // liberar la memoria
        $resultado->free();

        // retornar los resultados
        return $array;
    }

    protected static function crearObjeto($registro)
    {
        $objeto = new static;

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }

    public function atributos()
    {
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos()
    {
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }
}

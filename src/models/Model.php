<?php

abstract class Model {
    protected static $tableName;
    protected static $columns = [];
    protected $values = [];

    function __construct($array) {
        $this-> loadFromArray($array);
    }

    public function loadFromArray($array) {
        if ($array) {
            foreach ($array as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    public function __get($key) {
        return $this->values[$key];
    }

    public function __set($key, $value) {
        $this->values[$key] = $value;
    }

    public static function getObjects($filters = [], $columns = "*") {
        $objects = [];
        $result = static::getResultFromSelect($filters, $columns);

        if($result) {
            $class = get_called_class();
            foreach ($result as $arr) {
                $objects[] = new $class($arr);
            }
        }

        return $objects;
    }

    public static function getOneObject($filters = [], $columns = "*") {
        $class = get_called_class();
        $result = static::getResultFromSelect($filters, $columns);

        return $result ? new $class($result[0]) : null;
    }

    public static function getResultFromSelect($filters = [], $columns = "*") {
        $sql = "SELECT {$columns} FROM "
            . static::$tableName
            . static::makeWhere($filters);

        $result = Database::getResultFromQuery($sql);

    if (count($result) > 0) {
        return $result;
    } else {
        return null;
    }

    }

    public function save() {
        $tableName = static::$tableName;

        $columns = array_filter(static::$columns, function($col) {
            return $col !== 'id';
        });

        $sql = "INSERT INTO {$tableName} (" . implode(", ", $columns) . ") VALUES (";
        foreach ($columns as $column) {
            $sql .= static::getFormatedValue($this->$column) . ",";
        }
        $sql[strlen($sql) - 1] = ')';
        $id = Database::executeNonQuery($sql);
        $this->id = $id;
    }


    private static function makeWhere($filters) {
        $sql = "";
        if(count($filters) > 0) {
            $sql .= " WHERE 1 = 1";
            foreach ($filters as $key => $value) {
                $sql .= " AND {$key} = " .
                static::getFormatedValue($value);
            }
        }

        return $sql;
    }

    private static function getFormatedValue($value) {
        if (is_null($value)) {
            return 'null';
        } elseif (is_numeric($value)) {
            return $value;
        } else {
            return "'{$value}'";
        }
    }
}

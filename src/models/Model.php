<?php

class Model {
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

    public static function getSelect($filters = [], $columns = "*") {
        return "SELECT {$columns} FROM "
            . static::$tableName
            . static::makeWhere($filters);
    }

    private static function makeWhere($filters) {
        $sql = "";
        if(count($filters) > 0) {
            $sql .= " WHERE 1 = 1";
            foreach ($filters as $key => $value) {
                $sql .= " AND {$key} = '{$value}'";
            }
        }

        return $sql;
    }
}

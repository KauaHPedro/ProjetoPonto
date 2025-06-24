<?php

class Database {
    public static function getConnection() {
        $envPath = realpath(dirname(__FILE__) . '/../env.ini');
        $env = parse_ini_file($envPath);

        $host =  $env['host'];
        $port =  $env['port'];
        $username =  $env['username'];
        $password =  $env['password'];
        $database =  $env['database'];

        try {
            $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$database", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro: " . $e->getMessage());
        }

        return $pdo;

    }

    public static function getResultFromQuery($query, $params = []) {
        $pdo = self::getConnection();
        $stmt = $pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public static function executeNonQuery($query, $params = []) {
        $pdo = self::getConnection();
        $stmt = $pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->rowCount();
    }
}

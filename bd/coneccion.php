<?php
// coneccion.php

// Abstract Factory
interface DBFactory {
    public function createConnection();
}

// Abstract Product
interface DBConnection {
    public function connect();
}

// MySQL Factory
class MySQLFactory implements DBFactory {
    public function createConnection() {
        return new MySQLConnection();
    }
}

// MySQL Connection Product
class MySQLConnection implements DBConnection {
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database = 'bd_inventario';
    private $connection;

    public function connect() {
        $this->connection = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $this->connection;
    }
}

// Creación de la conexión utilizando el patrón Abstract Factory
$factory = new MySQLFactory();
$con = $factory->createConnection()->connect();
?>

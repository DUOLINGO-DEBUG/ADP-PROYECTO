<?php
Class Conexion{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "bdd_zacamil";

    public function connect() {
        try {
            $pdo = new PDO("mysql:host=$this->host; dbname=$this->db;charset=utf8mb4", $this->user, $this->pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }finally{
            $pdo = null; // Cierra la conexión en cualquier caso
        }
    }
}

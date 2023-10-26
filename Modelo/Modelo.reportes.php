<?php
require_once("Modelo.Sql.Conector.php");
class Reporte
{
    private $id_reporte;
    private $usuario_usuario;
    private $nombreEquipo_reporte;
    private $marca_reporte;
    private $modelo_reporte;
    private $area_reporte;
    private $serial_reporte;
    private $descripcionIncidente_reporte;
    private $descripcionError_reporte;
    private $anexo_reporte;
    private $estado_reporte;

    // Getters
    public function getId_reporte() {
        return $this->id_reporte;
    }

    public function getUsuario_usuario() {
        return $this->usuario_usuario;
    }

    public function getNombreEquipo_reporte() {
        return $this->nombreEquipo_reporte;
    }

    public function getMarca_reporte() {
        return $this->marca_reporte;
    }

    public function getModelo_reporte() {
        return $this->modelo_reporte;
    }

    public function getArea_reporte() {
        return $this->area_reporte;
    }

    public function getSerial_reporte() {
        return $this->serial_reporte;
    }

    public function getDescripcionIncidente_reporte() {
        return $this->descripcionIncidente_reporte;
    }

    public function getDescripcionError_reporte() {
        return $this->descripcionError_reporte;
    }

    public function getAnexo_reporte() {
        return $this->anexo_reporte;
    }

    public function getEstado_reporte() {
        return $this->estado_reporte;
    }

    // Setters
    public function setId_reporte($id_reporte) {
        $this->id_reporte = $id_reporte;
    }

    public function setUsuario_usuario($usuario_usuario) {
        $this->usuario_usuario = $usuario_usuario;
    }

    public function setNombreEquipo_reporte($nombreEquipo_reporte) {
        $this->nombreEquipo_reporte = $nombreEquipo_reporte;
    }

    public function setMarca_reporte($marca_reporte) {
        $this->marca_reporte = $marca_reporte;
    }

    public function setModelo_reporte($modelo_reporte) {
        $this->modelo_reporte = $modelo_reporte;
    }

    public function setArea_reporte($area_reporte) {
        $this->area_reporte = $area_reporte;
    }

    public function setSerial_reporte($serial_reporte) {
        $this->serial_reporte = $serial_reporte;
    }

    public function setDescripcionIncidente_reporte($descripcionIncidente_reporte) {
        $this->descripcionIncidente_reporte = $descripcionIncidente_reporte;
    }

    public function setDescripcionError_reporte($descripcionError_reporte) {
        $this->descripcionError_reporte = $descripcionError_reporte;
    }

    public function setAnexo_reporte($anexo_reporte) {
        $this->anexo_reporte = $anexo_reporte;
    }

    public function setEstado_reporte($estado_reporte) {
        $this->estado_reporte = $estado_reporte;
    }


    public function Listar_Reportes(){
        //require("conexion.class.php");
        $conn = new Conexion;
        $pdo = $conn->connect();
        try {
            $stmt = $pdo->prepare("SELECT * FROM reportes INNER JOIN usuarios ON reportes.Usuario_Usuarios = usuarios.Id_Usuario ORDER BY reportes.Id_Reporte DESC;");
            $stmt->execute();
            $reportes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $reportes;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        } finally {
            $pdo = null; // Cierra la conexión en cualquier caso
        }
    }
}
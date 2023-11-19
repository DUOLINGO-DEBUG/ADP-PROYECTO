<?php
require_once("Modelo.Sql.Conector.php");
class Progreso{
    private $Id_Progreso;
    private $Reporte_Reportes;
    private $Titulo_Progreso;
    private $Descripcion_Progreso;
    private $Porcentaje_Progreso;
    private $Fecha_Progreso;


     // Getter para Id_Progreso
     public function getIdProgreso() {
        return $this->Id_Progreso;
    }

    // Setter para Id_Progreso
    public function setIdProgreso($idProgreso) {
        $this->Id_Progreso = $idProgreso;
    }

    // Getter para Reporte_Reportes
    public function getReporteReportes() {
        return $this->Reporte_Reportes;
    }

    // Setter para Reporte_Reportes
    public function setReporteReportes($reporteReportes) {
        $this->Reporte_Reportes = $reporteReportes;
    }

    // Getter para Titulo_Progreso
    public function getTituloProgreso() {
        return $this->Titulo_Progreso;
    }

    // Setter para Titulo_Progreso
    public function setTituloProgreso($tituloProgreso) {
        $this->Titulo_Progreso = $tituloProgreso;
    }

    // Getter para Descripcion_Progreso
    public function getDescripcionProgreso() {
        return $this->Descripcion_Progreso;
    }

    // Setter para Descripcion_Progreso
    public function setDescripcionProgreso($descripcionProgreso) {
        $this->Descripcion_Progreso = $descripcionProgreso;
    }

    // Getter para Porcentaje_Progreso
    public function getPorcentajeProgreso() {
        return $this->Porcentaje_Progreso;
    }

    // Setter para Porcentaje_Progreso
    public function setPorcentajeProgreso($porcentajeProgreso) {
        $this->Porcentaje_Progreso = $porcentajeProgreso;
    }

    // Getter para Fecha_Progreso
    public function getFechaProgreso() {
        return $this->Fecha_Progreso;
    }

    // Setter para Fecha_Progreso
    public function setFechaProgreso($fechaProgreso) {
        $this->Fecha_Progreso = $fechaProgreso;
    }

    public function Registrar_progreso()
    {
        $conn = new Conexion;
        $pdo = $conn->connect();

        try {
            $stmt = $pdo->prepare("INSERT INTO `progreso` (`Id_Progreso`, `Reporte_Reportes`, `Titulo_Progreso`, `Descripcion_Progreso`, `Porcentaje_Progreso`, `Fecha_Progreso`) VALUES (NULL, ?, ?, ?, ?, ?);");
            $stmt->bindParam(1, $this->Reporte_Reportes);
            $stmt->bindParam(2, $this->Titulo_Progreso);
            $stmt->bindParam(3, $this->Descripcion_Progreso);
            $stmt->bindParam(4, $this->Porcentaje_Progreso);
            $stmt->bindParam(5, $this->Fecha_Progreso);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        } finally {
            $pdo = null; // Cierra la conexión en cualquier caso
        }
    }

    public function Listar_Progresos_IdReporte($id_reporte)
    {
        //require("conexion.class.php");
        $conn = new Conexion;
        $pdo = $conn->connect();
        try {
            $stmt = $pdo->prepare("SELECT * FROM progreso WHERE progreso.Reporte_Reportes = 3 ORDER BY progreso.Porcentaje_Progreso DESC;");
            $stmt->execute();
            $progresos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $progresos;

        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        } finally {
            $pdo = null; 
        }
    }
}
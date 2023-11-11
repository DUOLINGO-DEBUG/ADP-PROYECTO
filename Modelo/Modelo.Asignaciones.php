<?php
require_once("Modelo.Sql.Conector.php");
class Asignaciones{
    private $idAsignacion;
    private $reportesReportes;
    private $adminUsuario;
    private $tecnicoUsuario;
    private $fechaAsignacion;
    private $estadoAsignacion;

    public function getIdAsignacion() {
        return $this->idAsignacion;
    }

    // Setter para idAsignacion
    public function setIdAsignacion($idAsignacion) {
        $this->idAsignacion = $idAsignacion;
    }

    // Getter para reportesReportes
    public function getReportesReportes() {
        return $this->reportesReportes;
    }

    // Setter para reportesReportes
    public function setReportesReportes($reportesReportes) {
        $this->reportesReportes = $reportesReportes;
    }

    // Getter para adminUsuario
    public function getAdminUsuario() {
        return $this->adminUsuario;
    }

    // Setter para adminUsuario
    public function setAdminUsuario($adminUsuario) {
        $this->adminUsuario = $adminUsuario;
    }

    // Getter para tecnicoUsuario
    public function getTecnicoUsuario() {
        return $this->tecnicoUsuario;
    }

    // Setter para tecnicoUsuario
    public function setTecnicoUsuario($tecnicoUsuario) {
        $this->tecnicoUsuario = $tecnicoUsuario;
    }

    // Getter para fechaAsignacion
    public function getFechaAsignacion() {
        return $this->fechaAsignacion;
    }

    // Setter para fechaAsignacion
    public function setFechaAsignacion($fechaAsignacion) {
        $this->fechaAsignacion = $fechaAsignacion;
    }

    // Getter para estadoAsignacion
    public function getEstadoAsignacion() {
        return $this->estadoAsignacion;
    }

    // Setter para estadoAsignacion
    public function setEstadoAsignacion($estadoAsignacion) {
        $this->estadoAsignacion = $estadoAsignacion;
    }


    public function Registrar_Reportes()
    {
        $conn = new Conexion;
        $pdo = $conn->connect();

        try {
            $stmt = $pdo->prepare("INSERT INTO `reportes` (`Id_Reporte`, `Usuario_Usuarios`, `Nombre_Equipo_Reporte`, `Marca_Reporte`, `Modelo_Reporte`, `Area_Reporte`, `Serial_Reporte`, `Descripcion_Incidente_Reporte`, `Descripcion_Error_Reporte`, `Anexo_Reporte`, `Estado_Reporte`, `Fecha_Creacion_Reporte`, `Fecha_Finalizacion_Reporte`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, NULL, ?, ?, NULL);");
            // $stmt->bindParam(1, null, PDO::PARAM_NULL);
            // $stmt->bindParam(1, $this->usuario_usuario);
            // $stmt->bindParam(2, $this->nombreEquipo_reporte);
            // $stmt->bindParam(3, $this->marca_reporte);
            // $stmt->bindParam(4, $this->modelo_reporte);
            // $stmt->bindParam(5, $this->area_reporte);
            // $stmt->bindParam(6, $this->serial_reporte);
            // $stmt->bindParam(7, $this->descripcionIncidente_reporte);
            // $stmt->bindParam(8, $this->descripcionError_reporte);
            // // $stmt->bindParam(10, null, PDO::PARAM_NULL);
            // $stmt->bindParam(9, $this->estado_reporte);
            // $stmt->bindParam(10, $this->fecha_creacion);
            // $stmt->bindParam(13, null, PDO::PARAM_NULL);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        } finally {
            $pdo = null; // Cierra la conexión en cualquier caso
        }
    }

    public function Listar_Asignaciones()
    {
        //require("conexion.class.php");
        $conn = new Conexion;
        $pdo = $conn->connect();
        try {
            $stmt = $pdo->prepare("SELECT * FROM `asignaciones` WHERE 1");
            $stmt->execute();
            $reportes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $reportes;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        } finally {
            $pdo = null; 
        }
    }
}
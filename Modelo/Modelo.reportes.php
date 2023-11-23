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
    private $fecha_creacion;
    private $fecha_finalizacion;

    // Getters
    public function getId_reporte()
    {
        return $this->id_reporte;
    }

    public function getUsuario_usuario()
    {
        return $this->usuario_usuario;
    }

    public function getNombreEquipo_reporte()
    {
        return $this->nombreEquipo_reporte;
    }

    public function getMarca_reporte()
    {
        return $this->marca_reporte;
    }

    public function getModelo_reporte()
    {
        return $this->modelo_reporte;
    }

    public function getArea_reporte()
    {
        return $this->area_reporte;
    }

    public function getSerial_reporte()
    {
        return $this->serial_reporte;
    }

    public function getDescripcionIncidente_reporte()
    {
        return $this->descripcionIncidente_reporte;
    }

    public function getDescripcionError_reporte()
    {
        return $this->descripcionError_reporte;
    }

    public function getAnexo_reporte()
    {
        return $this->anexo_reporte;
    }

    public function getEstado_reporte()
    {
        return $this->estado_reporte;
    }

    // Setters
    public function setId_reporte($id_reporte)
    {
        $this->id_reporte = $id_reporte;
    }

    public function setUsuario_usuario($usuario_usuario)
    {
        $this->usuario_usuario = $usuario_usuario;
    }

    public function setNombreEquipo_reporte($nombreEquipo_reporte)
    {
        $this->nombreEquipo_reporte = $nombreEquipo_reporte;
    }

    public function setMarca_reporte($marca_reporte)
    {
        $this->marca_reporte = $marca_reporte;
    }

    public function setModelo_reporte($modelo_reporte)
    {
        $this->modelo_reporte = $modelo_reporte;
    }

    public function setArea_reporte($area_reporte)
    {
        $this->area_reporte = $area_reporte;
    }

    public function setSerial_reporte($serial_reporte)
    {
        $this->serial_reporte = $serial_reporte;
    }

    public function setDescripcionIncidente_reporte($descripcionIncidente_reporte)
    {
        $this->descripcionIncidente_reporte = $descripcionIncidente_reporte;
    }

    public function setDescripcionError_reporte($descripcionError_reporte)
    {
        $this->descripcionError_reporte = $descripcionError_reporte;
    }

    public function setAnexo_reporte($anexo_reporte)
    {
        $this->anexo_reporte = $anexo_reporte;
    }

    public function setEstado_reporte($estado_reporte)
    {
        $this->estado_reporte = $estado_reporte;
    }

    public function getFechaCreacion()
    {
        return $this->fecha_creacion;
    }

    public function setFechaCreacion($fecha_creacion)
    {
        $this->fecha_creacion = $fecha_creacion;
    }

    public function getFechaFinalizacion()
    {
        return $this->fecha_finalizacion;
    }

    public function setFechaFinalizacion($fecha_finalizacion)
    {
        $this->fecha_finalizacion = $fecha_finalizacion;
    }

    public function Registrar_Reportes()
    {
        $conn = new Conexion;
        $pdo = $conn->connect();

        try {
            $stmt = $pdo->prepare("INSERT INTO `reportes` (`Id_Reporte`, `Usuario_Usuarios`, `Nombre_Equipo_Reporte`, `Marca_Reporte`, `Modelo_Reporte`, `Area_Reporte`, `Serial_Reporte`, `Descripcion_Incidente_Reporte`, `Descripcion_Error_Reporte`, `Anexo_Reporte`, `Estado_Reporte`, `Fecha_Creacion_Reporte`, `Fecha_Finalizacion_Reporte`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, NULL, ?, ?, NULL);");
            // $stmt->bindParam(1, null, PDO::PARAM_NULL);
            $stmt->bindParam(1, $this->usuario_usuario);
            $stmt->bindParam(2, $this->nombreEquipo_reporte);
            $stmt->bindParam(3, $this->marca_reporte);
            $stmt->bindParam(4, $this->modelo_reporte);
            $stmt->bindParam(5, $this->area_reporte);
            $stmt->bindParam(6, $this->serial_reporte);
            $stmt->bindParam(7, $this->descripcionIncidente_reporte);
            $stmt->bindParam(8, $this->descripcionError_reporte);
            // $stmt->bindParam(10, null, PDO::PARAM_NULL);
            $stmt->bindParam(9, $this->estado_reporte);
            $stmt->bindParam(10, $this->fecha_creacion);
            // $stmt->bindParam(13, null, PDO::PARAM_NULL);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        } finally {
            $pdo = null; // Cierra la conexión en cualquier caso
        }
    }

    public function Asignar_reporte($id_usuario_reporte, $id_usuario_Admin, $tecnico_reporte, $tiempo_reporte_c, $estado)
    {
        //require("conexion.class.php");
        $conn = new Conexion;
        $pdo = $conn->connect();

        try {
            $stmt = $pdo->prepare("INSERT INTO `asignaciones`(`Reporte_Reportes`, `Admin_Usuarios`, `Tecnico_Usuarios`, `Fecha_Asignacion`, `Estado_Asignacion`) VALUES (?,?,?,?,?)");
            $stmt->bindParam(1, $id_usuario_reporte);
            $stmt->bindParam(2, $id_usuario_Admin);
            $stmt->bindParam(3, $tecnico_reporte);
            $stmt->bindParam(4, $tiempo_reporte_c);
            $stmt->bindParam(5, $estado);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        } finally {
            $pdo = null; // Cierra la conexión en cualquier caso
        }
    }

    public function editar_oferta($id_usuario_reporte, $anexo, $estado)
    {
        //require("conexion.class.php");
        $conn = new Conexion;
        $pdo = $conn->connect();

        try {
            $stmt = $pdo->prepare("UPDATE `reportes` SET `Anexo_Reporte` = ?, `Estado_Reporte` = ? WHERE `reportes`.`Id_Reporte` = ?;");
            $stmt->bindParam(1, $anexo);
            $stmt->bindParam(2, $estado);
            $stmt->bindParam(3, $id_usuario_reporte);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        } finally {
            $pdo = null; // Cierra la conexión en cualquier caso
        }
    }

    public function editar_oferta_denegar($id_usuario_reporte, $estado)
    {
        //require("conexion.class.php");
        $conn = new Conexion;
        $pdo = $conn->connect();

        try {

            $stmt = $pdo->prepare("UPDATE reportes SET `Estado_Reporte` = ? WHERE `reportes`.`Id_Reporte` = ?;");
            $stmt->bindParam(1, $estado);
            $stmt->bindParam(2, $id_usuario_reporte);
            $stmt->execute();

            // return $xd;
            return true;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        } finally {
            $pdo = null;
        }
    }

    public function editar_oferta_finalizar($id_usuario_reporte, $fecha, $estado)
    {
        //require("conexion.class.php");
        $conn = new Conexion;
        $pdo = $conn->connect();

        try {

            $stmt = $pdo->prepare("UPDATE `reportes`  SET `Estado_Reporte` = ?, `Fecha_Finalizacion_Reporte` = ? WHERE `reportes`.`Id_Reporte` = ?;");
            $stmt->bindParam(1, $estado);
            $stmt->bindParam(2, $fecha);
            $stmt->bindParam(3, $id_usuario_reporte);
            $stmt->execute();

            // return $xd;
            return true;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        } finally {
            $pdo = null;
        }
    }

    // 

    public function Listar_Reportes()
    {
        //require("conexion.class.php");
        $conn = new Conexion;
        $pdo = $conn->connect();
        try {
            $stmt = $pdo->prepare("SELECT * FROM reportes INNER JOIN usuarios ON reportes.Usuario_Usuarios = usuarios.Id_Usuario ORDER BY reportes.Id_Reporte DESC");
            $stmt->execute();
            $reportes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $reportes;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        } finally {
            $pdo = null; // Cierra la conexión en cualquier caso
        }
    }

    public function Listar_Reportes_id($id_user)
    {
        //require("conexion.class.php");
        $conn = new Conexion;
        $pdo = $conn->connect();
        try {
            $stmt = $pdo->prepare("SELECT * FROM reportes INNER JOIN usuarios ON reportes.Usuario_Usuarios = usuarios.Id_Usuario WHERE reportes.Usuario_Usuarios = ? ORDER BY reportes.Id_Reporte DESC;");
            $stmt->bindParam(1, $id_user);
            $stmt->execute();
            $reportes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $reportes;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        } finally {
            $pdo = null; // Cierra la conexión en cualquier caso
        }
    }

    public function Listar_Reportes_dia($mes)
    {
        //require("conexion.class.php");
        $conn = new Conexion;
        $pdo = $conn->connect();
        try {
            $stmt = $pdo->prepare("SELECT DATE(Fecha_Finalizacion_Reporte) AS dia, COUNT(*) AS cantidad_de_reportes FROM reportes WHERE MONTH(Fecha_Finalizacion_Reporte) = ? AND YEAR(Fecha_Finalizacion_Reporte) = YEAR(CURRENT_DATE()) GROUP BY dia ORDER BY dia;");
            $stmt->bindParam(1, $mes);
            $stmt->execute();
            $reportes_finalizados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $reportes_finalizados;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        } finally {
            $pdo = null; // Cierra la conexión en cualquier caso
        }
    }

    public function Listar_Reportes_dia_activos($mes)
    {
        //require("conexion.class.php");
        $conn = new Conexion;
        $pdo = $conn->connect();
        try {
            $stmt = $pdo->prepare("SELECT DATE(Fecha_Creacion_Reporte) AS dia, COUNT(*) AS cantidad_de_reportes FROM reportes WHERE MONTH(Fecha_Creacion_Reporte) = ? AND YEAR(Fecha_Creacion_Reporte) = YEAR(CURRENT_DATE()) AND Estado_Reporte = 1 GROUP BY dia ORDER BY dia;");
            $stmt->bindParam(1, $mes);
            $stmt->execute();
            $reportes_finalizados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $reportes_finalizados;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        } finally {
            $pdo = null; // Cierra la conexión en cualquier caso
        }
    }

    public function Listar_Reportes_dia_rechazados($mes)
    {
        //require("conexion.class.php");
        $conn = new Conexion;
        $pdo = $conn->connect();
        try {
            $stmt = $pdo->prepare("SELECT DATE(Fecha_Creacion_Reporte) AS dia, COUNT(*) AS cantidad_de_reportes FROM reportes WHERE MONTH(Fecha_Creacion_Reporte) = ? AND YEAR(Fecha_Creacion_Reporte) = YEAR(CURRENT_DATE()) AND Estado_Reporte = 2 GROUP BY dia ORDER BY dia;");
            $stmt->bindParam(1, $mes);
            $stmt->execute();
            $reportes_finalizados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $reportes_finalizados;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        } finally {
            $pdo = null; // Cierra la conexión en cualquier caso
        }
    }

    public function Listar_Reportes_anual()
    {
        //require("conexion.class.php");
        $conn = new Conexion;
        $pdo = $conn->connect();
        try {
            $stmt = $pdo->prepare("SELECT MONTH(Fecha_Finalizacion_Reporte) AS mes, COUNT(*) AS cantidad_de_reportes FROM reportes WHERE YEAR(Fecha_Finalizacion_Reporte) = YEAR(CURRENT_DATE()) GROUP BY mes ORDER BY mes");
            $stmt->execute();
            $reportes_finalizados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $reportes_finalizados;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        } finally {
            $pdo = null; // Cierra la conexión en cualquier caso
        }
    }

    public function Listar_Reportes_mes()
    {
        //require("conexion.class.php");
        $conn = new Conexion;
        $pdo = $conn->connect();
        try {
            $stmt = $pdo->prepare("SELECT MONTH(Fecha_Creacion_Reporte) AS mes, COUNT(*) AS cantidad_de_reportes FROM reportes WHERE YEAR(Fecha_Creacion_Reporte) = YEAR(CURRENT_DATE()) GROUP BY mes ORDER BY mes;");
            $stmt->execute();
            $reportes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $reportes;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        } finally {
            $pdo = null; // Cierra la conexión en cualquier caso
        }
    }

    // SELECT DATE(Fecha_Finalizacion_Reporte) AS dia, COUNT(*) AS cantidad_de_reportes FROM reportes WHERE MONTH(Fecha_Finalizacion_Reporte) = 11 AND YEAR(Fecha_Finalizacion_Reporte) = 2023 AND Estado_Reporte = 2 GROUP BY dia ORDER BY dia;

    // SELECT DATE(Fecha_Finalizacion_Reporte) AS dia, COUNT(*) AS cantidad_de_reportesFROMreportesWHEREMONTH(Fecha_Finalizacion_Reporte) = MONTH(CURRENT_DATE())AND YEAR(Fecha_Finalizacion_Reporte) = YEAR(CURRENT_DATE())GROUP BYdiaORDER BYdia;
}

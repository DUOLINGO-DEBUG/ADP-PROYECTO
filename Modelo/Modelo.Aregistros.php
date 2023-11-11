<?php
require_once("Modelo.Sql.Conector.php");
class Registros
{
    private $id_registro;
    private $usuario_registro;
    private $admin_registro;
    private $estado_registro;
    private $fecha_registro;

    // Getter para id_registro
    public function getIdRegistro()
    {
        return $this->id_registro;
    }

    // Setter para id_registro
    public function setIdRegistro($id_registro)
    {
        $this->id_registro = $id_registro;
    }

    // Getter para usuario_registro
    public function getUsuarioRegistro()
    {
        return $this->usuario_registro;
    }

    // Setter para usuario_registro
    public function setUsuarioRegistro($usuario_registro)
    {
        $this->usuario_registro = $usuario_registro;
    }

    // Getter para admin_registro
    public function getAdminRegistro()
    {
        return $this->admin_registro;
    }

    // Setter para admin_registro
    public function setAdminRegistro($admin_registro)
    {
        $this->admin_registro = $admin_registro;
    }

    // Getter para estado_registro
    public function getEstadoRegistro()
    {
        return $this->estado_registro;
    }

    // Setter para estado_registro
    public function setEstadoRegistro($estado_registro)
    {
        $this->estado_registro = $estado_registro;
    }

    // Getter para fecha_registro
    public function getFechaRegistro()
    {
        return $this->fecha_registro;
    }

    // Setter para fecha_registro
    public function setFechaRegistro($fecha_registro)
    {
        $this->fecha_registro = $fecha_registro;
    }

    public function Registros_administrador()
    {
        //require("conexion.class.php");
        $conn = new Conexion;
        $pdo = $conn->connect();
        try {
            $stmt = $pdo->prepare("SELECT r.Id_Registro, r.Usuario_Registro, u1.Usuario_Usuario, r.Admin_Registro, u2.Usuario_Usuario as admin, r.Estado_Registro, r.Fecha_Registro FROM registros AS r INNER JOIN usuarios AS u1 ON r.Usuario_Registro = u1.Id_Usuario INNER JOIN usuarios AS u2 ON r.Admin_Registro = u2.Id_Usuario ORDER BY Id_Registro DESC;");
            $stmt->execute();
            $registors_admin = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $registors_admin;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        } finally {
            $pdo = null; // Cierra la conexión en cualquier caso
        }
    }
}

<?php

require_once("Modelo.Sql.Conector.php");
class Usuario
{
    private $id_usuario;
    private $usuario_usuario;
    private $nombre_usuario;
    private $apellido_usuario;
    private $correo_usuario;
    private $telefono_usuario;
    private $password_usuario;
    private $fecha_creacion;
    private $estado_estados;
    private $bp_usuario;
    private $cargo_cargos;

    // Getter para id_usuario
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    // Setter para id_usuario
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    // Getter para usuario_usuario
    public function getUsuarioUsuario()
    {
        return $this->usuario_usuario;
    }

    // Setter para usuario_usuario
    public function setUsuarioUsuario($usuario_usuario)
    {
        $this->usuario_usuario = $usuario_usuario;
    }

    // Getter y setter para nombre_usuario
    public function getNombreUsuario()
    {
        return $this->nombre_usuario;
    }

    public function setNombreUsuario($nombre_usuario)
    {
        $this->nombre_usuario = $nombre_usuario;
    }

    // Getter y setter para apellido_usuario
    public function getApellidoUsuario()
    {
        return $this->apellido_usuario;
    }

    public function setApellidoUsuario($apellido_usuario)
    {
        $this->apellido_usuario = $apellido_usuario;
    }

    // Getter y setter para correo_usuario
    public function getCorreoUsuario()
    {
        return $this->correo_usuario;
    }

    public function setCorreoUsuario($correo_usuario)
    {
        $this->correo_usuario = $correo_usuario;
    }

    // Getter y setter para telefono_usuario
    public function getTelefonoUsuario()
    {
        return $this->telefono_usuario;
    }

    public function setTelefonoUsuario($telefono_usuario)
    {
        $this->telefono_usuario = $telefono_usuario;
    }

    // Getter y setter para password_usuario
    public function getPasswordUsuario()
    {
        return $this->password_usuario;
    }

    public function setPasswordUsuario($password_usuario)
    {
        $this->password_usuario = $password_usuario;
    }

    //Nuevo getter y setter para fecha
    public function getFechaCreacion()
    {
        return $this->fecha_creacion;
    }

    public function setFechaCreacion($fecha_creacion)
    {
        $this->fecha_creacion = $fecha_creacion;
    }

    // private $fecha_creacion;
    // Getter y setter para estado_estados
    public function getEstadoEstados()
    {
        return $this->estado_estados;
    }

    public function setEstadoEstados($estado_estados)
    {
        $this->estado_estados = $estado_estados;
    }

    // Getter y setter para bp_usuario
    public function getBpUsuario()
    {
        return $this->bp_usuario;
    }

    public function setBpUsuario($bp_usuario)
    {
        $this->bp_usuario = $bp_usuario;
    }

    // Getter y setter para cargo_cargos
    public function getCargoCargos()
    {
        return $this->cargo_cargos;
    }

    public function setCargoCargos($cargo_cargos)
    {
        $this->cargo_cargos = $cargo_cargos;
    }

    public function registrar_usuario()
    {
        $conn = new Conexion;
        $pdo = $conn->connect();
        try {
            $stmt = $pdo->prepare(
                "INSERT INTO usuarios (Nombre_Usuario,Apellido_Usuario,Correo_Usuario,Usuario_Usuario,Telefono_Usuario,Password_Usuario,Fecha_Creacion_Usuario,Estado_Estados,Bloqueo_Temporal_Usuario,Cargo_Cargos) 
                VALUES (?,?,?,?,?,?,?,?,?,?)"
            );

            $stmt->bindParam(1, $this->nombre_usuario);
            $stmt->bindParam(2, $this->apellido_usuario);
            $stmt->bindParam(3, $this->correo_usuario);
            $stmt->bindParam(4, $this->usuario_usuario);
            $stmt->bindParam(5, $this->telefono_usuario);
            $stmt->bindParam(6, $this->password_usuario);
            $stmt->bindParam(7, $this->fecha_creacion);
            $stmt->bindParam(8, $this->estado_estados);
            $stmt->bindParam(9, $this->bp_usuario);
            $stmt->bindParam(10, $this->cargo_cargos);
            // $consulta = var_export($stmt, true);
            // echo 'Fukcyou' . $consulta;
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        } finally {
            $pdo = null; // Cierra la conexión en cualquier caso
        }
    }

    public function obtenerContra($email)
    {
        //require("conexion.class.php");
        $conn = new Conexion;
        $pdo = $conn->connect();
        try {
            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuarios.Usuario_Usuario = :correo");
            $stmt->bindParam(':correo', $email);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($stmt->rowCount() == 1) {
                $this->password_usuario = $usuario['Password_Usuario'];
                $this->estado_estados = $usuario['Estado_Estados'];
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        } finally {
            $pdo = null; // Cierra la conexión en cualquier caso
        }
    }

    public function inicioSesion($email, $password)
    {
        //require("conexion.class.php");
        $conn = new Conexion;
        $pdo = $conn->connect();
        try {
            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuarios.Usuario_Usuario = :correo");
            $stmt->bindParam(':correo', $email);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if (($stmt->rowCount() == 1)) {
                $this->id_usuario = $usuario['Id_Usuario'];
                $this->usuario_usuario = $usuario['Usuario_Usuario'];
                $this->nombre_usuario = $usuario['Nombre_Usuario'];
                $this->apellido_usuario = $usuario['Apellido_Usuario'];
                $this->correo_usuario = $usuario['Correo_Usuario'];
                $this->telefono_usuario = $usuario['Telefono_Usuario'];
                $this->password_usuario = $usuario['Password_Usuario'];
                $this->fecha_creacion = $usuario['Fecha_Creacion_Usuario'];
                $this->estado_estados = $usuario['Estado_Estados'];
                $this->bp_usuario = $usuario['BP_Usuario'];
                $this->cargo_cargos = $usuario['Cargo_Cargos'];
            }
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        } finally {
            $pdo = null; // Cierra la conexión en cualquier caso
        }
    }

    public function Listar_Usuarios()
    {
        //require("conexion.class.php");
        $conn = new Conexion;
        $pdo = $conn->connect();
        try {
            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuarios.Cargo_Cargos != 3 ORDER BY usuarios.Estado_Estados DESC;");
            $stmt->execute();
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $usuarios;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        } finally {
            $pdo = null; // Cierra la conexión en cualquier caso
        }
    }

    public function Listar_Tecnicos(){
        $conn = new Conexion;
        $pdo = $conn->connect();
        try {
            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuarios.Estado_Estados = 1 OR usuarios.Cargo_Cargos = 2;");
            $stmt->execute();
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $usuarios;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        } finally {
            $pdo = null; // Cierra la conexión en cualquier caso
        }
    }

    public function Listar_Usuarios_Totales()
    {
        //require("conexion.class.php");
        $conn = new Conexion;
        $pdo = $conn->connect();
        try {
            $stmt = $pdo->prepare("SELECT Cargo_Cargos AS ROl, COUNT(*) AS cantidad_de_usuarios FROM usuarios GROUP BY ROl ORDER BY ROl;");
            $stmt->execute();
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $usuarios;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        } finally {
            $pdo = null; // Cierra la conexión en cualquier caso
        }
    }

    public function Listar_Tecnicos_Random()
    {
        //require("conexion.class.php");
        $conn = new Conexion;
        $pdo = $conn->connect();
        try {
            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuarios.Cargo_Cargos = 2 AND usuarios.Estado_Estados = 1 ORDER BY RAND();");
            $stmt->execute();
            $tecnicos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $tecnicos;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        } finally {
            $pdo = null; // Cierra la conexión en cualquier caso
        }
    }

    //SELECT * FROM usuarios WHERE usuarios.Cargo_Cargos = 2 ORDER BY RAND();

    public function Modificar_Usuarios($cargo, $id_usuario)
    {
        $conn = new Conexion;
        $pdo = $conn->connect();
        try {
            $stmt = $pdo->prepare("UPDATE `usuarios` SET `Estado_Estados` = ? WHERE `usuarios`.`Id_Usuario` = ?");
            $stmt->bindParam(1, $cargo);
            $stmt->bindParam(2, $id_usuario);
            $stmt->execute();
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return true;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        } finally {
            $pdo = null; // Cierra la conexión en cualquier caso
        }
    }

    public function Registro_Usuarios_Admin($id_usuario, $id_admin, $cargo, $FechaHora_Actual){
        $conn = new Conexion;
        $pdo = $conn->connect();
        try {
            $stmt = $pdo->prepare("INSERT INTO `registros` (`Usuario_Registro`, `Admin_Registro`, `Estado_Registro`, `Fecha_Registro`) VALUES (?, ?, ?, ?);");
            $stmt->bindParam(1, $id_usuario);
            $stmt->bindParam(2, $id_admin);
            $stmt->bindParam(3, $cargo);
            $stmt->bindParam(4, $FechaHora_Actual);
            $stmt->execute();
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return true;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        } finally {
            $pdo = null; // Cierra la conexión en cualquier caso
        }
    }
}

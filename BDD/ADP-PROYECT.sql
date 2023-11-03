CREATE DATABASE bdd_zacamil CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE bdd_zacamil;
CREATE TABLE ESTADO(
    Id_Estado int AUTO_INCREMENT,
    Nombre_Estado char(60) NOT NULL,
    Descripcion_Estado text NOT NULL,
    PRIMARY KEY (Id_Estado)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
CREATE TABLE CARGOS(
    Id_Cargo int AUTO_INCREMENT,
    Nombre_Cargo char(60) NOT NULL,
    Descripcion_Cargo text NOT NULL,
    PRIMARY KEY (Id_Cargo)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
CREATE TABLE USUARIOS(
    Id_Usuario int AUTO_INCREMENT,
    Usuario_Usuario char(100) NOT NULL,
    Nombre_Usuario char(60) NOT NULL,
    Apellido_Usuario char(60) NOT NULL,
    Correo_Usuario char(100) NOT NULL,
    Usuario_Usuario char(100) NOT NULL,
    Telefono_Usuario int(10) NOT NULL,
    Password_Usuario text NOT NULL,
    Fecha_Creacion_Usuario datetime NOT NULL,
    Estado_Estados int NOT NULL,
    Bloqueo_Temporal_Usuario int NOT NULL,
    Cargo_Cargos int NOT NULL,
    PRIMARY KEY (Id_Usuario),
    FOREIGN KEY (Estado_Estados) REFERENCES ESTADO(Id_Estado),
    FOREIGN KEY (Cargo_Cargos) REFERENCES CARGOS(Id_Cargo)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
CREATE TABLE REGISTROS(
    Id_Registro int AUTO_INCREMENT,
    Usuario_Registro int NOT NULL,
    Admin_Registro int NOT NULL,
    Cargo_Registro int NOT NULL,
    Fecha_Registro datetime NOT NULL,
    PRIMARY KEY (Id_Registro),
    FOREIGN KEY (Usuario_Registro) REFERENCES USUARIOS(Id_Usuario),
    FOREIGN KEY (Admin_Registro) REFERENCES USUARIOS(Id_Usuario),
    FOREIGN KEY (Cargo_Registro) REFERENCES CARGOS(Id_Cargo)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
CREATE TABLE REPORTES(
    Id_Reporte int AUTO_INCREMENT,
    Usuario_Usuarios int,
    Nombre_Equipo_Reporte char(100) NOT NULL,
    Marca_Reporte char(100) NOT NULL,
    Modelo_Reporte char(100) NOT NULL,
    Area_Reporte char(100) NOT NULL,
    Serial_Reporte char(100) NOT NULL,
    Descripcion_Incidente_Reporte text NOT NULL,
    Descripcion_Error_Reporte text NOT NULL,
    Anexo_Reporte text NOT NULL,
    Estado_Reporte int NOT NULL,
    Fecha_Creacion_Reporte datetime NOT NULL,
    Fecha_Finalizacion_Reporte datetime NOT NULL,
    PRIMARY KEY (Id_Reporte),
    FOREIGN KEY (Usuario_Usuarios) REFERENCES USUARIOS(Id_Usuario)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
CREATE TABLE PROGRESO(
    Id_Progreso int AUTO_INCREMENT,
    Reporte_Reportes int,
    Titulo_Progreso int,
    Descripcion_Progreso text NOT NULL,
    Porcentaje_Progreso int(3) NOT NULL,
    Fecha_Progreso datetime NOT NULL,
    PRIMARY KEY (Id_Progreso),
    FOREIGN KEY (Reporte_Reportes) REFERENCES REPORTES(Id_Reporte)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
CREATE TABLE ASIGNACIONES(
    Id_Asignacion int AUTO_INCREMENT,
    Reporte_Reportes int,
    Usuario_Usuarios int,
    Fecha_Asignacion datetime NOT NULL,
    Estado_Asignacion int NOT NULL,
    PRIMARY KEY (Id_Asignacion),
    FOREIGN KEY (Reporte_Reportes) REFERENCES REPORTES(Id_Reporte),
    FOREIGN KEY (Usuario_Usuarios) REFERENCES USUARIOS(Id_Usuario)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
CREATE TABLE MES_REPORTE(
    Id_MesReporte int AUTO_INCREMENT,
    Reportes_SI_Resuelto_Mes int,
    Reportes_NO_Resuelto_Mes int,
    Reportes_Total_Mes int,
    Reportes_Date_Mes datetime,
    PRIMARY KEY (Id_MesReporte)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
----------------------------------------------------------------------[DATOS]
INSERT INTO `estado` (
        `Id_Estado`,
        `Nombre_Estado`,
        `Descripcion_Estado`
    )
VALUES (
        1,
        'Cuenta Activa',
        'La expresión \"cuenta activa\" se refiere a una cuenta o perfil de usuario que está actualmente en uso o habilitada. Indica que la cuenta está activa y disponible para su uso, lo que implica que el usuario puede iniciar sesión, interactuar o realizar acciones relacionadas con esa cuenta en un sistema, plataforma o servicio en línea.'
    ),
    (
        2,
        'Cuenta Desactivada',
        '\r\nLa expresión \"cuenta desactivada\" se refiere a una cuenta de usuario que ha sido inhabilitada o suspendida temporal o permanentemente. Esto implica que el usuario no puede acceder ni utilizar su cuenta en un sistema, plataforma o servicio en línea en ese momento. La desactivación de una cuenta puede deberse a diversas razones, como incumplimiento de normas, inactividad prolongada o por solicitud del usuario. En resumen, una \"cuenta desactivada\" indica que el acceso y las funcionalidades asociadas a esa cuenta están temporalmente o definitivamente restringidas.'
    ),
    (
        3,
        'Recuperación de contrasena',
        'La expresión \"Recuperación de contrasena\" se refiere a un estado en el que un usuario ha solicitado restablecer la contraseña de su cuenta. Por lo general, esto ocurre cuando el usuario ha olvidado su contraseña actual o tiene dificultades para acceder a su cuenta debido a problemas de seguridad.'
    ),
    (
        4,
        'Cuenta en espera de Aprovacion',
        'La expresión \"Cuenta en espera de Aprovacion\" se refiere a una cuenta de usuario que ha sido creada pero aún no ha sido activada o habilitada para su pleno uso en un sistema o plataforma en línea. En este estado, la cuenta del usuario ha sido registrada, pero no puede acceder completamente a las funcionalidades del sistema hasta que sea aprobada o verificada por un administrador, moderador o entidad autorizada.'
    );

INSERT INTO `cargos` (`Id_Cargo`, `Nombre_Cargo`, `Descripcion_Cargo`)
VALUES (1, 'Jefe de Área', ''),
    (2, 'Técnico', ''),
    (
        3,
        'Administrador',
        'Un usuario con la categoría \"administrador\" (administrador) es un tipo de usuario que posee privilegios y permisos especiales en un sistema, aplicación, sitio web o plataforma. A continuación, se proporciona una descripción general de lo que significa ser un usuario de categoría \"administrador\"'
    );

    INSERT INTO `usuarios` (`Id_Usuario`, `Nombre_Usuario`, `Apellido_Usuario`, `Correo_Usuario`, `Usuario_Usuario`, `Telefono_Usuario`, `Password_Usuario`, `Fecha_Creacion_Usuario`, `Estado_Estados`, `Bloqueo_Temporal_Usuario`, `Cargo_Cargos`) VALUES ('1', 'Jonnathan Alexander', 'Urquilla Munoz', 'Jonnathan.urquilla@gmail.com', 'Jonnathan.urquilla', '72963923', '1234567890', '2023-11-02 18:21:44.000000', '4', '0', '1'), (NULL, '', '', '', '', '', '', '2023-11-02 18:21:45.000000', '4', '0', '1');
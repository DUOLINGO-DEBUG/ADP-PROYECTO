CREATE DATABASE ADP_ZACAMIL CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
go
USE ADP;
go

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
    Apellido_Usuario char(40) NOT NULL,
    Correo_Usuario char(40) NOT NULL,
    Telefono_Usuario int(10) NOT NULL,
    Password_Usuario text NOT NULL,
    Estado_Estados int,
    BP_Usuario int,
    Cargo_Cargos int,
    PRIMARY KEY (Id_Usuario),
    FOREIGN KEY (Estado_Estados) REFERENCES ESTADO(Id_Estado),
    FOREIGN KEY (Cargo_Cargos) REFERENCES CARGOS(Id_Cargo)
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
    PRIMARY KEY (Id_Reporte),
    FOREIGN KEY (Usuario_Usuarios) REFERENCES USUARIOS(Id_Usuario)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

CREATE TABLE PROGRESO(
    Id_Progreso int AUTO_INCREMENT,
    Reporte_Reportes int,
    Titulo_Progreso int,
    Descripcion_Progreso text NOT NULL,
    Porcentaje_Progreso int(3) NOT NULL,
    PRIMARY KEY (Id_Progreso),
    FOREIGN KEY (Reporte_Reportes) REFERENCES REPORTES(Id_Reporte)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

CREATE TABLE ASIGNACIONES(
    Id_Asignacion int AUTO_INCREMENT,
    Reporte_Reportes int,
    Usuario_Usuarios int,
    Fecha_Asignacion date NOT NULL,
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
    Reportes_Date_Mes date,
    PRIMARY KEY (Id_MesReporte)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
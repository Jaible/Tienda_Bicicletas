CREATE TABLE usuario (
id_usuario number GENERATED ALWAYS AS IDENTITY not null,
nombre varchar2(20) not null,
apellido varchar2(20) not null,
usuario varchar2(20) not null,
contrasena varchar2(20) not null,
constraint pk_usuario primary key (id_usuario)
);

CREATE TABLE bicicletas(
id_bicicletas number GENERATED ALWAYS AS IDENTITY not null,
img varchar2(100) not null,
nombre varchar2(100) not null,
precio number not null,
constraint pk_bicicletas primary key (id_bicicletas)
);

CREATE TABLE categorias(
id_categoria number GENERATED ALWAYS AS IDENTITY not null,
descripcion varchar2(100) not null,
constraint pk_categoria primary key (id_categoria)
);

CREATE TABLE proveedores(
id_proveedor number GENERATED ALWAYS AS IDENTITY not null,
nombre varchar2(100) not null,
constraint pk_proveedor primary key (id_proveedor)
);


CREATE TABLE facturas (
id_factura number GENERATED ALWAYS AS IDENTITY not null,
id_usuario number not null,
constraint pk_factura primary key (id_factura),
constraint fk_usuario foreign key (id_usuario) references usuario(id_usuario)
);

CREATE TABLE productos(
id_producto number GENERATED ALWAYS AS IDENTITY not null,
img varchar2(100) not null,
nombre varchar2(100) not null,
precio number not null,
constraint pk_producto primary key (id_producto)
);

CREATE TABLE detalle_factura (
id_detalle number GENERATED ALWAYS AS IDENTITY not null,
id_factura number not null,
cantidad number not null,
precio number,
id_usuario number not null,
id_producto number not null,
id_bicicletas number not null,
constraint pk_detalle primary key (id_detalle),
constraint pk_facturaDetalle foreign key (id_factura) references facturas(id_factura),
constraint fk_usuarioDetalle foreign key (id_usuario) references usuario(id_usuario),
constraint fk_productoDetalle foreign key (id_producto) references productos(id_producto),
constraint fk_bicicletasDetalle foreign key (id_bicicletas) references bicicletas(id_bicicletas)

);
CREATE TABLE ventas(
id_venta number GENERATED ALWAYS AS IDENTITY not null,
id_factura number not null,
constraint pk_venta primary key (id_venta),
constraint fk_factura foreign key (id_factura) references facturas(id_factura)
);

CREATE TABLE mantenimientos (
id_mantenimiento number GENERATED ALWAYS AS IDENTITY not null,
id_venta number not null,
arreglos varchar2(200),
id_factura number not null,
constraint pk_mantenimiento primary key (id_mantenimiento),
constraint fk_facturaMantenimientos foreign key (id_factura) references facturas(id_factura)
);

--- Procedimiento para insertar usuarios

CREATE OR REPLACE PROCEDURE INSERT_USUARIO(NOMBRE1 VARCHAR2, APELLIDO1 VARCHAR2, USUARIO1 VARCHAR2, CONTRASENA1 VARCHAR2)
AS 
    USER_COUNT INT;
BEGIN
    SELECT COUNT(usuario.id_usuario) INTO USER_COUNT FROM USUARIO WHERE USUARIO = USUARIO1;

    IF USER_COUNT > 0 OR (LENGTH(NOMBRE1) > 20 OR LENGTH(APELLIDO1) > 20 
                          OR LENGTH(USUARIO1) > 20 OR LENGTH(CONTRASENA1) > 20) THEN
        RETURN;
    ELSE
        INSERT INTO USUARIO (nombre, apellido, usuario, contrasena) VALUES (NOMBRE1, APELLIDO1, USUARIO1, CONTRASENA1);
    END IF;    
END;

--- Procedimiento para insertar bicicletas

CREATE OR REPLACE PROCEDURE INSERT_BICICLETAS(IMG1 VARCHAR2, NOMBRE1 VARCHAR2, PRECIO1 NUMBER)
AS
BEGIN
    IF (LENGTH(IMG1) > 100 OR LENGTH(NOMBRE1) > 100) THEN
        RETURN;
    ELSE
        INSERT INTO BICICLETAS (IMG, NOMBRE, PRECIO) VALUES (IMG1, NOMBRE1, PRECIO1);
    END IF;
END;

--- Procedimiento para actualizar usuarios

CREATE OR REPLACE PROCEDURE UPDATE_USUARIO(ID1 INT, NOMBRE1 VARCHAR2, APELLIDO1 VARCHAR2, USUARIO1 VARCHAR2, CONTRASENA1 VARCHAR2)
AS
    USER_COUNT INT;
    USERNAME_AV INT;
    USERNAME_ACTUAL VARCHAR2(255);
BEGIN
    SELECT COUNT(usuario.id_usuario) INTO USER_COUNT FROM USUARIO WHERE usuario.id_usuario = ID1;
    
    IF USER_COUNT = 0 OR (LENGTH(NOMBRE1) > 20 OR LENGTH(APELLIDO1) > 20 
                          OR LENGTH(USUARIO1) > 20 OR LENGTH(CONTRASENA1) > 20) THEN
        RETURN;
    ELSE
        SELECT USUARIO INTO USERNAME_ACTUAL FROM USUARIO WHERE ID_USUARIO = ID1;
        
        IF USERNAME_ACTUAL = USUARIO1 THEN
            UPDATE USUARIO SET NOMBRE = NOMBRE1, APELLIDO = APELLIDO1, USUARIO = USUARIO1, CONTRASENA = CONTRASENA1 WHERE ID_USUARIO = ID1;        
        ELSE
            SELECT COUNT(usuario.id_usuario) INTO USERNAME_AV FROM USUARIO WHERE USUARIO = USUARIO1;
            
            IF  USERNAME_AV > 0 THEN
                RETURN;
            ELSE 
                UPDATE USUARIO SET NOMBRE = NOMBRE1, APELLIDO = APELLIDO1, USUARIO = USUARIO1, CONTRASENA = CONTRASENA1 WHERE ID_USUARIO = ID1;
            END IF;
        END IF;
    END IF;   
END;

--- Procedimiento para actualizar bicicletas

CREATE OR REPLACE PROCEDURE UPDATE_BICICLETAS(ID1 INT, IMG1 VARCHAR2, NOMBRE1 VARCHAR2, PRECIO1 NUMBER)
AS
    BICI_COUNT INT;
BEGIN
    SELECT COUNT(bicicletas.id_bicicletas) INTO BICI_COUNT FROM BICICLETAS WHERE ID_BICICLETAS = ID1;
    
    IF BICI_COUNT = 0 OR (LENGTH(IMG1) > 100 OR LENGTH(NOMBRE1) > 100) THEN
        RETURN;
    ELSE
        UPDATE BICICLETAS SET IMG = IMG1, NOMBRE = NOMBRE1, PRECIO = PRECIO1 WHERE ID_BICICLETAS = ID1;
    END IF;
END;

--- Procedimiento para eliminar usuario

CREATE OR REPLACE PROCEDURE DELETE_USUARIO(ID1 INT)
AS
    USER_COUNT INT;
BEGIN
    SELECT COUNT(usuario.id_usuario) INTO USER_COUNT FROM USUARIO WHERE ID_USUARIO = ID1;
    
    IF USER_COUNT = 0 THEN
        RETURN;
    ELSE
        DELETE FROM DETALLE_FACTURA WHERE ID_USUARIO = ID1;
        DELETE FROM FACTURAS WHERE ID_USUARIO = ID1;
        DELETE FROM USUARIO WHERE ID_USUARIO = ID1;
    END IF;
END;

--- Procedimiento para eliminar bicicletas

CREATE OR REPLACE PROCEDURE DELETE_BICICLETAS(ID1 INT)
AS
    BICI_COUNT INT;
BEGIN
    SELECT COUNT(bicicletas.id_bicicletas) INTO BICI_COUNT FROM BICICLETAS WHERE ID_BICICLETAS = ID1;
    
    IF BICI_COUNT = 0 THEN
        RETURN;
    ELSE
        DELETE FROM BICICLETAS WHERE ID_BICICLETAS = ID1;
    END IF;
END;

/* ****** Store Procedure PROVEEDORES ***** */

CREATE OR REPLACE PROCEDURE INSERT_PROVEEDOR(nombre1 VARCHAR2)
AS
BEGIN
INSERT INTO proveedores(nombre) VALUES (nombre1);
END;

/* UPDATE ----------- */
CREATE OR REPLACE PROCEDURE UPDATE_PROVEEDOR (ID1 INT , nombre1 VARCHAR2)
AS
PROVEEDOR_COUNT INT;
BEGIN
  SELECT COUNT(proveedores.id_proveedor) INTO PROVEEDOR_COUNT FROM proveedores WHERE id_proveedor = ID1;
  IF PROVEEDOR_COUNT = 0 OR (LENGTH(nombre1)> 100)
  THEN
        RETURN;
  ELSE
        UPDATE proveedores SET nombre = nombre1 WHERE id_proveedor = ID1;
    END IF;
END;

/* DELETE ----------- */

CREATE OR REPLACE PROCEDURE DELETE_PROVEEDOR(ID1 INT)
AS
PROVEEDOR_COUNT INT;
BEGIN
  SELECT COUNT(proveedores.id_proveedor) INTO PROVEEDOR_COUNT FROM proveedores WHERE id_proveedor = ID1;
  IF PROVEEDOR_COUNT = 0 
  THEN
    RETURN;
  ELSE
    DELETE FROM proveedores WHERE id_proveedor = ID1;
 END IF;
END;

-- SP Categorias
CREATE OR REPLACE PROCEDURE INSERT_CATEGORIA(descripcion1 VARCHAR2)
AS
BEGIN
INSERT INTO categorias(descripcion) VALUES (descripcion1);
END;

/* UPDATE ----------- */
CREATE OR REPLACE PROCEDURE UPDATE_CATEGORIA (ID1 INT , DESCRIPCION1 VARCHAR2)
AS
CATEGORIA_COUNT INT;
BEGIN
  SELECT COUNT(categorias.id_categoria) INTO CATEGORIA_COUNT FROM categorias WHERE id_categoria = ID1;
  IF CATEGORIA_COUNT = 0 OR (LENGTH(DESCRIPCION1)> 100)
  THEN
        RETURN;
  ELSE
        UPDATE categorias SET descripcion = DESCRIPCION1 WHERE ID_CATEGORIA = ID1;
    END IF;
END;

/* DELETE ----------- */

CREATE OR REPLACE PROCEDURE DELETE_CATEGORIA(ID1 INT)
AS
CATEGORIA_COUNT INT;
BEGIN
  SELECT COUNT(categorias.id_categoria) INTO CATEGORIA_COUNT FROM categorias WHERE id_categoria = ID1;
  IF CATEGORIA_COUNT = 0 
  THEN
    RETURN;
  ELSE
    DELETE FROM categorias WHERE id_categoria = ID1;
 END IF;


 /*    VISTAS    */

 CREATE VIEW VISTA_PROVEEDORES AS
SELECT id_proveedor, nombre FROM proveedores;

CREATE VIEW VISTA_CATEGORIAS AS
SELECT id_categoria, descripcion FROM categorias;

CREATE VIEW VISTA_BICICLETAS AS
SELECT id_bicicletas, img, nombre, precio FROM bicicletas;

CREATE VIEW VISTA_USUARIOS AS
SELECT id_proveedor, nombre FROM proveedores;
CREATE VIEW VISTA_MANTENIMIENTOS AS
SELECT id_mantenimiento,id_venta,arreglos,id_factura from mantenimientos;

EXECUTE INSERT_PROVEEDOR ('NANOBICI');
SELECT * FROM PROVEEDORES;
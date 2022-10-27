CREATE SCHEMA IF NOT EXISTS `ventas` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `ventas` ;

CREATE TABLE productos(
	id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	codigo VARCHAR(255) NOT NULL,
	descripcion VARCHAR(255) NOT NULL,
	precioVenta DECIMAL(5, 2) NOT NULL,
	precioCompra DECIMAL(5, 2) NOT NULL,
	existencia DECIMAL(5, 2) NOT NULL,
	PRIMARY KEY(id)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

INSERT INTO  productos (codigo, descripcion, precioVenta, precioCompra, existencia) VALUES 
('AADDDD', 'nada', 3, 4);

INSERT INTO  productos (codigo, descripcion, precioVenta, precioCompra, existencia) VALUES 
('dddd', 'nada', 3, 4,1);


INSERT INTO  productos (codigo, descripcion, precioVenta, precioCompra, existencia) VALUES 
('aa', 'nada', 20, 4,1);

INSERT INTO  productos (nombre, descripcion, precioVenta, precioCompra, existencia) VALUES 
('pepsi', 'nada', 20, 4,1);
SELECT * FROM productos;
SELECT * FROM ventas;

CREATE TABLE ventas(
	id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	fecha DATETIME NOT NULL,
	PRIMARY KEY(id)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

CREATE TABLE productos_vendidos(
	id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	id_producto BIGINT UNSIGNED NOT NULL,
	cantidad BIGINT UNSIGNED NOT NULL,
	precio DECIMAL(5, 2) NOT NULL,
	id_venta BIGINT UNSIGNED NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY(id_producto) REFERENCES productos(id) ON DELETE CASCADE,
	FOREIGN KEY(id_venta) REFERENCES ventas(id) ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

CREATE TABLE usuarios(
   idUsuario INT(11) NOT NULL AUTO_INCREMENT,
   login VARCHAR(15) NOT NULL,
   password VARCHAR(200) NOT NULL,
   nombres VARCHAR(200) NOT NULL,
   primerApellido VARCHAR(100) NOT NULL,
   segundoApellido VARCHAR(100) NULL DEFAULT NULL,
   edad TINYINT(4) NOT NULL,
   tipo VARCHAR(45) NOT NULL,
   habilitado TINYINT(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idUsuario`))
ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

INSERT INTO usuarios (login,  password, nombres, primerApellido, segundoApellido, edad, tipo) VALUES 
('amendez', 'bolivia1234', 'carlos', 'carlitos', 'carloncho' , 34, 'administrador'); 
INSERT INTO usuarios (login,  password, nombres, primerApellido, segundoApellido, edad, tipo) VALUES 
('admin', 'admin', 'carlos', 'carlitos', 'carloncho' , 34, 'admin'); 
INSERT INTO usuarios (login,  password, nombres, primerApellido, segundoApellido, edad, tipo) VALUES 
('guest', 'guest', 'antonio', 'jose', 'carloncho' , 20, 'guest'); 
INSERT INTO usuarios (login,  password, nombres, primerApellido, segundoApellido, edad, tipo) VALUES 
('admin1', 'admin1', 'leo', 'leos', 'carloncho' , 34, 'Admin'); 
INSERT INTO usuarios (login,  password, nombres, primerApellido, segundoApellido, edad, tipo) VALUES 
('guest1', 'guest1', 'juan', 'carlos', 'carloncho' , 34, 'Guest'); 
SELECT  * FROM ventas;
SELECT  * FROM usuarios;


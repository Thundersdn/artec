CREATE TABLE IF NOT EXISTS entregas(
	id int NOT NULL AUTO_INCREMENT, 
	venta int NOT NULL,
	ruta int,
	direccion text, 
	latitud decimal(9,6), 
	longitud decimal(9,6), 
	fecha_creacion timestamp NOT NULL, 
	fecha_recepcion timestamp, 
	estado text,
	PRIMARY KEY(id), -- ENTREGADO, CANCELADO, EN ESPERA
	FOREIGN KEY(venta) REFERENCES ventas(id));

CREATE TABLE IF NOT EXISTS rutas(
	id int NOT NULL AUTO_INCREMENT, 
	fecha_creacion timestamp,
	fecha_expiracion timestamp,
	estado text, -- VIGENTE, CANCELADO, EXPIRADO 
	PRIMARY KEY(id));

CREATE TABLE IF NOT EXISTS informes_entrega(
	id int NOT NULL AUTO_INCREMENT, 
	entrega int NOT NULL, 
	comentario text, 
	fecha timestamp,
	PRIMARY KEY(id),
	FOREIGN KEY(entrega) REFERENCES entregas(id));

CREATE TABLE IF NOT EXISTS informes_ruta(
	id int NOT NULL AUTO_INCREMENT,
	ruta int NOT NULL,
	comentario text,
	fecha timestamp,
	PRIMARY KEY(id),
	FOREIGN KEY(ruta) REFERENCES rutas(id));

-- llenado de datos
INSERT INTO entregas (venta,ruta,direccion,latitud,longitud,fecha_creacion,fecha_recepcion,estado) VALUES
(1,NULL,'santa clara 3325',-33.520872,-70.652644,'2018-07-10 17:20:25', '2018-07-11 09:32:30', 'ENTREGADO'),
(2,NULL,'santa clara 3325',-33.520872,-70.652644,'2018-07-12 22:30:15', '2018-07-12 22:45:05', 'CANCELADO'),
(2,3,'santa clara 3325',-33.520872,-70.652644,'2018-07-14 09:45:30', NULL, 'EN ESPERA');

INSERT INTO rutas (fecha_creacion,fecha_expiracion,estado) VALUES
('2018-07-10 17:20:25','2018-07-11 17:20:25', 'EXPIRADO'),
('2018-07-12 22:30:15', '2018-07-13 22:45:05', 'CANCELADO'),
('2018-07-14 15:05:20', '2018-07-15 15:05:20', 'VIGENTE');

INSERT INTO informes_entrega (entrega,comentario,fecha) VALUES
(1,'Entrega finalizada con exito','2018-07-11 09:32:30'),
(2,'Entrega cancelada','2018-07-12 22:45:05');

-- quizas no sea necesario un informe por ruta

INSERT INTO informes_ruta (ruta,comentario,fecha) VALUES
(1,'Entrega N°0 realizada con exito','2018-07-11 09:00:14'),
(1,'Entrega N°1 realizada con exito','2018-07-11 09:32:30'),
(1,'Ruta finalizada con exito','2018-07-11 09:32:30'),
(2,'Ruta cancelada','2018-07-12 22:45:05');

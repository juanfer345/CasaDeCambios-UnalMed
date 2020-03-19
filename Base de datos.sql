
# BASE DE DATOS: CASA DE CAMBIOS UNALMED

# Creando y activando el uso de la base de datos
CREATE DATABASE trabajo_casa_de_cambios_unalmed;
USE trabajo_casa_de_cambios_unalmed;

# Creación e inserción de datos de la tabla SUCURSAL-----------------------------------------------------------
CREATE TABLE SUCURSAL(
	numeroRegistro BIGINT(30) UNSIGNED PRIMARY KEY,
	nombre VARCHAR(20) UNIQUE NOT NULL,
	ciudad VARCHAR(20) NOT NULL,
	direccion VARCHAR(20) NOT NULL,
	horario VARCHAR(20) NOT NULL
) ENGINE = InnoDB;

INSERT INTO SUCURSAL VALUES(101, 'Tesoro', 'Medellin', 'kr 25- 1a sur-45', '8:00am-8:00pm');
INSERT INTO SUCURSAL VALUES(203, 'Mayorca', 'Sabaneta', 'cl 51 sur-40', '9:00am-9:00pm');
INSERT INTO SUCURSAL VALUES(405, 'Puerta del norte', 'Bello', 'dg 55-34-67', '10:00am-8:00pm');
INSERT INTO SUCURSAL VALUES(75, 'CC paladino', 'Bogota', 'cl 25-66-9', '8:30am-8:00pm');
INSERT INTO SUCURSAL VALUES(10000, 'Florida', 'Medellin', 'Calle 5 # 6-45', '9:00am-10:00pm');

# Creación e inserción de datos de la tabla PERSONA------------------------------------------------------------
CREATE TABLE PERSONA(
	tipoDoc VARCHAR(10),
	#CHECK(tipoDoc IN ('CC', 'TI', 'CE', 'PB', 'DNI')),
	numeroId BIGINT(30) UNSIGNED,
	PRIMARY KEY(tipoDoc, numeroId),
	nombreCompleto VARCHAR(40) NOT NULL,
	fechaNac DATE NOT NULL,
	ciudadNac VARCHAR(10) NOT NULL,
	direcRes VARCHAR(20) NOT NULL,
	ciudadRes VARCHAR(15) NOT NULL,
	nacionalidad VARCHAR(15) NOT NULL,
	telefono BIGINT(30) NOT NULL
) ENGINE = InnoDB;

INSERT INTO PERSONA VALUES('TI', 324568904, 'Marco Perez Perez', CURRENT_DATE(), 'Medellin', 'kr 25- 1a sur-45', 'Medellin', 'colombiano', 3003456789);
INSERT INTO PERSONA VALUES('CC', 426512388, 'Luz Luna Coa', CURRENT_DATE(), 'cali', 'cl 66 sur-48-32', 'bogota', 'colombiano', 3235804356);
INSERT INTO PERSONA VALUES('PB', 27478427, 'Steven Johnson Garcia', CURRENT_DATE(), 'toronto', 'dg 5-33-24', 'cali', 'canadiense', 312286389);
INSERT INTO PERSONA VALUES('CC', 425034567, 'Carlos Escobar Marin', CURRENT_DATE(), 'Medellin', 'kr 20a-7-92', 'barranquilla', 'colombiano', 8200032);

# Creación e inserción de datos de la tabla EMPRESA------------------------------------------------------------
CREATE TABLE EMPRESA(
	nit BIGINT(30) UNSIGNED PRIMARY KEY,
	nombre VARCHAR(40) NOT NULL,
	direccion VARCHAR(20) NOT NULL,
	telefono BIGINT(30) NOT NULL
) ENGINE = InnoDB;

INSERT INTO EMPRESA VALUES(121324343, 'Nike', 'kr 25- 1a sur-45', 3003456789);
INSERT INTO EMPRESA VALUES(93820303, 'Adidas', 'cl 66 sur-48-32', 3235804356);
INSERT INTO EMPRESA VALUES(329377072, 'Coca-cola', 'dg 5-33-24', 31228886389);
INSERT INTO EMPRESA VALUES(009887472, 'Postobon', 'kr 20a-7-92', 8200032);

# Creación e inserción de datos de la tabla DIVISA-------------------------------------------------------------
CREATE TABLE DIVISA(
	tipoDivisa VARCHAR(10) PRIMARY KEY,
	#CHECK(tipoDivisa IN ('VEF', 'CRC', 'NOK', 'SEK', 'USD', 'AUD', 'CAD', 'NZD', 'EUR', 'AWG', 'CHF', 'GBP', 'TRY', 'PEN', 'ARS', 'BOP', 'CLP', 'DOP', 'MXN', 'UYU', 'GTQ', 'BRL', 'INR', 'JPY', 'CNY', 'COP')),
	tasaCompra FLOAT(30) UNSIGNED NOT NULL,
	tasaVenta FLOAT(30) UNSIGNED NOT NULL
) ENGINE = InnoDB;

INSERT INTO DIVISA VALUES('USD', 3172, 1245);
INSERT INTO DIVISA VALUES('EUR', 2382, 2391);
INSERT INTO DIVISA VALUES('COP', 1456, 2982);
INSERT INTO DIVISA VALUES('JPY', 1245, 1333);

# Creación e inserción de datos de la tabla CAJA---------------------------------------------------------------
CREATE TABLE CAJA(
	codigo BIGINT(30) UNSIGNED PRIMARY KEY,
	montoTotal FLOAT(50) UNSIGNED NOT NULL,
	idSucursal BIGINT(30) UNSIGNED NOT NULL,
	FOREIGN KEY fkSuc(idSucursal) REFERENCES SUCURSAL(numeroRegistro) ON DELETE CASCADE
) ENGINE = InnoDB;

INSERT INTO CAJA VALUES(1212, 2000, 101);
INSERT INTO CAJA VALUES(2345, 400000, 405);
INSERT INTO CAJA VALUES(1253, 0, 75);

# Creación e inserción de datos de la tabla EMPLEADO-----------------------------------------------------------
CREATE TABLE EMPLEADO(
	cedula BIGINT(30) UNSIGNED PRIMARY KEY,
	nombreCompleto VARCHAR(20) NOT NULL,
	numeroSistema BIGINT(30) UNIQUE NOT NULL,
	direccion VARCHAR(20) NOT NULL,
	telefono BIGINT(30) NOT NULL,
	idSucursal BIGINT(30) UNSIGNED,
	FOREIGN KEY fkSuc(idSucursal) REFERENCES SUCURSAL(numeroRegistro) ON DELETE CASCADE,
	tipoEmp VARCHAR(7) NOT NULL,
	#CHECK(tipoEmp IN ('cajero', 'oficial')),
	codigoTrans BIGINT(30) UNSIGNED
	#CHECK((tipoEmp='cajero' and codigotrans IS NULL) or (tipoEmp='oficial' and codigotrans IS NOT NULL)),

) ENGINE = InnoDB;

#ALTER TABLE EMPLEADO ADD CHECK (tipoEmp='cajero');

INSERT INTO EMPLEADO VALUES(123456, 'juliana velez', 1, 'Calle 4 #48-32', 3103457684, 101, 'Cajero', NULL);
INSERT INTO EMPLEADO VALUES(654321, 'daniel meza', 2, 'Carrera 7 # 5-7', 3158456147, 203, 'Oficial', 123);
INSERT INTO EMPLEADO VALUES(159753, 'sara uribe', 3, 'Calle 8 # 7-2', 3121234567, 405, 'Cajero', NULL);
INSERT INTO EMPLEADO VALUES(133674, 'carmen ivonne', 4, 'Diagonal 6a # 17-23', 5429845, 405, 'Oficial', 654);

# Creación e inserción de datos de la tabla TRANSFERENCIA------------------------------------------------------
CREATE TABLE TRANSFERENCIA(
	numeroTrans BIGINT(30) UNSIGNED PRIMARY KEY,
	tipotrans VARCHAR(20) NOT NULL,
	#CHECK(tipotrans IN('ingreso', 'egreso')),
	monto FLOAT(20) UNSIGNED NOT NULL,
	fecha DATE NOT NULL,
	tasaCambio FLOAT(20) UNSIGNED NOT NULL,

	idDivisa VARCHAR(10) NOT NULL,
	FOREIGN KEY fkDivisa(idDivisa) REFERENCES DIVISA(tipoDivisa) ON DELETE CASCADE,

	idOficial BIGINT(30) UNSIGNED NOT NULL,
	FOREIGN KEY fkOficial(IdOficial) REFERENCES EMPLEADO(cedula) ON DELETE CASCADE,

	sucursalOrig BIGINT(30) UNSIGNED NOT NULL,
	FOREIGN KEY fkSucOrg(sucursalOrig) REFERENCES SUCURSAL(numeroRegistro) ON DELETE CASCADE,

	sucursalDest BIGINT(30) UNSIGNED NOT NULL,
	FOREIGN KEY fkSucDest(sucursalDest) REFERENCES SUCURSAL(numeroRegistro) ON DELETE CASCADE
	#CHECK(sucursalorg!=sucursaldest)
) ENGINE = InnoDB;

INSERT INTO TRANSFERENCIA VALUES(1, 'ingreso', 1000, CURRENT_DATE(), 3000, 'USD', 133674, 101, 203);
INSERT INTO TRANSFERENCIA VALUES(2, 'egreso', 100000, CURRENT_DATE(), 2300, 'COP', 654321, 203, 101);
INSERT INTO TRANSFERENCIA VALUES(3, 'egreso', 4000, CURRENT_DATE(), 4000, 'EUR', 133674, 405, 101);
INSERT INTO TRANSFERENCIA VALUES(4, 'ingreso', 6000, CURRENT_DATE(), 6000, 'JPY', 133674, 203, 75);

# Creación e inserción de datos de la tabla TRANSACCION--------------------------------------------------------
CREATE TABLE TRANSACCION(
	codigo BIGINT(30) UNSIGNED PRIMARY KEY,
	tipofac VARCHAR(6) NOT NULL,
	#CHECK(tipofac IN ('compra', 'venta')),
	montoEntrada FLOAT(10) UNSIGNED NOT NULL,
	montoSalida FLOAT(10) UNSIGNED NOT NULL,
	#CHECK(montocompra>0 and montoventa>0),
	fecha DATE NOT NULL,
	hora TIME NOT NULL,
	tasaCambio FLOAT(30) UNSIGNED NOT NULL,
	montoInicial FLOAT(30) UNSIGNED,
	divisaPesos VARCHAR(10) NOT NULL,

	tipoDocCliente VARCHAR(10),
	numeroIdCliente BIGINT(30) UNSIGNED,
	FOREIGN KEY fkCliente(tipoDocCliente, numeroIdCliente) REFERENCES PERSONA(tipoDoc, numeroId) ON DELETE CASCADE,

	nitEmpresa BIGINT(30) UNSIGNED,
	FOREIGN KEY fkEmpresa(nitEmpresa) REFERENCES EMPRESA(nit) ON DELETE CASCADE,
	#CHECK((tipoDoccliente IS NOT NULL AND numeroIdcliente IS NOT NULL AND nit_empresa IS NULL) or (nit_empresa IS NOT NULL AND tipoDoccliente IS NULL AND numeroIdcliente IS NULL)),

	idSucursal BIGINT(30) UNSIGNED NOT NULL,
	FOREIGN KEY fkSuc(idSucursal) REFERENCES SUCURSAL(numeroRegistro) ON DELETE CASCADE,

	idDivisa VARCHAR(10) NOT NULL,
	FOREIGN KEY fkDivisa(idDivisa) REFERENCES DIVISA(tipoDivisa) ON DELETE CASCADE,
	#CHECK(divisacompra='COP' OR divisaventa='COP' AND divisacompra != divisaventa),

	idCajero BIGINT(30) UNSIGNED NOT NULL,
	FOREIGN KEY fkCajero(idCajero) REFERENCES EMPLEADO(cedula) ON DELETE CASCADE
) ENGINE = InnoDB;

INSERT INTO TRANSACCION VALUES(933, 'compra', 100, 30000, CURRENT_DATE(), CURRENT_TIME(), 456.2, 2515, 'entrada', 'TI', 324568904, NULL, 101, 'USD', 159753);
INSERT INTO TRANSACCION VALUES(224, 'venta', 100, 30000, CURRENT_DATE(), CURRENT_TIME(), 4561, NULL, 'entrada', NULL, NULL, 93820303, 101, 'USD', 123456);
INSERT INTO TRANSACCION VALUES(1124, 'compra', 100, 30000, CURRENT_DATE(), CURRENT_TIME(), 5482, 21, 'salida', 'PB', 27478427, NULL, 101, 'COP', 159753);
INSERT INTO TRANSACCION VALUES(2784, 'venta', 100, 30000, CURRENT_DATE(), CURRENT_TIME(), 5984.2, NULL, 'entrada', 'CC', 426512388, NULL, 203, 'USD', 159753);
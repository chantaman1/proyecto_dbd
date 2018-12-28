BEGIN;

CREATE TABLE aerolineas (
    id                      SERIAL PRIMARY KEY,
    nombre                  VARCHAR(50)
);

CREATE TABLE aeropuertos (
    id                      SERIAL PRIMARY KEY,
    nombre                  VARCHAR(60),
    ciudad                  VARCHAR(100),
    direccion               VARCHAR(100),
    Pais                    VARCHAR(35)
);

CREATE TABLE aseguradoras (
    id                      SERIAL PRIMARY KEY,
    nombre                  VARCHAR(60),
    direccion               VARCHAR(100),
    telefono                VARCHAR(31),
    ciudad                  VARCHAR(100),
    pais                    VARCHAR(35),
    webpage                 VARCHAR(256),
    activo                  BOOLEAN;
);

CREATE TABLE asientos (
    id                      SERIAL PRIMARY KEY,
    codigo                  VARCHAR(10),
    tipo                    VARCHAR(30),
    disponibilidad          BOOLEAN,
    precio                  INTEGER,
    vuelo_id                INTEGER
);

CREATE TABLE auditorias (
    id                      SERIAL PRIMARY KEY,
    tipo_transaccion        VARCHAR(40),
    fecha                   DATE,
    hora                    TIMESTAMP(0),
    usuario_id              INTEGER REFERENCES usuarios
);

CREATE TABLE compania_alquilers (
    id                      SERIAL PRIMARY KEY,
    nombre                  VARCHAR(60),
    direccion               VARCHAR(100),
    telefono                VARCHAR(31),
    ciudad                  VARCHAR(100),
    pais                    VARCHAR(35),
    webpage                 VARCHAR(256),
    activo                  BOOLEAN
);

CREATE TABLE comprobante_pagos (
    id                      SERIAL PRIMARY KEY,
    total_pagado            INTEGER,
    descripcion_pago        TEXT,
    metodo_pago_id          INTEGER,
    reserva_id              INTEGER REFERENCES reservas
);

CREATE TABLE habitacion_paquete (
    fecha_inicio            DATE,
    fecha_termino           DATE,
    paquete_id              INTEGER REFERENCES paquete,
    habitacion_id           INTEGER REFERENCES habitacion
);

CREATE TABLE habitacion_reserva (
    fecha_inicio            DATE,
    fecha_termino           DATE,
    reserva_id              INTEGER REFERENCES reservas,
    habitacion_id           INTEGER REFERENCES habitacions
);

CREATE TABLE habitacions (
    id                      SERIAL PRIMARY KEY,
    numero                  INTEGER,
    capacidad               INTEGER,
    disponibilidad          BOOLEAN,
    tipo_cama               VARCHAR(30),
    categoria               VARCHAR(30),
    precio                  INTEGER,
    activo                  BOOLEAN,
    hotel_id                INTEGER REFERENCES hotels
);

CREATE TABLE hotel (
    id                      SERIAL PRIMARY KEY,
    nombre                  VARCHAR(60),
    direccion               VARCHAR(100),
    telefono                VARCHAR(31),
    ciudad                  VARCHAR(100),
    pais                    VARCHAR(35),
    calificacion            INTEGER,
    webpage                 VARCHAR(256),
    activo                  BOOLEAN
);

CREATE TABLE metodo_pago_usuario (
    usuario_id              INTEGER REFERENCES usuarios,
    metodo_pago_id          INTEGER REFERENCES metodo_pagos
);

CREATE TABLE metodo_pagos (
    id                      SERIAL PRIMARY KEY,
    tipo                    VARCHAR(30),
    nombre                  VARCHAR(40)
);

CREATE TABLE paquete_reserva (
    reserva_id              INTEGER REFERENCES reservas,
    paquete_id              INTEGER REFERENCES paquetes
);

CREATE TABLE paquete_servicio (
    paquete_id              INTEGER REFERENCES paquetes,
    servicio_id             INTEGER REFERENCES servicios
);

CREATE TABLE paquete_vehiculo (
    fecha_inicio            DATE,
    hora_inicio             TIME(0),
    fecha_termino           DATE,
    hora_termino            TIME(0),
    paquete_id              INTEGER REFERENCES paquetes,
    vehiculo_id             INTEGER REFERENCES vehiculos
);

CREATE TABLE paquetes (
    id                      SERIAL PRIMARY KEY,
    pais_destino            VARCHAR(35),
    ciudad_destino          VARCHAR(100),
    precio                  INTEGER,
    descuento               DOUBLE PRECISION,
    cupos                   INTEGER,
    disponibilidad          BOOLEAN,
    posee_vehiculo          BOOLEAN,
    posee_hotel             BOOLEAN,
    posee_seguro            BOOLEAN
);

CREATE TABLE pasajero_seguro (
    pasajero_id             INTEGER REFERENCES pasajeros,
    seguro_id               INTEGER REFERENCES seguros
);

CREATE TABLE pasajeros (
    id                      SERIAL PRIMARY KEY,
    nombre                  VARCHAR(63),
    apellido_paterno        VARCHAR(40),
    apellido_materno        VARCHAR(40),
    fecha_nacimiento        DATE,
    telefono                VARCHAR(30),
    correo                  VARCHAR(255),
    nacionalidad            VARCHAR(63),
    pasaporte               VARCHAR(255),
    asiento_id              INTEGER REFERENCES asientos
);

INSERT INTO aerolineas (id, nombre, created_at, updated_at) VALUES (1, 'Qatar Airways', '2018-12-27 16:05:25', NULL);
INSERT INTO aerolineas (id, nombre, created_at, updated_at) VALUES (2, 'Emirates', '2018-12-27 16:05:25', NULL);
INSERT INTO aerolineas (id, nombre, created_at, updated_at) VALUES (3, 'LATAM', '2018-12-27 16:05:25', NULL);
INSERT INTO aerolineas (id, nombre, created_at, updated_at) VALUES (4, 'United Airlines', '2018-12-27 16:05:25', NULL);
INSERT INTO aerolineas (id, nombre, created_at, updated_at) VALUES (5, 'Aeromexico', '2018-12-27 16:05:25', NULL);

INSERT INTO aeropuertos (id, nombre, ciudad, direccion, pais, created_at, updated_at) VALUES (1, 'Charles de Gaulle', 'Francia', '95700 Roissy-en-France', 'Paris', '2018-12-27 16:05:26', NULL);

COMMIT;

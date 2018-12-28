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
    pais                    VARCHAR(35)
);

CREATE TABLE aseguradoras (
    id                      SERIAL PRIMARY KEY,
    nombre                  VARCHAR(60),
    direccion               VARCHAR(100),
    telefono                VARCHAR(31),
    ciudad                  VARCHAR(100),
    pais                    VARCHAR(35),
    webpage                 VARCHAR(256),
    activo                  BOOLEAN
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

CREATE TABLE hotels (
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

CREATE TABLE habitacions (
    id                      SERIAL PRIMARY KEY,
    numero                  INTEGER,
    capacidad               INTEGER,
    disponibilidad          BOOLEAN,
    tipo_cama               VARCHAR(30),
    categoria               VARCHAR(30),
    precio                  INTEGER,
    activo                  BOOLEAN,
    hotel_id                INTEGER REFERENCES "hotels"
);

CREATE TABLE metodo_pagos (
    id                      SERIAL PRIMARY KEY,
    tipo                    VARCHAR(30),
    nombre                  VARCHAR(40)
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

CREATE TABLE seguros (
    id                      SERIAL PRIMARY KEY,
    tipo                    VARCHAR(63),
    precio                  INTEGER,
    descripcion             TEXT,
    aseguradora_id          INTEGER REFERENCES "aseguradoras"
);

CREATE TABLE servicios (
    id                      SERIAL PRIMARY KEY,
    tipo                    VARCHAR(40),
    precio                  INTEGER,
    descripcion             TEXT,
    aseguradora_id          INTEGER REFERENCES "aseguradoras"
);

CREATE TABLE usuarios (
    id                      SERIAL PRIMARY KEY,
    nombre                  VARCHAR(63),
    apellido_paterno        VARCHAR(40),
    apellido_materno        VARCHAR(40),
    password                VARCHAR(127),
    fecha_nacimiento        DATE,
    direccion               VARCHAR(100),
    telefono                VARCHAR(30),
    correo                  VARCHAR(255),
    nacionalidad            VARCHAR(63),
    pasaporte               VARCHAR(255)
);

CREATE TABLE reservas (
    id                      SERIAL PRIMARY KEY,
    totalAPagar             INTEGER,
    estado_pago             VARCHAR(30),
    usuario_id              INTEGER REFERENCES "usuarios"
);

CREATE TABLE comprobante_pagos (
    id                      SERIAL PRIMARY KEY,
    total_pagado            INTEGER,
    descripcion_pago        TEXT,
    metodo_pago_id          INTEGER,
    reserva_id              INTEGER REFERENCES "reservas"
);

CREATE TABLE auditorias (
    id                      SERIAL PRIMARY KEY,
    tipo_transaccion        VARCHAR(40),
    fecha                   DATE,
    hora                    TIMESTAMP(0),
    usuario_id              INTEGER REFERENCES "usuarios"
);

CREATE TABLE rols (
    id                      SERIAL PRIMARY KEY,
    tipo                    VARCHAR(30)
);

CREATE TABLE vehiculos (
    id                      SERIAL PRIMARY KEY,
    patente                 VARCHAR(15),
    marca                   VARCHAR(40),
    modelo                  VARCHAR(40),
    año                     INTEGER,
    precio                  INTEGER,
    cantidad_asientos       INTEGER,
    tipo_transmision        VARCHAR(20),
    descripcion             TEXT,
    compania_alquiler_id    INTEGER REFERENCES "compania_alquilers"
);

CREATE TABLE vuelos (
    id                      SERIAL PRIMARY KEY,
    tipo                    VARCHAR(40),
    ciudad_origen           VARCHAR(100),
    pais_origen             VARCHAR(63),
    codigo                  VARCHAR(255),
    ciudad_destino          VARCHAR(100),
    pais_destino            VARCHAR(63),
    fecha_inicio            DATE,
    hora                    TIME(0),
    aerolinea_id            INTEGER REFERENCES "aerolineas"
);

CREATE TABLE asientos (
    id                      SERIAL PRIMARY KEY,
    codigo                  VARCHAR(10),
    tipo                    VARCHAR(30),
    disponibilidad          BOOLEAN,
    precio                  INTEGER,
    vuelo_id                INTEGER REFERENCES "vuelos"
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
    asiento_id              INTEGER REFERENCES "asientos"
);

CREATE TABLE habitacion_paquete (
    fecha_inicio            DATE,
    fecha_termino           DATE,
    paquete_id              INTEGER REFERENCES "paquetes",
    habitacion_id           INTEGER REFERENCES "habitacions"
);

CREATE TABLE habitacion_reserva (
    fecha_inicio            DATE,
    fecha_termino           DATE,
    reserva_id              INTEGER REFERENCES "reservas",
    habitacion_id           INTEGER REFERENCES "habitacions"
);

CREATE TABLE metodo_pago_usuario (
    usuario_id              INTEGER REFERENCES "usuarios",
    metodo_pago_id          INTEGER REFERENCES "metodo_pagos"
);

CREATE TABLE paquete_reserva (
    reserva_id              INTEGER REFERENCES "reservas",
    paquete_id              INTEGER REFERENCES "paquetes"
);

CREATE TABLE paquete_servicio (
    paquete_id              INTEGER REFERENCES "paquetes",
    servicio_id             INTEGER REFERENCES "servicios"
);

CREATE TABLE paquete_vehiculo (
    fecha_inicio            DATE,
    hora_inicio             TIME(0),
    fecha_termino           DATE,
    hora_termino            TIME(0),
    paquete_id              INTEGER REFERENCES "paquetes",
    vehiculo_id             INTEGER REFERENCES "vehiculos"
);

CREATE TABLE pasajero_seguro (
    pasajero_id             INTEGER REFERENCES "pasajeros",
    seguro_id               INTEGER REFERENCES "seguros"
);

CREATE TABLE reserva_vehiculo (
    reserva_id              INTEGER REFERENCES "reservas",
    vehiculo_id             INTEGER REFERENCES "vehiculos",
    fecha_inicio            DATE,
    hora_inicio             TIME(0),
    fecha_termino           DATE,
    hora_termino            TIME(0)
);

CREATE TABLE rol_usuario (
    rol_id                  INTEGER REFERENCES "rols",
    usuario_id              INTEGER REFERENCES "usuarios"
);

INSERT INTO aerolineas (id, nombre) VALUES (1, 'Qatar Airways');
INSERT INTO aerolineas (id, nombre) VALUES (2, 'Emirates');
INSERT INTO aerolineas (id, nombre) VALUES (3, 'LATAM');
INSERT INTO aerolineas (id, nombre) VALUES (4, 'United Airlines');
INSERT INTO aerolineas (id, nombre) VALUES (5, 'Aeromexico');

COMMIT;

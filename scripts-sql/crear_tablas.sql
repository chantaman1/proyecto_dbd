BEGIN;

CREATE TABLE "aerolineas" (
    id                      SERIAL PRIMARY KEY,
    nombre                  VARCHAR(50)
);

CREATE TABLE "aeropuertos" (
    id                      SERIAL PRIMARY KEY,
    nombre                  VARCHAR(60),
    ciudad                  VARCHAR(100),
    direccion               VARCHAR(100),
    pais                    VARCHAR(35)
);

CREATE TABLE "aseguradoras" (
    id                      SERIAL PRIMARY KEY,
    nombre                  VARCHAR(60),
    direccion               VARCHAR(100),
    telefono                VARCHAR(31),
    ciudad                  VARCHAR(100),
    pais                    VARCHAR(35),
    webpage                 VARCHAR(256),
    activo                  BOOLEAN
);

CREATE TABLE "compania_alquilers" (
    id                      SERIAL PRIMARY KEY,
    nombre                  VARCHAR(60),
    direccion               VARCHAR(100),
    telefono                VARCHAR(31),
    ciudad                  VARCHAR(100),
    pais                    VARCHAR(35),
    webpage                 VARCHAR(256),
    activo                  BOOLEAN
);

CREATE TABLE "hotels" (
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

CREATE TABLE "habitacions" (
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

CREATE TABLE "metodo_pagos" (
    id                      SERIAL PRIMARY KEY,
    tipo                    VARCHAR(30),
    nombre                  VARCHAR(40)
);

CREATE TABLE "paquetes" (
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

CREATE TABLE "seguros" (
    id                      SERIAL PRIMARY KEY,
    tipo                    VARCHAR(63),
    precio                  INTEGER,
    descripcion             TEXT,
    aseguradora_id          INTEGER REFERENCES "aseguradoras"
);

CREATE TABLE "servicios" (
    id                      SERIAL PRIMARY KEY,
    tipo                    VARCHAR(40),
    precio                  INTEGER,
    descripcion             TEXT,
    aseguradora_id          INTEGER REFERENCES "aseguradoras"
);

CREATE TABLE "usuarios" (
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

CREATE TABLE "reservas" (
    id                      SERIAL PRIMARY KEY,
    totalAPagar             INTEGER,
    estado_pago             VARCHAR(30),
    usuario_id              INTEGER REFERENCES "usuarios"
);

CREATE TABLE "comprobante_pagos" (
    id                      SERIAL PRIMARY KEY,
    total_pagado            INTEGER,
    descripcion_pago        TEXT,
    metodo_pago_id          INTEGER,
    reserva_id              INTEGER REFERENCES "reservas"
);

CREATE TABLE "auditorias" (
    id                      SERIAL PRIMARY KEY,
    tipo_transaccion        VARCHAR(40),
    fecha                   DATE,
    hora                    TIMESTAMP(0),
    usuario_id              INTEGER REFERENCES "usuarios"
);

CREATE TABLE "rols" (
    id                      SERIAL PRIMARY KEY,
    tipo                    VARCHAR(30)
);

CREATE TABLE "vehiculos" (
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

CREATE TABLE "vuelos" (
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

CREATE TABLE "asientos" (
    id                      SERIAL PRIMARY KEY,
    codigo                  VARCHAR(10),
    tipo                    VARCHAR(30),
    disponibilidad          BOOLEAN,
    precio                  INTEGER,
    vuelo_id                INTEGER REFERENCES "vuelos"
);

CREATE TABLE "pasajeros" (
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

CREATE TABLE "habitacion_paquete" (
    fecha_inicio            DATE,
    fecha_termino           DATE,
    paquete_id              INTEGER REFERENCES "paquetes",
    habitacion_id           INTEGER REFERENCES "habitacions"
);

CREATE TABLE "habitacion_reserva" (
    fecha_inicio            DATE,
    fecha_termino           DATE,
    reserva_id              INTEGER REFERENCES "reservas",
    habitacion_id           INTEGER REFERENCES "habitacions"
);

CREATE TABLE "metodo_pago_usuario" (
    usuario_id              INTEGER REFERENCES "usuarios",
    metodo_pago_id          INTEGER REFERENCES "metodo_pagos"
);

CREATE TABLE "paquete_reserva" (
    reserva_id              INTEGER REFERENCES "reservas",
    paquete_id              INTEGER REFERENCES "paquetes"
);

CREATE TABLE "paquete_servicio" (
    paquete_id              INTEGER REFERENCES "paquetes",
    servicio_id             INTEGER REFERENCES "servicios"
);

CREATE TABLE "paquete_vehiculo" (
    fecha_inicio            DATE,
    hora_inicio             TIME(0),
    fecha_termino           DATE,
    hora_termino            TIME(0),
    paquete_id              INTEGER REFERENCES "paquetes",
    vehiculo_id             INTEGER REFERENCES "vehiculos"
);

CREATE TABLE "pasajero_seguro" (
    pasajero_id             INTEGER REFERENCES "pasajeros",
    seguro_id               INTEGER REFERENCES "seguros"
);

CREATE TABLE "reserva_vehiculo" (
    reserva_id              INTEGER REFERENCES "reservas",
    vehiculo_id             INTEGER REFERENCES "vehiculos",
    fecha_inicio            DATE,
    hora_inicio             TIME(0),
    fecha_termino           DATE,
    hora_termino            TIME(0)
);

CREATE TABLE "reserva_vuelo"(
  reserva_id              INTEGER REFERENCES "reservas",
  vuelo_id                INTEGER REFERENCES "vuelos",
  cant_adultos            INTEGER,
  cant_ninos              INTEGER,
  cant_infantes           INTEGER
)

CREATE TABLE "rol_usuario" (
    rol_id                  INTEGER REFERENCES "rols",
    usuario_id              INTEGER REFERENCES "usuarios"
);

CREATE TABLE "aeropuerto_vuelo"(
    aeropuerto_id           INTEGER REFERENCES "aeropuertos",
    vuelo_id                INTEGER REFERENCES "vuelos"
)

INSERT INTO "aerolineas" (id, nombre) VALUES (1, 'Qatar Airways');
INSERT INTO "aerolineas" (id, nombre) VALUES (2, 'Emirates');
INSERT INTO "aerolineas" (id, nombre) VALUES (3, 'LATAM');
INSERT INTO "aerolineas" (id, nombre) VALUES (4, 'United Airlines');
INSERT INTO "aerolineas" (id, nombre) VALUES (5, 'Aeromexico');

INSERT INTO "aeropuerto_vuelo" VALUES (54, 45);
INSERT INTO "aeropuerto_vuelo" VALUES (23, 45);
INSERT INTO "aeropuerto_vuelo" VALUES (31, 25);
INSERT INTO "aeropuerto_vuelo" VALUES (16, 1);
INSERT INTO "aeropuerto_vuelo" VALUES (66, 44);


INSERT INTO "aseguradoras" (id, nombre, direccion, telefono, ciudad, pais, webpage, activo) VALUES (1, 'Mapfre', 'Isidora Goyenechea #3520', '600 700 4000', 'Las Condes', 'Chile', 'https://www.mapfre.cl/seguros-cl/', true);
INSERT INTO "aseguradoras" (id, nombre, direccion, telefono, ciudad, pais, webpage, activo) VALUES (2, 'Travel Ace Assistance', 'San Sebastián #2812', '+56 2 2495 6000', 'Las Condes', 'Chile', 'https://www.travel-ace.com/cl-la/home.html', true);
INSERT INTO "aseguradoras" (id, nombre, direccion, telefono, ciudad, pais, webpage, activo) VALUES (3, 'Assist 365', '80 S.W. 8 Th Street Suite 2000', '+54 11 5218 4207', 'Miami', 'United States', 'https://assist-365.com', true);
INSERT INTO "aseguradoras" (id, nombre, direccion, telefono, ciudad, pais, webpage, activo) VALUES (4, 'Auxilia Club Asistencia', 'Las Urbinas #68', '+56 2 2797 6107', 'Providencia', 'Chile', 'https://www.auxilia.cl/', true);
INSERT INTO "aseguradoras" (id, nombre, direccion, telefono, ciudad, pais, webpage, activo) VALUES (5, 'Assist Card', 'Andrés Bello #2299', '+56 2 2756 1005', 'Providencia', 'Chile', 'https://www.assistcard.com/cl', true);

INSERT INTO "aeropuertos" (id, nombre, ciudad, direccion, pais) VALUES (1, 'Charles de Gaulle', 'Francia', '95700 Roissy-en-France', 'Paris');
INSERT INTO "aeropuertos" (id, nombre, ciudad, direccion, pais) VALUES (2, 'Hong Kong Airport', 'Hong Kong', 'Airport Authority Hong Kong, 1 SkyPlaza Road', 'China');
INSERT INTO "aeropuertos" (id, nombre, ciudad, direccion, pais) VALUES (3, 'Heathrow Airport', 'London', 'Greater London TW6', 'Reino Unido');
INSERT INTO "aeropuertos" (id, nombre, ciudad, direccion, pais) VALUES (4, 'Haneda Airport', 'Tokyo', 'Tokyo 144-0041', 'Japon');
INSERT INTO "aeropuertos" (id, nombre, ciudad, direccion, pais) VALUES (5, 'Los Angeles Airport', 'Los Angeles', '1 World Way', 'Estados Unidos');

INSERT INTO "asientos" (id, codigo, tipo, disponibilidad, precio, vuelo_id) VALUES (1, '390', 'Economico Premium', true, 490676, 37);
INSERT INTO "asientos" (id, codigo, tipo, disponibilidad, precio, vuelo_id) VALUES (2, '497', 'Economico Premium', true, 239784, 27);
INSERT INTO "asientos" (id, codigo, tipo, disponibilidad, precio, vuelo_id) VALUES (3, '377', 'Business Premium', true, 188580, 25);
INSERT INTO "asientos" (id, codigo, tipo, disponibilidad, precio, vuelo_id) VALUES (5, '475', 'Economico', true, 177628, 3);
INSERT INTO "asientos" (id, codigo, tipo, disponibilidad, precio, vuelo_id) VALUES (6, '363', 'Business Premium', true, 285533, 5);

INSERT INTO "auditorias" VALUES (1, 'Creado usuario con correo: hruecker@example.net', 1, 1);
INSERT INTO "auditorias" VALUES (2, 'Creado usuario con correo: geovany.schmidt@example.net', 2, 1);
INSERT INTO "auditorias" VALUES (3, 'Creado usuario con correo: moen.emmy@example.net', 3, 1);
INSERT INTO "auditorias" VALUES (4, 'Creado usuario con correo: shaun.bashirian@example.com', 4, 1);
INSERT INTO "auditorias" VALUES (5, 'Creado usuario con correo: herman.carmela@example.com', 5, 1);

INSERT INTO "compania_alquilers" (id, nombre, direccion, telefono, ciudad, pais, webpage, activo) VALUES (1, 'Hertz', 'Avenida Americo Vespucio #1601', '+56 2 2360 8617', 'Quilicura', 'Chile', 'https://www.hertz.cl', true);
INSERT INTO "compania_alquilers" (id, nombre, direccion, telefono, ciudad, pais, webpage, activo) VALUES (2, 'Europcar', 'Avenida Americo Vespucio #1373', '+56 2 2598 3263', 'Pudahuel', 'Chile', 'https://www.europcar.cl', true);
INSERT INTO "compania_alquilers" (id, nombre, direccion, telefono, ciudad, pais, webpage, activo) VALUES (3, 'Avis Rent a Car', 'Luz #2934', '+56 2 2795 3916', 'Las Condes', 'Chile', 'https://www.avis.cl', true);

INSERT INTO "comprobante_pagos" (id, total_pagado, descripcion_pago, metodo_pago_id, reserva_id) VALUES (1, 651041, 'Non voluptatem iusto atque possimus quia qui. Culpa error laborum ut ducimus quae ratione et. Eum dolores cupiditate error cumque. Nam quia velit officia molestias non molestias non.', 1, 4);
INSERT INTO "comprobante_pagos" (id, total_pagado, descripcion_pago, metodo_pago_id, reserva_id) VALUES (2, 556031, 'Rem vel rerum cupiditate vel quaerat blanditiis quisquam. Dolorem velit nesciunt architecto sapiente. Fuga debitis eveniet explicabo repudiandae.', 4, 5);
INSERT INTO "comprobante_pagos" (id, total_pagado, descripcion_pago, metodo_pago_id, reserva_id) VALUES (3, 462848, 'Distinctio beatae unde sed quis est ullam. Dignissimos totam qui earum non molestiae in. Officia ducimus quae dolorem porro sed.', 3, 1);
INSERT INTO "comprobante_pagos" (id, total_pagado, descripcion_pago, metodo_pago_id, reserva_id) VALUES (4, 719368, 'Sunt sapiente odit doloremque inventore qui. Non aspernatur possimus ratione et et minima. Velit fuga ipsum consequatur sed aut maxime. Et doloremque quasi temporibus et quia delectus assumenda.', 4, 3);
INSERT INTO "comprobante_pagos" (id, total_pagado, descripcion_pago, metodo_pago_id, reserva_id) VALUES (5, 561681, 'Nemo quia omnis error quod ut odio. Et soluta dolore omnis provident. Voluptates magni consequatur et quae rem repudiandae. Dolorem incidunt modi adipisci consequatur laboriosam ad.', 3, 14);

INSERT INTO "habitacions" (id, numero, capacidad, disponibilidad, tipo_cama, categoria, precio, activo, hotel_id) VALUES (1, 101, 2, true, 'doble', 'comun', 28334, true, 1);
INSERT INTO "habitacions" (id, numero, capacidad, disponibilidad, tipo_cama, categoria, precio, activo, hotel_id) VALUES (2, 504, 4, false, 'doble', 'deluxe', 79334, true, 4);
INSERT INTO "habitacions" (id, numero, capacidad, disponibilidad, tipo_cama, categoria, precio, activo, hotel_id) VALUES (3, 302, 4, true, 'doble', 'comun', 40978, true, 7);
INSERT INTO "habitacions" (id, numero, capacidad, disponibilidad, tipo_cama, categoria, precio, activo, hotel_id) VALUES (4, 607, 2, false, 'doble', 'premium', 148320, true, 3);
INSERT INTO "habitacions" (id, numero, capacidad, disponibilidad, tipo_cama, categoria, precio, activo, hotel_id) VALUES (5, 405, 6, true, 'doble', 'comun', 127624, true, 5);

INSERT INTO "habitacion_paquete" VALUES ('2007-08-31', '2004-12-17', 53, 27);
INSERT INTO "habitacion_paquete" VALUES ('1982-11-09', '1989-07-27', 30, 42);
INSERT INTO "habitacion_paquete" VALUES ('1992-10-12', '1997-05-13', 16, 30);
INSERT INTO "habitacion_paquete" VALUES ('1993-07-25', '2007-02-06', 16, 3);
INSERT INTO "habitacion_paquete" VALUES ('1974-06-16', '1985-02-24', 25, 2);

INSERT INTO "habitacion_reserva" VALUES ('1980-10-10', '2005-08-06', 1, 16);
INSERT INTO "habitacion_reserva" VALUES ('1984-05-28', '1998-03-26', 2, 5);
INSERT INTO "habitacion_reserva" VALUES ('1991-03-13', '2017-12-12', 14, 10);
INSERT INTO "habitacion_reserva" VALUES ('1980-09-04', '2012-04-15', 11, 11);
INSERT INTO "habitacion_reserva" VALUES ('1993-12-29', '1999-07-23', 15, 50);

INSERT INTO "hotels" (id, nombre, direccion, telefono, ciudad, pais, calificacion, webpage, activo) VALUES (1, 'Park Inn by Radisson Resort', '3011 Maingate Lane', '+1 407 396 1400', 'Orlando', 'United States', 4, 'https://www.parkinn.com/orlando', true);
INSERT INTO "hotels" (id, nombre, direccion, telefono, ciudad, pais, calificacion, webpage, activo) VALUES (2, 'Wyndham Garden Lake Buena Vista', '1850 B Hotel Plaza Boulevard', '+1 407 828 4444', 'Orlando', 'United States', 5, 'http://www.wyndhamlakebuenavista.com', true);
INSERT INTO "hotels" (id, nombre, direccion, telefono, ciudad, pais, calificacion, webpage, activo) VALUES (3, 'Courtyard by Marriott', '1201 Northwest Le Jeune Road', '+1 305 642 8200', 'Miami', 'United States', 4, 'https://www.espanol.marriott.com/', true);
INSERT INTO "hotels" (id, nombre, direccion, telefono, ciudad, pais, calificacion, webpage, activo) VALUES (4, 'Conrad Miami', '1395 Brickell Avenue', '+1 305 503 6500', 'Miami', 'United States', 5, 'http://conrad.miamiallhotels.com/es/', true);
INSERT INTO "hotels" (id, nombre, direccion, telefono, ciudad, pais, calificacion, webpage, activo) VALUES (5, 'Hotel Republic San Diego', '421 West B Street', '+1 619 398 3100', 'San Diego', 'United States', 5, 'http://hotelrepublicsd.com', true);

INSERT INTO "metodo_pago_usuario" VALUES (10, 3);
INSERT INTO "metodo_pago_usuario" VALUES (11, 3);
INSERT INTO "metodo_pago_usuario" VALUES (4, 1);
INSERT INTO "metodo_pago_usuario" VALUES (9, 3);
INSERT INTO "metodo_pago_usuario" VALUES (6, 4);

INSERT INTO "metodo_pagos" (id, tipo, nombre) VALUES (1, 'Tarjeta Debito', 'WebPay');
INSERT INTO "metodo_pagos" (id, tipo, nombre) VALUES (2, 'Tarjeta Credito', 'WebPay');
INSERT INTO "metodo_pagos" (id, tipo, nombre) VALUES (3, 'Tarjeta Credito', 'Mastercard');
INSERT INTO "metodo_pagos" (id, tipo, nombre) VALUES (4, 'Tarjeta Credito', 'Visa');

INSERT INTO "paquete_reserva" VALUES (19, 52);
INSERT INTO "paquete_reserva" VALUES (19, 29);
INSERT INTO "paquete_reserva" VALUES (10, 7);
INSERT INTO "paquete_reserva" VALUES (8, 9);
INSERT INTO "paquete_reserva" VALUES (5, 19);

INSERT INTO "paquete_servicio" VALUES (2, 1);
INSERT INTO "paquete_servicio" VALUES (5, 6);
INSERT INTO "paquete_servicio" VALUES (46, 5);

INSERT INTO "paquete_vehiculo" VALUES ('1971-12-15', '06:58:20', '2012-07-10', '19:51:52', 48, 5);
INSERT INTO "paquete_vehiculo" VALUES ('1987-11-21', '14:17:56', '1987-06-23', '04:00:11', 19, 7);
INSERT INTO "paquete_vehiculo" VALUES ('2010-01-07', '01:26:55', '1985-03-19', '17:18:13', 5, 7);
INSERT INTO "paquete_vehiculo" VALUES ('2016-05-14', '21:48:20', '1975-04-14', '08:19:05', 52, 4);
INSERT INTO "paquete_vehiculo" VALUES ('1985-07-24', '03:39:08', '1982-05-03', '02:58:50', 39, 3);

INSERT INTO "pasajero_seguro" VALUES (26, 11);
INSERT INTO "pasajero_seguro" VALUES (86, 13);
INSERT INTO "pasajero_seguro" VALUES (95, 8);
INSERT INTO "pasajero_seguro" VALUES (38, 5);
INSERT INTO "pasajero_seguro" VALUES (21, 2);

INSERT INTO "paquetes" (id, pais_destino, ciudad_destino, precio, descuento, cupos, disponibilidad, posee_vehiculo, posee_hotel, posee_seguro) VALUES (1, 'Mexico', 'Cancun', 649230, 33, 50, true, false, true, false);
INSERT INTO "paquetes" (id, pais_destino, ciudad_destino, precio, descuento, cupos, disponibilidad, posee_vehiculo, posee_hotel, posee_seguro) VALUES (2, 'Republica Dominicana', 'Punta Cana', 595000, 0, 50, true, false, true, false);
INSERT INTO "paquetes" (id, pais_destino, ciudad_destino, precio, descuento, cupos, disponibilidad, posee_vehiculo, posee_hotel, posee_seguro) VALUES (3, 'Mexico', 'Riviera Maya', 947892, 0, 50, true, false, true, true);
INSERT INTO "paquetes" (id, pais_destino, ciudad_destino, precio, descuento, cupos, disponibilidad, posee_vehiculo, posee_hotel, posee_seguro) VALUES (4, 'Mexico', 'Playa del Carmen', 1014692, 0, 50, true, true, true, false);
INSERT INTO "paquetes" (id, pais_destino, ciudad_destino, precio, descuento, cupos, disponibilidad, posee_vehiculo, posee_hotel, posee_seguro) VALUES (5, 'Brasil', 'Camboriu', 530610, 0, 50, true, false, true, false);

INSERT INTO "pasajeros" (id, nombre, apellido_paterno, apellido_materno, fecha_nacimiento, telefono, correo, nacionalidad, pasaporte, asiento_id) VALUES (1, 'Noemy', 'Buckridge', 'Kutch', '2013-01-17', '754-964-4865', 'ruben24@example.com', 'Malta', '7017704014656', 246);
INSERT INTO "pasajeros" (id, nombre, apellido_paterno, apellido_materno, fecha_nacimiento, telefono, correo, nacionalidad, pasaporte, asiento_id) VALUES (2, 'Hortense', 'Sipes', 'Little', '1993-05-30', '+1.306.550.0548', 'lennie.kshlerin@example.net', 'Djibouti', '3924225394270', 249);
INSERT INTO "pasajeros" (id, nombre, apellido_paterno, apellido_materno, fecha_nacimiento, telefono, correo, nacionalidad, pasaporte, asiento_id) VALUES (3, 'Leatha', 'Dooley', 'Wisoky', '1984-07-19', '978-202-7768 x105', 'shayes@example.com', 'Norfolk Island', '6948127630141', 141);
INSERT INTO "pasajeros" (id, nombre, apellido_paterno, apellido_materno, fecha_nacimiento, telefono, correo, nacionalidad, pasaporte, asiento_id) VALUES (4, 'Johnny', 'Adams', 'Baumbach', '1973-10-14', '(764) 295-2828', 'dallin.collins@example.org', 'Svalbard & Jan Mayen Islands', '6152062964296', 302);
INSERT INTO "pasajeros" (id, nombre, apellido_paterno, apellido_materno, fecha_nacimiento, telefono, correo, nacionalidad, pasaporte, asiento_id) VALUES (5, 'Quincy', 'Luettgen', 'Kuhn', '1987-09-26', '1-993-346-5860 x6181', 'bauch.mac@example.org', 'Martinique', '7221058986754', 61);

INSERT INTO "reserva_vehiculo" VALUES ('2014-06-14', '08:09:43', '1979-07-02', '07:27:40', 7, 1);
INSERT INTO "reserva_vehiculo" VALUES ('1973-11-06', '08:50:03', '2018-02-09', '23:43:04', 5, 3);
INSERT INTO "reserva_vehiculo" VALUES ('2012-11-07', '18:21:43', '1973-02-21', '10:00:13', 5, 2);
INSERT INTO "reserva_vehiculo" VALUES ('2001-05-27', '00:46:53', '1971-05-07', '04:25:41', 12, 2);
INSERT INTO "reserva_vehiculo" VALUES ('2017-03-17', '02:19:04', '2014-12-31', '21:19:02', 20, 7);

INSERT INTO "reserva_vuelo" VALUES (4, 2, 3, 7, 96);
INSERT INTO "reserva_vuelo" VALUES (0, 7, 3, 1, 69);
INSERT INTO "reserva_vuelo" VALUES (4, 1, 3, 15, 21);
INSERT INTO "reserva_vuelo" VALUES (4, 6, 3, 5, 45);
INSERT INTO "reserva_vuelo" VALUES (0, 4, 1, 18, 1);

INSERT INTO "reservas" (id, "totalAPagar", estado_pago, usuario_id) VALUES (1, 462848, 'pagado', 10);
INSERT INTO "reservas" (id, "totalAPagar", estado_pago, usuario_id) VALUES (2, 454238, 'pagado', 7);
INSERT INTO "reservas" (id, "totalAPagar", estado_pago, usuario_id) VALUES (3, 719368, 'pagado', 11);
INSERT INTO "reservas" (id, "totalAPagar", estado_pago, usuario_id) VALUES (4, 651041, 'pagado', 18);
INSERT INTO "reservas" (id, "totalAPagar", estado_pago, usuario_id) VALUES (5, 556031, 'pagado', 14);

INSERT INTO "rol_usuario" VALUES (1, 1);
INSERT INTO "rol_usuario" VALUES (2, 1);
INSERT INTO "rol_usuario" VALUES (3, 1);
INSERT INTO "rol_usuario" VALUES (4, 1);
INSERT INTO "rol_usuario" VALUES (5, 1);

INSERT INTO "rols" (id, tipo) VALUES (1, 'usuario');
INSERT INTO "rols" (id, tipo) VALUES (2, 'premium');
INSERT INTO "rols" (id, tipo) VALUES (3, 'administrador');

INSERT INTO "seguros" (id, tipo, precio, descripcion, aseguradora_id) VALUES (1, 'Seguro vida viaje', 72000, 'Vida Viaje es un seguro especialmente diseñado para personas que viajan al extranjero y que desean tener protección médica frente a accidentes o enfermedades. Lo puedes contratar de manera individual o para tu grupo familiar. Plan Europa cumple con los requisitos obligatorios de ingreso a la Comunidad Europea (Tratado de Schengen).', 1);
INSERT INTO "seguros" (id, tipo, precio, descripcion, aseguradora_id) VALUES (2, 'Asistencia medica Value', 32990, 'Seguro de asistencia medica valido por 5 dias, el cual incluye seguro hasta $80.000 USD en caso de accidentes y enfermedad.', 2);
INSERT INTO "seguros" (id, tipo, precio, descripcion, aseguradora_id) VALUES (3, 'Asistencia medica Maximum', 47990, 'Seguro de asistencia medica valido por 5 dias, el cual incluye seguro hasta $300.000 USD en caso de accidentes y enfermedad.', 2);
INSERT INTO "seguros" (id, tipo, precio, descripcion, aseguradora_id) VALUES (4, 'Asistencia al viajero', 29990, 'Si enfermas repentinamente durante tu viaje contarás con asistencia médica las 24 Hs donde te acercamos la red de profesionales y establecimientos sanitarios estés donde estés. Contarás con asistencia Médica en caso de accidente que imposibilite la continuación normal de tu viaje, acercandote a la red de profesionales y establecimientos sanitarios para tu pronta recuperación.', 3);
INSERT INTO "seguros" (id, tipo, precio, descripcion, aseguradora_id) VALUES (5, 'Asistencia en viajes WORLD ECO', 22990, 'Ofrecemos asistencia medica por accidentes y enfermedades hasta $30.000 USD, edad maxima 75 años.', 4);

INSERT INTO "usuarios" (id, nombre, apellido_paterno, apellido_materno, password, fecha_nacimiento, direccion, telefono, correo, nacionalidad, pasaporte) VALUES (1, 'Mohammad', 'Schmeler', 'Koelpin', '$2y$10$nA69eCgwvhI.BAJQGcGEV.PF9DetjL44gok6mWj6iABYPYsHe7iEG', '2008-01-25', '2422 Lueilwitz Crest
East Rocio, FL 10546', '1-534-958-8341 x012', 'tblick@example.com', 'Ghana', '0205621603597');
INSERT INTO "usuarios" (id, nombre, apellido_paterno, apellido_materno, password, fecha_nacimiento, direccion, telefono, correo, nacionalidad, pasaporte) VALUES (2, 'Beulah', 'Shields', 'Ziemann', '$2y$10$n0HNn88VSek068B3phbOHO6CQFEzP2IUp/1ezfdLzd9PYktBBdvMC', '2014-01-24', '34920 Gulgowski Canyon
North Enricoburgh, CO 20945', '+1.943.324.2975', 'funk.gardner@example.com', 'Hong Kong', '2199369635799');
INSERT INTO "usuarios" (id, nombre, apellido_paterno, apellido_materno, password, fecha_nacimiento, direccion, telefono, correo, nacionalidad, pasaporte) VALUES (3, 'Willy', 'Ward', 'Hand', '$2y$10$HzTPG/jl6p3rW2V8DD5HFuouA2Wp.OqVqyo27K5x1o1skzZu.U5fm', '1986-08-13', '4101 Eichmann Inlet
North Jessikaberg, NJ 33303', '(820) 477-1103', 'wkessler@example.net', 'Kazakhstan', '0790850211632');
INSERT INTO "usuarios" (id, nombre, apellido_paterno, apellido_materno, password, fecha_nacimiento, direccion, telefono, correo, nacionalidad, pasaporte) VALUES (4, 'Baylee', 'Sanford', 'Kling', '$2y$10$Cv6HYKdLahxqKk5q8ByG0eSN9tbAMnAX/mumhzZAax78giTL2glS6', '1976-10-18', '3621 Considine Ways
Considinechester, ID 75869', '(640) 976-7098', 'antonetta17@example.org', 'Austria', '5935912883739');
INSERT INTO "usuarios" (id, nombre, apellido_paterno, apellido_materno, password, fecha_nacimiento, direccion, telefono, correo, nacionalidad, pasaporte) VALUES (5, 'Amiya', 'Eichmann', 'O''Conner', '$2y$10$XhufBljgUBTuNEh5XPyjOuaHGNoadR3gwikxVivH92Flj7wLEYq8K', '2013-08-13', '937 Reina Creek Apt. 333
Kennyville, MT 80839-6599', '841-763-9704 x396', 'dorris.tremblay@example.org', 'Serbia', '5823477612973');

INSERT INTO "vehiculos" (id, patente, marca, modelo, "año", precio, cantidad_asientos, tipo_transmision, descripcion, compania_alquiler_id) VALUES (1, 'CGHJ56', 'Suzuki', 'Swift', 2017, 20823, 5, 'mecanico', '', 1);
INSERT INTO "vehiculos" (id, patente, marca, modelo, "año", precio, cantidad_asientos, tipo_transmision, descripcion, compania_alquiler_id) VALUES (2, 'CDTS34', 'Hyundai', 'Grand I-20', 2016, 20823, 5, 'mecanico', '', 1);
INSERT INTO "vehiculos" (id, patente, marca, modelo, "año", precio, cantidad_asientos, tipo_transmision, descripcion, compania_alquiler_id) VALUES (3, 'DRGT57', 'Toyota', 'All New Yaris Sport', 2018, 29237, 5, 'mecanico', '', 2);
INSERT INTO "vehiculos" (id, patente, marca, modelo, "año", precio, cantidad_asientos, tipo_transmision, descripcion, compania_alquiler_id) VALUES (4, 'BSTP43', 'Hyundai', 'Accent', 2017, 29237, 5, 'mecanico', '', 2);
INSERT INTO "vehiculos" (id, patente, marca, modelo, "año", precio, cantidad_asientos, tipo_transmision, descripcion, compania_alquiler_id) VALUES (5, 'CRPR22', 'Peugeot', '208', 2017, 29237, 5, 'mecanico', '', 3);

INSERT INTO "vuelos" (id, tipo, ciudad_origen, pais_origen, codigo, ciudad_destino, pais_destino, fecha, hora, aerolinea_id) VALUES (1, 'ida', 'Considineton', 'Cambodia', '96116678', 'Ornburgh', 'Lithuania', '2019-06-10', '11:59:08', 6);
INSERT INTO "vuelos" (id, tipo, ciudad_origen, pais_origen, codigo, ciudad_destino, pais_destino, fecha, hora, aerolinea_id) VALUES (2, 'vuelta', 'Hahnshire', 'Benin', '65495230', 'Treutelmouth', 'Bouvet Island (Bouvetoya)', '2019-05-20', '15:08:50', 5);
INSERT INTO "vuelos" (id, tipo, ciudad_origen, pais_origen, codigo, ciudad_destino, pais_destino, fecha, hora, aerolinea_id) VALUES (3, 'ida', 'West Israelstad', 'Saint Helena', '90576621', 'Kuvalisburgh', 'Chad', '2019-11-11', '13:49:31', 8);
INSERT INTO "vuelos" (id, tipo, ciudad_origen, pais_origen, codigo, ciudad_destino, pais_destino, fecha, hora, aerolinea_id) VALUES (4, 'vuelta', 'Jermainville', 'Central African Republic', '28676874', 'Haagburgh', 'Palau', '2019-10-20', '19:20:08', 7);
INSERT INTO "vuelos" (id, tipo, ciudad_origen, pais_origen, codigo, ciudad_destino, pais_destino, fecha, hora, aerolinea_id) VALUES (5, 'ida', 'Penelopeland', 'Ireland', '23983717', 'Fletcherchester', 'Lao People''s Democratic Republic', '2019-10-29', '21:34:15', 5);


COMMIT;

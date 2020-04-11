/* Insercion de datos en la tabla Proveedor */

insert into proveedor(proveedor_id, proveedor_nombre) values (1, 'Mathiws');

insert into representante(representante_id, representante_nombre, representante_correo, representante_clave, representante_proveedor) values (111, 'Drucy', 'r@gmail.com', sha1('123'), 1);

INSERT INTO modelo VALUES (1,'Cuello',1900,1),(2,'Tiras Chimbas',1900,1),(3,'Moño Nuevo',2000,1),(4,'Tira Ancha',1900,1),(6,'Manga Blonda',2100,1),(7,'Malla',1900,1),(8,'Evilla ',1900,1),(9,'Triangulo #2',1900,1),(10,'Mariposa Manga',2100,1),(11,'V sisa',1900,1),(12,'V Manga',1900,1),(13,'Tiras 2',2100,1),(14,'Triangulo',2100,1),(15,'C-1',1900,1),(16,'Mariposa',1900,1),(18,'Escalera',1900,1),(19,'Flecos',1900,1),(20,'MANGA NUEVA ',2100,1),(21,'manga e',2100,1),(22,'c-2',1900,1),(23,'Cuello Malla',1900,1),(24,'Doble Malla',1900,1),(25,'malla V',1900,1),(26,'Gotica Cisa',1900,1),(27,'Gotica Manga',1900,1),(28,'Escalera Malla',1900,1);

INSERT INTO talla VALUES ('CT','Talla Crop Top'),('G','Talla Grande'),('P','Talla Pequeña');

INSERT INTO color VALUES (1,'Azul'),(2,'Negro'),(3,'Rojo'),(4,'Vinotinto'),(5,'Blanco'),(6,'Rosado'),(7,'Marfil'),(8,'Verde'),(9,'Fucsia'),(10,'Amarillo');
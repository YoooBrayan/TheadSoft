/* Insercion de datos en la tabla Proveedor */

insert into proveedor(proveedor_id, proveedor_nombre) values (1, 'Mathiws');

insert into representante(representante_id, representante_nombre, representante_correo, representante_clave, representante_proveedor) values (111, 'Drucy', 'r@gmail.com', sha1('123'), 1);
    
INSERT INTO modelo VALUES (1,'Cuello',1900,1),(2,'Tiras Chimbas',1900,1),(3,'Moño Nuevo',2000,1),(4,'Tira Ancha',1900,1),(6,'Manga Blonda',2100,1),(7,'Malla',1900,1),(8,'Evilla ',1900,1),(9,'Triangulo #2',1900,1),(10,'Mariposa Manga',2100,1),(11,'V sisa',1900,1),(12,'V Manga',1900,1),(13,'Tiras 2',2100,1),(14,'Triangulo',2100,1),(15,'C-1',1900,1),(16,'Mariposa',1900,1),(18,'Escalera',1900,1),(19,'Flecos',1900,1),(20,'MANGA NUEVA ',2100,1),(21,'manga e',2100,1),(22,'c-2',1900,1),(23,'Cuello Malla',1900,1),(24,'Doble Malla',1900,1),(25,'malla V',1900,1),(26,'Gotica Cisa',1900,1),(27,'Gotica Manga',1900,1),(28,'Escalera Malla',1900,1);

INSERT INTO talla VALUES ('CT','Talla Crop Top'),('G','Talla Grande'),('P','Talla Pequeña');

INSERT INTO color VALUES (1,'Azul'),(2,'Negro'),(3,'Rojo'),(4,'Vinotinto'),(5,'Blanco'),(6,'Rosado'),(7,'Marfil'),(8,'Verde'),(9,'Fucsia'),(10,'Amarillo');

insert into satelite(satelite_nombre, satelite_direccion) values ("Satelite 1", 'DG 18k sur # 30-34');

insert into usuario() values 
(1, 'Administrador', 'Persona que tiene acceso a todo'), 
(2, 'representante', 'Persona que tiene acceso a los servicios del proveedor'), 
(3, 'encargado', 'persona que tiene acceso a los servicios del satelite'), (4, 'Operario', 'Persona que tiene acceso a los servicios del operario');

insert into operario values (1024, 'Jessica', 3, 'j@gmail.com', sha1('123'), 1);
insert into operario values (52, 'Blanca', 4, 'b@gmail.com', sha1('123'), 1);

INSERT INTO `operacion` VALUES (1,'Cesgo Tiras',200),(2,'Falsos',50),(3,'Encaje',200),(4,'Ruedo Delantero',100),(5,'Delanteros',400),(6,'Cauchos',100),(7,'Dobladillos',150),(8,'Marquillas',100),(9,'Cerrada Laterales',150),(10,'Pegada Tiras Espalda',150),(11,'Rematada',50),(12,'Cortada Tiras',100),(13,'Cesgo Cuello',100),(14,'Pegada Malla Delantero',150),(15,'Pegada Malla Tracero',150),(16,'Hombros',50),(17,'Cesgo',100),(18,'Pegada Resorte Manga',100),(19,'Pegada Mangas',200),(20,'Cuello',150),(21,'Pegada Cuello',200),(22,'Dobladillo',100),(23,'Dobladillo Malla',100),(24,'Unida Malla Tracero',50),(25,'Volteada Cuello',50),(26,'Falso',50),(27,'Cerrada Tiras',100),(28,'Volteada Tiras',100),(29,'Ruedo Delantero ',50),(30,'Pegada Tiras',200),(31,'Caucho',100),(32,'Pegada Tiras Espalda',50),(33,'Delantero',200),(34,'Cuello',150),(35,'Pegada Malla Delantero',100),(36,'Pegada Malla Tracero',100),(37,'Fileteada Delantero ',150),(38,'Fileteada Espalda',100),(39,'puños y Volteada Ruedo',200),(40,'Empuñada',200),(41,'Cesgada Malla Espalda',100),(42,'Dobladillo Mangas',100),(43,'Cerrada Laterales',200),(44,'Unida Volteada y Despunte Malla',200),(45,'Mangas',200),(46,'Puños',100),(47,'Cuellos',150),(48,'Delanteros',100),(49,'Fileteada Malla',100),(50,'Cesgo',150),(51,'Pretina',200),(52,'Tiras Malla',100),(53,'Tiras',200),(54,'Encuellada',350),(55,'Dobladillo',50),(56,'Cesgo Tiras',50),(57,'Delanteros ',350),(58,'Falso Inferior',200),(59,'Espalda Inferior',100),(60,'Espalda Superior',100),(61,'Cesgo cisa',150),(62,'Cesgo Tiras',100),(63,'Cisa',150),(64,'Cesgo Delantero',100),(65,'Triangulo',100),(66,'Pegada Triangulo',150),(67,'Pegada Triangulo a la Tira',100),(68,'Tiras Espalda',50),(69,'Pegada Cauchos',100),(70,'Cortada Tiras',50),(71,'Pegada Delanteros',100),(72,'Pegada Espaldas',100),(73,'Cesgo Espaldas',150),(74,'Marquillas',50),(75,'Dobladillos ',200),(76,'Mariposa',100),(77,'Fileteada de Malla',200),(78,'Cesgos',300),(79,'Cabeceada',150),(80,'Cabeceada',50),(81,'Pegada de Tiras Delantero',100),(82,'Encuellada',300),(83,'Pegada de Falso',100),(84,'Refilada de Tiras',50),(85,'Despuntar',100),(86,'Volteada de Cuello',50),(87,'Volteada de Puños',50),(88,'Despunte de Delantero',150),(89,'Triangulo',300),(90,'Pegada de Boton',200),(91,'Dobladillo de Espalda',50),(92,'Ruedo Malla',50),(93,'Pegada de boton',100),(94,'Pegada de Triangulo',50),(95,'Operacion',100),(96,'Despunte de Tiras',100),(97,'Delantero Inferior',300),(98,'Delantero Superior',200),(99,'Pegada Tiras Espalda',100),(100,'Despunte de Delantero',100),(101,'Ruedo Falso',50),(102,'Cerrada de Cuello',100),(103,'Pegada de Cuello',100),(104,'Despunte de Cuello',100),(105,'Embolsada de Cuello',100),(106,'Pegada de Tiras Delantero',100),(107,'Fileteada de Delantero ',150),(108,'Pegada de Tiras Malla',150),(109,'delanteros',250),(110,'Delantero',400),(111,'CESGO MALLAS Y TIRAS',150),(112,'DELANTERO ',300),(113,'ESPALDAS ',200),(114,'cUELLOS',150),(115,'ENCUELLADA',200),(116,'CESGO DE ESPALDA',50),(117,'Pegada malla tracero',50),(118,'puños y ruedo',150),(119,'cesgo',50),(120,'pegada de tiras falso y despunte',400),(121,'pegada de malla',200),(122,'Pegada de Malla',100),(123,'Despunte de Delantero',100),(124,'Pegada de Malla Superior',100),(125,'Pegada Malla Inferior',100),(126,'Despunte de Delantero ',200),(127,'Ruedo',100),(128,'Cabeceada',100),(129,'Cortada de Mallas',50),(130,'sdfsd',0),(131,'dfsd',100),(132,'Unida de Puntas',50),(133,'Pegada Malla Delantero',200),(134,'Cesgos',300),(135,'Fileteada de Delantero',500),(136,'Puños',150),(137,'fileteada Delantero y Malla',200),(138,'unida delantero',50),(139,'despunte delantero Completo',100),(140,'tiras inferiores',100),(141,'despunte Lateral',100);

INSERT INTO `modelo_operacion` VALUES (1,2,1),(2,2,2),(3,2,3),(4,2,4),(5,2,5),(6,2,6),(7,2,7),(8,2,8),(9,2,9),(10,2,10),(11,2,11),(12,2,12),(13,2,13),(14,3,11),(15,3,14),(16,3,15),(17,3,16),(18,3,9),(19,3,17),(20,3,18),(21,3,19),(22,3,20),(23,3,21),(24,3,22),(25,3,23),(26,3,24),(28,4,9),(29,4,8),(30,4,11),(31,4,26),(32,4,27),(33,4,28),(34,4,29),(35,4,30),(36,4,31),(37,4,7),(38,4,17),(39,4,32),(40,4,33),(56,6,33),(57,6,44),(58,6,26),(59,6,45),(60,6,43),(61,6,46),(62,6,40),(63,6,22),(64,6,47),(65,6,21),(66,6,11),(68,7,32),(69,7,48),(70,7,49),(71,7,50),(72,7,51),(73,7,52),(74,7,20),(75,7,53),(76,7,54),(77,7,6),(78,7,55),(79,7,11),(80,8,34),(81,8,56),(82,8,57),(85,8,60),(86,8,37),(87,8,43),(88,8,61),(89,8,11),(90,8,2),(91,9,62),(92,9,63),(93,9,64),(94,9,65),(95,9,66),(96,9,67),(97,9,68),(98,9,69),(99,9,7),(100,9,37),(101,9,9),(102,9,70),(103,9,11),(105,10,26),(106,10,71),(107,10,72),(108,10,43),(109,10,73),(110,10,74),(112,10,34),(113,10,21),(114,10,11),(115,10,76),(116,11,16),(117,11,9),(118,11,77),(119,11,78),(120,11,74),(121,11,22),(122,11,79),(123,11,11),(124,12,16),(125,12,19),(126,12,17),(127,12,22),(128,12,80),(129,12,11),(130,12,46),(131,12,40),(132,12,43),(133,12,77),(134,13,34),(137,13,81),(138,13,82),(139,13,83),(140,13,26),(141,13,61),(142,13,62),(143,13,9),(144,13,31),(145,13,7),(146,13,11),(147,13,32),(148,13,84),(152,13,85),(154,13,86),(155,12,87),(156,12,74),(157,10,42),(158,10,32),(159,10,62),(160,14,69),(161,14,8),(162,14,37),(163,14,64),(164,14,88),(165,14,62),(166,14,34),(167,14,82),(168,14,86),(169,14,89),(170,14,32),(171,14,90),(172,14,9),(173,14,22),(174,14,91),(175,3,92),(176,3,93),(177,14,94),(178,1,31),(179,1,43),(180,1,27),(191,1,80),(192,1,85),(193,1,20),(194,1,95),(195,15,27),(196,15,28),(197,15,96),(198,15,56),(199,15,2),(200,15,6),(201,15,8),(202,15,9),(203,15,97),(204,15,98),(205,15,91),(206,15,55),(207,15,32),(208,15,11),(212,16,2),(214,16,56),(215,16,100),(216,16,101),(217,16,9),(218,16,61),(219,16,102),(221,16,22),(222,16,25),(223,16,11),(224,16,103),(225,16,104),(226,16,105),(227,16,76),(228,16,106),(229,18,32),(230,18,107),(231,18,49),(232,18,61),(233,18,56),(234,18,51),(235,18,108),(236,18,102),(237,18,27),(238,18,28),(239,18,54),(240,18,6),(241,18,55),(242,18,11),(243,18,8),(244,19,107),(245,19,6),(246,19,27),(247,19,28),(248,19,96),(249,19,91),(250,19,55),(251,19,9),(252,19,29),(253,19,100),(256,19,11),(257,19,32),(258,19,8),(259,19,110),(260,18,9),(261,20,111),(266,20,113),(267,20,114),(268,20,2),(269,20,19),(270,20,43),(271,20,46),(273,20,40),(274,20,11),(275,20,115),(276,20,22),(277,20,90),(278,6,116),(279,13,8),(280,13,90),(281,21,47),(282,21,115),(284,21,35),(285,21,117),(286,21,37),(287,21,38),(288,21,16),(289,21,45),(290,21,118),(291,21,87),(292,21,40),(293,21,22),(294,21,41),(295,21,11),(296,21,42),(297,21,43),(298,21,90),(299,22,6),(300,22,9),(301,22,27),(302,22,28),(303,22,96),(304,22,119),(305,22,120),(306,22,32),(307,22,121),(308,22,22),(309,22,91),(310,22,8),(311,22,11),(312,22,26),(313,23,122),(314,23,9),(315,23,61),(316,23,123),(317,23,102),(318,23,82),(319,23,25),(320,23,22),(321,23,11),(322,24,124),(323,24,125),(324,24,126),(325,24,9),(326,24,61),(327,24,102),(328,24,82),(329,24,86),(330,24,22),(331,24,11),(332,8,127),(333,8,7),(334,8,16),(335,8,99),(336,8,128),(337,10,90),(338,10,112),(339,10,22),(340,10,25),(341,20,112),(343,6,90),(344,4,132),(345,6,16),(346,25,133),(347,25,9),(348,25,74),(349,25,22),(350,25,11),(351,25,134),(352,25,128),(353,26,135),(354,26,9),(355,26,134),(356,26,79),(357,26,22),(358,26,11),(359,26,74),(360,27,22),(361,27,74),(362,27,135),(363,27,43),(364,27,136),(365,27,40),(366,27,19),(367,27,13),(368,27,11),(369,27,80),(370,26,16),(372,27,16),(373,28,137),(374,28,138),(375,28,9),(376,28,6),(377,28,62),(378,28,32),(379,28,112),(380,28,139),(381,28,97),(382,28,140),(383,28,141),(384,28,11),(385,28,2),(386,28,8),(387,28,7);

INSERT INTO `estado` VALUES (1,'Entregado y Pagado'),(2,'Incompleto y Pagado'),(3,'Entregado y Sin Pagar'),(4,'Incompleto y Sin Pagar')

insert into almacen(almacen_nombre) values ("Madrugon")//
insert into almacen(almacen_nombre) values ("20 de Julio")//

INSERT INTO modelo_Distribuido VALUES (1, 9);

insert into modelo_almacen(modelo_Distribuido_id, almacen_id) values (1, 1)//

insert into modelo_Distribuido_talla(modelo_Distribuido_id, talla_id, cantidad) values (1, 'G', 16), (1, 'CT', 32)//

insert into modelo_talla_color(MDT_id, color_id, cantidad) values (1, 7, 8), (1, 8, 8), (2, 2, 8), (2, 1, 8), (2, 7, 8), (2, 10, 8)//

/**********************************/

INSERT INTO modelo_Distribuido VALUES (2, 9);

insert into modelo_almacen(modelo_Distribuido_id, almacen_id) values (2, 1)//

insert into modelo_Distribuido_talla(modelo_Distribuido_id, talla_id, cantidad) values (2, 'G', 8), (2, 'CT', 16)//

insert into modelo_talla_color(MDT_id, color_id, cantidad) values (3, 7, 4), (3, 8, 4), (4, 2, 4), (4, 1, 4), (2, 7, 4), (2, 10, 4)//


/**************** Insercion de venta ****************/

insert into venta(venta_fecha) values (now());

select modelo_almacen_id from modelo_Almacen ma join modelo_distribuido md on ma.modelo_distribuido_id = md.modelo_distribuido_id where modelo_id = 9 and almacen_id = 1 limit 1;

select venta_id from venta order by venta_id desc limit 1;

insert into modelo_vendido(modelo_almacen_id, venta_id) values (1, venta_id);

select modelo_vendido_id from modelo_vendido order by modelo_vendido_id desc limit 1;

insert into modelo_venta_talla(modelo_vendido_id, talla_id) values (modeloVendidoID, talla);

select modelo_venta_talla_id from modelo_venta_talla order by modelo_venta_talla_id desc limit 1;

insert into venta_talla_Color(modelo_venta_talla_id, color_id, cantidad) values (modeloVentaTallaId, color, cantidad);
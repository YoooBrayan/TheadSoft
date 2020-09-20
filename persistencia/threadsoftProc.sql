
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `almacen` WRITE;
/*!40000 ALTER TABLE `almacen` DISABLE KEYS */;
INSERT INTO `almacen` VALUES (1,'Madrugon'),(2,'20 de Julio'),(7,'Almacen 1');
/*!40000 ALTER TABLE `almacen` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `color` WRITE;
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
INSERT INTO `color` VALUES (1,'Azul'),(2,'Negro'),(3,'Rojo'),(4,'Vinotinto'),(5,'Blanco'),(6,'Rosado'),(7,'Marfil'),(8,'Verde'),(9,'Fucsia'),(10,'Amarillo');
/*!40000 ALTER TABLE `color` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `corte` WRITE;
/*!40000 ALTER TABLE `corte` DISABLE KEYS */;
INSERT INTO `corte` VALUES (4,'2020-07-21','2020-07-30','ghjkl',111,2,NULL),(5,'2020-07-15','2020-07-29','fghjk',111,4,NULL),(6,'2020-07-15','2020-07-29','',111,8,NULL),(16,'2020-07-28','2020-08-04','',111,39,1),(17,'2020-07-28','2020-08-04','',111,40,1),(18,'2020-07-28','2020-08-04','',111,41,1),(19,'2020-07-28','2020-08-04','',111,42,1),(20,'2020-08-07','2020-08-21','',111,4,1),(21,'2020-08-07','2020-08-21','',111,9,1),(22,'2020-08-08','2020-08-15','asdasd',111,14,1),(23,'2020-08-09','2020-08-10','',111,4,NULL),(24,'2020-08-03','2020-08-10','',111,6,1),(25,'2020-08-03','2020-08-10','',111,27,1),(26,'2020-08-03','2020-08-10','',111,20,1),(27,'2020-08-10','2020-08-17','',111,34,1),(28,'2020-08-23','2020-08-30','',111,22,1),(29,'2020-08-23','2020-08-30','',111,30,1),(30,'2020-09-01','2020-09-07','',111,30,1),(32,'2020-09-01','2020-09-07','',111,28,1),(33,'2020-09-01','2020-09-06','',111,25,1);
/*!40000 ALTER TABLE `corte` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `corte_entregado_bodega` WRITE;
/*!40000 ALTER TABLE `corte_entregado_bodega` DISABLE KEYS */;
INSERT INTO `corte_entregado_bodega` VALUES (17,'2020-08-08','2020-08-08',1,NULL),(21,'2020-08-08','2020-08-08',1,NULL),(22,'2020-08-08',NULL,3,NULL);
/*!40000 ALTER TABLE `corte_entregado_bodega` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `corte_pendiente_bodega` WRITE;
/*!40000 ALTER TABLE `corte_pendiente_bodega` DISABLE KEYS */;
/*!40000 ALTER TABLE `corte_pendiente_bodega` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `corte_talla` WRITE;
/*!40000 ALTER TABLE `corte_talla` DISABLE KEYS */;
INSERT INTO `corte_talla` VALUES (155,16,'G',89),(156,17,'G',89),(157,18,'CT',44),(158,19,'CT',89),(159,19,'G',89),(160,20,'CT',43),(161,20,'G',43),(162,21,'G',5),(163,22,'CT',6),(164,23,'G',45),(165,24,'G',122),(166,25,'G',74),(167,26,'G',122),(168,27,'CT',333),(169,28,'G',122),(170,28,'P',122),(171,29,'G',122),(172,30,'P',122),(175,32,'CT',122),(176,33,'G',122),(177,33,'P',122);
/*!40000 ALTER TABLE `corte_talla` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `corte_talla_color` WRITE;
/*!40000 ALTER TABLE `corte_talla_color` DISABLE KEYS */;
INSERT INTO `corte_talla_color` VALUES (1,160,1,39),(2,160,2,4),(3,161,1,39),(4,161,2,4),(5,162,1,3),(6,162,2,2),(7,163,1,2),(8,163,2,2),(9,163,3,2),(10,164,3,25),(11,164,9,20);
/*!40000 ALTER TABLE `corte_talla_color` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'Entregado y Pagado'),(2,'Incompleto y Pagado'),(3,'Entregado y Sin Pagar'),(4,'Incompleto y Sin Pagar');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `insumo_bodega` WRITE;
/*!40000 ALTER TABLE `insumo_bodega` DISABLE KEYS */;
/*!40000 ALTER TABLE `insumo_bodega` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `modelo` WRITE;
/*!40000 ALTER TABLE `modelo` DISABLE KEYS */;
INSERT INTO `modelo` VALUES (1,'Cuello',1900,1),(2,'Tiras Chimbas',1900,1),(3,'Moño Nuevo',2000,1),(4,'Tira Ancha',1900,1),(6,'Manga Blonda',2100,1),(7,'Malla',1900,1),(8,'Evilla ',1900,1),(9,'Triangulo 2',1900,1),(10,'Mariposa Manga',2100,1),(11,'V sisa',1900,1),(12,'V Manga',1900,1),(13,'Tiras 2',2100,1),(14,'Triangulo',2100,1),(15,'C-1',1900,1),(16,'Mariposa',1900,1),(18,'Escalera',1900,1),(19,'Flecos',1900,1),(20,'MANGA NUEVA ',2100,1),(21,'manga e',2100,1),(22,'c-2',1900,1),(23,'Cuello Malla',1900,1),(24,'Doble Malla',1900,1),(25,'malla V',1900,1),(26,'Gotica Cisa',1900,1),(27,'Gotica Manga',1900,1),(28,'Escalera Malla',1900,1),(29,'Evilla pretina',1900,1),(30,'cola de pato',1900,1),(31,'Replay',2100,1),(32,'Solo Malla',1000,1),(33,'Bolero',2100,1),(34,'Flecos Tiras',1000,1),(35,'Body top',1900,1),(36,'Body Tetas',1900,1),(37,'Blusa Cuello',1900,1),(38,'Blusa Cesgo',1900,1),(39,'Body Cuello',1900,1),(40,'Body Cesgo',1900,1),(41,'Blusa Falso Malla',1900,1),(42,'Blusa Falso',1900,1),(71,'nuevo modelo',222,1),(72,'mmm',123,1),(73,'modelo nuevo',1111,1),(111,'Modelo Nuevo 2',4444,1);
/*!40000 ALTER TABLE `modelo` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `modelo_almacen` WRITE;
/*!40000 ALTER TABLE `modelo_almacen` DISABLE KEYS */;
INSERT INTO `modelo_almacen` VALUES (31,1,1),(32,2,1),(33,3,2),(34,4,1),(35,5,1),(36,6,2),(37,7,1),(38,8,1);
/*!40000 ALTER TABLE `modelo_almacen` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `modelo_distribuido` WRITE;
/*!40000 ALTER TABLE `modelo_distribuido` DISABLE KEYS */;
INSERT INTO `modelo_distribuido` VALUES (1,3),(2,3),(3,3),(4,3),(5,3),(7,3),(6,4),(8,14);
/*!40000 ALTER TABLE `modelo_distribuido` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `modelo_distribuido_talla` WRITE;
/*!40000 ALTER TABLE `modelo_distribuido_talla` DISABLE KEYS */;
INSERT INTO `modelo_distribuido_talla` VALUES (48,1,'CT',15),(49,1,'G',15),(50,1,'P',15),(51,3,'CT',7),(52,3,'G',7),(53,3,'P',6),(54,4,'CT',2),(55,4,'G',3),(56,4,'P',2),(57,5,'CT',3),(58,5,'G',3),(59,5,'P',3),(60,6,'CT',5),(61,6,'G',5),(62,7,'CT',3),(63,7,'G',3),(64,7,'P',3),(65,8,'CT',6);
/*!40000 ALTER TABLE `modelo_distribuido_talla` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `modelo_operacion` WRITE;
/*!40000 ALTER TABLE `modelo_operacion` DISABLE KEYS */;
INSERT INTO `modelo_operacion` VALUES (1,2,1),(2,2,2),(3,2,3),(4,2,4),(5,2,5),(6,2,6),(7,2,7),(8,2,8),(9,2,9),(10,2,10),(11,2,11),(12,2,12),(13,2,13),(14,3,11),(15,3,14),(16,3,15),(17,3,16),(18,3,9),(19,3,17),(20,3,18),(21,3,19),(22,3,20),(23,3,21),(24,3,22),(25,3,23),(26,3,24),(28,4,9),(29,4,8),(30,4,11),(31,4,26),(32,4,27),(33,4,28),(34,4,29),(35,4,30),(36,4,31),(37,4,7),(38,4,17),(39,4,32),(40,4,33),(56,6,33),(57,6,44),(58,6,26),(59,6,45),(60,6,43),(61,6,46),(62,6,40),(63,6,22),(64,6,47),(65,6,21),(66,6,11),(68,7,32),(69,7,48),(70,7,49),(71,7,50),(72,7,51),(73,7,52),(74,7,20),(75,7,53),(76,7,54),(77,7,6),(78,7,55),(79,7,11),(80,8,34),(81,8,56),(82,8,57),(85,8,60),(86,8,37),(87,8,43),(88,8,61),(89,8,11),(90,8,2),(91,9,62),(92,9,63),(93,9,64),(94,9,65),(95,9,66),(96,9,67),(97,9,68),(98,9,69),(99,9,7),(100,9,37),(101,9,9),(102,9,70),(103,9,11),(105,10,26),(106,10,71),(107,10,72),(108,10,43),(109,10,73),(110,10,74),(112,10,34),(113,10,21),(114,10,11),(115,10,76),(116,11,16),(117,11,9),(118,11,77),(119,11,78),(120,11,74),(121,11,22),(122,11,79),(123,11,11),(124,12,16),(125,12,19),(126,12,17),(127,12,22),(128,12,80),(129,12,11),(130,12,46),(131,12,40),(132,12,43),(133,12,77),(134,13,34),(137,13,81),(138,13,82),(139,13,83),(140,13,26),(141,13,61),(142,13,62),(143,13,9),(144,13,31),(145,13,7),(146,13,11),(147,13,32),(148,13,84),(152,13,85),(154,13,86),(155,12,87),(156,12,74),(157,10,42),(158,10,32),(159,10,62),(160,14,69),(161,14,8),(162,14,37),(163,14,64),(164,14,88),(165,14,62),(166,14,34),(167,14,82),(168,14,86),(169,14,89),(170,14,32),(171,14,90),(172,14,9),(173,14,22),(174,14,91),(175,3,92),(176,3,93),(177,14,94),(178,1,31),(179,1,43),(180,1,27),(191,1,80),(192,1,85),(193,1,20),(194,1,95),(195,15,27),(196,15,28),(197,15,96),(198,15,56),(199,15,2),(200,15,6),(201,15,8),(202,15,9),(203,15,97),(204,15,98),(205,15,91),(206,15,55),(207,15,32),(208,15,11),(214,16,56),(215,16,100),(216,16,101),(217,16,9),(218,16,61),(219,16,102),(221,16,22),(222,16,25),(223,16,11),(224,16,103),(225,16,104),(226,16,105),(227,16,76),(228,16,106),(229,18,32),(230,18,107),(231,18,49),(232,18,61),(233,18,56),(234,18,51),(235,18,108),(236,18,102),(237,18,27),(238,18,28),(239,18,54),(240,18,6),(241,18,55),(242,18,11),(243,18,8),(244,19,107),(245,19,6),(246,19,27),(247,19,28),(248,19,96),(249,19,91),(250,19,55),(251,19,9),(252,19,29),(253,19,100),(256,19,11),(257,19,32),(258,19,8),(259,19,110),(260,18,9),(261,20,111),(266,20,113),(267,20,114),(268,20,2),(269,20,19),(270,20,43),(271,20,46),(273,20,40),(274,20,11),(275,20,115),(276,20,22),(277,20,90),(278,6,116),(279,13,8),(280,13,90),(281,21,47),(282,21,115),(284,21,35),(285,21,117),(286,21,37),(287,21,38),(288,21,16),(289,21,45),(290,21,118),(291,21,87),(292,21,40),(293,21,22),(294,21,41),(295,21,11),(296,21,42),(297,21,43),(298,21,90),(299,22,6),(300,22,9),(301,22,27),(302,22,28),(303,22,96),(304,22,119),(305,22,120),(306,22,32),(307,22,121),(308,22,22),(309,22,91),(310,22,8),(311,22,11),(312,22,26),(313,23,122),(314,23,9),(315,23,61),(316,23,123),(317,23,102),(318,23,82),(319,23,25),(320,23,22),(321,23,11),(322,24,124),(323,24,125),(324,24,126),(325,24,9),(326,24,61),(327,24,102),(329,24,86),(330,24,22),(331,24,11),(332,8,127),(333,8,7),(334,8,16),(335,8,99),(336,8,128),(337,10,90),(338,10,112),(339,10,22),(340,10,25),(341,20,112),(343,6,90),(344,4,132),(345,6,16),(346,25,133),(347,25,9),(348,25,74),(349,25,22),(350,25,11),(351,25,134),(352,25,128),(353,26,135),(354,26,9),(355,26,134),(356,26,79),(357,26,22),(358,26,11),(359,26,74),(360,27,22),(361,27,74),(362,27,135),(363,27,43),(365,27,40),(366,27,19),(367,27,13),(368,27,11),(369,27,80),(370,26,16),(372,27,16),(373,28,137),(374,28,138),(375,28,9),(376,28,6),(377,28,62),(378,28,32),(379,28,112),(381,28,97),(382,28,140),(383,28,141),(384,28,11),(385,28,2),(386,28,8),(387,28,7),(388,16,83),(389,28,142),(390,28,143),(391,29,112),(392,29,144),(393,29,69),(394,29,8),(395,29,9),(396,29,51),(397,29,91),(398,29,145),(399,29,61),(400,29,146),(401,29,32),(402,29,11),(403,29,56),(404,6,87),(406,20,16),(407,20,87),(408,24,103),(409,24,105),(410,24,104),(411,27,46),(412,27,87),(413,30,9),(414,30,147),(415,30,145),(416,30,22),(417,30,11),(418,30,6),(419,30,148),(420,30,149),(421,31,20),(422,31,22),(423,31,9),(424,31,150),(425,31,151),(426,31,115),(427,31,152),(428,31,153),(429,31,11),(430,31,90),(431,32,16),(432,32,19),(433,32,43),(434,32,80),(435,32,42),(436,32,22),(437,32,17),(438,32,74),(439,32,11),(440,33,11),(441,33,20),(442,33,74),(443,33,22),(444,33,154),(445,33,155),(446,33,9),(447,33,156),(448,33,157),(449,33,115),(450,33,158),(451,33,159),(452,33,160),(453,33,161),(454,33,90),(455,33,25),(457,34,163),(458,34,164),(459,34,165),(460,34,11),(461,35,16),(462,35,45),(463,35,43),(464,35,46),(465,35,166),(466,35,13),(467,35,80),(468,35,167),(469,35,168),(470,35,169),(471,35,99),(473,35,171),(474,35,172),(475,35,173),(476,35,174),(477,36,175),(478,36,176),(479,36,177),(480,36,166),(481,36,178),(482,36,9),(483,36,173),(484,36,174),(485,36,179),(486,36,32),(487,36,180),(488,36,11),(489,37,16),(490,37,19),(491,37,43),(492,37,181),(493,37,42),(494,37,22),(495,37,182),(496,37,74),(497,37,183),(498,38,16),(499,38,19),(500,38,43),(501,38,42),(502,38,22),(503,38,17),(504,38,80),(505,38,11),(506,38,74),(507,37,11),(508,38,181),(509,39,16),(510,39,19),(511,39,43),(512,39,11),(513,39,74),(514,39,182),(515,39,183),(516,39,181),(517,39,42),(518,39,7),(519,39,174),(520,40,16),(521,40,19),(522,40,43),(523,40,11),(524,40,74),(525,40,174),(526,40,42),(527,40,7),(528,40,17),(529,40,80),(530,40,181),(531,41,74),(532,41,11),(533,41,16),(534,41,50),(535,41,33),(536,41,181),(537,41,19),(538,41,18),(539,41,43),(540,41,22),(541,42,22),(542,42,42),(543,42,74),(544,42,11),(545,42,16),(546,42,50),(547,42,33),(548,42,19),(549,42,43),(550,42,181);
/*!40000 ALTER TABLE `modelo_operacion` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `modelo_talla_color` WRITE;
/*!40000 ALTER TABLE `modelo_talla_color` DISABLE KEYS */;
INSERT INTO `modelo_talla_color` VALUES (7,48,1,5),(8,48,4,5),(9,48,8,5),(10,49,1,5),(11,49,4,5),(12,49,8,5),(13,50,1,5),(14,50,4,5),(15,50,8,5),(16,51,1,3),(17,51,4,3),(18,51,8,1),(19,52,1,3),(20,52,4,3),(21,52,8,1),(22,53,1,2),(23,53,4,2),(24,53,8,2),(25,54,8,2),(26,55,4,1),(27,55,8,2),(28,56,1,2),(29,57,1,1),(30,57,4,1),(31,57,8,1),(32,58,1,1),(33,58,4,1),(34,58,8,1),(35,59,1,1),(36,59,4,1),(37,59,8,1),(38,60,9,5),(39,61,9,5),(40,62,1,1),(41,62,4,1),(42,62,8,1),(43,63,1,1),(44,63,4,1),(45,63,8,1),(46,64,4,2),(47,64,8,1);
/*!40000 ALTER TABLE `modelo_talla_color` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `modelo_vendido` WRITE;
/*!40000 ALTER TABLE `modelo_vendido` DISABLE KEYS */;
INSERT INTO `modelo_vendido` VALUES (21,31,18),(22,31,19),(23,31,20),(24,31,22),(25,31,23),(26,31,24),(27,38,24);
/*!40000 ALTER TABLE `modelo_vendido` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `modelo_venta_talla` WRITE;
/*!40000 ALTER TABLE `modelo_venta_talla` DISABLE KEYS */;
INSERT INTO `modelo_venta_talla` VALUES (28,21,'CT'),(29,21,'P'),(30,22,'CT'),(31,22,'G'),(32,22,'P'),(33,23,'CT'),(34,23,'G'),(35,23,'P'),(36,24,'CT'),(37,25,'G'),(38,25,'P'),(39,26,'G'),(40,26,'CT'),(41,27,'CT');
/*!40000 ALTER TABLE `modelo_venta_talla` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `operacion` WRITE;
/*!40000 ALTER TABLE `operacion` DISABLE KEYS */;
INSERT INTO `operacion` VALUES (1,'Cesgo Tiras',200),(2,'Falsos',50),(3,'Encaje',200),(4,'Ruedo Delantero',100),(5,'Delanteros',400),(6,'Cauchos',100),(7,'Dobladillos',150),(8,'Marquillas',100),(9,'Cerrada Laterales',150),(10,'Pegada Tiras Espalda',150),(11,'Rematada',50),(12,'Cortada Tiras',100),(13,'Cesgo Cuello',100),(14,'Pegada Malla Delantero',150),(15,'Pegada Malla Tracero',150),(16,'Hombros',50),(17,'Cesgo',100),(18,'Pegada Resorte Manga',100),(19,'Pegada Mangas',200),(20,'Cuello',150),(21,'Pegada Cuello',200),(22,'Dobladillo',100),(23,'Dobladillo Malla',100),(24,'Unida Malla Tracero',50),(25,'Volteada Cuello',50),(26,'Falso',50),(27,'Cerrada Tiras',100),(28,'Volteada Tiras',100),(29,'Ruedo Delantero ',50),(30,'Pegada Tiras',200),(31,'Caucho',100),(32,'Pegada Tiras Espalda',50),(33,'Delantero',200),(34,'Cuello',150),(35,'Pegada Malla Delantero',100),(36,'Pegada Malla Tracero',100),(37,'Fileteada Delantero ',150),(38,'Fileteada Espalda',100),(39,'puños y Volteada Ruedo',200),(40,'Empuñada',200),(41,'Cesgada Malla Espalda',100),(42,'Dobladillo Mangas',100),(43,'Cerrada Laterales',200),(44,'Unida Volteada y Despunte Malla',200),(45,'Mangas',200),(46,'Puños',100),(47,'Cuellos',150),(48,'Delanteros',100),(49,'Fileteada Malla',100),(50,'Cesgo',150),(51,'Pretina',200),(52,'Tiras Malla',100),(53,'Tiras',200),(54,'Encuellada',350),(55,'Dobladillo',50),(56,'Cesgo Tiras',50),(57,'Delanteros ',350),(58,'Falso Inferior',200),(59,'Espalda Inferior',100),(60,'Espalda Superior',100),(61,'Cesgo cisa',150),(62,'Cesgo Tiras',100),(63,'Cisa',150),(64,'Cesgo Delantero',100),(65,'Triangulo',100),(66,'Pegada Triangulo',150),(67,'Pegada Triangulo a la Tira',100),(68,'Tiras Espalda',50),(69,'Pegada Cauchos',100),(70,'Cortada Tiras',50),(71,'Pegada Delanteros',100),(72,'Pegada Espaldas',100),(73,'Cesgo Espaldas',150),(74,'Marquillas',50),(75,'Dobladillos ',200),(76,'Mariposa',100),(77,'Fileteada de Malla',200),(78,'Cesgos',300),(79,'Cabeceada',150),(80,'Cabeceada',50),(81,'Pegada de Tiras Delantero',100),(82,'Encuellada',300),(83,'Pegada de Falso',100),(84,'Refilada de Tiras',50),(85,'Despuntar',100),(86,'Volteada de Cuello',50),(87,'Volteada de Puños',50),(88,'Despunte de Delantero',150),(89,'Triangulo',300),(90,'Pegada de Boton',200),(91,'Dobladillo de Espalda',50),(92,'Ruedo Malla',50),(93,'Pegada de boton',100),(94,'Pegada de Triangulo',50),(95,'Operacion',100),(96,'Despunte de Tiras',100),(97,'Delantero Inferior',300),(98,'Delantero Superior',200),(99,'Pegada Tiras Espalda',100),(100,'Despunte de Delantero',100),(101,'Ruedo Falso',50),(102,'Cerrada de Cuello',100),(103,'Pegada de Cuello',100),(104,'Despunte de Cuello',100),(105,'Embolsada de Cuello',100),(106,'Pegada de Tiras Delantero',100),(107,'Fileteada de Delantero ',150),(108,'Pegada de Tiras Malla',150),(109,'delanteros',250),(110,'Delantero',400),(111,'CESGO MALLAS Y TIRAS',150),(112,'DELANTERO ',300),(113,'ESPALDAS ',200),(114,'Cuellos',150),(115,'ENCUELLADA',200),(116,'CESGO DE ESPALDA',50),(117,'Pegada malla tracero',50),(118,'puños y ruedo',150),(119,'cesgo',50),(120,'pegada de tiras falso y despunte',400),(121,'pegada de malla',200),(122,'Pegada de Malla',100),(123,'Despunte de Delantero',100),(124,'Pegada de Malla Superior',100),(125,'Pegada Malla Inferior',100),(126,'Despunte de Delantero ',200),(127,'Ruedo',100),(128,'Cabeceada',100),(129,'Cortada de Mallas',50),(132,'Unida de Puntas',50),(133,'Pegada Malla Delantero',200),(134,'Cesgos',300),(135,'Fileteada de Delantero',500),(136,'Puños',150),(137,'fileteada Delantero y Malla',200),(138,'unida delantero',50),(139,'despunte delantero Completo',100),(140,'tiras inferiores',100),(141,'despunte Lateral',100),(142,'Despunte Delantero',50),(143,'Despunte Mitad',50),(144,'Evilla',50),(145,'Ruedo de Falso',100),(146,'Despunte',50),(147,'cesgos tiras',100),(148,'pegada de malla y falso',400),(149,'despunte',200),(150,'Cesgo cisa',200),(151,'Cesgo espalda',50),(152,'delantero inferior',300),(153,'delantero superior',300),(154,'Dobladillo Espalda',100),(155,'Cesgo cisa',100),(156,'Fileteada de Delantero ',100),(157,'Cesgo Malla',100),(158,'Pegada Malla y Bolero',150),(159,'Pegada de Bolero y Espalda',100),(160,'Cortada y Pegada de Caucho',150),(161,'unida de Bolero',100),(162,'Cesgo hueco',50),(163,'Cesgo',550),(164,'Ruedo',100),(165,'Pegada de Flecos',100),(166,'Pegada Calzon',100),(167,'Fileteada top',100),(168,'Pegada pretina',150),(169,'Cesgo top',200),(170,'Rematada',100),(171,'Rematada Body',50),(172,'Rematada Top',50),(173,'Dobladillo Calzon',150),(174,'Pegada Gancho',100),(175,'Despunte tetas',100),(176,'Fileteada Tetas',200),(177,'Filete Calzon',50),(178,'Unida Tetas y Calzon',100),(179,'Cesgo',200),(180,'Pegada Tiras Delantero',150),(181,'Prences Mangas',200),(182,'Pegada de Cuello',150),(183,'Cerrada de Cuello',50);
/*!40000 ALTER TABLE `operacion` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `operario` WRITE;
/*!40000 ALTER TABLE `operario` DISABLE KEYS */;
INSERT INTO `operario` VALUES (44,'Operario44',4,'4@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef',2),(52,'Blanca',3,'b@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef',1),(123,'Enrique',4,'e@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef',1),(1024,'Jessica',3,'j@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef',1),(2000,'Samaris',4,'samarias@hotmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef',1),(2099,'paola',4,'jesi@hotmail.com','0472d6252c3da5d4ab0409b41766ed978a179e7f',1),(1024589319,'Brayan',4,'brayanguitar000@gmail.com','fc6621793d7eda86d65fddedf290e26085403c31',1);
/*!40000 ALTER TABLE `operario` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` VALUES (1,'Mathiws');
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `representante` WRITE;
/*!40000 ALTER TABLE `representante` DISABLE KEYS */;
INSERT INTO `representante` VALUES (111,'Drucy',2,'40bd001563085fc35165329ea1ff5c5ecbdbbeef',1,'r@gmail.com');
/*!40000 ALTER TABLE `representante` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `satelite` WRITE;
/*!40000 ALTER TABLE `satelite` DISABLE KEYS */;
INSERT INTO `satelite` VALUES (1,'Satelite 1','DG 18k sur # 30-34'),(2,'Satelite 2','asdasd');
/*!40000 ALTER TABLE `satelite` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `talla` WRITE;
/*!40000 ALTER TABLE `talla` DISABLE KEYS */;
INSERT INTO `talla` VALUES ('CT','Talla Crop Top'),('G','Talla Grande'),('P','Talla Pequeña');
/*!40000 ALTER TABLE `talla` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `tarea` WRITE;
/*!40000 ALTER TABLE `tarea` DISABLE KEYS */;
INSERT INTO `tarea` VALUES (318,4,1),(319,4,2),(320,4,3),(321,4,4),(322,4,5),(323,4,6),(324,4,7),(325,4,8),(326,4,9),(327,4,10),(328,4,11),(329,4,12),(330,4,13),(333,5,9),(334,5,8),(335,5,11),(336,5,26),(337,5,27),(338,5,28),(339,5,29),(340,5,30),(341,5,31),(342,5,7),(343,5,17),(344,5,32),(345,5,33),(346,5,132),(348,6,34),(349,6,56),(350,6,57),(351,6,60),(352,6,37),(353,6,43),(354,6,61),(355,6,11),(356,6,2),(357,6,127),(358,6,7),(359,6,16),(360,6,99),(361,6,128),(496,16,16),(497,16,19),(498,16,43),(499,16,11),(500,16,74),(501,16,182),(502,16,183),(503,16,181),(504,16,42),(505,16,7),(506,16,174),(511,17,16),(512,17,19),(513,17,43),(514,17,11),(515,17,74),(516,17,174),(517,17,42),(518,17,7),(519,17,17),(520,17,80),(521,17,181),(526,18,74),(527,18,11),(528,18,16),(529,18,50),(530,18,33),(531,18,181),(532,18,19),(533,18,18),(534,18,43),(535,18,22),(541,19,22),(542,19,42),(543,19,74),(544,19,11),(545,19,16),(546,19,50),(547,19,33),(548,19,19),(549,19,43),(550,19,181),(551,20,9),(552,20,8),(553,20,11),(554,20,26),(555,20,27),(556,20,28),(557,20,29),(558,20,30),(559,20,31),(560,20,7),(561,20,17),(562,20,32),(563,20,33),(564,20,132),(566,21,62),(567,21,63),(568,21,64),(569,21,65),(570,21,66),(571,21,67),(572,21,68),(573,21,69),(574,21,7),(575,21,37),(576,21,9),(577,21,70),(578,21,11),(581,22,69),(582,22,8),(583,22,37),(584,22,64),(585,22,88),(586,22,62),(587,22,34),(588,22,82),(589,22,86),(590,22,89),(591,22,32),(592,22,90),(593,22,9),(594,22,22),(595,22,91),(596,22,94),(612,23,9),(613,23,8),(614,23,11),(615,23,26),(616,23,27),(617,23,28),(618,23,29),(619,23,30),(620,23,31),(621,23,7),(622,23,17),(623,23,32),(624,23,33),(625,23,132),(626,24,33),(627,24,44),(628,24,26),(629,24,45),(630,24,43),(631,24,46),(632,24,40),(633,24,22),(634,24,47),(635,24,21),(636,24,11),(637,24,116),(638,24,90),(639,24,16),(640,24,87),(641,25,22),(642,25,74),(643,25,135),(644,25,43),(645,25,40),(646,25,19),(647,25,13),(648,25,11),(649,25,80),(650,25,16),(651,25,46),(652,25,87),(656,26,111),(657,26,113),(658,26,114),(659,26,2),(660,26,19),(661,26,43),(662,26,46),(663,26,40),(664,26,11),(665,26,115),(666,26,22),(667,26,90),(668,26,112),(669,26,16),(670,26,87),(671,27,163),(672,27,164),(673,27,165),(674,27,11),(675,28,6),(676,28,9),(677,28,27),(678,28,28),(679,28,96),(680,28,119),(681,28,120),(682,28,32),(683,28,121),(684,28,22),(685,28,91),(686,28,8),(687,28,11),(688,28,26),(690,29,9),(691,29,147),(692,29,145),(693,29,22),(694,29,11),(695,29,6),(696,29,148),(697,29,149),(698,30,9),(699,30,147),(700,30,145),(701,30,22),(702,30,11),(703,30,6),(704,30,148),(705,30,149),(728,32,137),(729,32,138),(730,32,9),(731,32,6),(732,32,62),(733,32,32),(734,32,112),(735,32,97),(736,32,140),(737,32,141),(738,32,11),(739,32,2),(740,32,8),(741,32,7),(742,32,142),(743,32,143),(759,33,133),(760,33,9),(761,33,74),(762,33,22),(763,33,11),(764,33,134),(765,33,128);
/*!40000 ALTER TABLE `tarea` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `tarea_operario` WRITE;
/*!40000 ALTER TABLE `tarea_operario` DISABLE KEYS */;
INSERT INTO `tarea_operario` VALUES (83,529,52,44),(84,534,123,44),(85,527,123,44),(86,530,1024,44),(87,526,1024,44),(88,528,1024,44),(89,531,1024,44),(90,532,1024,44),(91,533,123,44),(92,535,1024589319,44),(93,497,52,89),(94,501,52,23),(95,501,1024,66),(96,503,1024,89),(97,496,123,89),(98,498,123,89),(99,500,123,89),(100,502,123,89),(101,499,123,89),(102,506,1024,89),(103,504,1024589319,89),(104,505,1024589319,89),(117,543,52,178),(118,545,52,178),(119,546,52,74),(120,546,1024,104),(121,547,1024,178),(122,550,1024,178),(123,548,1024,96),(124,548,52,82),(125,544,52,178),(126,549,123,178),(127,541,1024589319,178),(128,542,1024589319,178),(129,519,52,89),(130,512,52,89),(131,511,123,89),(132,513,123,89),(133,515,123,89),(134,520,123,89),(135,521,1024,89),(136,514,1024,89),(137,516,1024,89),(138,517,1024589319,89),(139,518,1024589319,89),(140,551,52,86),(141,552,52,86),(142,560,52,86),(143,558,52,86),(144,562,52,86),(145,561,2099,86),(146,593,52,6),(148,563,52,86),(152,555,1024589319,86),(153,559,1024,86),(154,553,1024,86),(155,554,1024589319,86),(156,643,52,74),(157,649,52,74),(158,650,52,74),(159,646,52,74),(160,644,52,74),(161,647,52,74),(162,645,52,74),(163,651,123,74),(164,642,123,74),(165,648,123,74),(166,652,52,74),(167,641,1024589319,74),(168,656,52,122),(169,664,52,122),(170,669,123,122),(171,661,123,122),(172,662,123,122),(173,663,123,122),(174,670,52,122),(175,668,1024,122),(176,657,1024,122),(177,665,1024,122),(178,667,2000,122),(179,660,123,122),(180,658,1024589319,122),(181,666,1024589319,122),(182,637,52,122),(183,636,2000,46),(184,636,52,76),(185,639,123,122),(186,630,123,122),(187,629,123,122),(188,631,123,122),(189,632,123,122),(190,640,52,122),(191,626,1024,122),(192,627,1024,122),(193,635,1024,122),(194,638,2000,122),(195,633,1024589319,122),(196,634,1024589319,122),(197,671,52,333),(198,672,123,333),(199,673,52,333),(200,674,52,333),(201,690,52,122),(202,695,52,122),(203,694,123,122),(204,693,52,122),(205,691,1024,122),(206,696,1024,122),(207,697,1024,122),(208,675,52,244),(209,679,52,244),(210,676,123,244),(211,677,123,244),(212,683,123,244),(213,678,123,244),(214,680,1024,244),(215,681,1024,244),(216,682,1024,244),(217,686,52,244),(218,687,1024,244),(219,684,1024589319,244),(220,685,1024589319,244),(221,732,52,122),(222,734,52,122),(223,742,52,122),(224,730,123,122),(225,729,123,122),(226,738,123,122),(227,728,123,122),(228,735,1024,122),(229,743,1024,122),(230,737,1024,122),(231,736,1024,122),(232,733,1024,122),(233,731,1024589319,122),(234,741,1024589319,122),(235,740,1024589319,122),(236,699,52,122),(237,698,123,122),(238,705,1024,122),(239,704,1024,122),(240,703,1024589319,122),(241,701,1024589319,122),(242,702,1024589319,122),(243,759,52,244),(244,764,52,244),(245,765,123,244),(246,760,123,244),(247,762,1024589319,244),(248,761,1024589319,244),(249,763,1024589319,244);
/*!40000 ALTER TABLE `tarea_operario` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `telefono_admi` WRITE;
/*!40000 ALTER TABLE `telefono_admi` DISABLE KEYS */;
/*!40000 ALTER TABLE `telefono_admi` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `telefono_operario` WRITE;
/*!40000 ALTER TABLE `telefono_operario` DISABLE KEYS */;
/*!40000 ALTER TABLE `telefono_operario` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `telefono_proveedor` WRITE;
/*!40000 ALTER TABLE `telefono_proveedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `telefono_proveedor` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Administrador','Persona que tiene acceso a todo'),(2,'representante','Persona que tiene acceso a los servicios del proveedor'),(3,'encargado','persona que tiene acceso a los servicios del satelite'),(4,'Operario','Persona que tiene acceso a los servicios del operario');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `venta` WRITE;
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
INSERT INTO `venta` VALUES (7,'2020-05-01'),(8,'2020-05-02'),(9,'2020-05-03'),(10,'2020-05-03'),(11,'2020-05-03'),(12,'2020-05-05'),(13,'2020-05-09'),(14,'2020-07-01'),(18,'2020-07-02'),(19,'2020-07-02'),(20,'2020-07-02'),(21,'2020-07-02'),(22,'2020-07-03'),(23,'2020-07-03'),(24,'2020-08-08');
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `venta_talla_color` WRITE;
/*!40000 ALTER TABLE `venta_talla_color` DISABLE KEYS */;
INSERT INTO `venta_talla_color` VALUES (60,28,1,2),(61,28,4,3),(62,28,8,2),(63,29,1,3),(64,29,4,2),(65,29,8,2),(66,30,1,1),(67,31,1,1),(68,31,8,1),(69,32,1,1),(70,33,8,1),(71,34,8,1),(72,35,8,1),(73,36,1,3),(74,37,4,7),(75,38,8,3),(76,39,1,3),(77,39,4,3),(78,40,1,1),(79,40,8,5);
/*!40000 ALTER TABLE `venta_talla_color` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 DROP FUNCTION IF EXISTS `cantidadModeloAlmacen` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `cantidadModeloAlmacen`(almacen int, modelo int) RETURNS int(11)
begin 

declare cantidadT int;

select ifnull(sum(a.cantidad-v.cantidad), 0)  into cantidadT from 
(
select ifnull(sum(cantidad), 0) as cantidad
from modelo_almacen ma join modelo_distribuido md on ma.modelo_distribuido_id = md.modelo_distribuido_id join modelo_distribuido_talla mdt on md.modelo_distribuido_id = mdt.modelo_distribuido_id join 
modelo m on m.modelo_id = md.modelo_id
where ma.almacen_id = almacen and m.modelo_id = modelo

) as a,
(
select ifnull(sum(cantidad), 0) as cantidad 
from modelo_distribuido md join modelo_almacen ma on md.modelo_distribuido_id = ma.modelo_distribuido_id join
modelo_vendido mv on mv.modelo_almacen_id = ma.modelo_almacen_id JOIN
modelo_venta_talla mvt on mv.modelo_vendido_id = mvt.modelo_vendido_id join
venta_talla_Color vtc on vtc.modelo_venta_Talla_id = mvt.modelo_venta_Talla_id
where ma.almacen_id = almacen and md.modelo_id = modelo
) as v;

return cantidadT;

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `Ganancias` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `Ganancias`(idCorte int) RETURNS int(11)
Begin
declare ganancia int;
select Sum(ObtenerPagoCorteT(idCorte)-ObtenerTotalPagos(idCorte)) as 'Ganancias' into ganancia;

RETURN ganancia;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `idCorteNuevo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `idCorteNuevo`() RETURNS int(11)
begin

declare id int;

select (Corte_Id + 1) into id from Corte order by Corte_Id desc limit 1;
if id is null then
set id = 1;
end if;

return id;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `modeloEntregadoCompleto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `modeloEntregadoCompleto`(modelo int) RETURNS int(11)
begin

declare totalE int;

select sum(cantidad) into totalE
from corte_Talla ct join corte c on c.corte_id = ct.corte_id join
corte_Entregado_Bodega ceb on ceb.corte_id = c.corte_id 
where c.corte_modelo = modelo;

if totalE is null then
set totalE = 0;
end if;

return totalE;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `modeloPendiente` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `modeloPendiente`(modelo int) RETURNS int(11)
begin

declare totalP int;

select sum(corte_cantidad_entregada) into totalP
from corte_Talla ct join corte c on c.corte_id = ct.corte_id join
corte_pendiente_Bodega cpb on cpb.corte_id = c.corte_id 
where c.corte_modelo = modelo;

if totalP is null then
set totalP = 0;
end if;

return totalP;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `ObtenerCantidadPrendasT` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `ObtenerCantidadPrendasT`(IdCorte int) RETURNS int(11)
begin 
declare cantidad int;

select sum(Corte_Talla.Cantidad) 
into cantidad 
from Corte, Corte_Talla 
where Corte.Corte_Id = Corte_Talla.Corte_Id and Corte.Corte_Id = IdCorte;

IF cantidad is null then
set cantidad = 0;
end if;
return cantidad;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `ObtenerPagoCorteT` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `ObtenerPagoCorteT`(idCorte int) RETURNS int(11)
begin
declare Pago int;

select sum(cantidad * Modelo_Valor) into Pago 
from Corte_Talla, Corte, Modelo 
where Corte_Talla.Corte_Id = Corte.Corte_Id and Corte_Modelo = Modelo_Id and Corte.Corte_Id = IdCorte;

if Pago is null then
set Pago = 0;
end if;
return Pago;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `ObtenerTotalPagos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `ObtenerTotalPagos`(idCorte int) RETURNS int(11)
Begin
declare pagos int;

select sum(Tarea_Operario.Tarea_Cantidad * Operacion_Valor) into pagos 
from Tarea_Operario, Tarea, Operario, Operacion, Corte 
where Tarea_Operario.Tarea_Id = tarea.Tarea_Id and Tarea_Operario.Operario_Id = Operario.Operario_Id and Tarea.Tarea_Corte = Corte_Id and Tarea_Operacion = Operacion_Id and Corte_Id = idCorte;

if pagos is null then
set pagos = 0;
end if;
return Pagos;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `PagoNeto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `PagoNeto`(idOperario int, idCorte int) RETURNS int(11)
begin 

declare pago int;

select  sum(Tarea_Cantidad * Operacion_Valor) into pago
from Tarea, Tarea_Operario, Operario, Operacion, Corte, Modelo, Modelo_Operacion
where Operario.Operario_Id = Tarea_Operario.Operario_Id and Tarea_Operario.Tarea_Id = Tarea.Tarea_Id and Tarea_Corte = Corte_Id and Corte_Modelo = Modelo.Modelo_Id and Modelo_Operacion.Modelo_Id = Modelo.Modelo_Id and Modelo_Operacion.Operacion_Id = Operacion.Operacion_Id and Tarea_Operacion = Operacion.Operacion_Id and Operario.Operario_Id = idOperario and corte_id = idCorte;
if pago is null then
set pago = 0;
end if;
return pago;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `totalModeloEntregado` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `totalModeloEntregado`(modelo int) RETURNS int(11)
begin

declare total int;

select sum(e.cantidad+p.cantidad) into total from 
(
select ifnull(sum(cantidad), 0) as cantidad
from corte_Talla ct join corte c on c.corte_id = ct.corte_id join
corte_Entregado_Bodega ceb on ceb.corte_id = c.corte_id 
where c.corte_modelo = modelo



) as e,
(
select ifnull(sum(corte_cantidad_entregada), 0)  as cantidad
from corte_pendiente_Bodega cpb join corte c on cpb.corte_id = c.corte_id 
where c.corte_modelo = modelo
) as p;

if total is null then
set total = 0;
end if;
return total;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `ventasAlmacen` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `ventasAlmacen`(almacen int, fechaI date, fechaF date) RETURNS int(11)
BEGIN

declare total int;

select sum(cantidad*m.modelo_valor) INTO total
from venta v join modelo_vendido mv on v.venta_id = mv.venta_id JOIN
modelo_venta_Talla mvt on mvt.modelo_vendido_id = mv.modelo_vendido_id JOIN
venta_talla_Color vtc on vtc.modelo_Venta_Talla_id = mvt.modelo_Venta_Talla_id join
modelo_almacen ma on ma.modelo_almacen_id = mv.modelo_almacen_id JOIN
modelo_distribuido md on md.modelo_distribuido_id = ma.modelo_distribuido_id JOIN
modelo m on m.modelo_id = md.modelo_id
where venta_fecha BETWEEN fechaI and fechaF and ma.almacen_id = almacen;

return total;

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `agregarTallaCorte` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `agregarTallaCorte`(idCorte int, idTalla varchar(3), cantidad int)
begin 

insert into Corte_Talla(Corte_Id, Talla_Id, Cantidad) values 
           (idCorte, idTalla, cantidad);
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `asignarTarea` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `asignarTarea`(tarea int, cantidad int, corte int, operario int)
begin

declare cantidadE int;
declare cantidadI int;
declare cantidadV int;
declare idOperario int;

select obtenerCantidadPrendasT(corte) into cantidadE;
select sum(tarea_Cantidad) into cantidadI from Tarea_Operario where Tarea_Id = tarea;

if cantidadI is null then
set cantidadI = 0;
end if;

select sum(cantidadE-cantidadI) into cantidadV;

select Operario_Id into idOperario from Tarea_Operario where tarea_Id = tarea and Operario_Id = operario;

if idOperario is null then
set idOperario = 0;
end if;

if cantidadV = 0 then
select "Error: Tarea Ya Asignada Completamente";
end if;

if cantidad > cantidadV then
select "Cantidad Invalida...";
end if;


if cantidad <= cantidadV and Operario <> idOperario then
insert into tarea_Operario(tarea_Id, Operario_Id, Tarea_cantidad) values (tarea, Operario, cantidad);
select "Registro Exitoso...";
end if;

if Operario = idOperario and cantidad <= cantidadV then
select tarea_Cantidad into cantidadI from tarea_Operario where tarea_id = tarea and Operario_Id = operario;
update tarea_Operario set Tarea_Cantidad = cantidadI+cantidad where tarea_Id = tarea and Operario_ID = operario;
select "Registro Exitoso...";
end if;

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `coloresTallaModeloAlmacen` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `coloresTallaModeloAlmacen`(modelo int, almacen int, talla varchar(4))
begin
select c.color_id, color_nombre as color, sum(mtc.cantidad) as cantidad
from modelo_almacen ma join modelo_distribuido md on ma.modelo_distribuido_id = md.modelo_distribuido_id join modelo_distribuido_talla mdt on md.modelo_distribuido_id = mdt.modelo_distribuido_id join 
modelo m on m.modelo_id = md.modelo_id JOIN
modelo_Talla_color mtc on mtc.MDT_id = mdt.modelo_D_talla_id JOIN
color c on c.color_id = mtc.color_id
where m.modelo_id = modelo and ma.almacen_id = almacen and talla_id = talla
GROUP by mtc.color_id, talla_id
ORDER BY talla_id;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `cuentas` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `cuentas`(Pagototal int, Nomina int, Insumos int, ganancias int)
begin

select Pagototal as 'Pago Total', Nomina, Insumos, ganancias, sum(ganancias/2) as 'Ganancias a la Mitad';

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `eliminarCorte` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarCorte`(id int)
begin

declare idV int;

Select Corte_Id into idV from Corte where corte_Id = id;

if idV is not null then 

delete tarea_Operario from corte, tarea, Tarea_Operario where corte_ID = tarea_corte and tarea.Tarea_ID = Tarea_Operario.Tarea_Id and Corte_Id = id;

delete tarea  from Corte, Tarea where Corte_Id = Tarea_Corte and Corte_Id = id;

delete Corte_Talla from Corte, Corte_Talla where Corte.Corte_Id = Corte_Talla.Corte_Id and Corte.Corte_Id = id;

delete Corte_Pendiente_bodega from corte, Corte_Pendiente_bodega where Corte.Corte_Id = Corte_Pendiente_bodega.Corte_Id and Corte.Corte_Id = id;

delete Corte_Entregado_bodega from corte, Corte_Entregado_bodega  where Corte.Corte_Id = Corte_Entregado_bodega.Corte_Id and Corte.Corte_Id = id;

delete from Corte where Corte_Id = id;

rollback;

commit;

select "Eliminacion Exitosa...";

end if;

if idV is null then 
select "Corte No Encontrado";
end if;

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `eliminarTarea` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarTarea`(idTarea int)
begin
declare tarea int;
select tarea_id from tarea_operario where tarea_Operario_Id = idTarea; 
delete from tarea_Operario where tarea_Operario_Id = idTarea;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `EntregarCorte` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `EntregarCorte`(idCorte int, Cantidad int)
begin

declare cantidadCorte int;
declare pendienteP int;
declare corte int;
declare CorteEntregado int;
declare CortePendiente int;

select Corte_Id into CorteEntregado from Corte_Entregado_bodega where Corte_Id = idCorte;
if CorteEntregado is not null then
select "Corte ya Entregado...";
end if;

select Corte_Id into CortePendiente from Corte_Pendiente_bodega where Corte_Id = idCorte;
if CortePendiente is not null then
select "Corte ya Pendiente...";
end if;

if CorteEntregado is null and CortePendiente is null then

select Corte_Id into corte from Corte where Corte_Id = idCorte;
if corte <> 0 then
select obtenerCantidadPrendasT(idCorte) into cantidadCorte;
select sum(cantidadCorte-cantidad) into pendienteP;


if pendienteP <> 0 then 

insert into corte_Pendiente_bodega(Corte_Id, Corte_Cantidad_Entregada, Corte_Fecha_Entrega, Corte_Estado) values (idcorte, Cantidad, now(), 4);
end if;

if pendienteP = 0 then

insert into Corte_Entregado_bodega(Corte_Id, Corte_Fecha_Entrega, Corte_Estado) values (idcorte, now(), 3);
end if;

select "Registro Exitoso...";
end if;

if corte is null then
select "Corte No Encontrado" as Error;
end if;

end if;

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `modeloAlmacen` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `modeloAlmacen`(almacen int, modelo int)
BEGIN
select modelo_id, modelo_Nombre, cantidadModeloAlmacen(almacen, modelo)
from modelo
where modelo_id = modelo;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `modeloBodega` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `modeloBodega`(modelo int)
BEGIN

select m.modelo_id, modelo_Nombre, totalModeloEntregado(modelo)-ifnull(sum(cantidad), 0) as cantidad
from modelo_almacen ma join modelo_distribuido md on ma.modelo_distribuido_id = md.modelo_distribuido_id join modelo_distribuido_talla mdt on md.modelo_distribuido_id = mdt.modelo_distribuido_id join 
modelo m on m.modelo_id = md.modelo_id
where m.modelo_id = modelo;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `modeloBodega1` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `modeloBodega1`(modelo int)
begin

declare total1 int;

select sum(e.cantidad+p.cantidad) as total1 from
(
select modeloEntregadoCompleto(modelo) as cantidad

) as e,
(
select modeloPendiente(modelo) as cantidad
) as p;

if total1 is null then
set total1 = 0;
end if;

select total1;

select m.modelo_id, modelo_Nombre, total1-sum(cantidad)
from modelo_almacen ma join modelo_distribuido md on ma.modelo_distribuido_id = md.modelo_distribuido_id join modelo_distribuido_talla mdt on md.modelo_distribuido_id = mdt.modelo_distribuido_id join 
modelo m on m.modelo_id = md.modelo_id
where m.modelo_id = modelo;

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `modeloBodega5` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `modeloBodega5`(modelo int)
begin

declare total1 int;

select sum(e.cantidad+p.cantidad) as total1 from
(
select modeloEntregadoCompleto(modelo) as cantidad

) as e,
(
select modeloPendiente(modelo) as cantidad
) as p;

select total1;

select m.modelo_id, modelo_Nombre, total1-sum(cantidad)
from modelo_almacen ma join modelo_distribuido md on ma.modelo_distribuido_id = md.modelo_distribuido_id join modelo_distribuido_talla mdt on md.modelo_distribuido_id = mdt.modelo_distribuido_id join 
modelo m on m.modelo_id = md.modelo_id
where m.modelo_id = modelo;

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `modelosMercancia` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `modelosMercancia`(almacen int)
BEGIN
select m.modelo_id, modelo_Nombre, sum(cantidad)
from modelo_almacen ma join modelo_distribuido md on ma.modelo_distribuido_id = md.modelo_distribuido_id join modelo_distribuido_talla mdt on md.modelo_distribuido_id = mdt.modelo_distribuido_id join 
modelo m on m.modelo_id = md.modelo_id
where ma.almacen_id = almacen
GROUP by m.modelo_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ModelosProveedor` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ModelosProveedor`(id int)
begin

select Modelo_Id as ID, Modelo_Nombre as Nombre, Modelo_Valor as Valor
from Proveedor, Modelo 
where proveedor_Id = Modelo_Proveedor and proveedor_Id = id;

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `NuevoCorte` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `NuevoCorte`(id int, CorteRepresentante int, CorteTipoPrenda int, CorteFechaEnvio date, CorteFechaEntrega date, CorteObservacionProv varchar(60), Corte_Satelite int)
begin

insert into Corte(Corte_Id, Corte_Representante, Corte_Modelo, Corte_Fecha_Envio, Corte_Fecha_Entrega, Corte_Observacion_Prov, Corte_Satelite) values 
(id, CorteRepresentante, CorteTipoPrenda, CorteFechaEnvio, CorteFechaEntrega, CorteObservacionProv, Corte_Satelite);

insert into Tarea(Tarea_Corte, Tarea_Operacion) 
select id, Operacion.Operacion_Id 
from Corte, Modelo, Modelo_Operacion, Operacion 
where Corte_Modelo = Modelo.Modelo_Id and Modelo.Modelo_Id = Modelo_Operacion.Modelo_Id and Modelo_Operacion.Operacion_Id = Operacion.Operacion_Id and Corte_id = id;

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `OperariosNomina` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `OperariosNomina`(corte int)
begin

select Operario.Operario_ID, Operario_Nombre
from corte, tarea, tarea_Operario, Operario 
where corte_ID = Tarea_Corte and Tarea.tarea_Id = Tarea_Operario.Tarea_Id and Tarea_Operario.Operario_ID = Operario.Operario_ID and corte_ID = corte
group by Operario.Operario_Id;

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `pagarCorte` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `pagarCorte`(idcorte int)
begin

declare id int;
declare cantidad int;
declare b int;
declare fechaE date;
declare estado int;
set b = 0;

select corte_estado into estado from corte_Entregado_Bodega where corte_Id = idCorte;

if estado = 1 THEN
select "Corte ya Pagado.";
set b = 1;
end if;

select Corte_Id into id from Corte_Entregado_bodega where corte_Id = idCorte and Corte_Estado <> 1;
if id is not null and b <> 1 then 
update Corte_Entregado_bodega set Corte_Estado = 1, Corte_Fecha_Pago = now() where corte_Id = idCorte;
set b = 1;
select "Pago Exitoso.";
end if;

select Corte_Id into id from Corte_Pendiente_bodega where Corte_id = idCorte limit 1;
select cantidadPendientes(idCorte) into cantidad;
select max(corte_Fecha_Entrega) into fechaE from corte_Pendiente_bodega where corte_ID = idcorte;

if id is not null and cantidad = 0  and b <> 1 then
update Corte_Pendiente_bodega set Corte_Estado = 1 where corte_id = idCorte;
insert into Corte_Entregado_Bodega(Corte_Id, Corte_Fecha_Entrega, Corte_Fecha_Pago, Corte_Estado) values (idcorte, fechaE, now(), 1);
select "Pago Exitoso..";
end if;

if id is not null and cantidad <> 0 and b <> 1 then
update Corte_Pendiente_bodega set Corte_Estado = 2 where corte_id = idCorte;
select "Pago Exitoso...";
end if;

if id is null then
select "Corte No Encontrado";
end if;

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `pagarCorte1` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `pagarCorte1`(idcorte int)
begin

declare id int;
declare cantidad int;
declare b int;
declare fechaE date;
declare estado int;
set b = 0;

select corte_estado into estado from corte_Entregado_Bodega where corte_Id = idCorte;

if estado = 1 THEN
select "Corte ya Pagado.";
set b = 1;
end if;

select Corte_Id into id from Corte_Entregado_bodega where corte_Id = idCorte and Corte_Estado <> 1;
if id is not null and b <> 1 then 
update Corte_Entregado_bodega set Corte_Estado = 1, Corte_Fecha_Pago = now() where corte_Id = idCorte;
set b = 1;
select "Pago Exitoso.";
end if;

select Corte_Id into id from Corte_Pendiente_bodega where Corte_id = idCorte limit 1;
select cantidadPendientes(idCorte) into cantidad;
select max(corte_Fecha_Entrega) into fechaE from corte_Pendiente_bodega where corte_ID = idcorte;

if id is not null and cantidad = 0  and b <> 1 then
update Corte_Pendiente_bodega set Corte_Estado = 1 where corte_id = idCorte;
insert into Corte_Entregado_Bodega(Corte_Id, Corte_Fecha_Entrega, Corte_Fecha_Pago, Corte_Estado) values (idcorte, fechaE, now(), 1);
select "Pago Exitoso..";
end if;

if id is not null and cantidad <> 0 and b <> 1 then
update Corte_Pendiente_bodega set Corte_Estado = 2 where corte_id = idCorte;
select "Pago Exitoso...";
end if;

if id is null then
select "Corte No Encontrado";
end if;

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `removerPago` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `removerPago`(idCorte int)
BEGIN

declare estado int;

select corte_estado into estado from corte_Entregado_Bodega where corte_id = idCorte; 
if estado <> 3 THEN
update corte_Entregado_Bodega set corte_estado = 3 where corte_id = idCorte;
select "Pago removido.";
end if;
if estado = 3 then
select "Seleccione Corte Pagado.";
end if;

if estado is null THEN
select "Corte no Encontrado";
end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `tallaModeloAlmacen` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `tallaModeloAlmacen`(modelo int, almacen int)
begin
select talla_id, sum(cantidad)
from modelo_almacen ma join modelo_distribuido md on ma.modelo_distribuido_id = md.modelo_distribuido_id join modelo_distribuido_talla mdt on md.modelo_distribuido_id = mdt.modelo_distribuido_id join 
modelo m on m.modelo_id = md.modelo_id
where m.modelo_id = modelo and ma.almacen_id = almacen
GROUP by talla_id;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `tareasCorte` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `tareasCorte`(idcorte int)
begin 

select Tarea_Id, Operacion_Descripcion
from Tarea, Corte, Operacion 
where Corte_id = Tarea_Corte and Corte_id = idcorte and Tarea_Operacion = Operacion_Id;

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `TareasOperario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `TareasOperario`(idCorte int, IdOperario int)
begin

select tarea_operario_id, Operacion_Descripcion as Tarea , Tarea_Cantidad as Cantidad, Operacion_Valor as "Valor de Operacion", sum(Tarea_Cantidad * Operacion_Valor) as 'Pago'
from Tarea, Tarea_Operario, Operario, Operacion, Corte, Modelo, Modelo_Operacion 
where Operario.Operario_Id = Tarea_Operario.Operario_Id and Tarea_Operario.Tarea_Id = Tarea.Tarea_Id and Tarea_Corte = Corte_Id and Corte_Modelo = Modelo.Modelo_Id and Modelo.Modelo_Id = Modelo_Operacion.Modelo_Id and Modelo_Operacion.Operacion_Id = Operacion.Operacion_Id and Tarea_Operacion = Operacion.Operacion_Id and Corte_Id = idCorte and Operario.Operario_Id = IdOperario
group by Tarea_Cantidad, Operacion_Descripcion, Operacion_Valor, Operario.Operario_Id, Operario_Nombre, Corte_Id, Tarea.Tarea_Id;

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `TareasOperarioNomina` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `TareasOperarioNomina`(idCorte int, IdOperario int)
begin

select Corte.Corte_id as "Corte", Modelo_Nombre as Modelo, Operacion_Descripcion as Tarea , Tarea_Cantidad as Cantidad, Operacion_Valor as "Valor de Operacion", sum(Tarea_Cantidad * Operacion_Valor) as 'Pago'
from Tarea, Tarea_Operario, Operario, Operacion, Corte, Modelo, Modelo_Operacion 
where Operario.Operario_Id = Tarea_Operario.Operario_Id and Tarea_Operario.Tarea_Id = Tarea.Tarea_Id and Tarea_Corte = Corte_Id and Corte_Modelo = Modelo.Modelo_Id and Modelo.Modelo_Id = Modelo_Operacion.Modelo_Id and Modelo_Operacion.Operacion_Id = Operacion.Operacion_Id and Tarea_Operacion = Operacion.Operacion_Id and Corte_Id = idCorte and Operario.Operario_Id = idOperario
group by Tarea_Cantidad, Operacion_Descripcion, Operacion_Valor, Operario.Operario_Id, Operario_Nombre, Corte_Id, Tarea.Tarea_Id;

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `tareasPorAsignar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `tareasPorAsignar`(corte int)
begin
declare cantidad int;

select obtenerCantidadPrendasT(corte) into cantidad;

select t.tarea_id, o.Operacion_Descripcion from tarea t join operacion o on t.tarea_operacion = o.operacion_id where tarea_corte = corte and tarea_id not in
(
select t.tarea_id
from corte c join tarea t on t.tarea_Corte = c.Corte_id join tarea_operario tao on tao.tarea_id = t.tarea_id join operacion o on o.Operacion_Id = t.Tarea_Operacion join corte_Talla ct on ct.corte_id = c.corte_id
where c.corte_id = corte and cantidad = tao.tarea_cantidad
)
order by o.operacion_Descripcion;

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;


create database threadSoft;

use threadSoft;


create table Usuario(
	Usuario_Id int not null,
	Usuario_Nombre varchar(60) not null,
	Usuario_Descripcion varchar(100) null,
	primary key(usuario_Id)
);

create table Proveedor(
   Proveedor_Id int not null,
   Proveedor_Nombre varchar(50) not null,
   primary key(Proveedor_Id)
);

create table Representante(
	Representante_Id int not null,
	Representante_Nombre varchar(50) not null,
	Representante_Usuario int not null default 2,
	Representante_clave varchar(40) not null,
	Representante_Proveedor int not null,
	Representante_Correo varchar(50) not null,
	PRIMARY KEY(Representante_Id),
	foreign key(Representante_Proveedor) references Proveedor(Proveedor_Id)
);

create table Telefono_Proveedor(
	Telefono_Numero int not null,
	Telefono_Operador varchar(20) null,
	Telefono_Proveedor_Id int not null,
	primary key(Telefono_Numero),
	foreign key(Telefono_Proveedor_Id) references Proveedor(Proveedor_Id)
);


create table Administrador(
	Administrador_Id int not null,
	Administrador_Nombre varchar(40) not null,
	Administrador_Usuario int not null default 1,
	Administrador_clave varchar(40) not null,
	Administrador_Correo varchar(50) not null,
	primary key(Administrador_Id),
	foreign key(Administrador_Usuario) references Usuario(usuario_Id)
);

create table Telefono_Admi(
	Telefono_Numero int not null,
	Telefono_Operador varchar(20) null,
	Telefono_Administrador_Id int not null,
	primary key(Telefono_Numero),
	foreign key(Telefono_Administrador_Id) references Administrador(Administrador_Id)
);

create table Modelo(
   Modelo_Id int not null,
   Modelo_Nombre varchar(30) not null,
   Modelo_Valor int not null,
   Modelo_Proveedor int not null,
   primary key(Modelo_Id),
   foreign key(Modelo_Proveedor) references Proveedor(Proveedor_Id)
);

create table Corte(
   Corte_Id int not null,
   Corte_Fecha_Envio date not null,
   Corte_Fecha_Entrega date not null,
   Corte_Observacion_Prov varchar(100) null,
   Corte_Representante int not null,
   Corte_Modelo int not null,
   primary key(Corte_Id),
   foreign key(Corte_Representante) references Representante(Representante_Id),
   foreign key(Corte_Modelo) references Modelo(Modelo_Id)
);


create table Estado(
	Estado_Id int not null,
	Estado_Descripcion varchar(30) not null,
	primary key(Estado_Id)
);

create table Corte_Entregado_Bodega(
	Corte_ID int not null,
	Corte_Fecha_Entrega date not null,
	Corte_Fecha_Pago date not null,
	Corte_Estado int not null,
	Corte_Observaciones varchar(60) null,
	primary key(Corte_ID),
	foreign key(Corte_Estado) references Estado(Estado_Id)
);


create table Corte_pendiente_Bodega(
	Corte_ID int not null,
	Corte_Cantidad_Entregada int not null,
	Corte_Fecha_Entrega date not null,
	Corte_Estado int not null,
	Corte_Observaciones varchar(60) null,
	foreign key(Corte_ID) references Corte(Corte_ID),
	foreign key(Corte_Estado) references Estado(Estado_Id)
);

create table Talla (
	Talla_Id varchar(4) not null,
	Talla_Descripcion varchar(50) not null,
	primary key(Talla_Id)
);

create table color(
   Color_Id int not null,
   Color_Nombre varchar(20) not null,
   primary key(Color_Id)
);


/* Analizar de nuevo */
create table Insumo_Bodega(
   Insumo_Id int not null,
   Insumo_Descripcion varchar(50) not null,
   Insumo_Valor_Unitario real not null,
   Insumo_Bodega int not null,
   primary key(Insumo_Id),
   foreign key(Insumo_Bodega) references Corte_Entregado_Bodega(Corte_ID)
);

create table Operacion(
   Operacion_Id int not null,
   Operacion_Descripcion varchar(60) not null,
   Operacion_Valor int not null,
   primary key(Operacion_Id)
);

create table Modelo_Operacion(
   Modelo_Operacion_Id int not null auto_increment,
   Modelo_Id int not null,
   Operacion_Id int not null,
   primary key(Modelo_Operacion_Id),
   foreign key(Modelo_id) references Modelo(Modelo_Id),
   foreign key(Operacion_Id) references Operacion(Operacion_Id)
);

create table Corte_Talla(
	Corte_Talla_Id int not null auto_increment,
	Corte_Id int not null,
	Talla_Id varchar(4) not null,
	Cantidad int not null,
	primary key(Corte_Talla_Id),
	foreign key(Talla_Id) references Talla(Talla_Id),
	foreign key(Corte_Id) references Corte(Corte_Id)
);

create table corte_talla_color(
	corte_talla_color_id int not null auto_increment,
	corte_talla_id int not null,
	color_id int not null,
	cantidad int not null,
	PRIMARY key(corte_talla_color_id),
	foreign key(corte_talla_id) references Corte_talla(Corte_Talla_Id),
	foreign key(Color_Id) references Color(Color_Id)
);

create table Satelite(
	satelite_Id int not null auto_increment,
	satelite_Nombre varchar(60) not null,
	satelite_Direccion varchar(60) not null,
	PRIMARY KEY(satelite_Id)
); 

create table Operario(
   Operario_Id int not null,
   Operario_Nombre varchar(40) not null,
   Operario_Usuario int not null default 3,
   Operario_Correo varchar(50) not null,
   Operario_clave varchar(40) not null,
   Operario_Satelite int not null,
   primary key(Operario_Id),
   foreign key(Operario_Usuario) references Usuario(usuario_Id),
   foreign key(Operario_Satelite) REFERENCES Satelite(satelite_Id)
);

create table Telefono_Operario(
	Telefono_Numero int not null,
	Telefono_Operador varchar(20) null,
	Telefono_Operario_Id int not null,
	primary key(Telefono_Numero), 
	foreign key(Telefono_Operario_Id) references Operario(Operario_Id)
);

create table Tarea(
	Tarea_Id int not null auto_increment,
	Tarea_Corte int not null,
	Tarea_Operacion int not null,
	primary key(Tarea_Id),
	foreign key(Tarea_Corte) references Corte(Corte_Id),
	foreign key(Tarea_Operacion) references Operacion(Operacion_Id)
);

create table Tarea_Operario(
	Tarea_Operario_Id int not null auto_increment,
	Tarea_Id int not null,
	Operario_Id int not null,
	Tarea_Cantidad int not null,
	primary key(Tarea_Operario_Id),
	foreign key(Tarea_Id) references Tarea(Tarea_Id),
	foreign key(Operario_Id) references Operario(Operario_Id)
);

create table Venta(
	venta_id int not null auto_increment,
	venta_fecha date not null,
	PRIMARY KEY(venta_id)
);

create table modelo_vendido(
	modelo_vendido_id int not null auto_increment,
	modelo_almacen_id int not null,
	venta_id int not null,
	PRIMARY KEY(modelo_vendido_id),
	foreign KEY(modelo_almacen_id) REFERENCES modelo_almacen(modelo_almacen_id),
	foreign KEY(venta_id) REFERENCES venta(venta_id)
);

create table modelo_venta_talla(
	modelo_venta_talla_id int not null auto_increment,
	modelo_vendido_id int not null,
	talla_id VARCHAR(4) not null, 
	PRIMARY KEY(modelo_venta_talla_id),
	FOREIGN KEY(modelo_vendido_id) REFERENCES Modelo_vendido(modelo_vendido_id),
	FOREIGN key(talla_id) REFERENCES Talla(talla_id)
);

create table venta_talla_Color(
	venta_talla_color_id int not null auto_increment,
	modelo_venta_Talla_id int not null,
	color_id int not null,
	cantidad int not null,
	PRIMARY key(venta_talla_color_id),
	foreign key(modelo_venta_talla_id) REFERENCES modelo_venta_talla(modelo_venta_Talla_id),
	foreign key(color_id) REFERENCES color(color_id)
);


/*Consultas*/

/*Tallas de un corte*/

select ct.Talla_Id 
from corte c join corte_Talla ct on c.corte_id = ct.corte_id
where c.corte_id = 52
group by ct.talla_id;

/*datos de un corte*/

select C.Corte_ID as ID, Modelo_Nombre as Modelo, Corte_Fecha_Envio, Corte_Fecha_Entrega, corte_observacion_prov, sum(Cantidad) as Cantidad 
from corte c join Modelo m on c.corte_modelo = m.modelo_id join Corte_Talla ct on ct.corte_id = c.corte_id
where c.corte_id = 52;

/*colores de una talla*/

select Color_Nombre, ctc.cantidad
from corte c join corte_talla ct on ct.corte_id = c.corte_id join corte_talla_color ctc on ctc.corte_talla_id = ct.corte_talla_id join color co on co.color_id = ctc.color_id
where c.corte_id = 52 and ct.talla_id = "CT";


/*Vistas*/

	create view CortesPorEntregar as
	select Corte.Corte_ID as ID, Modelo_Nombre as Modelo, Corte_Fecha_Envio as "Fecha de Envio", sum(Cantidad) as Cantidad 
	from corte, Modelo, Corte_Talla
	where Corte.corte_Id not in
	(
	select corte_Id from corte_Entregado_Bodega
	union 
	select corte_Id from corte_Pendiente_Bodega
	) 
	and corte_Modelo = Modelo_Id and Corte_Talla.Corte_Id = Corte.Corte_Id group by Corte.Corte_Id;


create view Cortes as
select Corte.Corte_id as ID,  Modelo_Nombre as Modelo, Corte_Fecha_Envio as Fecha, sum(Cantidad) as Cantidad
from Corte, Representante, Proveedor, Modelo, Talla, Corte_Talla
where Corte_Representante = Representante_Id and Representante_Proveedor = Proveedor_Id and Corte_Modelo = Modelo_Id and Corte.Corte_id = Corte_Talla.Corte_id and Corte_Talla.Talla_Id = Talla.Talla_Id
group by corte.corte_Id;


/*muestra las tallas de un modelo entregado*/
create view tallasModelo as 
select c.corte_id, c.corte_Modelo as modelo, ct.talla_id as talla, sum(ct.cantidad) as cantidad
from corte c inner join Corte_Talla ct on c.Corte_Id = ct.Corte_Id JOIN
corte_Entregado_Bodega ceb on ceb.corte_id = c.corte_id
where corte_modelo = 9 and ct.talla_id = 'G'

select modelo, talla, sum(cantidad) from tallasmodelo where modelo = 9 and talla = 'CT'
group by talla//

/*muestra los colores de cada talla de un modelo entregado*/
create view coloresTallasModelo as 
select c.corte_Modelo as modelo, ct.talla_id as talla, co.color_id, co.color_Nombre as color, sum(ctc.cantidad) as cantidad
from corte c inner join Corte_Talla ct on c.Corte_Id = ct.Corte_Id 
inner join Corte_Talla_Color ctc on ct.Corte_Talla_id = ctc.Corte_Talla_id 
inner join Color co on co.Color_Id = ctc.Color_Id
where corte_modelo = 3 and ct.talla_id = 'G'
group by co.color_id, ct.talla_id
order by c.corte_modelo, ct.talla_id


select m.modelo_id, ct.Talla_id, c.color_id, color_nombre, cantidad

/*Funciones*/

/*Devuelve id de corte a crear*/
create function idCorteNuevo()
returns int
begin

declare id int;

select (Corte_Id + 1) into id from Corte order by Corte_Id desc limit 1;
if id is null then
set id = 1;
end if;

return id;
end//

create function ObtenerCantidadPrendasT(IdCorte int)
returns int 	
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
end
//

/*Pago Neto*/
create function PagoNeto(idOperario int, idCorte int)
returns int
begin 

	declare pago int;
	
	select  sum(Tarea_Cantidad * Operacion_Valor) into pago
	from Tarea, Tarea_Operario, Operario, Operacion, Corte, Modelo, Modelo_Operacion
	where Operario.Operario_Id = Tarea_Operario.Operario_Id and Tarea_Operario.Tarea_Id = Tarea.Tarea_Id and Tarea_Corte = Corte_Id and Corte_Modelo = Modelo.Modelo_Id and Modelo_Operacion.Modelo_Id = Modelo.Modelo_Id and Modelo_Operacion.Operacion_Id = Operacion.Operacion_Id and Tarea_Operacion = Operacion.Operacion_Id and Operario.Operario_Id = idOperario and corte_id = idCorte;
	if pago is null then
	set pago = 0;
	end if;
	return pago;
end//


/*Procedimientos*/

/*Mostrar las tareas de un corte*/
create procedure tareasCorte(idcorte int)
begin 

	select Tarea_Id, Operacion_Descripcion
	from Tarea, Corte, Operacion 
	where Corte_id = Tarea_Corte and Corte_id = idcorte and Tarea_Operacion = Operacion_Id;
	
end//


/*Asignar tarea de un corte a un operario validando la cantidad ingresada*/
create procedure asignarTarea(tarea int, cantidad int, corte int, operario int)
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
	
end//

/*Mostrar la cantidad de una operacion realizada por un operario en un corte con su respectivo total*/
create procedure TareasOperario	(idCorte int, IdOperario int)
begin

	select tarea_operario_id, Operacion_Descripcion as Tarea , Tarea_Cantidad as Cantidad, Operacion_Valor as "Valor de Operacion", sum(Tarea_Cantidad * Operacion_Valor) as 'Pago'
	from Tarea, Tarea_Operario, Operario, Operacion, Corte, Modelo, Modelo_Operacion 
	where Operario.Operario_Id = Tarea_Operario.Operario_Id and Tarea_Operario.Tarea_Id = Tarea.Tarea_Id and Tarea_Corte = Corte_Id and Corte_Modelo = Modelo.Modelo_Id and Modelo.Modelo_Id = Modelo_Operacion.Modelo_Id and Modelo_Operacion.Operacion_Id = Operacion.Operacion_Id and Tarea_Operacion = Operacion.Operacion_Id and Corte_Id = idCorte and Operario.Operario_Id = IdOperario
	group by Tarea_Cantidad, Operacion_Descripcion, Operacion_Valor, Operario.Operario_Id, Operario_Nombre, Corte_Id, Tarea.Tarea_Id;

end//

/*Consultar las tareas no asignadas*/
create procedure tareasPorAsignar(corte int)
BEGIN
declare cantidad int;

select obtenerCantidadPrendasT(corte) into cantidad;

select t.tarea_id, o.Operacion_Descripcion from tarea t join operacion o on t.tarea_operacion = o.operacion_id where tarea_corte = corte and tarea_id not in
(
	select t.tarea_id
	from corte c join tarea t on t.tarea_Corte = c.Corte_id join tarea_operario tao on tao.tarea_id = t.tarea_id join operacion o on o.Operacion_Id = t.Tarea_Operacion join corte_Talla ct on ct.corte_id = c.corte_id	
	where c.corte_id = corte and cantidad = tao.tarea_cantidad
);
end//

/*eliminar Tarea*/
create procedure eliminarTarea(idTarea int)
begin
	declare tarea int;
	select tarea_id from tarea_operario where tarea_Operario_Id = idTarea; 
	delete from tarea_Operario where tarea_Operario_Id = idTarea;
end//

/*Eliminar Corte*/
create procedure eliminarCorte(id int)

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

end//


/*Procedimiento para ingresar cantidad de prendas entregadas*/
create procedure EntregarCorte(idCorte int, Cantidad int)
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
			
			/*if cantidad <= cantidadCorte and cantidad >= 0 then
				update Corte set Cantidad_Entregada = cantidad where Corte_Id = idCorte;
				update Corte set pendiente = pendienteP where Corte_Id = idCorte;
			end if;*/
			if pendienteP <> 0 then 
			/*update Corte set Corte_Estado = 3, Corte_Fecha_Entrega = fecha where Corte_id = idCorte;*/
			insert into corte_Pendiente_bodega(Corte_Id, Corte_Cantidad_Entregada, Corte_Fecha_Entrega, Corte_Estado) values (idcorte, Cantidad, now(), 4);			
			end if;
			
			if pendienteP = 0 then
			/*update Corte set Corte_Estado = 1, Corte_Fecha_Entrega = fecha where Corte_id = idCorte;*/
			insert into Corte_Entregado_bodega(Corte_Id, Corte_Fecha_Entrega, Corte_Estado) values (idcorte, now(), 3);
			end if;
			
			select "Registro Exitoso...";
		end if;
		
		if corte is null then
		select "Corte No Encontrado" as Error;
		end if;
		
	end if;
	
	end//

/*Pagar Corte*/
create procedure pagarCorte(idcorte int)
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
	
end//


/*removerPago*/
create PROCEDURE removerPago(idCorte int)
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
END

create procedure OperariosNomina(corte int)
begin

select Operario.Operario_ID, Operario_Nombre
from corte, tarea, tarea_Operario, Operario 
where corte_ID = Tarea_Corte and Tarea.tarea_Id = Tarea_Operario.Tarea_Id and Tarea_Operario.Operario_ID = Operario.Operario_ID and corte_ID = corte
group by Operario.Operario_Id;

end //


create procedure TareasOperarioNomina(idCorte int, IdOperario int)
begin

	select Corte.Corte_id as "Corte", Modelo_Nombre as Modelo, Operacion_Descripcion as Tarea , Tarea_Cantidad as Cantidad, Operacion_Valor as "Valor de Operacion", sum(Tarea_Cantidad * Operacion_Valor) as 'Pago'
	from Tarea, Tarea_Operario, Operario, Operacion, Corte, Modelo, Modelo_Operacion 
	where Operario.Operario_Id = Tarea_Operario.Operario_Id and Tarea_Operario.Tarea_Id = Tarea.Tarea_Id and Tarea_Corte = Corte_Id and Corte_Modelo = Modelo.Modelo_Id and Modelo.Modelo_Id = Modelo_Operacion.Modelo_Id and Modelo_Operacion.Operacion_Id = Operacion.Operacion_Id and Tarea_Operacion = Operacion.Operacion_Id and Corte_Id = idCorte and Operario.Operario_Id = idOperario
	group by Tarea_Cantidad, Operacion_Descripcion, Operacion_Valor, Operario.Operario_Id, Operario_Nombre, Corte_Id, Tarea.Tarea_Id;

end//


/*consultar los id de los colores de una talla por corte*/
select corte_talla_color_id from corte_talla ct join corte_Talla_color  ctc on ctc.corte_talla_id = ct.corte_talla_id and corte_id = 47;

select sum(e.realizadas+p.realizadas) from (
	select sum(realizadas) as realizadas From CortesEntregadosC where modelo = 'Triangulo 2'
) as e,
(
	select sum(realizadas) as realizadas From CortesEntregadosP where modelo = 'Triangulo 2'
) as p





/**cortes entregados*/
create view CortesEntregadosC as
select corte.Corte_Id as ID, Modelo_Nombre as Modelo, sum(cantidad) as Realizadas, Corte_Entregado_Bodega.Corte_fecha_Entrega as "Fecha de Entrega", corte_estado, sum(cantidad*Modelo_Valor) as "Total Pago"
from corte, Corte_Talla, Corte_Entregado_Bodega, Modelo
where corte.Corte_Id = Corte_Talla.Corte_Id and Corte.Corte_Id = Corte_Entregado_Bodega.Corte_Id and Corte_Modelo = Modelo_Id and Corte_Estado <> 2 and Corte_Estado <> 4 
group by corte.Corte_Id
ORDER BY corte_estado desc;


/*Vista cortes entregados Pagados*/
create view cortesEntregadosP as
select Corte_Pendiente_bodega.Corte_Id as ID, Modelo_Nombre as Modelo, sum(Corte_Cantidad_Entregada) as Realizadas, Corte_Pendiente_bodega.Corte_Fecha_Entrega as 'Fecha de Entrega', corte_estado, sum(Corte_Cantidad_Entregada*Modelo_Valor) as Pago
from Corte_Pendiente_bodega, Modelo, Corte_Talla, Corte
where Corte_Pendiente_bodega.Corte_Id not in
(
select Corte_id from Corte_Entregado_Bodega
)
and corte.Corte_ID = Corte_Pendiente_bodega.Corte_ID and Corte_Modelo = Modelo_Id and Corte.Corte_ID = Corte_Talla.Corte_Id and Corte_Pendiente_bodega.Corte_Estado <> 3 and Corte_Pendiente_bodega.Corte_Estado <> 1
group by Corte_Pendiente_bodega.Corte_ID
ORDER BY corte_estado desc;






/*Consultas Almacen*/

/* tabla de mercancia de un almacen Bien */
create procedure modelosMercancia(almacen int)
BEGIN
select m.modelo_id, modelo_Nombre, sum(cantidad)
from modelo_almacen ma join modelo_distribuido md on ma.modelo_distribuido_id = md.modelo_distribuido_id join modelo_distribuido_talla mdt on md.modelo_distribuido_id = mdt.modelo_distribuido_id join 
modelo m on m.modelo_id = md.modelo_id
where ma.almacen_id = almacen
GROUP by m.modelo_id;
END//


/* datos de un modelo en un almacen */
create procedure modeloAlmacen(almacen int, modelo int)
BEGIN
select modelo_id, modelo_Nombre, cantidadModeloAlmacen(almacen, modelo)
from modelo
where modelo_id = modelo;
END//


/*cantidad de blusas de un modelo en almacen restando ventas*/
create function cantidadModeloAlmacen(almacen int, modelo int)
RETURNS int
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

end//




/* talla de un modelo en un almacen restando las ventas*/
select sum(a.cantidad-v.cantidad) from 
(
	select m.modelo_id, modelo_Nombre, sum(cantidad) as cantidad
	from modelo_almacen ma join modelo_distribuido md on ma.modelo_distribuido_id = md.modelo_distribuido_id join modelo_distribuido_talla mdt on md.modelo_distribuido_id = mdt.modelo_distribuido_id join 
	modelo m on m.modelo_id = md.modelo_id
	where ma.almacen_id = 1 and m.modelo_id = 9 and talla_id = 'CT'

) as a,
(
	select sum(cantidad) as cantidad 
	from modelo_distribuido md join modelo_almacen ma on md.modelo_distribuido_id = ma.modelo_distribuido_id join
	modelo_vendido mv on mv.modelo_almacen_id = ma.modelo_almacen_id JOIN
	modelo_venta_talla mvt on mv.modelo_vendido_id = mvt.modelo_vendido_id join
	venta_talla_Color vtc on vtc.modelo_venta_Talla_id = mvt.modelo_venta_Talla_id
	where ma.almacen_id = 1 and md.modelo_id = 9 and talla_id = 'CT'
) as v


/* color de una talla de un modelo en un almacen restando las ventas*/
select sum(a.cantidad-v.cantidad) from 
(
	select m.modelo_id, modelo_Nombre, sum(mtc.cantidad) as cantidad
	from modelo_almacen ma join modelo_distribuido md on ma.modelo_distribuido_id = md.modelo_distribuido_id join modelo_distribuido_talla mdt on md.modelo_distribuido_id = mdt.modelo_distribuido_id join 
	modelo_Talla_color mtc on mtc.mdt_id = mdt.modelo_D_talla_id JOIN
	modelo m on m.modelo_id = md.modelo_id
	where ma.almacen_id = 1 and m.modelo_id = 9 and talla_id = 'CT' and color_id = 1

) as a,
(
	select sum(cantidad) as cantidad 
	from modelo_distribuido md join modelo_almacen ma on md.modelo_distribuido_id = ma.modelo_distribuido_id join
	modelo_vendido mv on mv.modelo_almacen_id = ma.modelo_almacen_id JOIN
	modelo_venta_talla mvt on mv.modelo_vendido_id = mvt.modelo_vendido_id join
	venta_talla_Color vtc on vtc.modelo_venta_Talla_id = mvt.modelo_venta_Talla_id
	where ma.almacen_id = 1 and md.modelo_id = 9 and talla_id = 'CT' and vtc.color_id = 1

) as v








/* muestra la cantidad de cada talla agrupados por modelo y talla Bien */
select modelo_Nombre, talla_id, sum(cantidad)
from modelo_almacen ma join modelo_distribuido md on ma.modelo_distribuido_id = md.modelo_distribuido_id join modelo_distribuido_talla mdt on md.modelo_distribuido_id = mdt.modelo_distribuido_id join 
modelo m on m.modelo_id = md.modelo_id
GROUP by talla_id

/*muestra la cantidad de cada talla de un modelo Bien cambio*/
create procedure tallaModeloAlmacen(modelo int, almacen int)
begin
select talla_id, sum(cantidad)
from modelo_almacen ma join modelo_distribuido md on ma.modelo_distribuido_id = md.modelo_distribuido_id join modelo_distribuido_talla mdt on md.modelo_distribuido_id = mdt.modelo_distribuido_id join 
modelo m on m.modelo_id = md.modelo_id
where m.modelo_id = modelo and ma.almacen_id = almacen
GROUP by talla_id;
end

/*muestra las  tallas de un modelo en almacen*/
select talla_id
from modelo_almacen ma join modelo_distribuido md on ma.modelo_distribuido_id = md.modelo_distribuido_id join modelo_distribuido_talla mdt on md.modelo_distribuido_id = mdt.modelo_distribuido_id join 
modelo m on m.modelo_id = md.modelo_id
where m.modelo_id = 9 and ma.almacen_id = 1
GROUP by talla_id;



/*muestra la cantidad de una talla de un modelo Bien en almacen menos ventas*/

select sum(a.cantidad-v.cantidad) from 
(
	select sum(cantidad) as cantidad
	from modelo_almacen ma join modelo_distribuido md on ma.modelo_distribuido_id = md.modelo_distribuido_id join modelo_distribuido_talla mdt on md.modelo_distribuido_id = mdt.modelo_distribuido_id join 
	modelo m on m.modelo_id = md.modelo_id
	where m.modelo_id = 9 and ma.almacen_id = 1 and talla_id = 'CT'
) as a,
(
	select ifnull(sum(cantidad), 0) as cantidad 
	from modelo_distribuido md join modelo_almacen ma on md.modelo_distribuido_id = ma.modelo_distribuido_id join
	modelo_vendido mv on mv.modelo_almacen_id = ma.modelo_almacen_id JOIN
	modelo_venta_talla mvt on mv.modelo_vendido_id = mvt.modelo_vendido_id join
	venta_talla_Color vtc on vtc.modelo_venta_Talla_id = mvt.modelo_venta_Talla_id
	where ma.almacen_id = 1 and md.modelo_id = 9 and talla_id = 'CT'
) as v







/*muestra lo cantidad de cada color agrupados por talla y modelo Bien*/
create view coloresTallasModeloD as
	select m.modelo_id as modelo, talla_id as talla, color_nombre as color, sum(mtc.cantidad) as cantidad
	from modelo_almacen ma join modelo_distribuido md on ma.modelo_distribuido_id = md.modelo_distribuido_id join modelo_distribuido_talla mdt on md.modelo_distribuido_id = mdt.modelo_distribuido_id join 
	modelo m on m.modelo_id = md.modelo_id JOIN
	modelo_Talla_color mtc on mtc.MDT_id = mdt.modelo_D_talla_id JOIN
	color c on c.color_id = mtc.color_id
	where m.modelo_id = 3 and mdt.talla_id = 'P'
	GROUP by mtc.color_id, talla_id
	ORDER BY talla_id


select sum(b.cantidad-a.cantidad) from 
(
	select sum(ctc.cantidad) as cantidad
	from corte c inner join Corte_Talla ct on c.Corte_Id = ct.Corte_Id 
	inner join Corte_Talla_Color ctc on ct.Corte_Talla_id = ctc.Corte_Talla_id 
	inner join Color co on co.Color_Id = ctc.Color_Id
	where corte_modelo = 3 and ct.talla_id = 'P' and ctc.Color_id = 7
	group by co.color_id, ct.talla_id
	order by c.corte_modelo, ct.talla_id

) as b,
(
	select  sum(mtc.cantidad) as cantidad
	from modelo_almacen ma join modelo_distribuido md on ma.modelo_distribuido_id = md.modelo_distribuido_id join modelo_distribuido_talla mdt on md.modelo_distribuido_id = mdt.modelo_distribuido_id join 
	modelo m on m.modelo_id = md.modelo_id JOIN
	modelo_Talla_color mtc on mtc.MDT_id = mdt.modelo_D_talla_id JOIN
	color c on c.color_id = mtc.color_id
	where m.modelo_id = 3 and mdt.talla_id = 'P' and mtc.Color_id = 7
	GROUP by mtc.color_id, talla_id
	ORDER BY talla_id
) as a;






create view tallasModeloD as
select m.modelo_id as modelo, talla_id as talla, sum(mdt.cantidad) as cantidad
from modelo_almacen ma join modelo_distribuido md on ma.modelo_distribuido_id = md.modelo_distribuido_id join modelo_distribuido_talla mdt on md.modelo_distribuido_id = mdt.modelo_distribuido_id join 
modelo m on m.modelo_id = md.modelo_id
GROUP by talla_id

select modelo, talla, sum(cantidad) as cantidad from
tallasmodeloD where modelo = 9 and talla = 'CT'//

select modelo, talla, sum(cantidad) as cantidad from tallasmodelo where modelo = 9 and talla = 'P'//



/*Cantidad de una talla en bodega*/
select ifnull(sum(e.cantidad-a.cantidad), 0) from (
	select modelo, talla, sum(cantidad) as cantidad from
tallasmodeloD where modelo = 9 and talla = 'CT'
) as a,
(
	select modelo, talla, sum(cantidad) as cantidad from tallasmodelo where modelo = 9 and talla = 'CT'
) as e



/*muestra lo cantidad de cada color agrupados por talla de un modelo Bien*/
create procedure coloresTallaModeloAlmacen(modelo int, almacen int, talla varchar(4))
begin
select c.color_id, color_nombre as color, sum(mtc.cantidad) as cantidad
from modelo_almacen ma join modelo_distribuido md on ma.modelo_distribuido_id = md.modelo_distribuido_id join modelo_distribuido_talla mdt on md.modelo_distribuido_id = mdt.modelo_distribuido_id join 
modelo m on m.modelo_id = md.modelo_id JOIN
modelo_Talla_color mtc on mtc.MDT_id = mdt.modelo_D_talla_id JOIN
color c on c.color_id = mtc.color_id
where m.modelo_id = modelo and ma.almacen_id = almacen and talla_id = talla
GROUP by mtc.color_id, talla_id
ORDER BY talla_id;
end//


/*muestra los colores de una talla de un modelo en almacen */
select c.color_id, color_nombre as color
from modelo_almacen ma join modelo_distribuido md on ma.modelo_distribuido_id = md.modelo_distribuido_id join modelo_distribuido_talla mdt on md.modelo_distribuido_id = mdt.modelo_distribuido_id join 
modelo m on m.modelo_id = md.modelo_id JOIN
modelo_Talla_color mtc on mtc.MDT_id = mdt.modelo_D_talla_id JOIN
color c on c.color_id = mtc.color_id
where m.modelo_id = 9 and ma.almacen_id = 1 and talla_id = 'G'


/*muestra la cantidad de un color de una talla de un modelo en almacen menos las ventas*/
select sum(a.cantidad-v.cantidad) from 
(
	select sum(mtc.cantidad) as cantidad
	from modelo_almacen ma join modelo_distribuido md on ma.modelo_distribuido_id = md.modelo_distribuido_id join modelo_distribuido_talla mdt on md.modelo_distribuido_id = mdt.modelo_distribuido_id join 
	modelo m on m.modelo_id = md.modelo_id JOIN
	modelo_Talla_color mtc on mtc.MDT_id = mdt.modelo_D_talla_id JOIN
	color c on c.color_id = mtc.color_id
	where m.modelo_id = 9 and ma.almacen_id = 1 and talla_id = 'CT' and c.color_id = 1

) as a,
(
	select ifnull(sum(cantidad), 0) as cantidad 
	from modelo_distribuido md join modelo_almacen ma on md.modelo_distribuido_id = ma.modelo_distribuido_id join
	modelo_vendido mv on mv.modelo_almacen_id = ma.modelo_almacen_id JOIN
	modelo_venta_talla mvt on mv.modelo_vendido_id = mvt.modelo_vendido_id join
	venta_talla_Color vtc on vtc.modelo_venta_Talla_id = mvt.modelo_venta_Talla_id
	where ma.almacen_id = 1 and md.modelo_id = 9 and talla_id = 'CT' and color_id = 1
) as v





/*Muestra las cantidades de colores por tallas ubicadas en un almacen y retorna los almacenadas en bodega*/
select a.talla, a.color, b.cantidad, a.cantidad, b.cantidad-a.cantidad as bodegaR
from coloresTallasModelo b, coloresTallasModeloD a 
GROUP by a.talla, a.color

select b.color_id, b.color, b.cantidad as bodega, a.cantidad as almacen,  b.cantidad-a.cantidad as bodegaR
from coloresTallasModelo b  join coloresTallasModeloD a on b.color = a.color
where b.color_id = 1 and a.talla = 'CT' and a.modelo = 9
GROUP by a.talla, b.color


select b.color_id, b.cantidad, a.cantidad, b.cantidad-a.cantidad as bodegaR
        from coloresTallasModelo b inner join coloresTallasModeloD a on b.color = a.color
        where b.color_id = 1 and a.talla = 'CT' and a.modelo = 9
		GROUP by a.talla



select color_id, color from coloresTallasModelo 
where color not in(
	select color from coloresTallasModeloD;
)

/*las tallas disponibles de un modelo en almacen*/
select a.talla, a.color, b.cantidad, a.cantidad, b.cantidad-a.cantidad as bodegaR
from coloresTallasModelo b inner join coloresTallasModeloD a on b.color = a.color
HAVING bodegaR > 11

/*Modelos en bodega con sus respectivas cantidades*/

/*modelos en almacen(es) */
select m.modelo_id, modelo_Nombre, ifnull(sum(cantidad), 0)
from modelo_almacen ma join modelo_distribuido md on ma.modelo_distribuido_id = md.modelo_distribuido_id join modelo_distribuido_talla mdt on md.modelo_distribuido_id = mdt.modelo_distribuido_id join 
modelo m on m.modelo_id = md.modelo_id
where m.modelo_id = 6

create procedure modeloBodega(modelo int)
BEGIN

	select m.modelo_id, modelo_Nombre, totalModeloEntregado(modelo)-ifnull(sum(cantidad), 0) as cantidad
	from modelo_almacen ma join modelo_distribuido md on ma.modelo_distribuido_id = md.modelo_distribuido_id join modelo_distribuido_talla mdt on md.modelo_distribuido_id = mdt.modelo_distribuido_id join 
	modelo m on m.modelo_id = md.modelo_id
	where m.modelo_id = modelo;

END


create procedure modeloBodegaT(modelo int)
BEGIN

	select m.modelo_id, modelo_Nombre, totalModeloEntregado(modelo)-ifnull(sum(cantidad), 0) as cantidad
	from modelo_distribuido md join modelo_distribuido_talla mdt on md.modelo_distribuido_id = mdt.modelo_distribuido_id join 
	modelo m on m.modelo_id = md.modelo_id
	where m.modelo_id = modelo;

END


/*Total de blusas entregadas de un modelo*/
create function totalModeloEntregado(modelo int)
returns int
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
end//

select talla_id, ifnull(sum(cantidad), 0) as cantidad from modelo_Distribuido md JOIN
modelo_almacen ma on ma.modelo_distribuido_id = md.modelo_distribuido_id JOIN
modelo_vendido mv on mv.modelo_almacen_id = ma.modelo_almacen_id JOIN
modelo_venta_talla mvt on mvt.modelo_vendido_id = mv.modelo_vendido_id JOIN
venta_talla_Color vtc on vtc.modelo_Venta_Talla_id = mvt.modelo_venta_Talla_id
where md.modelo_id = 3 and ma.almacen_id = 1
GROUP by talla_id

/* Consultas de Ventas */

/* cosulta de cantidad de una talla de un modelo almacenado en un almacen  almacen-vendidas */

select a.id, a.modelo, sum(a.cantidad-v.cantidad) from 
(
	select md.modelo_id, ifnull(sum(cantidad), 0) as cantidad from modelo_Distribuido md JOIN
	modelo_almacen ma on ma.modelo_distribuido_id = md.modelo_distribuido_id JOIN
	modelo_vendido mv on mv.modelo_almacen_id = ma.modelo_almacen_id JOIN
	modelo_venta_talla mvt on mvt.modelo_vendido_id = mv.modelo_vendido_id JOIN
	venta_talla_Color vtc on vtc.modelo_Venta_Talla_id = mvt.modelo_venta_Talla_id
	where md.modelo_id = 3 and ma.almacen_id = 1

) as v,
(
	select  m.modelo_id as id, m.modelo_nombre as modelo, ifnull(sum(mdt.cantidad), 0) as cantidad
            from modelo_almacen ma join modelo_distribuido md on ma.modelo_distribuido_id = md.modelo_distribuido_id join modelo_distribuido_talla mdt on md.modelo_distribuido_id = mdt.modelo_distribuido_id join 
            modelo m on m.modelo_id = md.modelo_id
            where m.modelo_id = 3 and ma.almacen_id = 1
) as a;


/*mostrar la cantidad de blusas vendidas por talla*/
select ifnull(sum(cantidad), 0) as cantidad from 
	venta_talla_Color vtc join 
	modelo_venta_Talla mvt on vtc.modelo_venta_talla_id = mvt.modelo_venta_Talla_id JOIN
	modelo_vendido mv on mv.modelo_vendido_id = mvt.modelo_vendido_id JOIN
	modelo_almacen ma on ma.modelo_almacen_id = mv.modelo_almacen_id
	where ma.modelo_distribuido_id = 26 and talla_id = 'CT' and ma.almacen_id = 1

/* consultar colores de un modelo en almacen */
select co.color_id, color_nombre from
	modelo_almacen ma join 
	modelo_distribuido md on ma.modelo_distribuido_id = md.modelo_distribuido_id JOIN
	modelo_distribuido_talla mdt on mdt.modelo_distribuido_id = md.modelo_distribuido_id join
	modelo_talla_color mtc on mtc.mdt_id = mdt.modelo_D_talla_id JOIN
	color co on co.color_id = mtc.Color_id
	where ma.almacen_id = 1 and md.modelo_id = 9 and talla_id = 'CT'
	GROUP by co.color_id


/* cosultar la cantidad de un color de un modelo almacenado en un almacen por talla almacen-vendidas */

select sum(a.cantidad-v.cantidad) from 
(
	select ifnull(sum(cantidad), 0) as cantidad from
	venta_talla_Color vtc join 
	modelo_venta_Talla mvt on vtc.modelo_venta_talla_id = mvt.modelo_venta_Talla_id JOIN
	modelo_vendido mv on mv.modelo_vendido_id = mvt.modelo_vendido_id JOIN
	modelo_almacen ma on ma.modelo_almacen_id = mv.modelo_almacen_id
	where ma.modelo_distribuido_id = 9 and talla_id = 'G' and ma.almacen_id = 1 and vtc.Color_id = 8

) as v,
(
	select ifnull(sum(mtc.cantidad), 0) as cantidad
            from modelo_almacen ma join modelo_distribuido md on ma.modelo_distribuido_id = md.modelo_distribuido_id join modelo_distribuido_talla mdt on md.modelo_distribuido_id = mdt.modelo_distribuido_id join 
            modelo m on m.modelo_id = md.modelo_id join
			modelo_talla_Color mtc on mdt.modelo_d_talla_id = mtc.mdt_id
            where m.modelo_id = 9 and mdt.talla_id = 'G' and ma.almacen_id = 1 and mtc.color_id = 8
) as a;




















/*Consultas para mostrar los datos de un modelo en bodega*/

/*Tallas de un modelo en bodega 1 */

select talla_id from corte_Entregado_Bodega ceb JOIN
corte c on c.corte_id = ceb.corte_id JOIN
corte_Talla ct on ct.Corte_id = c.Corte_id
where c.corte_modelo = 9
GROUP by talla_id

/*colores de una talla de un modelo en bodega 2 */

select co.color_id, color_nombre from corte_Entregado_Bodega ceb JOIN
corte c on c.corte_id = ceb.corte_id JOIN
corte_Talla ct on ct.Corte_id = c.Corte_id JOIN
corte_Talla_color ctc on ctc.Corte_Talla_id = ct.Corte_Talla_id JOIN
color co on co.color_id = ctc.Color_id
where c.corte_modelo = 9 and talla_id = 'CT'
GROUP BY co.color_id




/*Consultas de Ventas*/

/*Consultar las ventas con sus respecticas cantidades*/
select v.venta_id, venta_fecha, sum(cantidad) as cantidad, sum(cantidad*m.modelo_valor)
from venta v join modelo_vendido mv on v.venta_id = mv.venta_id JOIN
modelo_venta_Talla mvt on mvt.modelo_vendido_id = mv.modelo_vendido_id JOIN
venta_talla_Color vtc on vtc.modelo_Venta_Talla_id = mvt.modelo_Venta_Talla_id join
modelo_almacen ma on ma.modelo_almacen_id = mv.modelo_almacen_id JOIN
modelo_distribuido md on md.modelo_distribuido_id = ma.modelo_distribuido_id JOIN
modelo m on m.modelo_id = md.modelo_id
where venta_fecha BETWEEN '2020-05-01' AND '2020-05-03'
GROUP BY v.venta_id

/*ventas de un dia*/

create FUNCTION ventasAlmacen(almacen int, fechaI date, fechaF date)
returns INT
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


/*consultar los modelos de una venta*/
select m.modelo_id, modelo_nombre 
from modelo m join modelo_Distribuido md on  m.modelo_id = md.modelo_id JOIN
modelo_almacen ma on ma.modelo_distribuido_id = md.modelo_distribuido_id JOIN
modelo_vendido mv  on mv.modelo_almacen_id = ma.modelo_almacen_id JOIN
venta v on v.venta_id = mv.venta_id 
where v.venta_id = 8


/* consultar tallas de un modelo de una venta */
select talla_id 
from venta v join modelo_vendido mv on v.venta_id = mv.venta_id JOIN
modelo_venta_Talla mvt on mvt.modelo_vendido_id = mv.modelo_vendido_id JOIN
modelo_almacen ma on ma.modelo_almacen_id = mv.modelo_almacen_id JOIN
modelo_distribuido md on md.modelo_distribuido_id = ma.modelo_distribuido_id JOIN
modelo m on m.modelo_id = md.modelo_id
where v.venta_id = 8 and m.modelo_id = 3
GROUP BY talla_id;


/*consultar la cantidad de un talla de un modelo vendido*/
select sum(cantidad)
from venta v join modelo_vendido mv on v.venta_id = mv.venta_id JOIN
modelo_venta_Talla mvt on mvt.modelo_vendido_id = mv.modelo_vendido_id JOIN
venta_talla_Color vtc on vtc.modelo_venta_Talla_id = mvt.modelo_venta_Talla_id JOIN
modelo_almacen ma on ma.modelo_almacen_id = mv.modelo_almacen_id JOIN
modelo_distribuido md on md.modelo_distribuido_id = ma.modelo_distribuido_id JOIN
modelo m on m.modelo_id = md.modelo_id
where v.venta_id = 8 and m.modelo_id = 9 and talla_id = 'G'


/*consultar los colores de una talla de un modelo vendido*/
select c.color_id, color_Nombre
from venta v join modelo_vendido mv on v.venta_id = mv.venta_id JOIN
modelo_venta_Talla mvt on mvt.modelo_vendido_id = mv.modelo_vendido_id JOIN
venta_talla_Color vtc on vtc.modelo_venta_Talla_id = mvt.modelo_venta_Talla_id JOIN
Color c on c.color_id = vtc.Color_id JOIN
modelo_almacen ma on ma.modelo_almacen_id = mv.modelo_almacen_id JOIN
modelo_distribuido md on md.modelo_distribuido_id = ma.modelo_distribuido_id JOIN
modelo m on m.modelo_id = md.modelo_id
where v.venta_id = 8 and m.modelo_id = 9 and talla_id = 'CT'

/*consultar la cantidad de un color de una talla de un modelo vendido*/
select sum(cantidad)
from venta v join modelo_vendido mv on v.venta_id = mv.venta_id JOIN
modelo_venta_Talla mvt on mvt.modelo_vendido_id = mv.modelo_vendido_id JOIN
venta_talla_Color vtc on vtc.modelo_venta_Talla_id = mvt.modelo_venta_Talla_id JOIN
modelo_almacen ma on ma.modelo_almacen_id = mv.modelo_almacen_id JOIN
modelo_distribuido md on md.modelo_distribuido_id = ma.modelo_distribuido_id JOIN
modelo m on m.modelo_id = md.modelo_id
where v.venta_id = 8 and m.modelo_id = 9 and talla_id = 'P' and color_id = 8
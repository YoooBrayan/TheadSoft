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


/*consultar los id de los colores de una talla por corte*/
select corte_talla_color_id from corte_talla ct join corte_Talla_color  ctc on ctc.corte_talla_id = ct.corte_talla_id and corte_id = 47;
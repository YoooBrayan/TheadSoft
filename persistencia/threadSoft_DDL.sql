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

create table Operario(
   Operario_Id int not null,
   Operario_Nombre varchar(40) not null,
   Operario_Usuario int not null default 3,
   Operario_Correo varchar(50) not null,
   Operario_clave varchar(40) not null,
   primary key(Operario_Id),
   foreign key(Operario_Usuario) references Usuario(usuario_Id)
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
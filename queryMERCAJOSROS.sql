//// tablas 

create table usuarios(
cedula_rif character varying(50) NOT NULL,
nombres character varying(50) NOT NULL,
apellidos character varying(50) NOT NULL,
pais character varying(50) NOT NULL,
estado character varying(50) NOT NULL,
ciudad character varying(50) NOT NULL,
parroquia character varying(50) NOT NULL,
dirrecion character varying(50) NOT NULL,
email character varying(50) NOT NULL
)

create table sesion_on_off(
id serial,
statud character varying(30) NOT NULL,
cedula_rif character varying(30) NOT NULL
)

create table user_compra(
id serial,
hostname character varying(50) NOT NULL,
passw character varying(50) NOT NULL,
cedula_rif character varying(30) NOT NULL,
clase character varying(20) NOT NULL
)

create table user_mantenimiento(
id serial,
hostname character varying(50) NOT NULL,
passw character varying(50) NOT NULL,
cedula_rif character varying(30) NOT NULL
)

create table user_gerente(
id serial,
hostname character varying(50) NOT NULL,
passw character varying(50) NOT NULL,
cedula_rif character varying(30) NOT NULL
)

create table user_user(
id serial,
hostname character varying(50) NOT NULL,
passw character varying(50) NOT NULL,
cedula_rif character varying(30) NOT NULL
)

create table ventas(
id serial,
categorias character varying(50) NOT NULL,
nom_articulo character varying(35) NOT NULL,
precio real NOT NULL,
descripcion character varying(50) NOT NULL,
imagen character varying(50) NOT NULL,
imagen2 character varying(50),
imagen3 character varying(50),
imagen4 character varying(50),
imagen5 character varying(50),
imagen6 character varying(50)
)

create table realiza(
id serial,
id_uu integer,
hostname_uu character varying(50),
id_vent integer,
fecha_venta date,
tipo_plan character varying(15)
)

create table compra(
id serial,
id_art integer,
art_comprado character varying(50) NOT NULL,
cantidad integer,
prec_total real NOT NULL,
forma_pago character varying(50) NOT NULL
)

create table efectua(
id serial,
id_uu integer,
hostname_uu character varying(50),
id_comp integer,
fecha_comp date,
confirmacion character varying(15)
)

/// claves primarias

alter table usuarios add constraint pk_cedula_rif primary key(cedula_rif);
alter table sesion_on_off add constraint pk_id primary key(id);
alter table user_compra add constraint pk_u_c primary key(id, hostname);
alter table user_mantenimiento add constraint pk_u_m primary key(id, hostname);
alter table user_gerente add constraint pk_u_g primary key(id, hostname);
alter table user_user add constraint pk_u_u primary key(id, hostname);
alter table ventas add constraint pk_id_ventas primary key(id);
alter table realiza add constraint pk_id_realiza primary key(id);
alter table compra add constraint pk_id_compra primary key(id);
alter table efectua add constraint pk_id_efectua primary key(id);

//// Claves unicas
alter table user_compra add constraint uniq_id unique(id);
alter table user_compra add constraint uniq_hostname unique(hostname);

/// claves secundaria

alter table sesion_on_off add constraint fki_cedula_rif foreign key(cedula_rif) references usuarios(cedula_rif)
on update cascade on delete cascade;

alter table user_compra add constraint fki_u_c foreign key(cedula_rif) references usuarios(cedula_rif)
on update cascade on delete cascade;

alter table user_mantenimiento add constraint fki_u_m foreign key(cedula_rif) references usuarios(cedula_rif)
on update cascade on delete cascade;

alter table user_gerente add constraint fki_u_g foreign key(cedula_rif) references usuarios(cedula_rif)
on update cascade on delete cascade;

alter table user_user add constraint fki_u_u foreign key(cedula_rif) references usuarios(cedula_rif)
on update cascade on delete cascade;

alter table realiza add constraint fki_id_uu foreign key(id_uu) references user_compra(id)
on update cascade on delete cascade;

alter table realiza add constraint fki_hostname_uu foreign key(hostname_uu) references user_compra(hostname)
on update cascade on delete cascade;

alter table realiza add constraint fki_id_vent foreign key(id_vent) references ventas(id)
on update cascade on delete cascade;

alter table efectua add constraint fki_id_uu foreign key(id_uu) references user_compra(id)
on update cascade on delete cascade;

alter table efectua add constraint fki_hostname_uu foreign key(hostname_uu) references user_compra(hostname)
on update cascade on delete cascade;

alter table efectua add constraint fki_id_comp foreign key(id_comp) references compra(id)
on update cascade on delete cascade;

/////// funcion para registrar user_user///////
create or replace function registrar_user_user
(hostname1 character varying, 
passw1 character varying, 
cedula_rif1 character varying) returns boolean as 
$BODY$
Begin
INSERT INTO public.user_user(hostname, passw, cedula_rif)
    VALUES (hostname1, passw1, cedula_rif1);
    
	if found then
		return true;
	else
		return false;
	end if;
End;
$BODY$
language plpgsql;
////// fin de funcion //////////

/////// funcion para registrar user_gerente///////
create or replace function registrar_user_gerente
(hostname1 character varying, 
passw1 character varying, 
cedula_rif1 character varying) returns boolean as 
$BODY$
Begin
INSERT INTO public.user_gerente(hostname, passw, cedula_rif)
    VALUES (hostname1, passw1, cedula_rif1);
    
	if found then
		return true;
	else
		return false;
	end if;
End;
$BODY$
language plpgsql;
////// fin de funcion //////////

/////// funcion para registrar user_compra///////
create or replace function registrar_user_compra
(hostname1 character varying, 
passw1 character varying, 
cedula_rif1 character varying,
clase1 character varying) returns boolean as 
$BODY$
Begin
INSERT INTO public.user_compra(hostname, passw, cedula_rif, clase)
    VALUES (hostname1, passw1, cedula_rif1, clase1);
    
	if found then
		return true;
	else
		return false;
	end if;
End;
$BODY$
language plpgsql;
////// fin de funcion //////////

/////// funcion para registrar user_mantenimiento///////
create or replace function registrar_user_mantenimiento
(hostname1 character varying, 
passw1 character varying, 
cedula_rif1 character varying) returns boolean as 
$BODY$
Begin
INSERT INTO public.user_mantenimiento(hostname, passw, cedula_rif)
    VALUES (hostname1, passw1, cedula_rif1);
    
	if found then
		return true;
	else
		return false;
	end if;
End;
$BODY$
language plpgsql;
////// fin de funcion //////////


///////////funcion principal para registro de USUARIO /////////////
create or replace function registrar_usuario
(cedula_rif1 character varying,
  nombres1 character varying,
  apellidos1 character varying,
  pais1 character varying,
  estado1 character varying,
  ciudad1 character varying,
  parroquia1 character varying,
  dirrecion1 character varying,
  email1 character varying,
  typeuser1 character varying) returns boolean as 
$BODY$
Begin
INSERT INTO public.usuarios(cedula_rif, nombres, apellidos, pais, estado, ciudad, parroquia, dirrecion, email, typeuser)
    VALUES (cedula_rif1, nombres1, apellidos1, pais1, estado1, ciudad1, parroquia1, dirrecion1, email1, typeuser1);
    
	if found then
		return true;
	else
		return false;
	end if;
End;
$BODY$
language plpgsql;
////////////////////////////// fin de funcion /////////////////////////////////////


//////////////// Verificando Hostname ///////////////////////////
create or replace function verif_host_uu
(hostname1 character varying
) returns boolean as 
$BODY$
Begin
if (select hostname from user_user where hostname=hostname1) then
return true;
else
return false;
end if;

End;
$BODY$
language plpgsql;
////////////////////////////// fin de funcion /////////////////////////////////////


////////////////////////////// Inicio de TRIGERRR /////////////////////////////////////
CREATE OR REPLACE FUNCTION public.activar_estado(
    id1 integer,
    disponible1 integer)
  RETURNS boolean AS
$BODY$
BEGIN
	if disponible1 = 0 then
		UPDATE ventas SET disponible=disponible1, estado='VENDIDO' WHERE id=id1 ;

		if found then
			return true;
		else
			return false;
		end if;
	else
		UPDATE ventas SET disponible=disponible1 WHERE id=id1;

		if found then
			return true;
		else
			return false;
		end if;
	end if;
END;
$BODY$
  LANGUAGE plpgsql

////////////////////////////// fin de TRIGGERR /////////////////////////////////////

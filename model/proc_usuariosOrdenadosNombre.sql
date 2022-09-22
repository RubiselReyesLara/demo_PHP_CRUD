use demo
go
create procedure obtenerUsuarios_ordenadosNombre
as begin
select * from Usuario order by nacimiento ASC
end
use demo
go
create procedure obtenerUsuarios_ordenadosNacimiento
as begin
select * from Usuario order by nacimiento ASC
end
CREATE PROC actualizarUsuario_porID
	@id int,
	@nombre varchar(35),
	@apellidos varchar(60),
	@nacimiento date,
	@ciudad_estado varchar(70),
	@usuario varchar(30),
	@correo varchar(50)
AS
	SET NOCOUNT ON;
	UPDATE Usuario
	SET nombre = @nombre,apellidos = @apellidos, nacimiento = @nacimiento, ciudad_estado = @ciudad_estado, usuario = @usuario, correo = @correo
	WHERE id=@id;
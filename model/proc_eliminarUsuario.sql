use demo
go
CREATE PROC eliminarUsuario
	@id int
AS
	SET NOCOUNT ON;
	DELETE FROM Usuario WHERE id = @id;
go

use demo
go
CREATE PROC obtenerUsuario_porID
	@id int
AS
	SET NOCOUNT ON;
	SELECT * FROM Usuario WHERE id = @id

EXEC obtenerUsuario_porID 1;
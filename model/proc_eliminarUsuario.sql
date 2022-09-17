use demo

CREATE PROC eliminarUsuario
	@id int
AS
	SET NOCOUNT ON;
	DELETE FROM Usuario WHERE id = @id;

EXEC eliminarUsuario 1;
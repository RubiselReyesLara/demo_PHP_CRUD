<?php 
class Usuario {
    private $id;
    private $nombre;
    private $apellidos;
    private $nacimiento;
    private $ciudad_estado;
    private $usuario;
    private $correo;
    private $contrasena;
    private $conexion;

    public function __construct(){
        $nombreServidor = 'DESKTOP-CHKNDLF\SQLEXPRESS';
        $infoConexion = array('Database'=>'demo');
        $this->conexion = sqlsrv_connect($nombreServidor, $infoConexion);
    }
            
    public function ingresarUsuario($nombre, $apellido, $nacimiento, $ciudad_estado, $usuario, $correo, $contrasena) {
        $this->nombre = $nombre;
        $this->apellidos = $apellido;
        $this->nacimiento = $nacimiento;
        $this->ciudad_estado = $ciudad_estado;
        $this->usuario = $usuario;
        $this->correo = $correo;
        $this->contrasena = password_hash($this->contrasena, PASSWORD_BCRYPT);

        $consulta = 'INSERT INTO Usuario (nombre, apellidos, nacimiento, ciudad_estado, usuario, correo, contrasena) 
                VALUES(?, ?, ?, ?, ?, ?, ?)';
        $declaracion = sqlsrv_prepare($this->conexion, $consulta, 
                                      array(&$this->nombre, &$this->apellidos, &$this->nacimiento, 
                                      &$this->ciudad_estado, &$this->usuario, &$this->correo, &$this->contrasena));
        
        if(!$declaracion) {
            die( print_r( sqlsrv_errors(), true));
        }
                
        if(sqlsrv_execute( $declaracion )) {
            // Tu IP local o la del servidor. En mi caso 192.168.1.152
            header("Location: http://localhost/demo/view/registro.php?msg=".'Usuario agregado correctamente');
        } else {
            die( print_r( sqlsrv_errors(), true));
        }
    }

    public function lecturaUsuarios($consulta) {
        return $this->retornoInfo_Usuarios($consulta);
    }

    public function eliminarUsuario($id) {
        $consulta = 'exec eliminarUsuario ?';
        $declaracion = sqlsrv_prepare($this->conexion, $consulta, array($id));

        if(!$declaracion) {
            die( print_r( sqlsrv_errors(), true));
        }
                
        if(sqlsrv_execute( $declaracion )) {
            // Tu IP local o la del servidor. En mi caso 192.168.1.152
            header("Location: http://localhost/demo/view/visualizar.php");
        } else {
            die( print_r( sqlsrv_errors(), true));
        }
    }

    public function actualizarUsuario($id, $nombre, $apellido, $nacimiento, $ciudad_estado, $usuario, $correo) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellido;
        $this->nacimiento = $nacimiento;
        $this->ciudad_estado = $ciudad_estado;
        $this->usuario = $usuario;
        $this->correo = $correo;

        $consulta = 'exec actualizarUsuario_porID ?, ?, ?, ?, ?, ?, ?';
        $declaracion = sqlsrv_prepare($this->conexion, $consulta, 
                              array(&$this->id, &$this->nombre, &$this->apellidos, &$this->nacimiento, 
                              &$this->ciudad_estado, &$this->usuario, &$this->correo));
        if(!$declaracion) {
            die( print_r( sqlsrv_errors(), true));
        }
                        
        if(sqlsrv_execute( $declaracion )) {
            header("Location: http://localhost/demo/view/visualizar.php");
        } else {
            die( print_r( sqlsrv_errors(), true));
        }

    }

    private function retornoInfo_Usuarios($consulta){
        $declaracion = sqlsrv_query($this->conexion, $consulta);
        
        if( $declaracion === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
        $resultado = array();

        while( $row = sqlsrv_fetch_array($declaracion)) {
            array_push($resultado, 
                        array($row['id'], $row['nombre'], $row['apellidos'],
                              date_format($row['nacimiento'],"Y/m/d"), 
                              $row['ciudad_estado'], $row['usuario'], 
                              $row['correo'], $row['contrasena']));
        }
    
        sqlsrv_free_stmt($declaracion);
        return $resultado;
    }
}
?>
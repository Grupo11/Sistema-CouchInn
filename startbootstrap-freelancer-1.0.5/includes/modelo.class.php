<?php

class Modelo {

/* ESTADOS DE LAS SUBASTAS:
	0=ACTIVA
	1=TERMINADA
	2=
	3=CANCELADA 
*/
	
	private static $instancia;
	
	private static $user = 'root';
	private static $pass = '';
	private static $host = 'localhost';
	private static $dbnm = 'couchinn';
	
	private $con;
	
	private $order = 'fecha_ini DESC';
	
	function __construct() {
		$this->con = new mysqli(
			self::$host,
			self::$user,
			self::$pass,
			self::$dbnm);
		$this->con->set_charset("utf8");
	}
	
	public function setOrder($orden){
		$this->order = $orden;
	}
	
	private function order(){
		return " ORDER BY  {$this->order} ";
	}
	

	public static function getInstance(){
		if (  !self::$instancia instanceof self)
		{
			self::$instancia = new self;
		}
		return self::$instancia;

	}	
	public function getUserName($id){
		$res = $this->con->query("SELECT * FROM usuario WHERE id = '{$id}' ");
		$fila = array();
		$fila[] = $res->fetch_assoc() ;
		$resultado = $fila[0]['user'];
	return $resultado;
	}

	//NUEVA FUNCION DE VERIFICAR QUE SI FUNCIONA, PERO HACE MAS LABURO
	public function verifyUser($user, $pass){
		
		$res = $this->con->query("SELECT * FROM usuario");
		while( $fila = $res->fetch_assoc() ){
			if($fila['user'] == $user){
				if( $fila['password'] == $pass ) return $fila;
				else{ ?><p class="center red-text"> Contraseña Invalida </p> <?php return false;} 
			}
		}
		?><p class="center red-text"> Usuario Invalido </p> <?php
		return false;
				
	}
	

	

	
	//Verifica que el nombre de usuario no esté en la base de datos.
	public function usuarioNoExiste($username){
		$resul=$this->con->query(
			"SELECT * FROM usuario WHERE user = '{$username}' "
		);
		if ($resul->num_rows == 0){
			return true;
		}
		else{
			return false;
		}		
	}
	
	//Crea un usuario nuevo siempre y cuando no exista el username en la base de datos.
	public function crearUsuarioNuevo($password, $localidad, $user, $nombre, $apellido,$telefono){
		
		if ($this->usuarioNoExiste($user)){
			$token = md5($user.rand());
			if($this->con->query("INSERT INTO `usuario` (`password`, `localidad`, `user`, `nombre`, `apellido`, `telefono`,token) VALUES ('{$password}', '{$localidad}', '{$user}', '{$nombre}', '{$apellido}', '{$telefono}','{$token}')")
			){
			$respuesta = "Se creo el usuario exitosamente";	
			}
			else{
			$respuesta = "Error al crear usuario [DB ERROR]";
			}
		}
		else {
			$respuesta = "El nombre de usuario elegido ya existe";
		}
	return $respuesta;
	}
	//Crea un usuario nuevo siempre y cuando no exista el username en la base de datos.
	public function actualizarUsuario($viejo, $nuevo){
		$respuesta = '';
		if( $viejo['user'] != $nuevo['user'] ){
			if(!$this->usuarioNoExiste($nuevo['user'])){
				$respuesta .= 'El nombre de usuario elegido ya existe';
			}else{
				$this->con->query("UPDATE usuario SET user = '{$nuevo['user']}' WHERE id = '{$viejo['id']}'");
			}
		}

		$this->con->query("UPDATE usuario SET
				nombre = '{$nuevo['nombre']}' ,
				apellido = '{$nuevo['apellido']}' ,
				user = '{$nuevo['user']}',
				password = '{$nuevo['password']}'
			WHERE id = '{$viejo['id']}'");

		return $respuesta;
		//tarjeta_credito = '{$nuevo['tarjeta_credito']}' ,
	}
	
	public function setRespuesta($respuesta,$idcomentario){
		$this->con->query("UPDATE `comentario` SET `respuesta`= '{$respuesta}' WHERE id = '{$idcomentario}'");
	}
	public function getAllCategories(){
		$res = $this->con->query("SELECT c.id, c.nombre, (SELECT COUNT(*) FROM hospedaje h WHERE h.id_tipo = t.id AND ) items FROM tipo c");
		
		$resultado = array();
		while( $fila = $res->fetch_assoc() ){
			$resultado[] = $fila;
		}
		return $resultado;
	}	
	
	
	
	
	public function getUser($id){
		$res = $this->con->query("SELECT * FROM usuario WHERE id = '{$id}' ");
		$fila = array();
		$fila[] = $res->fetch_assoc() ;
		$resultado = $fila[0];
		return $resultado;
	}
	
	public function getUserByEmail($email){
		$res = $this->con->query("SELECT * FROM usuario WHERE user = '{$email}' ");
		if($res->num_rows)
			return $res->fetch_assoc();
		else
			return 0;
	}
	public function getUserByToken($token){
		$res = $this->con->query("SELECT * FROM usuario WHERE token = '{$token}' ");
		if($res->num_rows)
			return $res->fetch_assoc();
		else
			return 0;
	}


	public function backupUser($id){
		$this->con->query("UPDATE `usuario` SET `deleted`= '0' WHERE id = '{$id}' ");
	}
	public function deleteUser($id){
		$this->con->query("UPDATE `usuario` SET `deleted`= '1' WHERE id = '{$id}' ");
		$this->con->query("UPDATE `producto` SET `estado`= '3' WHERE id_usuario = '{$id}' AND estado = 0 ");
		$this->con->query("UPDATE `venta` SET `canceled`= '1' WHERE id_usuario = '{$id}' ");
	}

	


	
	
	
	





	
}
	
	
	
?>

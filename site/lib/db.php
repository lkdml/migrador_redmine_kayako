<?php
class baseDeDatos {

	protected $conexion;
	protected $dbUser;
	protected $dbHost;
	protected $dbPass;
	protected $dbBase;
	public $query;
		
	function __construct() {
		$this->query = 0;
	}
	
	function __destruct() {}
	
	function consultar($consulta) {
		$resultado = mysql_query($consulta, $this->conexion);
		var_dump($this->conexion); die;
		return $resultado;
	}
	
	
}
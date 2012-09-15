<?php
class dbKayako extends baseDeDatos {
	protected $dbUser = DB_KUSER;
	protected $dbHost = DB_KHOST;
	protected $dbPass = DB_KPASS;
	protected $dbBase = DB_KBASE;

	function __construct() {
		$this->conexion = mysql_connect($this->dbHost, $this->dbUser, $this->dbPass);  
		if (!(mysql_select_db(DB_KBASE, $this->conexion))) echo "error al conectar con la base de datos ".$this->dbBase ;
	}
	
	function __destruct() {
		mysql_close($this->conexion);
	}
	
	
}
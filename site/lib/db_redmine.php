<?php
class dbRedmine extends baseDeDatos {
	protected $dbUser = DB_RUSER;
	protected $dbHost = DB_RHOST;
	protected $dbPass = DB_RPASS;
	protected $dbBase = DB_RBASE;

	function __construct() {
		$this->conexion = @mysql_connect($this->dbHost, $this->dbUser, $this->dbPass);  
		if (!(mysql_select_db(DB_KBASE, $this->conexion))) echo "error al conectar con la base de datos ".$this->dbBase ;
	}
		
	function traerListadoIssues() {
		$this->query = "select iss.id, tr.name as tipo, ps.name as cliente, iss.subject, iss.description, py.name,". 
						"iess.name as status, iss.created_on, iss.updated_on, us.login as assigned, us.login as author".
						"from redmine.issues iss ".
						"LEFT JOIN redmine.trackers tr ON iss.tracker_id = tr.id". 
					    "LEFT JOIN redmine.projects ps ON iss.project_id = ps.id".
					    "LEFT JOIN redmine.issue_statuses iess ON iss.status_id = iess.id".
					    "LEFT JOIN (select id, name, type from redmine.enumerations where type = 'IssuePriority') py ON iss.priority_id = py.id".
					    "LEFT JOIN redmine.users ON iss.assigned_to_id = us.id".
					    "LEFT JOIN redmine.users ON iss.author_to_id = us.id".
						"where iss.status_id <= 5";
		$resultado = $this->consultar($this->query);
		var_dump($resultado); die;
		return $resultado;
	}
	
	
	
	function __destruct() {
		mysql_close($this->conexion);
	}
	
	
}
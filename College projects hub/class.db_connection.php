<?php
//echo 'lets get connected!';
class db_connection
{
	protected $conn;
	public $host = 'localhost';
	public $user = 'root';
	public $password = '';
	public $dbname = 'miniproject';

	function connect()
	{
		//$dsn = "mysql:host=$this->host dbname=$this->dbname";
		try
		{
			$this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
			return $this->conn;
		}
		catch (PDOException $e)
		{
			echo 'error';
		}
		
	}
}
?>
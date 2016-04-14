<?php
/**
* class for data base connection
*/
class MySqlConnection
{
    /**
    * @var object 
    */
	public $pdo;


    /**
    * Create a new connection.
    *
    * @param  string $host
    * @param  string $user
    * @param  string $password
    * @param  string $dbname
    * @param  string $dbt_name
    */
    function __construct($host, $user, $password, $db_name)
	{
		$this->host = $host;
		$this->user = $user;
		$this->password = $password;
		$this->db_name = $db_name;
		//$this->dbt_name = $dbt_name;
		$this->charset = "utf8";
	}

    /**
    * Set name of table.
    *
    * @param  string $table_name
    *
    */
	public function SetTableName($table_name)
	{
		$this->dbt_name = $table_name;
	}
	/**
    * Set a new connection.
    *
    */
	public function SetConnection()
	{
	 	$dsn = "mysql:host=$this->host;dbname=$this->db_name;charset=$this->charset";
		$opt = array(
    			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		);
		$this->pdo = new PDO($dsn, $this->user, $this->password, $opt);

	}

	/**
	*
    * @return object
    */
	public function GetPdo()
	{
		return $this->pdo;
	}

    /**
    * @return string
    */
	public  function getTableName()
	{

		return $this->dbt_name;
	}
}
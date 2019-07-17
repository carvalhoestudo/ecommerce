<?php 
namespace Hcode\DB;

class Sql {

	const HOSTNAME = "localhost";
	const USERNAME = "root";
	const PASSWORD = "";
	const DBNAME = "db_ecommerce";

	private $conn;

	public function __construct()

	{

		$this->conn = new \PDO(
			"mysql:dbname=".Sql::DBNAME.";host=".Sql::HOSTNAME, 
			Sql::USERNAME,
			Sql::PASSWORD
		);

<<<<<<< HEAD
		$this->conn->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
=======
>>>>>>> 667deb804ded642634f2a9eba91a649e858a3300
	}

	private function setParams($statement, $parameters = array())
	{
		foreach ($parameters as $key => $value) {
			
			$this->bindParam($statement, $key, $value);

		}
	}

	private function bindParam($statement, $key, $value)
	{

		$statement->bindParam($key, $value);

	}

	public function query($rawQuery, $params = array())
	{

		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

	}
<<<<<<< HEAD
	
=======

>>>>>>> 667deb804ded642634f2a9eba91a649e858a3300
	public function select($rawQuery, $params = array()):array
	{

		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);

	}
	
}
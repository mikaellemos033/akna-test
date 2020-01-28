<?php

namespace Sect\Database;

use \PDO;

class DB
{
	private static $instance = null;

	private $pdo;

	public function __construct(DBConfig $config)
	{
		$this->connect($config);
	}

	private function connect(DBConfig $config)
	{
		$this->pdo = new PDO(
			sprintf('%s:host=%s;dbname=%s;charset=UTF8', $config->drive, $config->host, $config->dbname), 
			$config->user, 
			$config->password
		);

		$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	

	public function getConnection()
	{
		return $this->pdo;
	}
}
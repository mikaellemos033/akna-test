<?php 

namespace Sect\Database\Operation;

use PDO;

class Insert extends ORM
{
	public function run($table, $model)
	{
		$params = array_filter(get_object_vars($model));
		$fields = $this->fields($params);
		$this->query = sprintf('INSERT INTO %s (%s) VALUES (%s)', $table, str_replace(':', '', implode(',', $fields)), implode(',', $fields));
		$this->binds = $params;

		return $this->execute();
	}

	public function execute()
	{
		parent::execute();
		return $this->pdo->lastInsertId();		
	}

	private function fields(array $params)
	{
		$fields = [];		
		$keys   = isset($params[0]) ? $params[0] : $params;

		foreach (array_keys($keys) as $key) $fields[] = ':' . $key;
		return $fields;
	}
}
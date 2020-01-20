<?php 

namespace Sect\Database\Operation;

use PDO;

class Select extends ORM
{
	public function run($table, array $fields = [])
	{
		$fields = empty($fields) ? ['*'] : $fields;
		$this->query = sprintf('SELECT %s FROM %s', implode(',', $fields), $table);

		return $this;
	}

	public function exists($table, $value, $column = 'id') {
		$this->query = sprintf('SELECT * FROM %s where %s = "%s" limit 1', $table, $column, $value);
		return $this;
	}

	public function limit($limit) {
		$this->query = sprintf('%s limit %s', $this->query, $limit);
		return $this;
	}

	public function execute()
	{
		$query = parent::execute();		
		return $query->fetchAll(PDO::FETCH_CLASS);
	}
}
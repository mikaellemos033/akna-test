<?php

namespace App\Repository;

use Sect\Database\DB;
use Sect\Database\Operation\Select;

abstract class BaseRepository {

  private $connect;

  public function __construct(DB $connect) {
    $this->connect = $connect;
  }

  protected function getConnect() {
    return $this->connect->getConnection();
  }

  abstract public function getTable(): string;
  
  public function findById(int $id) {
    $select = new Select($this->getConnect());
    $response = $select->run($this->getTable())
                       ->where('id = :id', ['id' => $id])
                       ->limit(1)
                       ->execute();

    if (count($response)) {
      return $response[0];
    }

    return null;
  }

  public function findByName(string $name) {
    $select = new Select($this->getConnect());
    $response = $select->run($this->getTable(), ['*'])
                       ->where('name = :name', ['name' => $name])
                       ->limit(1)
                       ->execute();

    if (count($response)) {
      return $response[0];
    }

    return null;
  }
}
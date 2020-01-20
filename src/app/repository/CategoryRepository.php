<?php

namespace App\Repository;

use \PDO;
use App\Model\Category;
use Sect\Database\Operation\Insert;

class CategoryRepository {
  
  private $connect;

  public function __construct(PDO $connect) {
    $this->connect = $connect;
  }

  public function createIfNotExists(Category $category) {
    $insert = new Insert($this->connect);
    $select = new Select($this->connect);
    $exists = $select->exists(Category::TABLE_NAME, $category->name, 'name')->execute();

    if (count($exists)) return $exists[0];
    return $db->run(Category::TABLE_NAME, $category);
  }

}
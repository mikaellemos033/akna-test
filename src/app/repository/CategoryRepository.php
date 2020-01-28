<?php

namespace App\Repository;

use \PDO;
use App\Model\Category;
use Sect\Database\Operation\Select;
use Sect\Database\Operation\Insert;

class CategoryRepository extends BaseRepository {

  public function createIfNotExists(Category $category) {
    $insert = new Insert($this->getConnect());
    $select = new Select($this->getConnect());
    $exists = $select->exists(Category::TABLE_NAME, $category->name, 'name')->execute();

    if (count($exists)) return $exists[0];
    return $insert->run(Category::TABLE_NAME, $category);
  }

  public function getTable(): string {
    return Category::TABLE_NAME;
  }

}
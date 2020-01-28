<?php

namespace App\Repository;

use \PDO;
use App\Model\Product;
use Sect\Database\Operation\Select;
use Sect\Database\Operation\Insert;

class ProductRepository extends BaseRepository {

  public function createIfNotExists(Product $product) {
    $insert = new Insert($this->getConnect());
    $select = new Select($this->getConnect());
    $exists = $select->exists(Product::TABLE_NAME, $product->name, 'name')->execute();

    if (count($exists)) return $exists[0];
    return $insert->run(Product::TABLE_NAME, $product);
  }

  public function getTable(): string {
    return Product::TABLE_NAME;
  }
}
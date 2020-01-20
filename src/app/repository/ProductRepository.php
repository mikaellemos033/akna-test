<?php

namespace App\Repository;

use \PDO;
use App\Model\Product;
use Sect\Database\Operation\Insert;

class ProductRepository {
  
  private $connect;

  public function __construct(PDO $connect) {
    $this->connect = $connect;
  }

  public function createIfNotExists(Product $category) {
    $insert = new Insert($this->connect);
    $select = new Select($this->connect);
    $exists = $select->exists(Product::TABLE_NAME, $product->name, 'name')->execute();

    if (count($exists)) return $exists[0];
    return $db->run(Product::TABLE_NAME, $product);
  }
}
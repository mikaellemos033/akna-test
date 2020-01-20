<?php

namespace App\Repository;

use \PDO;
Use App\Model\Shop;
use Sect\Database\Operation\Insert;

class ShopRepository {
  
  private $connect;

  public function __construct(PDO $connect) {
    $this->connect = $connect;
  }

  public function createIfNotExists(Shop $shop) {
    $insert = new Insert($this->connect);
    $select = new Select($this->connect);
    $exists = $select->run(Shop::TABLE_NAME)
                     ->where(
                       'product_id = :product and month = :month', 
                       ['month' => $shop->month, 'product' => $shop->product_id]
                     )
                     ->limit(1)
                     ->execute();

    if ($exists) return $exists;
    return $db->run(Shop::TABLE_NAME, $shop);
  }
}
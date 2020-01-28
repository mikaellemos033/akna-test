<?php

namespace App\Repository;

use \PDO;
Use App\Model\Shop;
use Sect\Database\Operation\Select;
use Sect\Database\Operation\Insert;

class ShopRepository extends BaseRepository {
  
  public function createIfNotExists(Shop $shop) {
    $insert = new Insert($this->getConnect());
    $select = new Select($this->getConnect());
    $exists = $select->run(Shop::TABLE_NAME)
                     ->where(
                       'product_id = :product and month = :month', 
                       ['month' => $shop->month, 'product' => $shop->product_id]
                     )
                     ->limit(1)
                     ->execute();

    if ($exists) return $exists;
    return $insert->run(Shop::TABLE_NAME, $shop);
  }

  public function getTable(): string {
    return Shop::TABLE_NAME;
  }
  
}
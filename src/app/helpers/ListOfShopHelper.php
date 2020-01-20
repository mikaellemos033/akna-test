<?php

namespace App\Helpers;

class ListOfShopHelper {

  const FILE_NAME = 'resources.replaces';
  
  public static function replaces(array $listOfShops) {

    $replaces = DataResourceUtil::getData(ListOfShopHelper::FILE_NAME);

    foreach ($listOfShops as &$categories) {
      foreach($categories as &$products) {
        foreach ($products as $product => $quantity) {
          if (!array_key_exists($product, $replaces)) {
            $products[$replaces[$product]] = $quantity;
            unset($products[$product]);
          }
        }
      }
    }

    return $listOfShops;
  }

}
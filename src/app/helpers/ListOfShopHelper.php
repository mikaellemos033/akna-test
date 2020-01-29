<?php

namespace App\Helpers;

use App\Utils\DataResourceUtil;
use App\Utils\Environment;

class ListOfShopHelper {

  const FILE_NAME = 'resources.replaces';
  
  public static function replaces(array $listOfShops) {

    $replaces = DataResourceUtil::getResource(Environment::getEnvironment(ListOfShopHelper::FILE_NAME));

    foreach ($listOfShops as &$categories) {
      
      foreach($categories as &$products) {        
        foreach ($products as $product => $quantity) {
          if (array_key_exists($product, $replaces)) {            
            unset($products[$product]);
            $products[$replaces[$product]] = $quantity;
          }
        }
      }
      
    }

    return $listOfShops;
  }

}
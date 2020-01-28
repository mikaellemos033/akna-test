<?php

namespace App\Data;

Use App\Utils\DataResourceUtil;
Use App\Utils\Environment;
use App\Helpers\ListOfShopHelper;

class ListShopData {

  const KEY = 'resources.list-shop';

  public static function getData() {
    $listOfShops = DataResourceUtil::getData(Environment::getEnvironment(ListShopData::KEY));        
    return ListOfShopHelper::replaces($listOfShops);
  }

}
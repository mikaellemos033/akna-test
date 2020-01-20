<?php

namespace App\Data;

Use App\Util\DataResourceUtil;
Use App\Util\Environment;
use App\Helpers\ListOfShopHelper;

class ListShopData {

  const KEY = 'resources.list-shop';

  public static function getData() {
    $listOfShops = DataResourceUtil::getData(Enviroment::getEnvironment(ListShopData::KEY));
    return ListOfShopHelper::replaces($listOfShops);
  }

}
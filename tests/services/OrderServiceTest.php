<?php

use App\Services\OrderService;
use App\Data\ListShopData;
use App\Utils\DataResourceUtil;
use App\Utils\Environment;

class OrderServiceTest extends PHPUnit_Framework_TestCase {

  public function __construct() {
    DataResourceUtil::setRootDir('.');
    $configResource = DataResourceUtil::getData('environments/environment.php');
    Environment::setEnvironments($configResource);   
  }

  public function testOrder() {
    $service = new OrderService();
    $monthSort = ['janeiro', 'fevereiro', 'marco', 'abril', 'maio', 'junho'];
    $listOfShops = $service->order(ListShopData::getData());

    $this->assertEquals($monthSort, array_keys($listOfShops));
  }

}
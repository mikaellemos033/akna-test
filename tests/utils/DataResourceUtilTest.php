<?php

use App\Utils\DataResourceUtil;

class DataResourceUtilTest extends PHPUnit_Framework_TestCase {

  public function testGetResource() {    
    DataResourceUtil::setRootDir('.');
    $replaces = DataResourceUtil::getResource('replaces.php');

    $this->assertNotEmpty($replaces);
  }
}
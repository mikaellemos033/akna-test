<?php

use App\Utils\DataResourceUtil;

class DataResourceUtilTest extends PHPUnit_Framework_TestCase {

  public function testGetResource() {    
    DataResourceUtil::setRootDir('.');
    $replaces = DataResourceUtil::getData('replaces.php');

    $this->assertNotEmpty($replaces);
  }
}
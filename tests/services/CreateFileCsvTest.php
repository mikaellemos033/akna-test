<?php

use App\Services\CreateFileCsv;

class CreateFileCsvTest extends PHPUnit_Framework_TestCase {
  
  const FILE_NAME = 'tmp/mikaellemos.csv';

  public function testCreateFile() {
    $service = new CreateFileCsv();
    $rows = [['name', 'age', 'email'], ['mikael lemos', '22', 'mikaellemos033@gmail.com']];
    $service->createFile(CreateFileCsvTest::FILE_NAME, $rows);

    $this->assertTrue(file_exists(CreateFileCsvTest::FILE_NAME));
  }

}
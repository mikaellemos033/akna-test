<?php

namespace App\Jobs;

use App\Data\ListShopData;
use App\Services\CreateFileCsv;
use App\Services\ConvertListShopCsv;

class CreateFileJob implements JobLayer {
  
  const FILE_NAME = 'tmp/lista-de-produtos.csv';

  public function handle() {
    $convertCsv = new ConvertListShopCsv();
    $createFileCsv = new CreateFileCsv();

    $createFileCsv->createFile(CreateFileJob::FILE_NAME, $convertCsv->convert(ListShopData::getData()));
  }

}
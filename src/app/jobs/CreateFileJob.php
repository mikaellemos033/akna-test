<?php

namespace App\Jobs;

use App\Data\ListShopData;
use App\Services\CreateFileCsv;
use App\Services\ConvertListShopCsv;
use SantoConsole\Job\JobConsole;

class CreateFileJob extends JobConsole {
  
  public static $command = "to:csv";

  public static $description = "convertando array para csv";

  public $params = [];

  const FILE_NAME = 'tmp/lista-de-produtos.csv';

  public function run() {
    
    $this->comment->success("GERANDO ARQUIVO\n");

    $convertCsv = new ConvertListShopCsv();
    $createFileCsv = new CreateFileCsv();

    $createFileCsv->createFile(CreateFileJob::FILE_NAME, $convertCsv->convert(ListShopData::getData()));

    $this->comment->success("ARQUIVO GERADO\n");
  }

}
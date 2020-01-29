<?php

namespace App\Jobs;

use App\Data\ListShopData;
use App\Services\CreateFileCsv;
use App\Services\ConvertListShopCsv;
use App\Services\OrderService;
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
    $orderData = new OrderService();
    $listShops = $orderData->order(ListShopData::getData());

    $createFileCsv->createFile(CreateFileJob::FILE_NAME, $convertCsv->convert($listShops));
    $this->comment->success("ARQUIVO GERADO\n");
  }

}
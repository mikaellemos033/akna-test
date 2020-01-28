<?php

namespace App;

use App\Utils\DataResourceUtil;
use App\Utils\Environment;
use App\Jobs\CreateFileJob;
use App\Jobs\SaveShopJob;
use SantoConsole\Command;

class MainApplication {

  public static function main($argv) {
    DataResourceUtil::setRootDir(sprintf("%s/../..", __DIR__));
    
    $configResource = DataResourceUtil::getData('../environments/environment.php');
    $command = new Command();
    
    Environment::setEnvironments($configResource);    

    $command->setCommands([
      CreateFileJob::class,
      SaveShopJob::class,
    ]);

    $command->run($argv);
  }

}
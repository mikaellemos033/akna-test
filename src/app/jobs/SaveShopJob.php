<?php

namespace App\Jobs;

use SantoConsole\Job\JobConsole;
use App\Data\ListShopData;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use App\Repository\ShopRepository;
use App\Services\CategoryService;
use App\Services\ProductService;
use App\Services\ShopService;
use App\Db\Connection;

class SaveShopJob extends JobConsole {

  public static $command = "to:save";

  public static $description = "persistindo dados na base";

  public $params = [];

  public function run() {
    
    $this->comment->success("INICIANDO CADASTRO\n");

    $listShops = ListShopData::getData();
    
    $categoryRepository = new CategoryRepository(Connection::instance());
    $productRepository = new ProductRepository(Connection::instance());
    $shopRepository = new ShopRepository(Connection::instance());

    $productService = new ProductService($productRepository, $categoryRepository);
    $categoryService = new CategoryService($categoryRepository);
    $shopService = new ShopService($productRepository, $shopRepository);
    
    $categoryService->create($listShops);
    $productService->create($listShops);
    $shopService->create($listShops);

    $this->comment->success("FINALIZANDO CADASTRO\n");

  }

}
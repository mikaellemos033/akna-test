<?php

namespace App\Services;

use App\Exception\ORMException;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use App\Repository\ShopRepository;
use App\Model\Shop;
use App\Model\Product;
use App\Utils\MonthUtil;

class ShopService {

  private $productRepository;
  private $shopRepository;

  public function __construct(ProductRepository $productRepository, ShopRepository $shopRepository) {

    $this->productRepository = $productRepository;
    $this->shopRepository = $shopRepository;
  
  }

  public function create(array $inputs) {    
    
    $shops = $this->parse($inputs);

    foreach ($shops as $shop) {
      $this->shopRepository->createIfNotExists($shop);
    }
  }

  private function parse(array $inputs): array {
        
    $shops = [];
    $products = $this->loadProducts($inputs);

    foreach ($inputs as $month => $categories) {
      foreach($categories as $category => $_products) {

        foreach ($_products as $product => $quantity) {          
          $shop = new Shop();
          $shop->product_id = $products[$product]->id;
          $shop->quantity = $quantity;
          $shop->month = MonthUtil::getMonthByText($month);

          $shops[] = $shop;
        }

      }
    }

    return $shops;
  }  

  private function loadProducts(array $inputs) {
    $products = [];

    foreach ($inputs as $months) {
      foreach($months as $category) {
        foreach(array_keys($category) as $product) {          
          if (!array_key_exists($product, $products)) {
            $products[$product] = $this->productRepository->findByName($product);
          }
        }
      }
    }

    return $products;
  }
}
<?php

namespace App\Services;

use App\Exception\ORMException;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use App\Model\Product;

class ProductService {

  private $productRepository;

  private $categoryRepository;

  public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository) {
    $this->productRepository = $productRepository;
    $this->categoryRepository = $categoryRepository;
  }

  public function create(array $inputs) {    
    
    $products = $this->parse($inputs);
    foreach ($products as $product) {
      $this->productRepository->createIfNotExists($product);
    }
  }

  private function parse(array $inputs): array {
    
    $categories = $this->loadCategories($inputs);
    $products = [];

    foreach ($inputs as $months) {
       
      foreach ($months as $category => $_products)  {

        foreach (array_keys($_products) as $productName) {
          $product = new Product();
          $product->name = $productName;
          $product->category_id = $categories[$category]->id;
  
          $products[] = $product;
        }

      }
      
    }

    return $products;
  }

  private function loadCategories(array $inputs) {
    $categories = [];

    foreach ($inputs as $months) {
      foreach(array_keys($months) as $category) {
        if (!array_key_exists($category, $categories)) {
          $categories[$category] = $this->categoryRepository->findByName($category);
        }
      }
    }

    return $categories;
  }
}
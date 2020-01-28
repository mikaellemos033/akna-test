<?php

namespace App\Services;

use App\Exception\ORMException;
use App\Repository\CategoryRepository;
use App\Model\Category;

class CategoryService {

  private $repository;

  public function __construct(CategoryRepository $repository) {
    $this->repository = $repository;
  }

  public function create(array $inputs) {    
    
    $categories = $this->parse($inputs);

    foreach ($categories as $category) {
      $this->repository->createIfNotExists($category);
    }
  }

  private function parse(array $inputs): array {
    $categories = [];

    foreach ($inputs as $key => $value) {
      foreach (array_keys($value) as $categoryName) {
        $category = new Category();
        $category->name = $categoryName;

        $categories[] = $category;
      }
    }

    return $categories;
  }

}
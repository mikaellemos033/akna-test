<?php

namespace App\Services;

class ConvertListShopCsv {
  
  public function convert(array $listShops) {

    $csvItems = [['Mês', 'Categoria', 'Produto', 'Quantidade']];

    foreach ($listShops as $month => $categories) {
      foreach($categories as $category => $products) {

        foreach($products as $product => $total) {
          $csvItems[] = [$month, $category, $product, $total];
        }

      }
    }

    return $csvItems;
  }

}
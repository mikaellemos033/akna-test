<?php

namespace App\Services;

use App\Utils\MonthUtil;

class OrderService {


  public function order(array $list): array {

    $listSort = [];
    $monthSort = [];
    $monthKeys = [];
  
    foreach (array_keys($list) as $month) {
      $position = MonthUtil::getMonthByText($month);
      $monthSort[$position] = $month;
    }

    $monthKeys = array_keys($monthSort);
    sort($monthKeys);

    foreach ($monthKeys as $key) {
      $month = $monthSort[$key];
      $categories = $list[$month];

      array_multisort($categories);

      foreach ($categories as &$products) {
        arsort($products);
      }

      $listSort[$month] = $categories;
    }
        
    return $listSort;
  }
}
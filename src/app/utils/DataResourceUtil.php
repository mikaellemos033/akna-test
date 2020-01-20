<?php

namespace App\Utils;

class DataResourceUtil {

  public static function getData(string $file) {
    return require(sprintf('resources/%', $file));
  }

}
<?php

namespace App\Utils;

class DataResourceUtil {

  private static $rootDir;

  public static function setRootDir($dir) {
    static::$rootDir = $dir;
  }

  public static function getResource(string $file) {        
    return require(sprintf('%s/resources/%s', static::$rootDir, $file));
  }

  public static function getData(string $file) {
    return require(sprintf('%s/%s', static::$rootDir, $file));
  }

}
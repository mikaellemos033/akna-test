<?php

namespace App\Utils;

class Environment {
  
  private static $envs = [];

  public static function setEnvironments(array $envs) {
    static::$envs = $envs;
  }

  public static function getEnvironment(string $key) {
  
    $keys = explode('.', $key);    

    switch(count($keys)) {      
      case 2:
        return static::$envs[$keys[0]][$keys[1]];
      case 3:
        return static::$envs[$keys[0]][$keys[1]][$keys[2]];
      default:
        return static::$envs[$key];
    }
  }
}
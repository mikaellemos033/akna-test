<?php

namespace App\DB;

use App\Utils\Environment;
use Sect\Database\DB;
use Sect\Database\DBConfig;

class Connection {

  private static $connectionDB;

  public static function instance() {

    $dbConfig = new DBConfig();
    
    $dbConfig->dbname = Environment::getEnvironment('db.dbname');
    $dbConfig->host = Environment::getEnvironment('db.host');
    $dbConfig->user = Environment::getEnvironment('db.user');
    $dbConfig->password = Environment::getEnvironment('db.password');
    $dbConfig->drive = Environment::getEnvironment('db.driver');
    $dbConfig->charset = Environment::getEnvironment('db.charset');

    return static::connect($dbConfig);
  }


  public static function connect(DBConfig $dbConfig) {
    if (!static::$connectionDB) {
      static::$connectionDB = new DB($dbConfig);
    }

    return static::$connectionDB;
  }

  public static function getConnect() {
    return static::$connectionDB;
  }

}
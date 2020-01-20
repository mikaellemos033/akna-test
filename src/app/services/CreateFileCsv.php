<?php

namespace App\Services;

class CreateFileCsv {

  public function createFile(string $fileName, array $rows) {

    $file = fopen($fileName, 'w');
    
    foreach ($rows as $row) {
      fputcsv($file, $row);
    }

    fclose($fp);
  }

}
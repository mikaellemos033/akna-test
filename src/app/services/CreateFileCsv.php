<?php

namespace App\Services;

class CreateFileCsv {

  public function createFile(string $fileName, array $rows) {

    if (file_exists($fileName)) {
      unlink($fileName);
    }

    $file = fopen($fileName, 'w');
    
    foreach ($rows as $row) {
      fputcsv($file, $row);
    }

    fclose($file);
  }

}
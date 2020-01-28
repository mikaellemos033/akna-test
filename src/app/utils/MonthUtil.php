<?php

namespace App\Utils;

use App\Model\Month;

class MonthUtil {

  public static function getMonthByText($month) {    
    switch(strtolower($month)) {      
      case 'fevereiro':
        return Month::FEB;
      case 'marco':
        return Month::MAR;
      case 'abril':
        return Month::APR;
      case 'maio':
        return Month::MAY;
      case 'junho':
        return Month::JUN;
      case 'julho':
        return Month::Jul;
      case 'agosto':
        return Month::AGO;
      case 'setembro':
        return Month::SET;
      case 'outubro':
        return Month::OCT;
      case 'novembro':
        return Month::NOV;
      case 'dezembro':
        return Month::DEZ;
      default:
        return Month::JAN;
    }
  }
  
}
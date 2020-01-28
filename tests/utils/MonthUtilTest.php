<?php

use App\Utils\MonthUtil;
use App\Model\Month;

class MonthUtilTest extends PHPUnit_Framework_TestCase {

  public function testFindJanuary() {
    $month = MonthUtil::getMonthByText('janeiro');
    $this->assertEquals(Month::JAN, $month);
  }

  public function testFindJuly() {
    $month = MonthUtil::getMonthByText('junho');
    $this->assertEquals(Month::JUN, $month);
  }

}
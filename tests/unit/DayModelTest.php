<?php

use app\models\Day;

class DayModelTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    public function test_Construct_UnixTimestamp_TodayDayReturned()
    {
        $today = new Day(['timestamp' => time()]);
        $this->assertEquals('Пятница', $today->dayName);
        $this->assertFalse($today->isWeekend);
    }
}
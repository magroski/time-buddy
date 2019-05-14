<?php

declare(strict_types=1);

namespace TimeBuddy\Tests;

use PHPUnit\Framework\TestCase;
use TimeBuddy\DateInterval;
use TimeBuddy\Time;

class DateIntervalTest extends TestCase
{
    public function testCreator() : void
    {
        $time     = new Time();
        $interval = DateInterval::createFromTime($time);

        $this->assertInstanceOf(DateInterval::class, $interval);

        $timeB    = $time->subtract(100);
        $interval = DateInterval::createFromTime($time, $timeB);

        $this->assertInstanceOf(DateInterval::class, $interval);

        $this->assertEquals(100, $interval->toSeconds());
    }

    public function testToYears() : void
    {
        $start = mktime(0, 0, 0, 10, 10, 1980);
        $end   = mktime(0, 0, 0, 10, 10, 1990);

        $interval = new DateInterval($start - $end);

        $this->assertEquals(10, $interval->toYears());
    }

    public function testToMonths() : void
    {
        $start = mktime(0, 0, 0, 10, 10, 2000);
        $end   = mktime(0, 0, 0, 8, 10, 2000);

        $interval = new DateInterval($start - $end);

        $this->assertEquals(2, $interval->toMonths());
    }

    public function testToDays() : void
    {
        $start = mktime(0, 0, 0, 1, 1, 1980);
        $end   = mktime(0, 0, 0, 12, 31, 1980);

        $interval = new DateInterval($start - $end);

        $this->assertEquals(365, $interval->toDays());
    }

    public function testToHours() : void
    {
        $start = mktime(10, 0, 0, 10, 10, 1980);
        $end   = mktime(5, 0, 0, 10, 10, 1980);

        $interval = new DateInterval($start - $end);

        $this->assertEquals(5, $interval->toHours());
    }

    public function testToMinutes() : void
    {
        $start = mktime(0, 40, 0, 10, 10, 1980);
        $end   = mktime(0, 10, 0, 10, 10, 1980);

        $interval = new DateInterval($start - $end);

        $this->assertEquals(30, $interval->toMinutes());
    }

    public function testToSeconds() : void
    {
        $start = mktime(0, 10, 1, 10, 10, 1980);
        $end   = mktime(0, 10, 58, 10, 10, 1980);

        $interval = new DateInterval($start - $end);

        $this->assertEquals(57, $interval->toSeconds());
    }
}

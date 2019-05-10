<?php

declare(strict_types=1);

namespace TimeBuddy;

use PHPUnit\Framework\TestCase;

class TimeTest extends TestCase
{
    public function testCreateFromDateTime() : void
    {
        $dateTime = new \DateTime('now');
        $time     = Time::createFromDateTime($dateTime);

        $this->assertEquals($dateTime->getTimestamp(), $time->getUnixTimestamp());
    }

    public function testCreateFromUnixTstamp() : void
    {
        $unixTimestamp = 12871337;
        $time          = Time::createFromUnixTstamp($unixTimestamp);

        $this->assertEquals($unixTimestamp, $time->getUnixTimestamp());
    }

    public function testEmptyConstructor() : void
    {
        $time = new Time();

        $this->assertEquals(date('Y', time()), $time->getYear());
    }

    public function testCreateFromImmutable() : void
    {
        $immutable = new \DateTimeImmutable();
        $time      = new Time($immutable);

        $this->assertEquals($immutable->getTimestamp(), $time->getUnixTimestamp());
    }

    public function testGetYear() : void
    {
        $immutable = new \DateTimeImmutable('2001-04-05');
        $time      = new Time($immutable);

        $this->assertEquals($immutable->format('Y'), $time->getYear());
    }

    public function testGetMonth() : void
    {
        $immutable = new \DateTimeImmutable('2001-04-05');
        $time      = new Time($immutable);

        $this->assertEquals($immutable->format('m'), $time->getMonth());
    }

    public function testGetDay() : void
    {
        $immutable = new \DateTimeImmutable('2001-04-05');
        $time      = new Time($immutable);

        $this->assertEquals($immutable->format('d'), $time->getDay());
    }

    public function testGetDayNoZero() : void
    {
        $immutable = new \DateTimeImmutable('2001-04-05');
        $time      = new Time($immutable);

        $this->assertEquals($immutable->format('j'), $time->getDayNoZero());
    }

    public function testGetHours() : void
    {
        $immutable = new \DateTimeImmutable('2001-04-05 10:11:12');
        $time      = new Time($immutable);

        $this->assertEquals($immutable->format('H'), $time->getHours());
    }

    public function testGetMinutes() : void
    {
        $immutable = new \DateTimeImmutable('2001-04-05');
        $time      = new Time($immutable);

        $this->assertEquals($immutable->format('i'), $time->getMinutes());
    }

    public function testGetSeconds() : void
    {
        $immutable = new \DateTimeImmutable('2001-04-05');
        $time      = new Time($immutable);

        $this->assertEquals($immutable->format('s'), $time->getSeconds());
    }

    public function testAdd() : void
    {
        $immutable = new \DateTimeImmutable('2019-02-01 10:10:05');
        $time      = new Time($immutable);

        $this->assertEquals('05', $time->getSeconds());

        $time = $time->add(15);

        $this->assertEquals('20', $time->getSeconds());
    }

    public function testSubtract() : void
    {
        $immutable = new \DateTimeImmutable('2019-02-01 10:10:20');
        $time      = new Time($immutable);

        $this->assertEquals('20', $time->getSeconds());

        $time = $time->subtract(10);

        $this->assertEquals('10', $time->getSeconds());
    }

    public function testDiff() : void
    {
        $time  = new Time();
        $timeB = new Time();

        $dateInterval = $time->diff($timeB);

        $this->assertInstanceOf(DateInterval::class, $dateInterval);
    }

    public function testLocaleFormat() : void
    {
        $immutable = new \DateTimeImmutable('2019-04-05 10:10:10');
        $time      = new Time($immutable);

        $this->assertEquals('Fri', $time->format('D'));
        $this->assertEquals('Friday', $time->format('l'));
        $this->assertEquals('Apr', $time->format('M'));
        $this->assertEquals('April', $time->format('F'));

        $time->setLocale('pt_BR');

        $this->assertEquals('Sex', $time->format('D'));
        $this->assertEquals('Sexta', $time->format('l'));
        $this->assertEquals('Abr', $time->format('M'));
        $this->assertEquals('Abril', $time->format('F'));
    }
}

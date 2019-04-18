<?php

declare(strict_types=1);

namespace TimeBuddy;

class DateInterval
{
    /** @var int $interval */
    private $interval;

    public static function createFromTime(Time $timeA, ?Time $timeB = null) : self
    {
        $timeB    = $timeB ?? new Time();
        $interval = $timeA->getUnixTimestamp() - $timeB->getUnixTimestamp();

        return new self(abs($interval));
    }

    public function __construct(int $interval)
    {
        $this->interval = abs($interval);
    }

    /**
     * This function assumes a 365-day year
     */
    public function toYears() : int
    {
        return intval($this->interval / (Time::DAY * 365));
    }

    /**
     * This methods assumes a 30-day long month
     */
    public function toMonths() : int
    {
        return intval($this->interval / (Time::DAY * 30));
    }

    public function toDays() : int
    {
        return intval($this->interval / Time::DAY);
    }

    public function toHours() : int
    {
        return intval($this->interval / Time::HOUR);
    }

    public function toMinutes() : int
    {
        return intval($this->interval / Time::MINUTE);
    }

    /**
     * @return int Interval in seconds
     */
    public function toSeconds() : int
    {
        return $this->interval;
    }
}

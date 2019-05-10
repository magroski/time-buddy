<?php

declare(strict_types=1);

namespace TimeBuddy\Provider;

class Text
{
    /** @var string[] */
    protected $weekAbbr = [
        'Sun',
    ];

    /** @var string[] */
    protected $week = [
        'Sunday',
    ];

    /** @var string[] */
    protected $monthAbbr = [
        '',
    ];

    /** @var string[] */
    protected $month = [
        '',
    ];

    public function weekAbbr(\DateTimeImmutable $time) : string
    {
        return $this->weekAbbr[$time->format('w')];
    }

    public function week(\DateTimeImmutable $time) : string
    {
        return $this->week[$time->format('w')];
    }

    public function monthAbbr(\DateTimeImmutable $time) : string
    {
        return $this->monthAbbr[$time->format('n')];
    }

    public function month(\DateTimeImmutable $time) : string
    {
        return $this->month[$time->format('n')];
    }
}

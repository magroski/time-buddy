<?php

declare(strict_types=1);

namespace TimeBuddy;

class Time
{
    public const SECOND = 1;
    public const MINUTE = 60;
    public const HOUR   = 3600;
    public const DAY    = 86400;

    /** @var \DateTimeImmutable */
    private $time;

    public static function createFromDateTime(\DateTime $dateTime) : self
    {
        return new self(\DateTimeImmutable::createFromMutable($dateTime));
    }

    public static function createFromUnixTstamp(int $unixTimestamp) : self
    {
        return new self(new \DateTimeImmutable("@{$unixTimestamp}"));
    }

    public function __construct(?\DateTimeImmutable $immutable = null)
    {
        if ($immutable !== null) {
            $this->time = $immutable;

            return;
        }

        $this->time = new \DateTimeImmutable('@' . time());
    }

    /**
     * Returns the date formatted as an Unix timestamp
     */
    public function getUnixTimestamp() : int
    {
        return $this->time->getTimestamp();
    }

    /**
     * Returns year value
     */
    public function getYear() : string
    {
        return date('Y', $this->getUnixTimestamp());
    }

    /**
     * Returns month value between 01 and 12 (with leading zeros)
     */
    public function getMonth() : string
    {
        return date('m', $this->getUnixTimestamp());
    }

    /**
     * Returns day value between 01 and 31 (with leading zeros)
     */
    public function getDay() : string
    {
        return date('d', $this->getUnixTimestamp());
    }

    /**
     * Returns day value between 1 and 31 (without leading zeros)
     */
    public function getDayNoZero() : string
    {
        return date('j', $this->getUnixTimestamp());
    }

    /**
     * Returns hour value between 00 and 23 (with leading zeros)
     */
    public function getHours() : string
    {
        return date('H', $this->getUnixTimestamp());
    }

    /**
     * Returns minute value between 00 and 59 (with leading zeros)
     */
    public function getMinutes() : string
    {
        return date('i', $this->getUnixTimestamp());
    }

    /**
     * Returns second value between 00 and 59 (with leading zeros)
     */
    public function getSeconds() : string
    {
        return date('s', $this->getUnixTimestamp());
    }

    /**
     * Adds seconds to the current value
     */
    public function add(int $seconds) : self
    {
        $newTime = $this->getUnixTimestamp() + $seconds;

        return self::createFromUnixTstamp($newTime);
    }

    /**
     * Subtracts seconds from the current value
     */
    public function subtract(int $seconds) : self
    {
        $newTime = $this->getUnixTimestamp() - $seconds;

        return self::createFromUnixTstamp($newTime);
    }

    /**
     * Calculates the absolute difference between the stored time and the $time parameter and
     * returns a {@see DateInterval} object representing it
     */
    public function diff(Time $time) : DateInterval
    {
        return DateInterval::createFromTime($this, $time);
    }

    /**
     * This method transforms the stored time variable in a string according to the informed mask <br/>
     * Ex: Mask -> 'Y/m/d % H' results in '2010/02/15 % 02'
     *
     * @param string $mask String mask that will be used to format the time. <p>
     *                     Y-> 2010  <br/>
     *                     y-> 10  <br/>
     *                     m-> 02  <br/>
     *                     M-> Feb  <br/>
     *                     F-> February  <br/>
     *                     d-> 15  <br/>
     *                     D-> Mon  <br/>
     *                     l-> Monday  <br/>
     *                     H-> 02  <br/>
     *                     i-> 43  <br/>
     *                     s-> 38  <br/>
     *                     More mask values in -> http://www.php.net/manual/en/function.date.php </p>
     *
     * @return string
     */
    public function format(string $mask) : string
    {
        /**
         *
         *  IMPLEMENTAR ESSE METODO NOVAMENTE PARA SUPORTE DAS TRADUCOES COMENTADAS
         *
         */
        // require 'Frogg/lang/'.LANGUAGE.'.php';

        // /* D-># */ $sem 	= array($lang['Sun'],$lang['Mon'],$lang['Tue'],$lang['Wed'],$lang['Thu'],$lang['Fri'],$lang['Sat']);
        // /* l->$ */ $semana 	= array($lang['Sunday'],$lang['Monday'],$lang['Tuesday'],$lang['Wednesday'],$lang['Thursday'],$lang['Friday'],$lang['Saturday']);
        // /* M->% */ $mes 	= array('',$lang['Jan'],$lang['Feb'],$lang['Mar'],$lang['Apr'],$lang['May'],$lang['Jun'],$lang['Jul'],$lang['Aug'],$lang['Sep'],$lang['Oct'],$lang['Nov'],$lang['Dec']);
        // /* F->& */ $meses	= array('',$lang['January'],$lang['February'],$lang['March'],$lang['April'],$lang['May'],$lang['June'],$lang['July'],$lang['August'],$lang['September'],$lang['October'],$lang['November'],$lang['December']);

        // $patterns 	  = array('/D/','/l/','/M/','/F/');
        // $replacements = array('#','q','%','}');
        // $mask = preg_replace($patterns, $replacements, $mask);

        $mask = date($mask, $this->getUnixTimestamp());
        // $patterns 	  = array('/#/','/q/','/%/','/}/');
        // $replacements = array($sem[date('w',$this->time)],$semana[date('w',$this->time)],$mes[date('n',$this->time)],$meses[date('n',$this->time)]);

        // return preg_replace($patterns, $replacements, $mask);
        return $mask;
    }
}

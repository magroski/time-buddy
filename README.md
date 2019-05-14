# Time Buddy

[![Latest Stable Version](https://img.shields.io/packagist/v/magroski/time-buddy.svg?style=flat)](https://packagist.org/packages/magroski/time-buddy)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.1-8892BF.svg?style=flat)](https://php.net/)
[![CircleCI](https://circleci.com/gh/magroski/time-buddy.svg?style=shield)](https://circleci.com/gh/magroski/time-buddy)
[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg?style=flat)](https://github.com/magroski/time-buddy/blob/master/LICENSE)

This library provides some syntax sugar around time and date manipulation, including on-the-fly format localization without the need to add multiple locales to your environment.

Locales are available on the folder `src/Provider`. Pull-requests are welcome.

## Usage examples

Creation

```php
# Default
$time = new Time();

# From unix timestamp
$time = Time::createFromUnixTstamp(time());

# From DateTime
$dateTime = new \DateTime();
$time = Time::createFromDateTime($dateTime);

# From DateTimeImmutable
$immutable = new \DateTimeImmutable();
$time = new Time($immutable);
```

Operations (Time is immutable, so operations generate new objects)

```php
$firstTime = new Time();

$secondTime = $firstTime->add(100);

$thirdTime = $firstTime->subtract(100);
```

Formatting

```php
$time = new Time();
$time->format('d F Y'); # 20 May 2019

$time->setLocale('pt_BR');
$time->format('d F Y'); # 20 Maio 2019
```

Generating a Date Interval

```php
$time = new Time();
$laterTime = new Time();

# From Time
$interval = $time->diff($laterTime);

# Staticaly
$interval = DateInterval::createFromTime($time, $laterTime);

# Staticaly from a single time
$interval = DateInterval::createFromTime($time); # Second argument is current time
```

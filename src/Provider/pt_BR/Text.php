<?php

declare(strict_types=1);

namespace TimeBuddy\Provider\pt_BR;

class Text extends \TimeBuddy\Provider\Text
{
    /** @var string[] */
    protected $weekAbbr = [
        'Dom',
        'Seg',
        'Ter',
        'Qua',
        'Qui',
        'Sex',
        'Sab',
    ];

    /** @var string[] */
    protected $week = [
        'Domingo',
        'Segunda',
        'Terça',
        'Quarta',
        'Quinta',
        'Sexta',
        'Sábado',
    ];

    /** @var string[] */
    protected $monthAbbr = [
        '',
        'Jan',
        'Fev',
        'Mar',
        'Abr',
        'Mai',
        'Jun',
        'Jul',
        'Ago',
        'Set',
        'Out',
        'Nov',
        'Dez',
    ];

    /** @var string[] */
    protected $month = [
        '',
        'Janeiro',
        'Fevereiro',
        'Março',
        'Abril',
        'Maio',
        'Junho',
        'Julho',
        'Agosto',
        'Setembro',
        'Outubro',
        'Novembro',
        'Dezembro',
    ];
}

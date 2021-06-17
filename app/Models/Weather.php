<?php

namespace App\Models;

/**
 * Class Weather.
 */
class Weather
{
    /**
     * Расшифровка состояний.
     */
    const CONDITIONS = [
        'clear' => 'ясно',
        'partly-cloudy' => 'малооблачно',
        'cloudy' => 'облачно с прояснениями',
        'overcast' => 'пасмурно',
        'partly-cloudy-and-light-rain' => 'небольшой дождь',
        'partly-cloudy-and-rain' => 'дождь',
        'overcast-and-rain' => 'сильный дождь',
        'overcast-thunderstorms-with-rain' => 'сильный дождь, гроза',
        'cloudy-and-light-rain' => 'небольшой дождь',
        'overcast-and-light-rain' => 'небольшой дождь',
        'cloudy-and-rain' => 'дождь',
        'overcast-and-wet-snow' => 'дождь со снегом',
        'partly-cloudy-and-light-snow' => 'небольшой снег',
        'partly-cloudy-and-snow' => 'снег',
        'overcast-and-snow' => 'снегопад',
        'cloudy-and-light-snow' => 'небольшой снег',
        'overcast-and-light-snow' => 'небольшой снег',
        'cloudy-and-snow' => 'снег',
    ];

    /**
     * Расшифровка направления ветра.
     */
    const WIND_DIRECTIONS = [
        'nw' => 'северо-западное',
        'n' => 'северное',
        'ne' => 'северо-восточное',
        'e' => 'восточное',
        'se' => 'юго-восточное',
        's' => 'южное',
        'sw' => 'юго-западное',
        'w' => 'западное',
        'с' => 'штиль',
    ];

    /** @var int */
    public $temp;
    /** @var int */
    public $feelsLike;
    /** @var string */
    public $icon;
    /** @var string */
    public $condition;
    /** @var int */
    public $windSpeed;
    /** @var string */
    public $windDirection;
    /** @var int */
    public $pressure;

    /**
     * Weather constructor.
     */
    public function __construct($data)
    {
        $this->temp = $data->fact->temp;
        $this->feelsLike = $data->fact->feels_like;
        $this->condition = self::CONDITIONS[$data->fact->condition];
        $this->icon = sprintf('https://yastatic.net/weather/i/icons/blueye/color/svg/%s.svg', $data->fact->icon);
        $this->windSpeed = $data->fact->wind_speed;
        $this->windDirection = self::WIND_DIRECTIONS[$data->fact->wind_dir];
        $this->pressure = $data->fact->pressure_mm;
    }
}

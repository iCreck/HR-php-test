<?php

namespace App\Services;

use App\Models\Weather;
use GuzzleHttp\Client;

/**
 * Class YandexWeatherService
 * @package App\Services
 */
class YandexWeatherService
{
    /**
     * Корневой URL API погоды
     * @var string
     */
    const API_URI = 'https://api.weather.yandex.ru/v1/';

    /**
     * Метод для платного тарифа
     * @link https://yandex.ru/dev/weather/doc/dg/concepts/forecast-test-docpage/
     *
     * @var string
     */
    const API_PAID_METHOD = 'forecast';

    /**
     * Метод для бесплатного тарифа (50 запросов в день)
     * @link https://yandex.ru/dev/weather/doc/dg/concepts/forecast-info-docpage/
     *
     * @var string
     */
    const API_FREE_METHOD = 'informers';

    /**
     * Вызываемый метод API
     *
     * @var string
     */
    private $method;

    /**
     * Ключ API
     * @link https://yandex.ru/dev/weather/doc/dg/concepts/about-docpage/
     *
     * @var string
     */
    private $apiKey;

    /**
     * GuzzleHttp Client
     *
     * @var Client
     */
    private $httpClient;

    /**
     * YandexWeatherService constructor.
     *
     */
    public function __construct()
    {
        $this->apiKey = config('services.yandex.weather.apiKey');
        $this->method = config('services.yandex.weather.paid') ? self::API_PAID_METHOD : self::API_FREE_METHOD;
        $this->httpClient = new Client([
            'base_uri' => self::API_URI,
        ]);
    }

    /**
     * Получить прогноз погоды по заданным координатам
     *
     * @param float $lat Значение широты
     * @param float $lon Значение долготы
     * @param string $lang Определение языка ответа API
     *
     * @return Weather|false|array
     */
    public function get(float $lat, float $lon, string $lang = 'ru_RU')
    {
        $response = $this->httpClient->get($this->method, [
            'query' => [
                'lat' => $lat,
                'lon' => $lon,
                'lang' => $lang,
            ],
            'headers' => ['X-Yandex-API-Key' => $this->apiKey],
        ]);
        if ($response->getStatusCode() === 200) {
            $responseJson = json_decode($response->getBody()->getContents());
            return new Weather($responseJson);
        }
        return ['error' => $response->getReasonPhrase()];
    }
}

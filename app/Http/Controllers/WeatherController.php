<?php

namespace App\Http\Controllers;

use App\Services\YandexWeatherService;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    /** @var YandexWeatherService */
    private $weatherService;

    /**
     * WeatherController constructor.
     * @param YandexWeatherService $weatherService
     */
    public function __construct(YandexWeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getWeather(Request $request)
    {
        if ($request->has(['lat', 'lon'])) {
            return response()->json(
                $this->weatherService->get(
                    $request->get('lat'),
                    $request->get('lon'),
                    $request->has('lang') ? $request->get('lang') : 'ru_RU'
                )
            );
        }
        return response()->json(['error' => 'No params'], 204);
    }
}

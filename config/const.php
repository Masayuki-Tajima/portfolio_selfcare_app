<?php
    return [
        'positions' => [
            '東京' => [
                'lat' => 35.6828387,
                'lon' => 139.7594549
            ]
        ],
        'api' => [
            'weather' => [
                'key' => env('WEATHER_CAST_API_KEY'),
                'url' => env('WEATHER_CAST_API_URL'),
            ],
        ],
    ];

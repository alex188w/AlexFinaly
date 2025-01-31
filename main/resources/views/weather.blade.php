<!DOCTYPE html>
<html lang="ru">

<head>
    <!-- /Yandex.Metrika counter -->
    <meta charset="utf-8" />
    <title>Alex18w</title>
    <link rel="shortcut icon" href="./img/LogoA.JPG">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css2/style.css" rel="stylesheet" type="text/css" id="theme-opt" />
    <link href="./css2/style2.css" rel="stylesheet" type="text/css" id="theme-opt" />
    <link href="./css2/style3.css" rel="stylesheet" type="text/css" id="theme-opt" />
</head>

<body>
    <div class="weather">
        <div class="weather-top">
            <div class="weather__forecast">
                <img width="18px" src="./img/temperature.png" alt="weather_type">
                <span class="weather__min">{{ $data->main->temp }} °C</span>
            </div>
            <div class="wind">
                <img width="18px" src="./img/wind.png" alt="weather_type">
                <span class="weather__min">{{ $data->wind->speed }} м/с</span>
            </div>
        </div>
        <img height="51px"  width="51px" class="img-responsive" src="{{'./img/' . $data->weather[0]->icon . '.png'}}" alt="weather_type">
        <div class="weather-bottom">
        <div class="wasser">
                <img width="18px" src="./img/wasser.png" alt="weather_type">
                <span class="weather__min">{{ $data->main->humidity }} %</span>
            </div>
            <div class="pleassure">
                <img width="18px" src="./img/pleassure.png" alt="weather_type">
                <span class="weather__min">{{ (int)($data->main->grnd_level * 0.75) }} мм</span>
            </div>
        </div>
        
    </div>
</body>
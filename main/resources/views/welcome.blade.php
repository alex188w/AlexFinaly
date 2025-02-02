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

    <div class="top">

        <div class="top__header center">
            <div class="top__footer-logo">
                <a class="logo" href="https://alex18w.ru/"><img width="80px" src="./img/logo2-1.jpg" alt="logo"></a>
            </div>
            <div class="header-chat">
                <a class="top__header-chat" href="{{ url('message/chat') }}">
                    <div class="send_mail">
                        <p class="send">Задать</p>
                    </div>
                    <img class="mail-chat" src="./img/chatGPT2.png" alt="">
                    <div class="send_mail">
                        <p class="send">вопрос</p>
                    </div>
                </a>
            </div>
            <div class="header-right">
                <p style="font-weight: bold;" class="alex">+7 (909) 018-60-...</p>

                <a class="top__footer-mail" href="{{ url('message/mail') }}">
                    <div class="send_mail">
                        <p class="send">Отправить</p>
                    </div>
                    <img class="mail" width="80px" src="./img/envelope-gold.svg" alt="">
                    <div class="send_mail">
                        <p class="send">сообщение</p>
                    </div>
                </a>

            </div>
        </div>
        <p style="color: red">{{$text}}</p>

        <div class="heading center">
            <img height="35px" width="35px" src="./img/GB.png" alt="">
            <h2 class="content-heading">Обучение в GeekBrains. Специальность - Разработчик — Fullstack разработчик</h2>
        </div>

        <div class="top-about center">

            <a href="#"><img id="alex1" class="alex-photo" src="./img/alex.jpg" alt="Image" onclick="displayModal(this);"></a>

            <!-- Модальное окно -->
            <div id="modal" class="modal" onclick="hideModal();">
                <span class="close">&times;</span>
                <div class="modal-content">
                    <img id="modal-image">
                </div>
            </div>

            <script>
                // Получаем элементы модального окна и изображения
                const modal = document.getElementById("modal");
                const modalImage = document.getElementById("modal-image");

                // Отображаем модальное окно и устанавливаем источник изображения
                function displayModal(img) {
                    modal.style.display = "block";
                    modalImage.src = img.src;
                }

                // Скрываем содержимое модального окна, если пользователь кликнул по нему
                function hideModal() {
                    if (event.target !== modal) {
                        modal.style.display = "none";
                    }
                }
            </script>

            <div class="alex-name">
                <h3 class="alex-name_name">Алексей</h3>
                <h2 class="alex-name_surname">Шевченко</h2>
                <p class="alex-text">Образование: Инженер-электромеханик.</p>
                <p class="alex-text">В настоящее время обучаюсь в GeekBrains.</p>
                <p class="alex-text">Прошел курсы:</p>
                <p class="alex-text">- C#</p>
                <p class="alex-text">- Python</p>
                <p class="alex-text">- Java</p>
                <p class="alex-text">- JavaScript</p>
                <p class="alex-text">- Операционные системы и виртуализация (Linux)</p>
                <p class="alex-text">- Базы данных и SQL</p>
                <p class="alex-text">- Контейнеризация Docker</p>
                <p class="alex-text">...и еще много всего интересного! </p>
                <p class="alex-text">Не всегда было легко и просто, даже, чаще всего было нелегко и непросто, но оно того стоит.</p>
                <p class="alex-text">...Рекомендую! </p>
            </div>
            <div class="alex-chat">
                <a class="chat" href="{{ url('message/chat') }}">
                    <p class="text-chat">задать вопрос</p>
                    <img class="logo-chat" src="./img/chatGPT5.png" alt="gpt">
                    <img class="logo-gpt" src="./img/chatGPT4.jpg" alt="gpt">
                </a>
                <img class="alex-logo" src="./img/logo2-3.JPG" alt="logo">
            </div>
        </div>

        <div class="project center">
            <h3 class="project-title">МОИ ПРОЕКТЫ</h3>
        </div>

        <div class="top-content center">

            <a href="https://alex18w.ru/project/">
                <div class="content-item">
                    <img height="265px" src="./img/laravel.JPG" alt="img" class="item-img" />
                    <div class="content-desc">
                        <h3 class="item-name">
                            Интернет-магазин бытовой электроники
                        </h3>
                        <p class="item-text">
                            The PHP Framework Laravel 11
                        </p>
                        <div class="to-project">Перейти к проекту</div>
                    </div>

                </div>
            </a>

            <a href="https://alex18w.ru/project-interno/">
                <div class="content-item">
                    <img height="265px" src="./img/vue.JPG" alt="img" class="item-img" />
                    <div class="content-desc">
                        <h3 class="item-name">
                            Интернет-магазин домашней мебели
                        </h3>
                        <p class="item-text">
                            JavaScript-фреймворк Vue.js
                        </p>
                        <div class="to-project">Перейти к проекту</div>
                    </div>
                </div>
            </a>

            <a href="https://alex18w.ru/internet-shop_react/">
                <div class="content-item">
                    <img height="265px" src="./img/react.JPG" alt="img" class="item-img" />
                    <div class="content-desc">
                        <h3 class="item-name">
                            Интернет-магазин стильной одежды
                        </h3>
                        <p class="item-text">
                            JavaScript-библиотека React
                        </p>
                        <div class="to-project">Перейти к проекту</div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="row   list-icons center">
        <div class="col-lg-4">
            <div class="list-box   list-box-icon-left list-box-icon-md ">
                <div class="list-box-icon icon-font text-auto">
                    <img height="35px" src="./img/phone.svg" alt="">
                </div>
                <div class="list-box-info">
                    <div>
                        <p class="h5">Телефон</p>
                        <p class="opacity-5">+7 (909) 018-60-...</p>
                    </div>
                    <div class="list-box-footer"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="list-box   list-box-icon-left list-box-icon-md ">
                <div class="list-box-icon icon-font text-auto">
                    <img height="35px" src="./img/envelope.svg" alt="">
                </div>
                <div class="list-box-info">
                    <div>
                        <p class="h5">Email</p>
                        <p class="opacity-5">alex18w@mail.ru</p>
                    </div>
                    <div class="list-box-footer"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="list-box   list-box-icon-left list-box-icon-md ">
                <div class="list-box-icon icon-font text-auto">
                    <img height="35px" src="./img/telegram.svg" alt="">
                </div>
                <div class="list-box-info">
                    <div>
                        <p class="h5">Telegram</p>
                        <p class="opacity-5">@alex18w</p>
                    </div>
                    <div class="list-box-footer"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="list-box   list-box-icon-left list-box-icon-md ">
                <div class="list-box-icon icon-font text-auto">
                    <img height="35px" src="./img/github-mark.svg" alt="">
                </div>
                <div class="list-box-info">
                    <div>
                        <p class="h5">GitHub</p>
                        <p class="opacity-5">alex188w</p>
                    </div>
                    <div class="list-box-footer"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="visitors center">
        <p class="visitors-count">Количество посещений: {{ $visitorCount->count }}</p>
        <p class="visitors-count">Last visited at: {{ $visitorCount->last_visited_at }}</p>
    </div>

    <div class="top__footer center">
        <div class="top__footer-logo">
            <a class="logo" href="{{ route('welcome') }}"><img width="80px" src="./img/logo2-1.jpg" alt="logo"></a>
        </div>

        <p class="Ekaterinburg">©2025 Екатеринбург</p>

        <div class="top__footer-vijet">
            <div class="weather">
                <div class="weather-top">
                    <div class="weather__forecast">
                        <img width="28px" src="./img/temperature1.png" alt="weather_type">
                        <span class="weather__min">{{ $data->main->temp }} °C</span>
                    </div>
                    <div class="wind">
                        <img style="padding-right: 5px;" width="28px" src="./img/wind1.png" alt="weather_type">
                        <span class="weather__min">{{ $data->wind->speed }} м/с</span>
                    </div>
                </div>
                <img height="85px" width="85px" class="img-responsive" src="{{'./img/' . $data->weather[0]->icon . '.png'}}" alt="weather_type">
                <div class="weather-bottom">
                    <div class="wasser">
                        <img width="28px" src="./img/wasser.png" alt="weather_type">
                        <span class="weather__min">{{ $data->main->humidity }} %</span>
                    </div>
                    <div class="pleassure">
                        <img width="28px" src="./img/pleassure.png" alt="weather_type">
                        <span class="weather__min">{{ (int)($data->main->grnd_level * 0.75) }} мм</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="top__footer-date">
            <div>
                <p class="date">{{$date = now()->format('d.m.Y')}}</p>
            </div>

            <div>
                <p id='1' class="time"></p>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var div = document.getElementById('1');

        function showTime() {
            var now_t = new Date();
            var Hours = now_t.getHours();
            if (Hours < 10) {
                Hours = "0" + Hours;
            }
            var Minutes = now_t.getMinutes();
            if (Minutes < 10) {
                Minutes = "0" + Minutes;
            }
            var Seconds = now_t.getSeconds();
            if (Seconds < 10) {
                Seconds = "0" + Seconds;
            }
            div.innerHTML = '<div>' + Hours + ":" + Minutes + ":" + Seconds + '</div>';
        }

        setInterval(showTime, 250);
    </script>
</body>
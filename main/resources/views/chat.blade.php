<!doctype html>
<html lang="en">

<head>
    <!-- /Yandex.Metrika counter -->
    <meta charset="utf-8" />
    <title>Alex18w</title>
    <link rel="shortcut icon" href="./img/LogoA.JPG">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css2/style.css" rel="stylesheet" type="text/css" id="theme-opt" />
    <link href="../css2/style2.css" rel="stylesheet" type="text/css" id="theme-opt" />
    <link href="../css2/style3.css" rel="stylesheet" type="text/css" id="theme-opt" />
</head>

<body>
    <div>
        <div class="modal fade show" id="popup442073" tabindex="-1" aria-labelledby="popupLabel442073" remove-close="true"
            data-type="modal-lg modal-center " aria-modal="true" role="dialog" style="display: block;">
            <div class="modal-dialog modal-lg modal-center">
                <div class="modal-content bg-body ">
                    <div class="modal-header">
                        <h5 class="modal-title " id="popupLabel442073">Вопрос для chatGPT</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть" onclick="window.location='{{ url('/') }}'"></button>
                    </div>

                    <form action="{{ route('chat_form') }}" method="POST">
                        @csrf
                        <div class="modal-body" style="max-height:75vh; overflow:auto; overflow-x:hidden;">
                            <div class=""></div>
                            <div class="form-row row g-2 js-form-result"><input type="hidden" value="442073" name="form_id"><input type="hidden" value="1" name="submit_form">

                                <div class="col-sm-12 pb-2">
                                    <label class="form-label">Напишите вопрос</label>
                                    <textarea placeholder="" style="height:100px" name="question" id="question"
                                        class="form-control form-control-default" rows="5" autocomplete="off" maxlength="2000"></textarea>
                                </div>

                                <div class="col-sm-12 pb-2">
                                    <label class="form-label">Ответ chatGPT</label>
                                    <textarea placeholder="" style="height:200px" name="text_message"
                                        class="form-control form-control-default" rows="5" autocomplete="off" maxlength="2000">{{ session('answer') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="token col-sm-4 pb-2">
                                <label style="padding-top: 5px;" class="form-label">Токен</label>
                                <input type="text" value="" placeholder="" name="token"
                                    class="form-control form-control-default" required="" autocomplete="off" data-mask="phone-1"
                                    data-init-mask="true">
                            </div>
                            <div>
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal" onclick="window.location='{{ url('/') }}'">Закрыть</button>
                                <button type="submit" name="submit" class="btn js-form-btn btn-primary auto">Отправить</button>
                            </div>

                        </div>
                        <input type="hidden" name="csrf_token" value="XfJveHBZrE">
                    </form>
                    @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                        <li style="color: red">{{$error}}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>

</html>
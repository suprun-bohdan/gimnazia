<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('site/css/style.css') }}">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
    <!--    <link rel="stylesheet" href="css/owl.carousel.min.css">-->
    <!--    <link rel="stylesheet" href="css/owl.theme.default.min.css">-->
    <script src="https://use.fontawesome.com/646c13d065.js"></script>
    <title>ЗЗСО - @yield('title')</title>
    <link href="{{ asset('site') }}/img/index.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
</head>
<body>
<script src="{{ asset('site/js/jquery-3.6.0.min.js') }}"></script>
<!--START CONTAINER-->
<div class="container">
    <!--START CONTAINER-->
    <header>
        <div class="row">
            <div class="col-6">
                <a class="btn btn-info lang ua" href="#">UA</a>
                <a class="btn btn-info lang en" href="#">EN</a>
            </div>
            <div class="col-6 text-right">
                <a class="btn btn-info lang" href="#">Учнівський куток</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <a href="/">
                    <img src="{{ asset('site/img/logo-uk.png') }}"
                         alt="Вашківецька гімназія" id="header-logo">
                </a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12 text-center">
                <nav class="nav justify-content-center">
                    <a class="nav-link active" href="#">Про школу</a>
                    <a class="nav-link" href="#">Вступ</a>
                    <a class="nav-link" href="{{ url('/news') }}">Новини</a>
                    <a class="nav-link" href="#">Для батьків</a>
                    @if(config('app.login') == true)
                    <a class="nav-link disabled" href="#">Авторизація</a>
                    @endif
                    @if(config('app.register') == true)
                        @if(!Auth::check())
                            <a class="nav-link disabled" href="/register">Реєстрація</a>
                        @endif
                    @endif
                </nav>
            </div>
        </div>
    </header>
@yield('content')
<!--END CONTAINER-->
</div>
<!--END CONTAINER-->

<footer class="container-fluid">
    <div class="row text-center">
        <div class="col-4">
            <ul class="list-unstyled">
                <li>
                    <a href="#!" class="font-weight-bold">Вакансії</a>
                </li>
            </ul>
            <p><?= date('Y') ?> - 2021. Всі права належать «Вашківецька
                гімназія»
                При використанні матеріалів посилання на сайт обов`язкове.</p>
        </div>
        <div class="col-4">
            <!-- Links -->
            <ul class="list-unstyled">
                <li class="social">
                    <a href="#!"><i class="fa fa-facebook-square"
                                    aria-hidden="true"></i></a>
                    <a href="#!"><i class="fa fa-instagram"
                                    aria-hidden="true"></i></a>
                    <a href="#!"><i class="fa fa-youtube-play"
                                    aria-hidden="true"></i></a>
                </li>
                <li class="footer-contact">
                    <p>Вашківці, вул.Бажанського, 9, Вижницький р-н., Чернівецька обл.
                        <br>
                        <a href="tel:38373043494">+38 3730 4 34 94</a>
                        <br>
                        <a href="mailto:vashkivtsi.gimnazia@gmail.com">vashkivtsi.gimnazia@gmail.com</a>
                    </p>
                </li>
            </ul>
        </div>
        <div class="col-4">
            <ul class="list-unstyled">
                <li>
                    <figure>
                        <a href="https://www.bsc.cv.ua" target="_blank"><img src="{{ asset('site/img/BSC@0,1x.png') }}"
                                                                             alt="BSC Group"
                                                                             style="height: 35px; margin-top: 20px"></a>
                        <figcaption>
                            Реалізуємо Ваші ідеї!
                        </figcaption>
                    </figure>
                </li>
                <li>
                    <span>Версія сайту: {{ $tag }}</span>
                </li>
            </ul>
        </div>
    </div>
</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>
<script>
    var slider = tns({
        container: '.news-slider',
        items: 3,
        controlsContainer: ".navSlider",
        controlsText: ["Назад", "Вперед"],
        responsive: {
            640: {
                edgePadding: 20,
                gutter: 20,
                items: 2
            },
            700: {
                gutter: 30
            },
            900: {
                items: 3
            }
        }
    });
</script>
</body>
</html>

<!doctype html>
<html lang="uk-UA">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-018TX5F6V2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-018TX5F6V2');
    </script>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('site/css/style.css') }}">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
    <script src="https://use.fontawesome.com/646c13d065.js"></script>
    @if(isset($sitename) && !empty($sitename))
        <meta property="og:title" content="{{ $sitename->data }} - @yield('title')">
    @endif
    <meta property="og:description" content="Вашківецький заклад загальної середньої освіти І - ІІІ ступенів імені Івана Бажанського Вашківецької міської ради Вижницького району Чернівецької області. Ліцей з початковою школою та гімназією. Вашківецький ЗЗСО ім. І. Бажанського.">
    <meta property="og:image" content="https://gimnazia.vashkivtsi.com.ua/storage/img/2023-03-06/RSQvDzSZm1pIeOsEYLmaIt9amfvfKJlyOe0k92oU.png">
    <meta property="og:url" content="https://gimnazia.vashkivtsi.com.ua">
    <meta property="og:type" content="website">
    @if(isset($sitename) && !empty($sitename))
        <title>{{ $sitename->data }} - @yield('title')</title>
    @else
        <title>Школа - @yield('title')</title>
    @endif
    <meta name="description" content="Вашківецький ЗЗСО ім. І. Бажанського: якісна освіта, глибокі традиції, сучасні методики. Відкрийте для себе нашу шкільну спільноту!">
        <meta name="keywords" content="вашківці, чернівці, вижниця, освіта, буковина, школа, бажанський, історія">
    @if(isset($favicon->data))
        <link href="{{ asset('storage/') . '/' . $favicon->data ?? asset('site/img/index.ico') }}" rel="shortcut icon"
              type="image/vnd.microsoft.icon"/>
    @else
        <link href="{{ asset('site/img/index.ico') }}" rel="shortcut icon" type="image/vnd.microsoft.icon"/>
    @endif
</head>
<body>
<script src="{{ asset('site/js/jquery-3.6.0.min.js') }}"></script>
<!--START CONTAINER-->
<div class="container">
    <!--START CONTAINER-->
    <header>
        <div class="row">
            <div class="col-6">
                {{--                <a class="btn btn-info lang ua" href="#">UA</a>--}}
                {{--                <a class="btn btn-info lang en" href="#">EN</a>--}}
            </div>
            <div class="col-6 text-right">
                {{--                @if(Auth::check()->role)
                                    <a class="btn btn-info lang" href="{{ route('admin') }}">Адмін панель</a>
                                @endif--}}
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <h1 style="display: none">{{ $full_sitename->data ?? "Вашківецький ЗЗСО І-ІІІ ступенів ім. Бажанського" }}</h1>
                <a href="/">
                    @if(isset($logo->data))

                        <img src="{{ asset('storage/') . '/' . $logo->data }}"
                    @else
                        <img src="{{  asset('site/img/logo-uk.png')  }}"
                             @endif
                             alt="{{ $full_sitename->data ?? "Вашківецький ЗЗСО І-ІІІ ступенів ім. Бажанського" }}"
                </a>
            </div>
        </div>
        @if(auth()->check())
            <hr>
            <div class="row">
                <div class="col-12 text-center">
                    Вітаємо Вас на сайті {{ Auth::user()->first_name  }} {{ Auth::user()->last_name }}
                </div>
            </div>
        @endif
        <hr>
        <div class="row">
            <div class="col-12 text-center">
                @include('template.partials.nav')
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
                <li>
                    <p>{{ date('Y') }}. Всі права належать
                        «<? if (isset($sitename->data)) : echo $sitename->data; else : "Школі"; endif; ?>».
                        <br>
                        При використанні матеріалів посилання на сайт обов`язкове.</p>
                </li>
            </ul>

        </div>
        <div class="col-4">
            <!-- Links -->
            <ul class="list-unstyled">
                <li class="social">
                    <a href="https://{{ $fb->data ?? "#" }}" target="_blank"><i class="fa fa-facebook-square"
                                                                                aria-hidden="true"></i></a>
                    <a href="https://{{ $ig->data ?? "#"}}" target="_blank"><i class="fa fa-instagram"
                                                                               aria-hidden="true"></i></a>
                    <a href="https://{{ $youtube ?? "#" }}" target="_blank"><i class="fa fa-youtube-play"
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
                <li style="opacity: 0.6; color: gray; filter: grayscale(100%);">
                    <img src="https://freetools.seobility.net/widget/widget.png?url=gimnazia.vashkivtsi.com.ua" alt="Seobility Score for gimnazia.vashkivtsi.com.ua">
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
                        <figcaption>
                            +38 (068) 578 67 48
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

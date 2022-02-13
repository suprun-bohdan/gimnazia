<?php
use App\Nav;
$datasets = Nav::getNav();
?>
<nav class="nav justify-content-center">
    @if(!isset($navs))
        @foreach($navs as $nav)
            <a class="nav-link" href="{{ $nav->uri }}">{{ $nav->value }}</a>
        @endforeach
    @else
        <a class="nav-link active" href="#">Про школу</a>
        <a class="nav-link" href="#">Вступ</a>
        <a class="nav-link" href="#">Для батьків</a>
        <a class="nav-link" href="{{ url('/news') }}">Новини</a>

{{--
            <pre>
                <? print_r($datasets) ?>
            </pre>
--}}

            <?php
            foreach ($datasets as $k => $v) {
                echo "<ul style='font-weight: bold'>";
                echo $k;
                foreach ($v as $item) {
                    echo "<li style='font-weight: lighter'>";
                    echo $item['value'] . " | " .$item['uri'];
                    echo "</li>";
                }
                echo "</ul>";
            }

            ?>
            @foreach($datasets as $k => $v)
            <div class="btn-group">
            <button type="button" class="btn nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ $k }}
            </button>
            <div class="dropdown-menu">
                @foreach($v as $item)
                <a class="dropdown-item" href="{{ $item['uri'] }}">{{ $item['value'] }}</a>
                @endforeach
            </div>
            </div>
            @endforeach
    @endif
    @if(config('app.login') == true)
        @if(!Auth::check())
            <a class="nav-link disabled" href="/login">Авторизація</a>
            <a class="nav-link disabled" href="/register">Реєстрація</a>
        @endif
    @endif
    @if(config('app.register') == true)
        @if(Auth::check())
            <a class="nav-link disabled" href="/logout">Вихід</a>
            @if(Auth::user()->role)
                <a class="nav-link disabled" href="/admin">Адмін панель</a>
            @endif
        @endif
    @endif
</nav>

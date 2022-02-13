<?php
use App\Nav;
$dataset = Nav::getNav();
print_r($dataset);
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
        <div class="btn-group">
{{--            @foreach($dataset[0] as $data)
            <button type="button" class="btn nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ $data }}
            </button>
            <div class="dropdown-menu">
                @foreach($data as $k => $v)
                <a class="dropdown-item" href="{{ $k['uri'] }}">{{ $v['value'] }}</a>
                @endforeach
            </div>
            @endforeach--}}
        </div>
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

<?php

use App\Nav;

$datasets = Nav::getNav();
?>
<nav class="nav justify-content-center">
    <a class="nav-link" href="{{ url('/') }}">Головна</a>
    @if(!isset($navs))
        @foreach($navs as $nav)
            <a class="nav-link" href="{{ $nav->uri }}">{{ $nav->value }}</a>
        @endforeach
    @else
        <a class="nav-link" href="{{ url('/news') }}">Новини</a>
        @foreach($datasets as $k => $v)
            @if(is_int($k))
                <a class="nav-link" href="{{ $v['uri'] }}">{{ $v['value'] }}</a>
            @else
                <div class="btn-group">
                    <button type="button" class="btn nav-link dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">
                        {{ $k }}
                    </button>
                    <div class="dropdown-menu">
                        @foreach($v as $item)
                            @if(isset($item['uri']))
                                <a class="dropdown-item" href="{{ $item['uri'] }}">{{ $item['value'] }}</a>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    @endif
    @if(config('app.login'))
        @if(!Auth::check())
            <a class="nav-link disabled" href="/login">Авторизація</a>
            @if(config('app.register'))
                <a class="nav-link disabled" href="/register">Реєстрація</a>
            @endif
        @endif
    @endif
    @if(config('app.login'))
        @if(Auth::check())
            <a class="nav-link disabled" href="/logout">Вихід</a>
            @if(Auth::user()->role === 1)
                <a class="nav-link disabled" href="/admin">Адмін панель</a>
            @endif
        @endif
    @endif
</nav>

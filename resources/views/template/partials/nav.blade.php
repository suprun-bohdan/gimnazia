@php
    use App\Nav;

    $datasets = Nav::getNav();
@endphp

<style>
    :root {
        --desktop-nav-font-size-h3: 0.75rem;
        --desktop-nav-text-transform-h3: uppercase;
        --desktop-nav-color-h3: gray;
        --desktop-nav-font-weight-h3: inherit;
        --desktop-nav-transition-standard: all 0.3s ease;
        --desktop-nav-menu-background: #f4f4f4;
        --desktop-nav-menu-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.2);
        --desktop-nav-link-color: #222;
        --desktop-nav-link-hover-color: #00b4d5;
        --desktop-nav-padding-standard: 5px 2px;
        --desktop-nav-font-standard: normal normal 600 12px/1 "Arial";
        --desktop-nav-font-menu-col: 400 12px/1 "Montserrat", sans-serif;
        --desktop-nav-border-color: rgba(0, 0, 0, 0.1);
        --desktop-nav-shadow-light: 0 2px 2px 0 rgba(0, 0, 0, 0.2);
        --desktop-nav-z-index-menu: 99999;
    }

    .desktop-nav-container .main-navigation {
        width: 100%;
        background-color: #ffffff;
        display: block;
        z-index: 98;
        text-rendering: optimizeLegibility;
        align-content: center;
        box-shadow: var(--desktop-nav-shadow-light);
        position: relative;
    }

    .desktop-nav-container .main-navigation a {
        text-decoration: none;
    }

    .desktop-nav-container nav {
        display: flex;
        justify-content: center;
    }

    .desktop-nav-container nav ul,
    .desktop-nav-container nav ol {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .desktop-nav-container ul li:hover ul::before {
        box-shadow: var(--desktop-nav-menu-shadow);
        width: 100%;
        position: absolute;
        content: "";
        top: -11px;
        left: -3px;
        z-index: var(--desktop-nav-z-index-menu);
        margin: 3px;
        height: 8px;
    }

    .desktop-nav-container *,
    .desktop-nav-container ::before,
    .desktop-nav-container ::after {
        box-sizing: border-box;
    }

    .desktop-nav-container nav a,
    .desktop-nav-container nav span {
        font: var(--desktop-nav-font-standard);
        text-transform: uppercase;
        color: var(--desktop-nav-link-color);
        display: block;
        padding: var(--desktop-nav-padding-standard);
        cursor: pointer;
        transition: var(--desktop-nav-transition-standard);
    }

    .desktop-nav-container .first-item {
        padding-left: 10px;
    }

    .desktop-nav-container .last-item {
        padding-right: 10px;
    }

    .desktop-nav-container ul h3 {
        font-size: var(--desktop-nav-font-size-h3);
        text-transform: var(--desktop-nav-text-transform-h3);
        color: var(--desktop-nav-color-h3);
        font-weight: var(--desktop-nav-font-weight-h3);
    }

    .desktop-nav-container ul li ul {
        visibility: hidden;
        position: absolute;
        background: var(--desktop-nav-menu-background);
        padding: 1rem;
        opacity: 0;
        top: 100%;
        left: 0;
        z-index: -1;
        transform: translateY(-10px);
        transition: transform 0.3s ease, opacity 0.3s ease, visibility 0s 0.3s, z-index 0s 0.3s;
    }

    .desktop-nav-container ul li:hover ul {
        visibility: visible;
        opacity: 1;
        transform: translateY(0);
        z-index: 1;
        transition: transform 0.3s ease, opacity 0.3s ease, visibility 0s 0s, z-index 0s 0s;
    }

    .desktop-nav-container ul {
        margin: 0;
        padding: 0;
        display: flex;
    }

    .desktop-nav-container ul .menu-col {
        float: left;
        min-width: 212px;
        max-width: 242px;
        padding: 0 10px;
    }

    .desktop-nav-container ul li {
        position: relative;
        display: inline-block;
    }

    .desktop-nav-container nav div {
        text-rendering: optimizeLegibility;
    }

    /* Styling for active hover states */
    .desktop-nav-container ul li:hover > span,
    .desktop-nav-container ul li:hover > a {
        color: var(--desktop-nav-link-hover-color);
    }

    .desktop-nav-container .menu-col li {
        padding: 0;
    }

    .menu-col li a {
        font: var(--desktop-nav-font-menu-col);
    }

    .desktop-nav-li-a-custom {
        padding: 0!important;
    }
</style>

<style>
    .site-nav li {
        display: flex!important;
        align-items: center!important;
    }
</style>

<div class="desktop-nav-container">
    <div class="main-navigation" role="navigation" aria-label="Головна навігація">
        <nav>
            <ul class="site-nav" role="menubar">
                <li role="none">
                    <span class="first-item"><a href="{{ url('/') }}" title="Перейти на Головну" role="menuitem">Головна</a></span>
                </li>
                @if(!empty($datasets))
                    @foreach($datasets as $key => $navItems)
                        @if(is_int($key))
                            <li role="none">
                                <span><a href="{{ $navItems['uri'] }}" class="desktop-nav-li-a-custom" title="Перейти на {{ $navItems['value'] }}" role="menuitem">{{ $navItems['value'] }}</a></span>
                            </li>
                        @else
                            <li role="none" aria-haspopup="true" aria-expanded="false">
                                <!-- Використовуємо aria-label для групи підпунктів -->
                                <span aria-label="Меню {{ $key }}" tabindex="0" role="menuitem">{{ $key }}</span>
                                <ul class="submenu" aria-label="{{ $key }}" role="menu">
                                    @php
                                        $totalItems = count($navItems);
                                        $columns = 1;

                                        if ($totalItems >= 10) {
                                            $columns = 3;
                                        } elseif ($totalItems >= 5) {
                                            $columns = 2;
                                        }

                                        $chunks = array_chunk($navItems, ceil($totalItems / $columns));
                                    @endphp
                                    @foreach($chunks as $chunk)
                                        <div class="menu-col">
                                            @foreach($chunk as $item)
                                                @if(isset($item['uri']))
                                                    <li role="none">
                                                        @php
                                                            $newUrl = str_replace(parse_url($item['uri'], PHP_URL_HOST), parse_url(config('app.url'), PHP_URL_HOST), $item['uri']);
                                                        @endphp
                                                        <a href="{{ $newUrl }}" style="max-width: 100%" title="Перейти на {{ $item['value'] }}" role="menuitem">{{ $item['value'] }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    @endforeach
                @else
                    <li role="none"><span><a href="{{ url('/news') }}" title="Перейти на Новини" role="menuitem">Новини</a></span></li>
                @endif

                @if(config('app.login'))
                    @if(!Auth::check())
                        <li role="none"><span class="last-item"><a href="/login" title="Перейти до Авторизації" role="menuitem">Авторизація</a></span></li>
                        @if(config('app.register'))
                            <li role="none"><span><a href="/register" title="Перейти до Реєстрації" role="menuitem">Реєстрація</a></span></li>
                        @endif
                    @else
                        <li role="none"><span><a href="/logout" title="Вийти з акаунту" role="menuitem">Вихід</a></span></li>
                        @if(Auth::check() && Auth::user()->role === 1)
                            <li role="none"><span><a href="/admin" title="Перейти до Адмін панелі" role="menuitem">Адмін панель</a></span></li>
                        @endif
                    @endif
                @endif
            </ul>
        </nav>
    </div>
</div>

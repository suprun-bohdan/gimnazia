    <aside class="app-sidebar">
        {{--    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
                <div>
                    <p class="app-sidebar__user-name">John Doe</p>
                    <p class="app-sidebar__user-designation">Frontend Developer</p>
                </div>
            </div>--}}
        <ul class="app-menu">
            <li><a class="app-menu__item active" href="/"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Головна</span></a></li>
            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Елементи</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="{{ route('slider') }}"><i class="icon fa fa-circle-o"></i> Додати слайдер</a></li>
                    <li><a class="treeview-item" href="{{ route('sliderList') }}"><i class="icon fa fa-circle-o"></i> Список слайдерів</a></li>
                </ul>
            </li>
            <li><a class="app-menu__item" href="charts.html"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Charts</span></a></li>
            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Записи</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="{{ route('newsAdd') }}"><i class="icon fa fa-circle-o"></i> Додати новину</a></li>
                    <li><a class="treeview-item" href="{{ route('newsList') }}"><i class="icon fa fa-circle-o"></i> Список новин</a></li>
                    <li><a class="treeview-item" href="{{ route('categories') }}"><i class="icon fa fa-circle-o"></i> Категорії</a></li>
                </ul>
            </li>
            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Меню</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="{{ route('navPage') }}"><i class="icon fa fa-circle-o"></i> Панель навігації</a></li>
                </ul>
            </li>
            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Сторінки</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="{{ route('admin') }}/page/create"><i class="icon fa fa-circle-o"></i> Створити сторінку</a></li>
                    <li><a class="treeview-item" href="{{ route('page.view') }}"><i class="icon fa fa-circle-o"></i> Список сторінок</a></li>
                </ul>
            </li>
            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Документація</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="/guide"><i class="icon fa fa-file-word-o"></i> Інструкція користувача</a></li>
                    <li><a class="treeview-item" href="/guide"><i class="icon fa fa-file-code-o"></i> Інструкція для розробника</a></li>
                    <li><a class="treeview-item" href="/guide"><i class="icon fa-question-circle-o "></i> Питання / Відповіть</a></li>
                    <li><a class="treeview-item" href="/guide"><i class="icon fa fa-comments-o"></i> Онлайн чат</a></li>
                </ul>
            </li>
            <li class="treeview"><a class="app-menu__item" href="{{ route('settings') }}" data-toggle="treeview"><i class="app-menu__icon fa fa-cog"></i><span class="app-menu__label">Налаштування</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="{{ route('createSettings') }}"><i class="icon fa fa-file-word-o"></i> Додати налаштування</a></li>
                    <li><a class="treeview-item" href="{{ route('showSettings') }}"><i class="icon fa fa-file-code-o"></i> Показати всі налаштування</a></li>
                </ul>
            </li>
        </ul>
    </aside>

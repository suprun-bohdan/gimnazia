@extends('template.layout')
@section('title', 'Новини')
@section('content')
    <!-- CONTENT NEWS -->

    <div class="row" style="margin-top: 4%;">
        <div class="col-12">
            <div class="heading red" role="banner">
                <div>
                    <h2>Новини</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12" id="news-categories">
            <!-- Додано aria-label для опису навігації -->
            <nav class="nav news-nav justify-content-center" aria-label="Категорії новин">
                <!-- Додано aria-current="page" для активної сторінки -->
                <a class="nav-link active" href="/news" aria-current="page">Всі новини</a>
                <a class="nav-link active" href="{{ route('category', 0) }}">Без рубрик</a>
                @foreach($categories as $category)
                    <a class="nav-link" href="{{ route('category', $category->id) }}">{{ $category->category_name }}</a>
                @endforeach
            </nav>
        </div>
    </div>
    <!-- Додано aria-label для форми пошуку -->
    <form action="{{ route('search') }}" method="get" class="search_form news" aria-label="Пошук новин">
        <div class="input-group f_search">
            <input type="text" style="border: 1px solid green" class="form-control" value="{{ old('q') }}" name="q" aria-label="Введіть пошуковий запит">
            <span class="input-group-btn" style="display:inline;margin-left:-5px;">
                <button class="btn btn_search_form" style="border: 1px solid green">Пошук</button>
            </span>
        </div>
    </form>
    <div class="row news-cards">
        @foreach($posts as $post)
            <div class="card" style="width: 18rem;" role="article" aria-labelledby="post-title-{{ $post->id }}">
                <a href="{{ route('post', ['id' => $post->id]) }}">
                    <img class="card-img-top"
                         src="{{ Storage::url($post->p_img) }}"
                         alt="Зображення {{ $post->title }}">
                </a>
                <a href="{{ route('post', ['id' => $post->id]) }}">
                    <div class="card-body">
                        <!-- Додано id для асоціації з ARIA -->
                        <h5 class="card-title" id="post-title-{{ $post->id }}">{{ $post->title }}</h5>
                        <p class="card-text">{{ substr($post->description, 0, 160) . "..." }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <div class="row col-12 justify-content-center">
        <!-- Пагінація з описом -->
        <nav aria-label="Навігація сторінками">
            {{ $posts->links() }}
        </nav>
    </div>
    <!-- END CONTENT -->

@endsection

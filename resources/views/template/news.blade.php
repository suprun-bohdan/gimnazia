@extends('template.layout')
@section('title', 'Новини')
@section('content')
    <!-- CONTENT NEWS -->

    <div class="row" style="margin-top: 4%;">
        <div class="col-12">
            <div class="heading red">
                <div>
                    <h2>Новини</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12" id="news-categories">
            <nav class="nav news-nav justify-content-center">
                <a class="nav-link active" href="/news">Всі новини</a>
                <a class="nav-link active" href="{{ route('category', 0) }}">Без рубрик</a>
                @foreach($categories as $category)
                <a class="nav-link active" href="{{ route('category', $category->id) }}">{{ $category->category_name }}</a>
                @endforeach
            </nav>
        </div>
    </div>
    <form action="{{ route('search') }}" method="get" class="search_form news"><div class="input-group f_search"><input type="text" style="border: 1px solid green" class="form-control" value="{{ old('q') }}" name="q"><span class="input-group-btn" style="display:inline;margin-left:-5px;"><button class="btn btn_search_form" style="border: 1px solid green">Пошук</button></span></div></form>
    <div class="row news-cards">
            @foreach($posts as $post)
                <div class="card" style="width: 18rem;">
                    <a href="{{ route('post', ['id' => $post->id]) }}">
                    <img class="card-img-top"
                         src="{{ Storage::url($post->p_img) }}"
                         alt="Card image cap">
                    </a>
                    <a href="{{ route('post', ['id' => $post->id]) }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ substr($post->description, 0, 160) . "..." }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
    </div>
    <div class="row col-12 justify-content-center">
        {{ $posts->links() }}
    </div>
    <!-- END CONTENT-->

@endsection

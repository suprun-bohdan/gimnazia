@extends('template.layout')
@section('title', 'Новина')
@section('content')
    <!-- CONTENT-->
    <div class="row">
        <div class="col-10">
            <h2 class="text-center">{{ $post->title }}</h2>
            <hr>
            <img class="img-fluid" src="{{ Storage::url($post->p_img) }}" alt="{{ $post->title }}">
            <div class="post-content">
                {!!$post->text !!}
            </div>
            <hr>
            <span>Автор: {{ $author->first_name }} {{ $author->last_name }} | Дата створення: {{ $date }} | Переглядів: {{ $visitors }}</span>
        </div>
    </div>

    <!-- END CONTENT-->

@endsection

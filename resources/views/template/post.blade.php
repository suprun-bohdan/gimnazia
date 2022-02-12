@extends('template.layout')
@section('title', 'Новини')
@section('content')
    <!-- CONTENT-->
    <meta property="og:url" content="{{ url()->current() }}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{ $full_sitename->data }}"/>
    <meta property="og:description" content="Your description"/>
    <meta property="og:image" content="{{ Storage::url($post->p_img) }}"/>

    <div class="row">
        <div class="col-10">
            <h2 class="text-center">{{ $post->title }}</h2>
            <hr>
            <img class="img-fluid" src="{{ Storage::url($post->p_img) }}" alt="{{ $post->title }}">
            <div class="post-content">
                {!!$post->text !!}
            </div>
            <hr>
            <span>Автор: {{ $author->first_name }} {{ $author->last_name }} | Дата створення: {{ $date }} | Переглядів: {{ $visitors }} | <a
                    href="#">Перейти вверх</a></span> | <input type="button" class='like btn btn-info btn-sm'
                                                               value="Подобається"/> </input>
            Лайків: <span id="likes">{{ $like }}</span>
        </div>

    </div>
    </div>

    <!-- END CONTENT-->
    <script>
        $(function () {
            $('.like').click(function () {
                likeFunction(this);
            });
        });

        function likeFunction(caller) {
            // var postId = caller.parentElement.getAttribute('postid');

            $.ajax({
                type: "POST",
                url: "{{ route('like') }}",
                data: {
                    post_id: {{ $post->id }},
                    user_id: {{ Auth::id() }},
                    sess_id: "{{ Session::getId() }}",
                },
                success: function (data) {
                    console.log(data.countPerPost)
                    $('#likes').html(data.countPerPost).show()
                }
            });
        }
    </script>
@endsection

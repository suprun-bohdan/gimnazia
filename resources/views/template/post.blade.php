@extends('template.layout')
@section('title', 'Новини')
@section('content')
    <!-- CONTENT-->
    <meta property="og:url" content="{{ url()->current() }}"/>
    <meta property="og:type" content="website"/>
    @if(isset($full_sitename->data))
    <meta property="og:title" content="{{ $full_sitename->data }}"/>
    @else
    <meta property="og:title" content="ЗЗСО І-ІІІ ст. ім. Бажанського"/>
    @endif
    <meta property="og:description" content="{{ $post->description }}"/>
    <meta property="og:image" content="{{ Storage::url($post->p_img) }}"/>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <div class="row">
        <div class="col-10">
            <h2>{{ $post->title }}</h2>
            <hr>
            <img class="img-fluid rounded mx-auto d-block" src="{{ Storage::url($post->p_img) }}" alt="{{ $post->title }}">
            <div class="post-content">
                {!!$post->text !!}
            </div>
            <hr>
            <span>Автор: {{ $author->first_name }} {{ $author->last_name }} | Дата створення: {{ $date }} | Переглядів: {{ $visitors }} | <a
                    href="#">Перейти вверх</a></span> | <span class="like" style="cursor: pointer; color: red"><i class="fa fa-heart"></i></span>
            <span id="likes">{{ $like }}</span>

            | <!-- Your share button code -->
            <div class="fb-share-button"
                 data-href="https://www.your-domain.com/your-page.html"
                 data-layout="button_count">
            </div>
        </div>
        <div class="col-2 recommended">
            <table class="table-responsive table-borderless text-center">
                @foreach($recommendeds as $r)
                    <tr>
                        <td class="recommended-title">{{ $r->title }}</td>
                    </tr>
                    <tr>
                        <td>
                            <img class="img-fluid recommended-image" src="{{ Storage::url($r->p_img) }}">
                            <br>
                            <p>
                                {{ $r->description }}
                            </p>
                            <br>
                            <a class="recommended-url" href="{{ route('post', $r->id) }}">Читати далі</a>
                            <hr>
                        </td>
                    </tr>
                @endforeach
            </table>
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

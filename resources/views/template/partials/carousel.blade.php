<div class="row">
    <div class="col-12 allNews text-center">
        <a href="{{ url('/news') }}" class="badge badge-info">Переглянути всі новини</a>
    </div>
</div>
<div class="row">
    <div class="col-12 navSlider text-center">
        <button class="btn btn-secondary btn-sm" data-controls="prev"
                tabindex="-1" aria-controls="tns1">Назад
        </button>
        <button class="btn btn-secondary btn-sm" data-controls="next"
                tabindex="-1" aria-controls="tns1">Вперед
        </button>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="news-slider">
                @foreach($lastNews as $last)
                    <div>
                        <div class="card" style="width: auto;">
                            <img class="card-img-top" src="{{ Storage::url($last->p_img) }}"
                                 alt="{{ $last->title }}">
                            <a href="{{ route('post', ['post_id' => $last->id]) }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $last->title }}</h5>
                                <p class="card-text">{{ $last->description }}</p>
                            </div>
                            </a>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>
</div>

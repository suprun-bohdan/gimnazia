<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    @if(count($sliders) > 1)
        <ol class="carousel-indicators">
            @php($i = 0)
            @foreach($sliders as $key => $slide)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
                @php($i++)
            @endforeach
        </ol>
    @endif
    <div class="carousel-inner">
        @foreach($sliders as $slide)
            <div class="carousel-item">
                <img class="d-block w-100 custom-slider-style" src="{{ Storage::url($slide->img_url) }}" alt="First slide">
                @if(!empty($slide->preview_text))
                    @if(isset($_SERVER['HTTPS']))
                        <a href="https://{{ $slide->url ?? "#" }}"><span class="slider-description">{{ $slide->preview_text }}</span></a>
                    @else
                        <a href="http://{{ $slide->url ?? "#" }}"><span class="slider-description">{{ $slide->preview_text }}</span></a>
                    @endif
                @endif
            </div>
        @endforeach
    </div>
    @if(count($sliders) > 1)
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    @endif
</div>
<script>
    $('.carousel-item').first().addClass('active')
</script>

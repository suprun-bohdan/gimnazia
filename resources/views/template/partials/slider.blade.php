<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        @foreach($sliders as $slide)
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ Storage::url($slide->img_url) }}" alt="First slide">
                @if(!empty($slide->preview_text))
                    @if($_SERVER['HTTPS'])
                        <a href="https://{{ $slide->url ?? "#" }}"><span class="slider-description">{{ $slide->preview_text }}</span></a>
                    @else
                        <a href="http://{{ $slide->url ?? "#" }}"><span class="slider-description">{{ $slide->preview_text }}</span></a>
                    @endif

                @endif
            </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<script>
    $('.carousel-item').first().addClass('active')
</script>




@extends('template.layout')
@section('title', 'Головна')
@section('content')
    @if(isset($sliders) and $sliders == true)

    <div class="row">
        <div class="col-12">
    @include('template.partials.slider')
        </div>
    </div>
    <hr>
    @endif
    @if(isset($lastNews) and $lastNewsStatus === true)
    <div class="row">
        <div class="col-12">
            <div class="heading red">
                <div>
                    <h2>Новини</h2>
                </div>
            </div>
        </div>
    </div>
    @include('template.partials.carousel')
    <hr>
    @endif
    @include('template.partials.address')
@endsection

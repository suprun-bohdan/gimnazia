@extends('template.layout')
@section('title', 'Головна')
@section('content')
    <div class="row">
        <div class="col-12">
    @include('template.partials.slider')
        </div>
    </div>
    <hr>
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
    @include('template.partials.address')
@endsection

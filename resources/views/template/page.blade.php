@php
$pageTitle = 'сторінка';
if (isset($page->title))
    $pageTitle = $page->title;
@endphp
@extends('template.layout')
@section('title', $pageTitle)
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="heading red">
                <div>
                    <h2>{{ $page->title }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        {!! $page->text !!}
    </div>

    <a href="#" class="btn btn-info align-content-center">Вверх</a>
@endsection

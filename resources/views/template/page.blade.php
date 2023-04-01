@php
$pageTitle = 'сторінка';
if (isset($page->title))
    $pageTitle = $page->title;
@endphp
@php
    if (isset($page->files))

    $files = json_decode($page->files);
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
    <div class="row">
        <div class="col-4">
            <span>Прикріплені файли</span>
            <hr>
            <table>
                <thead>
                <tr>
                    <th>Назва файлу</th>
                    <th>Посилання</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($files as $file)
                    <tr id="file-archive">
                        <? $url = Storage::url($file) ?>
                        <td>{{ basename($file) }}</td>
                        <td><a href="{{ $url }}" download="{{ basename($url) }}">Завантажити</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@php
    $pageTitle = 'сторінка';
    if (isset($page->title))
        $pageTitle = $page->title;
@endphp
@php
    if (isset($page->files))

    $files = json_decode($page->files);
@endphp
@php
    if (isset($page->files))

    $files = json_decode($page->files);
@endphp
@extends('template.layout')
@section('title', $pageTitle)
@section('content')
    <div class="row content-page">
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
    @if(!empty($files))
        <div class="row">
            <div class="col-4">
                <span>Прикріплені файли</span>
                <hr>
                <table>
                    <thead>
                    <tr>
                        <th>Назва файлу</th>
                        <th>Посилання</th>
                        @if(auth()->check() && auth()->user()->role == 1)
                            <th>Дії</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($files as $file)
                        <tr id="file-archive">
                            @php
                                $url = Storage::url($file->path);
                                $filename = \Illuminate\Support\Str::afterLast($url, '/');
                                $filenameWithoutExtension = \Illuminate\Support\Str::beforeLast($filename, '.');
                                $filenameWithoutExtension = urldecode($filenameWithoutExtension);
                            @endphp
                            <td>{{ $filenameWithoutExtension }}</td>
                            <td><a href="{{ asset($url) }}" download="{{ basename($url) }}">Завантажити</a></td>
                            @if(auth()->check() && auth()->user()->role == 1)
                                <td>
                                    <a href="{{ route('page.file.destroy', ['page_id' => $page->page_id, 'id' => $file->id]) }}">Видалити</a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection

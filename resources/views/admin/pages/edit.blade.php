@extends('admin.layout')
@section('content')
@php
//    @dd($page->files)
    $files = json_decode($page->files);
@endphp
{{--<script type="text/javascript" src="{{ asset('js') }}/plugins/select2.min.js"></script>--}}
<script type="text/javascript" src="{{ asset('js') }}/plugins/bootstrap-datepicker.min.js"></script>
<div class="app-title">
    <div>
        <h1><i class="fa fa-edit"></i> Редагувати сторінку</h1>
        <p>В цьому розділі ви маєте можливість створити сторінку</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Сторінки</li>
        <li class="breadcrumb-item"><a href="#">Редагування сторінки</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="row">
                <div class="col-lg-12">
                    <form method="post" action="{{ route('page.update', $page->page_id) }}" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="news_title">Заголовок (обов'язкове поле)</label>
                            <input class="form-control" value="{{ $page->title }}" name="title" id="news_title" type="text" aria-describedby="titleHelp" placeholder="Введіть заголовок"><small class="form-text text-muted" id="titleHelp">Кількість символів обмежена</small>
                        </div>
                        <div class="form-group">
                            <label for="newsAdd">Текст сторінки (обов'язкове поле)</label>
                            <textarea name="text" id="newsAdd" rows="10" cols="80">{{ $page->text }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="preview_image">Оновити зображення для прев'ю</label>
                            <input class="form-control-file" id="preview_image" name="preview_image" type="file" aria-describedby="fileHelp"><small class="form-text text-muted" id="fileHelp">Це зображення буде виводитись в якості прев'ю</small>
                        </div>
                        {{ csrf_field() }}
                        <div id="filesDiv" class="form-group">
                            @if(!empty($files))
                                @foreach($files as $file)
                                    <div class="form-group">
                                        <label for="files{{ $loop->iteration }}">Документ {{ $loop->iteration }}</label>
                                        <input type="file" name="files[]" class="form-control-file" id="files{{ $loop->iteration }}" aria-describedby="fileHelp" multiple>
                                        @if (!empty($file->path))
                                            <a href="{{ asset('storage/' . $file->path) }}">Переглянути</a>
                                            <input type="hidden" name="old_files[]" value="{{ $file->path }}">
                                        @endif
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="tile-footer">
                            <button class="btn btn-primary" type="submit">Зберегти</button> | <button class="btn btn-info" onclick="addFileInput(event)">Додати документ</button>
                        </div>
                    </form>
                    <script>
                        let fileIndex = {{ count((array)$files) + 1 }};

                        function addFileInput(event) {
                            event.preventDefault();
                            let filesDiv = document.getElementById("filesDiv");
                            let newInput = document.createElement("input");
                            newInput.setAttribute("type", "file");
                            newInput.setAttribute("name", "files[]");
                            newInput.setAttribute("id", "files" + fileIndex);
                            newInput.setAttribute("class", "form-control-file");
                            newInput.setAttribute("aria-describedby", "fileHelp");
                            newInput.setAttribute("multiple", "multiple");

                            let newLabel = document.createElement("label");
                            newLabel.setAttribute("for", "files" + fileIndex);
                            newLabel.innerHTML = "Документ " + fileIndex + ":";

                            filesDiv.appendChild(newLabel);
                            filesDiv.appendChild(newInput);

                            fileIndex++;
                        }

                        let addButton = document.getElementById("addButton");
                        addButton.addEventListener("click", addFileInput);
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    CKEDITOR.replace('newsAdd', {
        filebrowserUploadUrl: "{{route('ckUploadImage', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: '{{ route('ckUploadImage') }}'
    });
</script>
<script>
    $('#createDate').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true
    });
</script>
@endsection

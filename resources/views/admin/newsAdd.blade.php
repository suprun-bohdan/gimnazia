@extends('admin.layout')
@section('content')
    <script type="text/javascript" src="{{ asset('js') }}/plugins/select2.min.js"></script>
    <script type="text/javascript" src="{{ asset('js') }}/plugins/bootstrap-datepicker.min.js"></script>
<div class="app-title">
    <div>
        <h1><i class="fa fa-edit"></i> Додати новину</h1>
        <p>В цьому розділі ви маєте можливість додати/створити новину</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Записи</li>
        <li class="breadcrumb-item"><a href="#">Створення новин</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="row">
                <div class="col-lg-12">
                    <form method="post" action="{{ route('newsCreate') }}" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="news_title">Заголовок</label>
                            <input class="form-control" name="title" id="news_title" type="text" aria-describedby="titleHelp" placeholder="Введіть заголовок"><small class="form-text text-muted" id="titleHelp">Кількість символів обмежена</small>
                        </div>
                        <div class="form-group">
                            <label for="newsAdd">Текст новини</label>
                            <textarea name="text" id="newsAdd" rows="10" cols="80"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">Короткий опис</label>
                            <textarea class="form-control" maxlength="160" name="description" id="description" rows="2" cols="2"  aria-describedby="descriptionHelp"></textarea><small class="form-text text-muted" id="descriptionHelp">Кількість символів обмежена до 160</small>
                        </div>
                        <div class="form-group">
                            <label for="category">Виберіть категорію</label>
                            <select class="form-control" name="category_id" id="category">
                                <option value="0">Без категорії</option>
                                @foreach($categories as $c)
                                    <option value="{{ $c->id }}">{{ $c->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="preview_image">Виберіть зображення для прев'ю</label>
                            <input class="form-control-file" id="preview_image" name="preview_image" type="file" aria-describedby="fileHelp"><small class="form-text text-muted" id="fileHelp">Це зображення буде виводитись</small>
                        </div>

                        <div class="form-group">
                            <label for="createDate">Виберіть дату</label>
                            <input class="form-control" id="createDate" name="time" type="text" placeholder="Виберіть дату">
                        </div>
                        {{ csrf_field() }}

                        <div class="tile-footer">
                            <button class="btn btn-primary" type="submit">Зберегти</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        // $('#demoSelect').select2();
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
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

@extends('admin.layout')
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Додати слайдер</h1>
            <p>В цьому розділі ви маєте можливість додати/створити слайдер</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Записи</li>
            <li class="breadcrumb-item"><a href="#">Створення слайдера</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="row">
                    <div class="col-lg-12">
                        <form method="post" action="{{ route('sliderCreate') }}" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="news_title">Заголовок</label>
                                <input class="form-control" name="title" id="news_title" type="text" aria-describedby="titleHelp" placeholder="Введіть заголовок"><small class="form-text text-muted" id="titleHelp">Кількість символів обмежена</small>
                            </div>
                            <div class="form-group">
                                <label for="url">Посилання</label>
                                <input class="form-control" name="url" id="url" type="text" aria-describedby="urlHelp" placeholder="Введіть заголовок">
                            </div>
                            <div class="form-group">
                                <label for="preview_text">Опис</label>
                                <textarea name="preview_text" maxlength="254" id="preview_text" rows="10" cols="80"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="img_url">Виберіть зображення для прев'ю</label>
                                <input class="form-control-file" id="img_url" name="img_url" type="file" aria-describedby="fileHelp"><small class="form-text text-muted" id="fileHelp">Це зображення буде виводитись</small>
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
@endsection

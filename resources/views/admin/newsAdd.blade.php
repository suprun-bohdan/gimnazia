@extends('admin.layout')
@section('content')
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
                    <form>
                        <div class="form-group">
                            <label for="news_title">Заголовок</label>
                            <input class="form-control" id="news_title" type="text" aria-describedby="titleHelp" placeholder="Введіть заголовок"><small class="form-text text-muted" id="titleHelp">Кількість символів обмежена</small>
                        </div>
                        <div id="editor">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Виберіть зображення для прев'ю</label>
                            <input class="form-control-file" id="exampleInputFile" type="file" aria-describedby="fileHelp"><small class="form-text text-muted" id="fileHelp">Це зображення буде виводитись</small>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tile-footer">
                <button class="btn btn-primary" type="submit">Зберегти</button>
            </div>
        </div>
    </div>
</div>
@endsection
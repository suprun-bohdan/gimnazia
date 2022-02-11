@extends('admin.layout')
@section('content')
<div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Налаштування сайту</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Налаштування сайту</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">Соціальні мережі</h3>
                <form action="#" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="news_title">YouTube</label>
                            <input class="form-control" id="news_title" type="text" aria-describedby="titleHelp" placeholder="Введіть посилання">
                        </div>
                        <div class="form-group">
                            <label for="news_title">Instagram</label>
                            <input class="form-control" id="news_title" type="text" aria-describedby="titleHelp" placeholder="Введіть посилання">
                        </div>
                        <div class="form-group">
                            <label for="news_title">Facebook</label>
                            <input class="form-control" id="news_title" type="text" aria-describedby="titleHelp" placeholder="Введіть посилання">
                        </div>
                        <div class="tile-footer">
                            <button class="btn btn-primary" type="submit">Зберегти</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">Логотипи</h3>
                <form action="#" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputFile">Favicon</label>
                            <input class="form-control-file" id="exampleInputFile" type="file" aria-describedby="fileHelp"><small class="form-text text-muted" id="fileHelp">Це зображення буде виводитись у вкладці повинно мати розмір 16х16 або 40х40 або 64х64</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Головне лого</label>
                            <input class="form-control-file" id="exampleInputFile" type="file" aria-describedby="fileHelp"><small class="form-text text-muted" id="fileHelp">Це зображення буде виводитись по центру зверху</small>
                        </div>
                        <div class="tile-footer">
                            <button class="btn btn-primary" type="submit">Зберегти</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

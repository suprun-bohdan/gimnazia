@extends('admin.layout')
@section('content')
    <script type="text/javascript" src="{{ asset('js') }}/plugins/select2.min.js"></script>
    <script type="text/javascript" src="{{ asset('js') }}/plugins/bootstrap-datepicker.min.js"></script>
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Перегляд всіх налаштувань</h1>
            <p>В цьому розділі ви маєте можливість налаштувати сайт</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Налаштування</li>
            <li class="breadcrumb-item"><a href="#">Перегляд всіх налаштувань</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="row">
                    <div class="col-lg-6">
                        <form enctype="multipart/form-data" method="post" action="{{ route('createField') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="value">Значення (англ)</label>
                                <input class="form-control" name="value" maxlength="254" id="value" type="text">
                            </div>
                            <div class="form-group">
                                <label for="data">Вставити файл</label>
                                <input class="form-control-file" name="data" id="data" type="file">
                            </div>
                            <div class="tile-footer">
                            <button type="submit" class="btn btn-primary">Додати</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4 offset-lg-1">
                        <form method="post" action="{{ route('createField') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="value">Значення (англ)</label>
                                <input class="form-control" name="value" maxlength="254" id="value" type="text">
                            </div>
                            <div class="form-group">
                                <label for="value">Дані (англ)</label>
                                <input class="form-control" name="data" maxlength="254" id="data" type="text">
                            </div>
                            <div class="tile-footer">
                                <button type="submit" class="btn btn-primary">Додати</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

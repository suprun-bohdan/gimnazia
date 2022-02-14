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
                <h3 class="tile-title">Додати</h3>
                <div class="tile-body">
                    <form>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="control-label">Прізвище</label>
                                <input class="form-control" name="last_name" type="text">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">Ім'я</label>
                                <input class="form-control" name="first_name" type="text">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">Посада</label>
                                <input class="form-control" name="position" type="text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label">Фото</label>
                                <input class="form-control" name="img" type="file">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label">Короткий опис</label>
                                <textarea name="description" id="description" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-4 align-self-end">
                            <button class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Список колег</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>фото</th>
                        <th>Прізвище ім'я</th>
                        <th>Посада</th>
                        <th>Короткий опис</th>
                        <th>Дія</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teams as $t)
                        <tr>
                            <td>{{ $n->id }}</td>
                            <td>{{ $n->img }}</td>
                            <td>{{ $n->first_name }} {{ $n->last_name }}/td>
                            <td>{{ $n->position }}</td>
                            <td>{{ $n->description }}"></td>
                            <td><a href="{{ route('navRemove', $n->id) }}"><i class="fa fa-remove"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

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
                    <div class="col-lg-12">
                        <form enctype="multipart/form-data" method="post" action="{{ route('categoriesCreate') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="value">Назва категорії</label>
                                <input class="form-control" name="category_name" maxlength="254" id="value" type="text">
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
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Всі категорії</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Назва</th>
                        <th>Дія</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $c)
                    <tr>
                        <td>{{ $c->id }}</td>
                        <td>{{ $c->category_name }}</td>
                        <td><a href="{{ route('categoryDestroy', $c->id) }}">Видалити</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

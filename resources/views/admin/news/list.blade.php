@extends('admin.layout')
@section('content')
    <script type="text/javascript" src="{{ asset('js') }}/plugins/select2.min.js"></script>
    <script type="text/javascript" src="{{ asset('js') }}/plugins/bootstrap-datepicker.min.js"></script>
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Список новин</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Новини</li>
            <li class="breadcrumb-item"><a href="#">Перегляд всіх новин</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Список новин</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Заголовок</th>
                        <th>Короткий опис</th>
                        <th>Категорія</th>
                        <th>Переглядів</th>
                        <th>Лайків</th>
                        <th>Автор</th>
                        <th>Час додавання</th>
                        <th>Дія</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($navs as $n)
                        <tr>
                            <td>{{ $n->id }}</td>
                            <td>{{ $n->value }}</td>
                            <td><a href="{{ $n->uri }}">( перейти )</a></td>
                            <td><a href="">{{ $n->parent_id }}</a></td>
                            <td><a href="{{ route('navRemove', $n->id) }}"><i class="fa fa-remove"></i></a>  |  <a href="#"><i class="fa fa-edit"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

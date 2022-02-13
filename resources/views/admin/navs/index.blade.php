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
                        <form enctype="multipart/form-data" method="post" action="{{ route('navAdd') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="value">Назва</label>
                                <input class="form-control" name="value" maxlength="254" id="value" type="text">
                            </div>
                            <div class="form-group">
                                <label for="value">Посилання</label>
                                <input class="form-control" name="uri" maxlength="254" id="value" type="text">
                            </div>
                            <div class="form-group">
                                <label for="parent_id">Приєднати до</label>
                                <select id="select" class="form-control" name="parent_id" id="parent_id">
                                    <option selected="selected" value="0">Не приєднувати</option>
                                    @foreach($navs as $n)
                                        <option value="{{ $n->id }}">{{ $n->value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="tile-footer">
                                <button type="submit" class="btn btn-primary">Додати</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <form enctype="multipart/form-data" method="post" action="{{ route('navAdd') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="value">Назва</label>
                                <input class="form-control" name="value" maxlength="254" id="value" type="text">
                            </div>
                            <div class="form-group">
                                <label for="page">Виберіть сторінку</label>
                                <select id="select" class="form-control" name="uri" id="page">
                                    <option value="">Не приєднувати</option>
                                    @foreach($pages as $p)
                                        <option value="{{ $p->page_id }}">{{ $p->title }}</option>
                                    @endforeach
                                    @foreach($navs as $n)
                                        <option value="{{ $n->id }}">{{ $n->value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="parent_id">Приєднати до</label>
                                <select id="select" class="form-control" name="parent_id" id="parent_id">
                                    @foreach($pages as $p)
                                        <option value="{{ route('page', $p->page_id) }}">{{ $p->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <script>
                                function testo(){ return $("select#select").val("3");
                            </script>
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
                <h3 class="tile-title">Список сторінок</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Заголовок</th>
                        <th>Посилання</th>
                        <th>Головне ID</th>
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

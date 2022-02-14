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
                        <div class="tile">
                            <h3 class="tile-title">Таблиця налаштувань</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Ключ</th>
                                        <th>Значення</th>
                                        <th>Редагувати</th>
                                        <th>Видалити</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($settings as $setting)
                                    <tr>
                                        <td>{{ $setting->id }}</td>
                                        <td>{{ $setting->value }}</td>
                                        <td>{{ $setting->data }}</td>
                                        <td><a href="{{ route('editField', $setting->id) }}"><i class="fa fa-edit"></i></a></td>
                                        <td><a href="{{ route('destroyField', $setting->id) }}"><i class="fa fa-remove"></i></a></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

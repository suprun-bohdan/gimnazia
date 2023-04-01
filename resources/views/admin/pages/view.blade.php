<?php
use App\User as User;
use App\Category as Category
?>
@extends('admin.layout')
@section('content')
    <script type="text/javascript" src="{{ asset('js') }}/plugins/select2.min.js"></script>
    <script type="text/javascript" src="{{ asset('js') }}/plugins/bootstrap-datepicker.min.js"></script>
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Список сторінок</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Новини</li>
            <li class="breadcrumb-item"><a href="#">Список сторінок</a></li>
        </ul>
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
                        <th>Час додавання</th>
                        <th>Дія</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pages as $p)
                        <tr>
                            <td>{{ $p->page_id }}</td>
                            <td>{{ $p->title }}</td>
                            <td>{{ date('H:i:s d.m.Y', strtotime($p->created_at)) }}</td>
                            <td><a href="#" id="{{ $p->page_id }}" onclick="pageDestroy(event)" data-url="{{ route('page.destroy', $p->page_id) }}"><i class="fa fa-remove"></i></a>  |  <a href="#"><i class="fa fa-edit"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function pageDestroy(event) {
            event.preventDefault();

            // Отримуємо id з атрибуту id посилання
            const id = event.currentTarget.getAttribute('id');

            // Отримуємо URL з атрибуту data-url посилання
            const url = event.currentTarget.getAttribute('data-url');

            // Відправляємо ajax-запит на сервер
            $.ajax({
                url: url,
                method: 'GET',
                data: {id: id},
                success: function(response) {
                    // Виводимо повідомлення про успішне видалення
                    $('body').append('<div style="max-width: 20%; margin-bottom: 5%; margin-left: 5%;" class="alert alert-success fixed-bottom" role="alert">' + response.message + '</div>');

                    // Після 5 секунд видаляємо повідомлення та перезавантажуємо сторінку
                    setTimeout(() => {
                        $('.alert').remove();
                        location.reload();
                    }, 5000);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    </script>

@endsection

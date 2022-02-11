@extends('template.layout')
@section('title', 'Реєстрація')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="heading red">
                <div>
                    <h2>Реєстрація</h2>
                </div>
            </div>
        </div>
    </div>
    @if($errors->any())
        <hr>
        <div class="row">
            <div class="col-12 text-center">
                @foreach($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        </div>
        <hr>
    @endif
    <div class="row justify-content-center">
        <div class="col-4 text-center">
            <div class="register">
                <form action="{{ route('register') }}" method="post">
                    <div class="form-group">
                        <label for="first_name">Введіть ваше Ім'я</label>
                        <input type="text" id="first_name" name="first_name" class="form-control" value="{{ old('first_name') }}">
                    </div>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="last_name">Введіть ваше прізвище</label>
                        <input type="text" id="last_name" name="last_name" class="form-control" value="{{ old('last_name') }}">
                    </div>
                    <div class="form-group">
                        <label for="login">Введіть логін</label>
                        <input type="text" id="login" name="login" class="form-control" value="{{ 'login' }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Введіть email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Введіть пароль</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Повторіть пароль</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Зареєструватись</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

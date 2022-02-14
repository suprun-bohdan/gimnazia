@extends('template.layout')
@section('title', 'Авторизація')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="heading red">
                <div>
                    <h2>Авторизація</h2>
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
                <form action="{{ route('login') }}" method="post">
                    <div class="form-group">
                        <label for="email">Введіть email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
                    </div>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="password">Введіть пароль</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Увійти</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

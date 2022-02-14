@extends('template.layout')
@section('title', 'INFO')
@section('content')
    <br>
    <div class="row">
        <div class="col-12">
            <div class="heading red">
                <div>
                    <h2>Увага</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <p>{{ $message }}</p>
        </div>
    </div>
@endsection

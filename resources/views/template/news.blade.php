@extends('template.layout')
@section('title', 'Новинни')
@section('content')
    <!-- CONTENT-->

    <div class="row">
        <div class="col-12">
            <div class="heading red">
                <div>
                    <h2>Новини</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12" id="news-categories">
            <nav class="nav news-nav justify-content-center">
                <a class="nav-link active" href="#">Всі новини</a>
                <a class="nav-link" href="#">Анонси</a>
                <a class="nav-link" href="#">Діяльність школи</a>
                <a class="nav-link" href="#">Для батьків</a>
                <a class="nav-link" href="#">Для педагогів</a>
            </nav>
        </div>
    </div>
    <form action="#" method="get" class="search_form news"><div class="input-group f_search"><input type="text" style="border: 1px solid green" class="form-control" name="q"><span class="input-group-btn" style="display:inline;margin-left:-5px;"><button class="btn btn_search_form" style="border: 1px solid green">Пошук</button></span></div></form>
    <div class="row">
        <div class="col-12">

        </div>
    </div>
    <!-- END CONTENT-->

@endsection

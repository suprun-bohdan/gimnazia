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
    <div class="row news-cards">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top"
                 src="https://images.unsplash.com/photo-1491374812364-00028bbe7d2f?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a22e4862c36c552e726815949fbcb41a&auto=format&fit=crop&w=500&q=60"
                 alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img class="card-img-top"
                 src="https://images.unsplash.com/photo-1491374812364-00028bbe7d2f?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a22e4862c36c552e726815949fbcb41a&auto=format&fit=crop&w=500&q=60"
                 alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img class="card-img-top"
                 src="https://images.unsplash.com/photo-1491374812364-00028bbe7d2f?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a22e4862c36c552e726815949fbcb41a&auto=format&fit=crop&w=500&q=60"
                 alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img class="card-img-top"
                 src="https://images.unsplash.com/photo-1491374812364-00028bbe7d2f?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a22e4862c36c552e726815949fbcb41a&auto=format&fit=crop&w=500&q=60"
                 alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img class="card-img-top"
                 src="https://images.unsplash.com/photo-1491374812364-00028bbe7d2f?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a22e4862c36c552e726815949fbcb41a&auto=format&fit=crop&w=500&q=60"
                 alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img class="card-img-top"
                 src="https://images.unsplash.com/photo-1491374812364-00028bbe7d2f?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a22e4862c36c552e726815949fbcb41a&auto=format&fit=crop&w=500&q=60"
                 alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
            </div>
        </div>
    </div>
    <!-- END CONTENT-->

@endsection

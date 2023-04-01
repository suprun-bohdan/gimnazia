@extends('admin.layout')
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Список слайдерів</h1>
            <p>В цьому розділі ви можете керувати слайдерами</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Записи</li>
            <li class="breadcrumb-item"><a href="#">Список слайдерів</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tile">
                            <h3 class="tile-title">Таблиця слайдерів</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Заголовок</th>
                                        <th>Опис / Підпис</th>
                                        <th>Посилання на запис / новину</th>
                                        <th>Зображення</th>
                                        <th>Дії</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sliders as $slider)
                                        <tr>
                                            <td>{{ $slider->id }}</td>
                                            <td>{{ $slider->title }}</td>
                                            <td>{{ $slider->preview_text }}</td>
                                            <td><a href="{{ url($slider->url) }}">{{ url($slider->url) }}</a></td>
                                            <td><img width="100" src="{{ Storage::url($slider->img_url) }}" alt="{{ $slider->img_url }}"></td>
                                            <td><a href="#" class="remove-slider" data-id="{{ $slider->id }}"><i class="fa fa-remove"></i></a></td>
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
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const removeButtons = document.querySelectorAll(".remove-slider");

            removeButtons.forEach((button) => {
                button.addEventListener("click", (event) => {
                    event.preventDefault();

                    const sliderId = button.getAttribute("data-id");

                    const xhr = new XMLHttpRequest();
                    xhr.open("GET", `/admin/slider/destroy?id=${sliderId}`, true);

                    xhr.onreadystatechange = () => {
                        if (xhr.readyState === 4) {
                            if (xhr.status === 200) {
                                location.reload();
                            } else {
                                console.log("Помилка видалення слайдера");
                            }
                        }
                    };

                    xhr.send(null);
                });
            });
        });
    </script>
@endsection

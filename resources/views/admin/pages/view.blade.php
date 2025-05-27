@extends('admin.layout')
@section('content')
    <script src="{{ asset('js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap-datepicker.min.js') }}"></script>

    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Список сторінок</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Сторінки</li>
            <li class="breadcrumb-item active">Список</li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Список сторінок</h3>
                <table class="table table-bordered table-hover">
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
                            <td>{{ $p->time ? date('H:i:s d.m.Y', strtotime($p->time)) : '—' }}</td>
                            <td>
                                <a href="#" id="{{ $p->page_id }}" onclick="pageDestroy(event)" data-url="{{ route('page.destroy', $p->page_id) }}"><i class="fa fa-remove text-danger"></i></a>
                                |
                                <a href="{{ route('page.edit', $p->page_id) }}"><i class="fa fa-edit text-primary"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper">
                    {{ $pages->links('template.partials.pagination') }}
                </div>
            </div>
        </div>
    </div>

    <script>
        function pageDestroy(event) {
            event.preventDefault();

            const id = event.currentTarget.getAttribute('id');
            const url = event.currentTarget.getAttribute('data-url');

            $.ajax({
                url: url,
                method: 'GET',
                data: {id: id},
                success: function(response) {
                    $('body').append('<div class="alert alert-success fixed-bottom mx-4 mb-4" role="alert" style="max-width: 25%;">' + response.message + '</div>');
                    setTimeout(() => {
                        $('.alert').remove();
                        location.reload();
                    }, 3000);
                },
                error: function(error) {
                    console.error(error);
                }
            });
        }
    </script>
@endsection

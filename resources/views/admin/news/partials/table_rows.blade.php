@foreach($posts as $p)
    <tr>
        <td>{{ $p->id }}</td>
        <td>{{ $p->title }}</td>
        <td><a href="{{ route('post', ['id' => $p->id]) }}">( перейти )</a></td>
        <td>{{ $p->category->category_name ?? 'Без категорії' }}</td>
        <td></td>
        <td></td>
        <td>{{ $p->author->first_name ?? '' }} {{ $p->author->last_name ?? '' }}</td>
        <td>{{ date('H:i:s d.m.Y', strtotime($p->created_at)) }}</td>
        <td>
            <a href="#" id="{{ $p->id }}" onclick="newsDestroy(event)" data-url="{{ route('newsDestroy', $p->id) }}"><i class="fa fa-remove"></i></a> |
            <a href="#"><i class="fa fa-edit"></i></a>
        </td>
    </tr>
@endforeach

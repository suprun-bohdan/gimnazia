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

@foreach ($posts as $post)
    <tr>
        <th scope="col">{{ $post->id }}</th>
        <td scope="col">{{ $post->post_title }}</td>
        <td scope="col" style="width: 50%">{{ $post->post_detail }}</td>
        <td scope="col">
            <a href="{{ route('show', $post->id) }}" class="btn btn-success btn-sm">ดู</a>
            @auth
                @if (Auth::user()->role === 1)
                    <a href="{{ route('edit', $post->id) }}" class="btn btn-info btn-sm">แก้ไข</a>|
                    @if (request()->has('trashed'))
                        <a href="{{ route('posts.restore', $post->id) }}" class="btn btn-success btn-sm">กู้คืน</a>
                    @else
                        <a href="{{ route('destroy', $post->id) }}" class="btn btn-danger btn-sm"
                            onclick="return confirm('ยืนยันการลบหรือไม่')">ลบ
                        </a>
                    @endif
                @elseif(Auth::user()->role === 2)
                    <a href="{{ route('edit', $post->id) }}" class="btn btn-info btn-sm">แก้ไข</a>|
                    <a href="{{ route('destroy', $post->id) }}" class="btn btn-danger btn-sm"
                        onclick="return confirm('ยืนยันการลบหรือไม่')">ลบ
                    </a>
                @endif
            @endauth

        </td>
    </tr>
@endforeach

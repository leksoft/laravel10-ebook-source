@extends('layouts.frontend')
@section('title', 'หน้าแรกบทความ')
@section('content')
    <section class="py-5 container">
        <div class="row">
            <div class="col-lg-12  mx-auto">
                <br />

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">หัวข้อ</th>
                            <th scope="col">รายละเอียด</th>
                            <th scope="col">จัดการ</th>
                        </tr>
                    </thead>
                    @foreach ($posts as $post)
                        <tbody>
                            <tr>
                                <th scope="col">{{ $post->id }}</th>
                                <td scope="col">{{ $post->post_title }}</td>
                                <td scope="col" style="width: 50%">{{ $post->post_detail }}</td>
                                <td scope="col">
                                    <a href="{{ route('show', $post->id) }}" class="btn btn-success btn-sm">ดู</a>

                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>

                {{ $posts->links() }}
            </div>
        </div>
    </section>
@endsection

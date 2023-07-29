@extends('layouts.frontend')

@section('title', 'แสดงรายละเอียด')

@section('css_before')

@endsection

@section('content')

    <section class="py-5 container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                หัวข้อ : {{ $posts->post_title }}
                <hr />
                {{ $posts->post_detail }}
            </div>
        </div>
    </section>

@endsection

@section('js_before')

@endsection

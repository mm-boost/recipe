{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')
{{-- admin.blade.phpの@yield('title')に'ホーム画面'を埋め込む --}}
@section('title', 'ホーム画面')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1>レシピ記録アプリ</h1>
                <h3>レシピの作成や、必要な材料を記録するアプリです</h3>
                <h3>ユーザー名：{{ \Str::limit($setting->nickname) }}</h3>
            </div>
        </div>
    </div>
@endsection



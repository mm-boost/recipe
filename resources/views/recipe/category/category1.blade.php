{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')
@section('title', 'レシピ一覧表')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>レシピリスト</h2>
                <form action="{{ action('Admin\RecipeController@category1') }}" method="get" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                        <a href="{{ action('Admin\RecipeController@add') }}" role="button" class="btn btn-primary">新規作成</a>
                     　　</div>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="cond_menu" value="{{ $cond_menu }}">
                    </div>
                    <div class="col-md-2">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" value="検索">
                    </div>
                
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                <div class="row">
                    <div class="list-shopping col-md-12 mx-auto">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">メニュー名</th>
                                    <th scope="col">編集</th>
                                </tr>
                             </thead>
                            <tbody>
                            @foreach($posts as $shoppinglist)
                                <tr>
                                    <th data-label="メニュー名">{{ \Str::limit($recipe->menu, 80) }}</th>
                                    <th data-label="編集">
                                    <div class="link-a">
                                        <a href="{{ action('Admin\RecipeController@edit', ['id' => $recipe->id]) }}">編集/</a>
                                        <a href="{{ action('Admin\RecipeController@delete', ['id' => $recipe->id]) }}">削除</a>
                                    </div>
                                    </th>
                                </tr>
                            @endforeach    
                            </tbody>
                        </table>
                    </div>   
                </div>
            </div>
        </div>
    </div>
@endsection

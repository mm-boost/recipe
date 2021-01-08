{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')
@section('title', 'レシピ一覧表')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>レシピリスト</h2>
                    <div class="row">
                        <div class="col-md-4">
                        <a href="{{ action('Admin\RecipeController@add') }}" role="button" class="btn btn-primary">レシピ作成</a>
                     　　</div>
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
                    @foreach($recipes as $recipe)
                        <tr>
                            <th data-label="メニュー名">
                                <a href="{{ action('Admin\RecipeController@show', ['id' => $recipe->id]) }}">{{ \Str::limit($recipe->menu, 30) }}</a>
                            </th>
                            <th data-label="編集">
                            <div class="link-l">
                                <a href="{{ action('Admin\RecipeController@edit', ['id' => $recipe->id]) }}">編集/</a>
                                <a href="{{ action('Admin\RecipeController@delete', ['id' => $recipe->id]) }}">削除</a>
                            </div>
                            </th>
                        </tr>
                    @endforeach 
                </tbody>
            </table>
            
                {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
            </div>
        </div>
    </div>
@endsection

{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')
@section('title', 'レシピ一覧表')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>レシピリスト</h2>
                <h5>レシピの主な調理法一覧</h5>
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

                    @foreach($tools as $tool)
                    <div class="category">
                        <ul>
                            <li class="categorypage">
                            <a class=categorylink href="{{ action('Admin\ToolController@list', $tool->id) }}">{{ $tool->tool }}</a>
                            </li>
                        </ul>
                    </div>
                    @endforeach    
            
                {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
            </div>
        </div>
    </div>
@endsection

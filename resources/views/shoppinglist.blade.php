@extends('layouts.admin')
@section('title', '買い物リストの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>買い物リスト</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\ShoppinglistController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\ShoppinglistController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">商品名</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_productname" value="{{ $cond_productname }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="10%">商品名</th>
                                <th width="10%">金額</th>
                                <th width="10%">個数</th>
                                <th width="10%">合計金額</th>
                                <th width="10%">分類</th>
                                <th width="10%">購入先</th>
                                <th width="30%">お気に入り</th>
                                <th width="60%">メモ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $shoppinglist)
                                <tr>
                                    <th>{{ $shoppinglist->id }}</th>
                                    <td>{{ \Str::limit($shoppinglist->productname, 100) }}</td>
                                    <td>{{ \Str::limit($shoppinglist->amount, 100) }}</td>
                                    <td>{{ \Str::limit($shoppinglist->num, 100) }}</td>
                                    <td>{{ \Str::limit($shoppinglist->amounttotal, 100) }}</td>
                                    <td>{{ \Str::limit($shoppinglist->genre, 100) }}</td>
                                    <td>{{ \Str::limit($shoppinglist->retaile, 100) }}</td>
                                    <td>{{ \Str::limit($shoppinglist->favorite, 100) }}</td>
                                    <td>{{ \Str::limit($shoppinglist->memo, 250) }}</td>
                                    <td>{{ \Str::limit($shoppinglist->image, 250) }}</td>
                                    <td>
                                    　<div>
                                        <a href="{{ action('Admin\ShoppinglistController@edit', ['id' => $shoppinglist->id]) }}">編集</a>
                                    　</div>
                                      <div>
                                        <a href="{{ action('Admin\ShoppinglistController@delete', ['id' => $shoppinglist->id]) }}">削除</a>
                                      </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
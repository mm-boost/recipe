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
    </div>

    <div class="row">
        <div class="list-shopping col-md-12 mx-auto">
            <table class="table">
                    <thead>
                        <tr>
                        <td><form action="{{ action('Admin\ShoppinglistController@index') }}" method="get">
                            購入先 ： <select name="retailer" required>
                                  <option value="">----選択して下さい----</option>
                                   @foreach ($shops as $shop)
                                  <option value="{{$shop->id}}">{{ $shop->name }}</option>
                                   @endforeach
                                  </select>
                            {{ csrf_field() }}
                            <input type="submit" value=表示></form>
                        </td>
                        <td colspan="7">お気に入り ： <select>
                                                 <option>○</option>
                                                 <option>✖︎</option>
                                                 </select></td>
                        </tr>
                        <tr>
                            <th scope="col" width="10%">商品名</th>
                            <th scope="col" width="10%">金額</th>
                            <th scope="col" width="10%">個数</th>
                            <th scope="col" width="10%">合計金額</th>
                            <th scope="col" width="10%">分類</th>
                            <th scope="col" width="15%">メモ</th>
                            <th scope="col" width="10%">画像</th>
                             <th scope="col" width="10%">編集</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $shoppinglist)
                                <tr>
                                    <th data-label="商品名">{{ \Str::limit($shoppinglist->productname, 80) }}</th>
                                    <th data-label="金額">{{ \Str::limit($shoppinglist->amount, 80) }}</th>
                                    <th data-label="個数">{{ \Str::limit($shoppinglist->num, 80) }}</th>
                                    <th data-label="合計金額">{{ \Str::limit($shoppinglist->amounttotal, 80) }}</th>
                                    <th data-label="分類">{{ \Str::limit($shoppinglist->genre, 50) }}</th>
                                    <th data-label="メモ">{{ \Str::limit($shoppinglist->memo, 300) }}</th>
                                    <th data-label="画像">{{ \Str::limit($shoppinglist->image, 250) }}</th>
                                    <th data-label="編集">
                                    　<div class="link-a">
                                        <a href="{{ action('Admin\ShoppinglistController@edit', ['id' => $shoppinglist->id]) }}">編集/</a>
                                        <a href="{{ action('Admin\ShoppinglistController@delete', ['id' => $shoppinglist->id]) }}">削除</a>
                                      </div>
                                    </th>
                                    <th data-label="お気に入り">{{ \Str::limit($shoppinglist->favorite, 50) }}</th>
                                </tr>
                        @endforeach    
                    </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
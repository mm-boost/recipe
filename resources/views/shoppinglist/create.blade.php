{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')
{{-- admin.blade.phpの@yield('title')に'ホーム画面'を埋め込む --}}
@section('title', '買い物リスト')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>買い物リスト</h2>
                <form action="{{ action('Admin\ShoppinglistController@create') }}" method="post" enctype="multipart/form-data">
                @if (count($errors) > 0)
                        <ul>
                     @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                     @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">品名</label>
                        <div class="col-md-10">
                            <input type="text" name="title" size="25" value="{{ old('title') }}"></input>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2">金額</label>
                        <div class="col-md-10">
                            <input type="text" name="title" size="10" value="{{ old('title') }}"></input>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2">品数</label>
                        <div class="col-sm-10">
                            　<select name="num">
                               <option value="">選択してください</option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                               <option value="6">6</option>
                               <option value="7">7</option>
                               <option value="8">8</option>
                               <option value="9">9</option>
                               <option value="10以上">10以上</option>
                              </select>
                        </div>
                    </div>

　　　　　　　　　　　　<div class="form-group row">
                        <label class="col-md-2">合計金額</label>
                        <div class="col-md-10">
                            <input type="text" name="title" size="10" value="{{ old('title') }}"></input>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2">分類</label>
                        <div class="col-sm-10">
                            　<select name="division">
                               <option value="">選択してください</option>
                               <option value="米、パン類">米、パン類</option>
                               <option value="野菜類">野菜類</option>
                               <option value="果物類">果物類</option>
                               <option value="肉類">肉類</option>
                               <option value="魚介類">魚介類</option>
                               <option value="卵、豆類">卵、豆類</option>
                               <option value="乳製品">乳製品</option>
                               <option value="飲料">飲料</option>
                               <option value="嗜好品">嗜好品</option>
                               <option value="その他">その他</option>
                              </select>
                        </div>
                    </div>
　　　　　　　　　　　　
　　　　　　　　　　　　<div class="form-group row">
                        <label class="col-md-2">購入先</label>
                      <div class="col-md-10">
                        <input type="checkbox" name=“shop” value="1">スーパー
                        <input type="checkbox" name=“shop” value="2">ドラッグストア
                        <input type="checkbox" name=“shop” value="3">ネットスーパー
                      </div>
                    </div>

　　　　　　　　　　　　<div class="form-group row">
                        <label class="col-md-2">お気に入り</label>
                      <div class="col-md-10">
                        <input type="checkbox" name=“お気に入り”>
                      </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2">メモ</label>
                        <div class="col-md-10">
                            <textarea name="contents" style="width:400px; height:70px;" value="{{ old('contents') }}"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    
                    
                    {{ csrf_field() }}
                    <input type="submit" name="create" value="追加">
                </form>
            </div>
        </div>
    </div>
@endsection




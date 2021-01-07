@extends('layouts.admin')
@section('title', '買い物リストの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>買い物リスト</h2>
                <form action="{{ action('Admin\ShoppinglistController@update') }}" method="post" enctype="multipart/form-data">
                @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="form-group row">
                        <label class="col-md-2">購入先</label>
                        <div class="col-md-10">
                        <select name="retailer" id="retailer" required>
                        @foreach ($shops as $shop)
                        <option value="{{$shop->id}}">{{ $shop->name }}</option>
                        @endforeach
                        </select>
                        <input type="text" name="shop" value="">
                        <input type="button" name="shopname" value="項目追加" onClick="addSelectItem()">
                        </div>
                    </div>
                    

                    <div class="form-group row">
                        <label class="col-md-2">商品名</label>
                        <div class="col-md-10">
                            <input type="text" name="productname" size="25" value="{{ old('productname', $shoppinglist_form->productname) }}"></input>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2">金額</label>
                        <div class="col-md-10">
                            <input type="text" id="amount" name="amount" size="10" value="{{ old('amount', $shoppinglist_form->amount) }}" onkeyup="inputCheck()"></input>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2">品数</label>
                        <div class="col-sm-10">
                            　<select name="num" id="num" onchange="inputCheck()">
                              <?php $num = old('num' , $shoppinglist_form->num); ?>
                               <option value="">選択してください</option>
                               <option value="1" @if($num =='1') selected="selected" @endif>1</option>
                               <option value="2" @if($num =='2') selected="selected" @endif>2</option>
                               <option value="3" @if($num =='3') selected="selected" @endif>3</option>
                               <option value="4" @if($num =='4') selected="selected" @endif>4</option>
                               <option value="5" @if($num =='5') selected="selected" @endif>5</option>
                               <option value="6" @if($num =='6') selected="selected" @endif>6</option>
                               <option value="7" @if($num =='7') selected="selected" @endif>7</option>
                               <option value="8" @if($num =='8') selected="selected" @endif>8</option>
                               <option value="9" @if($num =='9') selected="selected" @endif>9</option>
                               <option value="10" @if($num =='10') selected="selected" @endif>10</option>
                              </select>
                        </div>
                    </div>

　　　　　　　　　　　　<div class="form-group row">
                        <label class="col-md-2">合計金額</label>
                        <div class="col-md-10">
                            <input type="text" name="amounttotal" id="amounttotal" size="10" value="{{ old('amounttotal', $shoppinglist_form->amounttotal) }}"></input>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2">分類</label>
                        <div class="col-sm-10">
                            　<select name="genre">
                               <?php $genre = old('gender' , $shoppinglist_form->genre); ?>
                               <option value="">選択してください</option>
                               <option value="米、パン類" @if($genre =='米、パン類') selected="selected" @endif>米、パン類</option>
                               <option value="野菜類" @if($genre =='野菜類') selected="selected" @endif>野菜類</option>
                               <option value="果物類" @if($genre =='果物類') selected="selected" @endif>果物類</option>
                               <option value="肉類" @if($genre =='肉類') selected="selected" @endif>肉類</option>
                               <option value="魚介類" @if($genre =='魚介類') selected="selected" @endif>魚介類</option>
                               <option value="卵、豆類" @if($genre =='卵、豆類') selected="selected" @endif>卵、豆類</option>
                               <option value="乳製品" @if($genre =='乳製品') selected="selected" @endif>乳製品</option>
                               <option value="飲料" @if($genre =='飲料') selected="selected" @endif>飲料</option>
                               <option value="嗜好品" @if($genre =='嗜好品') selected="selected" @endif>嗜好品</option>
                               <option value="その他" @if($genre =='その他') selected="selected" @endif>その他</option>
                              </select>
                        </div>
                    </div>

　　　　　　　　　　　　<div class="form-group row">
                        <label class="col-md-2">お気に入り</label>
                      <div class="col-md-10">
                        <input type="checkbox" name=“favorite” @if($favorite =='お気に入り') checked="checked" @endif>
                      </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2">メモ</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="memo" style="width:400px; height:70px;">{{ old('memo', $shoppinglist_form->memo) }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $shoppinglist_form->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $shoppinglist_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>

                 <script type="text/javascript">
                  function addSelectItem(){
                  itemStr = document.form1.shop.value;
                  len = document.form1.retailer.options.length;
                  document.form1.retailer.options[len] = new Option(itemStr,itemStr);
                   }  

                    function inputCheck(){
                        // 2つの入力フォームの値を取得
                        //document（資料）オブジェクトは、ブラウザ上で表示されたドキュメントを操作できます
                        var amount = document.getElementById("amount").value;
                        var num = document.getElementById("num").value;
                        //乗算の設定
                        var mul = parseFloat(amount, 10) * parseFloat(num, 10);
                        //デバックの設定
                        console.log(mul);
                        // 計算結果を表示
                        var amounttotal = document.getElementById("amounttotal");
                        if(isNaN){
                           amounttotal.value = mul;
                          } else {
                           amounttotal.value = 0;
                          }    
                        }  
                </script>

                <div class="row mt-5">
                     <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                           @if ($shoppinglist_form->shoppinglist_histories!= NULL)
                             @foreach ($shoppinglist_form->shoppinglist_histories as $shoppinglist_history)
                               <li class="list-group-item">{{ $shoppinglist_history->edited_at }}</li>
                             @endforeach
                           @endif
                        </ul>
                     </div>
                </div>

            </div>
        </div>
    </div>
@endsection
